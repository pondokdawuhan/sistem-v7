<?php

namespace App\Livewire\IzinSakitSantri;

use App\Models\Santri;
use App\Models\Lembaga;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Title;
use App\Models\IzinSakitSantri;
use App\Models\IzinPulangSantri;

class IzinSakitSantriList extends Component
{ 
    use WithPagination;

    #[Title('Daftar Izin Sakit Santri')]

    public $role;
    public $lembaga;
    public $search;
    public $paginate;
    public $page;

    public function mount(Lembaga $lembaga)
    {
      $this->lembaga = $lembaga;
      $this->role = explode('/', request()->path())[1];
    }

    public function delete($id)
    {
      IzinSakitSantri::find($id)->delete();

      session()->flash('success', 'Data berhasil dihapus');
    }

    public function render()
    {
        $santri = Santri::whereRelation('dataSantri', 'jenis_kelamin', auth()->user()->dataUser->jenis_kelamin)->get();
        $str = [];
        foreach ($santri as $s) {
          array_push($str, $s->id);
        }
        $izins = IzinSakitSantri::with('santri')->where('lembaga_id', $this->lembaga->id)->whereIn('santri_id', $str);
        
        if ($this->search) {
          $this->page = 1;
          $izinss = $izins->filter($this->search)->latest()->get();
        } else {
          $izinss = $izins->latest()->paginate($this->paginate);
          $this->page = $izinss->firstItem();
        }

        return view('livewire.izin-sakit-santri.izin-sakit-santri-list', [
          'izins' => $izinss
        ])->title('Izin Sakit Santri ' . $this->lembaga->nama);
    }
}
