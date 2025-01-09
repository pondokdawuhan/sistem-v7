<div class="p-5 rounded-md bg-white dark:bg-slate-900 text-slate-800 dark:text-white">
  <div class="w-full lg:w-1/3">
    <form wire:submit.prevent='tambah' method="POST">
      @csrf
      <div class="flex flex-col gap-2">
        <label for="santri">Santri</label>
        <select wire:model="santri_id" id="santri" class="" required>
          <option value="">pilih</option>
          @foreach ($santris as $santri)
            <option value="{{ $santri->id }}">{{ $santri->name }} ({{ $santri->dataSantri->jenis_kelamin }})</option>
          @endforeach
        </select>
      </div>

      <div class="flex flex-col gap-2 mt-2">
        <label for="tanggal_mulai">Tanggal Mulai</label>
        <input type="datetime-local" wire:model="tanggal_mulai" id="tanggal_mulai"
          class="px-3 py-1 rounded-md dark:bg-slate-800 dark:text-white">
      </div>

      <div class="flex gap-2 mt-2">
        <button class="px-3 py-1 rounded-md bg-violet-500 text-white" type="submit">Simpan</button>
        <a href="/{{ $role }}/haidSantri" wire:navigate
          class="px-3 py-1 rounded-md bg-slate-500 text-white inline-block">Kembali</a>
      </div>
    </form>
  </div>
  <x-loading></x-loading>

  @script()
    <script>
      new TomSelect($('#santri'))
    </script>
  @endscript
</div>
