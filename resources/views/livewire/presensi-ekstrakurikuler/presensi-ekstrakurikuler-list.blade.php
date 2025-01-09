<div x-data='{openModal: false}'>
  <x-loading></x-loading>
  <x-notifsukses></x-notifsukses>
  <a href="/{{ $ekstrakurikuler->id }}/presensiEkstrakurikuler/create" wire:navigate
    class="bg-green-500 text-white rounded-md px-3 py-1 inline-block mb-2">Tambah</a>

  <div class="flex items-center gap-2 mb-2">
    <div class="flex mb-2 gap-2 items-center">
      <div class="">
        <select wire:model.live="paginate" class="px-3 py-1 rounded-md dark:bg-slate-800 dark:text-white">
          <option value="20">20</option>
          <option value="40">40</option>
          <option value="50">50</option>
          <option value="100">100</option>
        </select>
      </div>
      <input type="text" class="px-3 py-1 rounded-md dark:bg-slate-800 dark:text-white"
        wire:model.live.debounce.300ms='search' placeholder="cari..." autofocus>
    </div>
  </div>
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
            Materi
          </th>
          <th scope="col" class="px-6 py-3">
            Aksi
          </th>

        </tr>
      </thead>
      <tbody>
        @foreach ($jurnals as $jurnal)
          <tr
            class="bg-white border-b  bg-opacity-85 dark:bg-slate-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
            <td class="px-6 py-4">{{ $loop->index + $page }}</td>
            <td class="px-6 py-4">{{ date('d-m-Y', strtotime($jurnal->created_at)) }}</td>
            <td class="px-6 py-4">{{ $jurnal->materi }}</td>
            <td class="px-6 py-4">
              <button type="button" x-on:click="openModal=!openModal" wire:click='lihat({{ $jurnal->id }})'
                class="mt-2 text-white bg-amber-500 rounded-lg text-xs px-3 py-1 inline-block cursor-pointer">lihat</button>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>

    @if (!$search)
      <div class="mt-4 flex justify-end">
        {{ $jurnals->links() }}
      </div>
    @endif
  </div>

  <div id="crud-modal" tabindex="-1" aria-hidden="true" x-show="openModal"
    class="overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full h-screen bg-slate-500/50">
    <div class="relative p-4 w-full h-screen flex justify-center items-center ">
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
        <div>
          @isset($selectedJurnal)
            <div class="dark:bg-slate-900 p-5 rounded-md">
              <div class="card-body">
                <div class="mb-3 font-bold">
                  <h4 class="text-center dark:text-white">Detail Jurnal Mengajar {{ $selectedJurnal->user->name }}</h4>
                  <h5 class="text-center dark:text-white">Ekstrakurikuler {{ $selectedJurnal->ekstrakurikuler->nama }}
                  </h5>
                  <p class="text-center dark:text-white">Tanggal
                    {{ date('d-m-Y', strtotime($selectedJurnal->created_at)) }}
                  </p>
                </div>
                @php
                  $sakit = '';
                  $jmlSakit = 0;
                  $izin = '';
                  $jmlIzin = 0;
                  $alpha = '';
                  $jmlAlpha = 0;

                  foreach ($presensis as $presensi) {
                      switch ($presensi->keterangan) {
                          case 'A':
                              $alpha .= $presensi->santri->name . ',';
                              $jmlSakit += 1;
                              break;
                          case 'I':
                              $izin .= $presensi->santri->name . ',';
                              $jmlIzin += 1;
                              break;
                          case 'S':
                              $sakit .= $presensi->santri->name . ',';
                              $jmlAlpha += 1;
                              break;
                      }
                  }
                  $hadir = count($jumlahAnggota) - ($jmlSakit + $jmlIzin + $jmlAlpha);
                @endphp
                <div class="overflow-auto">
                  <table class="border-collapse w-full">
                    <tr class="">
                      <td class="text-slate-700 dark:text-white px-3 py-1">Topik</td>
                      <td class="text-slate-700 dark:text-white px-3 py-1">: {{ $selectedJurnal->materi }}</td>
                    </tr>
                    <tr class="">
                      <td class="text-slate-700 dark:text-white px-3 py-1">Jumlah Siswa Keseluruhan</td>
                      <td class="text-slate-700 dark:text-white px-3 py-1">: {{ count($jumlahAnggota) }}</td>
                    </tr>
                    <tr class="">
                      <td class="text-slate-700 dark:text-white px-3 py-1">Siswa Sakit</td>
                      <td class="text-slate-700 dark:text-white px-3 py-1">: {{ $sakit }}</td>
                    </tr>
                    <tr class="">
                      <td class="text-slate-700 dark:text-white px-3 py-1">Siswa Izin</td>
                      <td class="text-slate-700 dark:text-white px-3 py-1">: {{ $izin }}</td>
                    </tr>
                    <tr class="">
                      <td class="text-slate-700 dark:text-white px-3 py-1">Siswa Alpha</td>
                      <td class="text-slate-700 dark:text-white px-3 py-1">: {{ $alpha }}</td>
                    </tr>
                    <tr class="">
                      <td class="text-slate-700 dark:text-white px-3 py-1">Siswa Hadir</td>
                      <td class="text-slate-700 dark:text-white px-3 py-1">: {{ $hadir }}</td>
                    </tr>
                  </table>
                </div>

              </div>
            </div>
          @endisset
        </div>
      </div>
    </div>
  </div>
</div>
