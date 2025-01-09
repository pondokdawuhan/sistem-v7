@hasrole(['Super Admin', 'Ketertiban'])
  <h6 class="my-3 text-slate-900 dark:text-white border-b italic">Ketertiban</h6>
  {{-- Santri Haid Start --}}
  @if (auth()->user()->dataUser)
    @if (auth()->user()->dataUser->jenis_kelamin == 'Perempuan')
      <li class="{{ request()->is('ketertiban/haidSantri*') ? 'navbar-active' : '' }}">
        <a wire:navigate href="/ketertiban/haidSantri"
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
      aria-controls="dropdown-pages" data-collapse-toggle="presensiSholatByKetertiban">
      <i class="fa-solid fa-book text-green-500"></i>
      <span class="flex-1 ml-3 text-left ">Presensi Sholat</span>
      <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd"
          d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
          clip-rule="evenodd"></path>
      </svg>
    </button>
    <ul id="presensiSholatByKetertiban"
      class="{{ request()->is('*ketertiban/presensiSholat*') ? '' : 'hidden' }} space-y-2">
      @foreach ($lembagaSelainAsrama as $lembaga)
        @foreach (auth()->user()->lembaga as $lbg)
          @if ($lbg->id == $lembaga->id)
            <li class="{{ request()->is($lembaga->id . '/ketertiban/presensiSholat*') ? 'navbar-active' : '' }}">
              <a href="/{{ $lembaga->id }}/ketertiban/presensiSholat" wire:navigate
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
      aria-controls="dropdown-pages" data-collapse-toggle="catatanSantriByKetertiban">
      <i class="fa-solid fa-book text-green-500"></i>
      <span class="flex-1 ml-3 text-left ">Catatan Santri</span>
      <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd"
          d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
          clip-rule="evenodd"></path>
      </svg>
    </button>
    <ul id="catatanSantriByKetertiban"
      class="{{ request()->is('*/ketertiban/catatanSantri*') ? '' : 'hidden' }} space-y-2">
      @foreach ($lembagaSelainAsrama as $lembaga)
        @foreach (auth()->user()->lembaga as $lbg)
          @if ($lbg->id == $lembaga->id)
            <li class="{{ request()->is($lembaga->id . '/ketertiban/catatanSantri*') ? 'navbar-active' : '' }}">
              <a href="/{{ $lembaga->id }}/ketertiban/catatanSantri" wire:navigate
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
      aria-controls="dropdown-pages" data-collapse-toggle="pembinaanSantriByketertiban">
      <i class="fa-solid fa-book text-blue-500"></i>
      <span class="flex-1 ml-3 text-left ">Pembinaan Santri</span>
      <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd"
          d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
          clip-rule="evenodd"></path>
      </svg>
    </button>
    <ul id="pembinaanSantriByketertiban"
      class="{{ request()->is('*/ketertiban/pembinaanSantri*') ? '' : 'hidden' }} space-y-2">
      @foreach ($lembagaSelainAsrama as $lembaga)
        @foreach (auth()->user()->lembaga as $lbg)
          @if ($lbg->id == $lembaga->id)
            <li class="{{ request()->is($lembaga->id . '/ketertiban/pembinaanSantri*') ? 'navbar-active' : '' }}">
              <a href="/{{ $lembaga->id }}/ketertiban/pembinaanSantri" wire:navigate
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

  {{-- presensi insidentil santri by ketertiban start --}}
  <li>
    <button type="button"
      class="flex p-1 items-center w-full text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
      aria-controls="dropdown-pages" data-collapse-toggle="presensiInsidentilSantriByketertiban">
      <i class="fa-solid fa-book text-green-500"></i>
      <span class="flex-1 ml-3 text-left ">Presensi Insidentil Santri</span>
      <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd"
          d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
          clip-rule="evenodd"></path>
      </svg>
    </button>
    <ul id="presensiInsidentilSantriByketertiban"
      class="{{ request()->is('*/ketertiban/presensiInsidentilSantri*') ? '' : 'hidden' }} space-y-2">
      @foreach ($lembagaSelainAsrama as $lembaga)
        @foreach (auth()->user()->lembaga as $lbg)
          @if ($lbg->id == $lembaga->id)
            <li
              class="{{ request()->is($lembaga->id . '/ketertiban/presensiInsidentilSantri*') ? 'navbar-active' : '' }}">
              <a href="/{{ $lembaga->id }}/ketertiban/presensiInsidentilSantri" wire:navigate
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
  {{-- presensi insidentil santri by ketertiban start --}}
@endhasrole
