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
        Schema::create('izin_asatidzs', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lembaga_id');
            $table->foreignId('user_id');
            $table->date('tanggal_mulai');
            $table->date('tanggal_selesai');
            $table->string('keperluan');
            $table->text('tugas');
            $table->boolean('cek_kepala')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('izin_asatidzs');
    }
};
