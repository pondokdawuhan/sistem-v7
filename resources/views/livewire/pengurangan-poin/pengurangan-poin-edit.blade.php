<div class="bg-white dark:bg-slate-900 p-5 rounded-md w-full lg:w-1/2">
  <form wire:submit.prevent='edit' method="POST">
    @csrf

    <div class="flex flex-col gap-2">
      <label for="name" class="text-slate-900 dark:text-white">Nama Santri</label>
      <input type="text" class="px-3 py-1 rounded-md" wire:model="santri_name" id="name" readonly>
    </div>

    <div class="flex flex-col gap-2 mt-2">
      <label for="tanggal" class="text-slate-900 dark:text-white">Tanggal</label>
      <input type="date" class="px-3 py-1 rounded-md" wire:model="tanggal" id="tanggal" required>
    </div>

    <div class="flex flex-col gap-2 mt-2">
      <label for="keterangan" class="text-slate-900 dark:text-white">Keterangan</label>
      <input type="text" class="px-3 py-1 rounded-md" wire:model="keterangan" id="keterangan" required>
    </div>

    <div class="flex flex-col gap-2 mt-2">
      <label for="poin_dikurangi" class="text-slate-900 dark:text-white">Poin Dikurangi</label>
      <input type="text" class="px-3 py-1 rounded-md" wire:model="poin_dikurangi" id="poin_dikurangi" required>
    </div>

    <div class="flex gap-2 justify-center items-center mt-5">
      <a wire:model href="/{{ $lembaga }}/{{ $role }}/penguranganPoin"
        class="inline-block px-3 py-1 rounded-md text-white bg-slate-500">Kembali</a>
      <button type="submit" class="px-3 py-1 rounded-md bg-violet-500 text-white">Simpan</button>
    </div>
  </form>

  <x-loading></x-loading>

</div>
