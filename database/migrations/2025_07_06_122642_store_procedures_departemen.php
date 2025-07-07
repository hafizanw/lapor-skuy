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
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        DB::unprepared('
            DROP PROCEDURE IF EXISTS insert_into_complaints_departement
        ');
    }
};
