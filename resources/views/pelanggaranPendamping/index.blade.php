@extends('templates.main')
@section('container')
  <div class=" overflow-x-auto shadow-md sm:rounded-lg">
    @if (session()->has('success'))
      <div class="bg-green-400 text-white px-3 py-2 mb-5">
        <h4 class="text-center font-semibold">{{ session('success') }}</h4>
      </div>
    @endif
    <div class="flex items-center gap-2 mb-2 justify-between">
      <div class="w-full lg:w-1/3">
        <form action="">
          <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
          <div class="relative flex items-center gap-2">
            <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
              <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                fill="none" viewBox="0 0 20 20">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
              </svg>
            </div>
            <input type="search" id="default-search"
              class="block w-full ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
              placeholder="nama, email, atau username" name="keyword" autofocus>
            <button type="submit"
              class="text-white end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
          </div>
        </form>
      </div>
      <div>
        <form action="/downloadPelanggaranPendamping" method="POST">
          @csrf
          <div class="flex gap-2">
            <div class="flex flex-col">
              <label for="tanggalAwal" class="text-slate-900 dark:text-white">Mulai</label>
              <input type="date" class="px-3 py-1 rounded-md dark:bg-slate-800 dark:text-white" name="tanggalAwal">
            </div>
            <div class="flex flex-col">
              <label for="tanggalAkhir" class="text-slate-900 dark:text-white">Akhir</label>
              <input type="date" class="px-3 py-1 rounded-md dark:bg-slate-800 dark:text-white" name="tanggalAkhir">
            </div>
            <div class="flex flex-col justify-end">
              <button class="px-3 py-1 rounded-md bg-green-500 text-white">Download</button>
            </div>
          </div>
        </form>
      </div>
    </div>

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
            <td class="px-6 py-4"><a
                href="/pelanggaranPendamping/{{ $pelanggaran->user->username }}">{{ $pelanggaran->user->name }}</a></td>
            <td class="px-6 py-4">{{ $pelanggaran->referensiPoin->name }}</td>
            <td class="px-6 py-4">{{ $pelanggaran->keterangan }}</td>
            <td class="px-6 py-4">{{ $pelanggaran->poin }}</td>

          </tr>
        @endforeach
      </tbody>
    </table>

    <div class="mt-4 flex justify-end">
      {{ $pelanggarans->links() }}
    </div>

  </div>
@endsection
