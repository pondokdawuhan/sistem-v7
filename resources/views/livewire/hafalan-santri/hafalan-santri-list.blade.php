<div class=" overflow-x-auto shadow-md sm:rounded-lg">
  <x-loading></x-loading>
  <x-notifsukses></x-notifsukses>
  <a href="/{{ $lembaga->id }}/hafalanSantri/create" wire:navigate
    class=" bg-violet-500 text-white px-3 py-1 rounded-md inline-block mb-2">Tambah</a>

  <div class="flex items-center gap-2 mb-2 flex-wrap">
    <div class="flex gap-2">
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
          Tanggal
        </th>
        <th scope="col" class="px-6 py-3">
          Nama
        </th>
        <th scope="col" class="px-6 py-3">
          Keterangan
        </th>
        <th scope="col" class="px-6 py-3">
          Penanggungjawab
        </th>
        <th scope="col" class="px-6 py-3">
          Aksi
        </th>
      </tr>
    </thead>
    <tbody>
      @foreach ($hafalans as $hafalan)
        <tr
          class="bg-white border-b  bg-opacity-85 dark:bg-slate-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

          <td class="px-6 py-4">{{ $loop->index + $page }}</td>
          <td class="px-6 py-4">{{ date('d-m-Y', strtotime($hafalan->tanggal)) }}</td>
          <td class="px-6 py-4"><a
              href="/{{ $lembaga->id }}/hafalanSantri/detail/{{ $hafalan->santri->username }}">{{ $hafalan->santri->name }}</a>
          </td>
          <td class="px-6 py-4">{{ $hafalan->keterangan }}</td>
          <td class="px-6 py-4">{{ $hafalan->user->name }}</td>

          <td class="px-6 py-4">

            <a href="/{{ $lembaga->id }}/hafalanSantri/{{ $hafalan->id }}/edit" wire:navigate
              class="text-white bg-sky-500 rounded-lg text-xs px-3 py-1 inline-block">Edit</a>

            <button type="button"
              class="mt-2 text-white bg-red-500 rounded-lg text-xs px-3 py-1 inline-block cursor-pointer"
              wire:click='delete({{ $hafalan->id }})'
              wire:confirm='Apakah Anda yakin menghapus hafalan ini?'>Hapus</button>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>
  @if (!$search)
    <div class="dark:bg-slate-800 mb-3 p-2">
      {{ $hafalans->links() }}
    </div>
  @endif
</div>
