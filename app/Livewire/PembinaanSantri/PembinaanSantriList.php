<?php

namespace App\Livewire\PembinaanSantri;

use App\Models\PembinaanSantri;
use Illuminate\Support\Facades\Storage;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

class PembinaanSantriList extends Component
{
  use WithPagination;
  
    #[Title('Daftar Pembinaan Santri')]
    public $page;
    public $paginate = 20;
    public $search;
    public $role;
    public $lembaga;


    public function mount()
    {
      $this->role = explode('/', request()->path())[1];
      $this->lembaga = explode('/', request()->path())[0];
    }

    public $titleModal;
    public $bukti;

    public function delete($id)
    {
      $pembinaan = PembinaanSantri::find($id);
      if ($pembinaan->foto) {
        Storage::delete($pembinaan->foto);
      }
      $pembinaan->delete();
      session()->flash('success', 'Data berhasil dihapus');
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
        if ($this->search) {
          $this->page = 1;
          $pembinaans = PembinaanSantri::with('user', 'santri')->where('lembaga_id', $this->lembaga)->filter($this->search)->latest()->get();
        } else {
          $pembinaans = PembinaanSantri::with('user', 'santri')->where('lembaga_id', $this->lembaga)->latest()->paginate($this->paginate);
          $this->page = $pembinaans->firstItem();
        }
        return view('livewire.pembinaan-santri.pembinaan-santri-list', [
          'pembinaans' => $pembinaans
        ]);
    }
}
