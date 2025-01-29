<?php

namespace App\Livewire\HaidSantri;

use Carbon\Carbon;
use App\Models\Santri;
use Livewire\Component;
use App\Models\HaidSantri;
use Livewire\Attributes\Title;

class HaidSantriCreate extends Component
{
    #[Title('Tambah Data Haid Santri')]

    public $santri_id;
    public $tanggal_mulai;
    public $role;

    public function mount()
    {
      $this->role = explode('/', request()->path())[0];
    }

    public function tambah()
    {
      $data = $this->validate([
        'santri_id' => 'required',
        'tanggal_mulai' => 'required'
      ]);
      
      $data['tanggal_maksimal'] = date('Y-m-d H:i:s', strtotime($this->tanggal_mulai) + 1296000);
      $data['tanggal_suci'] = null;
      $data['lama_keluar_darah'] = 0;
      $data['keluar_darah'] = true;

      $dataHaid = HaidSantri::where('santri_id', $this->santri_id)->first();

      if ($dataHaid) {
        $suci_terakhir = Carbon::parse($dataHaid->tanggal_terakhir_suci);
        $tanggal_mulai = Carbon::parse($this->tanggal_mulai);
        
        if ($suci_terakhir->diffInDays($tanggal_mulai) < 15) {
          // jika jeda antara suci terakhir dan haid yang baru kurang dari 15 hari maka istihadloh
          $data['status'] = 'Istihadloh';
          $data['watching_bot'] = true;
          $data['watching_table'] = 'tanggal_terakhir_suci';

        } else {
          $data['status'] = 'Haid';
          $data['watching_bot'] = true;
          $data['watching_table'] = 'tanggal_maksimal';
        }
        $dataHaid->update($data);
      } else {
        $data['status'] = 'Haid';
        $data['watching_bot'] = true;
        $data['watching_table'] = 'tanggal_maksimal';
        HaidSantri::create($data);
      }
        
      session()->flash('success', 'Data berhasil ditambahkan');
        return $this->redirect('/' . $this->role . '/haidSantri', true);
    }

    public function render()
    {
        return view('livewire.haid-santri.haid-santri-create', [
          'santris' => Santri::with('dataSantri')->whereRelation('dataSantri', 'jenis_kelamin', 'Perempuan')->get()
        ]);
    }
}
