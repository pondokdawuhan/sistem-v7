<?php

namespace App\Livewire\Santri;

use App\Models\Kelas;
use App\Models\Santri;
use App\Models\Lembaga;
use Livewire\Component;
use App\Exports\DataSantri;
use App\Traits\WablasTrait;
use Illuminate\Support\Str;
use Livewire\WithPagination;
use App\Imports\ImportSantri;
use Livewire\WithFileUploads;
use Livewire\Attributes\Validate;
use Livewire\WithoutUrlPagination;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\TemplateImportSantri;
use Illuminate\Support\Facades\Cache;

class SantriList extends Component
{
  use WithPagination, WithFileUploads; 
  
    public $search;
    public $page;
    public $paginate;
    #[Validate('file', message: 'tipe tidak valid')]
    public $template;

    public $titleModal;

    public $pilihNama;
    public $pilihNomor;
    public $pilihUsername;
    public $pilihPassword;

    public function mount()
    {
      $this->paginate = 20;
    }

    public function downloadTemplate($lembaga, $username = false)
    {
      $data = Lembaga::find($lembaga);
      return Excel::download(new TemplateImportSantri($data->id, $username), 'Template Import Santri ' . $data->nama  . '.xlsx');
    }

    public function buka() {
      $this->titleModal = 'Import Data Santri';
    }

    public function proses()
    {
      
      Excel::import(new ImportSantri, $this->template);
      session()->flash('success', 'Import Data Santri Berhasil');
      $this->redirect('/santri', true);
    }

    public function delete($id)
    {

      $santri = Santri::find($id);

      $santri->delete();

      Cache::forget('santri_aktif');
      Cache::forget('santri_kota');
      Cache::forget('santri_kab');
      Cache::forget('santri_luar');
      Cache::forget('santri_putra');
      Cache::forget('santri_putri');
      session()->flash('success', 'Hapus Data Santri Berhasil');
    }

    public function downloadDataSantri()
    {
      return Excel::download(new DataSantri, 'Data Santri PPBM.xlsx');
    }

    public function resetPassword($username)
    {
      $password = Str::password(8, symbols:false);
      Santri::where('username', $username)->update([
        'password' => Hash::make($password),
        'initial_password' => $password
      ]);
      session()->flash('success', 'password berhasil direset!');
    }


    public function pilih($username)
    {
      $user = Santri::where('username', $username)->first();
      
      $this->pilihNama = $user->name;
      $this->pilihNomor = $user->dataSantri->no_hp;
      $this->pilihUsername = $user->username;
      $this->pilihPassword = $user->initial_password;
    }

    public function kirimData()
    {
      $message = "Informasi Akun: <br> Nama: " . $this->pilihNama . "<br> Username: " . $this->pilihUsername . '<br> password: ' . $this->pilihPassword . '<br> Link sistem: ' . env('APP_URL_SANTRI') . '<br> Segera ubah password Anda pada menu profil. Terima kasih';
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

    public function restore($id)
    {
      Santri::withTrashed()->find($id)->restore();

      session()->flash('success', 'Santri berhasil dipulihkan');
    }


    public function render()
    {
        if ($this->search) {
          $santris = Santri::with('dataSantri', 'dataSantri.lembaga')->withTrashed()->filter($this->search)->latest()->get();
        } else {
          $santris = Santri::with('dataSantri', 'dataSantri.lembaga')->withTrashed()->filter($this->search)->latest()->paginate($this->paginate);
        }
        
        return view('livewire.santri.santri-list', [
          'santris' => $santris,
          'kelass' => Kelas::all()
        ])->title('Data Santri');
    }
}
