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

        // SELECT complaint, user, vote => aduan_umum
        DB::unprepared('
            CREATE PROCEDURE select_complaint_user_vote()
            BEGIN
                SELECT
                c.id AS complaint_complaint_id,
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
                    SELECT
                    SUM(
                    CASE
                        WHEN vote_type = "upvote" THEN 1
                        WHEN vote_type = "downvote" THEN -1
                        ELSE 0
                    END)
                    FROM complaint_vote v
                    WHERE v.complaint_id = c.id
                ) AS total_votes
                FROM complaints c
                LEFT JOIN users u ON c.user_id = u.id;
            END
        ');

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
                ) AS total_votes
                FROM complaints c
                LEFT JOIN comment m ON c.id = m.complaint_id
                LEFT JOIN users u ON m.user_id = u.id
                WHERE c.id = complaintID;
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

        // INSERT vote
        DB::unprepared('
            CREATE PROCEDURE insert_vote(
                IN complaintID INT,
                IN userID INT,
                IN voteType CHAR
            )
            BEGIN
                INSERT INTO complaint_vote
                (complaint_id, user_id, vote_type)
                VALUES
                (complaintID, userID, voteType);
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
            DROP PROCEDURE IF EXISTS select_user
        ');

        DB::unprepared('
            DROP PROCEDURE IF EXISTS update_user
        ');

        DB::unprepared('
            DROP PROCEDURE IF EXISTS insert_vote
        ');
    }
};
