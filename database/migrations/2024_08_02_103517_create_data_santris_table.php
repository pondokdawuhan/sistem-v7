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
        Schema::create('data_santris', function (Blueprint $table) {
            $table->id();
            $table->foreignId('lembaga_id');
            $table->string('santri_id');
            $table->boolean('aktif')->default(true);
            $table->string('nik')->nullable();
            $table->string('nisn')->nullable();
            $table->string('nis')->nullable();
            $table->string('tahun_masuk');
            $table->string('tempat_lahir')->nullable();
            $table->date('tanggal_lahir')->nullable();
            $table->string('jenis_kelamin')->nullable();
            $table->string('status_anak')->nullable();
            $table->string('anak_ke')->nullable();
            $table->string('jumlah_saudara')->nullable();
            $table->string('no_kk')->nullable();
            $table->string('nama_ayah')->nullable();
            $table->string('nik_ayah')->nullable();
            $table->string('pendidikan_ayah')->nullable();
            $table->string('pekerjaan_ayah')->nullable();
            $table->string('penghasilan_ayah')->nullable();
            $table->string('nama_ibu')->nullable();
            $table->string('nik_ibu')->nullable();
            $table->string('pendidikan_ibu')->nullable();
            $table->string('pekerjaan_ibu')->nullable();
            $table->string('penghasilan_ibu')->nullable();
            $table->string('no_hp')->nullable();
            $table->string('nama_wali')->nullable();
            $table->string('no_wali')->nullable();
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
            $table->string('riwayat_penyakit')->nullable();
            $table->string('riwayat_sd')->nullable();
            $table->string('riwayat_smp')->nullable();
            $table->string('riwayat_sma')->nullable();
            $table->string('riwayat_pondok')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('data_santris');
    }
};
