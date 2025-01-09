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
        Poin Ibadah
      </th>
      <th scope="col" class="px-6 py-3">
        Poin Kegiatan
      </th>

      <th scope="col" class="px-6 py-3">
        Jumlah
      </th>
    </tr>
  </thead>
  <tbody>
    @foreach ($poins as $poin)
      <tr
        class="bg-white border-b  bg-opacity-85 dark:bg-slate-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

        <td class="px-6 py-4">{{ $loop->iteration }}</td>
        <td class="px-6 py-4">{{ $poin->user->name }}</td>
        <td class="px-6 py-4">{{ $poin->poin_ibadah }}</td>
        <td class="px-6 py-4">{{ $poin->poin_kegiatan }}</td>
        <td class="px-6 py-4 bold text-red-500 font-bold text-base">{{ $poin->jumlah }}</td>

      </tr>
    @endforeach
  </tbody>
</table>
