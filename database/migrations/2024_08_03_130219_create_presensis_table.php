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
        Schema::create('presensis', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lembaga_id');
            $table->foreignId('pelajaran_id');
            $table->foreignId('kelas_id');
            $table->foreignId('santri_id');
            $table->foreignId('user_id');
            $table->tinyInteger('jam');
            $table->string('keterangan');
            $table->boolean('is_guru_piket')->default(false);
            $table->integer('pelanggaran_id')->unique()->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('presensis');
    }
};
