@extends('templates.main')
@section('container')
  <div class=" overflow-hidden shadow-md sm:rounded-lg bg-white p-5 rounded-md dark:bg-slate-900">

    @php
      $url = explode('/', request()->path());
    @endphp
    <form action="/{{ $url[0] }}/{{ $url[1] }}/{{ $hafalan->id }}" method="POST">
      @csrf
      @method('put')
      <div class="overflow-auto w-full lg:w-1/2">
        <div class="flex flex-col">
          <label for="" class="dark:text-white">Nama</label>
          <input type="text" class="px-3 py-1 rounded-md dark:bg-slate-700 dark:text-white"
            value="{{ $hafalan->santri->name }}" readonly>
        </div>
        <div class="flex flex-col mt-2">
          <label for="tanggal" class="dark:text-white">Tanggal</label>
          <input type="date" class="px-3 py-1 rounded-md dark:bg-slate-700 dark:text-white"
            value="{{ $hafalan->tanggal }}" name="tanggal">
        </div>
        <div class="flex flex-col mt-2">
          <label for="keterangan" class="dark:text-white">Keterangan</label>
          <input type="text" class="px-3 py-1 rounded-md dark:bg-slate-700 dark:text-white"
            value="{{ $hafalan->keterangan }}" name="keterangan">
        </div>
        <div class="flex justify-end mr-5">
          <button type="submit" class="px-3 py-1 rounded-md bg-violet-500 text-white mt-5">Kirim</button>
        </div>
      </div>
    </form>
  </div>
@endsection
