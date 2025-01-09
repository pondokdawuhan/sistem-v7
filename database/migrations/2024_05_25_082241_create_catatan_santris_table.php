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
        Schema::create('catatan_santris', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lembaga_id');
            $table->foreignId('santri_id');
            $table->foreignId('user_id');
            $table->date('tanggal');
            $table->string('catatan');
            $table->string('kategori');
            $table->boolean('masuk_rekomendasi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('catatan_santris');
    }
};
