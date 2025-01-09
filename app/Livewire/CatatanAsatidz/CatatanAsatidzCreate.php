<?php

namespace App\Livewire\CatatanAsatidz;

use App\Models\CatatanAsatidz;
use App\Models\Lembaga;
use App\Models\User;
use Livewire\Attributes\Validate;
use Livewire\Component;

class CatatanAsatidzCreate extends Component
{
    public $lembaga;
    public $role;

    #[Validate('required')]
    public $user_id;
    #[Validate('required')]
    public $tanggal;
    #[Validate('required')]
    public $catatan;


    public function mount(Lembaga $lembaga)
    {
      $this->lembaga = $lembaga;
      $this->role = explode('/', request()->path())[1];
    }

    public function tambah()
    {
      $data = $this->validate();

      $data['lembaga_id'] = $this->lembaga->id;

      CatatanAsatidz::create($data);

      session()->flash('success', 'Data berhasil ditambahkan');

      return $this->redirect('/' . $this->lembaga->id . '/' . $this->role . '/catatanAsatidz', true);
    }
    
    public function render()
    {
        return view('livewire.catatan-asatidz.catatan-asatidz-create', [
          'users' => User::whereRelation('lembaga', 'nama', $this->lembaga->nama)->whereRelation('roles', 'name', '!=', 'Pengasuh')->get()
        ])->title('Tambah Data Catatan Asatidz ' . $this->lembaga->nama);
    }
}
