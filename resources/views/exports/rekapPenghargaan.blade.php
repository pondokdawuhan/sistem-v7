<table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 bg-opacity-85">
  <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
    <tr>
      <th scope="col" class="px-6 py-3">
        No
      </th>
      <th scope="col" class="px-6 py-3">
        Lembaga
      </th>
      <th scope="col" class="px-6 py-3">
        Tanggal
      </th>
      <th scope="col" class="px-6 py-3">
        Nama
      </th>
      <th scope="col" class="px-6 py-3">
        Prestasi
      </th>
      <th scope="col" class="px-6 py-3">
        Penghargaan
      </th>
    </tr>
  </thead>
  <tbody>
    @foreach ($penghargaans as $penghargaan)
      <tr
        class="bg-white border-b  bg-opacity-85 dark:bg-slate-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

        <td class="px-6 py-4">{{ $loop->iteration }}</td>
        <td class="px-6 py-4">{{ $penghargaan->lembaga->nama_singkat }}</td>
        <td class="px-6 py-4">{{ date('d-m-Y', strtotime($penghargaan->tanggal)) }}</td>
        <td class="px-6 py-4">{{ $penghargaan->santri->name }}</td>
        <td class="px-6 py-4">{{ $penghargaan->prestasi }}</td>
        <td class="px-6 py-4">{{ $penghargaan->penghargaan }}</td>
      </tr>
    @endforeach
  </tbody>
</table>
