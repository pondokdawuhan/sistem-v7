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

        {{-- Catatan Asatidz Start --}}
        <li>
          <button type="button"
            class="flex p-1 items-center w-full text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
            aria-controls="dropdown-pages" data-collapse-toggle="catatanAsatidzByKepala">
            <i class="fa-solid fa-book text-amber-500"></i>
            <span class="flex-1 ml-3 text-left ">Catatan Asatidz</span>
            <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
              xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd"
                d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
                clip-rule="evenodd"></path>
            </svg>
          </button>
          <ul id="catatanAsatidzByKepala"
            class="{{ request()->is('*catatanAsatidz*') ? '' : 'hidden' }} space-y-2 border-slate-500 border-s">
            @if ($lembagas)
              @foreach ($lembagas as $lembaga)
                @foreach (auth()->user()->lembaga as $lbg)
                  @if ($lbg->id == $lembaga->id)
                    <li class="{{ request()->is($lembaga->id . '*/catatanAsatidz') ? 'navbar-active' : '' }}">
                      <a wire:navigate href="/{{ $lembaga->id }}/kepala/catatanAsatidz"
                        class="flex items-center ml-3 p-1 text-gray-900 rounded-lg dark:text-white">
                        <i class="fa-solid fa-book text-amber-500"></i>
                        <span
                          class="ms-3">{{ $lembaga->nama_singkat ? $lembaga->nama_singkat : $lembaga->nama }}</span>
                      </a>
                    </li>
                  @endif
                @endforeach
              @endforeach
            @endif
          </ul>
        </li>
        {{-- Catatan Asatidz End --}}


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
