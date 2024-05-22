<?php

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
        Schema::create('profiles', function (Blueprint $table) {
            $table->id();
            $table->string('first_name');
            $table->string('middle_initial');
            $table->string('last_name');
            $table->string('user_name');
            $table->string('user_email');
            $table->string('user_type');
            $table->timestamps();

            // $table->string('user_profile_photo_path')->nullable();
            // $table->string('password');
            // $table->string('password_confirmation');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('profiles');
    }
};
