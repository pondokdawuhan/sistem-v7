<div class="" x-data="{ openModal: false }">
  <a href="/raporSantri/{{ $kelas }}/{{ $role }}"
    class="px-3 py-1 rounded-md bg-slate-500 text-white inline-block my-2" wire:navigate>Kembali</a>
  <div class="flex flex-col lg:flex-row gap-2">
    <div class="w-full lg:w-1/3 flex flex-col items-center dark:bg-slate-800 rounded-md p-4">
      @if ($santri->dataSantri->foto)
        <div class="w-20 h-20 rounded-full border overflow-hidden">
          <img src="{{ asset('storage/' . $santri->dataSantri->foto) }}" alt="gambar" class="">
        </div>
      @else
        <div class="w-20 h-20 rounded-full border overflow-hidden flex justify-center">
          <img src="/assets/images/default.jpg" alt="gambar" class="">
        </div>
      @endif
      <h4 class="mt-2 dark:text-white font-bold text-center uppercase">{{ $santri->name }}</h4>
      <p class="dark:text-white">{{ $santri->username }}</p>

      <table class="dark:text-white w-full">
        <tr>
          <td class="px-3 py-1 text-xs">Kelas Formal</td>
          <td class="px-3 py-1 text-xs">: {{ $kelasFormal->nama ?? '' }} ({{ $kelasFormal->user->name ?? '' }})</td>
        </tr>
        <tr>
          <td class="px-3 py-1 text-xs">Kelas Madin</td>
          <td class="px-3 py-1 text-xs">: {{ $kelasMadin->nama ?? '' }} ({{ $kelasMadin->user->name ?? '' }})</td>
        </tr>
        <tr>
          <td class="px-3 py-1 text-xs">Kelas MMQ</td>
          <td class="px-3 py-1 text-xs">: {{ $kelasMmq->nama ?? '' }} ({{ $kelasMmq->user->name ?? '' }})</td>
        </tr>
        <tr>
          <td class="px-3 py-1 text-xs">Kamar</td>
          <td class="px-3 py-1 text-xs">: {{ $kamar->nama ?? '' }} ({{ $kamar->user->name ?? '' }})</td>
        </tr>
      </table>

    </div>

    <div class="w-full">
      <div class="w-full bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
        <ul
          class="flex flex-wrap text-sm font-medium text-center text-gray-500 border-b border-gray-200 rounded-t-lg bg-gray-50 dark:border-gray-700 dark:text-gray-400 dark:bg-gray-800"
          id="defaultTab" data-tabs-toggle="#defaultTabContent" role="tablist">
          <li class="me-2">
            <button id="formal-tab" data-tabs-target="#formal" type="button" role="tab" aria-controls="formal"
              aria-selected="true"
              class="inline-block p-4 text-blue-600 rounded-ss-lg hover:bg-gray-100 dark:bg-gray-800 dark:hover:bg-gray-700 dark:text-blue-500">Formal</button>
          </li>
          <li class="me-2">
            <button id="madin-tab" data-tabs-target="#madin" type="button" role="tab" aria-controls="madin"
              aria-selected="false"
              class="inline-block p-4 hover:text-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-gray-300">Madin</button>
          </li>
          <li class="me-2">
            <button id="mmq-tab" data-tabs-target="#mmq" type="button" role="tab" aria-controls="mmq"
              aria-selected="false"
              class="inline-block p-4 hover:text-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-gray-300">MMQ</button>
          </li>
          <li class="me-2">
            <button id="sholat-tab" data-tabs-target="#sholat" type="button" role="tab" aria-controls="sholat"
              aria-selected="false"
              class="inline-block p-4 hover:text-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-gray-300">Sholat</button>
          </li>
          <li class="me-2">
            <button id="asrama-tab" data-tabs-target="#asrama" type="button" role="tab" aria-controls="asrama"
              aria-selected="false"
              class="inline-block p-4 hover:text-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-gray-300">Asrama</button>
          </li>
          <li class="me-2">
            <button id="insidentil-tab" data-tabs-target="#insidentil" type="button" role="tab"
              aria-controls="insidentil" aria-selected="false"
              class="inline-block p-4 hover:text-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-gray-300">Insidentil</button>
          </li>
          <li class="me-2">
            <button id="ekstra-tab" data-tabs-target="#ekstra" type="button" role="tab" aria-controls="ekstra"
              aria-selected="false"
              class="inline-block p-4 hover:text-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-gray-300">Ekstra</button>
          </li>
          <li class="me-2">
            <button id="pelanggaran-tab" data-tabs-target="#pelanggaran" type="button" role="tab"
              aria-controls="pelanggaran" aria-selected="false"
              class="inline-block p-4 hover:text-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-gray-300">Pelanggaran</button>
          </li>
          <li class="me-2">
            <button id="penanganan-tab" data-tabs-target="#penanganan" type="button" role="tab"
              aria-controls="penanganan" aria-selected="false"
              class="inline-block p-4 hover:text-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-gray-300">Penanganan</button>
          </li>
          <li class="me-2">
            <button id="prestasi-tab" data-tabs-target="#prestasi" type="button" role="tab"
              aria-controls="prestasi" aria-selected="false"
              class="inline-block p-4 hover:text-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-gray-300">Prestasi</button>
          </li>
          <li class="me-2">
            <button id="keluar-tab" data-tabs-target="#keluar" type="button" role="tab" aria-controls="keluar"
              aria-selected="false"
              class="inline-block p-4 hover:text-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-gray-300">Izin
              Keluar</button>
          </li>
          <li class="me-2">
            <button id="pulang-tab" data-tabs-target="#pulang" type="button" role="tab" aria-controls="pulang"
              aria-selected="false"
              class="inline-block p-4 hover:text-gray-600 hover:bg-gray-100 dark:hover:bg-gray-700 dark:hover:text-gray-300">Izin
              Pulang</button>
          </li>
        </ul>
        <div id="defaultTabContent" class="overflow-auto">
          <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="formal" role="tabpanel"
            aria-labelledby="formal-tab">

            @if (!$santri->kelas_formal_id)
              <h5 class="text-center text-red-500">Data Kelas Formal tidak tersedia</h5>
            @else
              <h4 class="text-center dark:text-white mb-2">Rekap Presensi</h4>
              <div id="chartPresensi" class="bg-white"></div>
              <h4 class="text-center dark:text-white my-2">Rekap Presensi By Pelajaran</h4>
              <div id="chartPresensibyPelajaran" class="bg-white"></div>
              <h4 class="text-center dark:text-white my-2">Rekap Presensi By Hari</h4>
              <div id="chartPresensibyHari" class="bg-white"></div>
            @endif
          </div>
          <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="madin" role="tabpanel"
            aria-labelledby="madin-tab">
            @if (!$santri->kelas_madin_id)
              <h5 class="text-center text-red-500">Data Kelas Madin tidak tersedia</h5>
            @else
              <h4 class="text-center dark:text-white mb-2">Rekap Presensi</h4>
              <div id="chartPresensiMadin" class="bg-white"></div>
              <h4 class="text-center dark:text-white my-2">Rekap Presensi By Pelajaran</h4>
              <div id="chartPresensibyPelajaranMadin" class="bg-white"></div>
              <h4 class="text-center dark:text-white my-2">Rekap Presensi By Hari</h4>
              <div id="chartPresensibyHariMadin" class="bg-white"></div>
            @endif
          </div>
          <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="mmq" role="tabpanel"
            aria-labelledby="mmq-tab">
            @if (!$santri->kelas_tpq_id)
              <h5 class="text-center text-red-500">Data Kelas MMQ tidak tersedia</h5>
            @else
              <h4 class="text-center dark:text-white mb-2">Rekap Presensi</h4>
              <div id="chartPresensiMmq" class="bg-white"></div>
              <h4 class="text-center dark:text-white my-2">Rekap Presensi By Pelajaran</h4>
              <div id="chartPresensibyPelajaranMmq" class="bg-white"></div>
              <h4 class="text-center dark:text-white my-2">Rekap Presensi By Hari</h4>
              <div id="chartPresensibyHariMmq" class="bg-white"></div>
            @endif
          </div>
          <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="sholat" role="tabpanel"
            aria-labelledby="sholat-tab">
            <h4 class="text-center dark:text-white mb-2">Rekap Presensi Sholat</h4>
            <div id="chartPresensiSholat" class="bg-white"></div>
          </div>
          <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="asrama" role="tabpanel"
            aria-labelledby="asrama-tab">
            <h2 class="mb-5 text-2xl font-extrabold tracking-tight text-gray-900 dark:text-white">Asrama</h2>

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
                      Kegiatan
                    </th>
                    <th scope="col" class="px-6 py-3">
                      Keterangan
                    </th>
                    </th>
                    <th scope="col" class="px-6 py-3">
                      Penanggungjawab
                    </th>

                  </tr>
                </thead>
                <tbody>
                  @foreach ($presensiAsrama as $presensi)
                    <tr
                      class="bg-white border-b  bg-opacity-85 dark:bg-slate-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                      <td class="px-6 py-4">{{ $loop->index + $presensiAsrama->firstItem() }}</td>
                      <td class="px-6 py-4">{{ $presensi->created_at->format('d-m-Y') }}</td>
                      <td class="px-6 py-4">{{ $presensi->kegiatan }}</td>
                      <td class="px-6 py-4">{{ $presensi->keterangan }}</td>
                      <td class="px-6 py-4">{{ $presensi->user->name }}</td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            {{ $presensiAsrama->links() }}

          </div>
          <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="insidentil" role="tabpanel"
            aria-labelledby="insidentil-tab">
            <h2 class="mb-5 text-2xl font-extrabold tracking-tight text-gray-900 dark:text-white">Insidentil</h2>

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
                      Lembaga
                    </th>
                    <th scope="col" class="px-6 py-3">
                      Kegiatan
                    </th>
                    <th scope="col" class="px-6 py-3">
                      Keterangan
                    </th>
                    </th>
                    <th scope="col" class="px-6 py-3">
                      Penanggungjawab
                    </th>

                  </tr>
                </thead>
                <tbody>
                  @foreach ($presensiInsidentils as $presensi)
                    <tr
                      class="bg-white border-b  bg-opacity-85 dark:bg-slate-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                      <td class="px-6 py-4">{{ $loop->index + $presensiInsidentils->firstItem() }}</td>
                      <td class="px-6 py-4">{{ $presensi->created_at->format('d-m-Y') }}</td>
                      <td class="px-6 py-4">{{ $presensi->lembaga->nama_singkat }}</td>
                      <td class="px-6 py-4">{{ $presensi->kegiatan }}</td>
                      <td class="px-6 py-4">{{ $presensi->keterangan }}</td>
                      <td class="px-6 py-4">{{ $presensi->user->name }}</td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            {{ $presensiInsidentils->links() }}

          </div>
          <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="ekstra" role="tabpanel"
            aria-labelledby="ekstra-tab">
            <h2 class="mb-5 text-2xl font-extrabold tracking-tight text-gray-900 dark:text-white">Esktrakurikuler</h2>

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
                      Ekstra
                    </th>
                    <th scope="col" class="px-6 py-3">
                      Keterangan
                    </th>
                    </th>
                    <th scope="col" class="px-6 py-3">
                      Penanggungjawab
                    </th>

                  </tr>
                </thead>
                <tbody>
                  @foreach ($presensiEkstras as $presensi)
                    <tr
                      class="bg-white border-b  bg-opacity-85 dark:bg-slate-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                      <td class="px-6 py-4">{{ $loop->index + $presensiEkstras->firstItem() }}</td>
                      <td class="px-6 py-4">{{ $presensi->created_at->format('d-m-Y') }}</td>
                      <td class="px-6 py-4">{{ $presensi->ekstrakurikuler->nama }}</td>
                      <td class="px-6 py-4">{{ $presensi->keterangan }}</td>
                      <td class="px-6 py-4">{{ $presensi->user->name }}</td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            {{ $presensiEkstras->links() }}

          </div>
          <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="pelanggaran" role="tabpanel"
            aria-labelledby="pelanggaran-tab">
            <div class=" overflow-auto">
              <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 bg-opacity-85">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                  <tr>
                    <th scope="col" class="p-3">
                      No
                    </th>
                    <th scope="col" class="p-3">
                      Lembaga
                    </th>
                    <th scope="col" class="p-3">
                      Tanggal
                    </th>
                    <th scope="col" class="p-3">
                      Kategori
                    </th>
                    <th scope="col" class="p-3">
                      Keterangan
                    </th>
                    <th scope="col" class="p-3">
                      Poin
                    </th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($pelanggarans as $pelanggaran)
                    <tr
                      class="bg-white border-b  bg-opacity-85 dark:bg-slate-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                      <td class="p-3">{{ $loop->index + $pelanggarans->firstItem() }}</td>
                      <td class="p-3">{{ $pelanggaran->lembaga->nama_singkat ?? '' }}</td>
                      <td class="p-3">{{ date('d-m-Y', strtotime($pelanggaran->tanggal)) }}</td>
                      <td class="p-3">{{ $pelanggaran->referensiPoin->name }}</td>
                      <td class="p-3">{{ $pelanggaran->keterangan }}</td>
                      <td class="p-3">{{ $pelanggaran->poin }}</td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            {{ $pelanggarans->links() }}
          </div>
          <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="penanganan" role="tabpanel"
            aria-labelledby="penanganan-tab">
            <div class="overflow-auto">
              <table
                class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 bg-opacity-85 overflow-auto">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                  <tr>
                    <th scope="col" class="px-6 py-3">
                      No
                    </th>
                    <th scope="col" class="px-6 py-3">
                      Lembaga
                    </th>
                    <th scope="col" class="px-6 py-3">
                      Tanggal
                    </th>
                    <th scope="col" class="px-6 py-3">
                      Permasalahan
                    </th>
                    <th scope="col" class="px-6 py-3">
                      Pembinaan
                    </th>
                    <th scope="col" class="px-6 py-3">
                      Tindak Lanjut
                    </th>
                    <th scope="col" class="px-6 py-3">
                      Penanggungjawab
                    </th>
                    <th scope="col" class="px-6 py-3">
                      Bukti Foto
                    </th>
                    <th scope="col" class="px-6 py-3">
                      Surat Pernyataan
                    </th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($pembinaans as $pembinaan)
                    <tr
                      class="bg-white border-b  bg-opacity-85 dark:bg-slate-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                      <td class="px-6 py-4">{{ $loop->index + $pembinaans->firstItem() }}</td>
                      <td class="px-6 py-4">{{ $pembinaan->lembaga->nama_singkat }}</td>
                      <td class="px-6 py-4">{{ date('d-m-Y', strtotime($pembinaan->tanggal)) }}</td>
                      <td class="px-6 py-4">{{ $pembinaan->permasalahan }}</td>
                      <td class="px-6 py-4">{{ $pembinaan->pembinaan }}</td>
                      <td class="px-6 py-4">{{ $pembinaan->tindak_lanjut }}</td>
                      <td class="px-6 py-4">{{ $pembinaan->user->name }} ({{ $pembinaan->sebagai }})</td>
                      <td class="px-6 py-4"><button type="button" x-on:click="openModal=!openModal"
                          wire:click='lihatBukti({{ $pembinaan->id }})'
                          class="mt-2 text-white bg-violet-500 rounded-lg text-xs px-3 py-1 inline-block cursor-pointer mb-2">Lihat</button>
                      </td>
                      <td class="px-6 py-4">
                        @if ($pembinaan->surat)
                          <button type="button" x-on:click="openModal=!openModal"
                            wire:click='lihatSurat({{ $pembinaan->id }})'
                            class="mt-2 text-white bg-violet-500 rounded-lg text-xs px-3 py-1 inline-block cursor-pointer mb-2">Lihat</button>
                        @endif
                      </td>

                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
            {{ $pembinaans->links() }}
          </div>
          <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="prestasi" role="tabpanel"
            aria-labelledby="prestasi-tab">
            <div class="overflow-auto">
              <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 bg-opacity-85">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                  <tr>
                    <th scope="col" class="px-6 py-3">
                      No
                    </th>
                    <th scope="col" class="px-6 py-3">
                      Lembaga
                    </th>
                    <th scope="col" class="px-6 py-3">
                      Tanggal
                    </th>
                    <th scope="col" class="px-6 py-3">
                      Nama
                    </th>
                    <th scope="col" class="px-6 py-3">
                      Prestasi
                    </th>
                    <th scope="col" class="px-6 py-3">
                      Penghargaan
                    </th>
                    <th scope="col" class="px-6 py-3">
                      Aksi
                    </th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($penghargaans as $penghargaan)
                    <tr
                      class="bg-white border-b  bg-opacity-85 dark:bg-slate-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                      <td class="px-6 py-4">{{ $loop->index + $penghargaans->firstItem() }}</td>
                      <td class="px-6 py-4">{{ $penghargaan->lembaga->nama_singkat }}</td>
                      <td class="px-6 py-4">{{ date('d-m-Y', strtotime($penghargaan->tanggal)) }}</td>
                      <td class="px-6 py-4"><a wire:navigate
                          href="/{{ $lembaga }}/{{ $role }}/penghargaanSantri/detail/{{ $penghargaan->santri->username }}">{{ $penghargaan->santri->name }}</a>
                      </td>
                      <td class="px-6 py-4">{{ $penghargaan->prestasi }}</td>
                      <td class="px-6 py-4">{{ $penghargaan->penghargaan }}</td>
                      <td class="px-6 py-4">
                        <a wire:navigate
                          href="/{{ $lembaga }}/{{ $role }}/penghargaanSantri/{{ $penghargaan->id }}/edit"
                          class="px-3 py-1 rounded-md bg-amber-500 text-white inline-block mb-2 text-xs">Edit</a>
                        <button class="px-3 py-1 rounded-md bg-red-500 text-white text-xs"
                          wire:click='delete({{ $penghargaan->id }})'
                          wire:confirm='Apakah anda yakin menghapus penghargaan ini?'>Hapus</button>
                      </td>
                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>

          <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="keluar" role="tabpanel"
            aria-labelledby="keluar-tab">

            <div class="overflow-auto">
              <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 bg-opacity-85">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                  <tr>
                    <th scope="col" class="p-3">
                      No
                    </th>
                    <th scope="col" class="p-3">
                      Keperluan
                    </th>
                    <th scope="col" class="p-3">
                      Waktu Mulai
                    </th>
                    <th scope="col" class="p-3">
                      Waktu Selesai
                    </th>
                    <th scope="col" class="p-3">
                      Cek Satpam
                    </th>
                    <th scope="col" class="p-3">
                      Status
                    </th>
                    <th scope="col" class="p-3">
                      Waktu Kembali
                    </th>
                    <th scope="col" class="p-3">
                      Penanggungjawab
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

                      <td class="p-3">{{ $loop->index + $izinKeluars->firstItem() }}</td>
                      <td class="p-3">{{ $izin->keperluan }}</td>
                      <td class="p-3">{{ date('d-m-Y H:i:s', strtotime($izin->waktu_mulai)) }}</td>
                      <td class="p-3">{{ date('d-m-Y H:i:s', strtotime($izin->waktu_selesai)) }}</td>
                      <td>
                        @if ($izin->cek_satpam == true)
                          <span class="px-3 py-1 rounded-md bg-green-500 text-white">Sudah</span>
                        @else
                          <span class="px-3 py-1 rounded-md bg-red-500 text-white">Belum</span>
                        @endif
                      </td>
                      <td class="p-3">

                        @if ($izin->waktu_selesai > time() && $izin->waktu_kembali == null)
                          <span class="px-3 py-1 rounded-md bg-green-500 text-white">Berlaku</span>
                        @else
                          <span class="px-3 py-1 rounded-md bg-slate-500 text-white">Kadaluarsa</span>
                        @endif
                      </td>
                      <td class="p-3">
                        @if ($izin->waktu_kembali)
                          <p>{{ date('d-m-Y H:i:s', strtotime($izin->waktu_kembali)) }}</p>
                          @if ($izin->waktu_kembali < $izin->waktu_selesai)
                            <div class="px-3 py-1 rounded-md bg-green-500 text-white mt-2 inline-block">Tepat</div>
                          @else
                            <div class="px-3 py-1 rounded-md bg-red-500 text-white mt-2 inline-block">Terlambat</div>
                          @endif
                        @endif
                      </td>
                      <td class="p-3">{{ $izin->user->name }}</td>

                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>

          <div class="hidden p-4 bg-white rounded-lg md:p-8 dark:bg-gray-800" id="pulang" role="tabpanel"
            aria-labelledby="pulang-tab">

            <div class="overflow-auto">
              <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 bg-opacity-85">
                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                  <tr>
                    <th scope="col" class="p-3">
                      No
                    </th>
                    <th scope="col" class="p-3">
                      Keperluan
                    </th>
                    <th scope="col" class="p-3">
                      Waktu Mulai
                    </th>
                    <th scope="col" class="p-3">
                      Waktu Selesai
                    </th>
                    <th scope="col" class="p-3">
                      Persetujuan Pengasuh
                    </th>
                    <th scope="col" class="p-3">
                      Cek Satpam
                    </th>
                    <th scope="col" class="p-3">
                      Status
                    </th>
                    <th scope="col" class="p-3">
                      Waktu Kembali
                    </th>
                    <th scope="col" class="p-3">
                      Penanggungjawab
                    </th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($izinPulangs as $izin)
                    <tr
                      class="bg-white border-b  bg-opacity-85 dark:bg-slate-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                      <td class="p-3">{{ $loop->index + $izinPulangs->firstItem() }}</td>
                      <td class="p-3">{{ $izin->keperluan }}</td>
                      <td class="p-3">{{ date('d-m-Y H:i:s', strtotime($izin->waktu_mulai)) }}</td>
                      <td class="p-3">{{ date('d-m-Y H:i:s', strtotime($izin->waktu_selesai)) }}</td>
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
                      <td class="p-3">

                        @if (strtotime($izin->waktu_selesai) > time() && $izin->waktu_kembali == null)
                          <span class="px-3 py-1 rounded-md bg-green-500 text-white">Berlaku</span>
                        @else
                          <span class="px-3 py-1 rounded-md bg-slate-500 text-white">Kadaluarsa</span>
                        @endif
                      </td>
                      <td class="p-3">
                        @if ($izin->waktu_kembali)
                          {{ date('d-m-Y H:i:s', strtotime($izin->waktu_kembali)) }}
                          @if (strtotime($izin->waktu_kembali) < strtotime($izin->waktu_selesai))
                            <span class="px-3 py-1 rounded-md bg-green-500 text-white mt-2 inline-block">Tepat</span>
                          @else
                            <span class="px-3 py-1 rounded-md bg-red-500 text-white mt-2 inline-block">Terlambat</span>
                          @endif
                        @endif
                      </td>
                      <td class="p-3">{{ $izin->user->name }}</td>

                    </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>

      </div>
    </div>


    <div id="crud-modal" tabindex="-1" aria-hidden="true" x-show="openModal"
      class="overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full h-screen bg-slate-500/50">
      <div class="relative p-4 w-full h-screen flex justify-center items-center top-5">
        <!-- Modal content -->
        <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
          <!-- Modal header -->
          <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
            <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
              {{ $titleModal }}
            </h3>
            <button type="button" x-on:click="openModal = false"
              class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
              data-modal-toggle="crud-modal">
              <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                viewBox="0 0 14 14">
                <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                  d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
              </svg>
              <span class="sr-only">Close modal</span>
            </button>
          </div>
          <!-- Modal body -->
          <div class="flex justify-center items-center p-5">
            <img src="{{ $bukti }}" alt="bukti" class=" lg:w-1/2 max-h-screen">
          </div>
        </div>
      </div>
    </div>

    {{-- javascipt formal start --}}
    @script()
      <script>
        const presensiFormal = JSON.parse(`<?= $presensiFormal ?>`)
        let options = {
          series: [{
              name: "Sakit",
              data: presensiFormal[0]
            },
            {
              name: "Izin",
              data: presensiFormal[1]
            }, {
              name: "Alpha",
              data: presensiFormal[2]
            }
          ],
          chart: {
            height: 350,
            type: 'line',
          },
          colors: ['#42f5b9', '#f5da42', '#f54242'],
          dataLabels: {
            enabled: true,
          },
          stroke: {
            curve: 'smooth'
          },
          grid: {
            borderColor: '#e7e7e7',
            row: {
              colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
              opacity: 0.5
            },
          },
          markers: {
            size: 1
          },
          xaxis: {
            categories: ['Jul', 'Aug', 'Sep', 'Okt', 'Nov', 'Des', 'Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun'],
            title: {
              text: 'Bulan'
            }
          },
          yaxis: {
            title: {
              text: 'jam'
            }
          },
          tooltip: {
            y: {
              formatter: function(val) {
                return val + " jam"
              }
            }
          }

        };

        let chart = new ApexCharts(document.querySelector("#chartPresensi"), options);
        chart.render();
      </script>
    @endscript

    @script()
      <script>
        const pelajaranFormal = JSON.parse(`<?= $pelajaranFormal ?>`)
        const presensiFormalPelajaran = JSON.parse(`<?= $presensiFormalPelajaran ?>`)


        var options = {
          series: [{
            name: 'Sakit',
            data: presensiFormalPelajaran[0]
          }, {
            name: 'Izin',
            data: presensiFormalPelajaran[1]
          }, {
            name: 'Alpha',
            data: presensiFormalPelajaran[2]
          }],
          chart: {
            type: 'bar',
            height: 350
          },
          plotOptions: {
            bar: {
              horizontal: false,
              columnWidth: '55%',
              endingShape: 'rounded'
            },
          },
          dataLabels: {
            enabled: false
          },
          stroke: {
            show: true,
            width: 2,
            colors: ['transparent']
          },
          xaxis: {
            categories: pelajaranFormal,
          },
          yaxis: {
            title: {
              text: 'jam'
            }
          },
          fill: {
            opacity: 1
          },
          tooltip: {
            y: {
              formatter: function(val) {
                return val + " jam"
              }
            }
          }
        };

        var chart = new ApexCharts(document.querySelector("#chartPresensibyPelajaran"), options);
        chart.render();
      </script>
    @endscript

    @script()
      <script>
        const presensiFormalHari = JSON.parse(`<?= $presensiFormalHari ?>`)

        var options = {
          series: [{
            name: 'Sakit',
            data: presensiFormalHari[0]
          }, {
            name: 'Izin',
            data: presensiFormalHari[1]
          }, {
            name: 'Alpha',
            data: presensiFormalHari[2]
          }],
          chart: {
            type: 'bar',
            height: 350
          },
          plotOptions: {
            bar: {
              horizontal: false,
              columnWidth: '55%',
              endingShape: 'rounded'
            },
          },
          dataLabels: {
            enabled: false
          },
          stroke: {
            show: true,
            width: 2,
            colors: ['transparent']
          },
          xaxis: {
            categories: ['senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu', 'ahad'],
          },
          yaxis: {
            title: {
              text: 'jam'
            }
          },
          fill: {
            opacity: 1
          },
          tooltip: {
            y: {
              formatter: function(val) {
                return val + " jam"
              }
            }
          }
        };

        var chart = new ApexCharts(document.querySelector("#chartPresensibyHari"), options);
        chart.render();
      </script>
    @endscript
    {{-- javascript formal end --}}

    {{-- javascipt madin start --}}
    @script()
      <script>
        const presensiMadin = JSON.parse(`<?= $presensiMadin ?>`)


        let options = {
          series: [{
              name: "Sakit",
              data: presensiMadin[0]
            },
            {
              name: "Izin",
              data: presensiMadin[1]
            }, {
              name: "Alpha",
              data: presensiMadin[2]
            }
          ],
          chart: {
            height: 350,
            type: 'line',
          },
          colors: ['#42f5b9', '#f5da42', '#f54242'],
          dataLabels: {
            enabled: true,
          },
          stroke: {
            curve: 'smooth'
          },
          grid: {
            borderColor: '#e7e7e7',
            row: {
              colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
              opacity: 0.5
            },
          },
          markers: {
            size: 1
          },
          xaxis: {
            categories: ['Jul', 'Aug', 'Sep', 'Okt', 'Nov', 'Des', 'Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun'],
            title: {
              text: 'Bulan'
            }
          },
          yaxis: {
            title: {
              text: 'jam'
            }
          },
          tooltip: {
            y: {
              formatter: function(val) {
                return val + " jam"
              }
            }
          }

        };

        let chart = new ApexCharts(document.querySelector("#chartPresensiMadin"), options);
        chart.render();
      </script>
    @endscript

    @script()
      <script>
        const pelajaranMadin = JSON.parse(`<?= $pelajaranMadin ?>`)
        const presensiMadinPelajaran = JSON.parse(`<?= $presensiMadinPelajaran ?>`)

        var options = {
          series: [{
            name: 'Sakit',
            data: presensiMadinPelajaran[0]
          }, {
            name: 'Izin',
            data: presensiMadinPelajaran[1]
          }, {
            name: 'Alpha',
            data: presensiMadinPelajaran[2]
          }],
          chart: {
            type: 'bar',
            height: 350
          },
          plotOptions: {
            bar: {
              horizontal: false,
              columnWidth: '55%',
              endingShape: 'rounded'
            },
          },
          dataLabels: {
            enabled: false
          },
          stroke: {
            show: true,
            width: 2,
            colors: ['transparent']
          },
          xaxis: {
            categories: pelajaranMadin,
          },
          yaxis: {
            title: {
              text: 'jam'
            }
          },
          fill: {
            opacity: 1
          },
          tooltip: {
            y: {
              formatter: function(val) {
                return val + " jam"
              }
            }
          }
        };

        var chart = new ApexCharts(document.querySelector("#chartPresensibyPelajaranMadin"), options);
        chart.render();
      </script>
    @endscript

    @script()
      <script>
        const presensiMadinHari = JSON.parse(`<?= $presensiMadinHari ?>`)

        var options = {
          series: [{
            name: 'Sakit',
            data: presensiMadinHari[0]
          }, {
            name: 'Izin',
            data: presensiMadinHari[1]
          }, {
            name: 'Alpha',
            data: presensiMadinHari[2]
          }],
          chart: {
            type: 'bar',
            height: 350
          },
          plotOptions: {
            bar: {
              horizontal: false,
              columnWidth: '55%',
              endingShape: 'rounded'
            },
          },
          dataLabels: {
            enabled: false
          },
          stroke: {
            show: true,
            width: 2,
            colors: ['transparent']
          },
          xaxis: {
            categories: ['senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu', 'ahad'],
          },
          yaxis: {
            title: {
              text: 'jam'
            }
          },
          fill: {
            opacity: 1
          },
          tooltip: {
            y: {
              formatter: function(val) {
                return val + " jam"
              }
            }
          }
        };

        var chart = new ApexCharts(document.querySelector("#chartPresensibyHariMadin"), options);
        chart.render();
      </script>
    @endscript
    {{-- javascript madin end --}}


    {{-- javascipt mmq start --}}
    @script()
      <script>
        const presensiMmq = JSON.parse(`<?= $presensiMmq ?>`)


        let options = {
          series: [{
              name: "Sakit",
              data: presensiMmq[0]
            },
            {
              name: "Izin",
              data: presensiMmq[1]
            }, {
              name: "Alpha",
              data: presensiMmq[2]
            }
          ],
          chart: {
            height: 350,
            type: 'line',
          },
          colors: ['#42f5b9', '#f5da42', '#f54242'],
          dataLabels: {
            enabled: true,
          },
          stroke: {
            curve: 'smooth'
          },
          grid: {
            borderColor: '#e7e7e7',
            row: {
              colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
              opacity: 0.5
            },
          },
          markers: {
            size: 1
          },
          xaxis: {
            categories: ['Jul', 'Aug', 'Sep', 'Okt', 'Nov', 'Des', 'Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun'],
            title: {
              text: 'Bulan'
            }
          },
          yaxis: {
            title: {
              text: 'jam'
            }
          },
          tooltip: {
            y: {
              formatter: function(val) {
                return val + " jam"
              }
            }
          }

        };

        let chart = new ApexCharts(document.querySelector("#chartPresensiMmq"), options);
        chart.render();
      </script>
    @endscript

    @script()
      <script>
        const pelajaranMmq = JSON.parse(`<?= $pelajaranMmq ?>`)
        const presensiMmqPelajaran = JSON.parse(`<?= $presensiMmqPelajaran ?>`)

        var options = {
          series: [{
            name: 'Sakit',
            data: presensiMmqPelajaran[0]
          }, {
            name: 'Izin',
            data: presensiMmqPelajaran[1]
          }, {
            name: 'Alpha',
            data: presensiMmqPelajaran[2]
          }],
          chart: {
            type: 'bar',
            height: 350
          },
          plotOptions: {
            bar: {
              horizontal: false,
              columnWidth: '55%',
              endingShape: 'rounded'
            },
          },
          dataLabels: {
            enabled: false
          },
          stroke: {
            show: true,
            width: 2,
            colors: ['transparent']
          },
          xaxis: {
            categories: pelajaranMmq,
          },
          yaxis: {
            title: {
              text: 'jam'
            }
          },
          fill: {
            opacity: 1
          },
          tooltip: {
            y: {
              formatter: function(val) {
                return val + " jam"
              }
            }
          }
        };

        var chart = new ApexCharts(document.querySelector("#chartPresensibyPelajaranMmq"), options);
        chart.render();
      </script>
    @endscript

    @script()
      <script>
        const presensiMmqHari = JSON.parse(`<?= $presensiMmqHari ?>`)

        var options = {
          series: [{
            name: 'Sakit',
            data: presensiMmqHari[0]
          }, {
            name: 'Izin',
            data: presensiMmqHari[1]
          }, {
            name: 'Alpha',
            data: presensiMmqHari[2]
          }],
          chart: {
            type: 'bar',
            height: 350
          },
          plotOptions: {
            bar: {
              horizontal: false,
              columnWidth: '55%',
              endingShape: 'rounded'
            },
          },
          dataLabels: {
            enabled: false
          },
          stroke: {
            show: true,
            width: 2,
            colors: ['transparent']
          },
          xaxis: {
            categories: ['senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu', 'ahad'],
          },
          yaxis: {
            title: {
              text: 'jam'
            }
          },
          fill: {
            opacity: 1
          },
          tooltip: {
            y: {
              formatter: function(val) {
                return val + " jam"
              }
            }
          }
        };

        var chart = new ApexCharts(document.querySelector("#chartPresensibyHariMmq"), options);
        chart.render();
      </script>
    @endscript
    {{-- javascript mmq end --}}

    {{-- javascript sholat start --}}
    @script()
      <script>
        const presensiSholat = JSON.parse(`<?= $rekapPresensiSholat ?>`)
        console.log(presensiSholat);

        let options = {
          series: [{
              name: "Sakit",
              data: presensiSholat[0]
            },
            {
              name: "Izin",
              data: presensiSholat[1]
            }, {
              name: "Alpha",
              data: presensiSholat[2]
            }
          ],
          chart: {
            height: 350,
            type: 'line',
          },
          colors: ['#42f5b9', '#f5da42', '#f54242'],
          dataLabels: {
            enabled: true,
          },
          stroke: {
            curve: 'smooth'
          },
          grid: {
            borderColor: '#e7e7e7',
            row: {
              colors: ['#f3f3f3', 'transparent'], // takes an array which will be repeated on columns
              opacity: 0.5
            },
          },
          markers: {
            size: 1
          },
          xaxis: {
            categories: ['Subuh', 'Dhuha', 'Dhuhur', 'Asar', 'Magrib', 'Isya'],
            title: {
              text: 'Bulan'
            }
          },
          yaxis: {
            title: {
              text: 'jam'
            }
          },
          tooltip: {
            y: {
              formatter: function(val) {
                return val + " jam"
              }
            }
          }

        };

        let chart = new ApexCharts(document.querySelector("#chartPresensiSholat"), options);
        chart.render();
      </script>
    @endscript

    {{-- javascript sholat end --}}

  </div>
