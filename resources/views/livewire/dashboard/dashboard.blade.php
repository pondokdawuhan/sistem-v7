<div>
  <div class="flex gap-4 flex-wrap xl:flex-nowrap items-end">
    {{-- santri start --}}
    <div class="flex items-center gap-5 px-3 py-2 rounded-2xl w-full lg:w-1/2 justify-between dark:bg-sky-950 bg-white">
      <div>
        <h5 class="dark:text-white font-bold">Santri Aktif</h5>
        <h1 class="dark:text-white font-bold text-2xl">{{ $santriAktif->count() }}</h1>
      </div>
      <div class="flex">
        <i
          class="fa-solid fa-users text-xl bg-gradient-to-br from-blue-500 to-violet-500 text-white rounded-full p-3"></i>
      </div>
    </div>
    {{-- santri end --}}

    {{-- santri start --}}
    <div class="flex items-center gap-5 px-3 py-2 rounded-2xl w-full lg:w-1/2 justify-between dark:bg-sky-950 bg-white">
      <div>
        <h5 class="dark:text-white font-bold">Asatidz Aktif</h5>
        <h1 class="dark:text-white font-bold text-2xl">{{ $asatidzAktif->count() }}</h1>
      </div>
      <div class="flex">
        <i
          class="fa-solid fa-users text-xl bg-gradient-to-br from-green-500 to-cyan-500 text-white rounded-full p-3"></i>
      </div>
    </div>
    {{-- santri end --}}
  </div>


  <div class="flex gap-4 flex-wrap xl:flex-nowrap items-end my-2">
    {{-- Santri Kota start --}}
    <div class="flex items-center gap-5 px-3 py-2 rounded-2xl w-full lg:w-1/3 justify-between dark:bg-sky-950 bg-white">
      <div>
        <h5 class="dark:text-white font-bold">Santri Kota</h5>
        <h1 class="dark:text-white font-bold text-2xl">{{ $santriKota->count() }}</h1>
      </div>
      <div class="flex">
        <i
          class="fa-solid fa-users text-xl bg-gradient-to-br from-sky-500 to-indigo-500 text-white rounded-full p-3"></i>
      </div>
    </div>
    {{-- santri Kota end --}}

    {{-- santri Kabupaten start --}}
    <div class="flex items-center gap-5 px-3 py-2 rounded-2xl w-full lg:w-1/3 justify-between dark:bg-sky-950 bg-white">
      <div>
        <h5 class="dark:text-white font-bold">Santri Kabupaten</h5>
        <h1 class="dark:text-white font-bold text-2xl">{{ $santriKabupaten->count() }}</h1>
      </div>
      <div class="flex">
        <i
          class="fa-solid fa-users text-xl bg-gradient-to-br from-purple-500 to-pink-500 text-white rounded-full p-3"></i>
      </div>
    </div>
    {{-- santri Kabupaten end --}}

    {{-- santri Luar start --}}
    <div class="flex items-center gap-5 px-3 py-2 rounded-2xl w-full lg:w-1/3 justify-between dark:bg-sky-950 bg-white">
      <div>
        <h5 class="dark:text-white font-bold">Santri Luar</h5>
        <h1 class="dark:text-white font-bold text-2xl">{{ $santriLuar->count() }}</h1>
      </div>
      <div class="flex">
        <i
          class="fa-solid fa-users text-xl bg-gradient-to-br from-violet-500 to-fuchsia-500 text-white rounded-full p-3"></i>
      </div>
    </div>
    {{-- santri Luar end --}}


  </div>

  <div class="flex gap-4 flex-wrap xl:flex-nowrap items-end my-2">
    {{-- Santri Putra start --}}
    <div class="flex items-center gap-5 px-3 py-2 rounded-2xl w-full lg:w-1/4 justify-between dark:bg-sky-950 bg-white">
      <div>
        <h5 class="dark:text-white font-bold">Santri Putra</h5>
        <h1 class="dark:text-white font-bold text-2xl">{{ $santriPutra->count() }}</h1>
      </div>
      <div class="flex">
        <i
          class="fa-solid fa-users text-xl bg-gradient-to-br from-orange-500 to-red-500 text-white rounded-full p-3"></i>
      </div>
    </div>
    {{-- santri Putra end --}}

    {{-- santri Putri start --}}
    <div class="flex items-center gap-5 px-3 py-2 rounded-2xl w-full lg:w-1/4 justify-between dark:bg-sky-950 bg-white">
      <div>
        <h5 class="dark:text-white font-bold">Santri Putri</h5>
        <h1 class="dark:text-white font-bold text-2xl">{{ $santriPutri->count() }}</h1>
      </div>
      <div class="flex">
        <i
          class="fa-solid fa-users text-xl bg-gradient-to-br from-emerald-500 to-green-500 text-white rounded-full p-3"></i>
      </div>
    </div>
    {{-- santri Putri end --}}

    {{-- Asatidz Putra start --}}
    <div class="flex items-center gap-5 px-3 py-2 rounded-2xl w-full lg:w-1/4 justify-between dark:bg-sky-950 bg-white">
      <div>
        <h5 class="dark:text-white font-bold">Asatidz Putra</h5>
        <h1 class="dark:text-white font-bold text-2xl">{{ $asatidzPutra->count() }}</h1>
      </div>
      <div class="flex">
        <i
          class="fa-solid fa-users text-xl bg-gradient-to-br from-blue-500 to-indigo-500 text-white rounded-full p-3"></i>
      </div>
    </div>
    {{-- Asatidz Putra end --}}

    {{-- Asatidz Putri start --}}
    <div class="flex items-center gap-5 px-3 py-2 rounded-2xl w-full lg:w-1/4 justify-between dark:bg-sky-950 bg-white">
      <div>
        <h5 class="dark:text-white font-bold">Asatidz Putri</h5>
        <h1 class="dark:text-white font-bold text-2xl">{{ $asatidzPutri->count() }}</h1>
      </div>
      <div class="flex">
        <i
          class="fa-solid fa-users text-xl bg-gradient-to-br from-rose-500 to-pink-500 text-white rounded-full p-3"></i>
      </div>
    </div>
    {{-- Asatidz Putri end --}}

  </div>


  <div class="mt-5 mb-2 lg:grid grid-cols-2 gap-5 lg:gap-4">
    {{-- Kelas SMP Start --}}
    @foreach ($lembagaSemua as $lembaga)
      <div class="overflow-x-auto shadow-md sm:rounded-lg w-full mt-2 lg:mt-0">
        <h5 class="text-center dark:text-white font-bold">KELAS {{ $lembaga->nama }}</h5>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
          <thead class="text-xs text-slate-700 uppercase bg-gray-90 dark:bg-gray-900 dark:text-white">
            <tr>
              <th scope="col" class="px-6 py-3">
                Kelas
              </th>
              <th scope="col" class="px-6 py-3">
                Laki-laki
              </th>
              <th scope="col" class="px-6 py-3">
                Perempuan
              </th>
              <th scope="col" class="px-6 py-3">
                Jumlah
              </th>

            </tr>
          </thead>
          <tbody>
            @foreach ($lembaga->kelas as $kelas)
              @php

                switch ($lembaga->jenis_lembaga) {
                    case 'FORMAL':
                        $kelasSantri = 'kelas_formal_id';
                        break;

                    case 'MADIN':
                        $kelasSantri = 'kelas_madin_id';
                        break;

                    case 'MMQ':
                        $kelasSantri = 'kelas_mmq_id';
                        break;

                    case 'ASRAMA':
                        $kelasSantri = 'kelas_asrama_id';
                        break;
                }
                $laki = 0;
                $perempuan = 0;
                foreach ($santriAktif as $santri) {
                    if ($santri->$kelasSantri == $kelas->id) {
                        if ($santri->dataSantri->jenis_kelamin == 'Laki-laki') {
                            $laki += 1;
                        } else {
                            $perempuan += 1;
                        }
                    }
                }
              @endphp
              <tr class="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                  {{ $kelas->nama }}
                </th>
                <td class="px-6 py-4">
                  {{ $laki }}
                </td>
                <td class="px-6 py-4">
                  {{ $perempuan }}
                </td>
                <td class="px-6 py-4">
                  {{ $laki + $perempuan }}
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    @endforeach
    {{-- Kelas SMP End --}}
  </div>
</div>
