<div>
  <x-loading></x-loading>
  <div class=" overflow-x-hidden shadow-md sm:rounded-lg">
    <div class="w-full lg:w-1/3 mb-3">
      <form action="">
        <input type="hidden" name="lembaga" value="{{ request('lembaga') }}">
        <div class="flex items-center gap-2">

          <div class="flex gap-2">
            <div class="flex flex-col gap-2">
              <label for="tanggal" class="text-slate-900 dark:text-white">Tanggal</label>
              <input type="date" name="tanggal" id="tanggal" class="px-3 py-1 rounded-md"
                wire:model.live.debounce.300ms='tanggal'>
            </div>

          </div>
        </div>
      </form>
    </div>
    @if ($jurnals)
      <div class="overflow-auto">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 bg-opacity-85">
          <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
              <th scope="col" class="px-6 py-4 text-center">Kelas</th>

              @for ($i = 1; $i < $jam; $i++)
                <th scope="col" class="px-6 py-3 text-center border">
                  {{ $i }}
                </th>
              @endfor

            </tr>
          </thead>
          <tbody>
            @foreach ($kelas as $kls)
              <tr
                class="bg-white border-b  bg-opacity-85 dark:bg-slate-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <td class="text-center px-6 py-4">{{ $kls->nama }}</td>
                @for ($j = 1; $j < $jam; $j++)
                  <td class="text-center dark:text-white border">
                    @if (isset($jadwalPelajarans))
                      @foreach ($jadwalPelajarans as $jadwal)
                        @if ($jadwal->jam == $j && $jadwal->kelas_id == $kls->id)
                          <div class="border-b">
                            <small class="text-amber-500 text-center">Jadwal Pelajaran</small>
                            <p>{{ $jadwal->pelajaran->nama }}</p>
                            <p class="underline">{{ $jadwal->user->name }}</p>
                          </div>
                        @endif
                      @endforeach
                      @foreach ($jurnals as $jurnal)
                        @if ($jurnal->jam == $j && $jurnal->kelas_id == $kls->id)
                          <div class="border-b">
                            <small class="text-amber-500 text-center">Jurnal</small>
                            <p class="bg-green-500 text-white">{{ date('d-m-Y H:i', strtotime($jurnal->created_at)) }}
                            </p>
                          </div>
                        @endif
                      @endforeach
                    @else
                      @foreach ($jurnals as $jurnal)
                        @if ($jurnal->jam == $j && $jurnal->kelas_id == $kls->id)
                          <div class="border-b">
                            <small class="text-amber-500 text-center">Jurnal</small>
                            <p>{{ $jurnal->pelajaran->nama }}</p>
                            <p>{{ $jurnal->user->name }}</p>
                            <p class="bg-green-500 text-white">{{ date('d-m-Y H:i', strtotime($jurnal->created_at)) }}
                            </p>
                          </div>
                        @endif
                      @endforeach
                    @endif
                  </td>
                @endfor
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    @endif
  </div>
</div>
