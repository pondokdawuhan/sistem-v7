<div>
  <div class=" overflow-x-auto shadow-md sm:rounded-lg">
    <x-notifsukses></x-notifsukses>
    <div class="flex flex-col xl:flex-row gap-5">
      <div class="xl:flex-1">

        <div class="bg-white dark:bg-slate-900 p-5 dark:text-white">
          <h3 class="text-red-500 italic mb-2">Penulisan dipisah menggunakan tanda "/" (contoh: 2024/2025)</h3>
          <table id="dataTable"
            class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 bg-opacity-85 ">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
              <tr>
                <th scope="col" class="px-6 py-3">
                  No
                </th>
                <th scope="col" class="px-6 py-3">
                  Tahun
                </th>
                <th scope="col" class="px-6 py-3">
                  Aksi
                </th>
              </tr>
            </thead>
            <tbody>
              @foreach ($tahunAjarans as $tahunAjaran)
                <tr
                  class="bg-white border-b  bg-opacity-85 dark:bg-slate-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                  <td class="px-6 py-4">{{ $loop->iteration }}</td>
                  <td class="px-6 py-4">{{ $tahunAjaran->tahun }} </td>
                  <td class="px-6 py-4">
                    <button wire:click='delete({{ $tahunAjaran->id }})'
                      class="px-2 text-xs py-1 rounded-md bg-red-500 text-white"
                      wire:confirm='Apakah Anda Yakin?'>Hapus</button>

                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
      <div class="lg:mt-10 flex flex-col gap-4">
        <div class="w-full">
          <div
            class="w-full p-3 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <h3 class="dark:text-white mb-2 border-b">Tambah Tahun Ajaran</h3>
            <form wire:submit.prevent='tambah'>
              <div class="flex gap-2">
                <input type="text" wire:model='tahun' class="px-3 py-1 rounded-md dark:bg-slate-800 dark:text-white"
                  required />
                <button class="px-3 py-1 rounded-md bg-violet-500 text-white">Tambah</button>
              </div>
            </form>
          </div>
        </div>
        <div class="w-full">
          <div
            class="w-full p-3 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <h3 class="dark:text-white mb-2 border-b">Edit Tahun Ajaran</h3>
            <form wire:submit.prevent='edit'>
              <div class="flex gap-2 flex-col">
                <div class="flex flex-col gap-2">
                  <label for="" class="dark:text-white">Nama Tahun Ajaran Lama</label>
                  <select wire:model='tahunAjaran_id' class="px-3 py-1 rounded-md dark:bg-slate-800 dark:text-white">
                    <option value="">pilih</option>
                    @foreach ($tahunAjarans as $tahunAjaran)
                      <option value="{{ $tahunAjaran->id }}">{{ $tahunAjaran->tahun }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="flex flex-col gap-2">
                  <label for="" class="dark:text-white">Nama Tahun Ajaran Baru</label>
                  <input type="text" wire:model='tahunAjaran_edit'
                    class="px-3 py-1 rounded-md dark:bg-slate-800 dark:text-white" required />
                </div>
                <div class="flex justify-end">
                  <button class="px-3 py-1 rounded-md bg-violet-500 text-white">Edit</button>
                </div>
              </div>
            </form>
          </div>
        </div>

      </div>
    </div>
  </div>
  <x-loading></x-loading>
</div>
