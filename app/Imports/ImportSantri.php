<?php

namespace App\Imports;

use Stringable;
use App\Models\Santri;
use App\Models\DataSantri;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ImportSantri implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        if (isset($row['username'])) {
          $username = $row['username'];
        } else {
          $username = generateUsernameSantri();
        }
        $password = Str::password(8, symbols:false);
        $santri = Santri::create([
            'name' => $row['nama'],
            'username' => $username,
            'password' => Hash::make($password),
            'initial_password' => $password,
            'email' => $row['email']
        ]);


        DataSantri::create([
            'santri_id' => $santri->id,
            'aktif' => true,
            'lembaga_id' => $row['lembaga'],
            'tahun_masuk' => $row['tahun_masuk'],
            'jenis_kelamin' => $row['jenis_kelamin'],
            'nik' => $row['nik'],
            'nisn' => $row['nisn'],
            'nis' => $row['nis'],
            'tempat_lahir' => $row['tempat_lahir'],
            'tanggal_lahir' => $row['tanggal_lahir'],
            'status_anak' => $row['status_anak'],
            'anak_ke' => $row['anak_ke'],
            'jumlah_saudara' => $row['jumlah_saudara'],
            'no_kk' => $row['no_kk'],
            'nama_ayah' => $row['nama_ayah'],
            'nik_ayah' => $row['nik_ayah'],
            'pendidikan_ayah' => $row['pendidikan_ayah'],
            'pekerjaan_ayah' => $row['pekerjaan_ayah'],
            'penghasilan_ayah' => $row['penghasilan_ayah'],
            'nama_ibu' => $row['nama_ibu'],
            'nik_ibu' => $row['nik_ibu'],
            'pendidikan_ibu' => $row['pendidikan_ibu'],
            'pekerjaan_ibu' => $row['pekerjaan_ibu'],
            'penghasilan_ibu' => $row['penghasilan_ibu'],
            'no_hp' => nomorHp($row['no_hp']),
            'nama_wali' => $row['nama_wali'],
            'no_wali' => nomorHp($row['no_wali']),
            'jalan' => $row['jalan'],
            'dusun' => $row['dusun'],
            'rt' => $row['rt'],
            'rw' => $row['rw'],
            'desa' => $row['desa'],
            'kecamatan' => $row['kecamatan'],
            'kabupaten' => $row['kabupaten'],
            'provinsi' => $row['provinsi'],
            'kode_pos' => $row['kode_pos'],
            'riwayat_penyakit' => $row['riwayat_penyakit'],
            'riwayat_sd' => $row['asal_sd'],
            'riwayat_smp' => $row['asal_smp'],
            'riwayat_sma' => $row['asal_sma'],
            'riwayat_pondok' => $row['riwayat_pondok'],
        ]);
    }
}
