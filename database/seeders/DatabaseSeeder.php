<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Kelas;
use App\Models\Lembaga;
use App\Models\DataUser;
use App\Models\BatasPoin;
use App\Models\Pelajaran;
use Illuminate\Support\Str;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\ReferensiPoin;
use Illuminate\Routing\Route;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Permission;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();
        $password = Str::password(8, symbols:false);
        User::create([
            'name' => 'Super Admin',
            'username' => 'superadmin',
            'password' => Hash::make($password),
            'email' => 'pondokdawuhanblitar@gmail.com',
            'initial_password' => $password
        ]);

        DataUser::create([
          'user_id' => 1,
          'jenis_kelamin' => 'Laki-laki',
          'status' => 'GURU TETAP YAYASAN (GTY)'
        ]);

        // $this->call(SantriSeeder::class);

        // Lembaga::create([
        //   'nama' => 'SMP Bustanul Mutaallimin',
        //   'nama_singkat' => 'SMP BM',
        //   'jenis_lembaga' => 'FORMAL',
        //   'jam' => 8
        // ]);

        // Lembaga::create([
        //   'nama' => 'MADIN Bustanul Mutaallimin',
        //   'nama_singkat' => 'MADIN BM',
        //   'jenis_lembaga' => 'MADIN',
        //   'jam' => 2
        // ]);

        // Kelas::create([
        //   'lembaga_id' => 1,
        //   'nama' => '7A',
        //   'tingkat' => 7
        // ]);

        // Kelas::create([
        //   'lembaga_id' => 1,
        //   'nama' => '7B',
        //   'tingkat' => 7
        // ]);

        // Kelas::create([
        //   'lembaga_id' => 2,
        //   'nama' => '1A',
        //   'tingkat' => 1
        // ]);

        // Kelas::create([
        //   'lembaga_id' => 2,
        //   'nama' => '1B',
        //   'tingkat' => 1
        // ]);

        // Pelajaran::create([
        //   'lembaga_id' => 1,
        //   'nama' => 'Matematika'
        // ]);

        // Pelajaran::create([
        //   'lembaga_id' => 1,
        //   'nama' => 'IPA'
        // ]);

        // Pelajaran::create([
        //   'lembaga_id' => 2,
        //   'nama' => 'Imrithi'
        // ]);

        // Pelajaran::create([
        //   'lembaga_id' => 2,
        //   'nama' => 'Alfiyah'
        // ]);

        // ReferensiPoin::create([
        //   'name' => 'Tidak mengikuti kegiatan tanpa izin'
        // ]);

        // BatasPoin::create([
        //   'jenis_poin' => 'poin_formal',
        //   'batas_aman' => 24,
        //   'batas_waspada' => 56,
        //   'batas_bahaya' => 100
        // ]);

        
        $this->call(RolePermissionSeeder::class);
    }
}
