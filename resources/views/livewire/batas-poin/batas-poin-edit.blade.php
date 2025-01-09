<div class="bg-white dark:bg-slate-900 text-slate-800 dark:text-white p-5 rounded-md">
  <x-loading></x-loading>
  <form wire:submit.prevent='edit' method="POST">
    @csrf
    <div class="w-full lg:w-1/3">

      <div class="flex flex-col gap-2 mt-2">
        <label for="jenis_poin" class="">Jenis Poin</label>
        <select type="text" class="px-3 py-1 rounded-md dark:bg-slate-900 dark:text-white" wire:model="jenis_poin"
          required>
          <option value="">pilih</option>
          <option value="poin_formal">Poin Formal</option>
          <option value="poin_madin">Poin Madin</option>
          <option value="poin_mmq">Poin MMQ</option>
          <option value="poin_asrama">Poin Asrama</option>
          <option value="poin_pelanggaran">Poin Pelanggaran</option>
          <option value="poin_ibadah">Poin Ibadah</option>
          <option value="poin_ekstrakurikuler">Poin Ekstra</option>
        </select>
      </div>

      <div class="flex flex-col gap-2 mt-2">
        <label for="batas_aman" class="">Batas Aman</label>
        <input type="text" class="px-3 py-1 rounded-md dark:bg-slate-900 dark:text-white"
          value="{{ old('batas_aman') }}" wire:model="batas_aman" required>
      </div>

      <div class="flex flex-col gap-2 mt-2">
        <label for="batas_waspada" class="">Batas Waspada</label>
        <input type="text" class="px-3 py-1 rounded-md dark:bg-slate-900 dark:text-white"
          value="{{ old('batas_waspada') }}" wire:model="batas_waspada" required>
      </div>

      <div class="flex flex-col gap-2 mt-2">
        <label for="batas_bahaya" class="">Batas Bahaya</label>
        <input type="text" class="px-3 py-1 rounded-md dark:bg-slate-900 dark:text-white"
          value="{{ old('batas_bahaya') }}" wire:model="batas_bahaya" required>
      </div>


      <a wire:navigate href="/batasPoin"
        class="px-3 py-1 rounded-md bg-slate-500 text-white inline-block mt-3">Kembali</a>
      <button type="submit" class="px-3 py-1 rounded-md bg-violet-500 text-white">Ubah</button>
    </div>
  </form>
</div>
