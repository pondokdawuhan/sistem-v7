@extends('templates.main')
@section('container')
  <div class="bg-white dark:bg-slate-900 p-5 rounded-md w-full">
    @php
      $url = explode('/', request()->path());
    @endphp
    <div class="flex flex-col gap-2">
      <label for="name" class="text-slate-900 dark:text-white">Nama Guru</label>
      <select class="js-example-basic-multiple dark:text-white dark:bg-slate-850" name="user_id" id="name" required
        data-lembaga="{{ $url[0] }}">
        <option value="">Pilih</option>
        @foreach ($users as $user)
          <option value="{{ $user->id }}">
            {{ $user->name }}
          </option>
        @endforeach
      </select>
    </div>

    <h5 class="my-2 text-slate-800 dark:text-white border-b border-slate-500">Pilih Jadwal</h5>

    <div id="container">
      <div class="mb-2 border-b border-slate-500 pb-3 flex gap-3">
        <div class="flex flex-col gap-2 mt-2">
          <label for="kelasUser" class="text-slate-900 dark:text-white">Kelas</label>
          <select name="kelas" id="kelasUser" required class="px-3 py-1 rounded-md kelas">
            <option value="">Pilih</option>
            @foreach ($kelass as $kelas)
              <option value="{{ $kelas->id }}" data-name="{{ $kelas->nama }}">{{ $kelas->nama }}</option>
            @endforeach
          </select>
        </div>

        <div class="flex flex-col gap-2 mt-2" id="optionMapelUser">

        </div>

        <div class="flex flex-col gap-2 mt-2">
          <label for="hari" class="text-slate-900 dark:text-white">Hari</label>
          <select name="hari" id="hariUser" required class="px-3 py-1 rounded-md hari">
            <option value="">Pilih</option>
            <option value="senin">Senin</option>
            <option value="selasa">Selasa</option>
            <option value="rabu">Rabu</option>
            <option value="kamis">Kamis</option>
            <option value="jumat">Jumat</option>
            <option value="sabtu">Sabtu</option>
            <option value="ahad">Ahad</option>
          </select>
        </div>

        <div class="flex flex-col gap-2 mt-2">
          <label for="jam" class="text-slate-900 dark:text-white">Jam</label>
          <select name="jam" id="jamUser" required class="px-3 py-1 rounded-md jam">
            <option value="">Pilih</option>
            @for ($i = 1; $i < 9; $i++)
              <option value="{{ $i }}">{{ $i }}</option>
            @endfor
          </select>
        </div>
        <div class="flex flex-col justify-end">
          <label for="" class="text-white dark:text-slate-900">label</label>
          <button type="button" id="buttonTambah" class="px-3 py-1 rounded-md bg-green-500 text-white"
            data-lembaga="{{ $url[1] }}">+</button>
        </div>
      </div>
    </div>

    <h3 class="my-4 dark:text-white text-slate-800">Pilihan Jadwal Guru</h3>
    <form action="/{{ $url[0] }}/{{ $url[1] }}" method="POST">
      @csrf
      <div id="hasil" class="overflow-auto">

      </div>
      <div class="flex gap-2 justify-center items-center mt-5">
        <a href="/{{ $url[0] }}/{{ $url[1] }}"
          class="inline-block px-3 py-1 rounded-md text-white bg-slate-500">Kembali</a>
        <button type="submit" class="px-3 py-1 rounded-md bg-violet-500 text-white">Simpan</button>
      </div>
    </form>
  </div>

  @vite('resources/js/fetchJadwal.js')
@endsection
