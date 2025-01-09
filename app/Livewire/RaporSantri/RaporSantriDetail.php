<?php

namespace App\Livewire\RaporSantri;

use App\Models\Kelas;
use App\Models\Santri;
use App\Models\Lembaga;
use Livewire\Component;
use App\Models\Presensi;
use App\Models\Pelajaran;
use App\Models\TahunAjaran;
use Livewire\WithPagination;
use App\Models\PresensiSholat;
use App\Models\PembinaanSantri;
use App\Models\IzinKeluarSantri;
use App\Models\IzinPulangSantri;
use App\Models\PelanggaranSantri;
use App\Models\PenghargaanSantri;
use App\Models\PresensiAsrama;
use App\Models\PresensiEkstrakurikuler;
use App\Models\PresensiInsidentilSantri;

class RaporSantriDetail extends Component
{
  use WithPagination;
    public $santri;
    public $kelas;
    public $presensis;
    public $presensiSholat;
    public $role;

    public function mount(Santri $santri)
    {
      $this->santri = $santri;
      $this->kelas = explode('/', request()->path())[3];
      $this->role = explode('/', request()->path())[4];
      $this->presensis = Presensi::where('santri_id', $santri->id)->get();
      $this->presensiSholat = PresensiSholat::where('santri_id', $santri->id)->get();
    }
    
    public function render()
    {
        
        $lembagaFormal = Kelas::where('id', $this->santri->kelas_formal_id)->first()->lembaga ?? null;
        $lembagaMadin = Kelas::where('id', $this->santri->kelas_madin_id)->first()->lembaga ?? null;
        $lembagaMmq = Kelas::where('id', $this->santri->kelas_mmq_id)->first()->lembaga ?? null;
        
        if ($this->santri->kelas_formal_id) {
          $pelajaranFormal = Pelajaran::where('lembaga_id', $lembagaFormal->id)->get();
          $presensiFormalPelajaran = json_encode($this->getRekapPresensi($lembagaFormal, 'pelajaran', $pelajaranFormal));
          $presensiFormal = json_encode($this->getRekapPresensi($lembagaFormal, 'lain'));
          $presensiFormalHari = json_encode($this->getRekapPresensi($lembagaFormal, 'hari', ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday']));
          $namaPelajaranFormal = $pelajaranFormal->pluck('nama');
        }
        
        if ($this->santri->kelas_madin_id) {
          $pelajaranMadin = Pelajaran::where('lembaga_id', $lembagaMadin->id)->get();
          $presensiMadinPelajaran = json_encode($this->getRekapPresensi($lembagaMadin, 'pelajaran', $pelajaranMadin));
          $presensiMadin = json_encode($this->getRekapPresensi($lembagaMadin, 'lain'));
          $presensiMadinHari = json_encode($this->getRekapPresensi($lembagaMadin, 'hari', ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday']));
          $namaPelajaranMadin = $pelajaranMadin->pluck('nama');
        }
        
        if ($this->santri->kelas_mmq_id) {
          $pelajaranMmq = Pelajaran::where('lembaga_id', $lembagaMmq->id)->get();
          $presensiMmqPelajaran = json_encode($this->getRekapPresensi($lembagaMmq, 'pelajaran', $pelajaranMmq));
          $presensiMmq = json_encode($this->getRekapPresensi($lembagaMmq, 'lain'));
          $presensiMmqHari = json_encode($this->getRekapPresensi($lembagaMmq, 'hari', ['Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday', 'Sunday']));
          $namaPelajaranMmq = $pelajaranMmq->pluck('nama');
        }
        

       
        return view('livewire.rapor-santri.rapor-santri-detail', [
          'santri' => $this->santri,
          'kelasFormal' => Kelas::find($this->santri->kelas_formal_id),
          'kelasMadin' => Kelas::find($this->santri->kelas_madin_id),
          'kelasMmq' => Kelas::find($this->santri->kelas_mmq_id),
          'kamar' => Kelas::find($this->santri->kelas_asrama_id),

          'presensiFormal' => $presensiFormal ?? null,
          'presensiFormalPelajaran' => $presensiFormalPelajaran ?? null,
          'presensiFormalHari' => $presensiFormalHari ?? null,
          'pelajaranFormal' => $namaPelajaranFormal ?? null,

          'presensiMadin' => $presensiMadin ?? null,
          'presensiMadinPelajaran' => $presensiMadinPelajaran ?? null,
          'presensiMadinHari' => $presensiMadinHari ?? null,
          'pelajaranMadin' => $namaPelajaranMadin ?? null,

          'presensiMmq' => $presensiMmq ?? null,
          'presensiMmqPelajaran' => $presensiMmqPelajaran ?? null,
          'presensiMmqHari' => $presensiMmqHari ?? null,
          'pelajaranMmq' => $namaPelajaranMmq ?? null,

          'rekapPresensiSholat' => json_encode($this->getRekapSholat()),

          'presensiEkstras' => PresensiEkstrakurikuler::with('user', 'ekstrakurikuler')->where('santri_id', $this->santri->id)->latest()->paginate(20, pageName: 'presensiekstra-page'),

          'presensiAsrama' => PresensiAsrama::with('user')->where('santri_id', $this->santri->id)->latest()->paginate(20, pageName: 'presensiasrama-page'),

          'presensiInsidentils' => PresensiInsidentilSantri::with('user')->where('santri_id', $this->santri->id)->latest()->paginate(20, pageName: 'presensiinsidentil-page'),

          'pelanggarans' => PelanggaranSantri::with('referensiPoin', 'user', 'lembaga')->where('santri_id', $this->santri->id)->latest()->paginate(20, pageName: 'pelanggaran-page'),

          'pembinaans' => PembinaanSantri::with('user', 'santri', 'lembaga')->where('santri_id', $this->santri->id)->latest()->paginate(20, pageName: 'pembinaan-page'),

          'penghargaans' => PenghargaanSantri::with('user', 'santri', 'lembaga')->where('santri_id', $this->santri->id)->latest()->paginate(20, pageName: 
          'penghargaan-page'),

          'izinKeluars' => IzinKeluarSantri::where('santri_id', $this->santri->id)->latest()->paginate(20, pageName: 'keluar-page'),

          'izinPulangs' => IzinPulangSantri::where('santri_id', $this->santri->id)->latest()->paginate(20, pageName: 'pulang-page'),

        ])->title('Detail Rapor Santri ' . $this->santri->name);
    }

    
    public $titleModal;
    public $bukti;
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

    public function getRekapPresensi($lembaga, $jenis, $params = null)
    {
      $values = [];
      if ($jenis == 'pelajaran') {
        $arraySakit = [];
        $arrayIzin = [];
        $arrayAlpha = [];
        foreach ($params as $pelajaran) {
          $sakit = 0;
          $izin = 0;
          $alpha = 0;
          foreach ($this->presensis as $presensi) {
            if($presensi->pelajaran_id == $pelajaran->id && $presensi->lembaga_id == $lembaga->id){
              switch ($presensi->keterangan) {
                case 'S':
                  $sakit += 1;
                  break;
                case 'I':
                  $izin += 1;
                  break;
                case 'A':
                  $alpha += 1;
                  break;
              }
            }
          }

          array_push($arraySakit, $sakit);
          array_push($arrayIzin, $izin);
          array_push($arrayAlpha, $alpha);
        }
        array_push($values, $arraySakit, $arrayIzin, $arrayAlpha);
        return $values;

      } elseif($jenis == 'hari') {
        $arraySakit = [];
        $arrayIzin = [];
        $arrayAlpha = [];
        foreach ($params as $hari) {
          $sakit = 0;
          $izin = 0;
          $alpha = 0;
          foreach ($this->presensis as $presensi) {
            if($presensi->created_at->format('l') == $hari && $presensi->lembaga_id == $lembaga->id){
              switch ($presensi->keterangan) {
                case 'S':
                  $sakit += 1;
                  break;
                case 'I':
                  $izin += 1;
                  break;
                case 'A':
                  $alpha += 1;
                  break;
              }
            }
          }

          array_push($arraySakit, $sakit);
          array_push($arrayIzin, $izin);
          array_push($arrayAlpha, $alpha);
        }
        array_push($values, $arraySakit, $arrayIzin, $arrayAlpha);
        return $values;
      } else {
        $bulanGanjil = ['07', '08', '09', '10', '11', '12'];
        $bulanGenap = ['01', '02', '03', '04', '05', '06'];
        $tahunAjaran = explode('/', TahunAjaran::latest()->first()->tahun);
        $arraySakit = [];
        $arrayIzin = [];
        $arrayAlpha = [];
        foreach ($bulanGanjil as $bg) {
          $sakit = 0;
          $izin = 0;
          $alpha = 0;
          
          foreach ($this->presensis as $presensi) {
            if ($presensi->created_at->format('Y-m') == $tahunAjaran[0] . '-' . $bg && $presensi->lembaga_id == $lembaga->id) {
              switch ($presensi->keterangan) {
                case 'S':
                  $sakit += 1;
                  break;
                case 'I':
                  $izin += 1;
                  break;
                case 'A':
                  $alpha += 1;
                  break;
              }
            }
          }
          array_push($arraySakit, $sakit);
          array_push($arrayIzin, $izin);
          array_push($arrayAlpha, $alpha);
        }

        foreach ($bulanGenap as $bge) {
          $sakit = 0;
          $izin = 0;
          $alpha = 0;
          
          foreach ($this->presensis as $presensi) {
            if ($presensi->created_at->format('Y-m') == $tahunAjaran[1] . '-' . $bge && $presensi->lembaga_id == $lembaga->id) {
              switch ($presensi->keterangan) {
                case 'S':
                  $sakit += 1;
                  break;
                case 'I':
                  $izin += 1;
                  break;
                case 'A':
                  $alpha += 1;
                  break;
              }
            }
          }
          array_push($arraySakit, $sakit);
          array_push($arrayIzin, $izin);
          array_push($arrayAlpha, $alpha);
        }
        array_push($values, $arraySakit, $arrayIzin, $arrayAlpha);
        return $values;
      }
    }

    public function getRekapSholat()
    {
      $values = [];
      $arraySakit = [];
      $arrayIzin = [];
      $arrayAlpha = [];

      $waktu = ['Subuh', 'Dhuha', 'Dhuhur', 'Asar', 'Maghrib', 'Isya'];
      foreach ($waktu as $w) {
        $sakit = 0;
        $izin = 0;
        $alpha = 0;
        foreach($this->presensiSholat as $presensi)
        {
          if ($presensi->waktu == $w) {
            switch ($presensi->keterangan) {
              case 'S':
                $sakit += 1;
                break;
              
              case 'I':
                $izin += 1;
                break;
              
              case 'A':
                $alpha += 1;
                break;
              
            }
          }
        }
        array_push($arraySakit, $sakit);
        array_push($arrayIzin, $izin);
        array_push($arrayAlpha, $alpha);

      }
      array_push($values, $arraySakit, $arrayIzin, $arrayAlpha);
      return $values;
    }

}
