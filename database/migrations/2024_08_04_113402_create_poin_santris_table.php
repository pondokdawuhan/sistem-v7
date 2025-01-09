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
        Schema::create('poin_santris', function (Blueprint $table) {
            $table->id();
            $table->foreignId('santri_id');
            $table->integer('poin_formal')->default(0);
            $table->integer('poin_madin')->default(0);
            $table->integer('poin_mmq')->default(0);
            $table->integer('poin_asrama')->default(0);
            $table->integer('poin_ekstrakurikuler')->default(0);
            $table->integer('poin_ibadah')->default(0);
            $table->integer('poin_pelanggaran')->default(0);
            $table->integer('poin_dikurangi')->default(0);
            $table->integer('jumlah')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('poin_santris');
    }
};
