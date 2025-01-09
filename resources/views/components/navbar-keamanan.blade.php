@hasrole(['Super Admin', 'Keamanan'])
  <h6 class="my-3 text-slate-900 dark:text-white border-b italic">Keamanan</h6>

  {{-- Izin Keluar Santri Start --}}
  <li
    class="{{ request()->is('semua/keamanan/izinKeluarSantri*') || request()->is('semua/keamanan/detailIzinKeluarSantri*') ? 'navbar-active' : '' }}">
    <a wire:navigate href="/semua/keamanan/izinKeluarSantri"
      class="flex items-center p-1 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
      <i class="fa-solid fa-person-walking text-red-500"></i>
      <span class="ms-3">Izin Keluar Santri</span>
    </a>
  </li>
  {{-- Izin Keluar Santri End --}}



  {{-- Izin Pulang Santri Start --}}
  <li
    class="{{ request()->is('semua/keamanan/izinPulangSantri*') || request()->is('semua/keamanan/detailIzinPulangSantri*') ? 'navbar-active' : '' }}">
    <a wire:navigate href="/semua/keamanan/izinPulangSantri"
      class="flex items-center p-1 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
      <i class="fa-solid fa-person-walking text-red-500"></i>
      <span class="ms-3">Izin Pulang Santri</span>
    </a>
  </li>
  {{-- Izin Pulang Santri End --}}


  {{-- Izin Keluar pendamping Start --}}
  <li
    class="{{ request()->is('keamanan/izinKeluarPendamping*') || request()->is('keamanan/detailIzinKeluarPendamping*') ? 'navbar-active' : '' }}">
    <a wire:navigate href="/keamanan/izinKeluarPendamping"
      class="flex items-center p-1 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
      <i class="fa-solid fa-person-walking text-red-500"></i>
      <span class="ms-3">Izin Keluar Pendamping</span>
    </a>
  </li>
  {{-- Izin Keluar pendamping End --}}


  {{-- Izin Pulang keamanan Start --}}
  <li
    class="{{ request()->is('keamanan/izinPulangPendamping*') || request()->is('keamanan/detailIzinPulangPendamping*') ? 'navbar-active' : '' }}">
    <a wire:navigate href="/keamanan/izinPulangPendamping"
      class="flex items-center p-1 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
      <i class="fa-solid fa-person-walking text-red-500"></i>
      <span class="ms-3">Izin Pulang pendamping</span>
    </a>
  </li>
  {{-- Izin Pulang keamanan End --}}
@endhasrole
