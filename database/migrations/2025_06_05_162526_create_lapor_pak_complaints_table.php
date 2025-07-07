<?php

use App\Enums\Category;
use App\Enums\Proses;
use App\Enums\Visibility_Type;
use App\Enums\Vote_Type;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('complaints', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('User_ID')->index();       // Direferensikan ke users.id
            $table->unsignedBigInteger('Category_ID')->index();   // Direferensikan ke complaint_category.id
             $table->unsignedBigInteger('Attachment_ID')->index();
            $table->string('Complaint_Title', 255);
            $table->text('Complaint_Content');
            $table->enum('Proses', array_column(Proses::cases(), 'value'))->default('diajukan'); // Gunakan nilai default dari Enum
            $table->timestamps();
        });

        Schema::create('complaint_category', function (Blueprint $table) {
            $table->id();
            $table->enum('Category', array_column(Category::cases(), 'value'));
            $table->text('Description')->nullable();
            $table->enum('Visibility_Type', array_column(Visibility_Type::cases(), 'value'));
            $table->timestamps();
        });

        Schema::create('complaint_attachment', function (Blueprint $table) {
            $table->id();
            $table->string('Real_Name_File', 255);
            $table->string('Path_File', 255);
            $table->string('Type_File', 50)->nullable();
            $table->timestamps();
        });

        Schema::create('complaint_response', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('Complaint_ID')->index();
            $table->unsignedBigInteger('Department_ID')->index();
            $table->unsignedBigInteger('User_ID')->index();
            $table->text('Response');
            $table->text('Descriptions')->nullable();
            $table->timestamps();
        });

        Schema::create('complaint_vote', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('User_ID')->index();
            $table->unsignedBigInteger('Complaint_ID')->index();
            $table->enum('Vote_Type', array_column(Vote_Type::cases(), 'value'));
            $table->timestamps();
            $table->unique(['User_ID', 'Complaint_ID']);
        });

        Schema::create('complaint_history', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('Complaint_ID')->index();
            $table->unsignedBigInteger('User_ID')->index();
            $table->unsignedBigInteger('Department_ID')->index();
            $table->unsignedBigInteger('Response_ID')->index();
            $table->string('Action_Description', 255);
            $table->timestamps();
        });

        Schema::create('comment', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('Complaint_ID')->index();
            $table->unsignedBigInteger('User_ID')->index();
            $table->text('Description'); // Dihilangkan parameter panjang yang salah
            $table->timestamps();
        });

        Schema::create('rating', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('Complaint_ID')->index();
            $table->unsignedBigInteger('User_ID')->index();
            $table->unsignedTinyInteger('Rating');
            $table->text('comment')->nullable();
            $table->timestamps();
            $table->unique(['Complaint_ID', 'User_ID']);
        });

        Schema::table('complaints', function ($table) {
            $table->foreign('User_ID')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade'); // Contoh jika nama tabelnya lapor_pak_users
            $table->foreign('Category_ID')->references('id')->on('complaint_category')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('Attachment_ID')->references('id')->on('complaint_attachment')->onUpdate('cascade')->onDelete('cascade'); // atau cascade jika perlu
        });

        Schema::table('complaint_response', function ($table) {
            $table->foreign('Complaint_ID')->references('id')->on('complaints')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('Department_ID')->references('id')->on('departments')->onUpdate('cascade')->onDelete('cascade'); // Contoh jika nama tabelnya lapor_pak_departments dan foreign key bisa null
            $table->foreign('User_ID')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');             // Contoh jika nama tabelnya lapor_pak_users dan foreign key bisa null
        });

        Schema::table('complaint_vote', function ($table) {
            $table->foreign('User_ID')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('Complaint_ID')->references('id')->on('complaints')->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::table('complaint_history', function ($table) {
            $table->foreign('Complaint_ID')->references('id')->on('complaints')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('User_ID')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('Department_ID')->references('id')->on('departments')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('Response_ID')->references('id')->on('complaint_response')->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::table('comment', function ($table) {
            $table->foreign('Complaint_ID')->references('id')->on('complaints')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('User_ID')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::table('rating', function ($table) {
            $table->foreign('Complaint_ID')->references('id')->on('complaints')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('User_ID')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        // Drop tables in reverse order of creation, considering foreign keys
        // atau drop foreign keys dulu jika ada masalah
        Schema::table('complaints', function (Blueprint $table) {
            if (Schema::hasColumn('complaints', 'User_ID')) {
                $table->dropForeign(['User_ID']);
            }

            if (Schema::hasColumn('complaints', 'Category_ID')) {
                $table->dropForeign(['Category_ID']);
            }

            if (Schema::hasColumn('complaints', 'Attachment_ID')) {
                $table->dropForeign(['Attachment_ID']);
            }

        });
        Schema::table('complaint_attachment', function (Blueprint $table) {
            if (Schema::hasColumn('complaint_attachment', 'Complaint_ID')) {
                $table->dropForeign(['Complaint_ID']);
            }

        });
        Schema::table('complaint_response', function (Blueprint $table) {
            if (Schema::hasColumn('complaint_response', 'Complaint_ID')) {
                $table->dropForeign(['Complaint_ID']);
            }

            if (Schema::hasColumn('complaint_response', 'Department_ID')) {
                $table->dropForeign(['Department_ID']);
            }

            if (Schema::hasColumn('complaint_response', 'User_ID')) {
                $table->dropForeign(['User_ID']);
            }

        });
        Schema::table('complaint_vote', function (Blueprint $table) {
            if (Schema::hasColumn('complaint_vote', 'User_ID')) {
                $table->dropForeign(['User_ID']);
            }

            if (Schema::hasColumn('complaint_vote', 'Complaint_ID')) {
                $table->dropForeign(['Complaint_ID']);
            }

        });
        Schema::table('complaint_history', function (Blueprint $table) {
            if (Schema::hasColumn('complaint_history', 'Complaint_ID')) {
                $table->dropForeign(['Complaint_ID']);
            }

            if (Schema::hasColumn('complaint_history', 'User_ID')) {
                $table->dropForeign(['User_ID']);
            }

            if (Schema::hasColumn('complaint_history', 'Department_ID')) {
                $table->dropForeign(['Department_ID']);
            }

            if (Schema::hasColumn('complaint_history', 'Response_ID')) {
                $table->dropForeign(['Response_ID']);
            }

        });
        Schema::table('comment', function (Blueprint $table) {
            if (Schema::hasColumn('comment', 'Complaint_ID')) {
                $table->dropForeign(['Complaint_ID']);
            }

            if (Schema::hasColumn('comment', 'User_ID')) {
                $table->dropForeign(['User_ID']);
            }

        });
        Schema::table('rating', function (Blueprint $table) {
            if (Schema::hasColumn('rating', 'Complaint_ID')) {
                $table->dropForeign(['Complaint_ID']);
            }

            if (Schema::hasColumn('rating', 'User_ID')) {
                $table->dropForeign(['User_ID']);
            }

        });

        Schema::dropIfExists('rating');
        Schema::dropIfExists('comment');
        Schema::dropIfExists('complaint_history');
        Schema::dropIfExists('complaint_vote');
        Schema::dropIfExists('complaint_response');
        Schema::dropIfExists('complaint_attachment');
        Schema::dropIfExists('complaint_category');
        Schema::dropIfExists('complaints');
        // Jangan drop tabel users dan departments di sini jika mereka punya migrasi sendiri
    }
};
