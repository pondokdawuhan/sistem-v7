<div>

  <aside id="logo-sidebar"
    class="fixed text-sm top-0 left-0 z-40 w-64 h-screen pt-20 transition-transform -translate-x-full bg-slate-100 border-r border-gray-200 sm:translate-x-0 dark:bg-gray-800 dark:border-gray-700 overflow-auto pb-10"
    aria-label="Sidebar">
    <div class="h-full px-3 pb-8 overflow-y-auto bg-white dark:bg-gray-800">
      <ul class="space-y-2 font-medium">
        <li class="{{ request()->is('dashboard') ? 'navbar-active' : '' }}">
          <a wire:navigate href="/dashboard"
            class="flex items-center p-1 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
            <i class="fa-solid fa-dashboard text-red-500"></i>
            <span class="ms-3">Dashboard</span>
          </a>
        </li>


        <x-navbar-super-admin></x-navbar-super-admin>
        <x-navbar-admin></x-navbar-admin>
        <x-navbar-guru></x-navbar-guru>
        <x-navbar-guru-piket></x-navbar-guru-piket>
        <x-navbar-guru-ekstra></x-navbar-guru-ekstra>
        <x-navbar-kurikulum></x-navbar-kurikulum>
        <x-navbar-ketertiban></x-navbar-ketertiban>
        <x-navbar-kesiswaan></x-navbar-kesiswaan>
        <x-navbar-kepala></x-navbar-kepala>
        <x-navbar-wali-kelas></x-navbar-wali-kelas>
        <x-navbar-pendamping></x-navbar-pendamping>
        <x-navbar-pengurus></x-navbar-pengurus>
        <x-navbar-ketua-asrama></x-navbar-ketua-asrama>
        <x-navbar-keamanan></x-navbar-keamanan>
        <x-navbar-pengasuh></x-navbar-pengasuh>
        <x-navbar-yayasan></x-navbar-yayasan>


        <h6 class="my-3 text-slate-900 dark:text-white border-b italic">All</h6>
        <li class="{{ request()->is('profil*') ? 'navbar-active' : '' }}">
          <a href="/profil/{{ auth()->user()->username }}" wire:navigate
            class="flex items-center p-1 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
            <i class="fa-solid fa-user text-blue-500"></i>
            <span class="ms-3">Profil</span>
          </a>
        </li>
        <li class="{{ request()->is('logout') ? 'navbar-active' : '' }}">
          <a href="/logout" wire:navigate
            class="flex items-center p-1 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
            <i class="fa-solid fa-sign-out text-red-500"></i>
            <span class="ms-3">Logout</span>
          </a>
        </li>

      </ul>
    </div>
  </aside>


</div>
