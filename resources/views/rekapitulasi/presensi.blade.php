@extends('templates.main')
@section('container')
  <div class=" overflow-x-hidden shadow-md sm:rounded-lg">

    <div class="flex items-center gap-2 mb-2 w-full">
      <div class="flex items-center gap-2 mb-2 w-full">

        <form action="" class="inline-block w-full lg:w-1/2">
          <div class="w-full flex flex-col lg:flex-row lg:gap-5 gap-3 ">
            <div class="flex flex-col gap-2 w-full">
              <label for="kelas" class="text-slate-900 dark:text-white">Kelas</label>
              <select name="kelas_id" id="kelas" class="px-3 py-1 rounded-md dark:bg-slate-800 dark:text-white"
                required>
                <option value="semua">Semua</option>
                @foreach ($kelass as $kelas)
                  <option value="{{ $kelas->id }}" @selected($kelas->id == request('kelas_id'))>{{ $kelas->nama }}</option>
                @endforeach
              </select>
            </div>
            <div class="flex flex-col gap-2 w-full">
              <label for="pelajaran" class="text-slate-900 dark:text-white">Pelajaran</label>
              <select name="pelajaran_id" id="pelajaran" class="px-3 py-1 rounded-md dark:bg-slate-800 dark:text-white"
                required>
                <option value="semua">Semua</option>
                @foreach ($pelajarans as $pelajaran)
                  <option value="{{ $pelajaran->id }}" @selected($pelajaran->id == request('pelajaran_id'))>{{ $pelajaran->nama }}</option>
                @endforeach
              </select>
            </div>
            <div class="flex flex-col gap-2 w-full">
              <label for="tanggalAwal" class="text-slate-900 dark:text-white">Tanggal Awal</label>
              <input type="date" name="tanggalAwal" id="tanggalAwal" required
                class="px-3 py-1 rounded-md text-slate-900 dark:text-white dark:bg-slate-900"
                @if (request('tanggalAwal')) value="{{ request('tanggalAwal') }}" @endif>
            </div>
            <div class="flex flex-col gap-2 w-full">
              <label for="tanggalAkhir" class="text-slate-900 dark:text-white">Tanggal Akhir</label>
              <input type="date" name="tanggalAkhir" id="tanggalAkhir" required
                class="px-3 py-1 rounded-md text-slate-900 dark:text-white dark:bg-slate-900"
                @if (request('tanggalAkhir')) value="{{ request('tanggalAkhir') }}" @endif>
            </div>
            <div class="flex flex-col gap-2 w-full justify-end">
              <button type="submit" class="px-3 py-1 rounded-md text-white bg-green-500">pilih</button>
            </div>
          </div>
        </form>
      </div>
    </div>
    @if ($santris)
      <div class="my-3 text-center font-bold dark:text-white text-slate-900">
        <h3>{{ $title }}</h3>
        <h6>Mulai {{ date('d-m-Y', strtotime(request('tanggalAwal'))) }} sampai
          {{ date('d-m-Y', strtotime(request('tanggalAkhir'))) }}</h6>
      </div>
      <form action="/download/presensi/{{ request('lembaga')->id }}" method="POST">
        @csrf
        <input type="hidden" name="tanggalAwal" value="{{ request('tanggalAwal') }}">
        <input type="hidden" name="tanggalAkhir" value="{{ request('tanggalAkhir') }}">
        <input type="hidden" name="lembaga_id" value="{{ request('lembaga')->id }}">
        <input type="hidden" name="pelajaran_id" value="{{ request('pelajaran_id') }}">
        <input type="hidden" name="kelas_id" value="{{ request('kelas_id') }}">
        <input type="hidden" name="title" value="{{ $title }}">
        <button type="submit" class="px-3 py-1 rounded-md bg-violet-500 text-white my-2">Download</button>
      </form>

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
                @switch(request('lembaga')->jenis_lembaga)
                  @case('FORMAL')
                    @foreach ($kelass as $kls)
                      @if ($santri->kelas_formal_id == $kls->id)
                        {{ $kls->nama }}
                      @endif
                    @endforeach
                  @break

                  @case('MADIN')
                    @foreach ($kelass as $kls)
                      @if ($santri->kelas_madin_id == $kls->id)
                        {{ $kls->nama }}
                      @endif
                    @endforeach
                  @break

                  @case('TPQ')
                    @foreach ($kelass as $kls)
                      @if ($santri->kelas_tpq_id == $kls->id)
                        {{ $kls->nama }}
                      @endif
                    @endforeach
                  @break

                  @case('ASRAMA')
                    @foreach ($kelass as $kls)
                      @if ($santri->kelas_asrama_id == $kls->id)
                        {{ $kls->nama }}
                      @endif
                    @endforeach
                  @break
                @endswitch
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
                            default:
                                # code...
                                break;
                        }
                    }
                }
              @endphp
              <td class="px-6 py-4">{{ $sakit }}</td>
              <td class="px-6 py-4">{{ $izin }}</td>
              <td class="px-6 py-4">{{ $alpha }}</td>
            </tr>
          @endforeach
        </tbody>
      </table>
    @endif
  </div>
@endsection
