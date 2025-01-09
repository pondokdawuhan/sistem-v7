<?php

namespace App\Livewire\PembinaanSantri;

use App\Models\PembinaanSantri;
use App\Models\Santri;
use Livewire\Component;
use Livewire\WithPagination;

class PembinaanSantriDetail extends Component
{
    use WithPagination;
    
    public $paginate = 20;
    public $santri;
    public $titleModal;
    public $bukti;
    public $role;
    public $lembaga;

    public function mount(Santri $santri)
    { 
      $this->role = explode('/', request()->path())[1];
      $this->lembaga = explode('/', request()->path())[0];
      $this->santri = $santri;
    }

    
    
    public function lihatBukti($id)
    {
      $pembinaan = PembinaanSantri::find($id);
      $this->titleModal = 'Bukti Pembinaan ' . $pembinaan->santri->name;
      $this->bukti = asset('storage/' . $pembinaan->foto);
    }

    public function lihatSurat($id)
    {
       $pembinaan = PembinaanSantri::find($id);
        $this->titleModal = 'Surat Pembinaan ' . $pembinaan->santri->name;
        $this->bukti = asset('storage/' . $pembinaan->surat);
    }

    public function render()
    {
        return view('livewire.pembinaan-santri.pembinaan-santri-detail', [
          'pembinaans' => PembinaanSantri::where('santri_id', $this->santri->id)->latest()->paginate($this->paginate)
        ])->title('Rekap Pembinaan ' . $this->santri->name);
    }
}
