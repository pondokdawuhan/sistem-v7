<div class=" overflow-x-auto shadow-md sm:rounded-lg" x-data="{ openModal: false }">
  <x-loading></x-loading>
  <x-notifsukses></x-notifsukses>

  <div class="flex items-center gap-2 mb-2 flex-wrap">
    <div class="flex gap-2">
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
          Nama
        </th>
        <th scope="col" class="px-6 py-3">
          Kegiatan
        </th>
        <th scope="col" class="px-6 py-3">
          Keterangan
        </th>
        <th scope="col" class="px-6 py-3">
          Aksi
        </th>
      </tr>
    </thead>
    <tbody>
      @foreach ($presensis as $presensi)
        <tr
          class="bg-white border-b  bg-opacity-85 dark:bg-slate-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

          <td class="px-6 py-4">{{ $loop->iteration }}</td>
          <td class="px-6 py-4">{{ date('d-m-Y', strtotime($presensi->created_at)) }}</td>
          <td class="px-6 py-4">{{ $presensi->lembaga->nama }}</td>
          <td class="px-6 py-4">{{ $presensi->user->name }}</td>
          <td class="px-6 py-4">{{ $presensi->kegiatan }}</td>
          <td class="px-6 py-4">{{ $presensi->keterangan }}</td>
          <td class="px-6 py-4">
            <button type="button" x-on:click="openModal=!openModal" wire:click='pilih({{ $presensi->id }})'
              class="mt-2 text-white bg-amber-500 rounded-lg text-xs px-3 py-1 inline-block cursor-pointer">Ubah</button>
            <button type="button" wire:confirm='Apakah anda yakin menghapus data ini?'
              wire:click='delete({{ $presensi->id }})'
              class="mt-2 text-white bg-red-500 rounded-lg text-xs px-3 py-1 inline-block cursor-pointer">Hapus</button>
          </td>
        </tr>
      @endforeach
    </tbody>
  </table>

  @if (!$search)
    <div class="mt-4 flex justify-end">
      {{ $presensis->links() }}
    </div>
  @endif


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
          <form wire:submit.prevent='ubah'>
            @isset($presensi)
              <div class="dark:bg-slate-900 p-5 rounded-md">
                <div class="flex flex-col gap-2 mb-2">
                  <label class="dark:text-white" for="">Nama</label>
                  <input type="text" class="px-3 py-1 rounded-md dark:bg-slate-800 dark:text-white"
                    wire:model='santri_name' readonly>
                </div>
                <div class="flex flex-col gap-2 mb-2">
                  <label class="dark:text-white" for="">Kegiatan</label>
                  <input type="text" class="px-3 py-1 rounded-md dark:bg-slate-800 dark:text-white"
                    wire:model='kegiatan' readonly>
                </div>

                <div class="flex flex-col gap-2 mb-2">
                  <label class="dark:text-white" for="">Keterangan</label>
                  <select wire:model='keterangan' id="keterangan"
                    class="px-3 py-1 rounded-md dark:bg-slate-800 dark:text-white">
                    <option value="H">HADIR</option>
                    <option value="S">SAKIT</option>
                    <option value="I">IZIN</option>
                    <option value="A">ALPHA</option>
                  </select>
                </div>
                <button type="submit" class="px-3 py-1 rounded-md bg-violet-500 text-white"
                  x-on:click='openModal = false'>Ubah</button>
              </div>
            @endisset

          </form>
        </div>
      </div>
    </div>
  </div>
</div>
