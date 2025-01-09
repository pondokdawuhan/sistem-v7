@extends('templates.main')
@section('container')
  <div class=" overflow-x-auto shadow-md sm:rounded-lg">
    @if (session()->has('success'))
      <div class="bg-green-400 text-white px-3 py-2 mb-5">
        <h4 class="text-center font-semibold">{{ session('success') }}</h4>
      </div>
    @endif
    <div class="flex items-center gap-2 mb-2">

      <form action="/download/poinSantri" method="POST">
        @csrf
        <button type="submit" class="bg-violet-500 text-white px-3 py-1 rounded-md">Download</button>
      </form>

      <div class="w-full lg:w-1/3">
        <form action="">
          <label for="default-search"
            class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
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
    </div>

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
            Poin Formal
          </th>
          <th scope="col" class="px-6 py-3">
            Poin Madin
          </th>
          <th scope="col" class="px-6 py-3">
            Poin MMQ
          </th>
          <th scope="col" class="px-6 py-3">
            Poin Asrama
          </th>
          <th scope="col" class="px-6 py-3">
            Poin Ekstrakurikuler
          </th>
          <th scope="col" class="px-6 py-3">
            Poin Ibadah
          </th>
          <th scope="col" class="px-6 py-3">
            Poin Pelanggaran
          </th>
          <th scope="col" class="px-6 py-3">
            Pengurangan
          </th>
          <th scope="col" class="px-6 py-3">
            Jumlah
          </th>
        </tr>
      </thead>
      <tbody>
        @foreach ($poins as $poin)
          <tr
            class="bg-white border-b  bg-opacity-85 dark:bg-slate-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

            <td class="px-6 py-4">{{ $loop->iteration }}</td>
            <td class="px-6 py-4">{{ $poin->santri->name }}</td>
            <td class="px-6 py-4">{{ $poin->poin_formal }}</td>
            <td class="px-6 py-4">{{ $poin->poin_madin }}</td>
            <td class="px-6 py-4">{{ $poin->poin_mmq }}</td>
            <td class="px-6 py-4">{{ $poin->poin_asrama }}</td>
            <td class="px-6 py-4">{{ $poin->poin_ekstrakurikuler }}</td>
            <td class="px-6 py-4">{{ $poin->poin_ibadah }}</td>
            <td class="px-6 py-4">{{ $poin->poin_pelanggaran }}</td>
            <td class="px-6 py-4">{{ $poin->poin_dikurangi }}</td>
            <td class="px-6 py-4 bold text-red-500 font-bold text-base">{{ $poin->jumlah }}</td>
            {{-- <td class="px-6 py-4">



              <i class="toggleMyModal fa-solid fa-edit text-white bg-sky-500 rounded-lg text-xs px-3 py-1 inline-block cursor-pointer"
                data-modal-target="myModal" data-modal-toggle="myModal" data-modal="satu"
                data-title="Edit {{ $title }}" data-data="{{ $poin }}"
                data-url="{{ request()->path() }}"></i>
              <i class="toggleDeleteModal mt-2 fa-solid fa-trash text-white bg-red-500 rounded-lg text-xs px-3 py-1 inline-block cursor-pointer"
                data-modal-target="popup-modal" data-modal-toggle="popup-modal"
                data-title="Apakah Anda yakin menghapus referensi poin ini?" data-url="{{ request()->path() }}"
                data-id="{{ $poin->id }}"></i>

            </td> --}}
          </tr>
        @endforeach
      </tbody>
    </table>
    {{ $poins->links() }}
  </div>
@endsection
