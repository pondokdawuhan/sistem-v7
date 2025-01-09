<?php

namespace App\Livewire\Profil;

use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Storage;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class ProfilEdit extends Component
{
  use WithFileUploads;
    public $user;

    use WithFileUploads;
    #[Validate('required', message: ':attribute wajib dipilih')]
    public $status;
    #[Validate('required', message: ':attribute wajib dipilih')]
    public $aktif;
    #[Validate('required', message: ':attribute wajib diisi')]
    public $tahun_masuk;
    #[Validate('nullable')]
    public $niy;
    #[Validate('nullable')]
    public $nuptk;
    #[Validate('nullable')]
    public $nik;
    #[Validate('required', message: ':attribute wajib diisi')]
    #[Validate('min:3', message: ':attribute diisi minimal 3 karakter')]
    public $name;
    #[Validate('required', message: ':attribute wajib dipilih')]
    public $jenis_kelamin;
    #[Validate('nullable')]
    public $tempat_lahir;
    #[Validate('nullable')]
    public $tanggal_lahir;
    #[Validate('nullable')]
    public $nama_ibu;
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
    public $riwayat_sd;
    #[Validate('nullable')]
    public $riwayat_smp;
    #[Validate('nullable')]
    public $riwayat_sma;
    #[Validate('nullable')]
    public $riwayat_kuliah_s1;
    #[Validate('nullable')]
    public $riwayat_kuliah_s2;
    #[Validate('nullable')]
    public $riwayat_kuliah_s3;
    #[Validate('nullable')]
    public $riwayat_pondok;
    #[Validate('required', message: ':attribute wajib diisi')]
    public $no_hp;
    #[Validate('nullable', message: ':attribute boleh kosong')]
    #[Validate('email', message: ':attribute wajib diisi email yang valid')]
    public $email;

    public function mount(User $username)
     {
      $this->user = $username;
      
      $this->status = $username->dataUser->status;
      $this->aktif = $username->dataUser->aktif;    
      $this->tahun_masuk = $username->dataUser->tahun_masuk;
      $this->niy = $username->dataUser->niy;
      $this->nuptk = $username->dataUser->nuptk;
      $this->nik = $username->dataUser->nik;
      $this->name = $username->name;
      $this->jenis_kelamin = $username->dataUser->jenis_kelamin;
      $this->tempat_lahir = $username->dataUser->tempat_lahir;
      $this->tanggal_lahir =  $username->dataUser->tanggal_lahir;
      $this->nama_ibu = $username->dataUser->nama_ibu;
      $this->provinsi = $username->dataUser->provinsi;
      $this->kabupaten = $username->dataUser->kabupaten;
      $this->kecamatan = $username->dataUser->kecamatan;
      $this->desa = $username->dataUser->desa;
      $this->jalan = $username->dataUser->jalan;
      $this->dusun = $username->dataUser->dusun;
      $this->rt = $username->dataUser->rt;
      $this->rw = $username->dataUser->rw;
      $this->kodepos = $username->dataUser->kodepos;
      $this->riwayat_sd = $username->dataUser->riwayat_sd;
      $this->riwayat_smp = $username->dataUser->riwayat_smp;
      $this->riwayat_sma = $username->dataUser->riwayat_sma;
      $this->riwayat_kuliah_s1 = $username->dataUser->riwayat_kuliah_s1;
      $this->riwayat_kuliah_s2 = $username->dataUser->riwayat_kuliah_s2;
      $this->riwayat_kuliah_s3 = $username->dataUser->riwayat_kuliah_s3;
      $this->riwayat_pondok = $username->dataUser->riwayat_pondok;
      $this->no_hp = $username->dataUser->no_hp;
      $this->email = $username->dataUser->email;
      
    }

     public function edit()
    {
      $data = $this->validate();

      $this->user->update($data);

      $this->user->dataUser->update($data);


        session()->flash('success', 'Data berhasil diubah');

        return $this->redirect('/profil/' . $this->user->username, navigate:true);

    }

    public function render()
    {
        return view('livewire.profil.profil-edit')->title('Edit Profil ' . $this->user->name);
    }
}
