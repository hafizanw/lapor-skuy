<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        // SELECT user => user_profile
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


        // SELECT complaint, user, vote => aduan_umum / aduan anda
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
                    ) AS total_comments,
                    (
                        SELECT d.role
                        FROM departments d
                        INNER JOIN complaints_department cd ON d.id = cd.department_id
                        WHERE cd.id = c.id
                        LIMIT 1
                    ) AS complaint_role
                FROM complaints c
                LEFT JOIN users u ON c.user_id = u.id
                WHERE (c.complaint_title LIKE ''', keyword, ''' OR c.complaint_content LIKE ''', keyword, ''')
                AND (', userID, ' = 0 OR c.user_id = ', userID, ') AND (c.category_id = 2)
                ORDER BY ', order_by_clause
            );
    
            PREPARE stmt FROM @sql;
            EXECUTE stmt;
            DEALLOCATE PREPARE stmt;
        END
        SQL);


        // SELECT complaint, comment, user, vote => aduan_detail
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
                c.updated_at AS complaint_updated_at,
                m.description,
                m.created_at AS comment_created_at,
                m.updated_at AS comment_updated_at,
                u.name,
                u.profile_picture,
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
                ) AS total_comments,
                (
                    SELECT d.role
                    FROM departments d
                    INNER JOIN complaints_department cd ON d.id = cd.department_id
                    WHERE cd.id = c.id
                    LIMIT 1
                ) AS complaint_role
                FROM complaints c
                LEFT JOIN comment m ON c.id = m.complaint_id
                LEFT JOIN users u ON m.user_id = u.id
                LEFT JOIN complaint_attachment a ON c.attachment_id = a.id
                WHERE c.id = complaintID;
            END
        ');
        DB::unprepared('
            CREATE PROCEDURE select_users_name(
                IN complaintID INT
            )
            BEGIN
                SELECT 
                users.name,
                users.profile_picture
                FROM users
                INNER JOIN complaints ON users.id = complaints.user_id
                WHERE complaints.id = complaintID;
            END
        ');


        // SELECT complaint, user => home / dashboard
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

        // UPDATE user
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

        // UPDATE, INSERT, SELECT vote
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

        // INSERT Comment
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
        DB::unprepared('
            DROP PROCEDURE IF EXISTS select_complaint_user_vote
        ');

        DB::unprepared('
            DROP PROCEDURE IF EXISTS select_complaint_comment_user_vote
        ');

        DB::unprepared('
            DROP PROCEDURE IF EXISTS select_users_name
        ');

        DB::unprepared('
            DROP PROCEDURE IF EXISTS select_user
        ');

        DB::unprepared('
            DROP PROCEDURE IF EXISTS select_complaint_user
        ');

        DB::unprepared('
            DROP PROCEDURE IF EXISTS update_user
        ');

        DB::unprepared('
            DROP PROCEDURE IF EXISTS update_insert_select_vote
        ');

        DB::unprepared('
        DROP PROCEDURE IF EXISTS insert_comment
    ');
    }
};
