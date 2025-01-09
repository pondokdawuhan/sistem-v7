<div class="overflow-hidden">
  <x-loading></x-loading>
  <h3 class="my-2 font-bold text-center dark:text-white">Cek Pelaksanaan Presensi Insidentil Santri </h3>
  <input type="date" wire:model.live.debounce.300ms='selectedDate'
    class="px-3 py-1 rounded-md dark:bg-slate-800 dark:text-white mb-2">
  <div class="overflow-auto">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 bg-opacity-85">

      <tbody>
        @foreach ($kelass as $kelas)
          <tr
            class="bg-white border-b  bg-opacity-85 dark:bg-slate-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

            <td class="px-6 py-4 min-w-fit border text-center bg-violet-500 text-white">{{ $kelas->nama }}</td>
            @foreach ($jurnals as $jurnal)
              @if ($jurnal->kelas_id == $kelas->id)
                <td class="px-6 py-4 min-w-fit border">
                  <div class="bg-green-500 text-white text-center px-3 py-1 text-xs">
                    <span
                      class="text-base">{{ $jurnal->kegiatan }}</span><br>{{ $jurnal->user->name }}<br>{{ date('H:i', strtotime($jurnal->created_at)) }}
                  </div>
                </td>
              @endif
            @endforeach
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>
