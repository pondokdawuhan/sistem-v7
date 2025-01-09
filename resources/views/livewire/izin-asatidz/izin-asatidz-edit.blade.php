<div class="bg-white dark:bg-slate-900 text-slate-800 dark:text-white p-5 rounded-md">
  <x-loading></x-loading>
  <form wire:submit.prevent='edit' method="POST">
    @csrf
    <div class="w-full lg:w-1/3">
      <div class="flex flex-col gap-2">
        <label for="name" class="">Nama</label>
        <input type="text" class="px-3 py-1 rounded-md dark:bg-slate-900 dark:text-white"
          value="{{ auth()->user()->name }}" readonly name="user_name">
        <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
      </div>
      <div class="flex flex-col gap-2 mt-2">
        <label for="tanggal_mulai" class="">Tanggal Mulai</label>
        <input type="date" class="px-3 py-1 rounded-md dark:bg-slate-900 dark:text-white"
          value="{{ old('tanggal_mulai') }}" wire:model="tanggal_mulai" required>
      </div>
      <div class="flex flex-col gap-2 mt-2">
        <label for="keperluan" class="">Keperluan</label>
        <input type="text" class="px-3 py-1 rounded-md dark:bg-slate-900 dark:text-white"
          value="{{ old('keperluan') }}" wire:model="keperluan" required>
      </div>
      <div class="flex flex-col gap-2 mt-2">
        <label for="tugas" class="">Tugas</label>
        <textarea wire:model="tugas" id="tugas" cols="30" rows="10" class="dark:bg-slate-900 dark:text-white"
          required>{{ old('tugas') }}</textarea>
      </div>
      <div class="flex flex-col gap-2 mt-2">
        <label for="tanggal_selesai" class="">Tanggal Selesai</label>
        <input type="date" class="px-3 py-1 rounded-md dark:bg-slate-900 dark:text-white"
          value="{{ old('tanggal_selesai') }}" wire:model="tanggal_selesai" required>
      </div>


      <a wire:navigate href="/{{ $lembaga->id }}/guru/izinAsatidz"
        class="px-3 py-1 rounded-md bg-slate-500 text-white inline-block mt-3">Kembali</a>
      <button type="submit" class="px-3 py-1 rounded-md bg-violet-500 text-white">Simpan</button>
    </div>
  </form>
</div>
