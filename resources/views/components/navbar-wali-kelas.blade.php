@hasrole(['Super Admin', 'Wali Kelas'])
  <h6 class="my-3 text-slate-900 dark:text-white border-b italic">Wali Kelas</h6>
  {{-- Hafalan Santri Start --}}
  <li>
    <button type="button"
      class="flex p-1 items-center w-full text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
      aria-controls="dropdown-pages" data-collapse-toggle="hafalanSantri">
      <i class="fa-solid fa-book text-green-500"></i>
      <span class="flex-1 ml-3 text-left ">Hafalan Santri</span>
      <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd"
          d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
          clip-rule="evenodd"></path>
      </svg>
    </button>
    <ul id="hafalanSantri" class="{{ request()->is('*hafalanSantri*') ? '' : 'hidden' }} space-y-2">
      @foreach (auth()->user()->lembaga as $lembaga)
        <li
          class="@if (request()->is($lembaga->id . 'hafalanSantri*')) navbar-active
                                @else
                                '' @endif">
          <a href="/{{ $lembaga->id }}/hafalanSantri" wire:navigate
            class="flex items-center ml-5 p-1 text-gray-900 rounded-lg dark:text-white">
            <i class="fa-solid fa-book text-green-500"></i>
            <span class="ms-3">{{ $lembaga->nama_singkat }}</span>
          </a>
        </li>
      @endforeach
    </ul>
  </li>
  {{-- Hafalan Santri End --}}


  {{-- pembinaan santri start --}}
  <li>
    <button type="button"
      class="flex p-1 items-center w-full text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
      aria-controls="dropdown-pages" data-collapse-toggle="pembinaanSantriBywalikelas">
      <i class="fa-solid fa-book text-blue-500"></i>
      <span class="flex-1 ml-3 text-left ">Pembinaan Santri</span>
      <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd"
          d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
          clip-rule="evenodd"></path>
      </svg>
    </button>
    <ul id="pembinaanSantriBywalikelas"
      class="{{ request()->is('*/walikelas/pembinaanSantri*') ? '' : 'hidden' }} space-y-2">
      @foreach (auth()->user()->lembaga as $lembaga)
        <li class="{{ request()->is($lembaga->id . '/walikelas/pembinaanSantri*') ? 'navbar-active' : '' }}">
          <a href="/{{ $lembaga->id }}/walikelas/pembinaanSantri" wire:navigate
            class="flex items-center ml-5 p-1 text-gray-900 rounded-lg dark:text-white">
            <i class="fa-solid fa-book text-blue-500"></i>
            <span class="ms-3">{{ $lembaga->nama_singkat }}</span>
          </a>
        </li>
      @endforeach
    </ul>
  </li>
  {{-- pembinaan santri end --}}



  {{-- presensi insidentil santri by walikelas start --}}
  <li>
    <button type="button"
      class="flex p-1 items-center w-full text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
      aria-controls="dropdown-pages" data-collapse-toggle="presensiInsidentilSantri">
      <i class="fa-solid fa-book text-green-500"></i>
      <span class="flex-1 ml-3 text-left ">Presensi Insidentil Santri</span>
      <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd"
          d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
          clip-rule="evenodd"></path>
      </svg>
    </button>
    <ul id="presensiInsidentilSantri"
      class="{{ request()->is('*/presensiInsidentilSantri*') ? '' : 'hidden' }} space-y-2">
      @foreach ($lembagaSelainAsrama as $lembaga)
        <li class="{{ request()->is($lembaga->id . '/walikelas/presensiInsidentilSantri*') ? 'navbar-active' : '' }}">
          <a href="/{{ $lembaga->id }}/walikelas/presensiInsidentilSantri" wire:navigate
            class="flex items-center ml-5 p-1 text-gray-900 rounded-lg dark:text-white">
            <i class="fa-solid fa-book text-green-500"></i>
            <span class="ms-3">{{ $lembaga->nama_singkat }}</span>
          </a>
        </li>
      @endforeach
    </ul>
  </li>
  {{-- presensi insidentil santri by walikelas start --}}


  {{-- Rekap PresensiJumlah Start --}}
  <li class="">
    <button type="button"
      class="flex p-1 items-center w-full text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
      aria-controls="dropdown-pages" data-collapse-toggle="rekapPresensiJumlahByWaliKelas">
      <i class="fa-solid fa-book text-green-500"></i>
      <span class="flex-1 ml-3 text-left">Rekap Presensi (Jumlah)</span>
      <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd"
          d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
          clip-rule="evenodd"></path>
      </svg>
    </button>
    <ul id="rekapPresensiJumlahByWaliKelas"
      class="{{ request()->is('*rekapPresensiJumlah*') ? '' : 'hidden' }} space-y-2">
      @foreach ($lembagaSelainAsrama as $lembaga)
        @foreach (auth()->user()->lembaga as $lbg)
          @if ($lbg->id == $lembaga->id)
            <li class="{{ request()->is($lembaga->id . '/walikelas/rekapPresensiJumlah') ? 'navbar-active' : '' }}">
              <a href="/{{ $lembaga->id }}/walikelas/rekapPresensiJumlah" wire:navigate
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
  {{-- Rekap PresensiJumlah End --}}

  {{-- Rapor Santri by walikelas start --}}
  <li>
    <button type="button"
      class="flex p-1 items-center w-full text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
      aria-controls="dropdown-pages" data-collapse-toggle="raporSantriByWaliKelas">
      <i class="fa-solid fa-book text-green-500"></i>
      <span class="flex-1 ml-3 text-left ">Rapor Santri</span>
      <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd"
          d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
          clip-rule="evenodd"></path>
      </svg>
    </button>
    <ul id="raporSantriByWaliKelas" class="{{ request()->is('*/presensiInsidentilSantri*') ? '' : 'hidden' }} space-y-2">
      @foreach (auth()->user()->kelas as $kelas)
        <li class="{{ request()->is('* raporSantri/*') ? 'navbar-active' : '' }}">
          <a href="/raporSantri/{{ $kelas->id }}/walikelas" wire:navigate
            class="flex items-center ml-5 p-1 text-gray-900 rounded-lg dark:text-white">
            <i class="fa-solid fa-book text-green-500"></i>
            <span class="ms-3">{{ $kelas->nama }} {{ $kelas->lembaga->nama_singkat }}</span>
          </a>
        </li>
      @endforeach
    </ul>
  </li>
  {{-- Rapor Santri by walikelas start --}}
@endhasrole
