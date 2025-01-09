@hasrole(['Super Admin', 'Pengurus'])
  <h6 class="my-3 text-slate-900 dark:text-white border-b italic">Pengurus</h6>

  {{-- Izin Keluar Santri Start --}}
  <li>
    <button type="button"
      class="flex p-1 items-center w-full text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
      aria-controls="dropdown-pages" data-collapse-toggle="izinKeluarSantriByPengurus">
      <i class="fa-solid fa-person-walking text-red-500"></i>
      <span class="flex-1 ml-3 text-left ">Izin Keluar Santri</span>
      <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd"
          d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
          clip-rule="evenodd"></path>
      </svg>
    </button>
    <ul id="izinKeluarSantriByPengurus"
      class="{{ request()->is('*pengurus/izinKeluarSantri*') ? '' : 'hidden' }} space-y-2">
      @foreach ($lembagaAsramas as $lembaga)
        @foreach (auth()->user()->lembaga as $lbg)
          @if ($lbg->id == $lembaga->id)
            <li class="{{ request()->is($lembaga->id . '/pengurus/izinKeluarSantri*') ? 'navbar-active' : '' }}">
              <a href="/{{ $lembaga->id }}/pengurus/izinKeluarSantri" wire:navigate
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
      aria-controls="dropdown-pages" data-collapse-toggle="izinPulangSantriByPengurus">
      <i class="fa-solid fa-person-walking text-red-500"></i>
      <span class="flex-1 ml-3 text-left ">Izin Pulang Santri</span>
      <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd"
          d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
          clip-rule="evenodd"></path>
      </svg>
    </button>
    <ul id="izinPulangSantriByPengurus"
      class="{{ request()->is('*pengurus/izinPulangSantri*') ? '' : 'hidden' }} space-y-2">
      @foreach ($lembagaAsramas as $lembaga)
        @foreach (auth()->user()->lembaga as $lbg)
          @if ($lbg->id == $lembaga->id)
            <li class="{{ request()->is($lembaga->id . '/pengurus/izinPulangSantri*') ? 'navbar-active' : '' }}">
              <a href="/{{ $lembaga->id }}/pengurus/izinPulangSantri" wire:navigate
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

  {{-- Izin Sakit Santri Start --}}
  <li>
    <button type="button"
      class="flex p-1 items-center w-full text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
      aria-controls="dropdown-pages" data-collapse-toggle="izinSakitSantriByPengurus">
      <i class="fa-solid fa-person-walking text-red-500"></i>
      <span class="flex-1 ml-3 text-left ">Izin Sakit Santri</span>
      <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd"
          d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
          clip-rule="evenodd"></path>
      </svg>
    </button>
    <ul id="izinSakitSantriByPengurus"
      class="{{ request()->is('*pengurus/izinSakitSantri*') ? '' : 'hidden' }} space-y-2">
      @foreach ($lembagaAsramas as $lembaga)
        @foreach (auth()->user()->lembaga as $lbg)
          @if ($lbg->id == $lembaga->id)
            <li class="{{ request()->is($lembaga->id . '/pengurus/izinSakitSantri*') ? 'navbar-active' : '' }}">
              <a href="/{{ $lembaga->id }}/pengurus/izinSakitSantri" wire:navigate
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
  {{-- Izin Sakit Santri End --}}


  {{-- Izin Keluar pendamping Start --}}
  <li
    class="{{ request()->is('pengurus/izinKeluarPendamping*') || request()->is('pengurus/detailIzinKeluarPendamping*') ? 'navbar-active' : '' }}">
    <a wire:navigate href="/pengurus/izinKeluarPendamping"
      class="flex items-center p-1 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
      <i class="fa-solid fa-person-walking text-red-500"></i>
      <span class="ms-3">Izin Keluar pendamping (pengurus)</span>
    </a>
  </li>
  {{-- Izin Keluar pendamping End --}}


  {{-- Izin Pulang pengurus Start --}}
  <li
    class="{{ request()->is('pengurus/izinPulangPendamping*') || request()->is('pengurus/detailIzinPulangPendamping*') ? 'navbar-active' : '' }}">
    <a wire:navigate href="/pengurus/izinPulangPendamping"
      class="flex items-center p-1 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
      <i class="fa-solid fa-person-walking text-red-500"></i>
      <span class="ms-3">Izin Pulang pendamping (pengurus)</span>
    </a>
  </li>
  {{-- Izin Pulang pengurus End --}}

  {{-- Santri Haid Start --}}
  @if (auth()->user()->dataUser)
    @if (auth()->user()->dataUser->jenis_kelamin == 'Perempuan')
      <li class="{{ request()->is('pengurus/haidSantri*') ? 'navbar-active' : '' }}">
        <a wire:navigate href="/pengurus/haidSantri"
          class="flex items-center p-1 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
          <i class="fa-solid fa-person-dress text-red-500"></i>
          <span class="ms-3">Santri Haid</span>
        </a>
      </li>
    @endif
  @endif
  {{-- Santri Haid End --}}

  {{-- Presensi Sholat Start --}}
  <li>
    <button type="button"
      class="flex p-1 items-center w-full text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
      aria-controls="dropdown-pages" data-collapse-toggle="presensiSholatByPengurus">
      <i class="fa-solid fa-book text-green-500"></i>
      <span class="flex-1 ml-3 text-left ">Presensi Sholat</span>
      <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd"
          d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
          clip-rule="evenodd"></path>
      </svg>
    </button>
    <ul id="presensiSholatByPengurus" class="{{ request()->is('*pengurus/presensiSholat*') ? '' : 'hidden' }} space-y-2">
      @foreach ($lembagaAsramas as $lembaga)
        @foreach (auth()->user()->lembaga as $lbg)
          @if ($lbg->id == $lembaga->id)
            <li class="{{ request()->is($lembaga->id . '/pengurus/presensiSholat*') ? 'navbar-active' : '' }}">
              <a href="/{{ $lembaga->id }}/pengurus/presensiSholat" wire:navigate
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
  {{-- Presensi Sholat End --}}

  {{-- Pelanggaran Santri  Start --}}
  <li>
    <button type="button"
      class="flex p-1 items-center w-full text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
      aria-controls="dropdown-pages" data-collapse-toggle="pelanggaranByPengurus">
      <i class="fa-solid fa-book text-red-500"></i>
      <span class="flex-1 ml-3 text-left ">Pelanggaran Santri</span>
      <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
        xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd"
          d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
          clip-rule="evenodd"></path>
      </svg>
    </button>
    <ul id="pelanggaranByPengurus"
      class="{{ request()->is('*pengurus/pelanggaranSantri*') ? '' : 'hidden' }} space-y-2">
      @foreach ($lembagaAsramas as $lembaga)
        @foreach (auth()->user()->lembaga as $lbg)
          @if ($lbg->id == $lembaga->id)
            <li class="{{ request()->is($lembaga->id . '/pengurus/pelanggaranSantri*') ? 'navbar-active' : '' }}">
              <a href="/{{ $lembaga->id }}/pengurus/pelanggaranSantri" wire:navigate
                class="flex items-center ml-5 p-1 text-gray-900 rounded-lg dark:text-white">
                <i class="fa-solid fa-book text-red-500"></i>
                <span class="ms-3">{{ $lembaga->nama_singkat }}</span>
              </a>
            </li>
          @endif
        @endforeach
      @endforeach

    </ul>
  </li>
  {{-- Pelanggaran Santri  End --}}


  {{-- penghargaan Santri  Start --}}
  <li>
    <button type="button"
      class="flex p-1 items-center w-full text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
      aria-controls="dropdown-pages" data-collapse-toggle="penghargaanByPengurus">
      <i class="fa-solid fa-book text-green-500"></i>
      <span class="flex-1 ml-3 text-left ">Penghargaan Santri</span>
      <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
        xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd"
          d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
          clip-rule="evenodd"></path>
      </svg>
    </button>
    <ul id="penghargaanByPengurus"
      class="{{ request()->is('*pengurus/penghargaanSantri*') ? '' : 'hidden' }} space-y-2">
      @foreach ($lembagaAsramas as $lembaga)
        @foreach (auth()->user()->lembaga as $lbg)
          @if ($lbg->id == $lembaga->id)
            <li class="{{ request()->is($lembaga->id . '/pengurus/penghargaanSantri*') ? 'navbar-active' : '' }}">
              <a href="/{{ $lembaga->id }}/pengurus/penghargaanSantri" wire:navigate
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
  {{-- penghargaan Santri  End --}}

  {{-- penguranganPoin Santri  Start --}}
  <li>
    <button type="button"
      class="flex p-1 items-center w-full text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
      aria-controls="dropdown-pages" data-collapse-toggle="penguranganPoinByPengurus">
      <i class="fa-solid fa-book text-green-500"></i>
      <span class="flex-1 ml-3 text-left ">Pengurangan Poin Santri</span>
      <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
        xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd"
          d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
          clip-rule="evenodd"></path>
      </svg>
    </button>
    <ul id="penguranganPoinByPengurus"
      class="{{ request()->is('*pengurus/penguranganPoin*') ? '' : 'hidden' }} space-y-2">
      @foreach ($lembagaAsramas as $lembaga)
        @foreach (auth()->user()->lembaga as $lbg)
          @if ($lbg->id == $lembaga->id)
            <li class="{{ request()->is($lembaga->id . '/pengurus/penguranganPoin*') ? 'navbar-active' : '' }}">
              <a href="/{{ $lembaga->id }}/pengurus/penguranganPoin" wire:navigate
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
  {{-- penguranganPoin Santri  End --}}




  {{-- catatan santri start --}}
  <li>
    <button type="button"
      class="flex p-1 items-center w-full text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
      aria-controls="dropdown-pages" data-collapse-toggle="catatanSantriBypengurus">
      <i class="fa-solid fa-book text-green-500"></i>
      <span class="flex-1 ml-3 text-left ">Catatan Santri</span>
      <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
        xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd"
          d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
          clip-rule="evenodd"></path>
      </svg>
    </button>
    <ul id="catatanSantriBypengurus"
      class="{{ request()->is('*/pengurus/catatanSantri*') ? '' : 'hidden' }} space-y-2">
      @foreach ($lembagaAsramas as $lembaga)
        @foreach (auth()->user()->lembaga as $lbg)
          @if ($lbg->id == $lembaga->id)
            <li class="{{ request()->is($lembaga->id . '/pengurus/catatanSantri*') ? 'navbar-active' : '' }}">
              <a href="/{{ $lembaga->id }}/pengurus/catatanSantri" wire:navigate
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
  {{-- catatan santri end --}}


  {{-- pembinaan santri start --}}
  <li>
    <button type="button"
      class="flex p-1 items-center w-full text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
      aria-controls="dropdown-pages" data-collapse-toggle="pembinaanSantriBypengurus">
      <i class="fa-solid fa-book text-blue-500"></i>
      <span class="flex-1 ml-3 text-left ">Pembinaan Santri</span>
      <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
        xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd"
          d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
          clip-rule="evenodd"></path>
      </svg>
    </button>
    <ul id="pembinaanSantriBypengurus"
      class="{{ request()->is('*/pengurus/pembinaanSantri*') ? '' : 'hidden' }} space-y-2">
      @foreach ($lembagaAsramas as $lembaga)
        @foreach (auth()->user()->lembaga as $lbg)
          @if ($lbg->id == $lembaga->id)
            <li class="{{ request()->is($lembaga->id . '/pengurus/pembinaanSantri*') ? 'navbar-active' : '' }}">
              <a href="/{{ $lembaga->id }}/pengurus/pembinaanSantri" wire:navigate
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

  {{-- presensi insidentil santri by pengurus start --}}
  <li>
    <button type="button"
      class="flex p-1 items-center w-full text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
      aria-controls="dropdown-pages" data-collapse-toggle="presensiInsidentilSantriByPengurus">
      <i class="fa-solid fa-book text-green-500"></i>
      <span class="flex-1 ml-3 text-left ">Presensi Insidentil Santri</span>
      <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
        xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd"
          d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
          clip-rule="evenodd"></path>
      </svg>
    </button>
    <ul id="presensiInsidentilSantriByPengurus"
      class="{{ request()->is('*/presensiInsidentilSantri*') ? '' : 'hidden' }} space-y-2">
      @foreach ($lembagaAsramas as $lembaga)
        @foreach (auth()->user()->lembaga as $lbg)
          @if ($lbg->id == $lembaga->id)
            <li
              class="{{ request()->is($lembaga->id . '/pengurus/presensiInsidentilSantri*') ? 'navbar-active' : '' }}">
              <a href="/{{ $lembaga->id }}/pengurus/presensiInsidentilSantri" wire:navigate
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
  {{-- presensi insidentil santri by pengurus start --}}


  {{-- presensi asrama start --}}
  <li>
    <button type="button"
      class="flex p-1 items-center w-full text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
      aria-controls="dropdown-pages" data-collapse-toggle="presensiAsramaBypengurus">
      <i class="fa-solid fa-book text-green-500"></i>
      <span class="flex-1 ml-3 text-left ">Presensi Asrama</span>
      <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
        xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd"
          d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
          clip-rule="evenodd"></path>
      </svg>
    </button>
    <ul id="presensiAsramaBypengurus"
      class="{{ request()->is('*/pengurus/presensiAsrama*') ? '' : 'hidden' }} space-y-2">
      @foreach ($lembagaAsramas as $lembaga)
        @foreach (auth()->user()->lembaga as $lbg)
          @if ($lbg->id == $lembaga->id)
            <li class="{{ request()->is($lembaga->id . '/pengurus/presensiAsrama*') ? 'navbar-active' : '' }}">
              <a href="/{{ $lembaga->id }}/pengurus/presensiAsrama" wire:navigate
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
  {{-- presensi asrama end --}}

@endhasrole
