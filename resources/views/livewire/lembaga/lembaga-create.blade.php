<div class="w-full lg:w-1/2 dark:bg-slate-800 p-5 rounded-md">
  <x-loading></x-loading>
  <form wire:submit.prevent="postLembaga" method="POST">
    @csrf
    <div class="mb-2">
      <label for="nama" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama</label>
      <input type="text" id="nama"
        class="block w-full px-3 py-1 text-gray-900 border-2 border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        wire:model="nama" required>
      @error('nama')
        <p class="text-red-500 text-xs italic">{{ $message }}</p>
      @enderror
    </div>
    <div class="mb-2">
      <label for="nama_singkat" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Nama
        Singkat</label>
      <input type="text" id="nama_singkat"
        class="block w-full px-3 py-1 text-gray-900 border-2 border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        wire:model="nama_singkat" required>
      @error('nama_singkat')
        <p class="text-red-500 text-xs italic">{{ $message }}</p>
      @enderror
    </div>
    <div class="mb-2">
      <label for="jenis_lembaga" class="text-slate-900 dark:text-white text-sm font-medium">Jenis Lembaga</label>
      <select
        class="block w-full px-3 py-1 text-gray-900 border-2 border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        wire:model="jenis_lembaga" id="jenis_lembaga">
        <option>Pilih</option>
        <option value="FORMAL">FORMAL</option>
        <option value="MADIN">MADIN</option>
        <option value="MMQ">MMQ</option>
        <option value="ASRAMA">ASRAMA</option>
      </select>
      @error('jenis_lembaga')
        <p class="text-red-500 text-xs italic">{{ $message }}</p>
      @enderror
    </div>
    <div class="mb-2">
      <label for="jam" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Jam Mengajar
        Terbanyak</label>
      <input type="text" id="jam"
        class="block w-full px-3 py-1 text-gray-900 border-2 border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
        wire:model="jam" required>
      @error('jam')
        <p class="text-red-500 text-xs italic">{{ $message }}</p>
      @enderror
    </div>
    <a wire:navigate href="/lembaga" class="px-3 py-1 rounded-md bg-slate-500 text-white inline-block">Kembali</a>
    <button type="submit" class="px-3 py-1 rounded-md bg-violet-500 text-white">Simpan</button>
  </form>
</div>
