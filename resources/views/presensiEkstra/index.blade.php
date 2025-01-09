@extends('templates.main')
@section('container')
  <div>
    <a href="/presensiEkstrakurikuler/create/{{ $ekstrakurikuler->id }}"
      class="bg-green-500 text-white rounded-md px-3 py-1 inline-block mb-2">Tambah</a>

    <div class="flex items-center gap-2 mb-2">

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
              placeholder="nama" name="keyword" autofocus>
            <button type="submit"
              class="text-white end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
          </div>
        </form>
      </div>
    </div>

    <div>
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
              Materi
            </th>
            <th scope="col" class="px-6 py-3">
              Aksi
            </th>

          </tr>
        </thead>
        <tbody>
          @php
            $i = request('page') ?? 1 * 20 - 19;
          @endphp
          @foreach ($jurnals as $jurnal)
            <tr
              class="bg-white border-b  bg-opacity-85 dark:bg-slate-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
              <td class="px-6 py-4">{{ $i++ }}</td>
              <td class="px-6 py-4">{{ date('d-m-Y', strtotime($jurnal->created_at)) }}</td>
              <td class="px-6 py-4">{{ $jurnal->materi }}</td>
              <td class="px-6 py-4"><a href="/detailJurnalEkstrakurikuler/{{ $jurnal->id }}"
                  class="px-3 py-1 rounded-md bg-amber-500 text-white">Lihat</a></td>
            </tr>
          @endforeach
        </tbody>
      </table>

      <div class="mt-4 flex justify-end">
        {{ $jurnals->links() }}
      </div>
    </div>
  </div>
@endsection
