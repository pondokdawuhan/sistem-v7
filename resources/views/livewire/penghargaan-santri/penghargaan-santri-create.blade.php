<div class="bg-white dark:bg-slate-900 p-5 rounded-md w-full lg:w-1/2">
  <form wire:submit.prevent='tambah' method="POST">
    @csrf

    <div class="flex flex-col gap-2">
      <label for="name" class="text-slate-900 dark:text-white">Nama Santri</label>
      <select class=" dark:text-white dark:bg-slate-850" wire:model="santri_id" multiple="multiple" id="name" required>
        <option value="">Pilih</option>
        @foreach ($santris as $santri)
          <option value="{{ $santri->id }}">
            {{ $santri->name }} ({{ $santri->dataSantri->jenis_kelamin }})
          </option>
        @endforeach
      </select>
    </div>

    <div class="flex flex-col gap-2 mt-2">
      <label for="tanggal" class="text-slate-900 dark:text-white">Tanggal</label>
      <input type="date" class="px-3 py-1 rounded-md" wire:model="tanggal" id="tanggal" required>
    </div>

    <div class="flex flex-col gap-2 mt-2">
      <label for="prestasi" class="text-slate-900 dark:text-white">Prestasi</label>
      <input type="text" class="px-3 py-1 rounded-md" wire:model="prestasi" id="prestasi" required>
    </div>

    <div class="flex flex-col gap-2 mt-2">
      <label for="penghargaan" class="text-slate-900 dark:text-white">Penghargaan</label>
      <input type="text" class="px-3 py-1 rounded-md" wire:model="penghargaan" id="penghargaan" required>
    </div>

    <div class="flex gap-2 justify-center items-center mt-5">
      <a wire:navigate href="/{{ $lembaga }}/{{ $role }}/penghargaanSantri"
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
