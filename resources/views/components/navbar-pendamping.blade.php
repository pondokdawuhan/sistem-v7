@hasrole(['Super Admin', 'Pendamping'])
  <h6 class="my-3 text-slate-900 dark:text-white border-b italic">Pendamping</h6>


  {{-- Izin Keluar Santri Start --}}
  <li>
    <button type="button"
      class="flex p-1 items-center w-full text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
      aria-controls="dropdown-pages" data-collapse-toggle="izinKeluarSantriByPendamping">
      <i class="fa-solid fa-person-walking text-red-500"></i>
      <span class="flex-1 ml-3 text-left ">Izin Keluar Santri</span>
      <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd"
          d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
          clip-rule="evenodd"></path>
      </svg>
    </button>
    <ul id="izinKeluarSantriByPendamping"
      class="{{ request()->is('*pendamping/izinKeluarSantri*') ? '' : 'hidden' }} space-y-2">
      @foreach ($lembagaAsramas as $lembaga)
        @foreach (auth()->user()->lembaga as $lbg)
          @if ($lbg->id == $lembaga->id)
            <li class="{{ request()->is($lembaga->id . '/pendamping/izinKeluarSantri*') ? 'navbar-active' : '' }}">
              <a href="/{{ $lembaga->id }}/pendamping/izinKeluarSantri" wire:navigate
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
      aria-controls="dropdown-pages" data-collapse-toggle="izinPulangSantriByPendamping">
      <i class="fa-solid fa-person-walking text-red-500"></i>
      <span class="flex-1 ml-3 text-left ">Izin Pulang Santri</span>
      <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd"
          d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
          clip-rule="evenodd"></path>
      </svg>
    </button>
    <ul id="izinPulangSantriByPendamping"
      class="{{ request()->is('*pendamping/izinPulangSantri*') ? '' : 'hidden' }} space-y-2">
      @foreach ($lembagaAsramas as $lembaga)
        @foreach (auth()->user()->lembaga as $lbg)
          @if ($lbg->id == $lembaga->id)
            <li class="{{ request()->is($lembaga->id . '/pendamping/izinPulangSantri*') ? 'navbar-active' : '' }}">
              <a href="/{{ $lembaga->id }}/pendamping/izinPulangSantri" wire:navigate
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
      aria-controls="dropdown-pages" data-collapse-toggle="izinSakitSantriByPendamping">
      <i class="fa-solid fa-person-walking text-red-500"></i>
      <span class="flex-1 ml-3 text-left ">Izin Sakit Santri</span>
      <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd"
          d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
          clip-rule="evenodd"></path>
      </svg>
    </button>
    <ul id="izinSakitSantriByPendamping"
      class="{{ request()->is('*pendamping/izinSakitSantri*') ? '' : 'hidden' }} space-y-2">
      @foreach ($lembagaAsramas as $lembaga)
        @foreach (auth()->user()->lembaga as $lbg)
          @if ($lbg->id == $lembaga->id)
            <li class="{{ request()->is($lembaga->id . '/pendamping/izinSakitSantri*') ? 'navbar-active' : '' }}">
              <a href="/{{ $lembaga->id }}/pendamping/izinSakitSantri" wire:navigate
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
    class="{{ request()->is('pendamping/izinKeluarPendamping*') || request()->is('pendamping/detailIzinKeluarPendamping*') ? 'navbar-active' : '' }}">
    <a wire:navigate href="/pendamping/izinKeluarPendamping"
      class="flex items-center p-1 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
      <i class="fa-solid fa-person-walking text-red-500"></i>
      <span class="ms-3">Izin Keluar pendamping (Pendamping)</span>
    </a>
  </li>
  {{-- Izin Keluar pendamping End --}}

  {{-- Izin Pulang pendamping Start --}}
  <li
    class="{{ request()->is('pendamping/izinPulangPendamping*') || request()->is('pendamping/detailIzinPulangPendamping*') ? 'navbar-active' : '' }}">
    <a wire:navigate href="/pendamping/izinPulangPendamping"
      class="flex items-center p-1 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
      <i class="fa-solid fa-person-walking text-red-500"></i>
      <span class="ms-3">Izin Pulang pendamping (pendamping)</span>
    </a>
  </li>
  {{-- Izin Pulang pendamping End --}}

  {{-- Santri Haid Start --}}
  @if (auth()->user()->dataUser)
    @if (auth()->user()->dataUser->jenis_kelamin == 'Perempuan')
      <li class="{{ request()->is('pendamping/haidSantri*') ? 'navbar-active' : '' }}">
        <a wire:navigate href="/pendamping/haidSantri"
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
      aria-controls="dropdown-pages" data-collapse-toggle="presensiSholatBypendamping">
      <i class="fa-solid fa-book text-green-500"></i>
      <span class="flex-1 ml-3 text-left ">Presensi Sholat</span>
      <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd"
          d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
          clip-rule="evenodd"></path>
      </svg>
    </button>
    <ul id="presensiSholatBypendamping"
      class="{{ request()->is('*pendamping/presensiSholat*') ? '' : 'hidden' }} space-y-2">
      @foreach ($lembagaAsramas as $lembaga)
        @foreach (auth()->user()->lembaga as $lbg)
          @if ($lbg->id == $lembaga->id)
            <li class="{{ request()->is($lembaga->id . '/pendamping/presensiSholat*') ? 'navbar-active' : '' }}">
              <a href="/{{ $lembaga->id }}/pendamping/presensiSholat" wire:navigate
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


  {{-- catatan santri start --}}
  <li>
    <button type="button"
      class="flex p-1 items-center w-full text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
      aria-controls="dropdown-pages" data-collapse-toggle="catatanSantriBypendamping">
      <i class="fa-solid fa-book text-green-500"></i>
      <span class="flex-1 ml-3 text-left ">Catatan Santri</span>
      <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
        xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd"
          d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
          clip-rule="evenodd"></path>
      </svg>
    </button>
    <ul id="catatanSantriBypendamping"
      class="{{ request()->is('*/pendamping/catatanSantri*') ? '' : 'hidden' }} space-y-2">
      @foreach ($lembagaAsramas as $lembaga)
        @foreach (auth()->user()->lembaga as $lbg)
          @if ($lbg->id == $lembaga->id)
            <li class="{{ request()->is($lembaga->id . '/pendamping/catatanSantri*') ? 'navbar-active' : '' }}">
              <a href="/{{ $lembaga->id }}/pendamping/catatanSantri" wire:navigate
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
      aria-controls="dropdown-pages" data-collapse-toggle="pembinaanSantriBypendamping">
      <i class="fa-solid fa-book text-blue-500"></i>
      <span class="flex-1 ml-3 text-left ">Pembinaan Santri</span>
      <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
        xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd"
          d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
          clip-rule="evenodd"></path>
      </svg>
    </button>
    <ul id="pembinaanSantriBypendamping"
      class="{{ request()->is('*/pendamping/pembinaanSantri*') ? '' : 'hidden' }} space-y-2">
      @foreach ($lembagaAsramas as $lembaga)
        @foreach (auth()->user()->lembaga as $lbg)
          @if ($lbg->id == $lembaga->id)
            <li class="{{ request()->is($lembaga->id . '/pendamping/pembinaanSantri*') ? 'navbar-active' : '' }}">
              <a href="/{{ $lembaga->id }}/pendamping/pembinaanSantri" wire:navigate
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


  {{-- presensi asrama start --}}
  <li>
    <button type="button"
      class="flex p-1 items-center w-full text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
      aria-controls="dropdown-pages" data-collapse-toggle="presensiAsramaBypendamping">
      <i class="fa-solid fa-book text-green-500"></i>
      <span class="flex-1 ml-3 text-left ">Presensi Asrama</span>
      <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
        xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd"
          d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
          clip-rule="evenodd"></path>
      </svg>
    </button>
    <ul id="presensiAsramaBypendamping"
      class="{{ request()->is('*/pendamping/presensiAsrama*') ? '' : 'hidden' }} space-y-2">
      @foreach ($lembagaAsramas as $lembaga)
        @foreach (auth()->user()->lembaga as $lbg)
          @if ($lbg->id == $lembaga->id)
            <li class="{{ request()->is($lembaga->id . '/pendamping/presensiAsrama*') ? 'navbar-active' : '' }}">
              <a href="/{{ $lembaga->id }}/pendamping/presensiAsrama" wire:navigate
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

  {{-- presensi insidentil santri by pendamping start --}}
  <li>
    <button type="button"
      class="flex p-1 items-center w-full text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
      aria-controls="dropdown-pages" data-collapse-toggle="presensiInsidentilSantriBypendamping">
      <i class="fa-solid fa-book text-green-500"></i>
      <span class="flex-1 ml-3 text-left ">Presensi Insidentil Santri</span>
      <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
        xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd"
          d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
          clip-rule="evenodd"></path>
      </svg>
    </button>
    <ul id="presensiInsidentilSantriBypendamping"
      class="{{ request()->is('*/presensiInsidentilSantri*') ? '' : 'hidden' }} space-y-2">
      @foreach ($lembagaAsramas as $lembaga)
        @foreach (auth()->user()->lembaga as $lbg)
          @if ($lbg->id == $lembaga->id)
            <li
              class="{{ request()->is($lembaga->id . '/pendamping/presensiInsidentilSantri*') ? 'navbar-active' : '' }}">
              <a href="/{{ $lembaga->id }}/pendamping/presensiInsidentilSantri" wire:navigate
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
  {{-- presensi insidentil santri by pendamping start --}}
@endhasrole
