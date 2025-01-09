<div class="">
  <x-notifsukses></x-notifsukses>
  <a href="/batasPoin/tambah" class="px-3 py-1 rounded-md bg-violet-500 text-white mb-3 inline-block"
    wire:navigate>Tambah</a>
  <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 bg-opacity-85">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
      <tr>
        <th scope="col" class="px-6 py-3">
          No
        </th>
        <th scope="col" class="px-6 py-3">
          Jenis Poin
        </th>
        <th scope="col" class="px-6 py-3">
          Batas Aman
        </th>
        <th scope="col" class="px-6 py-3">
          Batas Waspada
        </th>
        <th scope="col" class="px-6 py-3">
          Batas Bahaya
        </th>
        <th scope="col" class="px-6 py-3">
          Aksi
        </th>

      </tr>
    </thead>
    <tbody>
      @foreach ($batasPoins as $batasPoin)
        <tr
          class="bg-white border-b  bg-opacity-85 dark:bg-slate-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

          <td class="px-6 py-4">{{ $loop->iteration }}</td>
          <td class="px-6 py-4">{{ $batasPoin->jenis_poin }}</td>
          <td class="px-6 py-4">{{ $batasPoin->batas_aman }}</td>
          <td class="px-6 py-4">{{ $batasPoin->batas_waspada }}</td>
          <td class="px-6 py-4">{{ $batasPoin->batas_bahaya }}</td>
          <td class="px-6 py-4">

            <a wire:navigate href="/batasPoin/edit/{{ $batasPoin->id }}"
              class="text-white bg-sky-500 rounded-lg text-xs px-3 py-1 inline-block">Edit</a>

            <button type="button"
              class="mt-2 text-white bg-red-500 rounded-lg text-xs px-3 py-1 inline-block cursor-pointer"
              wire:click='delete({{ $batasPoin->id }})'
              wire:confirm='Apakah Anda yakin menghapus izin ini?'>Hapus</button>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
</div>
