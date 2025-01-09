<div class="overflow-hidden">
  <x-loading></x-loading>

  <div class="mt-2 overflow-hidden">
    <select wire:model.live='selectedBulan' id=""
      class="px-3 py-1 rounded-md dark:text-white dark:bg-slate-800 mb-2">
      <option value="7|{{ $tahunAjaran[0] }}">Juli {{ $tahunAjaran[0] }}</option>
      <option value="8|{{ $tahunAjaran[0] }}">Agustus {{ $tahunAjaran[0] }}</option>
      <option value="9|{{ $tahunAjaran[0] }}">September {{ $tahunAjaran[0] }}</option>
      <option value="10|{{ $tahunAjaran[0] }}">Oktober {{ $tahunAjaran[0] }}</option>
      <option value="11|{{ $tahunAjaran[0] }}">November {{ $tahunAjaran[0] }}</option>
      <option value="12|{{ $tahunAjaran[0] }}">Desember {{ $tahunAjaran[0] }}</option>
      <option value="1|{{ $tahunAjaran[1] }}">Januari {{ $tahunAjaran[1] }}</option>
      <option value="2|{{ $tahunAjaran[1] }}">Februari {{ $tahunAjaran[1] }}</option>
      <option value="3|{{ $tahunAjaran[1] }}">Maret {{ $tahunAjaran[1] }}</option>
      <option value="4|{{ $tahunAjaran[1] }}">April {{ $tahunAjaran[1] }}</option>
      <option value="5|{{ $tahunAjaran[1] }}">Mei {{ $tahunAjaran[1] }}</option>
      <option value="6|{{ $tahunAjaran[1] }}">Juni {{ $tahunAjaran[1] }}</option>
    </select>
    <p class="mb-2 text-white italic">
      Klik nama untuk detail rapor asatidz</p>
    <div class=" overflow-x-auto shadow-md sm:rounded-lg">
      <div class="overflow-auto">
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 bg-opacity-85">
          <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
            <tr>
              <th scope="col" class="px-6 py-3 text-center">
                No
              </th>
              <th scope="col" class="px-6 py-3 text-center">
                Nama
              </th>
              <th scope="col" class="px-6 py-3 text-center">
                Poin Ibadah
              </th>
              <th scope="col" class="px-6 py-3 text-center">
                Poin Kegiatan
              </th>
              <th scope="col" class="px-6 py-3 text-center">
                Poin Pelanggaran
              </th>
              <th scope="col" class="px-6 py-3 text-center">
                Jumlah Poin
              </th>
              <th scope="col" class="px-6 py-3 text-center">
                Jurnal Sholat
              </th>
              <th scope="col" class="px-6 py-3 text-center">
                Jurnal Asrama
              </th>
              <th scope="col" class="px-6 py-3 text-center">
                Jurnal Insidentil
              </th>
            </tr>
          </thead>
          <tbody>

            @foreach ($users as $user)
              <tr
                class="bg-white border-b  bg-opacity-85 dark:bg-slate-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                <td class="px-4 py-2 text-center ">{{ $loop->iteration }}</td>
                <td class="px-4 py-2 text-center"><a wire:navigate
                    href="/{{ $lembaga->id }}/{{ $role }}/raporPendamping/detail/{{ $user->username }}">{{ $user->name }}</a>
                </td>
                <td>
                  @if ($user->poinPendamping)
                    {{ $user->poinPendamping->poin_ibadah }}
                  @endif
                </td>
                <td>
                  @if ($user->poinPendamping)
                    {{ $user->poinPendamping->poin_kegiatan }}
                  @endif
                </td>
                <td>
                  @if ($user->poinPendamping)
                    {{ $user->poinPendamping->poin_pelanggaran }}
                  @endif
                </td>
                <td>
                  @if ($user->poinPendamping)
                    {{ $user->poinPendamping->jumlah }}
                  @endif
                </td>
                <td class="px-4 py-2 text-center">
                  @php
                    $jumlahJurnalSholat = 0;

                    foreach ($jurnalSholats as $jurnal) {
                        if ($jurnal->user_id == $user->id) {
                            $jumlahJurnalSholat += 1;
                        }
                    }
                  @endphp
                  {{ $jumlahJurnalSholat }}
                </td>
                <td class="px-4 py-2 text-center">
                  @php
                    $jumlahJurnalAsrama = 0;

                    foreach ($jurnalAsramas as $jurnal) {
                        if ($jurnal->user_id == $user->id) {
                            $jumlahJurnalAsrama += 1;
                        }
                    }
                  @endphp
                  {{ $jumlahJurnalAsrama }}
                </td>
                <td class="px-4 py-2 text-center">
                  @php
                    $jumlahJurnalInsidentil = 0;

                    foreach ($jurnalInsidentils as $jurnal) {
                        if ($jurnal->user_id == $user->id) {
                            $jumlahJurnalInsidentil += 1;
                        }
                    }
                  @endphp
                  {{ $jumlahJurnalInsidentil }}
                </td>
              </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>

</div>
