@extends('templates.main')
@section('container')
  <div class=" overflow-x-auto shadow-md sm:rounded-lg">

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
    @if ($pelanggarans)
      <div class="my-3 text-center font-bold dark:text-white text-slate-900">
        <h3>Rekapitulasi Pelanggaran Santri</h3>
        <h6>Mulai {{ date('d-m-Y', strtotime(request('tanggalAwal'))) }} sampai
          {{ date('d-m-Y', strtotime(request('tanggalAkhir'))) }}</h6>
      </div>
      <form action="/download/rekapPelanggaran" method="POST">
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
              Tanggal
            </th>
            <th scope="col" class="px-6 py-3">
              Nama
            </th>
            <th scope="col" class="px-6 py-3">
              Kategori
            </th>
            <th scope="col" class="px-6 py-3">
              Keterangan
            </th>
            <th scope="col" class="px-6 py-3">
              Poin
            </th>

          </tr>
        </thead>
        <tbody>
          @foreach ($pelanggarans as $pelanggaran)
            <tr
              class="bg-white border-b  bg-opacity-85 dark:bg-slate-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

              <td class="px-6 py-4">{{ $loop->iteration }}</td>
              <td class="px-6 py-4">{{ date('d-m-Y', strtotime($pelanggaran->tanggal)) }}</td>
              <td class="px-6 py-4">{{ $pelanggaran->santri->name }}</td>
              <td class="px-6 py-4">{{ $pelanggaran->referensiPoin->name }}</td>
              <td class="px-6 py-4">{{ $pelanggaran->keterangan }}</td>
              <td class="px-6 py-4">{{ $pelanggaran->poin }}</td>

            </tr>
          @endforeach
        </tbody>
      </table>
    @endif

  </div>
@endsection
