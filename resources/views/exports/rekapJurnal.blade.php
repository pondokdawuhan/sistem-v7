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
        Materi
      </th>

    </tr>
  </thead>
  <tbody>
    @php
      $i = request('page') ?? 1 * 20 - 19;
    @endphp
    @foreach ($jurnals as $jurnal)
      <tr
        class="bg-white border-b  bg-opacity-85 dark:bg-slate-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
        <td class="px-6 py-4">{{ $i++ }}</td>
        <td class="px-6 py-4">{{ date('d-m-Y H:i', strtotime($jurnal->created_at)) }}</td>
        <td class="px-6 py-4">{{ $jurnal->user->name }}</td>
        <td class="px-6 py-4">{{ $jurnal->kelas->nama }}</td>
        <td class="px-6 py-4">{{ $jurnal->pelajaran->nama }}</td>
        <td class="px-6 py-4">{{ $jurnal->jam }}</td>
        <td class="px-6 py-4">{{ $jurnal->materi }}</td>

      </tr>
    @endforeach
  </tbody>
</table>
