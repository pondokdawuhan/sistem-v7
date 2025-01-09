<?php

namespace App\Livewire\HaidSantri;

use Carbon\Carbon;
use Livewire\Component;
use App\Models\HaidSantri;
use Livewire\Attributes\Title;

class HaidSantriEdit extends Component
{
    #[Title('Edit Data Haid Santri')]
    public $haid;
    public $santri_id;
    public $santri_name;
    public $tanggal_mulai;
    public $role;

    public function mount(HaidSantri $haidSantri)
    {
      $this->role = explode('/', request()->path())[0];
      $this->haid = $haidSantri;
      $this->tanggal_mulai = $haidSantri->tanggal_mulai;
      $this->santri_id = $haidSantri->santri_id;
      $this->santri_name = $haidSantri->santri->name;
    }

    public function edit()
    {
       $data = $this->validate([
            'tanggal_mulai' => 'required'
        ]);

        $data['tanggal_maksimal'] = date('Y-m-d H:i:s', strtotime($this->tanggal_mulai) + 1296000);
        
        $this->haid->update($data);

        session()->flash('success', 'Data berhasil diubah');
        return $this->redirect('/'. $this->role .'/haidSantri', true);
    }

    public function render()
    {
        return view('livewire.haid-santri.haid-santri-edit');
    }
}
