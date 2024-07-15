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
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('name_opd');
            $table->string('phone')->nullable();
            $table->string('email')->unique();
            $table->string('alamat')->nullable();
            $table->string('role')->default('user_opd');
            $table->string('password');
            $table->rememberToken();
            $table->string('profile_photo_path', 2048)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('email_verified_at');
            $table->dropColumn('current_team_id');
            $table->dropColumn('two_factor_secret');
            $table->dropColumn('two_factor_recovery_codes');
            $table->dropColumn('two_factor_confirmed_at');
        });
    }
};
