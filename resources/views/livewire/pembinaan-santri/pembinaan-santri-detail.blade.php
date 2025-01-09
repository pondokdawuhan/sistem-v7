<div class=" overflow-x-hidden shadow-md sm:rounded-lg" x-data='{openModal : false}'>
  <x-loading></x-loading>
  @if (session()->has('success'))
    <div class="bg-green-400 text-white px-3 py-2 mb-5">
      <h4 class="text-center font-semibold">{{ session('success') }}</h4>
    </div>
  @endif
  <div class="flex items-center gap-2 mb-2">
    <a wire:navigate href="/{{ $lembaga }}/{{ $role }}/pembinaanSantri"
      class="bg-slate-500 text-white px-3 py-1 rounded-md inline-block">Kembali</a>
    <div class="flex gap-2 items-center">
      <div class="">
        <select wire:model.live="paginate" class="px-3 py-1 rounded-md dark:bg-slate-800 dark:text-white">
          <option value="20">20</option>
          <option value="40">40</option>
          <option value="50">50</option>
          <option value="100">100</option>
        </select>
      </div>

    </div>
  </div>

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
            Bukti
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
            <td class="px-6 py-4">
              <button type="button" x-on:click="openModal=!openModal" wire:click='lihatBukti({{ $pembinaan->id }})'
                class="mt-2 text-white bg-violet-500 rounded-lg text-xs px-3 py-1 inline-block cursor-pointer mb-2">Lihat</button>
            </td>
            <td class="px-6 py-4">
              @if ($pembinaan->surat)
                <button type="button" x-on:click="openModal=!openModal" wire:click='lihatSurat({{ $pembinaan->id }})'
                  class="mt-2 text-white bg-violet-500 rounded-lg text-xs px-3 py-1 inline-block cursor-pointer mb-2">Lihat</button>
              @endif
            </td>

          </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  <div class="mt-4 flex justify-end">
    {{ $pembinaans->links() }}
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
        <div class="flex justify-center items-center p-5">
          <img src="{{ $bukti }}" alt="bukti" class="w-1/2">
        </div>
      </div>
    </div>
  </div>

</div>
