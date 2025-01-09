<?php

namespace App\Livewire\PresensiEkstrakurikuler;

use App\Models\Santri;
use Livewire\Component;
use App\Models\Ekstrakurikuler;
use App\Models\IzinSakitSantri;
use App\Models\IzinKeluarSantri;
use App\Models\IzinPulangSantri;
use App\Models\JurnalEkstrakurikuler;
use App\Jobs\StorePresensiEkstrakurikuler;

class PresensiEkstrakurikulerCreate extends Component
{
    public $ekstrakurikuler;

    public function mount(Ekstrakurikuler $ekstrakurikuler)
    {
      $this->ekstrakurikuler = $ekstrakurikuler;
    }

    public function tambah()
    {
      $data = [
          'ekstrakurikuler_id' => request('ekstrakurikuler_id'),
          'santri_id' => request()->santri_id,
          'keterangans' => request()->keterangans,
          'user_id' => auth()->user()->id
      ];
      dispatch(new StorePresensiEkstrakurikuler($data));
       JurnalEkstrakurikuler::create([
                'user_id' => auth()->user()->id,
                'ekstrakurikuler_id' => request('ekstrakurikuler_id'),
                'materi' => request()->materi,
            ]);

      return redirect('/'. request('ekstrakurikuler_id') .'/presensiEkstrakurikuler')->with('success', 'Presensi Ekstra Berhasil');
    }

    public function render()
    {
        return view('livewire.presensi-ekstrakurikuler.presensi-ekstrakurikuler-create', [
          'santris' => Santri::whereRelation('ekstrakurikuler', 'nama', $this->ekstrakurikuler->nama)->orderBy('name', 'asc')->get(),
          'izinKeluarSantris' => IzinKeluarSantri::getIzinKeluarSantriBerlaku(),
           'izinPulangSantris' => IzinPulangSantri::getIzinPulangSantriBerlaku(),
           'izinSakitSantris' => IzinSakitSantri::getIzinSakitSantriBerlaku(),
           'ekstrakurikuler' => $this->ekstrakurikuler
        ])->title('Tambah presensi ' . $this->ekstrakurikuler->nama);
    }
}
