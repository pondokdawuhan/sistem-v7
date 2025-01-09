@extends('templates.main')
@section('container')
  @php
    $url = explode('/', request()->path());
  @endphp
  <div class=" overflow-x-auto shadow-md sm:rounded-lg text-sm">
    @if (session()->has('success'))
      <div class="bg-green-400 text-white px-3 py-2 mb-5">
        <h4 class="text-center font-semibold">{{ session('success') }}</h4>
      </div>
    @endif
    {{-- <div class="flex gap-2">
      <a href="/{{ request()->path() }}/create"
        class="px-3 py-1 rounded-md bg-violet-500 text-white inline-block mb-2">Tambah</a>
      <form action="/{{ request()->path() }}/resetJadwal" method="POST">
        @csrf
        @method('delete')
        <button type="submit" onclick="return confirm('Apakah Anda yakin mereset seluruh jadwal?')"
          class="bg-red-500 text-white px-3 py-1 rounded-md inline-block">Reset</button>
      </form>
    </div> --}}
    <form action="/{{ request('lembaga')->id }}/jadwalPelajaran" method="POST" class="inline-block w-full">
      @csrf
      <button type="submit" class="px-3 py-1 rounded-md bg-violet-500 text-white">Simpan</button>

      {{-- senin start --}}
      <div id="senin">
        <h3 class="text-center text-slate-800 dark:text-white my-2">SENIN</h3>

        <table class="border-collapse w-full" style="table-layout: auto">
          <thead>
            <tr class="text-center bg-amber-500 text-white">
              <th class="text-white border border-white px-2 py-1">Jam</th>
              @foreach ($kelas as $kls)
                <th class="text-white border border-white px-2 py-1">{{ $kls->nama }}</th>
              @endforeach
            </tr>
          </thead>
          <tbody>
            @for ($i = 1; $i < request('lembaga')->jam + 1; $i++)
              <tr>
                <td class="bg-amber-500 text-white border border-white px-2 py-1 text-center">{{ $i }}</td>
                @foreach ($kelas as $kls)
                  <td
                    class="border border-slate-300 text-sm px-2 py-1 text-center w-fit bg-white dark:bg-slate-900 text-slate-800 dark:text-white">
                    <input type="hidden" name="hari[]" value="senin">
                    <input type="hidden" name="kelas[]" value="{{ $kls->id }}">
                    <input type="hidden" name="jam[]" value="{{ $i }}">
                    <select name="pengampu_id[]" id=""
                      class="dark:bg-slate-900 dark:text-white will-change-contents js-example-basic-single">
                      <option value="">pilih</option>
                      @foreach ($pengampuMapels as $pengampu)
                        <option value="{{ $pengampu->id }}"
                          @foreach ($jadwals as $jadwal)
                          @selected($jadwal->user_id == $pengampu->user_id && $jadwal->pelajaran_id == $pengampu->pelajaran_id && $jadwal->hari == 'senin' && $jadwal->jam == $i && $jadwal->kelas_id == $kls->id) @endforeach>
                          {{ $pengampu->user->name }} | {{ $pengampu->pelajaran->nama }}
                        </option>
                      @endforeach
                    </select>
                  </td>
                @endforeach
              </tr>
            @endfor
          </tbody>
        </table>
      </div>
      {{-- senin end --}}

      {{-- selasa start --}}
      <div id="selasa">
        <h3 class="text-center text-slate-800 dark:text-white my-2">selasa</h3>

        <table class="border-collapse w-full" style="table-layout: auto">
          <thead>
            <tr class="text-center bg-amber-500 text-white">
              <th class="text-white border border-white px-2 py-1">Jam</th>
              @foreach ($kelas as $kls)
                <th class="text-white border border-white px-2 py-1">{{ $kls->nama }}</th>
              @endforeach
            </tr>
          </thead>
          <tbody>
            @for ($i = 1; $i < request('lembaga')->jam + 1; $i++)
              <tr>
                <td class="bg-amber-500 text-white border border-white px-2 py-1 text-center">{{ $i }}</td>
                @foreach ($kelas as $kls)
                  <td
                    class="border border-slate-300 text-sm px-2 py-1 text-center w-fit bg-white dark:bg-slate-900 text-slate-800 dark:text-white">
                    <input type="hidden" name="hari[]" value="selasa">
                    <input type="hidden" name="kelas[]" value="{{ $kls->id }}">
                    <input type="hidden" name="jam[]" value="{{ $i }}">
                    <select name="pengampu_id[]" id=""
                      class="dark:bg-slate-900 dark:text-white will-change-contents js-example-basic-single">
                      <option value="">pilih</option>
                      @foreach ($pengampuMapels as $pengampu)
                        <option value="{{ $pengampu->id }}"
                          @foreach ($jadwals as $jadwal)
                          @selected($jadwal->user_id == $pengampu->user_id && $jadwal->pelajaran_id == $pengampu->pelajaran_id && $jadwal->hari == 'selasa' && $jadwal->jam == $i && $jadwal->kelas_id == $kls->id) @endforeach>
                          {{ $pengampu->user->name }} | {{ $pengampu->pelajaran->nama }}
                        </option>
                      @endforeach
                    </select>
                  </td>
                @endforeach
              </tr>
            @endfor
          </tbody>
        </table>
      </div>
      {{-- selasa end --}}

      {{-- rabu start --}}
      <div id="rabu">
        <h3 class="text-center text-slate-800 dark:text-white my-2">rabu</h3>

        <table class="border-collapse w-full" style="table-layout: auto">
          <thead>
            <tr class="text-center bg-amber-500 text-white">
              <th class="text-white border border-white px-2 py-1">Jam</th>
              @foreach ($kelas as $kls)
                <th class="text-white border border-white px-2 py-1">{{ $kls->nama }}</th>
              @endforeach
            </tr>
          </thead>
          <tbody>
            @for ($i = 1; $i < request('lembaga')->jam + 1; $i++)
              <tr>
                <td class="bg-amber-500 text-white border border-white px-2 py-1 text-center">{{ $i }}</td>
                @foreach ($kelas as $kls)
                  <td
                    class="border border-slate-300 text-sm px-2 py-1 text-center w-fit bg-white dark:bg-slate-900 text-slate-800 dark:text-white">
                    <input type="hidden" name="hari[]" value="rabu">
                    <input type="hidden" name="kelas[]" value="{{ $kls->id }}">
                    <input type="hidden" name="jam[]" value="{{ $i }}">
                    <select name="pengampu_id[]" id=""
                      class="dark:bg-slate-900 dark:text-white will-change-contents js-example-basic-single">
                      <option value="">pilih</option>
                      @foreach ($pengampuMapels as $pengampu)
                        <option value="{{ $pengampu->id }}"
                          @foreach ($jadwals as $jadwal)
                          @selected($jadwal->user_id == $pengampu->user_id && $jadwal->pelajaran_id == $pengampu->pelajaran_id && $jadwal->hari == 'rabu' && $jadwal->jam == $i && $jadwal->kelas_id == $kls->id) @endforeach>
                          {{ $pengampu->user->name }} | {{ $pengampu->pelajaran->nama }}
                        </option>
                      @endforeach
                    </select>
                  </td>
                @endforeach
              </tr>
            @endfor
          </tbody>
        </table>
      </div>
      {{-- rabu end --}}

      {{-- kamis start --}}
      <div id="kamis">
        <h3 class="text-center text-slate-800 dark:text-white my-2">kamis</h3>

        <table class="border-collapse w-full" style="table-layout: auto">
          <thead>
            <tr class="text-center bg-amber-500 text-white">
              <th class="text-white border border-white px-2 py-1">Jam</th>
              @foreach ($kelas as $kls)
                <th class="text-white border border-white px-2 py-1">{{ $kls->nama }}</th>
              @endforeach
            </tr>
          </thead>
          <tbody>
            @for ($i = 1; $i < request('lembaga')->jam + 1; $i++)
              <tr>
                <td class="bg-amber-500 text-white border border-white px-2 py-1 text-center">{{ $i }}</td>
                @foreach ($kelas as $kls)
                  <td
                    class="border border-slate-300 text-sm px-2 py-1 text-center w-fit bg-white dark:bg-slate-900 text-slate-800 dark:text-white">
                    <input type="hidden" name="hari[]" value="kamis">
                    <input type="hidden" name="kelas[]" value="{{ $kls->id }}">
                    <input type="hidden" name="jam[]" value="{{ $i }}">
                    <select name="pengampu_id[]" id=""
                      class="dark:bg-slate-900 dark:text-white will-change-contents js-example-basic-single">
                      <option value="">pilih</option>
                      @foreach ($pengampuMapels as $pengampu)
                        <option value="{{ $pengampu->id }}"
                          @foreach ($jadwals as $jadwal)
                          @selected($jadwal->user_id == $pengampu->user_id && $jadwal->pelajaran_id == $pengampu->pelajaran_id && $jadwal->hari == 'kamis' && $jadwal->jam == $i && $jadwal->kelas_id == $kls->id) @endforeach>
                          {{ $pengampu->user->name }} | {{ $pengampu->pelajaran->nama }}
                        </option>
                      @endforeach
                    </select>
                  </td>
                @endforeach
              </tr>
            @endfor
          </tbody>
        </table>
      </div>
      {{-- kamis end --}}

      {{-- jumat start --}}
      <div id="jumat">
        <h3 class="text-center text-slate-800 dark:text-white my-2">jumat</h3>

        <table class="border-collapse w-full" style="table-layout: auto">
          <thead>
            <tr class="text-center bg-amber-500 text-white">
              <th class="text-white border border-white px-2 py-1">Jam</th>
              @foreach ($kelas as $kls)
                <th class="text-white border border-white px-2 py-1">{{ $kls->nama }}</th>
              @endforeach
            </tr>
          </thead>
          <tbody>
            @for ($i = 1; $i < request('lembaga')->jam + 1; $i++)
              <tr>
                <td class="bg-amber-500 text-white border border-white px-2 py-1 text-center">{{ $i }}</td>
                @foreach ($kelas as $kls)
                  <td
                    class="border border-slate-300 text-sm px-2 py-1 text-center w-fit bg-white dark:bg-slate-900 text-slate-800 dark:text-white">
                    <input type="hidden" name="hari[]" value="jumat">
                    <input type="hidden" name="kelas[]" value="{{ $kls->id }}">
                    <input type="hidden" name="jam[]" value="{{ $i }}">
                    <select name="pengampu_id[]" id=""
                      class="dark:bg-slate-900 dark:text-white will-change-contents js-example-basic-single">
                      <option value="">pilih</option>
                      @foreach ($pengampuMapels as $pengampu)
                        <option value="{{ $pengampu->id }}"
                          @foreach ($jadwals as $jadwal)
                          @selected($jadwal->user_id == $pengampu->user_id && $jadwal->pelajaran_id == $pengampu->pelajaran_id && $jadwal->hari == 'jumat' && $jadwal->jam == $i && $jadwal->kelas_id == $kls->id) @endforeach>
                          {{ $pengampu->user->name }} | {{ $pengampu->pelajaran->nama }}
                        </option>
                      @endforeach
                    </select>
                  </td>
                @endforeach
              </tr>
            @endfor
          </tbody>
        </table>
      </div>
      {{-- jumat end --}}

      {{-- sabtu start --}}
      <div id="sabtu">
        <h3 class="text-center text-slate-800 dark:text-white my-2">sabtu</h3>

        <table class="border-collapse w-full" style="table-layout: auto">
          <thead>
            <tr class="text-center bg-amber-500 text-white">
              <th class="text-white border border-white px-2 py-1">Jam</th>
              @foreach ($kelas as $kls)
                <th class="text-white border border-white px-2 py-1">{{ $kls->nama }}</th>
              @endforeach
            </tr>
          </thead>
          <tbody>
            @for ($i = 1; $i < request('lembaga')->jam + 1; $i++)
              <tr>
                <td class="bg-amber-500 text-white border border-white px-2 py-1 text-center">{{ $i }}</td>
                @foreach ($kelas as $kls)
                  <td
                    class="border border-slate-300 text-sm px-2 py-1 text-center w-fit bg-white dark:bg-slate-900 text-slate-800 dark:text-white">
                    <input type="hidden" name="hari[]" value="sabtu">
                    <input type="hidden" name="kelas[]" value="{{ $kls->id }}">
                    <input type="hidden" name="jam[]" value="{{ $i }}">
                    <select name="pengampu_id[]" id=""
                      class="dark:bg-slate-900 dark:text-white will-change-contents js-example-basic-single">
                      <option value="">pilih</option>
                      @foreach ($pengampuMapels as $pengampu)
                        <option value="{{ $pengampu->id }}"
                          @foreach ($jadwals as $jadwal)
                          @selected($jadwal->user_id == $pengampu->user_id && $jadwal->pelajaran_id == $pengampu->pelajaran_id && $jadwal->hari == 'sabtu' && $jadwal->jam == $i && $jadwal->kelas_id == $kls->id) @endforeach>
                          {{ $pengampu->user->name }} | {{ $pengampu->pelajaran->nama }}
                        </option>
                      @endforeach
                    </select>
                  </td>
                @endforeach
              </tr>
            @endfor
          </tbody>
        </table>
      </div>
      {{-- sabtu end --}}

      {{-- ahad start --}}
      <div id="ahad">
        <h3 class="text-center text-slate-800 dark:text-white my-2">ahad</h3>

        <table class="border-collapse w-full" style="table-layout: auto">
          <thead>
            <tr class="text-center bg-amber-500 text-white">
              <th class="text-white border border-white px-2 py-1">Jam</th>
              @foreach ($kelas as $kls)
                <th class="text-white border border-white px-2 py-1">{{ $kls->nama }}</th>
              @endforeach
            </tr>
          </thead>
          <tbody>
            @for ($i = 1; $i < request('lembaga')->jam + 1; $i++)
              <tr>
                <td class="bg-amber-500 text-white border border-white px-2 py-1 text-center">{{ $i }}</td>
                @foreach ($kelas as $kls)
                  <td
                    class="border border-slate-300 text-sm px-2 py-1 text-center w-fit bg-white dark:bg-slate-900 text-slate-800 dark:text-white">
                    <input type="hidden" name="hari[]" value="ahad">
                    <input type="hidden" name="kelas[]" value="{{ $kls->id }}">
                    <input type="hidden" name="jam[]" value="{{ $i }}">
                    <select name="pengampu_id[]" id=""
                      class="dark:bg-slate-900 dark:text-white will-change-contents js-example-basic-single">
                      <option value="">pilih</option>
                      @foreach ($pengampuMapels as $pengampu)
                        <option value="{{ $pengampu->id }}"
                          @foreach ($jadwals as $jadwal)
                          @selected($jadwal->user_id == $pengampu->user_id && $jadwal->pelajaran_id == $pengampu->pelajaran_id && $jadwal->hari == 'ahad' && $jadwal->jam == $i && $jadwal->kelas_id == $kls->id) @endforeach>
                          {{ $pengampu->user->name }} | {{ $pengampu->pelajaran->nama }}
                        </option>
                      @endforeach
                    </select>
                  </td>
                @endforeach
              </tr>
            @endfor
          </tbody>
        </table>
      </div>
      {{-- ahad end --}}


      <button type="submit" class="px-3 py-1 rounded-md bg-violet-500 text-white my-2">Simpan</button>
    </form>

  </div>
@endsection
