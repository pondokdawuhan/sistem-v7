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
    use WithFileUploads;

    public $user;
    #[Validate('required', message: ':attribute wajib dipilih')]
    #[Validate('string')]
    public $status;
    #[Validate('required', message: ':attribute wajib dipilih')]
    #[Validate('boolean')]
    public $aktif;
    #[Validate('required', message: ':attribute wajib diisi')]
    #[Validate('string')]
    public $tahun_masuk;
    #[Validate('nullable')]
    #[Validate('string')]
    public $niy;
    #[Validate('nullable')]
    #[Validate('string')]
    public $nuptk;
    #[Validate('nullable')]
    #[Validate('string')]
    public $nik;
    #[Validate('required', message: ':attribute wajib diisi')]
    #[Validate('min:3', message: ':attribute diisi minimal 3 karakter')]
    #[Validate('string')]
    public $name;
    #[Validate('required', message: ':attribute wajib dipilih')]
    #[Validate('string')]
    public $jenis_kelamin;
    #[Validate('nullable')]
    #[Validate('string')]
    public $tempat_lahir;
    #[Validate('nullable')]
    #[Validate('string')]
    public $tanggal_lahir;
    #[Validate('nullable')]
    #[Validate('string')]
    public $nama_ibu;
    #[Validate('image', message: 'tipe tidak valid')]
    #[Validate('file', message: 'tipe tidak valid')]
    #[Validate('max:1024', message: 'ukuran melebihi 1MB')]
    #[Validate('nullable', message: 'ukuran melebihi 1MB')]
    public $foto;
    #[Validate('nullable')]
    #[Validate('string')]
    public $provinsi;
    #[Validate('nullable')]
    #[Validate('string')]
    public $kabupaten;
    #[Validate('nullable')]
    #[Validate('string')]
    public $kecamatan;
    #[Validate('nullable')]
    #[Validate('string')]
    public $desa;
    #[Validate('nullable')]
    #[Validate('string')]
    public $jalan;
    #[Validate('nullable')]
    #[Validate('string')]
    public $dusun;
    #[Validate('nullable')]
    #[Validate('string')]
    public $rt;
    #[Validate('nullable')]
    #[Validate('string')]
    public $rw;
    #[Validate('nullable')]
    #[Validate('string')]
    public $kodepos;
    #[Validate('nullable')]
    #[Validate('string')]
    public $riwayat_sd;
    #[Validate('nullable')]
    #[Validate('string')]
    public $riwayat_smp;
    #[Validate('nullable')]
    #[Validate('string')]
    public $riwayat_sma;
    #[Validate('nullable')]
    #[Validate('string')]
    public $riwayat_kuliah_s1;
    #[Validate('nullable')]
    #[Validate('string')]
    public $riwayat_kuliah_s2;
    #[Validate('nullable')]
    #[Validate('string')]
    public $riwayat_kuliah_s3;
    #[Validate('nullable')]
    #[Validate('string')]
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
