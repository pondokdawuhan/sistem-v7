@extends('templates.main')
@section('container')
  <div class=" overflow-x-hidden shadow-md sm:rounded-lg">

    <div class="flex items-center gap-2 mb-2">
      <div class="flex flex-col lg:flex-row items-end mb-2 gap-2 w-full lg:justify-between">
        <form action="" class="inline-block w-full lg:w-1/2">
          <input type="hidden" name="kelas" value="{{ request('kelas') }}">
          <div class="w-full flex flex-col lg:flex-row gap-5">
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
            <div class="flex flex-col justify-end gap-2">
              <button type="submit" class="px-3 py-1 rounded-md text-white bg-green-500">pilih</button>
            </div>
          </div>
        </form>
        <form action="/download/jurnal" method="POST" class="inline-block">
          @csrf
          <input type="hidden" name="lembaga" value="{{ request('lembaga')->id }}">
          <input type="hidden" name="title" value="{{ $title }}">
          <input type="hidden" name="tanggalAwal" value="{{ request('tanggalAwal') }}">
          <input type="hidden" name="tanggalAkhir" value="{{ request('tanggalAkhir') }}">
          <button type="submit" class="px-3 py-1 rounded-md bg-amber-500 text-white">Download</button>
        </form>
      </div>
    </div>

    <div class="flex items-center gap-2 mb-2 overflow-auto">

      <div class="w-full gap-2">
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
                  Nama
                </th>
                <th scope="col" class="px-6 py-3">
                  Kelas
                </th>
                <th scope="col" class="px-6 py-3">
                  Mapel
                </th>
                <th scope="col" class="px-6 py-3">
                  Jam
                </th>
                <th scope="col" class="px-6 py-3">
                  Materi
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
                  <td class="px-6 py-4">{{ date('d-m-Y H:i', strtotime($jurnal->created_at)) }}</td>
                  <td class="px-6 py-4">{{ $jurnal->user->name }}</td>
                  <td class="px-6 py-4">{{ $jurnal->kelas->nama }}</td>
                  <td class="px-6 py-4">{{ $jurnal->pelajaran->nama }}</td>
                  <td class="px-6 py-4">{{ $jurnal->jam }}</td>
                  <td class="px-6 py-4">{{ $jurnal->materi }}</td>

                </tr>
              @endforeach
            </tbody>
          </table>

        </div>
      </div>
      <div class="my-2">{{ $jurnals->links() }}</div>
    </div>
  @endsection
