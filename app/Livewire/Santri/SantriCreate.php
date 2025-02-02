<?php

namespace App\Livewire\Santri;

use App\Models\Santri;
use Livewire\Component;
use App\Models\DataSantri;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cache;

class SantriCreate extends Component
{
    use WithFileUploads;

    #[Validate('required', message: ':attribute wajib dipilih')]
    public $lembaga_id;
    #[Validate('required', message: ':attribute wajib dipilih')]
    public $aktif;
    #[Validate('required', message: ':attribute wajib diisi')]
    public $tahun_masuk;
    #[Validate('nullable')]
    public $nisn;
    #[Validate('nullable')]
    public $nis;
    #[Validate('nullable')]
    public $nik;
    #[Validate('required', message: 'wajib diisi')]
    #[Validate('min:3', message: 'minimal 3 karakter')]
    public $name;
    #[Validate('required', message: 'wajib dipilih')]
    public $jenis_kelamin;
    #[Validate('nullable')]
    public $tempat_lahir;
    #[Validate('nullable')]
    public $tanggal_lahir;
    #[Validate('nullable')]
    public $status_anak;
    #[Validate('nullable')]
    public $anak_ke;
    #[Validate('nullable')]
    public $jumlah_saudara;
    #[Validate('image', message: 'tipe tidak valid')]
    #[Validate('file', message: 'tipe tidak valid')]
    #[Validate('max:1024', message: 'ukuran melebihi 1MB')]
    #[Validate('nullable', message: 'ukuran melebihi 1MB')]
    public $foto;
    #[Validate('nullable')]
    public $provinsi;
    #[Validate('nullable')]
    public $kabupaten;
    #[Validate('nullable')]
    public $kecamatan;
    #[Validate('nullable')]
    public $desa;
    #[Validate('nullable')]
    public $jalan;
    #[Validate('nullable')]
    public $dusun;
    #[Validate('nullable')]
    public $rt;
    #[Validate('nullable')]
    public $rw;
    #[Validate('nullable')]
    public $kodepos;
    #[Validate('nullable')]
    public $no_kk;
    #[Validate('nullable')]
    public $nama_ayah;
    #[Validate('nullable')]
    public $nik_ayah;
    #[Validate('nullable')]
    public $pendidikan_ayah;
    #[Validate('nullable')]
    public $pekerjaan_ayah;
    #[Validate('nullable')]
    public $penghasilan_ayah;
    #[Validate('nullable')]
    public $nama_ibu;
    #[Validate('nullable')]
    public $nik_ibu;
    #[Validate('nullable')]
    public $pendidikan_ibu;
    #[Validate('nullable')]
    public $pekerjaan_ibu;
    #[Validate('nullable')]
    public $penghasilan_ibu;
    #[Validate('required', message: ':attribute wajib diisi')]
    public $no_hp;
    #[Validate('email', message: ':attribute wajib diisi email yang valid')]
    #[Validate('nullable')]
    public $email;
    #[Validate('nullable')]
    public $nama_wali;
    #[Validate('nullable')]
    public $no_wali;
    #[Validate('nullable')]
    public $selectedKelasFormals;
    #[Validate('nullable')]
    public $selectedKelasMadins;
    #[Validate('nullable')]
    public $selectedKelasMmqs;
    #[Validate('nullable')]
    public $selectedKelasAsramas;
    #[Validate('nullable')]
    public $riwayat_penyakit;
    #[Validate('nullable')]
    public $riwayat_sd;
    #[Validate('nullable')]
    public $riwayat_smp;
    #[Validate('nullable')]
    public $riwayat_sma;
    #[Validate('nullable')]
    public $riwayat_pondok;

    public function tambah()
    {
      $data = $this->validate();
      
      $username = generateUsernameSantri();
      $password = Str::password(8, symbols:false);
      $data['username'] = $username;
      $data['password'] = Hash::make($password);
      $data['initial_password'] = $password;
        
        
      $santri = Santri::create($data);

      $data['santri_id'] = $santri->id;

      if ($this->foto) {
            $foto = $this->foto->storeAs(path: 'foto-santris', name: $santri->id . Str::random(15) . '.jpg');
            $data['foto'] = $foto;
          }

      DataSantri::create($data);

        if ($data['selectedKelasFormals']) {
          foreach (array($data['selectedKelasFormals']) as $kelas) {
            if ($kelas) {
              $santri->update([
                'kelas_formal_id' => $kelas
              ]);
            }
          }
        }

        if ($data['selectedKelasMadins']) {
          foreach (array($data['selectedKelasMadins']) as $kelas) {
            if($kelas) {
              $santri->update([
                'kelas_madin_id' => $kelas
              ]);
            }
          }
        }

        if ($data['selectedKelasMmqs']) {
          foreach (array($data['selectedKelasMmqs']) as $kelas) {
            if ($kelas) {
                
              $santri->update([
                'kelas_mmq_id' => $kelas
              ]);
            }
          }
        }

        if ($data['selectedKelasAsramas']) {
          foreach (array($data['selectedKelasAsramas']) as $kelas) {
            if ($kelas) {
              $santri->update([
                'kelas_asrama_id' => $kelas
              ]);
            }
          }
        }
       
        Cache::forget('santri_aktif');
        Cache::forget('santri_kota');
        Cache::forget('santri_kab');
        Cache::forget('santri_luar');
        Cache::forget('santri_putra');
        Cache::forget('santri_putri');

        session()->flash('success', 'Data Santri berhasil ditambahkan');
        return $this->redirect('/santri', navigate:true);
    }

    public function render()
    {
        return view('livewire.santri.santri-create')->title('Tambah Data Santri');
    }
}
