@hasrole(['Super Admin', 'Guru Piket'])
  <h6 class="my-3 text-slate-900 dark:text-white border-b italic">Guru Piket</h6>
  {{-- Presensi (badal) Start --}}
  <li>
    <button type="button"
      class="flex p-1 items-center w-full text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
      aria-controls="dropdown-pages" data-collapse-toggle="presensiBadal">
      <i class="fa-solid fa-book text-green-500"></i>
      <span class="flex-1 ml-3 text-left ">Presensi (badal)</span>
      <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd"
          d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
          clip-rule="evenodd"></path>
      </svg>
    </button>
    <ul id="presensiBadal" class="{{ request()->is('presensi*') ? '' : 'hidden' }} space-y-2">
      @foreach ($lembagaSelainAsrama as $lembaga)
        @foreach (auth()->user()->lembaga as $lbg)
          @if ($lbg->id == $lembaga->id)
            <li class="{{ request()->is('*/presensi/create?lembaga=' . $lembaga->id . '*') ? 'navbar-active' : '' }}">
              <a wire:navigate href="/{{ $lembaga->id }}/guruPiket/presensi/create"
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
  {{-- Presensi (badal) End --}}


  {{-- Izin Asatidz By guruPiket Start --}}
  <li>
    <button type="button"
      class="flex p-1 items-center w-full text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
      aria-controls="dropdown-pages" data-collapse-toggle="izinAsatidzByGuruPiket">
      <i class="fa-solid fa-person-walking text-green-500"></i>
      <span class="flex-1 ml-3 text-left ">Izin Asatidz</span>
      <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd"
          d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
          clip-rule="evenodd"></path>
      </svg>
    </button>
    <ul id="izinAsatidzByGuruPiket" class="{{ request()->is('/guruPiket/izinAsatidz*') ? '' : 'hidden' }} space-y-2">
      @foreach ($lembagaSelainAsrama as $lembaga)
        @foreach (auth()->user()->lembaga as $lbg)
          @if ($lbg->id == $lembaga->id)
            <li class="{{ request()->is('guruPiket/izinAsatidz*') ? 'navbar-active' : '' }}">
              <a wire:navigate href="/{{ $lembaga->id }}/guruPiket/izinAsatidz"
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
  {{-- Izin Asatidz By guruPiket End --}}
@endhasrole
