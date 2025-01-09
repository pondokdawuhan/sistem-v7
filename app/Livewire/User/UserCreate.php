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

class UserCreate extends Component
{
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
    public $selectedRoles = [];
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


    public function tambah()
    {
      $data = $this->validate();
      $password = Str::password(8, symbols:false);
      $data['username'] = mt_rand(1, 9) .  abs(random_int(1000000, 9999999));
      $data['password'] = Hash::make($password);
      $data['initial_password'] = $password;

      User::create([
          'name' => $data['name'],
          'username' => $data['username'],
          'password' => $data['password'],
          'email' => $data['email'],
          'initial_password' => $data['initial_password']
      ]);

      $user = User::where('username', $data['username'])->first();

      // insert data user yang baru saja didaftarkan
       

        if ($data['selectedRoles']) {
          $user->syncRoles($data['selectedRoles']);
        }

        // tambah data lembaga 
        foreach ($data['selectedLembagas'] as $lembaga) {
            $user->lembaga()->attach($lembaga);
        }

        // tambah data mengajar jika ada
        if ($data['selectedKelas']) {
            $user->kelasMengajar()->attach($data['selectedKelas']);
        }

        // tambah data pelajaran jika ada
        if ($data['selectedPelajaran']) {
            $user->pelajaran()->attach($data['selectedPelajaran']);
        }

        // if ($data['selectedEkstrakurikuler']) {
        //     $user->ekstrakurikuler()->attach($data['selectedEkstrakurikuler']);
        // }
        
        $data['user_id'] = $user->id;

        if ($this->foto) {
            $foto = $this->foto->storeAs(path: 'foto-asatidz', name: $user->id . Str::random(15) . '.jpg');
            $data['foto'] = $foto;
          }

        if ($data['no_hp']) {
            $data['no_hp'] = nomorHp($data['no_hp']);
        }
        
        if ($user->dataUser) {
            DataUser::where('user_id', $user->id)->first()->update($data);
        } else {
            DataUser::create($data);
        }

        session()->flash('success', 'Data Asatidz berhasil ditambahkan');
        return $this->redirect('/user', navigate:true);
    }


    public function render()
    {
        return view('livewire.user.user-create', [
            'lembagas' => Lembaga::with('pelajaran', 'kelas')->get(),
            'roles' => Role::all(),
            'ekstrakurikulers' => Ekstrakurikuler::all()
        ])->title('Tambah Data Asatidz');
    }
}
