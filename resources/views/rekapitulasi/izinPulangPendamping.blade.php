@extends('templates.main')
@section('container')
  <div class=" overflow-x-auto shadow-md sm:rounded-lg">

    <div class="flex items-center gap-2 mb-2">
      <div class="flex items-center gap-2 mb-2">

        <form action="">
          <div class="w-full flex flex-wrap gap-5">
            <div class="flex flex-col gap-2">
              <label for="tanggalAwal" class="text-slate-900 dark:text-white">Tanggal Awal</label>
              <input type="date" name="tanggalAwal" id="tanggalAwal" required
                class="px-3 py-1 rounded-md text-slate-900 dark:text-white dark:bg-slate-900"
                @if (request('tanggalAwal')) value="{{ request('tanggalAwal') }}" @endif>
            </div>
            <div class="flex flex-col gap-2">
              <label for="tanggalAkhir" class="text-slate-900 dark:text-white">Tanggal Akhir</label>
              <input type="date" name="tanggalAkhir" id="tanggalAkhir" required
                class="px-3 py-1 rounded-md text-slate-900 dark:text-white dark:bg-slate-900"
                @if (request('tanggalAkhir')) value="{{ request('tanggalAkhir') }}" @endif>
            </div>
            <div class="flex flex-col gap-2">
              <label for="tanggalAkhir" class="text-white dark:text-slate-900">Pilih</label>
              <button type="submit" class="px-3 py-1 rounded-md text-white bg-green-500">pilih</button>
            </div>
          </div>
        </form>
      </div>
    </div>

    @if ($izins)
      <div class="my-3 text-center font-bold dark:text-white text-slate-900">
        <h3>Rekapitulasi Izin Pulang Pendamping</h3>
        <h6>Mulai {{ date('d-m-Y', strtotime(request('tanggalAwal'))) }} sampai
          {{ date('d-m-Y', strtotime(request('tanggalAkhir'))) }}</h6>
      </div>
      <form action="/download/rekapIzinPulangPendamping" method="POST">
        @csrf
        <input type="hidden" name="tanggalAwal" value="{{ request('tanggalAwal') }}">
        <input type="hidden" name="tanggalAkhir" value="{{ request('tanggalAkhir') }}">
        <button type="submit" class="px-3 py-1 rounded-md bg-violet-500 text-white my-2">Download</button>
      </form>


      <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 bg-opacity-85">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
          <tr>
            <th scope="col" class="px-6 py-3">
              No
            </th>
            <th scope="col" class="px-6 py-3">
              Nama
            </th>
            <th scope="col" class="px-6 py-3">
              Keperluan
            </th>
            <th scope="col" class="px-6 py-3">
              Waktu Mulai
            </th>
            <th scope="col" class="px-6 py-3">
              Waktu Selesai
            </th>
            <th scope="col" class="px-6 py-3">
              Persetujuan Pengasuh
            </th>
            <th scope="col" class="px-6 py-3">
              Cek Satpam
            </th>
            <th scope="col" class="px-6 py-3">
              Status
            </th>
            <th scope="col" class="px-6 py-3">
              Waktu Kembali
            </th>
          </tr>
        </thead>
        <tbody>
          @php
            $i = (request('page') ?? 1) * 20 - 19;
          @endphp
          @foreach ($izins as $izin)
            <tr
              class="bg-white border-b  bg-opacity-85 dark:bg-slate-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

              <td class="px-6 py-4">{{ $i++ }}</td>
              <td class="px-6 py-4"><a
                  href="/detailIzinPulangPendamping/{{ $izin->user->username }}">{{ $izin->user->name }}</a>
              </td>
              <td class="px-6 py-4">{{ $izin->keperluan }}</td>
              <td class="px-6 py-4">{{ date('d-m-Y H:i:s', strtotime($izin->waktu_mulai)) }}</td>
              <td class="px-6 py-4">{{ date('d-m-Y H:i:s', strtotime($izin->waktu_selesai)) }}</td>
              <td>

                <span
                  class="px-3 py-1 rounded-md @if ($izin->persetujuan_pengasuh == 'Ya') bg-green-500 @else bg-red-500 @endif text-white">{{ $izin->persetujuan_pengasuh }}</span>
              </td>
              <td>
                @if ($izin->cek_satpam == true)
                  <span class="px-3 py-1 rounded-md bg-green-500 text-white">Sudah</span>
                @else
                  <span class="px-3 py-1 rounded-md bg-red-500 text-white">Belum</span>
                @endif
              </td>
              <td class="px-6 py-4">

                @if (strtotime($izin->waktu_selesai) > time() && $izin->waktu_kembali == null)
                  <span class="px-3 py-1 rounded-md bg-green-500 text-white">Berlaku</span>
                @else
                  <span class="px-3 py-1 rounded-md bg-slate-500 text-white">Kadaluarsa</span>
                @endif
              </td>
              <td class="px-6 py-4">
                @if ($izin->waktu_kembali)
                  {{ date('d-m-Y H:i:s', strtotime($izin->waktu_kembali)) }}
                  @if (strtotime($izin->waktu_kembali) < strtotime($izin->waktu_selesai))
                    <span class="px-3 py-1 rounded-md bg-green-500 text-white mt-2 inline-block">Tepat</span>
                  @else
                    <span class="px-3 py-1 rounded-md bg-red-500 text-white mt-2 inline-block">Terlambat</span>
                  @endif
                @endif
              </td>

            </tr>
          @endforeach
        </tbody>
      </table>
    @endif
  </div>
@endsection
