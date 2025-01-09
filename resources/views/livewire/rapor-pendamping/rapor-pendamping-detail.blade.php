<div>
  <a href="/{{ $lembaga->id }}/{{ $role }}/raporPendamping"
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
            <button id="presensiSholat-tab" data-tabs-target="#presensiSholat" type="button" role="tab"
              aria-controls="presensiSholat" aria-selected="true"
              class="inline-block p-4 text-blue-600 rounded-ss-lg hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-700 dark:text-blue-500">Presensi
              Sholat</button>
          </li>
          <li class="me-2">
            <button id="presensiKegiatan-tab" data-tabs-target="#presensiKegiatan" type="button" role="tab"
              aria-controls="presensiKegiatan" aria-selected="false"
              class="inline-block p-4 hover:text-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-gray-300">Presensi
              Kegiatan</button>
          </li>
          <li class="me-2">
            <button id="jurnalAsramaSantri-tab" data-tabs-target="#jurnalAsramaSantri" type="button" role="tab"
              aria-controls="jurnalAsramaSantri" aria-selected="false"
              class="inline-block p-4 hover:text-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-gray-300">Jurnal
              Asrama Santri</button>
          </li>
          <li class="me-2">
            <button id="jurnalSholatSantri-tab" data-tabs-target="#jurnalSholatSantri" type="button" role="tab"
              aria-controls="jurnalSholatSantri" aria-selected="false"
              class="inline-block p-4 hover:text-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-gray-300">Jurnal
              Sholat Santri</button>
          </li>
          <li class="me-2">
            <button id="jurnalInsidentilSantri-tab" data-tabs-target="#jurnalInsidentilSantri" type="button"
              role="tab" aria-controls="jurnalInsidentilSantri" aria-selected="false"
              class="inline-block p-4 hover:text-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-gray-300">Jurnal
              insidentil Santri</button>
          </li>
          <li class="me-2">
            <button id="pelanggaran-tab" data-tabs-target="#pelanggaran" type="button" role="tab"
              aria-controls="pelanggaran" aria-selected="false"
              class="inline-block p-4 hover:text-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-gray-300">Pelanggaran</button>
          </li>
          <li class="me-2">
            <button id="izin-keluar-tab" data-tabs-target="#izin-keluar" type="button" role="tab"
              aria-controls="izin-keluar" aria-selected="false"
              class="inline-block p-4 hover:text-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-gray-300">Izin
              Keluar</button>
          </li>
          <li class="me-2">
            <button id="izin-pulang-tab" data-tabs-target="#izin-pulang" type="button" role="tab"
              aria-controls="izin-pulang" aria-selected="false"
              class="inline-block p-4 hover:text-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-gray-300">Izin
              Pulang</button>
          </li>
        </ul>
        <div id="defaultTabContent">
          <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="presensiSholat" role="tabpanel"
            aria-labelledby="presensiSholat-tab">
            <div class="overflow-auto">
              <h5 class="dark:text-white text-center">Presensi Sholat Pendamping</h5>
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
                      Waktu
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
                  @foreach ($presensiSholats as $presensi)
                    <tr
                      class="bg-white border-b  bg-opacity-85 dark:bg-slate-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                      <td class="px-6 py-4">{{ $i++ }}</td>
                      <td class="px-6 py-4">{{ date('d-m-Y H:i', strtotime($presensi->created_at)) }}</td>
                      <td class="px-6 py-4">{{ $presensi->waktu }}</td>
                      <td class="px-6 py-4">{{ $presensi->keterangan }}</td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
              <div class="mt-3">
                {{ $presensiSholats->links(data: ['scrollTo' => false]) }}
              </div>
            </div>
          </div>
          <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="presensiKegiatan" role="tabpanel"
            aria-labelledby="presensiKegiatan-tab">
            <div class="overflow-auto">
              <h5 class="dark:text-white text-center">Presensi Kegiatan Pendamping</h5>
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
                      <td class="px-6 py-4">{{ $i++ }}</td>
                      <td class="px-6 py-4">{{ date('d-m-Y H:i', strtotime($presensi->created_at)) }}</td>
                      <td class="px-6 py-4">{{ $presensi->kegiatan }}</td>
                      <td class="px-6 py-4">{{ $presensi->keterangan }}</td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
              <div class="dark:bg-slate-800 mb-3 p-2">
                {{ $presensiKegiatans->links() }}
              </div>
            </div>
          </div>

          <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="jurnalAsramaSantri" role="tabpanel"
            aria-labelledby="jurnalAsramaSantri-tab">
            <div>
              <h5 class="dark:text-white text-center">Jurnal Presensi Asrama</h5>
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
                      Kelas/Kamar
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
                  @foreach ($jurnalAsramas as $presensi)
                    <tr
                      class="bg-white border-b  bg-opacity-85 dark:bg-slate-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                      <td class="px-6 py-4">{{ $i++ }}</td>
                      <td class="px-6 py-4">{{ date('d-m-Y H:i', strtotime($presensi->created_at)) }}</td>
                      <td class="px-6 py-4">{{ $presensi->kelas->nama }}</td>
                      <td class="px-6 py-4">{{ $presensi->kegiatan }}</td>
                      <td class="px-6 py-4">{{ $presensi->keterangan }}</td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
              <div class="mt-4 flex justify-end">
                {{ $jurnalAsramas->links() }}
              </div>
            </div>
          </div>

          <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="jurnalSholatSantri" role="tabpanel"
            aria-labelledby="jurnalSholatSantri-tab">
            <div>
              <h5 class="dark:text-white text-center">Jurnal Presensi Sholat</h5>
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
                      Kelas/Kamar
                    </th>
                    <th scope="col" class="px-6 py-3">
                      Waktu
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
                  @foreach ($jurnalSholats as $presensi)
                    <tr
                      class="bg-white border-b  bg-opacity-85 dark:bg-slate-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                      <td class="px-6 py-4">{{ $i++ }}</td>
                      <td class="px-6 py-4">{{ date('d-m-Y H:i', strtotime($presensi->created_at)) }}</td>
                      <td class="px-6 py-4">{{ $presensi->kelas->nama }}</td>
                      <td class="px-6 py-4">{{ $presensi->waktu }}</td>
                      <td class="px-6 py-4">{{ $presensi->keterangan }}</td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
              <div class="mt-4 flex justify-end">
                {{ $jurnalSholats->links() }}
              </div>
            </div>
          </div>

          <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="jurnalInsidentilSantri"
            role="tabpanel" aria-labelledby="jurnalInsidentilSantri-tab">
            <div>
              <h5 class="dark:text-white text-center">Jurnal Presensi Insidentil</h5>
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
                      Kelas/Kamar
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
                  @foreach ($jurnalInsidentils as $presensi)
                    <tr
                      class="bg-white border-b  bg-opacity-85 dark:bg-slate-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                      <td class="px-6 py-4">{{ $i++ }}</td>
                      <td class="px-6 py-4">{{ date('d-m-Y H:i', strtotime($presensi->created_at)) }}</td>
                      <td class="px-6 py-4">{{ $presensi->kelas->nama }}</td>
                      <td class="px-6 py-4">{{ $presensi->kegiatan }}</td>
                      <td class="px-6 py-4">{{ $presensi->keterangan }}</td>
                    </tr>
                  @endforeach
                </tbody>
              </table>

              <div class="mt-4 flex justify-end">
                {{ $jurnalInsidentils->links() }}
              </div>
            </div>
          </div>

          <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="pelanggaran" role="tabpanel"
            aria-labelledby="pelanggaran-tab">
            <div>
              <h5 class="dark:text-white text-center">Pelanggaran</h5>

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
                      Kategori
                    </th>
                    <th scope="col" class="px-6 py-3">
                      Keterangan
                    </th>
                    <th scope="col" class="px-6 py-3">
                      Poin
                    </th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($pelanggarans as $pelanggaran)
                    <tr
                      class="bg-white border-b  bg-opacity-85 dark:bg-slate-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                      <td class="px-6 py-4">{{ $loop->iteration }}</td>
                      <td class="px-6 py-4">{{ date('d-m-Y', strtotime($pelanggaran->tanggal)) }}</td>
                      <td class="px-6 py-4">{{ $pelanggaran->referensiPoin->name }}</td>
                      <td class="px-6 py-4">{{ $pelanggaran->keterangan }}</td>
                      <td class="px-6 py-4">{{ $pelanggaran->poin }}</td>

                    </tr>
                  @endforeach
                </tbody>
              </table>
              <div class="mt-4 flex justify-end">
                {{ $pelanggarans->links() }}
              </div>
            </div>
          </div>

          <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="izin-keluar" role="tabpanel"
            aria-labelledby="izin-keluar-tab">
            <div>
              <h5 class="dark:text-white text-center">Izin Keluar</h5>


              <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 bg-opacity-85">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                  <tr>
                    <th scope="col" class="px-6 py-3">
                      No
                    </th>
                    <th scope="col" class="px-6 py-3">
                      Keperluan
                    </th>
                    <th scope="col" class="px-6 py-3">
                      Waktu Mulai
                    </th>
                    <th scope="col" class="px-6 py-3">
                      Waktu Selesai
                    </th>
                    <th scope="col" class="px-6 py-3">
                      Cek Satpam
                    </th>
                    <th scope="col" class="px-6 py-3">
                      Status
                    </th>
                    <th scope="col" class="px-6 py-3">
                      Waktu Kembali
                    </th>
                  </tr>
                </thead>
                <tbody>
                  @php
                    $i = (request('page') ?? 1) * 20 - 19;
                  @endphp
                  @foreach ($izinKeluars as $izin)
                    <tr
                      class="bg-white border-b  bg-opacity-85 dark:bg-slate-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                      <td class="px-6 py-4">{{ $i++ }}</td>
                      <td class="px-6 py-4">{{ $izin->keperluan }}</td>
                      <td class="px-6 py-4">{{ date('d-m-Y H:i:s', strtotime($izin->waktu_mulai)) }}</td>
                      <td class="px-6 py-4">{{ date('d-m-Y H:i:s', strtotime($izin->waktu_selesai)) }}</td>
                      <td>
                        @if ($izin->cek_satpam == true)
                          <span class="px-3 py-1 rounded-md bg-green-500 text-white">Sudah</span>
                        @else
                          <span class="px-3 py-1 rounded-md bg-red-500 text-white">Belum</span>
                        @endif
                      </td>
                      <td class="px-6 py-4">

                        @if ($izin->waktu_selesai > time() && $izin->waktu_kembali == null)
                          <span class="px-3 py-1 rounded-md bg-green-500 text-white">Berlaku</span>
                        @else
                          <span class="px-3 py-1 rounded-md bg-slate-500 text-white">Kadaluarsa</span>
                        @endif
                      </td>
                      <td class="px-6 py-4">
                        @if ($izin->waktu_kembali)
                          {{ date('d-m-Y H:i:s', strtotime($izin->waktu_kembali)) }} @if ($izin->waktu_kembali < $izin->waktu_selesai)
                            <span class="px-3 py-1 rounded-md bg-green-500 text-white mt-2 inline-block">Tepat</span>
                          @else
                            <span class="px-3 py-1 rounded-md bg-red-500 text-white mt-2 inline-block">Terlambat</span>
                          @endif
                        @endif
                      </td>

                    </tr>
                  @endforeach
                </tbody>
              </table>
              <div class="mt-4 flex justify-end">
                {{ $izinKeluars->links() }}
              </div>
            </div>
          </div>

          <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="izin-pulang" role="tabpanel"
            aria-labelledby="izin-pulang-tab">
            <div>
              <h5 class="dark:text-white text-center">Izin Pulang</h5>

              <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 bg-opacity-85">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                  <tr>
                    <th scope="col" class="px-6 py-3">
                      No
                    </th>
                    <th scope="col" class="px-6 py-3">
                      Keperluan
                    </th>
                    <th scope="col" class="px-6 py-3">
                      Waktu Mulai
                    </th>
                    <th scope="col" class="px-6 py-3">
                      Waktu Selesai
                    </th>
                    <th scope="col" class="px-6 py-3">
                      Persetujuan Pengasuh
                    </th>
                    <th scope="col" class="px-6 py-3">
                      Cek Satpam
                    </th>
                    <th scope="col" class="px-6 py-3">
                      Status
                    </th>
                    <th scope="col" class="px-6 py-3">
                      Waktu Kembali
                    </th>
                  </tr>
                </thead>
                <tbody>
                  @php
                    $i = (request('page') ?? 1) * 20 - 19;
                  @endphp
                  @foreach ($izinPulangs as $izin)
                    <tr
                      class="bg-white border-b  bg-opacity-85 dark:bg-slate-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                      <td class="px-6 py-4">{{ $i++ }}</td>
                      <td class="px-6 py-4">{{ $izin->keperluan }}</td>
                      <td class="px-6 py-4">{{ date('d-m-Y H:i:s', strtotime($izin->waktu_mulai)) }}</td>
                      <td class="px-6 py-4">{{ date('d-m-Y H:i:s', strtotime($izin->waktu_selesai)) }}</td>
                      <td>

                        <span
                          class="px-3 py-1 rounded-md @if ($izin->persetujuan_pengasuh == 'Ya') bg-green-500 @else bg-red-500 @endif text-white">{{ $izin->persetujuan_pengasuh }}</span>
                      </td>
                      <td>
                        @if ($izin->cek_satpam == true)
                          <span class="px-3 py-1 rounded-md bg-green-500 text-white">Sudah</span>
                        @else
                          <span class="px-3 py-1 rounded-md bg-red-500 text-white">Belum</span>
                        @endif
                      </td>
                      <td class="px-6 py-4">

                        @if (strtotime($izin->waktu_selesai) > time() && $izin->waktu_kembali == null)
                          <span class="px-3 py-1 rounded-md bg-green-500 text-white">Berlaku</span>
                        @else
                          <span class="px-3 py-1 rounded-md bg-slate-500 text-white">Kadaluarsa</span>
                        @endif
                      </td>
                      <td class="px-6 py-4">
                        @if ($izin->waktu_kembali)
                          {{ date('d-m-Y H:i:s', strtotime($izin->waktu_kembali)) }}
                          @if (strtotime($izin->waktu_kembali) < strtotime($izin->waktu_selesai))
                            <span class="px-3 py-1 rounded-md bg-green-500 text-white mt-2 inline-block">Tepat</span>
                          @else
                            <span class="px-3 py-1 rounded-md bg-red-500 text-white mt-2 inline-block">Terlambat</span>
                          @endif
                        @endif
                      </td>

                    </tr>
                  @endforeach
                </tbody>
              </table>
              <div class="mt-4 flex justify-end">
                {{ $izinPulangs->links() }}
              </div>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>
</div>
