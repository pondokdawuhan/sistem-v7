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
        Schema::create('haid_santris', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lembaga_id');
            $table->foreignId('santri_id');
            $table->dateTimeTz('tanggal_mulai');
            $table->dateTimeTz('tanggal_maksimal');
            $table->boolean('keluar_darah')->default(true);
            $table->string('status')->default('Haid');
            $table->dateTimeTz('tanggal_suci')->nullable();
            $table->integer('lama_keluar_darah')->default(0);
            $table->boolean('watching_bot');
            $table->string('watching_table')->nullable();
            $table->dateTimeTz('tanggal_terakhir_istihadloh')->nullable();
            $table->dateTimeTz('tanggal_terakhir_suci')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('haid_santris');
    }
};
