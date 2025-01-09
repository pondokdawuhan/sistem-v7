@extends('templates.main')
@section('container')
  <a href="/presensiEkstrakurikuler/{{ $jurnal->ekstrakurikuler_id }}"
    class="px-3 py-1 rounded-md bg-slate-500 text-white my-2 inline-block mb-2">Kembali</a>

  <div class="dark:bg-slate-900 p-5 rounded-md">
    <div class="card-body">
      <div class="mb-3 font-bold">
        <h4 class="text-center dark:text-white">Detail Jurnal Mengajar {{ $jurnal->user->name }}</h4>
        <h5 class="text-center dark:text-white">Esktra {{ $jurnal->ekstrakurikuler->nama }}</h5>
        <p class="text-center dark:text-white">Tanggal {{ date('d-m-Y', strtotime($jurnal->created_at)) }}</p>
      </div>
      @php
        $sakit = '';
        $jmlSakit = 0;
        $izin = '';
        $jmlIzin = 0;
        $alpha = '';
        $jmlAlpha = 0;

        foreach ($presensis as $presensi) {
            switch ($presensi->keterangan) {
                case 'A':
                    $alpha .= $presensi->santri->name . ',';
                    $jmlSakit += 1;
                    break;
                case 'I':
                    $izin .= $presensi->santri->name . ',';
                    break;
                    $jmlIzin += 1;
                case 'S':
                    $sakit .= $presensi->santri->name . ',';
                    $jmlAlpha += 1;
                    break;
            }
        }
        $hadir = count($jumlahAnggota) - ($jmlSakit + $jmlIzin + $jmlAlpha);
      @endphp
      <div class="overflow-auto">
        <table class="border-collapse w-full">
          <tr class="">
            <td class="text-slate-700 dark:text-white px-3 py-1">Topik</td>
            <td class="text-slate-700 dark:text-white px-3 py-1">: {{ $jurnal->materi }}</td>
          </tr>
          <tr class="">
            <td class="text-slate-700 dark:text-white px-3 py-1">Jumlah Siswa Keseluruhan</td>
            <td class="text-slate-700 dark:text-white px-3 py-1">: {{ count($jumlahAnggota) }}</td>
          </tr>
          <tr class="">
            <td class="text-slate-700 dark:text-white px-3 py-1">Siswa Sakit</td>
            <td class="text-slate-700 dark:text-white px-3 py-1">: {{ $sakit }}</td>
          </tr>
          <tr class="">
            <td class="text-slate-700 dark:text-white px-3 py-1">Siswa Izin</td>
            <td class="text-slate-700 dark:text-white px-3 py-1">: {{ $izin }}</td>
          </tr>
          <tr class="">
            <td class="text-slate-700 dark:text-white px-3 py-1">Siswa Alpha</td>
            <td class="text-slate-700 dark:text-white px-3 py-1">: {{ $alpha }}</td>
          </tr>
          <tr class="">
            <td class="text-slate-700 dark:text-white px-3 py-1">Siswa Hadir</td>
            <td class="text-slate-700 dark:text-white px-3 py-1">: {{ $hadir }}</td>
          </tr>
        </table>
      </div>

    </div>
  </div>
@endsection
