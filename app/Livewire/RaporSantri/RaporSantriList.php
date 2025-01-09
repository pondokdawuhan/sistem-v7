<?php

namespace App\Livewire\RaporSantri;

use App\Exports\RekapRaporSantri;
use App\Models\BatasPoin;
use App\Models\Kelas;
use App\Models\Lembaga;
use App\Models\PelanggaranSantri;
use App\Models\PoinSantri;
use App\Models\Presensi;
use App\Models\ReferensiPoin;
use App\Models\Santri;
use App\Models\TahunAjaran;
use Carbon\Carbon;
use Livewire\Attributes\Title;
use Livewire\Component;
use Maatwebsite\Excel\Facades\Excel;

class RaporSantriList extends Component
{

    #[Title('Rapor Santri')]
    public $role;
    public $kelas;
    public $lembaga;

    public $search;
    public $paginate = 20;
    public $page;


    public function mount(Lembaga $lembaga)
    {
      $this->kelas = explode('/', request()->path())[1] ?? 'semua';
      $this->role = explode('/', request()->path())[2];
      
    }

    public function download()
    {
      return Excel::download(new RekapRaporSantri($this->kelas), 'Rekap Poin Santri.xlsx');
    }

    public function render()
    {
        if ($this->kelas == 'semua') {
          $querySantri = Santri::with('poinSantri', 'dataSantri')->santriAktif();
        } else {
          $kelas = Kelas::find($this->kelas);
          switch ($kelas->lembaga->jenis_lembaga) {
            case 'FORMAL':
              $querySantri = Santri::with('poinSantri', 'dataSantri')->santriAktif()->where('kelas_formal_id', $this->kelas);
              break;
            case 'MADIN':
              $querySantri = Santri::with('poinSantri', 'dataSantri')->santriAktif()->where('kelas_madin_id', $this->kelas);
              break;
            case 'MMQ':
              $querySantri = Santri::with('poinSantri', 'dataSantri')->santriAktif()->where('kelas_mmq_id', $this->kelas);
              break;
            case 'ASRAMA':
              $querySantri = Santri::with('poinSantri', 'dataSantri')->santriAktif()->where('kelas_asrama_id', $this->kelas);
              break;
            
          }
        }

        PoinSantri::kalkulasiPoin();
        if ($this->search) {
          $santris = $querySantri->filter($this->search)->orderBy(PoinSantri::select('jumlah')->whereColumn('poin_santris.santri_id', 'santris.id'), 'desc')->get();
          $this->page = 1;
        } else {
          $santris = $querySantri->orderBy(PoinSantri::select('jumlah')->whereColumn('poin_santris.santri_id', 'santris.id'), 'desc')->paginate($this->paginate);
          $this->page = $santris->firstItem();
        }


        return view('livewire.rapor-santri.rapor-santri-list', [
          'santris' => $santris,
          'kelass' => Kelas::all(),
          'batasFormal' => BatasPoin::where('jenis_poin', 'poin_formal')->first(),
          'batasMadin' => BatasPoin::where('jenis_poin', 'poin_madin')->first(),
          'batasMmq' => BatasPoin::where('jenis_poin', 'poin_mmq')->first(),
          'batasAsrama' => BatasPoin::where('jenis_poin', 'poin_asrama')->first(),
          'batasEkstrakurikuler' => BatasPoin::where('jenis_poin', 'poin_ekstrakurikuler')->first(),
          'batasIbadah' => BatasPoin::where('jenis_poin', 'poin_ibadah')->first(),
          'batasPelanggaran' => BatasPoin::where('jenis_poin', 'poin_pelanggaran')->first(),
        ]);
    }

}
