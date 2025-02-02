@hasrole(['Super Admin', 'Ketua Asrama'])
  <h6 class="my-3 text-slate-900 dark:text-white border-b italic">Ketua Asrama</h6>
  {{-- Presensi Sholat Pendamping Start --}}


  {{-- presensi Sholat asatidz  start --}}
  <li>
    <button type="button"
      class="flex p-1 items-center w-full text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
      aria-controls="dropdown-pages" data-collapse-toggle="presensiSholatPendampingByKetuaAsrama">
      <i class="fa-solid fa-book text-green-500"></i>
      <span class="flex-1 ml-3 text-left ">Presensi Sholat Pendamping</span>
      <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd"
          d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
          clip-rule="evenodd"></path>
      </svg>
    </button>
    <ul id="presensiSholatPendampingByKetuaAsrama"
      class="{{ request()->is('*/presensiSholatPendamping*') ? '' : 'hidden' }} space-y-2">
      @foreach ($lembagaAsramas as $lembaga)
        @foreach (auth()->user()->lembaga as $lbg)
          @if ($lbg->id == $lembaga->id)
            <li class="{{ request()->is($lembaga->id . '/presensiSholatPendamping*') ? 'navbar-active' : '' }}">
              <a href="/{{ $lembaga->id }}/presensiSholatPendamping" wire:navigate
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
  {{-- presensi kegiatan asatidz  end --}}

  {{-- presensi kegiatan asatidz  start --}}
  <li>
    <button type="button"
      class="flex p-1 items-center w-full text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
      aria-controls="dropdown-pages" data-collapse-toggle="presensiKegiatanAsatidzbyKetuaAsrama">
      <i class="fa-solid fa-book text-green-500"></i>
      <span class="flex-1 ml-3 text-left ">Presensi Kegiatan Pendamping</span>
      <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd"
          d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
          clip-rule="evenodd"></path>
      </svg>
    </button>
    <ul id="presensiKegiatanAsatidzbyKetuaAsrama"
      class="{{ request()->is('*/presensiKegiatanAsatidz*') ? '' : 'hidden' }} space-y-2">
      @foreach ($lembagaAsramas as $lembaga)
        @foreach (auth()->user()->lembaga as $lbg)
          @if ($lbg->id == $lembaga->id)
            <li
              class="{{ request()->is($lembaga->id . '/ketuaasrama/presensiKegiatanAsatidz*') ? 'navbar-active' : '' }}">
              <a href="/{{ $lembaga->id }}/ketuaasrama/presensiKegiatanAsatidz" wire:navigate
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
  {{-- presensi kegiatan asatidz  end --}}

  {{-- cek presensi sholat santri by ketua asrama start --}}
  <li>
    <button type="button"
      class="flex p-1 items-center w-full text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
      aria-controls="dropdown-pages" data-collapse-toggle="cekPresensiSholatSantri">
      <i class="fa-solid fa-book text-green-500"></i>
      <span class="flex-1 ml-3 text-left ">Cek Presensi Sholat Santri</span>
      <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd"
          d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
          clip-rule="evenodd"></path>
      </svg>
    </button>
    <ul id="cekPresensiSholatSantri" class="{{ request()->is('*/cekPresensiSholatSantri*') ? '' : 'hidden' }} space-y-2">
      @foreach ($lembagaAsramas as $lembaga)
        @foreach (auth()->user()->lembaga as $lbg)
          @if ($lbg->id == $lembaga->id)
            <li
              class="{{ request()->is($lembaga->id . '/ketuaasrama/cekPresensiSholatSantri*') ? 'navbar-active' : '' }}">
              <a href="/{{ $lembaga->id }}/ketuaasrama/cekPresensiSholatSantri" wire:navigate
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
  {{-- cek presensi sholat santri by ketua asrama end --}}


  {{-- cek presensi insidentil santri  start --}}
  <li>
    <button type="button"
      class="flex p-1 items-center w-full text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
      aria-controls="dropdown-pages" data-collapse-toggle="cekPresensiInsidentilSantribyKetuaAsrama">
      <i class="fa-solid fa-book text-green-500"></i>
      <span class="flex-1 ml-3 text-left ">Cek Presensi Insidentil Santri</span>
      <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd"
          d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
          clip-rule="evenodd"></path>
      </svg>
    </button>
    <ul id="cekPresensiInsidentilSantribyKetuaAsrama"
      class="{{ request()->is('*/cekPresensiInsidentilSantri*') ? '' : 'hidden' }} space-y-2">
      @foreach ($lembagaAsramas as $lembaga)
        @foreach (auth()->user()->lembaga as $lbg)
          @if ($lbg->id == $lembaga->id)
            <li
              class="{{ request()->is($lembaga->id . '/ketuaasrama/cekPresensiInsidentilSantri*') ? 'navbar-active' : '' }}">
              <a href="/{{ $lembaga->id }}/ketuaasrama/cekPresensiInsidentilSantri" wire:navigate
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

  {{-- cek presensi asrama start --}}
  <li>
    <button type="button"
      class="flex p-1 items-center w-full text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
      aria-controls="dropdown-pages" data-collapse-toggle="cekPresensiAsramabyKetuaAsrama">
      <i class="fa-solid fa-book text-green-500"></i>
      <span class="flex-1 ml-3 text-left ">Cek Presensi Asrama</span>
      <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd"
          d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
          clip-rule="evenodd"></path>
      </svg>
    </button>
    <ul id="cekPresensiAsramabyKetuaAsrama"
      class="{{ request()->is('*/cekPresensiAsrama*') ? '' : 'hidden' }} space-y-2">
      @foreach ($lembagaAsramas as $lembaga)
        @foreach (auth()->user()->lembaga as $lbg)
          @if ($lbg->id == $lembaga->id)
            <li class="{{ request()->is($lembaga->id . '/ketuaasrama/cekPresensiAsrama*') ? 'navbar-active' : '' }}">
              <a href="/{{ $lembaga->id }}/ketuaasrama/cekPresensiAsrama" wire:navigate
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
  {{-- cek presensi asrama end --}}

  {{-- pembinaan santri start --}}
  <li>
    <button type="button"
      class="flex p-1 items-center w-full text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
      aria-controls="dropdown-pages" data-collapse-toggle="pembinaanSantriByKetuaAsrama">
      <i class="fa-solid fa-book text-blue-500"></i>
      <span class="flex-1 ml-3 text-left ">Pembinaan Santri</span>
      <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
        xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd"
          d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
          clip-rule="evenodd"></path>
      </svg>
    </button>
    <ul id="pembinaanSantriByKetuaAsrama"
      class="{{ request()->is('*/ketuaAsrama/pembinaanSantri*') ? '' : 'hidden' }} space-y-2">
      @foreach ($lembagaAsramas as $lembaga)
        @foreach (auth()->user()->lembaga as $lbg)
          @if ($lbg->id == $lembaga->id)
            <li class="{{ request()->is($lembaga->id . '/ketuaAsrama/pembinaanSantri*') ? 'navbar-active' : '' }}">
              <a href="/{{ $lembaga->id }}/ketuaAsrama/pembinaanSantri" wire:navigate
                class="flex items-center ml-5 p-1 text-gray-900 rounded-lg dark:text-white">
                <i class="fa-solid fa-book text-blue-500"></i>
                <span class="ms-3">{{ $lembaga->nama_singkat }}</span>
              </a>
            </li>
          @endif
        @endforeach
      @endforeach
    </ul>
  </li>
  {{-- pembinaan santri end --}}

  {{-- Rapor Pendamping start --}}
  <li>
    <button type="button"
      class="flex p-1 items-center w-full text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
      aria-controls="dropdown-pages" data-collapse-toggle="raporPendampingbyketuaasrama">
      <i class="fa-solid fa-book text-green-500"></i>
      <span class="flex-1 ml-3 text-left ">Rapor Pendamping</span>
      <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
        xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd"
          d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
          clip-rule="evenodd"></path>
      </svg>
    </button>
    <ul id="raporPendampingbyketuaasrama" class="{{ request()->is('*/raporPendamping*') ? '' : 'hidden' }} space-y-2">

      @if ($lembagas)
        @foreach ($lembagaAsramas as $lembaga)
          <li class="{{ request()->is($lembaga->id . '/ketuaasrama/raporPendamping*') ? 'navbar-active' : '' }}">
            <a href="/{{ $lembaga->id }}/ketuaasrama/raporPendamping" wire:navigate
              class="flex items-center ml-5 p-1 text-gray-900 rounded-lg dark:text-white">
              <i class="fa-solid fa-book text-green-500"></i>
              <span class="ms-3">{{ $lembaga->nama_singkat }}</span>
            </a>
          </li>
        @endforeach
      @endif
    </ul>
  </li>
  {{-- Rapor Pendamping end --}}


  {{-- Izin Keluar Santri Start --}}
  <li>
    <button type="button"
      class="flex p-1 items-center w-full text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
      aria-controls="dropdown-pages" data-collapse-toggle="izinKeluarSantriByKetuaAsrama">
      <i class="fa-solid fa-person-walking text-red-500"></i>
      <span class="flex-1 ml-3 text-left ">Izin Keluar Santri</span>
      <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
        xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd"
          d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
          clip-rule="evenodd"></path>
      </svg>
    </button>
    <ul id="izinKeluarSantriByKetuaAsrama"
      class="{{ request()->is('*ketuaasrama/izinKeluarSantri*') ? '' : 'hidden' }} space-y-2">
      @foreach ($lembagaAsramas as $lembaga)
        @foreach (auth()->user()->lembaga as $lbg)
          @if ($lbg->id == $lembaga->id)
            <li class="{{ request()->is($lembaga->id . '/ketuaasrama/izinKeluarSantri*') ? 'navbar-active' : '' }}">
              <a href="/{{ $lembaga->id }}/ketuaasrama/izinKeluarSantri" wire:navigate
                class="flex items-center ml-5 p-1 text-gray-900 rounded-lg dark:text-white">
                <i class="fa-solid fa-person-walking text-red-500"></i>
                <span class="ms-3">{{ $lembaga->nama_singkat }}</span>
              </a>
            </li>
          @endif
        @endforeach
      @endforeach

    </ul>
  </li>
  {{-- Izin Keluar Santri End --}}

  {{-- Izin Pulang Santri Start --}}
  <li>
    <button type="button"
      class="flex p-1 items-center w-full text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
      aria-controls="dropdown-pages" data-collapse-toggle="izinPulangSantriByKetuaAsrama">
      <i class="fa-solid fa-person-walking text-red-500"></i>
      <span class="flex-1 ml-3 text-left ">Izin Pulang Santri</span>
      <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
        xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd"
          d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
          clip-rule="evenodd"></path>
      </svg>
    </button>
    <ul id="izinPulangSantriByKetuaAsrama"
      class="{{ request()->is('*ketuaasrama/izinPulangSantri*') ? '' : 'hidden' }} space-y-2">
      @foreach ($lembagaAsramas as $lembaga)
        @foreach (auth()->user()->lembaga as $lbg)
          @if ($lbg->id == $lembaga->id)
            <li class="{{ request()->is($lembaga->id . '/ketuaasrama/izinPulangSantri*') ? 'navbar-active' : '' }}">
              <a href="/{{ $lembaga->id }}/ketuaasrama/izinPulangSantri" wire:navigate
                class="flex items-center ml-5 p-1 text-gray-900 rounded-lg dark:text-white">
                <i class="fa-solid fa-person-walking text-red-500"></i>
                <span class="ms-3">{{ $lembaga->nama_singkat }}</span>
              </a>
            </li>
          @endif
        @endforeach
      @endforeach

    </ul>
  </li>
  {{-- Izin Pulang Santri End --}}


  {{-- Izin Keluar pendamping Start --}}
  <li
    class="{{ request()->is('ketuaasrama/izinKeluarPendamping*') || request()->is('ketuaasrama/detailIzinKeluarPendamping*') ? 'navbar-active' : '' }}">
    <a wire:navigate href="/ketuaasrama/izinKeluarPendamping"
      class="flex items-center p-1 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
      <i class="fa-solid fa-person-walking text-red-500"></i>
      <span class="ms-3">Izin Keluar Pendamping</span>
    </a>
  </li>
  {{-- Izin Keluar pendamping End --}}


  {{-- Izin Pulang ketuaasrama Start --}}
  <li
    class="{{ request()->is('ketuaasrama/izinPulangPendamping*') || request()->is('ketuaasrama/detailIzinPulangPendamping*') ? 'navbar-active' : '' }}">
    <a wire:navigate href="/ketuaasrama/izinPulangPendamping"
      class="flex items-center p-1 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
      <i class="fa-solid fa-person-walking text-red-500"></i>
      <span class="ms-3">Izin Pulang pendamping</span>
    </a>
  </li>
  {{-- Izin Pulang ketuaasrama End --}}

@endhasrole
