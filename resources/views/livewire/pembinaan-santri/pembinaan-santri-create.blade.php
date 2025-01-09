<div class="bg-white dark:bg-slate-900 p-5 rounded-md w-full lg:w-1/2">
  <form wire:submit.prevent='tambah' method="POST">
    @csrf

    <div class="flex flex-col gap-2" wire:ignore>
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
      <label for="permasalahan" class="text-slate-900 dark:text-white">Permasalahan</label>
      <input type="text" class="px-3 py-1 rounded-md" wire:model="permasalahan" id="permasalahan" required>
    </div>

    <div class="flex flex-col gap-2 mt-2">
      <label for="pembinaan" class="text-slate-900 dark:text-white">Pembinaan</label>
      <input type="text" class="px-3 py-1 rounded-md" wire:model="pembinaan" id="pembinaan" required>
    </div>

    <div class="flex flex-col gap-2 mt-2">
      <label for="tindak_lanjut" class="text-slate-900 dark:text-white">Tindak Lanjut</label>
      <input type="text" class="px-3 py-1 rounded-md" wire:model="tindak_lanjut" id="tindak_lanjut" required>
    </div>

    <div class="flex flex-col gap-2 mt-2">
      <label for="sebagai" class="text-slate-900 dark:text-white">Sebagai</label>
      <input type="text" class="px-3 py-1 rounded-md" wire:model="sebagai" id="sebagai" readonly>
    </div>

    <div class="flex flex-col gap-2 mt-2 dark:text-white">
      <label for="foto" class="text-slate-900 dark:text-white">Bukti <span
          class="italic text-xs text-red-500">(Gambar max 1MB)</span></label>
      <input type="file" class="px-3 py-1 rounded-md" wire:model="foto" id="foto" required>
    </div>
    @if ($this->foto)
      <img src="{{ $this->foto->temporaryUrl() }}" alt="" class="img-preview w-24 h-24">
    @endif

    <div class="flex flex-col gap-2 mt-2 dark:text-white">
      <label for="surat" class="text-slate-900 dark:text-white">Surat Pernyataan (jika ada) <span
          class="italic text-xs text-red-500">(Gambar max 1MB)</span></label>
      <input type="file" class="px-3 py-1 rounded-md" wire:model="surat" id="surat">
    </div>
    @if ($this->surat)
      <img src="{{ $this->surat->temporaryUrl() }}" alt="" class="img-preview w-24 h-24">
    @endif

    <div class="flex gap-2 justify-center items-center mt-5">
      <a wire:navigate href="/{{ $lembaga }}/{{ $role }}/pembinaanSantri"
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
