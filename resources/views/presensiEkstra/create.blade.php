@extends('templates.main')
@section('container')
  <div class=" overflow-x-auto shadow-md sm:rounded-lg bg-white p-5 rounded-md dark:bg-slate-900">
    @isset($santris)
      @php
        $url = explode('/', request()->path());
      @endphp
      <form action="/presensiEkstrakurikuler/{{ $ekstrakurikuler->id }}" method="POST">
        @csrf
        <div>
          <div class="flex flex-col dark:text-white mb-2">
            <label for="materi">Materi</label>
            <input type="text" class="px-3 py-1 rounded-md dark:bg-slate-800" required name="materi" id="materi">
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
                  Presensi
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
          <div class="flex gap-2 mt-2">
            <a href="/presensiEkstrakurikuler/{{ $ekstrakurikuler->id }}"
              class="px-3 py-1 rounded-md bg-slate-500 text-white inline-block">Kembali</a>
            <button type="submit" class="px-3 py-1 rounded-md bg-violet-500 text-white">Kirim</button>
          </div>
        </div>
      </form>
    @endisset
  </div>
@endsection
