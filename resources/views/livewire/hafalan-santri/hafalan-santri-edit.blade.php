<div class=" overflow-hidden shadow-md sm:rounded-lg bg-white p-5 rounded-md dark:bg-slate-900">
  <x-loading></x-loading>
  <form wire:submit.prevent='edit' method="POST">
    @csrf
    @method('put')
    <div class="overflow-auto w-full lg:w-1/2">
      <div class="flex flex-col">
        <label for="" class="dark:text-white">Nama</label>
        <input type="text" class="px-3 py-1 rounded-md dark:bg-slate-700 dark:text-white" wire:model='santri_name'
          readonly>
      </div>
      <div class="flex flex-col mt-2">
        <label for="tanggal" class="dark:text-white">Tanggal</label>
        <input type="date" class="px-3 py-1 rounded-md dark:bg-slate-700 dark:text-white" wire:model="tanggal">
      </div>
      <div class="flex flex-col mt-2">
        <label for="keterangan" class="dark:text-white">Keterangan</label>
        <input type="text" class="px-3 py-1 rounded-md dark:bg-slate-700 dark:text-white" wire:model="keterangan">
      </div>
      <div class="flex justify-end mr-5 mt-2 gap-2">
        <a href="/{{ $lembaga->id }}/hafalanSantri" wire:navigate
          class="px-3 py-1 rounded-md bg-slate-500 text-white inline-block">Kembali</a>
        <button type="submit" class="px-3 py-1 rounded-md bg-violet-500 text-white">Kirim</button>
      </div>
    </div>
  </form>
</div>
