@extends('templates.main')
@section('container')
  <div class=" overflow-x-auto shadow-md sm:rounded-lg">
    <a href="/pelanggaranPendamping" class="px-3 py-1 rounded-md bg-slate-500 text-white inline-block my-2">Kembali</a>
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
