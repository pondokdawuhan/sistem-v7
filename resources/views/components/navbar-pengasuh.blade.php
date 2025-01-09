@hasrole(['Super Admin', 'Pengasuh'])
  <h6 class="my-3 text-slate-900 dark:text-white border-b italic">Pengasuh</h6>


  {{-- Izin Pulang Santri Start --}}
  <li
    class="{{ request()->is('semua/pengasuh/izinPulangSantri*') || request()->is('semua/pengasuh/detailIzinPulangSantri*') ? 'navbar-active' : '' }}">
    <a wire:navigate href="/semua/pengasuh/izinPulangSantri"
      class="flex items-center p-1 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
      <i class="fa-solid fa-person-walking text-red-500"></i>
      <span class="ms-3">Izin Pulang Santri</span>
    </a>
  </li>
  {{-- Izin Pulang Santri End --}}


  {{-- Izin Pulang pengasuh Start --}}
  <li
    class="{{ request()->is('pengasuh/izinPulangPendamping*') || request()->is('pengasuh/detailIzinPulangPendamping*') ? 'navbar-active' : '' }}">
    <a wire:navigate href="/pengasuh/izinPulangPendamping"
      class="flex items-center p-1 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
      <i class="fa-solid fa-person-walking text-red-500"></i>
      <span class="ms-3">Izin Pulang pendamping</span>
    </a>
  </li>
  {{-- Izin Pulang pengasuh End --}}
  
  {{-- Cek Presensi  Start --}}
  <li>
    <button type="button"
      class="flex p-1 items-center w-full text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
      aria-controls="dropdown-pages" data-collapse-toggle="cekPresensibyPengasuh">
      <i class="fa-solid fa-book text-green-500"></i>
      <span class="flex-1 ml-3 text-left ">Cek Presensi</span>
      <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd"
          d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
          clip-rule="evenodd"></path>
      </svg>
    </button>
    <ul id="cekPresensibyPengasuh" class="{{ request()->is('*cekPresensi*') ? '' : 'hidden' }} space-y-2">
      @foreach ($lembagaSelainAsrama as $lembaga)
        <li class="{{ request()->is($lembaga->id . '/pengasuh/cekPresensi' . '*') ? 'navbar-active' : '' }}">
          <a wire:navigate href="/{{ $lembaga->id }}/pengasuh/cekPresensi"
            class="flex items-center ml-5 p-1 text-gray-900 rounded-lg dark:text-white">
            <i class="fa-solid fa-book text-green-500"></i>
            <span class="ms-3">{{ $lembaga->nama_singkat ?? $lembaga->nama }}</span>
          </a>
        </li>
      @endforeach
    </ul>
  </li>
  {{-- Cek Presensi  End --}}

  {{-- cek presensi sholat santri by Pengasuh start --}}
  <li>
    <button type="button"
      class="flex p-1 items-center w-full text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
      aria-controls="dropdown-pages" data-collapse-toggle="cekPresensiSholatSantriByPengasuh">
      <i class="fa-solid fa-book text-green-500"></i>
      <span class="flex-1 ml-3 text-left ">Cek Presensi Sholat Santri</span>
      <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd"
          d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
          clip-rule="evenodd"></path>
      </svg>
    </button>
    <ul id="cekPresensiSholatSantriByPengasuh"
      class="{{ request()->is('*/cekPresensiSholatSantri*') ? '' : 'hidden' }} space-y-2">
      @foreach (auth()->user()->lembaga as $lembaga)
        <li class="{{ request()->is($lembaga->id . '/pengasuh/cekPresensiSholatSantri*') ? 'navbar-active' : '' }}">
          <a href="/{{ $lembaga->id }}/pengasuh/cekPresensiSholatSantri" wire:navigate
            class="flex items-center ml-5 p-1 text-gray-900 rounded-lg dark:text-white">
            <i class="fa-solid fa-book text-green-500"></i>
            <span class="ms-3">{{ $lembaga->nama_singkat }}</span>
          </a>
        </li>
      @endforeach
    </ul>
  </li>
  {{-- cek presensi sholat santri by Pengasuh end --}}
  
  
  
  {{-- cek presensi asrama start --}}
  <li>
    <button type="button"
      class="flex p-1 items-center w-full text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
      aria-controls="dropdown-pages" data-collapse-toggle="cekPresensiAsramabyPengasuh">
      <i class="fa-solid fa-book text-green-500"></i>
      <span class="flex-1 ml-3 text-left ">Cek Presensi Asrama</span>
      <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd"
          d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
          clip-rule="evenodd"></path>
      </svg>
    </button>
    <ul id="cekPresensiAsramabyPengasuh" class="{{ request()->is('*/cekPresensiAsrama*') ? '' : 'hidden' }} space-y-2">
      @foreach ($lembagaAsramas as $lembaga)
        <li class="{{ request()->is($lembaga->id . '/pengasuh/cekPresensiAsrama*') ? 'navbar-active' : '' }}">
          <a href="/{{ $lembaga->id }}/pengasuh/cekPresensiAsrama" wire:navigate
            class="flex items-center ml-5 p-1 text-gray-900 rounded-lg dark:text-white">
            <i class="fa-solid fa-book text-green-500"></i>
            <span class="ms-3">{{ $lembaga->nama_singkat }}</span>
          </a>
        </li>
      @endforeach
    </ul>
  </li>
  {{-- cek presensi asrama end --}}

  {{-- cek presensi insidentil santri  start --}}
  <li>
    <button type="button"
      class="flex p-1 items-center w-full text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
      aria-controls="dropdown-pages" data-collapse-toggle="cekPresensiInsidentilSantribyPengasuh">
      <i class="fa-solid fa-book text-green-500"></i>
      <span class="flex-1 ml-3 text-left ">Cek Presensi Insidentil Santri</span>
      <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd"
          d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
          clip-rule="evenodd"></path>
      </svg>
    </button>
    <ul id="cekPresensiInsidentilSantribyPengasuh"
      class="{{ request()->is('*/cekPresensiInsidentilSantri*') ? '' : 'hidden' }} space-y-2">
      @foreach ($lembagas as $lembaga)
        <li class="{{ request()->is($lembaga->id . '/pengasuh/cekPresensiInsidentilSantri*') ? 'navbar-active' : '' }}">
          <a href="/{{ $lembaga->id }}/pengasuh/cekPresensiInsidentilSantri" wire:navigate
            class="flex items-center ml-5 p-1 text-gray-900 rounded-lg dark:text-white">
            <i class="fa-solid fa-book text-green-500"></i>
            <span class="ms-3">{{ $lembaga->nama_singkat }}</span>
          </a>
        </li>
      @endforeach
    </ul>
  </li>
  {{-- cek presensi insidentil santri  end --}}


  {{-- pembinaan santri start --}}
  <li>
    <button type="button"
      class="flex p-1 items-center w-full text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
      aria-controls="dropdown-pages" data-collapse-toggle="pembinaanSantriBypengasuh">
      <i class="fa-solid fa-book text-blue-500"></i>
      <span class="flex-1 ml-3 text-left ">Pembinaan Santri</span>
      <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd"
          d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
          clip-rule="evenodd"></path>
      </svg>
    </button>
    <ul id="pembinaanSantriBypengasuh"
      class="{{ request()->is('*/pengasuh/pembinaanSantri*') ? '' : 'hidden' }} space-y-2">
      @foreach (auth()->user()->lembaga as $lembaga)
        <li class="{{ request()->is($lembaga->id . '/pengasuh/pembinaanSantri*') ? 'navbar-active' : '' }}">
          <a href="/{{ $lembaga->id }}/pengasuh/pembinaanSantri" wire:navigate
            class="flex items-center ml-5 p-1 text-gray-900 rounded-lg dark:text-white">
            <i class="fa-solid fa-book text-blue-500"></i>
            <span class="ms-3">{{ $lembaga->nama_singkat }}</span>
          </a>
        </li>
      @endforeach
    </ul>
  </li>
  {{-- pembinaan santri end --}}

  {{-- Rapor Asatidz start --}}
  <li>
    <button type="button"
      class="flex p-1 items-center w-full text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
      aria-controls="dropdown-pages" data-collapse-toggle="raporLembagabyPengasuh">
      <i class="fa-solid fa-book text-green-500"></i>
      <span class="flex-1 ml-3 text-left ">Rapor Asatidz</span>
      <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd"
          d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
          clip-rule="evenodd"></path>
      </svg>
    </button>
    <ul id="raporLembagabyPengasuh" class="{{ request()->is('*/raporLembaga*') ? '' : 'hidden' }} space-y-2">
      @foreach ($lembagas as $lembaga)
        <li class="{{ request()->is($lembaga->id . '/pengasuh/raporLembaga*') ? 'navbar-active' : '' }}">
          <a href="/{{ $lembaga->id }}/pengasuh/raporLembaga" wire:navigate
            class="flex items-center ml-5 p-1 text-gray-900 rounded-lg dark:text-white">
            <i class="fa-solid fa-book text-green-500"></i>
            <span class="ms-3">{{ $lembaga->nama_singkat }}</span>
          </a>
        </li>
      @endforeach
    </ul>
  </li>
  {{-- Rapor Asatidz end --}}


  {{-- Rapor Santri Start --}}
  <li class="{{ request()->is('raporSantri*') ? 'navbar-active' : '' }}">
    <a wire:navigate href="/raporSantri/semua/pengasuh"
      class="flex items-center p-1 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
      <i class="fa-solid fa-book text-green-500"></i>
      <span class="ms-3">Rapor Santri</span>
    </a>
  </li>
  {{-- Rapor Santri End --}}


  {{-- Rapor Pendamping start --}}
  <li>
    <button type="button"
      class="flex p-1 items-center w-full text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
      aria-controls="dropdown-pages" data-collapse-toggle="raporPendampingbypengasuh">
      <i class="fa-solid fa-book text-green-500"></i>
      <span class="flex-1 ml-3 text-left ">Rapor Pendamping</span>
      <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
        xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd"
          d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
          clip-rule="evenodd"></path>
      </svg>
    </button>
    <ul id="raporPendampingbypengasuh" class="{{ request()->is('*/raporPendamping*') ? '' : 'hidden' }} space-y-2">

      @if ($lembagas)
        @foreach ($lembagaAsramas as $lembaga)
          <li class="{{ request()->is($lembaga->id . '/pengasuh/raporPendamping*') ? 'navbar-active' : '' }}">
            <a href="/{{ $lembaga->id }}/pengasuh/raporPendamping" wire:navigate
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
@endhasrole
