<div>
  <x-loading></x-loading>
  <div class=" overflow-x-hidden shadow-md sm:rounded-lg">
    <div class="flex items-center gap-2 mb-2 flex-wrap">

      <div class="flex items-center gap-2 mb-2 flex-wrap">
        <a href="/{{ $lembaga->id }}/{{ $role }}/izinSakitSantri" wire:navigate
          class="px-3 py-1 rounded-md bg-slate-500 text-white inline-block">Kembali</a>
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
    </div>

    <div class="overflow-auto">
      <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 bg-opacity-85">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
          <tr>
            <th scope="col" class="px-3 py-1">
              No
            </th>
            <th scope="col" class="px-3 py-1">
              Tanggal
            </th>
            <th scope="col" class="px-3 py-1">
              Keluhan
            </th>
            <th scope="col" class="px-3 py-1">
              Status Izin
            </th>
            <th scope="col" class="px-3 py-1">
              Penanggungjawab
            </th>
          </tr>
        </thead>
        <tbody>
          @foreach ($izins as $izin)
            <tr
              class="bg-white border-b  bg-opacity-85 dark:bg-slate-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

              <td class="px-3 py-1">{{ $loop->index + $izins->firstItem() }}</td>
              <td class="px-3 py-1">{{ date('d-m-Y', strtotime($izin->tanggal)) }}</td>
              <td class="px-3 py-1">{{ $izin->keluhan }}</td>

              <td class="px-3 py-1">
                @if ($izin->tanggal == date('Y-m-d', time()))
                  <span class="px-3 py-1 rounded-md bg-green-500 text-white mt-2 inline-block">Berlaku</span>
                @else
                  <span class="px-3 py-1 rounded-md bg-red-500 text-white mt-2 inline-block">Kadaluarsa</span>
                @endif
              </td>
              <td class="px-3 py-1">{{ $izin->user->name }}</td>

            </tr>
          @endforeach
        </tbody>
      </table>
    </div>

    <div class="mt-4 flex justify-end">
      {{ $izins->links() }}
    </div>

  </div>
</div>
