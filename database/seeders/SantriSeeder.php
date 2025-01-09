<?php

namespace Database\Seeders;

use App\Models\DataSantri;
use App\Models\Santri;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class SantriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Santri::factory(100)->create();

        for ($i=1; $i < 51; $i++) { 
          DataSantri::create([
            'santri_id' => $i,
            'jenjang' => 'SMP Bustanul Mutaallimin',
            'tahun_masuk' => 2024,
            'jenis_kelamin' => 'Laki-laki'
          ]);
        }

        for ($i=51; $i < 101; $i++) { 
          DataSantri::create([
            'santri_id' => $i,
            'jenjang' => 'SMP Bustanul Mutaallimin',
            'tahun_masuk' => 2024,
            'jenis_kelamin' => 'Perempuan'
          ]);
        }
    }
}
