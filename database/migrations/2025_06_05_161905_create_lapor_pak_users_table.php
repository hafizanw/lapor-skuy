<?php

use App\Enums\Role;
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
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // ID : int(11)
            $table->string('NIM_NIDN', 50)->unique();
            $table->string('Full_Name', 255);
            $table->string('Email', 255)->unique();
            $table->string('Password', 255);
            $table->string('Phone_Number', 20)->nullable();
            $table->string('Profile_Picture', 255)->nullable();
            $table->string('Faculty', 100)->nullable();
            $table->string('Major', 100)->nullable();
            $table->timestamp('email_verified_at')->nullable(); // Standard Laravel
            $table->rememberToken();                            // Standard Laravel
            $table->timestamps();                               // created_at and updated_at
        });

        Schema::create('administrator', function (Blueprint $table) {
            $table->id(); // ID : int(11)
            $table->string('Username', 255)->unique();
            $table->string('Password', 255);
            $table->string('Picture', 255)->nullable();
            $table->timestamps();
        });
        Schema::create('departments', function (Blueprint $table) {
            $table->id(); // ID : int(11)
            $table->string('Name_Department', 255)->unique();
            $table->text('Description', 255)->nullable();
            $table->string('Email')->nullable();
            $table->string('Phone_Number', 20)->nullable();
            $table->enum('Role', array_column(Role::cases(), 'value'));
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('administrator');
        Schema::dropIfExists('departments');
    }
};
