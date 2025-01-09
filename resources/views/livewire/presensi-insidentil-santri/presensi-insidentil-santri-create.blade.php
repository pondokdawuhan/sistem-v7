<div class=" overflow-x-auto shadow-md sm:rounded-lg bg-white p-5 rounded-md dark:bg-slate-900">
  <div class="flex items-center gap-2 mb-2">
    <form wire:submit='pilih'>
      <div class="flex flex-wrap lg:flex-nowrap gap-3">
        <div class="flex flex-col w-full lg:w-min gap-2">
          <label for="kamar" class="text-slate-800 dark:text-white">Kelas</label>

          <select wire:model="selectedKelas" id="kamar" class="px-3 py-1 rounded-md">
            <option value="">Pilih</option>
            @foreach ($kelas as $kelas)
              <option value="{{ $kelas->id }}" @if (request('kelas') == $kelas->id) selected @endif>
                {{ $kelas->nama }}</option>
            @endforeach
          </select>
        </div>

        <div class="flex flex-col w-full lg:w-min gap-2">
          <label for="kegiatan" class="text-slate-800 dark:text-white">Kegiatan</label>
          <input type="text" wire:model="kegiatan" id="kegiatan" class="px-3 py-1 rounded-md"
            value="{{ request('kegiatan') }}">
        </div>

        <div class="flex flex-col w-full lg:w-min gap-2">
          <label for="pelajaran" class="text-white dark:text-slate-900">Label</label>
          <button type="submit" class="px-3 py-1 rounded-md text-white bg-green-500">pilih</button>
        </div>



      </div>
    </form>
  </div>

  @isset($santris)

    <form action="/{{ $lembaga->id }}/{{ $role }}/presensiInsidentilSantri" method="POST">
      @csrf
      <input type="hidden" name="kelas_id" value="{{ $selectedKelas }}">
      <input type="hidden" name="kegiatan" value="{{ $kegiatan }}">
      <input type="hidden" name="role" value="{{ $role }}">
      <input type="hidden" name="lembaga_id" value="{{ $lembaga->id }}">
      <input type="hidden" name="lembaga_name" value="{{ $lembaga->nama }}">

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
                Keterangan
              </th>
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
                <td class="px-6 py-4 @if (in_array($santri->id, $izinKeluarSantris) ||
                        in_array($santri->id, $izinPulangSantris) ||
                        in_array($santri->id, $izinSakitSantris)) bg-red-500 text-white @endif">
                  <select name="keterangans[]" id="keterangan"
                    class="px-3 py-1 rounded-md dark:bg-slate-800 dark:text-white">
                    <option value="H">HADIR</option>
                    <option value="S" @if (in_array($santri->id, $izinSakitSantris)) selected @endif>
                      SAKIT</option>
                    <option value="I" @if (in_array($santri->id, $izinKeluarSantris) || in_array($santri->id, $izinPulangSantris)) selected @endif>
                      IZIN</option>
                    <option value="A">ALPHA</option>
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
  <x-loading></x-loading>
</div>
