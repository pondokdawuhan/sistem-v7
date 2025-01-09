<table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 bg-opacity-85">
  <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
    <tr>
      <th scope="col" class="px-6 py-3">
        No
      </th>
      <th scope="col" class="px-6 py-3">
        Nama
      </th>
      <th scope="col" class="px-6 py-3">
        Jumlah Jam
      </th>
      <th scope="col" class="px-6 py-3">
        Jumlah Jurnal
      </th>
      <th scope="col" class="px-6 py-3">
        Presentase
      </th>
      <th scope="col" class="px-6 py-3">
        Izin
      </th>
    </tr>
  </thead>
  <tbody>

    @php
      $i = (request('page') ?? 1) * 20 - 19;
    @endphp
    @foreach ($users as $user)
      <tr
        class="bg-white border-b  bg-opacity-85 dark:bg-slate-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

        <td class="px-6 py-4">{{ $i++ }}</td>
        <td class="px-6 py-4">{{ $user->name }}</td>
        <td class="px-6 py-4">
          @php
            $jadwalSenin = 0;
            $jadwalSelasa = 0;
            $jadwalRabu = 0;
            $jadwalKamis = 0;
            $jadwalJumat = 0;
            $jadwalSabtu = 0;
            $jadwalAhad = 0;

            switch (request('lembaga')) {
                case 'SMP':
                    $data = $user->jadwalPelajaranSmp;
                    break;
                case 'MA':
                    $data = $user->jadwalPelajaranMa;
                    break;
                case 'MADIN':
                    $data = $user->jadwalPelajaranMadin;
                    break;
                case 'MMQ':
                    $data = $user->jadwalPelajaranMmq;
                    break;
            }

            foreach ($data as $jadwal) {
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

            $jadwalSenin *= $pekanEfektif['senin'];
            $jadwalSelasa *= $pekanEfektif['selasa'];
            $jadwalRabu *= $pekanEfektif['rabu'];
            $jadwalKamis *= $pekanEfektif['kamis'];
            $jadwalJumat *= $pekanEfektif['jumat'];
            $jadwalSabtu *= $pekanEfektif['sabtu'];
            $jadwalAhad *= $pekanEfektif['ahad'];

            $jumlahJam =
                $jadwalSenin + $jadwalSelasa + $jadwalRabu + $jadwalKamis + $jadwalJumat + $jadwalSabtu + $jadwalAhad;
          @endphp
          {{ $jumlahJam }}
        </td>

        <td class="px-6 py-4">

          @php
            $jumlahJurnal = 0;

            foreach ($jurnals as $jurnal) {
                if ($jurnal->user_id == $user->id) {
                    $jumlahJurnal += 1;
                }
            }
          @endphp
          {{ $jumlahJurnal }}
        </td>

        <td class="px-6 py-4">
          @if ($jumlahJam)
            {{ ceil(($jumlahJurnal / $jumlahJam) * 100) }} %
          @else
            0%
          @endif
        </td>

        <td class="px-6 py-4">

          @php
            $jumlahIzin = 0;

            foreach ($izins as $izin) {
                if ($izin->user_id == $user->id) {
                    $jumlahIzin += 1;
                }
            }
          @endphp
          {{ $jumlahIzin }}
        </td>
      </tr>
    @endforeach
  </tbody>
</table>
