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
        Schema::create('nilai_santris', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lembaga_id');
            $table->foreignId('santri_id');
            $table->foreignId('user_id');
            $table->foreignId('pelajaran_id');
            $table->integer('semester');
            $table->string('tahun');
            $table->integer('uh1')->default(0);
            $table->integer('uh2')->default(0);
            $table->integer('uh3')->default(0);
            $table->integer('uh4')->default(0);
            $table->integer('uh5')->default(0);
            $table->integer('pts')->default(0);
            $table->integer('pas')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('nilai_santris');
    }
};
