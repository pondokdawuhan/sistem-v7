<div class=" overflow-x-auto shadow-md sm:rounded-lg">
  <x-loading></x-loading>
  @if (session()->has('success'))
    <div class="bg-green-400 text-white px-3 py-2 mb-5">
      <h4 class="text-center font-semibold">{{ session('success') }}</h4>
    </div>
  @endif
  <a wire:navigate href="/{{ $lembaga }}/{{ $role }}/penghargaanSantri/create"
    class="bg-green-500 text-white px-3 py-1 rounded-md mb-2 inline-block">Tambah</a>
  <div class="flex items-center gap-2 mb-2">


    <div class="flex mb-2 gap-2 items-center">
      <div class="">
        <select wire:model.live="paginate" class="px-3 py-1 rounded-md dark:bg-slate-800 dark:text-white">
          <option value="20">20</option>
          <option value="40">40</option>
          <option value="50">50</option>
          <option value="100">100</option>
        </select>
      </div>
      <input type="text" class="px-3 py-1 rounded-md dark:bg-slate-800 dark:text-white"
        wire:model.live.debounce.300ms='search' placeholder="cari..." autofocus>
    </div>
  </div>

  <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 bg-opacity-85">
    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
      <tr>
        <th scope="col" class="px-6 py-3">
          No
        </th>
        <th scope="col" class="px-6 py-3">
          Lembaga
        </th>
        <th scope="col" class="px-6 py-3">
          Tanggal
        </th>
        <th scope="col" class="px-6 py-3">
          Nama
        </th>
        <th scope="col" class="px-6 py-3">
          Prestasi
        </th>
        <th scope="col" class="px-6 py-3">
          Penghargaan
        </th>
        <th scope="col" class="px-6 py-3">
          Aksi
        </th>
      </tr>
    </thead>
    <tbody>
      @foreach ($penghargaans as $penghargaan)
        <tr
          class="bg-white border-b  bg-opacity-85 dark:bg-slate-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

          <td class="px-6 py-4">{{ $loop->index + $page }}</td>
          <td class="px-6 py-4">{{ $penghargaan->lembaga->nama_singkat }}</td>
          <td class="px-6 py-4">{{ date('d-m-Y', strtotime($penghargaan->tanggal)) }}</td>
          <td class="px-6 py-4"><a wire:navigate
              href="/{{ $lembaga }}/{{ $role }}/penghargaanSantri/detail/{{ $penghargaan->santri->username }}">{{ $penghargaan->santri->name }}</a>
          </td>
          <td class="px-6 py-4">{{ $penghargaan->prestasi }}</td>
          <td class="px-6 py-4">{{ $penghargaan->penghargaan }}</td>
          <td class="px-6 py-4">
            <a wire:navigate
              href="/{{ $lembaga }}/{{ $role }}/penghargaanSantri/{{ $penghargaan->id }}/edit"
              class="px-3 py-1 rounded-md bg-amber-500 text-white inline-block mb-2 text-xs">Edit</a>
            <button class="px-3 py-1 rounded-md bg-red-500 text-white text-xs"
              wire:click='delete({{ $penghargaan->id }})'
              wire:confirm='Apakah anda yakin menghapus penghargaan ini?'>Hapus</button>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>

  @if (!$search)
    <div class="mt-4 flex justify-end">
      {{ $penghargaans->links() }}
    </div>
  @endif
</div>
