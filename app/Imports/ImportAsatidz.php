<?php

namespace App\Imports;

use App\Models\User;
use App\Models\Santri;
use App\Models\DataUser;
use App\Models\DataSantri;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ImportAsatidz implements ToModel, WithHeadingRow
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
          $username = generateUsernameUser();
        }

        $password = Str::password(8, symbols:false);
        $user = User::create([
            'name' => $row['nama'],
            'username' => $username,
            'password' => Hash::make($password),
            'email' => $row['email'],
            'initial_password' => $password
        ]);


        DataUser::create([
            'user_id' => $user->id,
            'aktif' => true,
            'tahun_masuk' => $row['tahun_masuk'],
            'jenis_kelamin' => $row['jenis_kelamin'],
            'niy' => $row['niy'],
            'nik' => $row['nik'],
            'nuptk' => $row['nuptk'],
            'tempat_lahir' => $row['tempat_lahir'],
            'tanggal_lahir' => $row['tanggal_lahir'],
            'nama_ibu' => $row['nama_ibu'],
            'no_hp' => nomorHp($row['no_hp']),
            'jalan' => $row['jalan'],
            'dusun' => $row['dusun'],
            'rt' => $row['rt'],
            'rw' => $row['rw'],
            'desa' => $row['desa'],
            'kecamatan' => $row['kecamatan'],
            'kabupaten' => $row['kabupaten'],
            'provinsi' => $row['provinsi'],
            'kode_pos' => $row['kode_pos'],
        ]);
    }
}
