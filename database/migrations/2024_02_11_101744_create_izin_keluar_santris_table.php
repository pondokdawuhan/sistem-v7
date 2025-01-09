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
        Schema::create('izin_keluar_santris', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lembaga_id');
            $table->foreignId('santri_id');
            $table->foreignId('user_id');
            $table->dateTimeTz('waktu_mulai');
            $table->dateTimeTz('waktu_selesai');
            $table->string('keperluan');
            $table->dateTimeTz('waktu_kembali')->nullable();
            $table->boolean('cek_satpam')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('izin_keluar_santris');
    }
};
