<div class="bg-white dark:bg-slate-900 p-5 rounded-md w-full lg:w-1/2">
  <form wire:submit.prevent='tambah' method="POST">
    @csrf

    <div class="flex flex-col gap-2">
      <label for="name" class="text-slate-900 dark:text-white">Nama Santri</label>
      <select class="dark:text-white dark:bg-slate-800 rounded-md" wire:model="santri_id" id="name" multiple required>
        <option value="">Pilih</option>
        @foreach ($santris as $santri)
          <option value="{{ $santri->id }}">
            {{ $santri->name }} ({{ $santri->dataSantri->jenis_kelamin }})
          </option>
        @endforeach
      </select>
    </div>

    <div class="flex flex-col gap-2">
      <label for="referensi" class="text-slate-900 dark:text-white">Referensi</label>
      <select class="dark:text-white dark:bg-slate-800" wire:model="referensi_poin_id" id="referensi" required>
        <option value="">Pilih</option>
        @foreach ($referensiPoins as $referensiPoin)
          <option value="{{ $referensiPoin->id }}">
            {{ $referensiPoin->name }} (Poin Max {{ $referensiPoin->poin }})
          </option>
        @endforeach
      </select>
    </div>


    <div class="flex flex-col gap-2 mt-2">
      <label for="poin" class="text-slate-900 dark:text-white">Poin</label>
      <input type="text" class="px-3 py-1 rounded-md dark:bg-slate-800 dark:text-white" wire:model="poin"
        id="poin" required>
    </div>

    <div class="flex flex-col gap-2 mt-2">
      <label for="tanggal" class="text-slate-900 dark:text-white">Tanggal</label>
      <input type="date" class="px-3 py-1 rounded-md dark:bg-slate-800 dark:text-white" wire:model="tanggal"
        id="tanggal" required>
    </div>

    <div class="flex flex-col gap-2 mt-2">
      <label for="keterangan" class="text-slate-900 dark:text-white">Keterangan</label>
      <input type="text" class="px-3 py-1 rounded-md dark:bg-slate-800 dark:text-white" wire:model="keterangan"
        id="keterangan" required>
    </div>


    <div class="flex gap-2 justify-center items-center mt-5">
      <a wire:navigate href="/{{ $lembaga }}/{{ $role }}/pelanggaranSantri"
        class="inline-block px-3 py-1 rounded-md text-white bg-slate-500">Kembali</a>
      <button type="submit" class="px-3 py-1 rounded-md bg-violet-500 text-white">Simpan</button>
    </div>
  </form>

  <x-loading></x-loading>

  @script()
    <script>
      new TomSelect($('#name'));
    </script>
  @endscript
</div>
