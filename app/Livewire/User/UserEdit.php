<?php

namespace App\Livewire\User;

use App\Models\User;
use App\Models\Kelas;
use App\Models\Lembaga;
use Livewire\Component;
use App\Models\DataUser;
use App\Models\Pelajaran;
use Illuminate\Support\Str;
use Livewire\WithFileUploads;
use App\Models\Ekstrakurikuler;
use Livewire\Attributes\Validate;
use Spatie\Permission\Models\Role;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class UserEdit extends Component
{
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
    #[Validate('required', message: 'role wajib dipilih minimal 1')]
    public $selectedRoles;
    #[Validate('required', message: 'lembaga wajib dipilih minimal 1')]
    public $selectedLembagas = [];
    #[Validate('nullable')]
    public $notifikasiKhusus;
    #[Validate('nullable')]
    public $selectedKelas = [];
    #[Validate('nullable')]
    public $selectedPelajaran = [];
    #[Validate('nullable')]
    public $selectedEkstrakurikuler = [];

    public function mount(User $user)
    {
      $this->user = $user;
      
      $this->status = $user->dataUser->status;
      $this->aktif = $user->dataUser->aktif;    
      $this->tahun_masuk = $user->dataUser->tahun_masuk;
      $this->niy = $user->dataUser->niy;
      $this->nuptk = $user->dataUser->nuptk;
      $this->nik = $user->dataUser->nik;
      $this->name = $user->name;
      $this->jenis_kelamin = $user->dataUser->jenis_kelamin;
      $this->tempat_lahir = $user->dataUser->tempat_lahir;
      $this->tanggal_lahir =  $user->dataUser->tanggal_lahir;
      $this->nama_ibu = $user->dataUser->nama_ibu;
      $this->provinsi = $user->dataUser->provinsi;
      $this->kabupaten = $user->dataUser->kabupaten;
      $this->kecamatan = $user->dataUser->kecamatan;
      $this->desa = $user->dataUser->desa;
      $this->jalan = $user->dataUser->jalan;
      $this->dusun = $user->dataUser->dusun;
      $this->rt = $user->dataUser->rt;
      $this->rw = $user->dataUser->rw;
      $this->kodepos = $user->dataUser->kodepos;
      $this->riwayat_sd = $user->dataUser->riwayat_sd;
      $this->riwayat_smp = $user->dataUser->riwayat_smp;
      $this->riwayat_sma = $user->dataUser->riwayat_sma;
      $this->riwayat_kuliah_s1 = $user->dataUser->riwayat_kuliah_s1;
      $this->riwayat_kuliah_s2 = $user->dataUser->riwayat_kuliah_s2;
      $this->riwayat_kuliah_s3 = $user->dataUser->riwayat_kuliah_s3;
      $this->riwayat_pondok = $user->dataUser->riwayat_pondok;
      $this->no_hp = $user->dataUser->no_hp;
      $this->email = $user->email;
      $this->notifikasiKhusus = $user->dataUser->notifikasiKhusus;
      $this->selectedRoles = $user->roles->pluck('name')->toArray();;
      $this->selectedLembagas = $user->lembaga->pluck('id')->toArray();;
      $this->selectedKelas = $user->kelasMengajar->pluck('id')->toArray();;
      $this->selectedPelajaran = $user->pelajaran->pluck('id')->toArray();;
      $this->selectedEkstrakurikuler = $user->ekstrakurikuler->pluck('id')->toArray();;
    }

    public function edit()
    {
      $data = $this->validate();

      if ($this->foto) {
            
              if ($this->user->dataUser->foto) {
                Storage::delete($this->user->dataUser->foto);
              }
            $data['foto'] = $this->foto->storeAs(path: 'foto-asatidz', name: $this->user->id . Str::random(15) . '.jpg');
          } else {
        $data['foto'] = $this->user->dataUser->foto;
      }

      $this->user->update($data);

      $this->user->dataUser->update($data);

      if ($this->selectedRoles) {
          $this->user->syncRoles($this->selectedRoles);
        }

        // tambah data lembaga 
        if ($this->selectedLembagas) {
            $this->user->lembaga()->sync($this->selectedLembagas);
        }

        // tambah data mengajar jika ada
        if ($this->selectedKelas) {
            $this->user->kelasMengajar()->sync($this->selectedKelas);
        }


        // tambah data pelajaran jika ada
        if ($this->selectedPelajaran) {
            $this->user->pelajaran()->sync($this->selectedPelajaran);
        }


        // if ($this->selectedEkstrakurikuler) {
        //     $this->user->ekstrakurikuler()->sync($this->selectedEkstrakurikuler);
        // }

        Cache::forget('asatidz_putra');
        Cache::forget('asatidz_putri');
        Cache::forget('asatidz_aktif');
        session()->flash('success', 'Data berhasil diubah');

        return $this->redirect('/user', navigate:true);

    }

    public function render()
    { 
        
        return view('livewire.user.user-edit', [
          'lembagas' => Lembaga::with('pelajaran', 'kelas')->get(),
          'roles' => Role::all(),
          'roleUser' => User::roleUser($this->user),
          'ekstrakurikulers' => Ekstrakurikuler::all()
        ])->title('Edit Data Asatidz ' . $this->user->name);
    }
}
