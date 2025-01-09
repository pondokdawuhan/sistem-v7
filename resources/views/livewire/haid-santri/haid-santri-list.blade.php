<div class=" overflow-x-hidden shadow-md sm:rounded-lg dark:bg-slate-900 bg-white p-5" x-data="{ openModal: false }">
  @if (session()->has('success'))
    <div class="bg-green-400 text-white px-3 py-2 mb-5">
      <h4 class="text-center font-semibold">{{ session('success') }}</h4>
    </div>
  @endif
  <a href="/{{ $role }}/haidSantri/create" wire:navigate
    class=" bg-violet-500 text-white px-3 py-1 rounded-md inline-block mb-2">Tambah</a>
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

  <div class="overflow-auto">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 bg-opacity-85">
      <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
          <th scope="col" class="px-3 py-1">
            No
          </th>
          <th scope="col" class="px-3 py-1">
            Nama
          </th>
          <th scope="col" class="px-3 py-1">
            Kelas
          </th>
          <th scope="col" class="px-3 py-1">
            Tanggal Mulai
          </th>
          <th scope="col" class="px-3 py-1">
            Tanggal Suci
          </th>

          <th scope="col" class="px-3 py-1">
            Terakhir Suci (Bulan Kemarin)
          </th>
          <th scope="col" class="px-3 py-1">
            Status
          </th>
          <th scope="col" class="px-3 py-1">
            Aksi
          </th>
        </tr>
      </thead>
      <tbody>
        <div>

          @foreach ($santris as $santri)
            <tr class="border-b border-slate-500">
              <td class="p-3">{{ $loop->index + $page }}</td>
              <td class="p-3">{{ $santri->name }}</td>
              <td class="p-3">
                @if ($santri->kelas_formal_id)
                  @foreach ($kelas as $kls)
                    @if ($kls->id == $santri->kelas_formal_id)
                      {{ $kls->nama }} ({{ $kls->lembaga->nama_singkat }})
                    @endif
                  @endforeach
                @endif
                <br>
                @if ($santri->kelas_asrama_id)
                  @foreach ($kelas as $kls)
                    @if ($kls->id == $santri->kelas_asrama_id)
                      {{ $kls->nama }} ({{ $kls->lembaga->nama_singkat }})
                    @endif
                  @endforeach
                @endif
              </td>
              <td class="p-3">
                {{ $santri->haidSantri ? date('d-m-Y H:i', strtotime($santri->haidSantri->tanggal_mulai)) : '' }}
                <p class="text-red-500">
                  {{ $santri->haidSantri ? date('d-m-Y H:i', strtotime($santri->haidSantri->tanggal_maksimal)) : '' }}
                </p>

              </td>
              <td class="p-3">
                @if ($santri->haidSantri)
                  @if ($santri->haidSantri->tanggal_suci)
                    {{ date('d-m-Y H:i', strtotime($santri->haidSantri->tanggal_suci)) }}
                  @else
                  @endif
                @endif

              </td>
              <td class="p-3">
                @if ($santri->haidSantri)
                  @if ($santri->haidSantri->tanggal_terakhir_suci)
                    {{ date('d-m-Y H:i', strtotime($santri->haidSantri->tanggal_terakhir_suci)) }}
                  @else
                  @endif
                @endif
                {{-- {{ $santri->haidSantri ? date('d-m-Y H:i', strtotime($santri->haidSantri->tanggal_terakhir_suci)) : '' }} --}}
              </td>
              <td class="p-3">
                @if ($santri->haidSantri)
                  @if ($santri->haidSantri->keluar_darah == true)
                    <button
                      class="px-2 py-0.5 rounded-md text-white bg-red-500">{{ $santri->haidSantri->status }}</button>
                  @else
                    <button class="px-2 py-0.5 rounded-md text-white bg-green-500">Suci</button>
                  @endif
                @endif
              </td>
              <td class="p-3">

                @if ($santri->haidSantri)
                  @if ($santri->haidSantri->keluar_darah == true)
                    <a wire:navigate href="/{{ $role }}/haidSantri/{{ $santri->haidSantri->id }}/edit"
                      class="inline-block px-1.5 py-1.5 rounded-md bg-violet-500 text-white mb-2 text-xs">Edit</a>

                    <button type="button" x-on:click="openModal=!openModal"
                      wire:click='lihat({{ $santri->haidSantri->id ?? null }})'
                      class="mt-2 text-white bg-amber-500 rounded-lg text-xs px-3 py-1.5 inline-block cursor-pointer">lihat</button>

                    <button type="button" x-on:click="openModal=!openModal"
                      wire:click='editSuci({{ $santri->haidSantri->id ?? null }})'
                      class="mt-2 text-white bg-green-500 rounded-lg text-xs px-3 py-1.5 inline-block cursor-pointer">Suci</button>

                    @if ($santri->haidSantri->status != 'Istihadloh')
                      <button type="submit"
                        class="text-xs text-white bg-red-500 rounded-lg px-1.5 py-1.5 inline-block cursor-pointer my-2"
                        wire:click='istihadloh({{ $santri->haidSantri->id ?? null }})'
                        wire:confirm='Apakah Anda Yakin?'>Istihadloh</button>
                    @endif
                  @endif
                @endif

                @if ($santri->haidSantri)
                  <button type="button" class="px-3 py-1 rounded-md bg-red-500 text-white text-xs"
                    wire:click='delete({{ $santri->haidSantri->id ?? null }})'
                    wire:confirm='Apakah Anda yakin menghapus data ini?'>Hapus</button>
                @endif
              </td>
            </tr>
          @endforeach
        </div>
      </tbody>
    </table>
  </div>
  @if (!$search)
    <div class="mt-4 flex justify-end">
      {{ $santris->links() }}
    </div>
  @endif



  <div id="crud-modal" tabindex="-1" aria-hidden="true" x-show="openModal"
    class="overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full h-screen bg-slate-500/50">
    <div class="relative p-4 w-full h-screen flex justify-center items-center ">
      <!-- Modal content -->
      <div class="relative bg-white rounded-lg shadow dark:bg-gray-800">
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
        @if ($modal == 'suci')
          <form class="p-4 md:p-5 inline-block w-full" wire:submit.prevent='suci({{ $haidModal->id ?? '' }})'>
            <div class="flex flex-col gap-2 mb-4">
              <div class="flex flex-col w-full">
                <label for="" class="dark:text-white">Nama</label>
                <input type="text" readonly value="{{ $haidModal->santri->name ?? '' }}"
                  class="px-3 py-1 rounded-md dark:bg-slate-800 dark:text-white">
              </div>
            </div>

            <div class="flex flex-col gap-2 mb-4">
              <div class="flex flex-col w-full">
                <label for="" class="dark:text-white">Waktu Suci</label>
                <input type="dateTime-local" wire:model='tanggal_suci'
                  class="px-3 py-1 rounded-md dark:bg-slate-800 dark:text-white" required>
              </div>
            </div>
            <button type="submit" class="px-3 py-1 rounded-md bg-violet-500 text-white"
              x-on:click="openModal=false">
              Simpan
            </button>
          </form>
        @else
          @isset($haidModal)
            <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 bg-opacity-85">
              <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-800 dark:text-gray-400">
                <tr>
                  <th scope="col" class="px-6 py-3">
                    Tanggal Mulai
                  </th>
                  <th scope="col" class="px-6 py-3">
                    Tanggal Maksimal
                  </th>
                  <th scope="col" class="px-6 py-3">
                    Tanggal Suci
                  </th>
                  <th scope="col" class="px-6 py-3">
                    Lama Keluar Darah
                  </th>
                  <th scope="col" class="px-6 py-3">
                    Tanggal Terakhir Istihadloh
                  </th>
                  <th scope="col" class="px-6 py-3">
                    Status
                  </th>
                </tr>
              </thead>
              <tbody>
                <tr class="border-b border-slate-500">
                  <td class="px-6 py-4">{{ date('d-m-Y H:i', strtotime($haidModal->tanggal_mulai)) }} </td>
                  <td class="px-6 py-4">{{ date('d-m-Y H:i', strtotime($haidModal->tanggal_maksimal)) }} </td>
                  <td class="px-6 py-4">
                    @if ($haidModal->tanggal_suci)
                      {{ date('d-m-Y H:i', strtotime($haidModal->tanggal_suci)) }}
                    @endif
                  </td>
                  <td class="px-6 py-4">
                    {{ $haidModal->lama_keluar_darah }}
                  </td>
                  <td class="px-6 py-4">
                    @if ($haidModal->tanggal_terakhir_istihadloh)
                      {{ date('d-m-Y H:i', strtotime($haidModal->tanggal_terakhir_istihadloh)) }}
                    @endif
                  </td>
                </tr>
              </tbody>
            </table>
          @endisset
        @endif
      </div>
    </div>
  </div>

  <x-loading></x-loading>
</div>
