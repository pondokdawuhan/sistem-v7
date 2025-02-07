<div class=" overflow-x-hidden shadow-md sm:rounded-lg" x-data="{ openModal: false }">
  <x-notifsukses></x-notifsukses>

  <div>
    <div class="flex gap-2 items-end flex-col lg:flex-row">
      <div class="w-full flex flex-wrap gap-5">
        <div class="flex flex-col gap-2">
          <label for="tanggalAwal" class="text-slate-900 dark:text-white">Tanggal Awal</label>
          @error('tanggalAwal')
            <p class="text-red-500">Pilih Tanggal Awal dahulu</p>
          @enderror
          <input type="date" wire:model.live.debounce.300ms="tanggalAwal" id="tanggalAwal" required
            class="px-3 py-1 rounded-md text-slate-900 dark:text-white dark:bg-slate-900">
        </div>
        <div class="flex flex-col gap-2">
          <label for="tanggalAkhir" class="text-slate-900 dark:text-white">Tanggal Akhir</label>
          @error('tanggalAkhir')
            <p class="text-red-500">Pilih Tanggal Akhir dahulu</p>
          @enderror
          <input type="date" wire:model.live.debounce.300ms="tanggalAkhir" id="tanggalAkhir" required
            class="px-3 py-1 rounded-md text-slate-900 dark:text-white dark:bg-slate-900">
        </div>
        <div class="flex flex-col gap-2">
          <label for="pelajaran" class="text-slate-900 dark:text-white">Pelajaran</label>
          <select wire:model.live.debounce.300ms="selectedMapel" id="pelajaran"
            class="px-3 py-1 rounded-md text-slate-900 dark:text-white dark:bg-slate-900">
            <option value="">Pilih</option>
            @if ($role != 'guru' && $role != 'walikelas')
              <option value="semua">Semua</option>
            @endif
            @foreach ($mapels as $mapel)
              <option value="{{ $mapel->id }}">{{ $mapel->nama }}</option>
            @endforeach
          </select>
        </div>
        <div class="flex flex-col gap-2">
          <label for="kelas" class="text-slate-900 dark:text-white">Kelas</label>
          <select wire:model.live.debounce.300ms="selectedKelas" id="kelas"
            class="px-3 py-1 rounded-md text-slate-900 dark:text-white dark:bg-slate-900">
            <option value="">Pilih</option>
            @if ($role != 'guru' && $role != 'walikelas')
              <option value="semua">Semua</option>
            @endif
            @foreach ($kelass as $kelas)
              <option value="{{ $kelas->id }}">{{ $kelas->nama }}</option>
            @endforeach
          </select>
        </div>
      </div>
    </div>
  </div>

  @isset($presensis, $santris)
    <input type="search" wire:model.live.debounce.300ms='search'
      class="px-3 py-1 rounded-md dark:bg-slate-800 dark:text-white my-3" placeholder="search...">

    <button class="px-3 py-1 rounded-md bg-red-500 text-white " wire:click='download'>Download</button>
    <div class=" overflow-auto mt-2">
      <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 bg-opacity-85">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
          <tr>
            <th scope="col" class="px-6 py-3">
              No
            </th>

            <th scope="col" class="px-6 py-3">
              Nama
            </th>
            <th scope="col" class="px-6 py-3">
              Kelas
            </th>
            <th scope="col" class="px-6 py-3">
              Sakit
            </th>
            <th scope="col" class="px-6 py-3">
              Izin
            </th>
            <th scope="col" class="px-6 py-3">
              Alpha
            </th>
          </tr>
        </thead>
        <tbody>
          @foreach ($santris as $santri)
            <tr
              class="bg-white border-b  bg-opacity-85 dark:bg-slate-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

              <td class="px-6 py-4">{{ $loop->iteration }}</td>
              <td class="px-6 py-4">{{ $santri->name }}</td>
              <td class="px-6 py-4">
                @foreach ($kelass as $kls)
                  @switch($lembaga->jenis_lembaga)
                    @case('FORMAL')
                      @if ($santri->kelas_formal_id)
                        @if ($santri->kelas_formal_id == $kls->id)
                          {{ $kls->nama ?? '' }}
                        @endif
                      @endif
                    @break

                    @case('MADIN')
                      @if ($santri->kelas_madin_id)
                        @if ($santri->kelas_madin_id == $kls->id)
                          {{ $kls->nama ?? '' }}
                        @endif
                      @endif
                    @break

                    @case('TPQ')
                      @if ($santri->kelas_tpq_id)
                        @if ($santri->kelas_tpq_id == $kls->id)
                          {{ $kls->nama ?? '' }}
                        @endif
                      @endif
                    @break

                    @case('ASRAMA')
                      @if ($santri->kelas_asrama_id)
                        @if ($santri->kelas_asrama_id == $kls->id)
                          {{ $kls->nama ?? '' }}
                        @endif
                      @endif
                    @break

                    @default
                  @endswitch
                @endforeach
              </td>
              @php
                $sakit = 0;
                $izin = 0;
                $alpha = 0;

                foreach ($presensis as $presensi) {
                    if ($presensi->santri_id == $santri->id) {
                        switch ($presensi->keterangan) {
                            case 'S':
                                $sakit += 1;

                                break;
                            case 'I':
                                $izin += 1;

                                break;
                            case 'A':
                                $alpha += 1;

                                break;
                        }
                    }
                }
              @endphp

              <td>{{ $sakit }}</td>
              <td>{{ $izin }}</td>
              <td>{{ $alpha }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  @endisset

  <x-loading></x-loading>


</div>
