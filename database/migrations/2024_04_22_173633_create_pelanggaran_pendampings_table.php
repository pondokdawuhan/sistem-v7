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
        Schema::create('pelanggaran_pendampings', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->foreignId('referensi_poin_id');
            $table->date('tanggal');
            $table->string('keterangan');
            $table->integer('poin');
            $table->integer('pelanggaran_id')->unique()->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pelanggaran_pendampings');
    }
};
