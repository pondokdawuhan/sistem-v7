@extends('templates.main')
@section('container')
  @php
    $urls = explode('/', request()->path());
  @endphp
  @if ($santris)
    <form action="/{{ $urls[0] }}/{{ $urls[1] }}" method="POST">
      @csrf
      <div class="">
        <div class="text-center text-slate-900 dark:text-white">
          <h3>Tambah Nilai Kelas {{ $kelas->nama }} Pelajaran {{ $pelajaran->nama }}</h3>
          <h3>Semester {{ $semester }} Tahun
            Pelajaran {{ $tahun }}</h3>
        </div>
        <div class="">
          <input type="hidden" name="url" value="/{{ $urls[0] }}/{{ $urls[1] }}">
          <input type="hidden" name="pelajaran" value="{{ request('pelajaran') }}">
          <input type="hidden" name="lembaga" value="{{ request('lembaga') }}">
          <input type="hidden" name="semester" value="{{ request('semester') }}">
          <input type="hidden" name="tahun" value="{{ request('tahun') }}">
        </div>
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
              </tr>
            </thead>
            <tbody>
              @foreach ($santris as $santri)
                <tr
                  class="bg-white border-b  bg-opacity-85 dark:bg-slate-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                  <td class="px-6 py-4">{{ $loop->iteration }}</td>
                  <td class="px-6 py-4">{{ $santri->name }}</td>
                  <input type="hidden" name="santri_id[]" value="{{ $santri->id }}">
                  <td class="px-6 py-4">
                    <input type="integer" name="uh1[]"
                      class="px-3 py-1 w-24 rounded-md bg-white dark:bg-slate-500 text-slate-900 dark:text-white"
                      @foreach ($nilais as $nilai)
                        @if ($nilai->santri_id == $santri->id)
                          value="{{ $nilai->uh1 }}"
                        @endif @endforeach>
                  </td>
                  <td class="px-6 py-4">
                    <input type="integer" name="uh2[]"
                      class="px-3 py-1 w-24 rounded-md bg-white dark:bg-slate-500 text-slate-900 dark:text-white"
                      @foreach ($nilais as $nilai)
                        @if ($nilai->santri_id == $santri->id)
                          value="{{ $nilai->uh2 }}"
                        @endif @endforeach>
                  </td>
                  <td class="px-6 py-4">
                    <input type="integer" name="uh3[]"
                      class="px-3 py-1 w-24 rounded-md bg-white dark:bg-slate-500 text-slate-900 dark:text-white"
                      @foreach ($nilais as $nilai)
                        @if ($nilai->santri_id == $santri->id)
                          value="{{ $nilai->uh3 }}"
                        @endif @endforeach>
                  </td>
                  <td class="px-6 py-4">
                    <input type="integer" name="uh4[]"
                      class="px-3 py-1 w-24 rounded-md bg-white dark:bg-slate-500 text-slate-900 dark:text-white"
                      @foreach ($nilais as $nilai)
                        @if ($nilai->santri_id == $santri->id)
                          value="{{ $nilai->uh4 }}"
                        @endif @endforeach>
                  </td>
                  <td class="px-6 py-4">
                    <input type="integer" name="uh5[]"
                      class="px-3 py-1 w-24 rounded-md bg-white dark:bg-slate-500 text-slate-900 dark:text-white"
                      @foreach ($nilais as $nilai)
                        @if ($nilai->santri_id == $santri->id)
                          value="{{ $nilai->uh5 }}"
                        @endif @endforeach>
                  </td>
                  <td class="px-6 py-4">
                    <input type="integer" name="pts[]"
                      class="px-3 py-1 w-24 rounded-md bg-white dark:bg-slate-500 text-slate-900 dark:text-white"
                      @foreach ($nilais as $nilai)
                        @if ($nilai->santri_id == $santri->id)
                          value="{{ $nilai->pts }}"
                        @endif @endforeach>
                  </td>
                  <td class="px-6 py-4">
                    <input type="integer" name="pas[]"
                      class="px-3 py-1 w-24 rounded-md bg-white dark:bg-slate-500 text-slate-900 dark:text-white"
                      @foreach ($nilais as $nilai)
                        @if ($nilai->santri_id == $santri->id)
                          value="{{ $nilai->pas }}"
                        @endif @endforeach>
                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
        <div class="flex justify-end mt-3 mr-4 gap-2">
          <a href="/nilaiSantri?lembaga={{ request('lembaga') }}"
            class="px-3 py-1 rounded-md bg-slate-500 text-white">Kembali</a>
          <button type="submit" class="bg-green-500 text-white px-3 py-1 rounded-md">Kirim</button>

        </div>
      </div>
    </form>
  @endif
@endsection
