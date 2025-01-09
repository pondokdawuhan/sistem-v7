@extends('templates.main')
@section('container')
  <div class="bg-white dark:bg-slate-900 p-5 rounded-md w-full lg:w-1/2">
    <form action="/penguranganPoin/{{ $pengurangan->id }}" method="POST">
      @csrf
      @method('put')
      <div class="flex flex-col gap-2">
        <label for="name" class="text-slate-900 dark:text-white">Nama Santri</label>
        <input type="text" name="" id="" value="{{ $pengurangan->santri->name }}">
      </div>

      <div class="flex flex-col gap-2 mt-2">
        <label for="tanggal" class="text-slate-900 dark:text-white">Tanggal</label>
        <input type="date" class="px-3 py-1 rounded-md" name="tanggal" id="tanggal" required
          value="{{ $pengurangan->tanggal }}">
      </div>

      <div class="flex flex-col gap-2 mt-2">
        <label for="keterangan" class="text-slate-900 dark:text-white">Keterangan</label>
        <input type="text" class="px-3 py-1 rounded-md" name="keterangan" id="keterangan" required
          value="{{ $pengurangan->keterangan }}">
      </div>

      <div class="flex flex-col gap-2 mt-2">
        <label for="poin_dikurangi" class="text-slate-900 dark:text-white">Poin Dikurangi</label>
        <input type="text" class="px-3 py-1 rounded-md" name="poin_dikurangi" id="poin_dikurangi" required
          value="{{ $pengurangan->poin_dikurangi }}">
      </div>

      <div class="flex gap-2 justify-center items-center mt-5">
        <a href="/penguranganPoin" class="inline-block px-3 py-1 rounded-md text-white bg-slate-500">Kembali</a>
        <button type="submit" class="px-3 py-1 rounded-md bg-violet-500 text-white">Simpan</button>
      </div>
    </form>
  </div>
@endsection
