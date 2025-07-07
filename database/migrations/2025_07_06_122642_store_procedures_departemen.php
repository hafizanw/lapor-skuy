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
        // INSERT into complaints_departement
        DB::unprepared('
            DROP PROCEDURE IF EXISTS insert_into_complaints_departement;

            CREATE PROCEDURE insert_into_complaints_departement(
                IN complaintID INT,
                IN userID INT,
                IN categoryID INT,
                IN attachmentID INT,
                IN departmentID INT,
                IN responseID INT,
                IN complaintTitle VARCHAR(255),
                IN complaintContent TEXT,
                IN prosesComplaint VARCHAR(255)
            )
            BEGIN
                INSERT INTO complaints_department (id, user_id, category_id, attachment_id, department_id, response_id, complaint_title, complaint_content, proses, created_at, updated_at)
                VALUES (complaintID, userID, categoryID, attachmentID, departmentID, responseID, complaintTitle, complaintContent, prosesComplaint, NOW(), NOW());
            END
        ');

        // SELECT TO each department
        DB::unprepared(<<<SQL
        DROP PROCEDURE IF EXISTS select_complaint_user_vote_departemen;
    
        CREATE PROCEDURE select_complaint_user_vote_departemen(
            IN search_keyword VARCHAR(255),
            IN filter_type VARCHAR(10),
            IN departmentID INT
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
                FROM complaints_department c
                LEFT JOIN users u ON c.user_id = u.id
                WHERE (c.complaint_title LIKE ''', keyword, ''' OR c.complaint_content LIKE ''', keyword, ''')
                AND (', departmentID, ' = 0 OR c.department_id = ', departmentID, ')
                ORDER BY ', order_by_clause
            );
    
            PREPARE stmt FROM @sql;
            EXECUTE stmt;
            DEALLOCATE PREPARE stmt;
        END
        SQL);


        // SELECT complaint, comment, user, vote => aduan_detail_departemen
        DB::unprepared('
            DROP PROCEDURE IF EXISTS select_complaint_comment_user_vote_departemen;

            CREATE PROCEDURE select_complaint_comment_user_vote_departemen(
                IN complaintID INT
            )
            BEGIN
                SELECT 
                c.id AS complaint_complaint_id,
                c.user_id,
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
                FROM complaints_department c
                LEFT JOIN comment m ON c.id = m.complaint_id
                LEFT JOIN users u ON m.user_id = u.id
                LEFT JOIN complaint_attachment a ON c.attachment_id = a.id
                WHERE c.id = complaintID;
            END
        ');
        DB::unprepared('
            DROP PROCEDURE IF EXISTS select_users_name_departemen;

            CREATE PROCEDURE select_users_name_departemen(
                IN complaintID INT
            )
            BEGIN
                SELECT 
                users.name,
                users.profile_picture
                FROM users
                INNER JOIN complaints_department ON users.id = complaints_department.user_id
                WHERE complaints_department.id = complaintID;
            END
        ');

        // INSERT feedback
        DB::unprepared('
            DROP PROCEDURE IF EXISTS insert_feedback;

            CREATE PROCEDURE insert_feedback(
                IN complaintID INT,
                IN feedbackDescription TEXT,
                IN attachment VARCHAR(255)
            )
            BEGIN
                INSERT INTO complaint_response
                (id, response, attachment)
                VALUES
                (complaintID, feedbackDescription, attachment);
            END
        ');
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('
            DROP PROCEDURE IF EXISTS insert_into_complaints_departement
        ');

        DB::unprepared('
            DROP PROCEDURE IF EXISTS select_complaint_user_vote_departemen
        ');

        DB::unprepared('
            DROP PROCEDURE IF EXISTS select_complaint_comment_user_vote_departemen
        ');

        DB::unprepared('
            DROP PROCEDURE IF EXISTS select_users_name_departemen
        ');

        DB::unprepared('
            DROP PROCEDURE IF EXISTS insert_feedback
        ');
    }
};
