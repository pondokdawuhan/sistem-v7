<?php

namespace App\Livewire\Santri;

use App\Models\Santri;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class SantriEdit extends Component
{
  use WithFileUploads;
    public $santri;
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

  public function mount(Santri $santri)
  {
    $this->santri = $santri;

   $this->lembaga_id = $santri->dataSantri->lembaga_id;
   $this->aktif = $santri->dataSantri->aktif;
   $this->tahun_masuk = $santri->dataSantri->tahun_masuk;
   $this->nisn = $santri->dataSantri->nisn;
   $this->nis = $santri->dataSantri->nis;
   $this->nik = $santri->dataSantri->nik;
   $this->name = $santri->name;
   $this->jenis_kelamin = $santri->dataSantri->jenis_kelamin;
   $this->tempat_lahir = $santri->dataSantri->tempat_lahir;
   $this->tanggal_lahir = $santri->dataSantri->tanggal_lahir;
   $this->status_anak = $santri->dataSantri->status_anak;
   $this->anak_ke = $santri->dataSantri->anak_ke;
   $this->jumlah_saudara = $santri->dataSantri->jumlah_saudara;
   $this->provinsi = $santri->dataSantri->provinsi;
   $this->kabupaten = $santri->dataSantri->kabupaten;
   $this->kecamatan = $santri->dataSantri->kecamatan;
   $this->desa = $santri->dataSantri->desa;
   $this->jalan = $santri->dataSantri->jalan;
   $this->dusun = $santri->dataSantri->dusun;
   $this->rt = $santri->dataSantri->rt;
   $this->rw = $santri->dataSantri->rw;
   $this->kodepos = $santri->dataSantri->kodepos;
   $this->no_kk = $santri->dataSantri->no_kk;
   $this->nama_ayah = $santri->dataSantri->nama_ayah;
   $this->nik_ayah = $santri->dataSantri->nik_ayah;
   $this->pendidikan_ayah = $santri->dataSantri->pendidikan_ayah;
   $this->pekerjaan_ayah = $santri->dataSantri->pekerjaan_ayah;
   $this->penghasilan_ayah = $santri->dataSantri->penghasilan_ayah;
   $this->nama_ibu = $santri->dataSantri->nama_ibu;
   $this->nik_ibu = $santri->dataSantri->nik_ibu;
   $this->pendidikan_ibu = $santri->dataSantri->pendidikan_ibu;
   $this->pekerjaan_ibu = $santri->dataSantri->pekerjaan_ibu;
   $this->penghasilan_ibu = $santri->dataSantri->penghasilan_ibu;
   $this->no_hp = $santri->dataSantri->no_hp;
   $this->email = $santri->dataSantri->email;
   $this->nama_wali = $santri->dataSantri->nama_wali;
   $this->no_wali = $santri->dataSantri->no_wali;
   $this->selectedKelasFormals = $santri->kelas_formal_id;
   $this->selectedKelasMadins = $santri->kelas_madin_id;
   $this->selectedKelasMmqs = $santri->kelas_mmq_id;
   $this->selectedKelasAsramas = $santri->kelas_asrama_id;
   $this->riwayat_penyakit = $santri->dataSantri->riwayat_penyakit;
   $this->riwayat_sd = $santri->dataSantri->riwayat_sd;
   $this->riwayat_smp = $santri->dataSantri->riwayat_smp;
   $this->riwayat_sma = $santri->dataSantri->riwayat_sma;
   $this->riwayat_pondok = $santri->dataSantri->riwayat_pondok;
  }

  public function edit()
    {
      $data = $this->validate();
      $this->santri->update($data);
      
      if ($data['foto']) {
        
        if ($this->santri->dataSantri->foto) {
          Storage::delete($this->santri->dataSantri->foto);
        }
        $data['foto'] = $this->foto->storeAs(path: 'foto-santris', name: $this->santri->id . Str::random(15) . '.jpg');
      } else {
        $data['foto'] = $this->santri->dataSantri->foto;
      }

      $this->santri->dataSantri->update($data);

        if ($data['selectedKelasFormals']) {
          foreach (array($data['selectedKelasFormals']) as $kelas) {
            if ($kelas) {
              $this->santri->update([
                'kelas_formal_id' => $kelas
              ]);
            }
          }
        }

        if ($data['selectedKelasMadins']) {
          foreach (array($data['selectedKelasMadins']) as $kelas) {
            if($kelas) {
              $this->santri->update([
                'kelas_madin_id' => $kelas
              ]);
            }
          }
        }

        if ($data['selectedKelasMmqs']) {
          foreach (array($data['selectedKelasMmqs']) as $kelas) {
            if ($kelas) {
                
              $this->santri->update([
                'kelas_mmq_id' => $kelas
              ]);
            }
          }
        }

        if ($data['selectedKelasAsramas']) {
          foreach (array($data['selectedKelasAsramas']) as $kelas) {
            if ($kelas) {
              $this->santri->update([
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
        session()->flash('success', 'Data Santri berhasil diubah');
        return $this->redirect('/santri', navigate:true);
    }

    public function render()
    {
        return view('livewire.santri.santri-edit')->title('Edit Data Santri ' . $this->santri->name);
    }
}
