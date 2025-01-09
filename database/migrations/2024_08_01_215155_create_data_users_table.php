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
        Schema::create('data_users', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id');
            $table->boolean('aktif')->default(true);
            $table->string('jenis_kelamin');
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('tahun_masuk')->nullable();
            $table->string('niy')->nullable();
            $table->string('nik')->nullable();
            $table->string('nuptk')->nullable();
            $table->string('status')->nullable();
            $table->string('nama_ibu')->nullable();
            $table->string('riwayat_sd')->nullable();
            $table->string('riwayat_smp')->nullable();
            $table->string('riwayat_sma')->nullable();
            $table->string('riwayat_pondok')->nullable();
            $table->string('riwayat_kuliah_s1')->nullable();
            $table->string('riwayat_kuliah_s2')->nullable();
            $table->string('riwayat_kuliah_s3')->nullable();
            $table->string('jalan')->nullable();
            $table->string('dusun')->nullable();
            $table->string('rt')->nullable();
            $table->string('rw')->nullable();
            $table->string('desa')->nullable();
            $table->string('kecamatan')->nullable();
            $table->string('kabupaten')->nullable();
            $table->string('provinsi')->nullable();
            $table->string('kodepos')->nullable();
            $table->string('foto')->nullable();
            $table->string('no_hp')->default(0);
            $table->string('notifikasiKhusus')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_users');
    }
};
