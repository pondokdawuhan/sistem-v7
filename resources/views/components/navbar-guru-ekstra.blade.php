@hasrole(['Super Admin|Guru Ekstra'])
  <h6 class="my-3 text-slate-900 dark:text-white border-b italic">Guru Ekstra</h6>
  {{-- Presensi Ekstra Start --}}
  <li>
    <button type="button"
      class="flex p-1 items-center w-full text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
      aria-controls="dropdown-pages" data-collapse-toggle="presensiEkstrakurikuler">
      <i class="fa-solid fa-book text-blue-500"></i>
      <span class="flex-1 ml-3 text-left ">Presensi Ekstrakurikuler</span>
      <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd"
          d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
          clip-rule="evenodd"></path>
      </svg>
    </button>
    <ul id="presensiEkstrakurikuler" class="{{ request()->is('*/presensiEkstrakurikuler*') ? '' : 'hidden' }} space-y-2">
      @if (auth()->user()->ekstrakurikuler)
        @foreach (auth()->user()->ekstrakurikuler as $ekstrakurikuler)
          <li
            class="@if (request()->is('presensiEkstrakurikuler/{{ $ekstrakurikuler->nama }}')) navbar-active
                                @else
                                '' @endif">
            <a href="/{{ $ekstrakurikuler->id }}/presensiEkstrakurikuler" wire:navigate
              class="flex items-center ml-5 p-1 text-gray-900 rounded-lg dark:text-white">
              <i class="fa-solid fa-book text-blue-500"></i>
              <span class="ms-3">{{ $ekstrakurikuler->nama }}</span>
            </a>
          </li>
        @endforeach
      @endif
    </ul>
  </li>
  {{-- Presensi Ekstra End --}}


  {{-- pembinaan santri start --}}
  <li>
    <button type="button"
      class="flex p-1 items-center w-full text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
      aria-controls="dropdown-pages" data-collapse-toggle="pembinaanSantriByguruEkstra">
      <i class="fa-solid fa-book text-blue-500"></i>
      <span class="flex-1 ml-3 text-left ">Pembinaan Santri</span>
      <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd"
          d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
          clip-rule="evenodd"></path>
      </svg>
    </button>
    <ul id="pembinaanSantriByguruEkstra"
      class="{{ request()->is('*/guruEkstra/pembinaanSantri*') ? '' : 'hidden' }} space-y-2">
      @foreach (auth()->user()->lembaga as $lembaga)
        <li class="{{ request()->is($lembaga->id . '/guruEkstra/pembinaanSantri*') ? 'navbar-active' : '' }}">
          <a href="/{{ $lembaga->id }}/guruEkstra/pembinaanSantri" wire:navigate
            class="flex items-center ml-5 p-1 text-gray-900 rounded-lg dark:text-white">
            <i class="fa-solid fa-book text-blue-500"></i>
            <span class="ms-3">{{ $lembaga->nama_singkat }}</span>
          </a>
        </li>
      @endforeach
    </ul>
  </li>
  {{-- pembinaan santri end --}}
@endhasrole
