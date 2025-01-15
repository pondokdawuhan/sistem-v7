<div class="overflow-hidden shadow-md sm:rounded-lg bg-white p-5 rounded-md dark:bg-slate-900">
  <x-loading></x-loading>
  <div class="flex items-center gap-2 mb-2">
    <form action="" wire:submit.prevent='pilih'>
      <div class="flex flex-wrap lg:flex-nowrap gap-3">
        <div class="flex flex-col w-full lg:w-min gap-2">
          <label for="kelas" class="text-slate-800 dark:text-white">Kelas</label>

          <select wire:model="selectedKelas" id="kelas" class="px-3 py-1 rounded-md" required>
            <option value="">Pilih</option>
            @foreach ($kelass as $kelas)
              <option value="{{ $kelas->id }}" @selected(request('kelas') == $kelas->id)>
                {{ $kelas->nama }}</option>
            @endforeach
          </select>
        </div>
        <div class="flex flex-col w-full lg:w-min gap-2">
          <label for="pelajaran" class="text-slate-800 dark:text-white">Pelajaran</label>

          <select wire:model="selectedPelajaran" id="selectedPelajaran" class="px-3 py-1 rounded-md" required>
            <option value="">Pilih</option>
            @foreach ($pelajarans as $pelajaran)
              <option value="{{ $pelajaran->id }}" @selected(request('pelajaran') == $pelajaran->id)>
                {{ $pelajaran->nama }}</option>
            @endforeach
          </select>
        </div>

        <div class="flex flex-col w-full lg:w-min gap-2">
          <label for="pelajaran" class="text-slate-800 dark:text-white">Jam</label>
          <div class="flex flex-row flex-wrap lg:flex-nowrap">
            @if ($lembaga->jenis_lembaga == 'MADIN')
              @php
                if (date('A', time()) == 'AM') {
                    $jamMadin = [1, 2];
                } else {
                    $jamMadin = [3, 4];
                }
              @endphp
              @foreach ($jamMadin as $jam)
                <div class="flex items-center ps-3">
                  <input id="{{ $jam }}" wire:model="selectedJam" type="checkbox"
                    @if (request('jam')) @if (in_array($jam, request('jam'))) checked @endif @endif value="{{ $jam }}"
                  class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500 block">
                  <label for="{{ $jam }}"
                    class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300 block">{{ $jam }}</label>
                </div>
              @endforeach
            @else
              @for ($i = 1; $i < $jams; $i++)
                <div class="flex items-center ps-3">
                  <input id="{{ $i }}" wire:model="selectedJam" type="checkbox"
                    @if (request('jam')) @if (in_array($i, request('jam'))) checked @endif @endif value="{{ $i }}"
                  class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-700 dark:focus:ring-offset-gray-700 focus:ring-2 dark:bg-gray-600 dark:border-gray-500 block">
                  <label for="{{ $i }}"
                    class="w-full py-3 ms-2 text-sm font-medium text-gray-900 dark:text-gray-300 block">{{ $i }}</label>
                </div>
              @endfor
            @endif
          </div>
        </div>

        <div class="flex flex-col w-full lg:w-min gap-2">
          <label for="pelajaran" class="text-slate-800 dark:text-white">Materi</label>
          <input type="text" wire:model="materi" id="materi" class="px-3 py-1 rounded-md"
            value="{{ request('materi') }}" required>
        </div>

        <div class="flex flex-col w-full lg:w-min gap-2">
          <label for="pelajaran" class="text-white dark:text-slate-900">Label</label>
          <button type="submit" class="px-3 py-1 rounded-md text-white bg-green-500">pilih</button>
        </div>

      </div>
    </form>
  </div>
  @isset($santris)

    <form action="/{{ $role }}/presensi/store" method="POST">
      @csrf
      <input type="hidden" name="lembaga" value="{{ $lembaga->id }}">
      <input type="hidden" name="is_guru_piket" value="{{ $is_guru_piket }}">
      <input type="hidden" name="kelas_id" value="{{ $selectedKelas }}">
      <input type="hidden" name="pelajaran_id" value="{{ $selectedPelajaran }}">
      <input type="hidden" name="materi" value="{{ $materi }}">
      @foreach ($selectedJam as $jm)
        <input type="hidden" name="jam[]" value="{{ $jm }}">
      @endforeach

      <div class="overflow-auto">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 bg-opacity-85">
          <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
              <th scope="col" class="px-6 py-3">
                No
              </th>
              <th scope="col" class="px-6 py-3">
                Nama
              </th>
              @foreach ($selectedJam as $j)
                <th scope="col" class="px-6 py-3">
                  Jam {{ $j }}
                </th>
              @endforeach
            </tr>
          </thead>
          <tbody>

            @foreach ($santris as $santri)
              <tr
                class="bg-white border-b  bg-opacity-85 dark:bg-slate-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 ">

                <td class="px-6 py-4 dark:text-white @if (in_array($santri->id, $izinKeluarSantris) ||
                        in_array($santri->id, $izinPulangSantris) ||
                        in_array($santri->id, $izinSakitSantris)) bg-red-500 text-white @endif">
                  {{ $loop->iteration }}</td>
                <td class="px-6 py-4 dark:text-white @if (in_array($santri->id, $izinKeluarSantris) ||
                        in_array($santri->id, $izinPulangSantris) ||
                        in_array($santri->id, $izinSakitSantris)) bg-red-500 text-white @endif">
                  <input type="hidden" name="santri_id[]" value="{{ $santri->id }}">
                  {{ $santri->name }}
                </td>
                @if ($selectedJam)
                  @foreach ($selectedJam as $jj)
                    <td class="px-6 py-4 @if (in_array($santri->id, $izinKeluarSantris) ||
                            in_array($santri->id, $izinPulangSantris) ||
                            in_array($santri->id, $izinSakitSantris)) bg-red-500 text-white @endif">
                      <select name="keterangans{{ $jj }}[]" id="keterangan"
                        class="px-3 py-1 rounded-md dark:bg-slate-800 dark:text-white">
                        <option value="H">HADIR</option>
                        <option value="S" @if (in_array($santri->id, $izinSakitSantris)) selected @endif>
                          SAKIT</option>
                        <option value="I" @if (in_array($santri->id, $izinKeluarSantris) || in_array($santri->id, $izinPulangSantris)) selected @endif>
                          IZIN</option>
                        <option value="A">ALPHA</option>
                      </select>
                    </td>
                  @endforeach
                @endif
              </tr>
            @endforeach
          </tbody>
        </table>
        <div class="flex justify-end mr-5">
          <button type="submit" class="px-3 py-1 rounded-md bg-violet-500 text-white mt-5">Kirim</button>
        </div>
      </div>
    </form>
  @endisset
</div>
