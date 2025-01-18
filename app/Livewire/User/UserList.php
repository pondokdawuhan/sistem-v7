<?php

namespace App\Livewire\User;

use App\Models\User;
use App\Models\Kelas;
use Livewire\Component;
use App\Traits\WablasTrait;
use Illuminate\Support\Str;
use App\Exports\DataAsatidz;
use Livewire\WithPagination;
use Livewire\WithFileUploads;
use App\Imports\ImportAsatidz;
use App\Models\Ekstrakurikuler;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\TemplateImportAsatidz;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;

class UserList extends Component
{
    use WithPagination, WithFileUploads;
    
    public $search;
    public $paginate;
    public $page;
     #[Validate('file', message: 'tipe tidak valid')]
    public $template;

    public $pilihNama;
    public $pilihNomor;
    public $pilihUsername;
    public $pilihPassword;

    public function mount()
    {
      $this->paginate = 20;
    }

    public function pilih($username)
    {
      $user = User::where('username', $username)->first();
      
      $this->pilihNama = $user->name;
      $this->pilihNomor = $user->dataUser->no_hp;
      $this->pilihUsername = $user->username;
      $this->pilihPassword = $user->initial_password;
    }

    public function kirimData()
    {
      $message = "Informasi Akun: <br> Nama: " . $this->pilihNama . "<br> Username: " . $this->pilihUsername . '<br> password: ' . $this->pilihPassword . '<br> Link sistem: ' . env('APP_URL') . '<br> Segera ubah password Anda pada menu profil. Terima kasih';
      $this->sendText(nomorHp($this->pilihNomor), $message);
      session()->flash('success', 'Data ' . $this->pilihNama . ' berhasil dikirim');
    }

    
    protected function sendText($noHp, $message)
    {
      $kumpulan_data = [];
      $data['phone'] = $noHp;
      $data['message'] = $message;
      $data['secret'] = false;
      $data['retry'] = false;
      $data['isGroup'] = false;

      array_push($kumpulan_data, $data);
      WablasTrait::sendText($kumpulan_data);
    }


    public function download()
    {
      return Excel::download(new DataAsatidz, 'Data Asatidz PPBM.xlsx');
    }

    public function resetPassword($id)
    {
      $password = Str::password(8, symbols:false);
      User::where('id', $id)->update([
        'password' => Hash::make($password),
        'initial_password' => $password
      ]);
      session()->flash('success', 'password berhasil direset!');
    }

    public function render()
    {
        
        if ($this->search) {
          $users = User::with('lembaga', 'dataUser', 'roles')->withTrashed()->filter($this->search)->latest()->get();
          $this->page = 1;
        } else {
          $users = User::with('lembaga', 'dataUser', 'roles')->withTrashed()->filter($this->search)->latest()->paginate($this->paginate);
          $this->page = $users->firstItem();
        }
        return view('livewire.user.user-list', [
          'users' => $users
        ])->title('Data Asatidz');
    }


    public function delete($id)
    {
      $user = User::withTrashed()->find($id);
      $user->dataUser->update(['aktif' => false]);
      $user->delete();
      Cache::forget('asatidz_putra');
      Cache::forget('asatidz_putri');
      Cache::forget('asatidz_aktif');
      session()->flash('success', 'Data berhasil dihapus');
      return $this->redirect('/user', true);
    }

    public function restore($id)
    {
      $user = User::withTrashed()->find($id);
      $user->dataUser->update(['aktif' => true]);
      $user->restore();
      Cache::forget('asatidz_putra');
      Cache::forget('asatidz_putri');
      Cache::forget('asatidz_aktif');
      session()->flash('success', 'Data berhasil direstore');
      return $this->redirect('/user', true);
    }

    public function downloadTemplate($username = false)
    {
      return Excel::download(new TemplateImportAsatidz($username), 'Template Import Asatidz.xlsx');
    }

    public function proses()
    {
      Excel::import(new ImportAsatidz, $this->template);
      session()->flash('success', 'Import Data Asatidz Berhasil');
      $this->redirect('/user', true);
    }
}
