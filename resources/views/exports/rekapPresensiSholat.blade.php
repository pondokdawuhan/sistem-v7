<table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 bg-opacity-85">
  <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
    <tr>
      <th scope="col" class="px-6 py-3">
        No
      </th>
      <th scope="col" class="px-6 py-3">
        Tanggal
      </th>
      <th scope="col" class="px-6 py-3">
        Nama
      </th>
      <th scope="col" class="px-6 py-3">
        Kelas
      </th>
      <th scope="col" class="px-6 py-3">
        Waktu
      </th>

      <th scope="col" class="px-6 py-3">
        Keterangan
      </th>
      <th scope="col" class="px-6 py-3">
        Penanggungjawab
      </th>
    </tr>
  </thead>
  <tbody>
    @php
      $i = request('page') ?? 1 * 20 - 19;
    @endphp
    @foreach ($presensis as $presensi)
      <tr
        class="bg-white border-b  bg-opacity-85 dark:bg-slate-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
        <td class="px-6 py-4">{{ $i++ }}</td>
        <td class="px-6 py-4">{{ date('d-m-Y H:i', strtotime($presensi->created_at)) }}</td>
        <td class="px-6 py-4">{{ $presensi->santri->name }}</td>
        <td class="px-6 py-4">
          @if ($presensi->santri->kelasSmp)
            {{ $presensi->santri->kelasSmp->name }}
          @elseif($presensi->santri->kelasMa)
            {{ $presensi->santri->kelasMa->name }}
          @else
          @endif
        </td>
        <td class="px-6 py-4">{{ $presensi->waktu }}</td>
        <td class="px-6 py-4">{{ $presensi->keterangan }}</td>
        <td class="px-6 py-4">{{ $presensi->user->name }}</td>
      </tr>
    @endforeach
  </tbody>
</table>
