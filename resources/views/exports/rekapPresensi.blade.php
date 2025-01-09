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
        Mapel
      </th>
      <th scope="col" class="px-6 py-3">
        Jam
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
    @foreach ($presensis as $presensi)
      <tr
        class="bg-white border-b  bg-opacity-85 dark:bg-slate-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

        <td class="px-6 py-4">{{ $loop->iteration }}</td>
        <td class="px-6 py-4">{{ date('d-m-Y', strtotime($presensi->created_at)) }}</td>
        <td class="px-6 py-4">{{ $presensi->santri->name }}</td>
        <td class="px-6 py-4">{{ $presensi->kelas->nama }}</td>
        <td class="px-6 py-4">{{ $presensi->pelajaran->nama }}</td>
        <td class="px-6 py-4">{{ $presensi->jam }}</td>
        <td class="px-6 py-4">{{ $presensi->keterangan }}</td>
        <td class="px-6 py-4">{{ $presensi->user->name }}</td>
      </tr>
    @endforeach
  </tbody>
</table>
