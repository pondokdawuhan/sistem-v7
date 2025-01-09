@extends('templates.main')
@section('container')
  @php
    $url = explode('/', request()->path());
  @endphp
  <div class=" overflow-x-auto shadow-md sm:rounded-lg">
    <a href="/{{ $lembaga }}/hafalanSantri"
      class="px-3 py-1 rounded-md bg-slate-500 text-white inline-block mb-2">Kembali</a>
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
            Keterangan
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
        @foreach ($hafalans as $hafalan)
          <tr
            class="bg-white border-b  bg-opacity-85 dark:bg-slate-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

            <td class="px-6 py-4">{{ $i++ }}</td>
            <td class="px-6 py-4">{{ date('d-m-Y', strtotime($hafalan->tanggal)) }}</td>
            <td class="px-6 py-4"><a
                href="/{{ $url[0] }}/detailHafalanSantri/{{ $hafalan->santri->username }}">{{ $hafalan->santri->name }}</a>
            </td>
            <td class="px-6 py-4">{{ $hafalan->keterangan }}</td>
            <td class="px-6 py-4">{{ $hafalan->user->name }}</td>

          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
@endsection
