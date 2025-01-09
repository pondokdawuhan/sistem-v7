<div class="overflow-hidden">
  <x-loading></x-loading>
  <h3 class="my-2 font-bold text-center dark:text-white">Cek Pelaksanaan Presensi Sholat Santri </h3>
  <input type="date" wire:model.live.debounce.300ms='selectedDate'
    class="px-3 py-1 rounded-md dark:bg-slate-800 dark:text-white mb-2">
  <div class="overflow-auto">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 bg-opacity-85">
      <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
          <th scope="col" class="px-6 py-3">
            No
          </th>
          <th scope="col" class="px-6 py-3">
            Kelas
          </th>
          <th scope="col" class="px-6 py-3">
            Subuh
          </th>
          <th scope="col" class="px-6 py-3">
            Dhuha
          </th>
          <th scope="col" class="px-6 py-3">
            Dhuhur
          </th>
          <th scope="col" class="px-6 py-3">
            Asar
          </th>
          <th scope="col" class="px-6 py-3">
            Maghrib
          </th>
          <th scope="col" class="px-6 py-3">
            Isya'
          </th>
        </tr>
      </thead>
      <tbody>
        @foreach ($kelass as $kelas)
          <tr
            class="bg-white border-b  bg-opacity-85 dark:bg-slate-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
            <td class="px-6 py-4 min-w-fit border">{{ $loop->iteration }}</td>
            <td class="px-6 py-4 min-w-fit border">{{ $kelas->nama }}</td>
            <td class="px-6 py-4 min-w-fit border">
              @foreach ($jurnals as $jurnal)
                @if ($jurnal->kelas_id == $kelas->id && $jurnal->waktu == 'Subuh')
                  <div class="bg-green-500 text-white text-center px-3 py-1">
                    {{ $jurnal->user->name }}<br>{{ date('H:i', strtotime($jurnal->created_at)) }}</div>
                @endif
              @endforeach
            </td>
            <td class="px-6 py-4 min-w-fit border">
              @foreach ($jurnals as $jurnal)
                @if ($jurnal->kelas_id == $kelas->id && $jurnal->waktu == 'Dhuha')
                  <div class="bg-green-500 text-white text-center px-3 py-1">
                    {{ $jurnal->user->name }}<br>{{ date('H:i', strtotime($jurnal->created_at)) }}</div>
                @endif
              @endforeach
            </td>
            <td class="px-6 py-4 min-w-fit border">
              @foreach ($jurnals as $jurnal)
                @if ($jurnal->kelas_id == $kelas->id && $jurnal->waktu == 'Dhuhur')
                  <div class="bg-green-500 text-white text-center px-3 py-1">
                    {{ $jurnal->user->name }}<br>{{ date('H:i', strtotime($jurnal->created_at)) }}</div>
                @endif
              @endforeach
            </td>
            <td class="px-6 py-4 min-w-fit border">
              @foreach ($jurnals as $jurnal)
                @if ($jurnal->kelas_id == $kelas->id && $jurnal->waktu == 'Asar')
                  <div class="bg-green-500 text-white text-center px-3 py-1">
                    {{ $jurnal->user->name }}<br>{{ date('H:i', strtotime($jurnal->created_at)) }}</div>
                @endif
              @endforeach
            </td>
            <td class="px-6 py-4 min-w-fit border">
              @foreach ($jurnals as $jurnal)
                @if ($jurnal->kelas_id == $kelas->id && $jurnal->waktu == 'Magrib')
                  <div class="bg-green-500 text-white text-center px-3 py-1">
                    {{ $jurnal->user->name }}<br>{{ date('H:i', strtotime($jurnal->created_at)) }}</div>
                @endif
              @endforeach
            </td>
            <td class="px-6 py-4 min-w-fit border">
              @foreach ($jurnals as $jurnal)
                @if ($jurnal->kelas_id == $kelas->id && $jurnal->waktu == 'Isya')
                  <div class="bg-green-500 text-white text-center px-3 py-1">
                    {{ $jurnal->user->name }}<br>{{ date('H:i', strtotime($jurnal->created_at)) }}</div>
                @endif
              @endforeach
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
