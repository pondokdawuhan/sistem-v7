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
        Kelas
      </th>
      <th scope="col" class="px-6 py-3">
        Sakit
      </th>
      <th scope="col" class="px-6 py-3">
        Izin
      </th>
      <th scope="col" class="px-6 py-3">
        Alpha
      </th>
    </tr>
  </thead>
  <tbody>
    @foreach ($santris as $santri)
      <tr
        class="bg-white border-b  bg-opacity-85 dark:bg-slate-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

        <td class="px-6 py-4">{{ $loop->iteration }}</td>
        <td class="px-6 py-4">{{ $santri->name }}</td>
        <td class="px-6 py-4">
          @foreach ($kelass as $kls)
            @switch($lembaga->jenis_lembaga)
              @case('FORMAL')
                @if ($santri->kelas_formal_id)
                  @if ($santri->kelas_formal_id == $kls->id)
                    {{ $kls->nama ?? '' }}
                  @endif
                @endif
              @break

              @case('MADIN')
                @if ($santri->kelas_madin_id)
                  @if ($santri->kelas_madin_id == $kls->id)
                    {{ $kls->nama ?? '' }}
                  @endif
                @endif
              @break

              @case('TPQ')
                @if ($santri->kelas_tpq_id)
                  @if ($santri->kelas_tpq_id == $kls->id)
                    {{ $kls->nama ?? '' }}
                  @endif
                @endif
              @break

              @case('ASRAMA')
                @if ($santri->kelas_asrama_id)
                  @if ($santri->kelas_asrama_id == $kls->id)
                    {{ $kls->nama ?? '' }}
                  @endif
                @endif
              @break

              @default
            @endswitch
          @endforeach
        </td>
        @php
          $sakit = 0;
          $izin = 0;
          $alpha = 0;

          foreach ($presensis as $presensi) {
              if ($presensi->santri_id == $santri->id) {
                  switch ($presensi->keterangan) {
                      case 'S':
                          $sakit += 1;

                          break;
                      case 'I':
                          $izin += 1;

                          break;
                      case 'A':
                          $alpha += 1;

                          break;
                  }
              }
          }
        @endphp

        <td>{{ $sakit }}</td>
        <td>{{ $izin }}</td>
        <td>{{ $alpha }}</td>
      </tr>
    @endforeach
  </tbody>
</table>
