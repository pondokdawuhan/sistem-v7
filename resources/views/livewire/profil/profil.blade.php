<div x-data="{ openModal: false }">
  <div class="overflow-auto">
    <x-notifsukses></x-notifsukses>
    @include('partials.notifGagal')

    <a href="/editProfil/{{ auth()->user()->username }}" wire:navigate
      class="bg-violet-500 text-white px-3 py-1 rounded-md font-medium inline-block mb-2">Edit</a>
    <button type="button" x-on:click="openModal=!openModal"
      class="mt-2 text-white bg-amber-500 rounded-lg px-3 py-1 inline-block cursor-pointer">Ganti Password</button>
    <div class="bg-white dark:bg-slate-800 shadow-xl rounded-lg py-3">
      <div class="photo-wrapper p-2">
        <img class="w-[3cm] mx-auto"
          src="{{ auth()->user()->dataUser->foto ? asset('storage/' . auth()->user()->dataUser->foto) : '/assets/images/default.jpg' }}"
          alt="Profile">
      </div>
      <div class="p-2">
        <h3 class="text-center text-xl text-gray-900 dark:text-white font-bold leading-8">{{ auth()->user()->name }}
        </h3>
        <div class="text-center text-gray-400 dark:text-white text-xs font-semibold">
          <p>
            @if (auth()->user()->role)
              @foreach (auth()->user()->role as $role)
                {{ $role->name }} |
              @endforeach
            @endif
          </p>
          <p>
            @if (auth()->user()->lembaga)
              @foreach (auth()->user()->lembaga as $lembaga)
                {{ $lembaga->name }} |
              @endforeach
            @endif
          </p>
        </div>
        <div class="flex flex-wrap lg:flex-nowrap mt-5 gap-10">
          <div class="w-full lg:w-1/2">
            <h5 class="text-slate-800 dark:text-white border-b dark:border-white border-slate-700">Data Diri
            </h5>
            <table class="text-sm my-3 text-slate-900 dark:text-white">
              <tbody>
                <tr>
                  <td class="px-2 py-2 font-semibold">Username</td>
                  <td class="px-2 py-2">: {{ auth()->user()->username }}</td>
                </tr>
                <tr>
                  <td class="px-2 py-2 font-semibold">Jenis kelamin</td>
                  <td class="px-2 py-2">: {{ auth()->user()->dataUser->jenis_kelamin ?? '' }}</td>
                </tr>
                <tr>
                  <td class="px-2 py-2 font-semibold">Status</td>
                  <td class="px-2 py-2">: {{ auth()->user()->dataUser->status ?? '' }}</td>
                </tr>
                <tr>
                  <td class="px-2 py-2 font-semibold">Tahun Masuk</td>
                  <td class="px-2 py-2">: {{ auth()->user()->dataUser->tahun_masuk ?? '' }}</td>
                </tr>
                <tr>
                  <td class="px-2 py-2 font-semibold">Nomor Induk Yayasan</td>
                  <td class="px-2 py-2">: {{ auth()->user()->dataUser->niy ?? '' }}</td>
                </tr>
                <tr>
                  <td class="px-2 py-2 font-semibold">Nomor Induk Kependudukan</td>
                  <td class="px-2 py-2">: {{ auth()->user()->dataUser->nik ?? '' }}</td>
                </tr>
                <tr>
                  <td class="px-2 py-2 font-semibold">Nomor NUPTK</td>
                  <td class="px-2 py-2">: {{ auth()->user()->dataUser->nuptk ?? '' }}</td>
                </tr>
                <tr>
                  <td class="px-2 py-2 font-semibold">Email</td>
                  <td class="px-2 py-2">: {{ auth()->user()->email }}</td>
                </tr>
                <tr>
                  <td class="px-2 py-2 font-semibold">No HP</td>
                  <td class="px-2 py-2">: @if (auth()->user()->dataUser)
                      @if (auth()->user()->dataUser->no_hp)
                        {{ nomorHp(auth()->user()->dataUser->no_hp) }}
                      @else
                        0
                      @endif
                    @else
                      0
                    @endif
                  </td>
                </tr>
                <tr>
                  <td class="px-2 py-2 font-semibold">Tempat, Tanggal Lahir</td>
                  <td class="px-2 py-2">:
                    {{ auth()->user()->dataUser->tempat_lahir ?? '', auth()->user()->dataUser->tanggal_lahir ?? '' }}
                  </td>
                </tr>
                <tr>
                  <td class="px-2 py-2 font-semibold">Nama Ibu Kandung</td>
                  <td class="px-2 py-2">:
                    {{ auth()->user()->dataUser->nama_ibu ?? '' }}
                  </td>
                </tr>
                <tr>
                  <td class="px-2 py-2 font-semibold">Pendidikan SD</td>
                  <td class="px-2 py-2">:
                    {{ auth()->user()->dataUser->riwayat_sd ?? '' }}
                  </td>
                </tr>
                <tr>
                  <td class="px-2 py-2 font-semibold">Pendidikan SMP</td>
                  <td class="px-2 py-2">:
                    {{ auth()->user()->dataUser->riwayat_smp ?? '' }}
                  </td>
                </tr>
                <tr>
                  <td class="px-2 py-2 font-semibold">Pendidikan SMA</td>
                  <td class="px-2 py-2">:
                    {{ auth()->user()->dataUser->riwayat_sma ?? '' }}
                  </td>
                </tr>
                <tr>
                  <td class="px-2 py-2 font-semibold">Pendidikan S1</td>
                  <td class="px-2 py-2">:
                    {{ auth()->user()->dataUser->riwayat_kuliah_s1 ?? '' }}
                  </td>
                </tr>
                <tr>
                  <td class="px-2 py-2 font-semibold">Pendidikan S2</td>
                  <td class="px-2 py-2">:
                    {{ auth()->user()->dataUser->riwayat_kuliah_s2 ?? '' }}
                  </td>
                </tr>
                <tr>
                  <td class="px-2 py-2 font-semibold">Pendidikan S3</td>
                  <td class="px-2 py-2">:
                    {{ auth()->user()->dataUser->riwayat_kuliah_s3 ?? '' }}
                  </td>
                </tr>
                <tr>
                  <td class="px-2 py-2 font-semibold">Pendidikan Pondok Pesantren</td>
                  <td class="px-2 py-2">:
                    {{ auth()->user()->dataUser->riwayat_pondok ?? '' }}
                  </td>
                </tr>

              </tbody>
            </table>
          </div>
          <div class="w-full lg:w-1/2">
            <h5 class="text-slate-800 dark:text-white border-b dark:border-white border-slate-700">Data Tempat
              Tinggal
            </h5>
            <table class="text-sm my-3 text-slate-900 dark:text-white">
              <tbody>
                <tr>
                  <td class="px-2 py-2 font-semibold">Jalan</td>
                  <td class="px-2 py-2">: {{ auth()->user()->dataUser->jalan ?? '' }}</td>
                </tr>
                <tr>
                  <td class="px-2 py-2 font-semibold">RT</td>
                  <td class="px-2 py-2">: {{ auth()->user()->dataUser->rt ?? '' }}</td>
                </tr>
                <tr>
                  <td class="px-2 py-2 font-semibold">RW</td>
                  <td class="px-2 py-2">: {{ auth()->user()->dataUser->rw ?? '' }}</td>
                </tr>
                <tr>
                  <td class="px-2 py-2 font-semibold">Desa</td>
                  <td class="px-2 py-2">: {{ auth()->user()->dataUser->desa ?? '' }}</td>
                </tr>
                <tr>
                  <td class="px-2 py-2 font-semibold">Kecamatan</td>
                  <td class="px-2 py-2">: {{ auth()->user()->dataUser->kecamatan ?? '' }}</td>
                </tr>
                <tr>
                  <td class="px-2 py-2 font-semibold">Kabupaten/Kota</td>
                  <td class="px-2 py-2">: {{ auth()->user()->dataUser->kabupaten ?? '' }}</td>
                </tr>
                <tr>
                  <td class="px-2 py-2 font-semibold">Provinsi</td>
                  <td class="px-2 py-2">: {{ auth()->user()->dataUser->provinsi ?? '' }}</td>
                </tr>
                <tr>
                  <td class="px-2 py-2 font-semibold">Kode Pos</td>
                  <td class="px-2 py-2">: {{ auth()->user()->dataUser->kodepos ?? '' }}</td>
                </tr>
              </tbody>
            </table>

            <h5 class="text-slate-800 dark:text-white border-b dark:border-white border-slate-700">Kelas
              Mengajar </h5>
            <p class="mt-2 text-slate-800 dark:text-white">
              @if (auth()->user()->kelasMengajar)
                @foreach (auth()->user()->kelasMengajar as $kelasMengajar)
                  {{ $kelasMengajar->nama }} ({{ $kelasMengajar->lembaga->nama_singkat }}) |
                @endforeach
              @endif
            </p>

            <h5 class="text-slate-800 dark:text-white border-b dark:border-white border-slate-700">Pelajaran
            </h5>
            <p class="mt-2 text-slate-800 dark:text-white">
              @if (auth()->user()->pelajaran)
                @foreach (auth()->user()->pelajaran as $pelajaran)
                  {{ $pelajaran->nama }} ({{ $pelajaran->lembaga->nama_singkat }}) |
                @endforeach
              @endif
            </p>
          </div>
        </div>



      </div>
    </div>
  </div>

  <div id="crud-modal" tabindex="-1" aria-hidden="true" x-show="openModal"
    class="overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 justify-center items-center w-full h-screen bg-slate-500/50">
    <div class="relative p-4 w-full h-screen flex justify-center items-center ">
      <!-- Modal content -->
      <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
        <!-- Modal header -->
        <div class="flex items-center justify-between p-4 md:p-5 border-b rounded-t dark:border-gray-600">
          <h3 class="text-lg font-semibold text-gray-900 dark:text-white">
            Ganti Password
          </h3>
          <button type="button" x-on:click="openModal = false"
            class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm w-8 h-8 ms-auto inline-flex justify-center items-center dark:hover:bg-gray-600 dark:hover:text-white"
            data-modal-toggle="crud-modal">
            <svg class="w-3 h-3" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
              viewBox="0 0 14 14">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                d="m1 1 6 6m0 0 6 6M7 7l6-6M7 7l-6 6" />
            </svg>
            <span class="sr-only">Close modal</span>
          </button>
        </div>
        <!-- Modal body -->
        <form class="p-4 md:p-5 inline-block w-full" wire:submit.prevent='gantiPassword'>
          <div class="flex flex-col gap-2 mb-4">
            <div class="flex flex-col w-full">
              <label for="" class="dark:text-white">Password Lama</label>
              <input type="password" class="px-3 py-1 rounded-md dark:bg-slate-800 dark:text-white"
                wire:model='passwordLama' required>
            </div>
          </div>
          <div class="flex flex-col gap-2 mb-4">
            <div class="flex flex-col w-full">
              <label for="" class="dark:text-white">Password Baru</label>
              <input type="password" class="px-3 py-1 rounded-md dark:bg-slate-800 dark:text-white"
                wire:model='passwordBaru1' required>
            </div>
          </div>
          <div class="flex flex-col gap-2 mb-4">
            <div class="flex flex-col w-full">
              <label for="" class="dark:text-white">Ulangi Password Baru</label>
              <input type="password" class="px-3 py-1 rounded-md dark:bg-slate-800 dark:text-white"
                wire:model='passwordBaru2' required>
            </div>
          </div>

          <button type="submit" class="px-3 py-1 rounded-md bg-violet-500 text-white" x-on:click="openModal=false">
            Simpan
          </button>
        </form>
      </div>
    </div>
  </div>
  <x-loading></x-loading>
</div>
