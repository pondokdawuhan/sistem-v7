@extends('templates.main')
@section('container')
  <div class=" overflow-x-auto shadow-md sm:rounded-lg">
    @if (session()->has('success'))
      <div class="bg-green-400 text-white px-3 py-2 mb-5">
        <h4 class="text-center font-semibold">{{ session('success') }}</h4>
      </div>
    @endif
    <div class="flex items-center gap-2 mb-2 flex-wrap">
      <a href="/izinKeluarSantri" class=" bg-slate-500 text-white px-3 py-1 rounded-md inline-block">Kembali</a>

    </div>

    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 bg-opacity-85">
      <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
          <th scope="col" class="px-6 py-3">
            No
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
            Status
          </th>
          <th scope="col" class="px-6 py-3">
            Waktu Kembali
          </th>
          <th scope="col" class="px-6 py-3">
            Penanggungjawab
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
            <td class="px-6 py-4">{{ $izin->keperluan }}</td>
            <td class="px-6 py-4">{{ date('d-m-Y H:i:s', $izin->waktu_mulai) }}</td>
            <td class="px-6 py-4">{{ date('d-m-Y H:i:s', $izin->waktu_selesai) }}</td>
            <td class="px-6 py-4">

              @if ($izin->waktu_selesai > time())
                <span class="px-3 py-1 rounded-md bg-green-500 text-white">Berlaku</span>
              @else
                <span class="px-3 py-1 rounded-md bg-slate-500 text-white">Kadaluarsa</span>
              @endif
            </td>
            <td class="px-6 py-4">
              @if ($izin->waktu_kembali)
                {{ date('d-m-Y H:i:s', $izin->waktu_kembali) }} @if ($izin->waktu_kembali < $izin->waktu_selesai)
                  <span class="px-3 py-1 rounded-md bg-green-500 text-white mt-2 inline-block">Tepat</span>
                @else
                  <span class="px-3 py-1 rounded-md bg-red-500 text-white mt-2 inline-block">Terlambat</span>
                @endif
              @endif
            </td>
            <td class="px-6 py-4">{{ $izin->user->name }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>

  </div>
@endsection
