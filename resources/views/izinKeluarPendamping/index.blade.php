@extends('templates.main')
@section('container')
  <div class=" overflow-x-auto shadow-md sm:rounded-lg">
    @if (session()->has('success'))
      <div class="bg-green-400 text-white px-3 py-2 mb-5">
        <h4 class="text-center font-semibold">{{ session('success') }}</h4>
      </div>
    @endif
    <div class="flex items-center gap-2 mb-2 flex-wrap">
      @if (!request()->is('keamanan*'))
        <a href="/izinKeluarPendamping/create"
          class=" bg-violet-500 text-white px-3 py-1 rounded-md inline-block">Tambah</a>
      @endif
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
            Cek Satpam
          </th>
          <th scope="col" class="px-6 py-3">
            Status
          </th>
          <th scope="col" class="px-6 py-3">
            Waktu Kembali
          </th>
          <th scope="col" class="px-6 py-3">
            Aksi
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
                href="/detailIzinKeluarPendamping/{{ $izin->user->username }}">{{ $izin->user->name }}</a>
            </td>
            <td class="px-6 py-4">{{ $izin->keperluan }}</td>
            <td class="px-6 py-4">{{ date('d-m-Y H:i:s', strtotime($izin->waktu_mulai)) }}</td>
            <td class="px-6 py-4">{{ date('d-m-Y H:i:s', strtotime($izin->waktu_selesai)) }}</td>
            <td>
              @if ($izin->cek_satpam == true)
                <span class="px-3 py-1 rounded-md bg-green-500 text-white">Sudah</span>
              @else
                <span class="px-3 py-1 rounded-md bg-red-500 text-white">Belum</span>
              @endif
            </td>
            <td class="px-6 py-4">

              @if ($izin->waktu_selesai > time() && $izin->waktu_kembali == null)
                <span class="px-3 py-1 rounded-md bg-green-500 text-white">Berlaku</span>
              @else
                <span class="px-3 py-1 rounded-md bg-slate-500 text-white">Kadaluarsa</span>
              @endif
            </td>
            <td class="px-6 py-4">
              @if ($izin->waktu_kembali)
                {{ date('d-m-Y H:i:s', strtotime($izin->waktu_kembali)) }} @if ($izin->waktu_kembali < $izin->waktu_selesai)
                  <span class="px-3 py-1 rounded-md bg-green-500 text-white mt-2 inline-block">Tepat</span>
                @else
                  <span class="px-3 py-1 rounded-md bg-red-500 text-white mt-2 inline-block">Terlambat</span>
                @endif
              @endif
            </td>

            <td class="px-6 py-4">

              @hasrole(['Keamanan', 'Super Admin'])
                @if ($izin->cek_satpam == false)
                  <button type="button"
                    class="toggleCekSatpamModal mt-2 text-white bg-violet-500 rounded-lg text-xs px-3 py-1 inline-block cursor-pointer"
                    data-modal-target="popup-modal-cek-satpam" data-modal-toggle="popup-modal-cek-satpam"
                    data-title="Yakin Cek Izin {{ $izin->user->name }}?" data-data="{{ $izin }}"
                    data-url="izinKeluarPendamping/cekSatpam">Cek</button>
                @endif
              @endhasrole

              @if ($izin->waktu_kembali == null)
                <button type="button"
                  class="toggleMyModal mt-2 text-white bg-amber-500 rounded-lg text-xs px-3 py-1 inline-block cursor-pointer"
                  data-modal-target="myModal" data-modal-toggle="myModal" data-modal="kembali"
                  data-title="Waktu Kembali {{ $izin->user->name }}" data-data="{{ $izin }}"
                  data-url="izinKeluarPendamping/kembali">Kembali</button>
              @endif

              @if (!request()->is('keamanan*'))
                @if ($izin->waktu_selesai > time() && $izin->waktu_kembali == null)
                  @if ($izin->user_id == auth()->user()->id)
                    <button type="button"
                      class="toggleDeleteModal mt-2 text-white bg-red-500 rounded-lg text-xs px-3 py-1 inline-block cursor-pointer"
                      data-modal-target="popup-modal" data-modal-toggle="popup-modal"
                      data-title="Apakah Anda yakin menghapus Data Izin user ini?" data-url="{{ request()->path() }}"
                      data-id="{{ $izin->id }}">Hapus</button>
                  @endif
                @endif
              @endif
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>

    <div class="mt-4 flex justify-end">
      {{ $izins->links() }}
    </div>

    @include('partials.popUpDelete')

    @include('partials.modal')

    @include('partials.popUpCekSatpam')
  </div>
@endsection
