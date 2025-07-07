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
            $table->string('nim', 50)->unique()->nullable();
            $table->string('name', 255);
            $table->string('email', 255)->unique();
            $table->string('google_id')->nullable();
            $table->string('password', 255);
            $table->enum('role', array_column(Role::cases(), 'value'));
            $table->string('phone_number', 20)->nullable();
            $table->string('profile_picture', 255)->nullable();
            $table->string('faculty', 100)->nullable();
            $table->string('major', 100)->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->rememberToken();
            $table->timestamps();
        });

        Schema::create('password_reset_tokens', function (Blueprint $table) {
            $table->string('email');
            $table->string('token')->primary();
            $table->timestamp('created_at')->nullable();
        });

        Schema::create('departments', function (Blueprint $table) {
            $table->id(); // ID : int(11)
            $table->string('name', 255)->unique();
            $table->string('password', 255);
            $table->text('description', 255)->nullable();
            $table->string('email')->nullable();
            $table->string('phone_number', 20)->nullable();
            $table->enum('role', array_column(Role::cases(), 'value'));
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('users');
        Schema::dropIfExists('departments');
        Schema::dropIfExists('password_reset_tokens');
    }
};
