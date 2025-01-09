<div class=" overflow-x-auto shadow-md sm:rounded-lg">
  <div class="flex items-center gap-2 mb-2 flex-wrap">
    <a href="/{{ $lembaga->id }}/hafalanSantri" wire:navigate
      class=" bg-slate-500 text-white px-3 py-1 rounded-md inline-block">Kembali</a>

    <div class="flex gap-2">
      <div class="">
        <select wire:model.live="paginate" class="px-3 py-1 rounded-md dark:bg-slate-800 dark:text-white">
          <option value="20">20</option>
          <option value="40">40</option>
          <option value="50">50</option>
          <option value="100">100</option>
        </select>
      </div>
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
          Keterangan
        </th>
        <th scope="col" class="px-6 py-3">
          Penanggungjawab
        </th>
      </tr>
    </thead>
    <tbody>
      @foreach ($hafalans as $hafalan)
        <tr
          class="bg-white border-b  bg-opacity-85 dark:bg-slate-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

          <td class="px-6 py-4">{{ $loop->index + $hafalans->firstItem() }}</td>
          <td class="px-6 py-4">{{ date('d-m-Y', strtotime($hafalan->tanggal)) }}</td>
          <td class="px-6 py-4">{{ $hafalan->keterangan }}</td>
          <td class="px-6 py-4">{{ $hafalan->user->name }}</td>

        </tr>
      @endforeach
    </tbody>
  </table>
  <div class="dark:bg-slate-800 mb-3 p-2">
    {{ $hafalans->links() }}
  </div>
</div>
