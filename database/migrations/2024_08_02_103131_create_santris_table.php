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
        Schema::create('santris', function (Blueprint $table) {
             $table->id();
            $table->string('name');
            $table->string('username')->unique();
            $table->string('email')->unique()->nullable();
            $table->string('password');
            $table->string('initial_password');
            $table->string('google_id')->nullable();
            $table->string('google_user_token')->nullable();
            $table->foreignId('kelas_formal_id')->nullable();
            $table->foreignId('kelas_madin_id')->nullable();
            $table->foreignId('kelas_mmq_id')->nullable();
            $table->foreignId('kelas_asrama_id')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('santris');
    }
};
