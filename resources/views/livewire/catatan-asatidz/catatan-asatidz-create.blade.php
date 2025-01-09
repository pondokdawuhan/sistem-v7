<div class="bg-white dark:bg-slate-900 p-5 rounded-md w-full lg:w-1/2">
  <form wire:submit.prevent='tambah' method="POST">
    @csrf

    <div class="flex flex-col gap-2">
      <label for="name" class="text-slate-900 dark:text-white">Nama Asatidz</label>
      <select class=" dark:text-white dark:bg-slate-850" wire:model="user_id" id="name" required>
        <option value="">Pilih</option>
        @foreach ($users as $user)
          <option value="{{ $user->id }}">
            {{ $user->name }}
          </option>
        @endforeach
      </select>
    </div>

    <div class="flex flex-col gap-2 mt-2">
      <label for="tanggal" class="text-slate-900 dark:text-white">Tanggal</label>
      <input type="date" class="px-3 py-1 rounded-md" wire:model="tanggal" id="tanggal" required>
    </div>

    <div class="flex flex-col gap-2 mt-2">
      <label for="catatan" class="text-slate-900 dark:text-white">Catatan</label>
      <input type="text" class="px-3 py-1 rounded-md" wire:model="catatan" id="catatan" required>
    </div>

    <div class="flex gap-2 justify-center items-center mt-5">
      <a wire:navigate href="/{{ $lembaga->id }}/{{ $role }}/catatanAsatidz"
        class="inline-block px-3 py-1 rounded-md text-white bg-slate-500">Kembali</a>
      <button type="submit" class="px-3 py-1 rounded-md bg-violet-500 text-white">Simpan</button>
    </div>
  </form>
  <x-loading></x-loading>
  @script()
    <script>
      new TomSelect($('#name'))
    </script>
  @endscript
</div>
