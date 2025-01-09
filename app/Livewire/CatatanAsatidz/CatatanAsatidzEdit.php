<?php

namespace App\Livewire\CatatanAsatidz;

use App\Models\CatatanAsatidz;
use App\Models\User;
use App\Models\Lembaga;
use Livewire\Component;
use Livewire\Attributes\Validate;

class CatatanAsatidzEdit extends Component
{

    public $lembaga;
    public $role;
    public $selectedCatatan;

    public $name;
    #[Validate('required')]
    public $tanggal;
    #[Validate('required')]
    public $catatan;


    public function mount(Lembaga $lembaga, CatatanAsatidz $catatanAsatidz)
    {
      $this->lembaga = $lembaga;
      $this->role = explode('/', request()->path())[1];
      $this->name = $catatanAsatidz->user->name;
      $this->tanggal = $catatanAsatidz->tanggal;
      $this->catatan = $catatanAsatidz->catatan;
      $this->selectedCatatan = $catatanAsatidz;
    }

    public function edit()
    {
      $data = $this->validate();

      $this->selectedCatatan->update($data);

      session()->flash('success', 'Data berhasil diubah');

      return $this->redirect('/' . $this->lembaga->id . '/' . $this->role . '/catatanAsatidz', true);
    }
    public function render()
    {
        return view('livewire.catatan-asatidz.catatan-asatidz-edit',[
          'users' => User::whereRelation('lembaga', 'nama', $this->lembaga->nama)->whereRelation('roles', 'name', '!=', 'Pengasuh')->get()
        ])->title('Edit Catatan Asatidz ' . $this->lembaga->nama);
    }
}
