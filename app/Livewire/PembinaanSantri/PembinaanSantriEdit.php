<?php

namespace App\Livewire\PembinaanSantri;

use Livewire\Component;
use Illuminate\Support\Str;
use App\Models\PembinaanSantri;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Storage;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class PembinaanSantriEdit extends Component
{
    use WithFileUploads;

    public $role;
    public $lembaga;
    public $tanggal;
    public $permasalahan;
    public $pembinaan;
    public $tindak_lanjut;
    public $sebagai;
    public $santri_name;
    public $pembinaanSantri;
    #[Validate('image|max:1024')]
    public $foto;
    #[Validate('image|max:1024')]
    public $surat;

    public function mount(PembinaanSantri $pembinaanSantri)
    {
      $this->role = explode('/', request()->path())[1];
      $this->lembaga = explode('/', request()->path())[0];
      $this->sebagai = $this->role;
      $this->pembinaanSantri = $pembinaanSantri;
      $this->tanggal = $pembinaanSantri->tanggal;
      $this->permasalahan = $pembinaanSantri->permasalahan;
      $this->pembinaan = $pembinaanSantri->pembinaan;
      $this->tindak_lanjut = $pembinaanSantri->tindak_lanjut;
      $this->santri_name = $pembinaanSantri->santri->name;
    }

    public function edit()
    {
      $data = $this->validate([
          'tanggal' => 'required',
          'permasalahan' => 'required',
          'pembinaan' => 'required',
          'tindak_lanjut' => 'required',
          'sebagai' => 'required'
        ]);

        


        if ($this->foto) {
          if ($this->pembinaanSantri->foto) {
            Storage::delete($this->pembinaanSantri->foto);
          }
            $data['foto'] = $this->foto->storeAs(path: 'bukti-pembinaans', name: $this->pembinaanSantri->santri_id . Str::random(15) . '.jpg');
          }

          if ($this->surat) {
            
              if ($this->pembinaanSantri->surat) {
                Storage::delete($this->pembinaanSantri->surat);
              }
            $data['surat'] = $this->surat->storeAs(path: 'surat-pembinaans', name: $this->pembinaanSantri->santri_id . Str::random(15) . '.jpg');
          }

        $this->pembinaanSantri->update($data);

        session()->flash('success', 'Data berhasil diubah');
        return $this->redirect('/' . $this->lembaga . '/' . $this->role .'/pembinaanSantri', true);
    }


    public function render()
    {
        return view('livewire.pembinaan-santri.pembinaan-santri-edit');
    }
}
