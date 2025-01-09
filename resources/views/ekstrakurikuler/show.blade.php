@extends('templates.main')
@section('container')
  <div class="bg-white dark:bg-slate-800 p-3">

    @if (session()->has('success'))
      <div class="bg-green-400 text-white px-3 py-2 mb-5">
        <h4 class="text-center font-semibold">{{ session('success') }}</h4>
      </div>
    @endif
    <a href="/ekstrakurikuler" class="px-3 py-1 rounded-md bg-slate-500 text-white mb-2 inline-block">Kembali</a>
    <form action="/{{ request()->path() }}/deleteRombelEkstra" method="POST">
      @csrf
      @method('delete')

      <div class="card-body">
        <div class="overflow-auto">
          <h4 class="text-center dark:text-white">Rombel Ekstra {{ $ekstra->name }}</h4>
          <table class="text-sm border-collapse w-full">
            <thead class="bg-amber-500">
              <tr>
                <td class="text-white px-3 py-1">#</td>
                <td class="text-white px-3 py-1">No</td>
                <td class="text-white px-3 py-1">Nama</td>
            </thead>
            <tbody>

              @foreach ($ekstraSantri as $ks)
                <tr class="">

                  <td>
                    <input type="checkbox" name="santriId[]" id="user" value="{{ $ks->id }}">
                  </td>
                  <td class="text-slate-700 dark:text-white px-3 py-1">{{ $loop->iteration }}</td>
                  <td class="text-slate-700 dark:text-white px-3 py-1">{{ $ks->name }}</td>

                </tr>
              @endforeach
            </tbody>
          </table>
        </div>

        <button type="submit" class="bg-red-500 px-3 py-1 mt-2 rounded-md text-white"
          onclick="return confirm('Apakah Anda yakin mengeluarkan dari rombel?')">Keluarkan</button>
      </div>
    </form>
  </div>

  <div class="bg-white dark:bg-slate-800 p-3 w-full lg:w-2/3 mt-5">
    <h5 class="text-slate-800 dark:text-white">Tambah Rombel Kelas</h5>
    <form action="/{{ request()->path() }}/editRombel" method="POST">
      @csrf
      @method('put')

      <div class="">
        <select class="js-example-basic-multiple dark:text-white dark:bg-slate-850" name="userId[]" multiple="multiple">
          <option value="">Pilih</option>
          @foreach ($santris as $santri)
            <option value="{{ $santri->id }}">
              {{ $santri->name }}
            </option>
          @endforeach
        </select>
      </div>
      <div class="">
        <button class="bg-sky-500 text-white px-3 py-1 rounded-md mt-5">Tambah</button>
      </div>
    </form>
  </div>
@endsection
