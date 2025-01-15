<div x-data="{ openModal: false }">
  <x-notifsukses></x-notifsukses>
  <div class=" overflow-x-hidden shadow-md sm:rounded-lg p-2">
    <a href="/santri/create" wire:navigate class="bg-violet-500 text-white px-3 py-1 rounded-md inline-block">Tambah</a>
    <div class="flex flex-wrap items-center justify-between gap-2 my-2">

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
      <div class="flex gap-2">
        <div>
          <button wire:click='downloadDataSantri' class="bg-green-500 text-white px-3 py-1 rounded-md">Download
            </buttontype=>
        </div>
      </div>
    </div>

    <div class="overflow-auto">
      <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 bg-opacity-85">
        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
          <tr>
            <th scope="col" class="px-6 py-3">
              Status
            </th>
            <th scope="col" class="px-6 py-3">
              Nama
            </th>

            <th scope="col" class="px-6 py-3">
              Initial Password
            </th>
            <th scope="col" class="px-6 py-3">
              Jenis Kelamin
            </th>
            <th scope="col" class="px-6 py-3">
              Kelas
            </th>
            <th scope="col" class="px-6 py-3">
              Deleted at
            </th>
            <th scope="col" class="px-6 py-3">
              Aksi
            </th>
          </tr>
        </thead>
        <tbody>
          @foreach ($santris as $santri)
            <tr
              class="bg-white border-b  bg-opacity-85 dark:bg-slate-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
              <td class="pl-5">
                <div class="flex items-center">
                  @if ($santri->dataSantri)
                    @if ($santri->dataSantri->aktif == true)
                      <div class="h-2.5 w-2.5 rounded-full bg-green-500 me-2"></div> Aktif
                    @else
                      <div class="h-2.5 w-2.5 rounded-full bg-red-500 me-2"></div> Tidak Aktif
                    @endif
                  @endif
                </div>
              </td>
              <td class="flex items-center px-6 py-4 text-gray-900 dark:text-white">
                @if ($santri->dataSantri->foto)
                  <img class="w-10 h-10 rounded-full" src="{{ asset('storage/' . $santri->dataSantri->foto) }}"
                    alt="Jese image">
                @else
                  <img class="w-10 h-10 rounded-full" src="/assets/images/default.jpg" alt="Jese image">
                @endif
                <div class="ps-3">
                  <div class="text-base font-semibold">{{ $santri->name }}</div>
                  <div class="font-normal text-gray-500">
                    {{ $santri->dataSantri->lembaga->nama }}
                    {{ $santri->username }} | {{ $santri->email }}
                  </div>
                </div>
              </td>

              <td class="px-6 py-4">{{ $santri->initial_password }}</td>

              <td class="px-6 py-4">
                @if ($santri->dataSantri)
                  {{ $santri->dataSantri->jenis_kelamin }}
                @endif
              </td>

              <td class="px-6 py-4">
                @foreach ($kelass as $kls)
                  @if ($kls->id == $santri->kelas_formal_id)
                    {{ $kls->nama }} (FORMAL)
                  @endif
                  @if ($kls->id == $santri->kelas_madin_id)
                    {{ $kls->nama }} (MADIN)
                  @endif
                  @if ($kls->id == $santri->kelas_mmq_id)
                    {{ $kls->nama }} (MMQ)
                  @endif
                  @if ($kls->id == $santri->kelas_asrama_id)
                    {{ $kls->nama }} (ASRAMA)
                  @endif
                @endforeach
              </td>

              <td class="px-6 py-4">
                {{ $santri->deleted_at ? $santri->deleted_at->format('d-m-Y H:i') : '' }}
              </td>

              <td class="px-6 py-4">
                @if ($santri->deleted_at)
                  <button type="button" wire:confirm='Apakah anda yakin?' wire:click='restore({{ $santri->id }})'
                    class="mt-2 text-white bg-green-500 rounded-lg text-xs px-3 py-1 inline-block cursor-pointer">Restore</button>
                @else
                  <a wire:navigate href="/santri/{{ $santri->username }}/edit"
                    class="text-white bg-sky-500 rounded-lg text-xs px-3 py-1 inline-block"><i
                      class="fa-solid fa-user-edit"></i></a>

                  <a wire:navigate href="/santri/show/{{ $santri->username }}"
                    class="text-white bg-amber-500 rounded-lg text-xs px-3 py-1 inline-block"><i
                      class="fa-solid fa-eye"></i></a>

                  <a href="/santri/cetakKartuSantri/{{ $santri->username }}" target="_blank"
                    class="text-white bg-green-500 rounded-lg text-xs px-3 py-1 inline-block mt-2">Kartu Santri</a>

                  <a href="/santri/cetakKartuWaliSantri/{{ $santri->username }}" target="_blank"
                    class="text-white bg-green-500 rounded-lg text-xs px-3 py-1 inline-block mt-2">Kartu Wali Santri</a>

                  <button type="button" x-on:click="openModal=!openModal"
                    wire:click='pilih("{{ $santri->username }}")'
                    class="mt-2 text-white bg-amber-500 rounded-lg text-xs px-3 py-1 inline-block cursor-pointer">Kirim
                    Data</button>

                  <button wire:click='resetPassword({{ $santri->username }})'
                    wire:confirm='Apakah anda yakin mereset password santri ini?'
                    class="text-white bg-red-500 rounded-lg text-xs px-3 py-1 inline-block mt-2">Reset</button>
                  <button type="button"
                    wire:confirm='Apakah anda yakin menghapus data ini? Menghapus data santri secara sembarangan akan menyebabkan error'
                    wire:click='delete({{ $santri->id }})'
                    class="mt-2 text-white bg-red-500 rounded-lg text-xs px-3 py-1 inline-block cursor-pointer">Hapus</button>
                @endif

              </td>
            </tr>
          @endforeach
        </tbody>
      </table>
      @if (!$search)
        <div class="mt-4 flex justify-end">
          {{ $santris->links() }}
        </div>
      @endif
    </div>

  </div>
  <x-loading></x-loading>


  <div class="dark:bg-slate-800 dark:text-white flex flex-col px-3 py-1">
    <form wire:submit="proses" enctype="multipart/form-data">
      <div class="flex gap-2">
        <div class="flex flex-col gap-2">
          <label for="">Import Data Santri</label>
          <input type="file" wire:model="template" class="rounded-md border ">
        </div>
        <div class="flex flex-col justify-end">
          <button type="submit" class="px-3 py-2 rounded-md bg-violet-500 text-white">Save</button>
        </div>
      </div>

    </form>
    <div class="flex flex-col gap-2 lg:w-1/3">
      @foreach ($lembagaFormals as $lembagaFormal)
        <button wire:click='downloadTemplate({{ $lembagaFormal->id }})'
          class=" mt-2 px-3 py-2 rounded-md bg-amber-500 text-white">Download
          Template {{ $lembagaFormal->nama_singkat }} </button>
        <button wire:click='downloadTemplate({{ $lembagaFormal->id }}, true)'
          class=" mt-2 px-3 py-2 rounded-md bg-red-500 text-white">Download
          Template {{ $lembagaFormal->nama_singkat }} dengan username</button>
      @endforeach
    </div>
  </div>



  <div id="crud-modal" tabindex="-1" aria-hidden="true" x-show="openModal"
    class="overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full h-screen bg-slate-500/50">
    <div class="relative p-4 w-full h-screen flex justify-center items-center ">
      <!-- Modal content -->
      <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
        <!-- Modal header -->
        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
          <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
            Kirim Data User
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
        <form class="p-4 md:p-5 inline-block w-full" wire:submit.prevent='kirimData'>
          <div class="flex flex-col gap-2 mb-4">
            <div class="flex flex-col w-full">
              <label for="" class="dark:text-white">Nama</label>
              <input type="text" class="px-3 py-1 rounded-md dark:bg-slate-800 dark:text-white"
                wire:model='pilihNama' required>
            </div>
          </div>
          <div class="flex flex-col gap-2 mb-4">
            <div class="flex flex-col w-full">
              <label for="" class="dark:text-white">Nomor</label>
              <input type="number" class="px-3 py-1 rounded-md dark:bg-slate-800 dark:text-white"
                wire:model='pilihNomor' required>
            </div>
          </div>
          <div class="flex flex-col gap-2 mb-4">
            <div class="flex flex-col w-full">
              <label for="" class="dark:text-white">Username</label>
              <input type="text" class="px-3 py-1 rounded-md dark:bg-slate-800 dark:text-white"
                wire:model='pilihUsername' required>
            </div>
          </div>
          <div class="flex flex-col gap-2 mb-4">
            <div class="flex flex-col w-full">
              <label for="" class="dark:text-white">Password</label>
              <input type="text" class="px-3 py-1 rounded-md dark:bg-slate-800 dark:text-white"
                wire:model='pilihPassword' required>
            </div>
          </div>

          <button type="submit" class="px-3 py-1 rounded-md bg-violet-500 text-white" x-on:click="openModal=false">
            Kirim
          </button>
        </form>
      </div>
    </div>
  </div>

</div>
