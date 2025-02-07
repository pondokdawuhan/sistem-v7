{{-- Super Admin Menu Start --}}
@hasrole(['Super Admin'])
  <h6 class="my-3 text-slate-900 dark:text-white border-b italic">Super Admin</h6>
  {{-- Data Pokok Start --}}
  <li>
    <button type="button"
      class="flex p-1 items-center w-full text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
      aria-controls="dropdown-pages" data-collapse-toggle="dropdown-pages">
      <i class="fa-solid fa-database text-green-500"></i>
      <span class="flex-1 ml-3 text-left ">Data Pokok</span>
      <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd"
          d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
          clip-rule="evenodd"></path>
      </svg>
    </button>
    <ul id="dropdown-pages"
      class="{{ request()->is('kelas*') || request()->is('editRombel*') || request()->is('lembaga*') || request()->is('santri*') || request()->is('kelas*') || request()->is('showKelas*') || request()->is('pelajaran*') || request()->is('user*') || request()->is('ekstrakurikuler*') || request()->is('referensiPoin*') || request()->is('tahunAjaran*') || request()->is('batasPoin') ? '' : 'hidden' }} space-y-2 border-slate-500 border-s">
      <li class="{{ request()->is('lembaga*') ? 'navbar-active' : '' }}">
        <a wire:navigate href="/lembaga" class="flex items-center ml-3 p-1 text-gray-900 rounded-lg dark:text-white">
          <i class="fa-solid fa-bank text-red-500"></i>
          <span class="ms-3">Data Lembaga</span>
        </a>
      </li>


      {{-- Tahun Ajaran Start --}}
      <li class="{{ request()->is('tahunAjaran') ? 'navbar-active' : '' }}">
        <a wire:navigate href="/tahunAjaran"
          class="flex ml-3 items-center p-1 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
          <i class="fa-solid fa-clock text-red-500"></i>
          <span class="ms-3">Tahun Ajaran</span>
        </a>
      </li>
      {{-- Tahun Ajaran End --}}

      <li class="{{ request()->is('user*') ? 'navbar-active' : '' }}">
        <a href="/user" wire:navigate class="flex items-center ml-3 p-1 text-gray-900 rounded-lg dark:text-white">
          <i class="fa-solid fa-users text-green-500"></i>
          <span class="ms-3">Data Asatidz</span>
        </a>
      </li>

      <li class="{{ request()->is('santri*') ? 'navbar-active' : '' }}">
        <a href="/santri" wire:navigate class="flex items-center ml-3 p-1 text-gray-900 rounded-lg dark:text-white">
          <i class="fa-solid fa-users text-green-500"></i>
          <span class="ms-3">Data Santri</span>
        </a>
      </li>

      {{-- Kelas Start --}}
      <li class="ml-3">
        <button type="button"
          class="flex p-1 items-center w-full text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
          aria-controls="dropdown-pages" data-collapse-toggle="kelas">
          <i class="fa-solid fa-landmark text-amber-500"></i>
          <span class="flex-1 ml-3 text-left ">Data Kelas</span>
          <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd"
              d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
              clip-rule="evenodd"></path>
          </svg>
        </button>
        <ul id="kelas"
          class="{{ request()->is('kelas*') || request()->is('editRombel*') ? '' : 'hidden' }} space-y-2 border-slate-500 border-s">
          @if ($lembagas)
            @foreach ($lembagas as $lembaga)
              <li class="{{ request()->is('kelas') ? 'navbar-active' : '' }}">
                <a wire:navigate href="/kelas/{{ $lembaga->id }}"
                  class="flex items-center ml-3 p-1 text-gray-900 rounded-lg dark:text-white">
                  <i class="fa-solid fa-landmark text-amber-500"></i>
                  <span class="ms-3">{{ $lembaga->nama_singkat ? $lembaga->nama_singkat : $lembaga->nama }}</span>
                </a>
              </li>
            @endforeach
          @endif
        </ul>
      </li>
      {{-- Kelas End --}}

      {{-- Pelajaran Start --}}
      <li class="ml-3">
        <button type="button"
          class="flex p-1 items-center w-full text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
          aria-controls="dropdown-pages" data-collapse-toggle="pelajaran">
          <i class="fa-solid fa-book text-violet-500"></i>
          <span class="flex-1 ml-3 text-left ">Data Pelajaran</span>
          <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd"
              d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
              clip-rule="evenodd"></path>
          </svg>
        </button>
        <ul id="pelajaran" class="{{ request()->is('pelajaran*') ? '' : 'hidden' }} space-y-2 border-slate-500 border-s">
          @if ($lembagas)
            @foreach ($lembagas as $lembaga)
              <li class="{{ request()->is('pelajaran') ? 'navbar-active' : '' }}">
                <a wire:navigate href="/pelajaran/{{ $lembaga->id }}"
                  class="flex items-center ml-3 p-1 text-gray-900 rounded-lg dark:text-white">
                  <i class="fa-solid fa-book text-violet-500"></i>
                  <span class="ms-3">{{ $lembaga->nama_singkat ? $lembaga->nama_singkat : $lembaga->nama }}</span>
                </a>
              </li>
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
          aria-controls="dropdown-pages" data-collapse-toggle="jadwalPelajaran">
          <i class="fa-solid fa-book text-green-500"></i>
          <span class="flex-1 ml-3 text-left ">Jadwal Pelajaran</span>
          <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd"
              d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
              clip-rule="evenodd"></path>
          </svg>
        </button>
        <ul id="jadwalPelajaran" class="{{ request()->is('*superadmin/jadwalPelajaran*') ? '' : 'hidden' }} space-y-2">
          @foreach ($lembagas as $lembaga)
            <li class="{{ request()->is($lembaga->id . '/superadmin/jadwalPelajaran/*') ? 'navbar-active' : '' }}">
              <a wire:navigate href="/{{ $lembaga->id }}/superadmin/jadwalPelajaran"
                class="flex items-center ml-5 p-1 text-gray-900 rounded-lg dark:text-white">
                <i class="fa-solid fa-book text-green-500"></i>
                <span class="ms-3">{{ $lembaga->nama_singkat }}</span>
              </a>
            </li>
          @endforeach

        </ul>
      </li>
      {{-- Jadwal Pelajaran End --}}

      {{-- referensi poin start --}}
      <li class="{{ request()->is('referensiPoin*') ? 'navbar-active' : '' }} ml-3">
        <a wire:navigate href="/referensiPoin"
          class="flex items-center p-1 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
          <i class="fa-solid fa-book text-green-500"></i>
          <span class="ms-3">Referensi Poin</span>
        </a>
      </li>
      {{-- referensi poin end --}}

      {{-- batas poin start --}}
      <li class="{{ request()->is('batasPoin*') ? 'navbar-active' : '' }} ml-3">
        <a wire:navigate href="/batasPoin"
          class="flex items-center p-1 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
          <i class="fa-solid fa-book text-green-500"></i>
          <span class="ms-3">Batas Poin</span>
        </a>
      </li>
      {{-- batas poin end --}}
    </ul>
  </li>
  {{-- Data Pokok End --}}


  {{-- Perbaikan Presensi Start --}}
  <li>
    <button type="button"
      class="flex p-1 items-center w-full text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
      aria-controls="dropdown-pages" data-collapse-toggle="perbaikanPresensi">
      <i class="fa-solid fa-book text-green-500"></i>
      <span class="flex-1 ml-3 text-left ">Perbaikan Presensi</span>
      <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
        xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd"
          d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
          clip-rule="evenodd"></path>
      </svg>
    </button>
    <ul id="perbaikanPresensi" class="{{ request()->is('*superadmin/perbaikanPresensi*') ? '' : 'hidden' }} space-y-2">
      @foreach ($lembagas as $lembaga)
        <li class="{{ request()->is($lembaga->id . '/superadmin/perbaikanPresensi') ? 'navbar-active' : '' }}">
          <a href="/{{ $lembaga->id }}/superadmin/perbaikanPresensi" wire:navigate
            class="flex items-center ml-5 p-1 text-gray-900 rounded-lg dark:text-white">
            <i class="fa-solid fa-book text-green-500"></i>
            <span class="ms-3">{{ $lembaga->nama_singkat }}</span>
          </a>
        </li>
      @endforeach
    </ul>
  </li>
  {{-- Perbaikan Presensi End --}}


  {{-- Perbaikan Presensi lainnya Start --}}
  <li>
    <button type="button"
      class="flex p-1 items-center w-full text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
      aria-controls="dropdown-pages" data-collapse-toggle="perbaikanPresensiLainnyaSuperAdmin">
      <i class="fa-solid fa-book text-green-500"></i>
      <span class="flex-1 ml-3 text-left ">Perbaikan Presensi Lainnya</span>
      <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
        xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd"
          d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
          clip-rule="evenodd"></path>
      </svg>
    </button>
    <ul id="perbaikanPresensiLainnyaSuperAdmin"
      class="{{ request()->is('*perbaikanPresensiSholat*') || request()->is('*perbaikanPresensiEkstrakurikuler*') || request()->is('*detailperbaikanPresensiEkstrakurikuler*') || request()->is('*perbaikanPresensiSholatPendamping*') || request()->is('*perbaikanPresensiKegiatanAsatidz*') || request()->is('*perbaikanPresensiInsidentilSantri*') || request()->is('*perbaikanPresensiAsrama') ? '' : 'hidden' }} space-y-2">

      {{-- Perbaikan Presensi Sholat Start --}}
      <li class="{{ request()->is('superadmin/perbaikanPresensiSholat') ? 'navbar-active' : '' }}">
        <a href="/superadmin/perbaikanPresensiSholat" wire:navigate
          class="flex items-center p-1 ml-5 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
          <i class="fa-solid fa-book text-blue-500"></i>
          <span class="ms-3">Perbaikan Presensi Sholat</span>
        </a>
      </li>
      {{-- Perbaikan Presensi Sholat End --}}

      {{-- Perbaikan Presensi Ekstra Start --}}
      <li
        class="{{ request()->is('superadmin/perbaikanPresensiEkstrakurikuler*') || request()->is('superadmin/detailperbaikanPresensiEkstrakurikuler*') ? 'navbar-active' : '' }}">
        <a href="/superadmin/perbaikanPresensiEkstrakurikuler" wire:navigate
          class="flex items-center p-1 ml-5 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
          <i class="fa-solid fa-book text-blue-500"></i>
          <span class="ms-3">Perbaikan Presensi Ekstrakurikuler</span>
        </a>
      </li>
      {{-- Perbaikan Presensi Ekstra End --}}

      {{-- Perbaikan Presensi Sholat Pendamping Start --}}
      <li class="{{ request()->is('superadmin/perbaikanPresensiSholatPendamping*') ? 'navbar-active' : '' }}">
        <a wire:navigate href="/superadmin/perbaikanPresensiSholatPendamping"
          class="flex items-center p-1 ml-5 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
          <i class="fa-solid fa-book text-blue-500"></i>
          <span class="ms-3">Perbaikan Presensi Sholat Pendamping</span>
        </a>
      </li>
      {{-- Perbaikan Presensi Sholat Pendamping End --}}

      {{-- Perbaikan Presensi Kegiatan Asatidz Start --}}
      <li class="{{ request()->is('superadmin/perbaikanPresensiKegiatanAsatidz*') ? 'navbar-active' : '' }}">
        <a wire:navigate href="/superadmin/perbaikanPresensiKegiatanAsatidz"
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
          aria-controls="dropdown-pages" data-collapse-toggle="perbaikanPresensiInsidentilSantriSuperAdmin">
          <i class="fa-solid fa-book text-blue-500"></i>
          <span class="flex-1 ml-5 text-left">Perbaikan Presensi Insidentil Santri</span>
          <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd"
              d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
              clip-rule="evenodd"></path>
          </svg>
        </button>
        <ul id="perbaikanPresensiInsidentilSantriSuperAdmin"
          class="{{ request()->is('*perbaikanPresensiInsidentilSantri*') ? '' : 'hidden' }} space-y-2">
          @foreach ($lembagas as $lembaga)
            <li
              class="{{ request()->is($lembaga->id . '/superadmin/perbaikanPresensiInsidentilSantri') ? 'navbar-active' : '' }}">
              <a href="/{{ $lembaga->id }}/superadmin/perbaikanPresensiInsidentilSantri" wire:navigate
                class="flex items-center ml-5 p-1 text-gray-900 rounded-lg dark:text-white">
                <i class="fa-solid fa-book text-blue-500"></i>
                <span class="ms-3">{{ $lembaga->nama_singkat }}</span>
              </a>
            </li>
          @endforeach
        </ul>
      </li>
      {{-- Perbaikan PresensiInsidentilSantri End --}}

      {{-- Perbaikan PresensiAsrama Start --}}
      <li class="ml-5">
        <button type="button"
          class="flex p-1 items-center w-full text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
          aria-controls="dropdown-pages" data-collapse-toggle="perbaikanPresensiAsramaSuperAdmin">
          <i class="fa-solid fa-book text-blue-500"></i>
          <span class="flex-1 ml-5 text-left">Perbaikan Presensi Asrama</span>
          <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
            xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd"
              d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
              clip-rule="evenodd"></path>
          </svg>
        </button>
        <ul id="perbaikanPresensiAsramaSuperAdmin"
          class="{{ request()->is('*perbaikanPresensiAsrama*') ? '' : 'hidden' }} space-y-2">
          @foreach ($lembagaAsramas as $lembaga)
            <li
              class="{{ request()->is($lembaga->id . '/superadmin/perbaikanPresensiAsrama') ? 'navbar-active' : '' }}">
              <a href="/{{ $lembaga->id }}/superadmin/perbaikanPresensiAsrama" wire:navigate
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
      aria-controls="dropdown-pages" data-collapse-toggle="rekapPresensi">
      <i class="fa-solid fa-book text-blue-500"></i>
      <span class="flex-1 ml-3 text-left">Rekap Presensi</span>
      <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
        xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd"
          d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
          clip-rule="evenodd"></path>
      </svg>
    </button>
    <ul id="rekapPresensi" class="{{ request()->is('*rekapPresensi*') ? '' : 'hidden' }} space-y-2">
      @foreach ($lembagaSelainAsrama as $lembaga)
        <li class="{{ request()->is($lembaga->id . '/superadmin/rekapPresensi') ? 'navbar-active' : '' }}">
          <a href="/{{ $lembaga->id }}/superadmin/rekapPresensi" wire:navigate
            class="flex items-center ml-5 p-1 text-gray-900 rounded-lg dark:text-white">
            <i class="fa-solid fa-book text-blue-500"></i>
            <span class="ms-3">{{ $lembaga->nama_singkat }}</span>
          </a>
        </li>
      @endforeach
    </ul>
  </li>
  {{-- Rekap Presensi End --}}


  {{-- Rekap PresensiJumlah Start --}}
  <li class="">
    <button type="button"
      class="flex p-1 items-center w-full text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
      aria-controls="dropdown-pages" data-collapse-toggle="rekapPresensiJumlah">
      <i class="fa-solid fa-book text-green-500"></i>
      <span class="flex-1 ml-3 text-left">Rekap Presensi (Jumlah)</span>
      <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
        xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd"
          d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
          clip-rule="evenodd"></path>
      </svg>
    </button>
    <ul id="rekapPresensiJumlah" class="{{ request()->is('*rekapPresensiJumlah*') ? '' : 'hidden' }} space-y-2">
      @foreach ($lembagaSelainAsrama as $lembaga)
        <li class="{{ request()->is($lembaga->id . '/superadmin/rekapPresensiJumlah') ? 'navbar-active' : '' }}">
          <a href="/{{ $lembaga->id }}/superadmin/rekapPresensiJumlah" wire:navigate
            class="flex items-center ml-5 p-1 text-gray-900 rounded-lg dark:text-white">
            <i class="fa-solid fa-book text-green-500"></i>
            <span class="ms-3">{{ $lembaga->nama_singkat }}</span>
          </a>
        </li>
      @endforeach
    </ul>
  </li>
  {{-- Rekap PresensiJumlah End --}}

  {{-- Rekapitulasi Start --}}
  <li>
    <button type="button"
      class="flex p-1 items-center w-full text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
      aria-controls="dropdown-pages" data-collapse-toggle="rekapitulasi">
      <i class="fa-solid fa-book text-green-500"></i>
      <span class="flex-1 ml-3 text-left ">Rekapitulasi</span>
      <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
        xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd"
          d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
          clip-rule="evenodd"></path>
      </svg>
    </button>
    <ul id="rekapitulasi" class="{{ request()->is('*rekap*') ? '' : 'hidden' }} space-y-2">
      <li class="{{ request()->is('superadmin/rekapPelanggaran*') ? 'navbar-active' : '' }}">
        <a wire:navigate href="/superadmin/rekapPelanggaran"
          class="flex items-center ml-5 p-1 text-gray-900 rounded-lg dark:text-white">
          <i class="fa-solid fa-book text-green-500"></i>
          <span class="ms-3">Pelanggaran</span>
        </a>
      </li>
      <li class="{{ request()->is('superadmin/rekapPembinaan*') ? 'navbar-active' : '' }}">
        <a href="/superadmin/rekapPembinaan" wire:navigate
          class="flex items-center ml-5 p-1 text-gray-900 rounded-lg dark:text-white">
          <i class="fa-solid fa-book text-green-500"></i>
          <span class="ms-3">Pembinaan Santri</span>
        </a>
      </li>
      <li class="{{ request()->is('superadmin/rekapPenghargaan*') ? 'navbar-active' : '' }}">
        <a href="/superadmin/rekapPenghargaan" wire:navigate
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
    <a wire:navigate href="/raporSantri/semua/superadmin"
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
      aria-controls="dropdown-pages" data-collapse-toggle="raporLembagabysuperadmin">
      <i class="fa-solid fa-book text-green-500"></i>
      <span class="flex-1 ml-3 text-left ">Rapor Asatidz</span>
      <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
        xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd"
          d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
          clip-rule="evenodd"></path>
      </svg>
    </button>
    <ul id="raporLembagabysuperadmin" class="{{ request()->is('*/raporLembaga*') ? '' : 'hidden' }} space-y-2">

      @if ($lembagas)
        @foreach ($lembagaSelainAsrama as $lembaga)
          <li class="{{ request()->is($lembaga->id . '/superadmin/raporLembaga*') ? 'navbar-active' : '' }}">
            <a href="/{{ $lembaga->id }}/superadmin/raporLembaga" wire:navigate
              class="flex items-center ml-5 p-1 text-gray-900 rounded-lg dark:text-white">
              <i class="fa-solid fa-book text-green-500"></i>
              <span class="ms-3">{{ $lembaga->nama_singkat }}</span>
            </a>
          </li>
        @endforeach
      @endif
    </ul>
  </li>
  {{-- Rapor Asatidz end --}}


  {{-- Rapor Pendamping start --}}
  <li>
    <button type="button"
      class="flex p-1 items-center w-full text-gray-900 rounded-lg transition duration-75 group hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700"
      aria-controls="dropdown-pages" data-collapse-toggle="raporPendampingbysuperadmin">
      <i class="fa-solid fa-book text-green-500"></i>
      <span class="flex-1 ml-3 text-left ">Rapor Pendamping</span>
      <svg aria-hidden="true" class="w-6 h-6" fill="currentColor" viewBox="0 0 20 20"
        xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd"
          d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z"
          clip-rule="evenodd"></path>
      </svg>
    </button>
    <ul id="raporPendampingbysuperadmin" class="{{ request()->is('*/raporPendamping*') ? '' : 'hidden' }} space-y-2">

      @if ($lembagas)
        @foreach ($lembagaAsramas as $lembaga)
          <li class="{{ request()->is($lembaga->id . '/superadmin/raporPendamping*') ? 'navbar-active' : '' }}">
            <a href="/{{ $lembaga->id }}/superadmin/raporPendamping" wire:navigate
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

  {{-- Rapor Wablas Start --}}
  <li class="{{ request()->is('raporWablas*') ? 'navbar-active' : '' }}">
    <a wire:navigate href="/raporWablas"
      class="flex items-center p-1 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
      <i class="fa-solid fa-book text-green-500"></i>
      <span class="ms-3">Rapor Wablas</span>
    </a>
  </li>
  {{-- Rapor Wablas End --}}

@endhasrole
{{-- Super Admin Menu End --}}
