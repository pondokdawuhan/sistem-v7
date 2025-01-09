<div class=" overflow-x-hidden shadow-md sm:rounded-lg" x-data="{ openModal: false }">
  <x-notifsukses></x-notifsukses>

  <div class="flex justify-between gap-2 mb-2 flex-wrap">
    <div class="flex flex-col gap-2">
      <div class="">
        <select wire:model.live="paginate" class="px-3 py-1 rounded-md dark:bg-slate-800 dark:text-white">
          <option value="20">20</option>
          <option value="40">40</option>
          <option value="50">50</option>
          <option value="100">100</option>
        </select>
      </div>
      <input type="search" class="px-3 py-1 rounded-md dark:bg-slate-800 dark:text-white"
        wire:model.live.debounce.300ms='search' placeholder="cari..." autofocus>
    </div>

    <div class="flex gap-2 items-end">
      <form action="">
        <input type="hidden" name="lembaga" value="{{ request('lembaga') }}">
        <div class="w-full flex flex-wrap gap-5">
          <div class="flex flex-col gap-2">
            <label for="tanggalAwal" class="text-slate-900 dark:text-white">Tanggal Awal</label>
            <input type="date" wire:model.live.debounce.300ms="tanggalAwal" id="tanggalAwal" required
              class="px-3 py-1 rounded-md text-slate-900 dark:text-white dark:bg-slate-900">
          </div>
          <div class="flex flex-col gap-2">
            <label for="tanggalAkhir" class="text-slate-900 dark:text-white">Tanggal Akhir</label>
            <input type="date" wire:model.live.debounce.300ms="tanggalAkhir" id="tanggalAkhir" required
              class="px-3 py-1 rounded-md text-slate-900 dark:text-white dark:bg-slate-900">
          </div>
          <div class="flex flex-col gap-2">
            <label for="pelajaran" class="text-slate-900 dark:text-white">Pelajaran</label>
            <select wire:model.live.debounce.300ms="pelajaran" id="pelajaran"
              class="px-3 py-1 rounded-md text-slate-900 dark:text-white dark:bg-slate-900">
              <option value="">Semua</option>
              @foreach ($mapels as $mapel)
                <option value="{{ $mapel->id }}">{{ $mapel->nama }}</option>
              @endforeach
            </select>
          </div>
        </div>
      </form>
      <div>

        <button type="submit" class="px-3 py-1 rounded-md bg-red-500 text-white"
          wire:click='download'>Download</button>
      </div>
    </div>
  </div>

  <div class=" overflow-auto">
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
            Nama
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
            Keterangan
          </th>
          <th scope="col" class="px-6 py-3">
            Penanggungjawab
          </th>
        </tr>
      </thead>
      <tbody>
        @foreach ($presensis as $presensi)
          <tr
            class="bg-white border-b  bg-opacity-85 dark:bg-slate-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

            <td class="px-6 py-4">{{ $loop->index + $page }}</td>
            <td class="px-6 py-4">{{ date('d-m-Y', strtotime($presensi->created_at)) }}</td>
            <td class="px-6 py-4">{{ $presensi->santri->name }}</td>
            <td class="px-6 py-4">{{ $presensi->kelas->nama }}</td>
            <td class="px-6 py-4">{{ $presensi->pelajaran->nama }}</td>
            <td class="px-6 py-4">{{ $presensi->jam }}</td>
            <td class="px-6 py-4">{{ $presensi->keterangan }}</td>
            <td class="px-6 py-4">{{ $presensi->user->name }}</td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  @if (!$search)
    <div class="mt-4 flex justify-end">
      {{ $presensis->links() }}
    </div>
  @endif

  <x-loading></x-loading>


</div>
