<div>
  <x-loading></x-loading>
  <div class=" overflow-x-auto shadow-md sm:rounded-lg">
    <div class="flex items-center gap-2 mb-2">
      <div class="w-full lg:w-1/3 flex flex-col">
        <label for="" class="dark:text-white">Tanggal</label>
        <input type="date" wire:model.live.debounce.300ms='tanggal'
          class="px-3 py-1 rounded-md dark:bg-slate-800 dark:text-white">
      </div>
    </div>

    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 bg-opacity-85">
      <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
          <th scope="col" class="px-6 py-3">
            No
          </th>
          <th scope="col" class="px-6 py-3">
            Status
          </th>
          <th scope="col" class="px-6 py-3">
            Tanggal
          </th>
          <th scope="col" class="px-6 py-3">
            Nomor
          </th>
          <th scope="col" class="px-6 py-3">
            Nama
          </th>
          <th scope="col" class="px-6 py-3">
            Pesan
          </th>
        </tr>
      </thead>
      <tbody>
        @if ($reports)
          @foreach ($reports as $report)
            <tr
              class="bg-white border-b  bg-opacity-85 dark:bg-slate-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

              <td class="px-6 py-4">{{ $loop->iteration }}</td>

              <td class="px-6 py-4"><button type="button"
                  class="px-3 py-1 rounded-md text-white @switch($report['status'])
              @case('sent')
                bg-green-500
                @break
              @case('delivered')
                  bg-amber-500
                  @break
              @case('read')
              bg-green-500
                @break
              @default
                bg-red-500
            @endswitch">{{ $report['status'] }}</button>
              </td>
              <td class="px-6 py-4">{{ date('d-m-Y H:i', strtotime($report['date']['created_at'])) }}</td>
              <td class="px-6 py-4">{{ $report['phone']['to'] }}</td>
              <td class="px-6 py-4">
                @foreach ($users as $user)
                  @if ($user->dataUser->no_hp == $report['phone']['to'])
                    {{ $user->name }}
                  @endif
                @endforeach
              </td>
              <td class="px-6 py-4">{{ $report['text'] }}</td>
            </tr>
          @endforeach
        @else
          <h3 class="text-center text-slate-800 dark:text-white">Koneksi Gagal</h3>
        @endif
      </tbody>
    </table>

  </div>
</div>
