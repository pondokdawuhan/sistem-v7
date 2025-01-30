<div class=" overflow-x-auto shadow-md sm:rounded-lg">
  <x-loading></x-loading>
  <x-notifsukses></x-notifsukses>
  @include('partials.notifSukses')

  <form wire:submit='pilih'>
    <div class="flex gap-2">
      <input type="hidden" name="lembaga" value="{{ request('lembaga') }}">
      <div class="flex flex-col">
        <label for="" class="text-slate-900 dark:text-white">Kelas</label>
        <select wire:model="selectedKelas" id="kelas" class="rounded-md px-3 py-1" required>
          <option value="">Pilih</option>
          @foreach ($kelas as $kls)
            <option value="{{ $kls->id }}" @if (request('kelas') == $kls->id) selected @endif>{{ $kls->nama }}
            </option>
          @endforeach
        </select>
      </div>

      <div class="flex flex-col">
        <label for="" class="text-slate-900 dark:text-white">Pelajaran</label>
        <select wire:model="selectedPelajaran" id="pelajaran" class="rounded-md px-3 py-1" required>
          <option value="">Pilih</option>
          @foreach ($pelajarans as $pelajaran)
            <option value="{{ $pelajaran->id }}" @if (request('pelajaran') == $pelajaran->id) selected @endif>
              {{ $pelajaran->nama }}
            </option>
          @endforeach
        </select>
      </div>

      <div class="flex flex-col">
        <label for="" class="text-slate-900 dark:text-white">Semester</label>
        <select wire:model="selectedSemester" id="semester" class="rounded-md px-3 py-1" required>
          <option value="">Pilih</option>
          <option value="1" @if (request('semester') == '1') selected @endif>1</option>
          <option value="2" @if (request('semester') == '2') selected @endif>2</option>
        </select>
      </div>

      <div class="flex flex-col">
        <label for="" class="text-slate-900 dark:text-white">Tahun</label>
        <select wire:model="selectedTahun" id="tahun" class="rounded-md px-3 py-1" required>
          <option value="">Pilih</option>
          <option value="{{ $tahunAjaran->tahun }}" @if (request('tahun')) selected @endif>
            {{ $tahunAjaran->tahun }}</option>


        </select>
      </div>

      <div class="flex flex-col justify-end">
        <button type="submit" class="px-3 py-1 rounded-md bg-violet-500 text-white">Pilih</button>
      </div>
    </div>
  </form>

  @if ($santris)
    <div class="mt-3">
      <div class="flex justify-between items-end">
        <div>
          <a href="/{{ $lembaga->id }}/nilaiSantri/create?pelajaran={{ $selectedPelajaran }}&kelas={{ $selectedKelas }}&semester={{ $selectedSemester }}&tahun={{ $selectedTahun }}"
            wire:navigate class="bg-green-500 text-white px-3 py-1 rounded-md my-2 inline-block mb-2">Tambah/Edit</a>

        </div>
        {{-- <div>
          <form action="/download/nilaiSantri" method="POST">
            @csrf
            <input type="hidden" name="lembaga" value="{{ request('lembaga') }}">
            <input type="hidden" name="pelajaran" value="{{ request('pelajaran') }}">
            <input type="hidden" name="kelas" value="{{ request('kelas') }}">
            <input type="hidden" name="semester" value="{{ request('semester') }}">
            <input type="hidden" name="tahun" value="{{ request('tahun') }}">
            <button type="submit" class="bg-red-500 text-white px-3 py-1 rounded-md my-2">Download</button>
          </form>
        </div> --}}
      </div>
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
              UH1
            </th>
            <th scope="col" class="px-6 py-3">
              UH2
            </th>
            <th scope="col" class="px-6 py-3">
              UH3
            </th>
            <th scope="col" class="px-6 py-3">
              UH4
            </th>
            <th scope="col" class="px-6 py-3">
              UH5
            </th>
            <th scope="col" class="px-6 py-3">
              PTS
            </th>
            <th scope="col" class="px-6 py-3">
              PAS
            </th>
            <th scope="col" class="px-6 py-3">
              Rata-rata
            </th>
            <th scope="col" class="px-6 py-3">
              Aksi
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
                @foreach ($nilais as $nilai)
                  @if ($nilai->santri_id == $santri->id)
                    {{ $nilai->uh1 }}
                  @endif
                @endforeach
              </td>
              <td class="px-6 py-4">
                @foreach ($nilais as $nilai)
                  @if ($nilai->santri_id == $santri->id)
                    {{ $nilai->uh2 }}
                  @endif
                @endforeach
              </td>
              <td class="px-6 py-4">
                @foreach ($nilais as $nilai)
                  @if ($nilai->santri_id == $santri->id)
                    {{ $nilai->uh3 }}
                  @endif
                @endforeach
              </td>
              <td class="px-6 py-4">
                @foreach ($nilais as $nilai)
                  @if ($nilai->santri_id == $santri->id)
                    {{ $nilai->uh4 }}
                  @endif
                @endforeach
              </td>
              <td class="px-6 py-4">
                @foreach ($nilais as $nilai)
                  @if ($nilai->santri_id == $santri->id)
                    {{ $nilai->uh5 }}
                  @endif
                @endforeach
              </td>
              <td class="px-6 py-4">
                @foreach ($nilais as $nilai)
                  @if ($nilai->santri_id == $santri->id)
                    {{ $nilai->pts }}
                  @endif
                @endforeach
              </td>
              <td class="px-6 py-4">
                @foreach ($nilais as $nilai)
                  @if ($nilai->santri_id == $santri->id)
                    {{ $nilai->pas }}
                  @endif
                @endforeach
              </td>
              <td class="px-6 py-4">
                @foreach ($nilais as $nilai)
                  @if ($nilai->santri_id == $santri->id)
                    {{ round(($nilai->uh1 + $nilai->uh2 + $nilai->uh3 + $nilai->uh4 + $nilai->uh5 + $nilai->pts * 2 + $nilai->pas * 2) / 9, 2) }}
                  @endif
                @endforeach
              </td>
              <td class="px-6 py-4">
                @foreach ($nilais as $nilai)
                  @if ($nilai->santri_id == $santri->id)
                    <button class="px-3 py-1 rounded-md bg-red-500 text-white text-xs"
                      wire:click='delete({{ $nilai->id }})'
                      wire:confirm='Apakah Anda yakin menghapus nilai {{ $nilai->santri->name }} mapel {{ $nilai->pelajaran->nama }} semester {{ $nilai->semester }} tahun {{ $nilai->tahun }} ini?'>Hapus</button>
                  @endif
                @endforeach
              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  @endif

</div>
