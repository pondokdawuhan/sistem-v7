@extends('templates.main')
@section('container')
  <div class="bg-white dark:bg-slate-900 p-5 rounded-md w-full lg:w-1/2">
    <form action="/izinPulangPendamping" method="POST">
      @csrf

      <div class="flex flex-col gap-2">
        <label for="name" class="text-slate-900 dark:text-white">Nama Santri</label>
        <input type="text" name="user_name" value="{{ auth()->user()->name }}" readonly class="px-3 py-1 rounded-md">
        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
      </div>

      <div class="flex flex-col gap-2 mt-2">
        <label for="waktu_mulai" class="text-slate-900 dark:text-white">Waktu Mulai</label>
        <input type="datetime-local" class="px-3 py-1 rounded-md" name="waktu_mulai" id="waktu_mulai" required>
      </div>

      <div class="flex flex-col gap-2 mt-2">
        <label for="waktu_selesai" class="text-slate-900 dark:text-white">Waktu Selesai</label>
        <input type="datetime-local" class="px-3 py-1 rounded-md" name="waktu_selesai" id="waktu_selesai" required>
      </div>

      <div class="flex flex-col gap-2 mt-2">
        <label for="keperluan" class="text-slate-900 dark:text-white">Keperluan</label>
        <input type="text" class="px-3 py-1 rounded-md" name="keperluan" id="keperluan" required>
      </div>

      <div class="flex gap-2 justify-center items-center mt-5">
        <a href="/izinPulangPendamping" class="inline-block px-3 py-1 rounded-md text-white bg-slate-500">Kembali</a>
        <button type="submit" class="px-3 py-1 rounded-md bg-violet-500 text-white">Simpan</button>
      </div>
    </form>
  </div>
@endsection
