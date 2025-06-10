<?php

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
            $table->unsignedBigInteger('user_id')->index();       // Direferensikan ke users.id
            $table->unsignedBigInteger('category_id')->index();   // Direferensikan ke complaint_category.id
            $table->unsignedBigInteger('attachment_id')->index(); // Contoh jika nullable
            $table->string('complaint_title', 255);
            $table->text('complaint_content');
            $table->enum('proses', array_column(Proses::cases(), 'value'))->default('diajukan'); // Gunakan nilai default dari Enum
            $table->timestamps();
        });

        Schema::create('complaint_category', function (Blueprint $table) {
            $table->id();
            $table->text('description')->nullable();
            $table->enum('visibility_Type', array_column(Visibility_Type::cases(), 'value'));
            $table->timestamps();
        });

        Schema::create('complaint_attachment', function (Blueprint $table) {
            $table->id();
            $table->string('real_name_file', 255);
            $table->string('path_file', 255);
            $table->string('type_file', 50)->nullable();
            $table->timestamps();
        });

        Schema::create('complaint_response', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('complaint_id')->index();
            $table->unsignedBigInteger('department_id')->index();
            $table->unsignedBigInteger('user_id')->index();
            $table->text('response');
            $table->text('descriptions')->nullable();
            $table->timestamps();
        });

        Schema::create('complaint_vote', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('user_id')->index();
            $table->unsignedBigInteger('complaint_id')->index();
            $table->enum('vote_type', array_column(Vote_Type::cases(), 'value'));
            $table->timestamps();
            $table->unique(['user_id', 'complaint_id']);
        });

        Schema::create('complaint_history', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('complaint_id')->index();
            $table->unsignedBigInteger('user_id')->index();
            $table->unsignedBigInteger('department_id')->index();
            $table->unsignedBigInteger('response_id')->index();
            $table->string('action_description', 255);
            $table->timestamps();
        });

        Schema::create('comment', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('complaint_id')->index();
            $table->unsignedBigInteger('user_id')->index();
            $table->text('description'); // Dihilangkan parameter panjang yang salah
            $table->timestamps();
        });

        Schema::create('rating', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('complaint_id')->index();
            $table->unsignedBigInteger('user_id')->index();
            $table->unsignedTinyInteger('rating');
            $table->text('comment')->nullable();
            $table->timestamps();
            $table->unique(['complaint_id', 'user_id']);
        });

        Schema::table('complaints', function ($table) {
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('category_id')->references('id')->on('complaint_category')->onUpdate('cascade')->onDelete('cascade');

            $table->foreign('attachment_id')->references('id')->on('complaint_attachment')->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::table('complaint_response', function ($table) {
            $table->foreign('complaint_id')->references('id')->on('complaints')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('department_id')->references('id')->on('departments')->onUpdate('cascade')->onDelete('cascade'); // Contoh jika nama tabelnya lapor_pak_departments dan foreign key bisa null
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');             // Contoh jika nama tabelnya lapor_pak_users dan foreign key bisa null
        });

        Schema::table('complaint_vote', function ($table) {
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('complaint_id')->references('id')->on('complaints')->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::table('complaint_history', function ($table) {
            $table->foreign('complaint_id')->references('id')->on('complaints')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('department_id')->references('id')->on('departments')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('response_id')->references('id')->on('complaint_response')->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::table('comment', function ($table) {
            $table->foreign('complaint_id')->references('id')->on('complaints')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
        });

        Schema::table('rating', function ($table) {
            $table->foreign('complaint_id')->references('id')->on('complaints')->onUpdate('cascade')->onDelete('cascade');
            $table->foreign('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
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
            if (Schema::hasColumn('complaints', 'user_id')) {
                $table->dropForeign(['user_id']);
            }

            if (Schema::hasColumn('complaints', 'category_id')) {
                $table->dropForeign(['category_id']);
            }

            if (Schema::hasColumn('complaints', 'attachment_id')) {
                $table->dropForeign(['attachment_id']);
            }

        });
        Schema::table('complaint_attachment', function (Blueprint $table) {
            if (Schema::hasColumn('complaint_attachment', 'complaint_id')) {
                $table->dropForeign(['complaint_id']);
            }

        });
        Schema::table('complaint_response', function (Blueprint $table) {
            if (Schema::hasColumn('complaint_response', 'complaint_id')) {
                $table->dropForeign(['complaint_id']);
            }

            if (Schema::hasColumn('complaint_response', 'department_id')) {
                $table->dropForeign(['department_id']);
            }

            if (Schema::hasColumn('complaint_response', 'user_id')) {
                $table->dropForeign(['user_id']);
            }

        });
        Schema::table('complaint_vote', function (Blueprint $table) {
            if (Schema::hasColumn('complaint_vote', 'user_id')) {
                $table->dropForeign(['user_id']);
            }

            if (Schema::hasColumn('complaint_vote', 'complaint_id')) {
                $table->dropForeign(['complaint_id']);
            }

        });
        Schema::table('complaint_history', function (Blueprint $table) {
            if (Schema::hasColumn('complaint_history', 'complaint_id')) {
                $table->dropForeign(['complaint_id']);
            }

            if (Schema::hasColumn('complaint_history', 'user_id')) {
                $table->dropForeign(['user_id']);
            }

            if (Schema::hasColumn('complaint_history', 'department_id')) {
                $table->dropForeign(['department_id']);
            }

            if (Schema::hasColumn('complaint_history', 'response_id')) {
                $table->dropForeign(['response_id']);
            }

        });

        Schema::table('comment', function (Blueprint $table) {
            if (Schema::hasColumn('comment', 'complaint_id')) {
                $table->dropForeign(['complaint_id']);
            }

            if (Schema::hasColumn('comment', 'user_id')) {
                $table->dropForeign(['user_id']);
            }

        });
        Schema::table('rating', function (Blueprint $table) {
            if (Schema::hasColumn('rating', 'complaint_id')) {
                $table->dropForeign(['complaint_id']);
            }

            if (Schema::hasColumn('rating', 'user_id')) {
                $table->dropForeign(['user_id']);
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