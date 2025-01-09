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

    @if ($penghargaans)
      <div class="my-3 text-center font-bold dark:text-white text-slate-900">
        <h3>Rekapitulasi Penghargaan Santri</h3>
        <h6>Mulai {{ date('d-m-Y', strtotime(request('tanggalAwal'))) }} sampai
          {{ date('d-m-Y', strtotime(request('tanggalAkhir'))) }}</h6>
      </div>
      <form action="/download/rekapPenghargaan" method="POST">
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
              Prestasi
            </th>
            <th scope="col" class="px-6 py-3">
              Penghargaan
            </th>
            <th scope="col" class="px-6 py-3">
              Aksi
            </th>
          </tr>
        </thead>
        <tbody>
          @foreach ($penghargaans as $penghargaan)
            <tr
              class="bg-white border-b  bg-opacity-85 dark:bg-slate-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

              <td class="px-6 py-4">{{ $loop->iteration }}</td>
              <td class="px-6 py-4">{{ date('d-m-Y', strtotime($penghargaan->tanggal)) }}</td>
              <td class="px-6 py-4">{{ $penghargaan->santri->name }}</td>
              <td class="px-6 py-4">{{ $penghargaan->prestasi }}</td>
              <td class="px-6 py-4">{{ $penghargaan->penghargaan }}</td>
              <td class="px-6 py-4">
                <a href="/penghargaanSantri/{{ $penghargaan->id }}/edit"><i
                    class=" fa-solid fa-edit text-white bg-sky-500 rounded-lg text-xs px-3 py-1 inline-block cursor-pointer"></i></a>
                <i class="toggleDeleteModal mt-2 fa-solid fa-trash text-white bg-red-500 rounded-lg text-xs px-3 py-1 inline-block cursor-pointer"
                  data-modal-target="popup-modal" data-modal-toggle="popup-modal"
                  data-title="Apakah Anda yakin menghapus penghargaan ini?" data-url="{{ request()->path() }}"
                  data-id="{{ $penghargaan->id }}"></i>

              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    @endif

  </div>
@endsection
