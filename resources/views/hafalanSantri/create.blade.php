@extends('templates.main')
@section('container')

  <div class=" overflow-x-auto shadow-md sm:rounded-lg bg-white p-5 rounded-md dark:bg-slate-900">
    <div class="flex items-center gap-2 mb-2">
      <form action="">
        <div class="flex flex-wrap lg:flex-nowrap gap-3">

          <div class="flex flex-col w-full lg:w-min gap-2">

            <label for="kelas" class="text-slate-800 dark:text-white">Kelas</label>

            <select name="kelas" id="kelas" class="px-3 py-1 rounded-md dark:bg-slate-700 dark:text-white" required>
              <option value="">Pilih</option>
              @foreach ($kelass as $kelas)
                <option value="{{ $kelas->id }}" @if (request('kelas') == $kelas->id) selected @endif>
                  {{ $kelas->nama }}
                </option>
              @endforeach
            </select>
          </div>

          <div class="flex flex-col w-full lg:w-min gap-2">

            <label for="tanggal" class="text-slate-800 dark:text-white">Tanggal</label>
            <input type="date" name="tanggal" id="tanggal"
              class="px-3 py-1 rounded-md dark:bg-slate-700 dark:text-white" required value="{{ request('tanggal') }}">
          </div>

          <div class="flex flex-col w-full lg:w-min gap-2">
            <label for="pelajaran" class="text-white dark:text-slate-900">Label</label>
            <button type="submit" class="px-3 py-1 rounded-md text-white bg-green-500">pilih</button>
          </div>
        </div>
      </form>
    </div>

    @isset($santris)
      @php
        $url = explode('/', request()->path());
      @endphp
      <form action="/{{ $url[0] }}/{{ $url[1] }}" method="POST">
        @csrf
        <input type="hidden" name="tanggal" value="{{ request('tanggal') }}">
        <div>
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
                  Hafalan
                </th>
              </tr>
            </thead>
            <tbody>

              @foreach ($santris as $santri)
                <tr
                  class="bg-white border-b  bg-opacity-85 dark:bg-slate-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 ">
                  <td class="px-3 py-1">{{ $loop->iteration }}</td>
                  <td class="px-3 py-1">{{ $santri->name }}</td>
                  <input type="hidden" name="santri_id[]" value="{{ $santri->id }}">
                  <td><input type="text" class="px-3 py-2 w-full rounded-md dark:bg-slate-700 dark:text-white"
                      name="keterangan[]"></td>
                </tr>
              @endforeach
            </tbody>
          </table>
          <div class="flex justify-end mr-5">
            <button type="submit" class="px-3 py-1 rounded-md bg-violet-500 text-white mt-5">Kirim</button>
          </div>
        </div>
      </form>
    @endisset
  </div>
@endsection
