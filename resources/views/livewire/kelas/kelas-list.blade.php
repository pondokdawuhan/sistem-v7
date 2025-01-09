<div>
  <div class=" overflow-x-auto shadow-md sm:rounded-lg">
    @if (session()->has('success'))
      <div class="bg-green-400 text-white px-3 py-2 mb-5">
        <h4 class="text-center font-semibold">{{ session('success') }}</h4>
      </div>
    @endif
    <div class="flex flex-col xl:flex-row gap-5">
      <div class="xl:flex-1">
        <div class="flex items-center gap-2 mb-2">

          <div class="w-full lg:w-1/2">
            <form action="">
              <label for="default-search"
                class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
              <div class="relative flex items-center gap-2">
                <div class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                  <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                    xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                      d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                  </svg>
                </div>
                <input type="search" id="default-search"
                  class="block w-full ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                  placeholder="nama, email, atau username" wire:model.live='search' autofocus>
                <button type="submit"
                  class="text-white end-2.5 bottom-2.5 bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm px-4 py-2 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">Search</button>
              </div>
            </form>
          </div>
        </div>

        <div class="bg-white dark:bg-slate-900 p-5 dark:text-white">
          <table id="dataTable"
            class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 bg-opacity-85 ">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
              <tr>
                <th scope="col" class="px-6 py-3">
                  No
                </th>
                <th scope="col" class="px-6 py-3">
                  Tingkat
                </th>
                <th scope="col" class="px-6 py-3">
                  Nama
                </th>
                <th scope="col" class="px-6 py-3">
                  Tingkat Kelulusan
                </th>
                <th scope="col" class="px-6 py-3">
                  Wali Kelas
                </th>
                <th scope="col" class="px-6 py-3">
                  Jumlah Rombel
                </th>
                <th scope="col" class="px-6 py-3">
                  Aksi
                </th>
              </tr>
            </thead>
            <tbody>
              @foreach ($kelas as $kls)
                <tr
                  class="bg-white border-b  bg-opacity-85 dark:bg-slate-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

                  <td class="px-6 py-4">{{ $loop->iteration }}</td>
                  <td class="px-6 py-4">{{ $kls->tingkat }} </td>
                  <td class="px-6 py-4">{{ $kls->nama }} </td>
                  <td class="px-6 py-4">{{ $kls->kelulusan ? 'Ya' : 'Tidak' }} </td>
                  <td class="px-6 py-4">{{ $kls->user->name ?? '' }}</td>
                  <td class="px-6 py-4">
                    @php
                      $jumlah = 0;
                      foreach ($santris as $santri) {
                          switch ($lembaga->jenis_lembaga) {
                              case 'FORMAL':
                                  if ($santri->kelas_formal_id == $kls->id) {
                                      $jumlah += 1;
                                  }
                                  break;
                              case 'MADIN':
                                  if ($santri->kelas_madin_id == $kls->id) {
                                      $jumlah += 1;
                                  }
                                  break;
                              case 'MMQ':
                                  if ($santri->kelas_mmq_id == $kls->id) {
                                      $jumlah += 1;
                                  }
                                  break;
                              case 'ASRAMA':
                                  if ($santri->kelas_asrama_id == $kls->id) {
                                      $jumlah += 1;
                                  }
                                  break;
                          }
                      }
                    @endphp
                    {{ $jumlah }}
                  </td>

                  <td class="px-6 py-4">
                    <a wire:navigate href="/editRombel/{{ $kls->lembaga_id }}/{{ $kls->id }}"
                      class="px-3 py-1 rounded-md bg-amber-500 text-white inline-block text-xs mb-2">Edit Rombel</a>
                    <button wire:click='delete({{ $kls->id }})'
                      class="px-2 text-xs py-1 rounded-md bg-red-500 text-white"
                      wire:confirm='Apakah Anda Yakin?'>Hapus</button>

                  </td>
                </tr>
              @endforeach
            </tbody>
          </table>
        </div>
      </div>
      <div class="lg:mt-10 flex flex-col gap-4">
        <div class="w-full">
          <div
            class="w-full p-3 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <h3 class="dark:text-white mb-2 border-b">Tambah Kelas</h3>
            <form wire:submit.prevent='tambah'>
              <div class="flex gap-2">
                <select wire:model='selectedTingkat' class="px-3 py-1 rounded-md dark:bg-slate-800 dark:text-white"
                  required>
                  <option value="">Tingkat</option>
                  @foreach ($tingkats as $tingkat)
                    <option value="{{ $tingkat }}">{{ $tingkat }}</option>
                  @endforeach
                </select>
                <select wire:model='selectedKelulusan' class="px-3 py-1 rounded-md dark:bg-slate-800 dark:text-white"
                  required>
                  <option value="">Kelulusan</option>
                  <option value="0">Tidak</option>
                  <option value="1">Ya</option>
                </select>
                <input type="text" wire:model='nama'
                  class=" w-1/3 px-3 py-1 rounded-md dark:bg-slate-800 dark:text-white" required />
                <button class="px-3 py-1 rounded-md bg-violet-500 text-white">Tambah</button>
              </div>
            </form>
          </div>
        </div>
        <div class="w-full">
          <div
            class="w-full p-3 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <h3 class="dark:text-white mb-2 border-b">Edit Kelas</h3>
            <form wire:submit.prevent='edit'>
              <div class="flex gap-2 flex-col">
                <div class="flex flex-col gap-2">
                  <label for="" class="dark:text-white">Nama Kelas Lama</label>
                  <select wire:model='kelas_id' class="px-3 py-1 rounded-md dark:bg-slate-800 dark:text-white">
                    <option value="">pilih</option>
                    @foreach ($kelas as $kls)
                      <option value="{{ $kls->id }}">{{ $kls->nama }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="flex flex-col gap-2">

                  <label for="" class="dark:text-white">Nama Kelas Baru</label>
                  <input type="text" wire:model='nama_edit'
                    class="px-3 py-1 rounded-md dark:bg-slate-800 dark:text-white" required />
                  <select wire:model='selectedTingkat' class="px-3 py-1 rounded-md dark:bg-slate-800 dark:text-white"
                    required>
                    <option value="">Tingkat</option>
                    @foreach ($tingkats as $tingkat)
                      <option value="{{ $tingkat }}">{{ $tingkat }}</option>
                    @endforeach
                  </select>
                  <select wire:model='selectedKelulusan'
                    class="px-3 py-1 rounded-md dark:bg-slate-800 dark:text-white" required>
                    <option value="">Kelulusan</option>
                    <option value="0">Tidak</option>
                    <option value="1">Ya</option>
                  </select>
                </div>
                <div class="flex justify-end">
                  <button class="px-3 py-1 rounded-md bg-violet-500 text-white">Edit</button>
                </div>
              </div>
            </form>
          </div>
        </div>

        <div class="w-full">
          <div
            class="w-full p-3 bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <h3 class="dark:text-white mb-2 border-b">Edit Wali Kelas</h3>
            <form wire:submit.prevent='editWaliKelas'>
              <div class="flex gap-2 flex-col">
                <div class="flex flex-col gap-2">
                  <label for="" class="dark:text-white">Kelas</label>
                  <select wire:model='kelas_id' class="px-3 py-1 rounded-md dark:bg-slate-800 dark:text-white">
                    <option value="">pilih</option>
                    @foreach ($kelas as $kls)
                      <option value="{{ $kls->id }}">{{ $kls->nama }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="flex flex-col gap-2">
                  <label for="" class="dark:text-white">Wali Kelas</label>
                  <select name="" id="" wire:model='wali_kelas'
                    class=" px-3 py-1 rounded-md dark:bg-slate-800 dark:text-white">
                    <option value="">pilih</option>
                    @foreach ($usersWali as $user)
                      <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                  </select>
                </div>
                <div class="flex justify-end">
                  <button class="px-3 py-1 rounded-md bg-violet-500 text-white">Edit</button>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <x-loading></x-loading>
</div>
