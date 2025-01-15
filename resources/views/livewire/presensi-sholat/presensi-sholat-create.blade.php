<div class=" overflow-x-auto shadow-md sm:rounded-lg bg-white p-5 rounded-md dark:bg-slate-900">
  <x-loading></x-loading>
  <div class="flex items-center gap-2 mb-2">
    <form action="" wire:submit='pilih'>
      <div class="flex flex-wrap lg:flex-nowrap gap-3">

        <div class="flex flex-col w-full lg:w-min gap-2">

          <label for="kelas" class="text-slate-800 dark:text-white">Kelas</label>

          <select wire:model="kelas" id="kelas" class="px-3 py-1 rounded-md">
            <option value="">Pilih</option>
            @foreach ($kelass as $kelas)
              <option value="{{ $kelas->id }}">
                {{ $kelas->nama }}
              </option>
            @endforeach
          </select>
        </div>
        <div class="flex flex-col w-full lg:w-min gap-2">
          <label for="waktu" class="text-slate-800 dark:text-white">Waktu</label>

          <select wire:model="waktu" id="waktu" class="px-3 py-1 rounded-md" required>
            <option value="">Pilih</option>
            <option value="Subuh" @if (request('waktu') == 'Subuh') selected @endif>Subuh</option>
            <option value="Dhuha" @if (request('waktu') == 'Dhuha') selected @endif>Dhuha</option>
            <option value="Dhuhur" @if (request('waktu') == 'Dhuhur') selected @endif>Dhuhur</option>
            <option value="Asar" @if (request('waktu') == 'Asar') selected @endif>Asar</option>
            <option value="Magrib" @if (request('waktu') == 'Magrib') selected @endif>Magrib</option>
            <option value="Isya" @if (request('waktu') == 'Isya') selected @endif>Isya</option>
          </select>
        </div>


        <div class="flex flex-col w-full lg:w-min gap-2">
          <label for="pelajaran" class="text-white dark:text-slate-900">Label</label>
          <button type="submit" class="px-3 py-1 rounded-md text-white bg-green-500">pilih</button>
        </div>
      </div>
    </form>
  </div>

  @isset($santris)
    <form action="/{{ $role }}/presensiSholat" method="POST">
      @csrf
      <input type="hidden" name="waktu" value="{{ $waktu }}">
      <input type="hidden" name="lembaga" value="{{ $lembaga->id }}">
      <input type="hidden" name="role" value="{{ $role }}">
      <input type="hidden" name="kelas_id" value="{{ $selectedKelas }}">
      <div>
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
                {{ $waktu }}
              </th>
            </tr>
          </thead>
          <tbody>

            @foreach ($santris as $santri)
              <tr
                class="bg-white border-b  bg-opacity-85 dark:bg-slate-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600 ">

                <td class="px-6 py-4 dark:text-white @if (in_array($santri->id, $izinKeluarSantris) ||
                        in_array($santri->id, $izinPulangSantris) ||
                        in_array($santri->id, $izinSakitSantris) ||
                        in_array($santri->id, $santriHaid) ||
                        in_array($santri->id, $santriIstihadloh)) bg-red-500 @endif">
                  {{ $loop->iteration }}</td>
                <td class="px-6 py-4 dark:text-white @if (in_array($santri->id, $izinKeluarSantris) ||
                        in_array($santri->id, $izinPulangSantris) ||
                        in_array($santri->id, $izinSakitSantris) ||
                        in_array($santri->id, $santriHaid) ||
                        in_array($santri->id, $santriIstihadloh)) bg-red-500 @endif">
                  <input type="hidden" name="santri_id[]" value="{{ $santri->id }}">
                  {{ $santri->name }}
                </td>

                <td class="px-6 py-4 @if (in_array($santri->id, $izinKeluarSantris) ||
                        in_array($santri->id, $izinPulangSantris) ||
                        in_array($santri->id, $izinSakitSantris) ||
                        in_array($santri->id, $santriHaid) ||
                        in_array($santri->id, $santriIstihadloh)) bg-red-500 dark:text-white @endif">
                  <select name="keterangans[]" id="keterangan"
                    class="px-3 py-1 rounded-md dark:bg-slate-800 dark:text-white">
                    <option value="H">HADIR</option>
                    <option value="S" @if (in_array($santri->id, $izinSakitSantris)) selected @endif>
                      SAKIT</option>
                    <option value="I" @if (in_array($santri->id, $izinKeluarSantris) || in_array($santri->id, $izinPulangSantris)) selected @endif>
                      IZIN</option>
                    <option value="A">ALPHA</option>
                    @if ($santri->dataSantri->jenis_kelamin == 'Perempuan')
                      <option value="ISTIHADLOH" @if (in_array($santri->id, $santriIstihadloh)) selected @endif>
                        ISTIHADLOH</option>
                      <option value="HAID" @if (in_array($santri->id, $santriHaid)) selected @endif>HAID
                      </option>
                    @endif
                  </select>
                </td>
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
