@extends('templates.main')
@section('container')
  <div class="bg-white dark:bg-slate-900 p-5 rounded-md w-full lg:w-1/2">
    <form action="/izinPulangPendamping/{{ $izin->id }}" method="POST">
      @csrf
      @method('put')

      <div class="flex flex-col gap-2">
        <label for="name" class="text-slate-900 dark:text-white">Nama Pendamping</label>
        <input type="text" value="{{ $izin->user->name }}" class="px-3 py-1 rounded-md disabled" disabled>
      </div>

      <div class="flex flex-col gap-2 mt-2">
        <label for="waktu_mulai" class="text-slate-900 dark:text-white">Waktu Mulai</label>
        <input type="datetime-local" class="px-3 py-1 rounded-md" name="waktu_mulai" id="waktu_mulai" required
          value="{{ date('Y-m-d H:i:s', strtotime($izin->waktu_mulai)) }}">
      </div>

      <div class="flex flex-col gap-2 mt-2">
        <label for="waktu_selesai" class="text-slate-900 dark:text-white">Waktu Selesai</label>
        <input type="datetime-local" class="px-3 py-1 rounded-md" name="waktu_selesai" id="waktu_selesai" required
          value="{{ date('Y-m-d H:i:s', strtotime($izin->waktu_selesai)) }}">
      </div>

      <div class="flex flex-col gap-2 mt-2">
        <label for="keperluan" class="text-slate-900 dark:text-white">Keperluan</label>
        <input type="text" class="px-3 py-1 rounded-md" name="keperluan" id="keperluan" required
          value="{{ $izin->keperluan }}">
      </div>

      <div class="flex gap-2 justify-center items-center mt-5">
        <a href="/izinPulangPendamping" class="inline-block px-3 py-1 rounded-md text-white bg-slate-500">Kembali</a>
        <button type="submit" class="px-3 py-1 rounded-md bg-violet-500 text-white">Simpan</button>
      </div>
    </form>
  </div>
@endsection
