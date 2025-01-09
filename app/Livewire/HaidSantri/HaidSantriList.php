<?php

namespace App\Livewire\HaidSantri;

use App\Models\Santri;
use App\Models\Kelas;
use Livewire\Component;
use App\Models\HaidSantri;
use Livewire\WithPagination;
use Livewire\Attributes\Title;

class HaidSantriList extends Component
{
    use WithPagination;

    #[Title('Daftar Haid Santri')]
    
    public $search;
    public $page;
    public $paginate;
    public $tanggal_suci;
    public $haidModal;
    public $titleModal;
    public $modal;
    public $role;
    
    
    public function mount()
    {
      $this->paginate = 20;
      $this->role = explode('/', request()->path())[0];
    }

    public function delete($id)
    {
      HaidSantri::find($id)->delete();
      session()->flash('success', 'Data berhasil dihapus');
    }

    public function editSuci($id)
    {
      $this->modal = 'suci';
      $haid = HaidSantri::find($id);

      $this->titleModal = 'Input Tanggal Suci ' . $haid->santri->name;
      $this->haidModal = $haid;
    }

    public function suci($id)
    {
        $haidSantri = HaidSantri::find($id);
        $data = $this->validate([
            'tanggal_suci' => 'required'
        ]);
        $data['keluar_darah'] = false;

        $data['status'] = 'Selesai';
        $data['watching_bot'] = false;
        $data['watching_table'] = null;
        $data['tanggal_terakhir_istihadloh'] = null;
        $data['tanggal_terakhir_suci'] = $data['tanggal_suci'];

        $haidSantri->update($data);
        session()->flash('success', 'Data suci berhasil diubah!');
    }

    public function istihadloh(HaidSantri $haidSantri)
    {
      
        $tanggal_terakhir_istihadloh = date('Y-m-d H:i:s', time() + 259200);

        $haidSantri->update([
            'tanggal_terakhir_istihadloh' => $tanggal_terakhir_istihadloh,
            'keluar_darah' => true,
            'watching_bot' => true,
            'watching_table' => 'tanggal_terakhir_istihadloh',
            'status' => 'Istihadloh'
        ]);

        session()->flash('success', 'Data Istihadloh berhasil ubah menjadi 3 hari kedepan');
        return $this->redirect('/'. $this->role .'/haidSantri', true);
    }

    public function lihat($id) {
      $this->modal = 'lihat';
      $haid = HaidSantri::find($id);
      $this->titleModal = 'Lihat Detail haid ' . $haid->santri->name;

      $this->haidModal = $haid;
    }

    public function render()
    {
      if ($this->search) {
          $santris = Santri::with('haidSantri')->whereRelation('dataSantri', 'jenis_kelamin', 'Perempuan')->filter($this->search)->get();
          $this->page = 1;
        } else {
          $santris = Santri::with('haidSantri')->whereRelation('dataSantri', 'jenis_kelamin', 'Perempuan')->paginate($this->paginate);
          $this->page = $santris->firstItem();
        }
        return view('livewire.haid-santri.haid-santri-list', [
          'santris' => $santris,
          'kelas' => Kelas::with('lembaga')->get()
        ]);
    }
}
