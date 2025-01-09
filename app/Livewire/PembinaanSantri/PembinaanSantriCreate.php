<?php

namespace App\Livewire\PembinaanSantri;

use App\Models\Santri;
use Livewire\Component;
use Illuminate\Support\Str;
use Livewire\Attributes\Title;
use App\Models\PembinaanSantri;
use Livewire\Attributes\Validate;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class PembinaanSantriCreate extends Component
{
    use WithFileUploads;

    #[Title('Tambah Pembinaan Santri')]

    public $role;
    public $lembaga;
    public $santri_id = [];
    public $tanggal;
    public $permasalahan;
    public $pembinaan;
    public $tindak_lanjut;
    public $sebagai;
    #[Validate('image|max:1024')]
    public $foto;
    #[Validate('image|max:1024')]
    public $surat;

    public function mount()
    {
      $this->role = explode('/', request()->path())[1];
      $this->lembaga = explode('/', request()->path())[0];
      $this->sebagai = $this->role;
    }

    public function tambah()
    {
      foreach($this->santri_id as $santri_id)
        {
          if ($this->foto) {
            $bukti = $this->foto->storeAs(path: 'bukti-pembinaans', name: $santri_id . Str::random(15) . '.jpg');
          }

          if ($this->surat) {
            $surat = $this->surat->storeAs(path: 'surat-pembinaans', name: $santri_id . Str::random(15) . '.jpg');
          }

          PembinaanSantri::create([
            'santri_id' => $santri_id,
            'lembaga_id' => $this->lembaga,
            'user_id' => auth()->user()->id,
            'tanggal' => $this->tanggal,
            'permasalahan' => $this->permasalahan,
            'pembinaan' => $this->pembinaan,
            'tindak_lanjut' => $this->tindak_lanjut,
            'sebagai' => $this->sebagai,
            'foto' => $bukti,
            'surat' => $surat ?? null
          ]);
        }

        session()->flash('success', 'Data berhasil ditambahkan');
        return $this->redirect('/'. $this->lembaga . '/' . $this->role .'/pembinaanSantri', true);
    }


    public function render()
    {
      if ($this->role == 'pengurus' || $this->role == 'pendamping' || $this->role == 'ketuaAsrama') {
        $santris = Santri::whereRelation('dataSantri', 'jenis_kelamin', auth()->user()->dataUser->jenis_kelamin)->get();
      } else {
          $santris = Santri::all();
        }
        return view('livewire.pembinaan-santri.pembinaan-santri-create', [
          'santris' => $santris
        ]);
    }
}
