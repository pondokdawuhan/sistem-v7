<div>
  <a href="/{{ $lembaga->id }}/{{ $role }}/raporLembaga"
    class="px-3 py-1 rounded-md bg-slate-500 text-white inline-block my-2" wire:navigate>Kembali</a>
  <div class="flex flex-col lg:flex-row gap-2">
    <div class="w-full lg:w-1/3 flex flex-col items-center dark:bg-slate-800 rounded-md p-4">
      @if ($user->dataUser->foto)
        <div class="w-20 h-20 rounded-full border overflow-hidden">
          <img src="{{ asset('storage/' . $user->dataUser->foto) }}" alt="gambar" class="">
        </div>
      @else
        <div class="w-20 h-20 rounded-full border overflow-hidden flex justify-center">
          <img src="/assets/images/default.jpg" alt="gambar" class="">
        </div>
      @endif
      <h4 class="mt-2 dark:text-white font-bold text-center uppercase">{{ $user->name }}</h4>
      <p class="dark:text-white">{{ $user->username }}</p>
    </div>

    <div class="w-full">
      <div class="w-full bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <ul
          class="flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200 rounded-t-lg bg-gray-50 dark:border-gray-700 dark:text-gray-400 dark:bg-gray-800"
          id="defaultTab" data-tabs-toggle="#defaultTabContent" role="tablist">
          <li class="me-2">
            <button id="formal-tab" data-tabs-target="#formal" type="button" role="tab" aria-controls="formal"
              aria-selected="true"
              class="inline-block p-4 text-blue-600 rounded-ss-lg hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-700 dark:text-blue-500">Jurnal
            </button>
          </li>
          <li class="me-2">
            <button id="madin-tab" data-tabs-target="#madin" type="button" role="tab" aria-controls="madin"
              aria-selected="false"
              class="inline-block p-4 hover:text-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-gray-300">Izin</button>
          </li>
          <li class="me-2">
            <button id="ekstra-tab" data-tabs-target="#ekstra" type="button" role="tab" aria-controls="ekstra"
              aria-selected="false"
              class="inline-block p-4 hover:text-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-gray-300">Jurnal
              Ekstra</button>
          </li>
          <li class="me-2">
            <button id="sholat-tab" data-tabs-target="#sholat" type="button" role="tab" aria-controls="sholat"
              aria-selected="false"
              class="inline-block p-4 hover:text-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-gray-300">Jurnal
              Sholat</button>
          </li>
          <li class="me-2">
            <button id="insidentil-tab" data-tabs-target="#insidentil" type="button" role="tab"
              aria-controls="insidentil" aria-selected="false"
              class="inline-block p-4 hover:text-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-gray-300">Jurnal
              insidentil</button>
          </li>
          <li class="me-2">
            <button id="presensiKegiatan-tab" data-tabs-target="#presensiKegiatan" type="button" role="tab"
              aria-controls="presensiKegiatan" aria-selected="false"
              class="inline-block p-4 hover:text-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-gray-300">Presensi
              Kegiatan</button>
          </li>
        </ul>
        <div id="defaultTabContent">
          <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="formal" role="tabpanel"
            aria-labelledby="formal-tab">
            @if ($jurnals)
              <div class="overflow-auto">
                <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 bg-opacity-85">
                  <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                    <tr>
                      <th scope="col" class="px-6 py-3">
                        No
                      </th>
                      <th scope="col" class="px-6 py-3">
                        Tanggal
                      </th>
                      <th scope="col" class="px-6 py-3">
                        Kelas
                      </th>
                      <th scope="col" class="px-6 py-3">
                        Mapel
                      </th>
                      <th scope="col" class="px-6 py-3">
                        Jam
                      </th>
                      <th scope="col" class="px-6 py-3">
                        Materi
                      </th>
                      <th scope="col" class="px-6 py-3">
                        Guru Piket
                      </th>
                    </tr>
                  </thead>
                  <tbody>

                    @foreach ($jurnals as $jurnal)
                      <tr
                        class="bg-white border-b  bg-opacity-85 dark:bg-slate-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="px-6 py-4">{{ $loop->index + $jurnals->firstItem() }}</td>
                        <td class="px-6 py-4">{{ date('d-m-Y H:i', strtotime($jurnal->created_at)) }}</td>
                        <td class="px-6 py-4">{{ $jurnal->kelas->nama }}</td>
                        <td class="px-6 py-4">{{ $jurnal->pelajaran->nama }}</td>
                        <td class="px-6 py-4">{{ $jurnal->jam }}</td>
                        <td class="px-6 py-4">{{ $jurnal->materi }}</td>
                        <td class="px-6 py-4">
                          @if ($jurnal->is_guru_piket == true)
                            Ya
                          @else
                            Tidak
                          @endif
                        </td>
                      </tr>
                    @endforeach
                  </tbody>
                </table>
                <div class="mt-3">
                  {{ $jurnals->links(data: ['scrollTo' => false]) }}
                </div>
              </div>
            @else
              <h4 class="text-red-500 italic">Jurnal tidak tersedia</h4>
            @endif
          </div>
          <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="madin" role="tabpanel"
            aria-labelledby="madin-tab">
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
                      Keperluan
                    </th>
                    <th scope="col" class="px-6 py-3">
                      Tanggal Mulai
                    </th>
                    <th scope="col" class="px-6 py-3">
                      Tanggal Selesai
                    </th>
                    <th scope="col" class="px-6 py-3">
                      Tugas
                    </th>
                    <th scope="col" class="px-6 py-3">
                      Cek Kepala Sekolah
                    </th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($izinAsatidz as $izin)
                    <tr
                      class="bg-white border-b  bg-opacity-85 dark:bg-slate-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                      <td class="px-6 py-4">{{ $loop->index + $page }}</td>
                      <td class="px-6 py-4"><a
                          href="/{{ $lembaga->id }}/{{ $role }}/izinAsatidz/detail/{{ $izin->user->username }}">{{ $izin->user->name }}</a>
                      </td>
                      <td class="px-6 py-4">{{ $izin->keperluan }}</td>
                      <td class="px-6 py-4">{{ date('d-m-Y H:i:s', strtotime($izin->tanggal_mulai)) }}</td>
                      <td class="px-6 py-4">{{ date('d-m-Y H:i:s', strtotime($izin->tanggal_selesai)) }}</td>
                      <td class="px-6 py-4">{!! $izin->tugas !!}</td>
                      <td>
                        @if ($izin->cek_kepala == true)
                          <span class="px-3 py-1 rounded-md bg-green-500 text-white">Sudah</span>
                        @else
                          <span class="px-3 py-1 rounded-md bg-red-500 text-white">Belum</span>
                        @endif
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
              <div class="dark:bg-slate-800 mb-3 p-2">
                {{ $izinAsatidz->links() }}
              </div>
            </div>
          </div>

          <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="ekstra" role="tabpanel"
            aria-labelledby="ekstra-tab">
            <div>
              <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 bg-opacity-85">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                  <tr>
                    <th scope="col" class="px-6 py-3">
                      No
                    </th>
                    <th scope="col" class="px-6 py-3">
                      Tanggal
                    </th>
                    <th scope="col" class="px-6 py-3">
                      Ekstra
                    </th>
                    </th>
                    <th scope="col" class="px-6 py-3">
                      Materi
                    </th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($jurnalEkstra as $jurnal)
                    <tr
                      class="bg-white border-b  bg-opacity-85 dark:bg-slate-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                      <td class="px-6 py-4">{{ $loop->index + $jurnalEkstra->firstItem() }}</td>
                      <td class="px-6 py-4">{{ date('d-m-Y', strtotime($jurnal->created_at)) }}</td>
                      <td class="px-6 py-4">{{ $jurnal->ekstrakurikuler->nama }}</td>
                      <td class="px-6 py-4">{{ $jurnal->materi }}</td>
                    </tr>
                  @endforeach
                </tbody>
              </table>

              <div class="mt-4 flex justify-end">
                {{ $jurnalEkstra->links() }}
              </div>
            </div>
          </div>

          <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="sholat" role="tabpanel"
            aria-labelledby="sholat-tab">
            <div>
              <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 bg-opacity-85">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                  <tr>
                    <th scope="col" class="px-6 py-3">
                      No
                    </th>
                    <th scope="col" class="px-6 py-3">
                      Tanggal
                    </th>
                    <th scope="col" class="px-6 py-3">
                      Kelas
                    </th>
                    <th scope="col" class="px-6 py-3">
                      Waktu
                    </th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($jurnalSholat as $jurnal)
                    <tr
                      class="bg-white border-b  bg-opacity-85 dark:bg-slate-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                      <td class="px-6 py-4">{{ $loop->index + $jurnalSholat->firstItem() }}</td>
                      <td class="px-6 py-4">{{ $jurnal->created_at->format('d-m-Y H:i') }}</td>
                      <td class="px-6 py-4">{{ $jurnal->kelas->nama }}</td>
                      <td class="px-6 py-4">{{ $jurnal->waktu }}</td>
                    </tr>
                  @endforeach
                </tbody>
              </table>

              <div class="mt-4 flex justify-end">
                {{ $jurnalSholat->links() }}
              </div>
            </div>
          </div>

          <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="insidentil" role="tabpanel"
            aria-labelledby="insidentil-tab">
            <div>
              <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 bg-opacity-85">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                  <tr>
                    <th scope="col" class="px-6 py-3">
                      No
                    </th>
                    <th scope="col" class="px-6 py-3">
                      Tanggal
                    </th>
                    <th scope="col" class="px-6 py-3">
                      Kelas
                    </th>
                    <th scope="col" class="px-6 py-3">
                      Kegiatan
                    </th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($jurnalInsidentil as $jurnal)
                    <tr
                      class="bg-white border-b  bg-opacity-85 dark:bg-slate-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                      <td class="px-6 py-4">{{ $loop->index + $jurnalInsidentil->firstItem() }}</td>
                      <td class="px-6 py-4">{{ $jurnal->created_at->format('d-m-Y H:i') }}</td>
                      <td class="px-6 py-4">{{ $jurnal->kelas->nama }}</td>
                      <td class="px-6 py-4">{{ $jurnal->kegiatan }}</td>
                    </tr>
                  @endforeach
                </tbody>
              </table>

              <div class="mt-4 flex justify-end">
                {{ $jurnalInsidentil->links() }}
              </div>
            </div>
          </div>
          
          <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="presensiKegiatan" role="tabpanel"
            aria-labelledby="presensiKegiatan-tab">
            <div>
              <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 bg-opacity-85">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                  <tr>
                    <th scope="col" class="px-6 py-3">
                      No
                    </th>
                    <th scope="col" class="px-6 py-3">
                      Tanggal
                    </th>
                    <th scope="col" class="px-6 py-3">
                      Kegiatan
                    </th>
                    <th scope="col" class="px-6 py-3">
                      Keterangan
                    </th>
                  </tr>
                </thead>
                <tbody>
                  @php
                    $i = request('page') ?? 1 * 20 - 19;
                  @endphp
                  @foreach ($presensiKegiatans as $presensi)
                    <tr
                      class="bg-white border-b  bg-opacity-85 dark:bg-slate-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                      <td class="px-6 py-4">{{ $loop->index + $presensiKegiatans->firstItem() }}</td>
                      <td class="px-6 py-4">{{ date('d-m-Y H:i', strtotime($presensi->created_at)) }}</td>
                      <td class="px-6 py-4">{{ $presensi->kegiatan }}</td>
                      <td class="px-6 py-4">{{ $presensi->keterangan }}</td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
              <div class="mt-4 flex justify-end">
                {{ $presensiKegiatans->links() }}
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>
