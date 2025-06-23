<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        DB::unprepared('
            CREATE PROCEDURE select_user(
            IN userID INT
            )
            BEGIN
                SELECT
                u.nim,
                u.name,
                u.email,
                u.password,
                u.phone_number,
                u.profile_picture,
                u.created_at,
                u.updated_at
                FROM users u
                WHERE id = userID;
            END
        ');

        DB::unprepared(<<<SQL
        DROP PROCEDURE IF EXISTS select_complaint_user_vote;

        CREATE PROCEDURE select_complaint_user_vote(
            IN search_keyword VARCHAR(255),
            IN filter_type VARCHAR(10),
            IN userID INT
        )
        BEGIN
            DECLARE order_by_clause TEXT;
            DECLARE keyword TEXT;

            IF filter_type = 'terbaru' THEN
                SET order_by_clause = 'c.created_at DESC';
            ELSEIF filter_type = 'teratas' THEN
                SET order_by_clause = 'total_votes DESC';
            ELSE
                SET order_by_clause = 'c.created_at DESC';
            END IF;

            SET keyword = CONCAT('%', search_keyword, '%');

            SET @sql = CONCAT(
                'SELECT
                    c.id AS complaint_complaint_id,
                    c.user_id,
                    c.category_id,
                    c.attachment_id,
                    c.complaint_title,
                    c.complaint_content,
                    c.proses,
                    c.created_at AS complaint_created_at,
                    c.updated_at AS complaint_updated_at,
                    u.name,
                    u.profile_picture,
                    u.created_at AS user_created_at,
                    u.updated_at AS user_updated_at,
                    (
                        SELECT SUM(
                            CASE
                                WHEN vote_type = ''upvote'' THEN 1
                                WHEN vote_type = ''downvote'' THEN -1
                                ELSE 0
                            END
                        )
                        FROM complaint_vote v
                        WHERE v.complaint_id = c.id
                    ) AS total_votes,
                    (
                        SELECT COUNT(id)
                        FROM comment
                        WHERE complaint_id = c.id
                    ) AS total_comments
                FROM complaints c
                LEFT JOIN users u ON c.user_id = u.id
                WHERE (c.complaint_title LIKE ''', keyword, ''' OR c.complaint_content LIKE ''', keyword, ''')
                AND (', userID, ' = 0 OR c.user_id = ', userID, ')
                ORDER BY ', order_by_clause
            );

            PREPARE stmt FROM @sql;
            EXECUTE stmt;
            DEALLOCATE PREPARE stmt;
        END
        SQL);

        DB::unprepared('DROP PROCEDURE IF EXISTS select_complaint_comment_user_vote;');
        DB::unprepared('
            CREATE PROCEDURE select_complaint_comment_user_vote(
                IN complaintID INT
            )
            BEGIN
                SELECT
                    c.id AS complaint_complaint_id,
                    c.complaint_title,
                    c.complaint_content,
                    c.proses,
                    c.created_at AS complaint_created_at,

                    -- Get the Complaint Author details by joining complaints.user_id
                    complaint_author.name AS complaint_author_name,
                    complaint_author.profile_picture AS complaint_author_profile_picture,

                    -- Get the Comment details from the `comment` table
                    m.id as comment_id,
                    m.description AS comment_description,
                    m.created_at AS comment_created_at,

                    -- Get the Commenter details by joining comment.user_id
                    comment_author.name AS comment_author_name,
                    comment_author.profile_picture AS comment_author_profile_picture,

                    -- Get attachment and vote details
                    a.path_file,
                    (
                        SELECT
                        SUM(
                        CASE
                            WHEN vote_type = "upvote" THEN 1
                            WHEN vote_type = "downvote" THEN -1
                            ELSE 0
                        END)
                        FROM complaint_vote v
                        WHERE v.complaint_id = c.id
                    ) AS total_votes,
                    (
                        SELECT COUNT(id)
                        FROM comment
                        WHERE complaint_id = c.id
                    ) AS total_comments
                FROM
                    complaints c
                -- Join users table for the complaint author
                LEFT JOIN
                    users complaint_author ON c.user_id = complaint_author.id
                -- Join to get the comments
                LEFT JOIN
                    comment m ON c.id = m.complaint_id
                -- Join users table again for the comment author
                LEFT JOIN
                    users comment_author ON m.user_id = comment_author.id
                -- Join to get attachments
                LEFT JOIN
                    complaint_attachment a ON c.attachment_id = a.id
                WHERE
                    c.id = complaintID
                ORDER BY
                    m.created_at ASC;
            END
        ');

        DB::unprepared('
            CREATE PROCEDURE select_complaint_user()
            BEGIN
                SELECT
                (
                    SELECT COUNT(id)
                    FROM complaints
                ) AS total_aduan,
                (
                    SELECT COUNT(id)
                    FROM complaints
                    WHERE proses = "diproses"
                ) AS aduan_diproses,
                (
                    SELECT COUNT(id)
                    FROM complaints
                    WHERE proses = "selesai"
                ) AS aduan_selesai,
                (
                    SELECT COUNT(DISTINCT user_id)
                    FROM complaints
                ) AS total_pengadu;
            END
        ');

        DB::unprepared('
            CREATE PROCEDURE update_user(
                IN userID INT,
                IN u_name VARCHAR(255),
                IN u_email VARCHAR(255),
                IN u_phone_number VARCHAR(255),
                IN u_profile_picture VARCHAR(255)
            )
            BEGIN
                UPDATE users
                SET
                    name = u_name,
                    email = u_email,
                    phone_number = u_phone_number,
                    profile_picture = u_profile_picture
                WHERE id = userID;
            END
        ');

        DB::unprepared('
            CREATE PROCEDURE update_insert_select_vote(
                IN userID INT,
                IN complaintID INT,
                IN voteType VARCHAR(20),
                IN mode VARCHAR(10)
            )
            BEGIN
                IF mode = "SELECT" THEN
                    SELECT user_id, complaint_id, vote_type
                    FROM complaint_vote
                    WHERE complaint_id = complaintID AND user_id = userID;

                ELSEIF mode = "UPDATE" THEN
                    UPDATE complaint_vote
                    SET vote_type = voteType
                    WHERE complaint_id = complaintID AND user_id = userID;

                ELSEIF mode = "INSERT" THEN
                    INSERT INTO complaint_vote (user_id, complaint_id, vote_type)
                    VALUES (userID, complaintID, voteType);
                END IF;
            END;
        ');

        DB::unprepared('
            CREATE PROCEDURE insert_comment(
                IN complaintID INT,
                IN userID INT,
                IN CommentDescription TEXT
            )
            BEGIN
                INSERT INTO comment
                (complaint_id, user_id, description)
                VALUES
                (complaintID, userID, CommentDescription);
            END
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('DROP PROCEDURE IF EXISTS select_complaint_user_vote');
        DB::unprepared('DROP PROCEDURE IF EXISTS select_complaint_comment_user_vote');
        DB::unprepared('DROP PROCEDURE IF EXISTS select_user');
        DB::unprepared('DROP PROCEDURE IF EXISTS select_complaint_user');
        DB::unprepared('DROP PROCEDURE IF EXISTS update_user');
        DB::unprepared('DROP PROCEDURE IF EXISTS update_insert_select_vote');
        DB::unprepared('DROP PROCEDURE IF EXISTS insert_comment');
    }
};
