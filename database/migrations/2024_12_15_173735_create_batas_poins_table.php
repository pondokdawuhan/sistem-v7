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
        Schema::create('batas_poins', function (Blueprint $table) {
            $table->id();
            $table->string('jenis_poin');
            $table->integer('batas_aman');
            $table->integer('batas_waspada');
            $table->integer('batas_bahaya');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('batas_poins');
    }
};
