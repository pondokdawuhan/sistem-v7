<div>
  <x-loading></x-loading>
  <div class="bg-white dark:bg-slate-900 p-5 rounded-md w-full lg:w-1/2">
    <form action="" method="POST" wire:submit.prevent='edit'>
      @csrf
      <div class="flex flex-col gap-2">
        <label for="name" class="text-slate-900 dark:text-white">Nama Santri</label>
        <input type="text" class="dark:text-white dark:bg-slate-800 rounded-md" wire:model="name" readonly>
      </div>

      <div class="flex flex-col gap-2 mt-2">
        <label for="keluhan" class="text-slate-900 dark:text-white">Keluhan</label>
        <input type="text" class="px-3 py-1 rounded-md" wire:model="keluhan" id="keluhan" required>
      </div>

      <div class="flex gap-2 justify-center items-center mt-5">
        <a wire:navigate href="/{{ $lembaga->id }}/{{ $role }}/izinSakitSantri"
          class="inline-block px-3 py-1 rounded-md text-white bg-slate-500">Kembali</a>
        <button type="submit" class="px-3 py-1 rounded-md bg-violet-500 text-white">Simpan</button>
      </div>
    </form>
  </div>

  @script()
    <script>
      new TomSelect($('#multiple'))
    </script>
  @endscript
</div>
