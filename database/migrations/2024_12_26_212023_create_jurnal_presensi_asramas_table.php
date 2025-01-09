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
        Schema::create('jurnal_presensi_asramas', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lembaga_id');
            $table->foreignId('user_id');
            $table->foreignId('kelas_id');
            $table->string('kegiatan');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jurnal_presensi_asramas');
    }
};
