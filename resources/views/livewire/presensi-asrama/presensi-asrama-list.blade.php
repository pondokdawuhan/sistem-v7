<div class="p-5 rounded-md bg-white text-slate-800 dark:bg-slate-900 dark:text-white overflow-hidden">
  @if (session()->has('success'))
    <div class="bg-green-400 text-white px-3 py-2 mb-5">
      <h4 class="text-center font-semibold">{{ session('success') }}</h4>
    </div>
  @endif
  <a wire:navigate href="/{{ $lembaga->id }}/{{ $role }}/presensiAsrama/create"
    class="inline-block bg-violet-500 text-white px-3 py-1 rounded-md my-3">Tambah</a>
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
  <div class="overflow-auto">
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
            Kegiatan
          </th>
          <th scope="col" class="px-6 py-3">
            Keterangan
          </th>
        </tr>
      </thead>
      <tbody>
        @php
          $i = request('page') ?? 1 * 20 - 19;
        @endphp
        @foreach ($presensis as $presensi)
          <tr
            class="bg-white border-b  bg-opacity-85 dark:bg-slate-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
            <td class="px-6 py-4">{{ $i++ }}</td>
            <td class="px-6 py-4">{{ date('d-m-Y H:i', strtotime($presensi->created_at)) }}</td>
            <td class="px-6 py-4">{{ $presensi->santri->name }}</td>
            <td class="px-6 py-4">{{ $presensi->kegiatan }}</td>
            <td class="px-6 py-4">{{ $presensi->keterangan }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  @if (!$search)
    <div class="mt-4 flex justify-end">
      {{ $presensis->links() }}
    </div>
  @endif
  <x-loading></x-loading>
</div>
