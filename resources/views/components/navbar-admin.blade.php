{{-- Admin Menu Start --}}
@hasrole(['Super Admin', 'Admin'])
  <h6 class="my-3 text-slate-900 dark:text-white border-b italic">Admin</h6>
  {{-- Data Pokok Start --}}
  <li>
    <button type="button"
      class="flex p-1 items-center w-full text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
      aria-controls="dataPokokByAdmin" data-collapse-toggle="dataPokokByAdmin">
      <i class="fa-solid fa-database text-green-500"></i>
      <span class="flex-1 ml-3 text-left ">Data Pokok</span>
      <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd"
          d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
          clip-rule="evenodd"></path>
      </svg>
    </button>
    <ul id="dataPokokByAdmin"
      class="{{ request()->is('kelas*') || request()->is('editRombel*') || request()->is('lembaga*') || request()->is('santri*') || request()->is('kelas*') || request()->is('showKelas*') || request()->is('pelajaran*') || request()->is('user*') || request()->is('ekstrakurikuler*') || request()->is('referensiPoin*') || request()->is('tahunAjaran*') ? '' : 'hidden' }} space-y-2 border-slate-500 border-s">


      {{-- Kelas Start --}}
      <li class="ml-3">
        <button type="button"
          class="flex p-1 items-center w-full text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
          aria-controls="dropdown-pages" data-collapse-toggle="kelasbyAdmin">
          <i class="fa-solid fa-landmark text-amber-500"></i>
          <span class="flex-1 ml-3 text-left ">Data Kelas</span>
          <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd"
              d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
              clip-rule="evenodd"></path>
          </svg>
        </button>
        <ul id="kelasbyAdmin"
          class="{{ request()->is('kelas*') || request()->is('editRombel*') ? '' : 'hidden' }} space-y-2 border-slate-500 border-s">
          @if ($lembagas)
            @foreach ($lembagas as $lembaga)
              @foreach (auth()->user()->lembaga as $lbg)
                @if ($lbg->id == $lembaga->id)
                  <li class="{{ request()->is('kelas') ? 'navbar-active' : '' }}">
                    <a wire:navigate href="/kelas/{{ $lembaga->id }}"
                      class="flex items-center ml-3 p-1 text-gray-900 rounded-lg dark:text-white">
                      <i class="fa-solid fa-landmark text-amber-500"></i>
                      <span class="ms-3">{{ $lembaga->nama_singkat ? $lembaga->nama_singkat : $lembaga->nama }}</span>
                    </a>
                  </li>
                @endif
              @endforeach
            @endforeach
          @endif
        </ul>
      </li>
      {{-- Kelas End --}}

      {{-- Pelajaran Start --}}
      <li class="ml-3">
        <button type="button"
          class="flex p-1 items-center w-full text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
          aria-controls="dropdown-pages" data-collapse-toggle="pelajaranbyAdmin">
          <i class="fa-solid fa-book text-violet-500"></i>
          <span class="flex-1 ml-3 text-left ">Data Pelajaran</span>
          <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd"
              d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
              clip-rule="evenodd"></path>
          </svg>
        </button>
        <ul id="pelajaranbyAdmin"
          class="{{ request()->is('pelajaran*') ? '' : 'hidden' }} space-y-2 border-slate-500 border-s">
          @if ($lembagas)
            @foreach ($lembagas as $lembaga)
              @foreach (auth()->user()->lembaga as $lbg)
                @if ($lbg->id == $lembaga->id)
                  <li class="{{ request()->is('pelajaran') ? 'navbar-active' : '' }}">
                    <a wire:navigate href="/pelajaran/{{ $lembaga->id }}"
                      class="flex items-center ml-3 p-1 text-gray-900 rounded-lg dark:text-white">
                      <i class="fa-solid fa-book text-violet-500"></i>
                      <span class="ms-3">{{ $lembaga->nama_singkat ? $lembaga->nama_singkat : $lembaga->nama }}</span>
                    </a>
                  </li>
                @endif
              @endforeach
            @endforeach
          @endif
        </ul>
      </li>
      {{-- Pelajaran End --}}

      {{-- Ekstrakurikuler start --}}
      <li class="{{ request()->is('ekstrakurikuler*') ? 'navbar-active' : '' }} ml-3">
        <a wire:navigate href="/ekstrakurikuler"
          class="flex items-center p-1 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
          <i class="fa-solid fa-folder-plus text-blue-500"></i>
          <span class="ms-3">Ekstrakurikuler</span>
        </a>
      </li>
      {{-- Ekstrakurikuler end --}}

      {{-- Jadwal Pelajaran Start --}}
      <li>
        <button type="button"
          class="flex p-1 items-center ml-3 w-full text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
          aria-controls="dropdown-pages" data-collapse-toggle="jadwalPelajaranbyAdmin">
          <i class="fa-solid fa-book text-green-500"></i>
          <span class="flex-1 ml-3 text-left ">Jadwal Pelajaran</span>
          <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd"
              d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
              clip-rule="evenodd"></path>
          </svg>
        </button>
        <ul id="jadwalPelajaranbyAdmin" class="{{ request()->is('*admin/jadwalPelajaran*') ? '' : 'hidden' }} space-y-2">
          @foreach ($lembagas as $lembaga)
            @foreach (auth()->user()->lembaga as $lbg)
              @if ($lbg->id == $lembaga->id)
                <li class="{{ request()->is($lembaga->id . '/admin/jadwalPelajaran/*') ? 'navbar-active' : '' }}">
                  <a wire:navigate href="/{{ $lembaga->id }}/admin/jadwalPelajaran"
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
      {{-- Jadwal Pelajaran End --}}

    </ul>
  </li>
  {{-- Data Pokok End --}}


  {{-- Perbaikan Presensi Start --}}
  <li>
    <button type="button"
      class="flex p-1 items-center w-full text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
      aria-controls="dropdown-pages" data-collapse-toggle="perbaikanPresensibyAdmin">
      <i class="fa-solid fa-book text-green-500"></i>
      <span class="flex-1 ml-3 text-left ">Perbaikan Presensi</span>
      <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd"
          d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
          clip-rule="evenodd"></path>
      </svg>
    </button>
    <ul id="perbaikanPresensibyAdmin" class="{{ request()->is('*admin/perbaikanPresensi*') ? '' : 'hidden' }} space-y-2">
      @foreach ($lembagas as $lembaga)
        @foreach (auth()->user()->lembaga as $lbg)
          @if ($lbg->id == $lembaga->id)
            <li class="{{ request()->is($lembaga->id . '/admin/perbaikanPresensi') ? 'navbar-active' : '' }}">
              <a href="/{{ $lembaga->id }}/admin/perbaikanPresensi" wire:navigate
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
  {{-- Perbaikan Presensi End --}}


  {{-- Perbaikan Presensi lainnya Start --}}
  <li>
    <button type="button"
      class="flex p-1 items-center w-full text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
      aria-controls="dropdown-pages" data-collapse-toggle="perbaikanPresensiLainnyaAdmin">
      <i class="fa-solid fa-book text-green-500"></i>
      <span class="flex-1 ml-3 text-left ">Perbaikan Presensi Lainnya</span>
      <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
        xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd"
          d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
          clip-rule="evenodd"></path>
      </svg>
    </button>
    <ul id="perbaikanPresensiLainnyaAdmin"
      class="{{ request()->is('*perbaikanPresensiSholat*') || request()->is('*perbaikanPresensiEkstrakurikuler*') || request()->is('*detailperbaikanPresensiEkstrakurikuler*') || request()->is('*perbaikanPresensiSholatPendamping*') || request()->is('*perbaikanPresensiKegiatanAsatidz*') || request()->is('*perbaikanPresensiInsidentilSantri*') ? '' : 'hidden' }} space-y-2">

      {{-- Perbaikan Presensi Sholat Start --}}
      <li class="{{ request()->is('admin/perbaikanPresensiSholat') ? 'navbar-active' : '' }}">
        <a href="/admin/perbaikanPresensiSholat" wire:navigate
          class="flex items-center p-1 ml-5 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
          <i class="fa-solid fa-book text-blue-500"></i>
          <span class="ms-3">Perbaikan Presensi Sholat</span>
        </a>
      </li>
      {{-- Perbaikan Presensi Sholat End --}}

      {{-- Perbaikan Presensi Ekstra Start --}}
      <li
        class="{{ request()->is('admin/perbaikanPresensiEkstrakurikuler*') || request()->is('admin/detailadmin/*') ? 'navbar-active' : '' }}">
        <a href="/admin/perbaikanPresensiEkstrakurikuler" wire:navigate
          class="flex items-center p-1 ml-5 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
          <i class="fa-solid fa-book text-blue-500"></i>
          <span class="ms-3">Perbaikan Presensi Ekstrakurikuler</span>
        </a>
      </li>
      {{-- Perbaikan Presensi Ekstra End --}}

      {{-- Perbaikan Presensi Sholat Pendamping Start --}}
      <li class="{{ request()->is('admin/perbaikanPresensiSholatPendamping*') ? 'navbar-active' : '' }}">
        <a wire:navigate href="/admin/perbaikanPresensiSholatPendamping"
          class="flex items-center p-1 ml-5 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
          <i class="fa-solid fa-book text-blue-500"></i>
          <span class="ms-3">Perbaikan Presensi Sholat Pendamping</span>
        </a>
      </li>
      {{-- Perbaikan Presensi Sholat Pendamping End --}}

      {{-- Perbaikan Presensi Kegiatan Asatidz Start --}}
      <li class="{{ request()->is('admin/perbaikanPresensiKegiatanAsatidz*') ? 'navbar-active' : '' }}">
        <a wire:navigate href="/admin/perbaikanPresensiKegiatanAsatidz"
          class="flex items-center p-1 ml-5 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
          <i class="fa-solid fa-book text-blue-500"></i>
          <span class="ms-3">Perbaikan Presensi Kegiatan Asatidz</span>
        </a>
      </li>
      {{-- Perbaikan Presensi Kegiatan Asatidz End --}}


      {{-- Perbaikan PresensiInsidentilSantri Start --}}
      <li class="ml-5">
        <button type="button"
          class="flex p-1 items-center w-full text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
          aria-controls="dropdown-pages" data-collapse-toggle="perbaikanPresensiInsidentilSantribyAdmin">
          <i class="fa-solid fa-book text-blue-500"></i>
          <span class="flex-1 ml-5 text-left">Perbaikan Presensi Insidentil Santri</span>
          <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd"
              d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
              clip-rule="evenodd"></path>
          </svg>
        </button>
        <ul id="perbaikanPresensiInsidentilSantribyAdmin"
          class="{{ request()->is('*admin/perbaikanPresensiInsidentilSantri*') ? '' : 'hidden' }} space-y-2">
          @foreach ($lembagas as $lembaga)
            @foreach (auth()->user()->lembaga as $lbg)
              @if ($lbg->id == $lembaga->id)
                <li
                  class="{{ request()->is($lembaga->id . '/admin/perbaikanPresensiInsidentilSantri') ? 'navbar-active' : '' }}">
                  <a href="/{{ $lembaga->id }}/admin/perbaikanPresensiInsidentilSantri" wire:navigate
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
      {{-- Perbaikan PresensiInsidentilSantri End --}}


      {{-- Perbaikan PresensiAsrama Start --}}
      <li class="ml-5">
        <button type="button"
          class="flex p-1 items-center w-full text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
          aria-controls="dropdown-pages" data-collapse-toggle="perbaikanPresensiAsramaadmin">
          <i class="fa-solid fa-book text-blue-500"></i>
          <span class="flex-1 ml-5 text-left">Perbaikan Presensi Asrama</span>
          <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd"
              d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
              clip-rule="evenodd"></path>
          </svg>
        </button>
        <ul id="perbaikanPresensiAsramaadmin"
          class="{{ request()->is('*perbaikanPresensiAsrama*') ? '' : 'hidden' }} space-y-2">
          @foreach ($lembagaAsramas as $lembaga)
            <li class="{{ request()->is($lembaga->id . '/admin/perbaikanPresensiAsrama') ? 'navbar-active' : '' }}">
              <a href="/{{ $lembaga->id }}/admin/perbaikanPresensiAsrama" wire:navigate
                class="flex items-center ml-5 p-1 text-gray-900 rounded-lg dark:text-white">
                <i class="fa-solid fa-book text-blue-500"></i>
                <span class="ms-3">{{ $lembaga->nama_singkat }}</span>
              </a>
            </li>
          @endforeach
        </ul>
      </li>
      {{-- Perbaikan PresensiInsidentilSantri End --}}
    </ul>
  </li>
  {{-- Perbaikan Presensi lainnya End --}}



  {{-- Rekap Presensi Start --}}
  <li class="">
    <button type="button"
      class="flex p-1 items-center w-full text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
      aria-controls="dropdown-pages" data-collapse-toggle="rekapPresensibyAdmin">
      <i class="fa-solid fa-book text-blue-500"></i>
      <span class="flex-1 ml-3 text-left">Rekap Presensi</span>
      <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
        xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd"
          d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
          clip-rule="evenodd"></path>
      </svg>
    </button>
    <ul id="rekapPresensibyAdmin" class="{{ request()->is('*rekapPresensi*') ? '' : 'hidden' }} space-y-2">
      @foreach ($lembagaSelainAsrama as $lembaga)
        @foreach (auth()->user()->lembaga as $lbg)
          @if ($lbg->id == $lembaga->id)
            <li class="{{ request()->is($lembaga->id . '/admin/rekapPresensi') ? 'navbar-active' : '' }}">
              <a href="/{{ $lembaga->id }}/admin/rekapPresensi" wire:navigate
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
  {{-- Rekap Presensi End --}}

  {{-- Rekapitulasi Start --}}
  <li>
    <button type="button"
      class="flex p-1 items-center w-full text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
      aria-controls="dropdown-pages" data-collapse-toggle="rekapitulasibyAdmin">
      <i class="fa-solid fa-book text-green-500"></i>
      <span class="flex-1 ml-3 text-left ">Rekapitulasi</span>
      <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
        xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd"
          d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
          clip-rule="evenodd"></path>
      </svg>
    </button>
    <ul id="rekapitulasibyAdmin" class="{{ request()->is('*rekap*') ? '' : 'hidden' }} space-y-2">
      <li class="{{ request()->is('admin/rekapPelanggaran*') ? 'navbar-active' : '' }}">
        <a wire:navigate href="/admin/rekapPelanggaran"
          class="flex items-center ml-5 p-1 text-gray-900 rounded-lg dark:text-white">
          <i class="fa-solid fa-book text-green-500"></i>
          <span class="ms-3">Pelanggaran</span>
        </a>
      </li>
      <li class="{{ request()->is('admin/rekapPembinaan*') ? 'navbar-active' : '' }}">
        <a href="/admin/rekapPembinaan" wire:navigate
          class="flex items-center ml-5 p-1 text-gray-900 rounded-lg dark:text-white">
          <i class="fa-solid fa-book text-green-500"></i>
          <span class="ms-3">Pembinaan Santri</span>
        </a>
      </li>
      <li class="{{ request()->is('admin/rekapPenghargaan*') ? 'navbar-active' : '' }}">
        <a href="/admin/rekapPenghargaan" wire:navigate
          class="flex items-center ml-5 p-1 text-gray-900 rounded-lg dark:text-white">
          <i class="fa-solid fa-book text-green-500"></i>
          <span class="ms-3">Penghargaan Santri</span>
        </a>
      </li>
    </ul>
  </li>
  {{-- Rekapitulasi End --}}

  {{-- Rapor Santri Start --}}
  <li class="{{ request()->is('raporSantri*') ? 'navbar-active' : '' }}">
    <a wire:navigate href="/raporSantri/semua/admin"
      class="flex items-center p-1 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
      <i class="fa-solid fa-book text-green-500"></i>
      <span class="ms-3">Rapor Santri</span>
    </a>
  </li>
  {{-- Rapor Santri End --}}


  {{-- Rapor Asatidz start --}}
  <li>
    <button type="button"
      class="flex p-1 items-center w-full text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
      aria-controls="dropdown-pages" data-collapse-toggle="raporLembagabyAdmin">
      <i class="fa-solid fa-book text-green-500"></i>
      <span class="flex-1 ml-3 text-left ">Rapor Asatidz</span>
      <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
        xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd"
          d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
          clip-rule="evenodd"></path>
      </svg>
    </button>
    <ul id="raporLembagabyAdmin" class="{{ request()->is('*/raporLembaga*') ? '' : 'hidden' }} space-y-2">
      @foreach ($lembagas as $lembaga)
        @foreach (auth()->user()->lembaga as $lbg)
          @if ($lbg->id == $lembaga->id)
            <li class="{{ request()->is($lembaga->id . '/admin/raporLembaga*') ? 'navbar-active' : '' }}">
              <a href="/{{ $lembaga->id }}/admin/raporLembaga" wire:navigate
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
  {{-- Rapor Asatidz end --}}


  {{-- Rapor Pendamping start --}}
  <li>
    <button type="button"
      class="flex p-1 items-center w-full text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
      aria-controls="dropdown-pages" data-collapse-toggle="raporPendampingbyadmin">
      <i class="fa-solid fa-book text-green-500"></i>
      <span class="flex-1 ml-3 text-left ">Rapor Pendamping</span>
      <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
        xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd"
          d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
          clip-rule="evenodd"></path>
      </svg>
    </button>
    <ul id="raporPendampingbyadmin" class="{{ request()->is('*/raporPendamping*') ? '' : 'hidden' }} space-y-2">

      @if ($lembagas)
        @foreach ($lembagaAsramas as $lembaga)
          <li class="{{ request()->is($lembaga->id . '/admin/raporPendamping*') ? 'navbar-active' : '' }}">
            <a href="/{{ $lembaga->id }}/admin/raporPendamping" wire:navigate
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
{{-- Admin Menu End --}}
