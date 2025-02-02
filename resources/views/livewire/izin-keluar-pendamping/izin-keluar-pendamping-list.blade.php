<div x-data="{ openModal: false }" class=" overflow-x-hidden shadow-md sm:rounded-lg">
  @if (session()->has('success'))
    <div class="bg-green-400 text-white px-3 py-2 mb-5">
      <h4 class="text-center font-semibold">{{ session('success') }}</h4>
    </div>
  @endif
  @if ($role != 'keamanan' && $role != 'ketuaasrama')
    <a href="/{{ $role }}/izinKeluarPendamping/create" wire:navigate
      class=" bg-violet-500 text-white px-3 py-1 rounded-md inline-block mb-2">Tambah</a>
  @endif
  <div class="flex items-center gap-2 mb-2 flex-wrap">
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
          <th scope="col" class="px-6 py-3">
            Aksi
          </th>
        </tr>
      </thead>
      <tbody>
        @foreach ($izins as $izin)
          <tr
            class="bg-white border-b  bg-opacity-85 dark:bg-slate-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

            <td class="px-6 py-4">{{ $loop->index + $page }}</td>
            <td class="px-6 py-4"><a wire:navigate
                href="/{{ $role }}/izinKeluarPendamping/detail/{{ $izin->user->username }}">{{ $izin->user->name }}</a>
            </td>
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

            <td class="px-6 py-4">

              @hasrole(['Keamanan', 'Super Admin'])
                @if ($izin->cek_satpam == false)
                  <button type="button" wire:click='cek({{ $izin->id }})' wire:confirm='Apakah anda yakin?'
                    class="mt-2 text-white bg-violet-500 rounded-lg text-xs px-3 py-1 inline-block cursor-pointer">Cek</button>
                @endif
              @endhasrole

              @if ($izin->waktu_kembali == null)
                <button type="button" x-on:click="openModal=!openModal" wire:click='kembali({{ $izin->id }})'
                  class="mt-2 text-white bg-amber-500 rounded-lg text-xs px-3 py-1 inline-block cursor-pointer">Kembali</button>
              @endif

              @if ($role != 'keamanan')
                @if ($izin->waktu_selesai > time() && $izin->waktu_kembali == null)
                  @if ($izin->user_id == auth()->user()->id)
                    <button type="button" wire:click='delete({{ $izin->id }})'
                      wire:confirm='Apakah Anda yakin menghapus izin ini?'
                      class="mt-2 text-white bg-red-500 rounded-lg text-xs px-3 py-1 inline-block cursor-pointer">Hapus</button>
                  @endif
                @endif
              @endif
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  @if (!$search)
    <div class="mt-4 flex justify-end">
      {{ $izins->links() }}
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
        <form class="p-4 md:p-5 inline-block w-full" wire:submit.prevent='editKembali({{ $izinModal->id ?? '' }})'>
          <div class="flex flex-col gap-2 mb-4">
            <div class="flex flex-col w-full">
              <label for="" class="dark:text-white">Nama</label>
              <input type="text" readonly value="{{ $izinModal->user->name ?? '' }}"
                class="px-3 py-1 rounded-md dark:bg-slate-800 dark:text-white">
            </div>
          </div>
          <div class="flex flex-col gap-2 mb-4">
            <div class="flex flex-col w-full">
              <label for="" class="dark:text-white">Izin</label>
              <input type="text" readonly value="{{ $izinModal->keperluan ?? '' }}"
                class="px-3 py-1 rounded-md dark:bg-slate-800 dark:text-white">
            </div>
          </div>
          <div class="flex flex-col gap-2 mb-4">
            <div class="flex flex-col w-full">
              <label for="" class="dark:text-white">Waktu Kembali</label>
              <input type="dateTime-local" wire:model='waktu_kembali'
                class="px-3 py-1 rounded-md dark:bg-slate-800 dark:text-white" required>
            </div>
          </div>
          <button type="submit" class="px-3 py-1 rounded-md bg-violet-500 text-white" x-on:click="openModal=false">
            Simpan
          </button>
        </form>
      </div>
    </div>
  </div>

  <x-loading></x-loading>
</div>
