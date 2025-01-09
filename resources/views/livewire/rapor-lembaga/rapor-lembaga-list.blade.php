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
      @if ($jadwals)
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
                  Mapel
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                  Jurnal
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                  Izin
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                  Jurnal Sholat
                </th>
                <th scope="col" class="px-6 py-3 text-center">
                  Jurnal Insidentil
                </th>
              </tr>
            </thead>
            <tbody>

              @php
                $i = 1;
              @endphp
              @foreach ($users as $user)
                @if ($user->pelajaran)
                  @if ($user->jadwalPelajaran)
                    @foreach ($user->pelajaran as $pelajaran)
                      @if ($pelajaran->lembaga_id == $lembaga->id)
                        <tr
                          class="bg-white border-b  bg-opacity-85 dark:bg-slate-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                          <td class="px-4 py-2 text-center ">{{ $i++ }}</td>
                          <td class="px-4 py-2"><a
                              href="/{{ $lembaga->id }}/{{ $role }}/raporLembaga/detail/{{ $user->username }}">{{ $user->name }}</a>
                          </td>
                          <td class="px-4 py-2">{{ $pelajaran->nama }}</td>
                          <td class="px-4 py-2 text-center">
                            @php
                              $jadwalSenin = 0;
                              $jadwalSelasa = 0;
                              $jadwalRabu = 0;
                              $jadwalKamis = 0;
                              $jadwalJumat = 0;
                              $jadwalSabtu = 0;
                              $jadwalAhad = 0;
                              foreach ($jadwals as $jadwal) {
                                  if ($jadwal->pelajaran_id == $pelajaran->id && $jadwal->user_id == $user->id) {
                                      switch ($jadwal->hari) {
                                          case 'senin':
                                              $jadwalSenin += 1;
                                              break;

                                          case 'selasa':
                                              $jadwalSelasa += 1;
                                              break;

                                          case 'rabu':
                                              $jadwalRabu += 1;
                                              break;

                                          case 'kamis':
                                              $jadwalKamis += 1;
                                              break;

                                          case 'jumat':
                                              $jadwalJumat += 1;
                                              break;

                                          case 'sabtu':
                                              $jadwalSabtu += 1;
                                              break;

                                          case 'ahad':
                                              $jadwalAhad += 1;
                                              break;
                                      }
                                  }
                              }
                              $jumlahJam =
                                  $jadwalSenin * $pekanEfektif['senin'] +
                                  $jadwalSelasa * $pekanEfektif['selasa'] +
                                  $jadwalRabu * $pekanEfektif['rabu'] +
                                  $jadwalKamis * $pekanEfektif['kamis'] +
                                  $jadwalJumat * $pekanEfektif['jumat'] +
                                  $jadwalSabtu * $pekanEfektif['sabtu'] +
                                  $jadwalAhad * $pekanEfektif['ahad'];

                              $jumlahJurnal = 0;

                              foreach ($jurnals as $jurnal) {
                                  if ($jurnal->pelajaran_id == $pelajaran->id && $jurnal->user_id == $user->id) {
                                      $jumlahJurnal += 1;
                                  }
                              }
                            @endphp
                            {{ $jumlahJurnal }} | {{ $jumlahJam }}
                            @if ($jumlahJam)
                              ({{ ceil(($jumlahJurnal / $jumlahJam) * 100) }}%)
                            @endif
                          </td>

                          <td class="px-4 py-2 text-center">
                            @php
                              $jumlahIzin = 0;

                              foreach ($izinAsatidzs as $izinAsatidz) {
                                  if ($izinAsatidz->user_id == $user->id) {
                                      $jumlahIzin += 1;
                                  }
                              }
                            @endphp
                            {{ $jumlahIzin }}
                          </td>

                          <td class="px-4 py-2 text-center">
                            @php
                              $jumlahJurnalSholatSantri = 0;

                              foreach ($jurnalSholats as $jurnalSholat) {
                                  if ($jurnalSholat->user_id == $user->id) {
                                      $jumlahJurnalSholatSantri += 1;
                                  }
                              }
                            @endphp
                            {{ $jumlahJurnalSholatSantri }}
                          </td>

                          <td class="px-4 py-2 text-center">
                            @php
                              $jumlahJurnalInsidentilSantri = 0;

                              foreach ($jurnalInsidentils as $jurnalInsidentil) {
                                  if ($jurnalInsidentil->user_id == $user->id) {
                                      $jumlahJurnalInsidentilSantri += 1;
                                  }
                              }
                            @endphp
                            {{ $jumlahJurnalInsidentilSantri }}
                          </td>

                        </tr>
                      @endif
                    @endforeach
                  @endif
                @endif
              @endforeach
            </tbody>
          </table>
        </div>
      @else
        <h4>Jadwal belum tersedia, rapor asatidz tidak bisa ditampilkan!</h4>
      @endif
    </div>
  </div>

</div>
