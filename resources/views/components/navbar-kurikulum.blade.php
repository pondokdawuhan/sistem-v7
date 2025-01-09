@hasrole(['Super Admin', 'Kurikulum'])
  <h6 class="my-3 text-slate-900 dark:text-white border-b italic">Kurikulum</h6>

  {{-- jadwal pelajaran start --}}
  <li>
    <button type="button"
      class="flex p-1 items-center w-full text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
      aria-controls="dropdown-pages" data-collapse-toggle="jadwalPelajaranbyKurikulum">
      <i class="fa-solid fa-book text-green-500"></i>
      <span class="flex-1 ml-3 text-left">Jadwal Pelajaran</span>
      <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd"
          d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
          clip-rule="evenodd"></path>
      </svg>
    </button>
    <ul id="jadwalPelajaranbyKurikulum"
      class="{{ request()->is('*/kurikulum/jadwalPelajaran*') ? '' : 'hidden' }} space-y-2">
      @foreach ($lembagaSelainAsrama as $lembaga)
        @foreach (auth()->user()->lembaga as $lbg)
          @if ($lbg->id == $lembaga->id)
            <li class="{{ request()->is($lembaga->id . '/kurikulum/jadwalPelajaran*') ? 'navbar-active' : '' }}">
              <a href="/{{ $lembaga->id }}/kurikulum/jadwalPelajaran" wire:navigate
                class="flex items-center ml-5 p-1 text-gray-900 rounded-lg dark:text-white">
                <i class="fa-solid fa-book text-green-500"></i>
                <span class="ms-3">{{ $lembaga->nama_singkat }}</span>
              </a>
            </li>
          @endif
        @endforeach
      @endforeach
    </ul>
  </li>
  {{-- jadwal pelajaran end --}}


  {{-- Izin Asatidz By Kurikulum Start --}}
  <li>
    <button type="button"
      class="flex p-1 items-center w-full text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
      aria-controls="dropdown-pages" data-collapse-toggle="izinAsatidzByKurikulum">
      <i class="fa-solid fa-person-walking text-green-500"></i>
      <span class="flex-1 ml-3 text-left">Izin Asatidz</span>
      <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd"
          d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
          clip-rule="evenodd"></path>
      </svg>
    </button>
    <ul id="izinAsatidzByKurikulum" class="{{ request()->is('/kurikulum/izinAsatidz*') ? '' : 'hidden' }} space-y-2">
      @foreach ($lembagaSelainAsrama as $lembaga)
        @foreach (auth()->user()->lembaga as $lbg)
          @if ($lbg->id == $lembaga->id)
            <li class="{{ request()->is('kurikulum/izinAsatidz*') ? 'navbar-active' : '' }}">
              <a wire:navigate href="/{{ $lembaga->id }}/kurikulum/izinAsatidz"
                class="flex items-center ml-5 p-1 text-gray-900 rounded-lg dark:text-white">
                <i class="fa-solid fa-person-walking text-green-500"></i>
                <span class="ms-3">{{ $lembaga->nama_singkat }}</span>
              </a>
            </li>
          @endif
        @endforeach
      @endforeach
    </ul>
  </li>
  {{-- Izin Asatidz By Kurikulum End --}}

  {{-- Cek Presensi  Start --}}
  <li>
    <button type="button"
      class="flex p-1 items-center w-full text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
      aria-controls="dropdown-pages" data-collapse-toggle="cekPresensibyKurikulum">
      <i class="fa-solid fa-book text-green-500"></i>
      <span class="flex-1 ml-3 text-left">Cek Presensi</span>
      <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd"
          d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
          clip-rule="evenodd"></path>
      </svg>
    </button>
    <ul id="cekPresensibyKurikulum" class="{{ request()->is('*kurikulum/cekPresensi*') ? '' : 'hidden' }} space-y-2">
      @foreach ($lembagaSelainAsrama as $lembaga)
        @foreach (auth()->user()->lembaga as $lbg)
          @if ($lbg->id == $lembaga->id)
            <li class="{{ request()->is($lembaga->id . '/kurikulum/cekPresensi' . '*') ? 'navbar-active' : '' }}">
              <a wire:navigate href="/{{ $lembaga->id }}/kurikulum/cekPresensi"
                class="flex items-center ml-5 p-1 text-gray-900 rounded-lg dark:text-white">
                <i class="fa-solid fa-book text-green-500"></i>
                <span class="ms-3">{{ $lembaga->nama_singkat ?? $lembaga->nama }}</span>
              </a>
            </li>
          @endif
        @endforeach
      @endforeach
    </ul>
  </li>
  {{-- Cek Presensi  End --}}


  {{-- cek presensi sholat santri by kurikulum start --}}
  <li>
    <button type="button"
      class="flex p-1 items-center w-full text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
      aria-controls="dropdown-pages" data-collapse-toggle="cekPresensiSholatSantriByKurikulum">
      <i class="fa-solid fa-book text-green-500"></i>
      <span class="flex-1 ml-3 text-left ">Cek Presensi Sholat Santri</span>
      <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd"
          d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
          clip-rule="evenodd"></path>
      </svg>
    </button>
    <ul id="cekPresensiSholatSantriByKurikulum"
      class="{{ request()->is('*/cekPresensiSholatSantri*') ? '' : 'hidden' }} space-y-2">
      @foreach ($lembagaSelainAsrama as $lembaga)
        @foreach (auth()->user()->lembaga as $lbg)
          @if ($lbg->id == $lembaga->id)
            <li class="{{ request()->is($lembaga->id . '/kurikulum/cekPresensiSholatSantri*') ? 'navbar-active' : '' }}">
              <a href="/{{ $lembaga->id }}/kurikulum/cekPresensiSholatSantri" wire:navigate
                class="flex items-center ml-5 p-1 text-gray-900 rounded-lg dark:text-white">
                <i class="fa-solid fa-book text-green-500"></i>
                <span class="ms-3">{{ $lembaga->nama_singkat }}</span>
              </a>
            </li>
          @endif
        @endforeach
      @endforeach
    </ul>
  </li>
  {{-- cek presensi sholat santri by kurikulum end --}}

  {{-- cek presensi insidentil santri  start --}}
  <li>
    <button type="button"
      class="flex p-1 items-center w-full text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
      aria-controls="dropdown-pages" data-collapse-toggle="cekPresensiInsidentilSantribyKurikulum">
      <i class="fa-solid fa-book text-green-500"></i>
      <span class="flex-1 ml-3 text-left ">Cek Presensi Insidentil Santri</span>
      <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd"
          d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
          clip-rule="evenodd"></path>
      </svg>
    </button>
    <ul id="cekPresensiInsidentilSantribyKurikulum"
      class="{{ request()->is('*/cekPresensiInsidentilSantri*') ? '' : 'hidden' }} space-y-2">
      @foreach ($lembagaSelainAsrama as $lembaga)
        @foreach (auth()->user()->lembaga as $lbg)
          @if ($lbg->id == $lembaga->id)
            <li
              class="{{ request()->is($lembaga->id . '/kurikulum/cekPresensiInsidentilSantri*') ? 'navbar-active' : '' }}">
              <a href="/{{ $lembaga->id }}/kurikulum/cekPresensiInsidentilSantri" wire:navigate
                class="flex items-center ml-5 p-1 text-gray-900 rounded-lg dark:text-white">
                <i class="fa-solid fa-book text-green-500"></i>
                <span class="ms-3">{{ $lembaga->nama_singkat }}</span>
              </a>
            </li>
          @endif
        @endforeach
      @endforeach
    </ul>
  </li>
  {{-- cek presensi insidentil santri  end --}}



  {{-- Catatan Asatidz Start --}}
  <li>
    <button type="button"
      class="flex p-1 items-center w-full text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
      aria-controls="dropdown-pages" data-collapse-toggle="catatanAsatidzByKurikulum">
      <i class="fa-solid fa-book text-amber-500"></i>
      <span class="flex-1 ml-3 text-left ">Catatan Asatidz</span>
      <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
        xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd"
          d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
          clip-rule="evenodd"></path>
      </svg>
    </button>
    <ul id="catatanAsatidzByKurikulum"
      class="{{ request()->is('*catatanAsatidz*') ? '' : 'hidden' }} space-y-2 border-slate-500 border-s">
      @if ($lembagas)
        @foreach ($lembagas as $lembaga)
          @foreach (auth()->user()->lembaga as $lbg)
            @if ($lbg->id == $lembaga->id)
              <li class="{{ request()->is($lembaga->id . '*/catatanAsatidz') ? 'navbar-active' : '' }}">
                <a wire:navigate href="/{{ $lembaga->id }}/kurikulum/catatanAsatidz"
                  class="flex items-center ml-3 p-1 text-gray-900 rounded-lg dark:text-white">
                  <i class="fa-solid fa-book text-amber-500"></i>
                  <span class="ms-3">{{ $lembaga->nama_singkat ? $lembaga->nama_singkat : $lembaga->nama }}</span>
                </a>
              </li>
            @endif
          @endforeach
        @endforeach
      @endif
    </ul>
  </li>
  {{-- Catatan Asatidz End --}}

@endhasrole
