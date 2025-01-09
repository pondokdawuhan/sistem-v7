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
        Poin Formal
      </th>
      <th scope="col" class="px-6 py-3">
        Poin Madin
      </th>
      <th scope="col" class="px-6 py-3">
        Poin MMQ
      </th>
      <th scope="col" class="px-6 py-3">
        Poin Asrama
      </th>
      <th scope="col" class="px-6 py-3">
        Poin Ekstrakurikuler
      </th>
      <th scope="col" class="px-6 py-3">
        Poin Ibadah
      </th>
      <th scope="col" class="px-6 py-3">
        Poin Pelanggaran
      </th>
      <th scope="col" class="px-6 py-3">
        Pengurangan
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
        <td class="px-6 py-4">{{ $poin->santri->name }}</td>
        <td class="px-6 py-4">
          @if ($poin->santri->kelas_smp_id)
            {{ $poin->santri->kelasSmp->name }}
          @elseif ($poin->santri->kelas_ma_id)
            {{ $poin->santri->kelasMa->name }}
          @endif
        </td>
        <td class="px-6 py-4">{{ $poin->poin_formal }}</td>
        <td class="px-6 py-4">{{ $poin->poin_madin }}</td>
        <td class="px-6 py-4">{{ $poin->poin_mmq }}</td>
        <td class="px-6 py-4">{{ $poin->poin_asrama }}</td>
        <td class="px-6 py-4">{{ $poin->poin_ekstrakurikuler }}</td>
        <td class="px-6 py-4">{{ $poin->poin_ibadah }}</td>
        <td class="px-6 py-4">{{ $poin->poin_pelanggaran }}</td>
        <td class="px-6 py-4">{{ $poin->poin_dikurangi }}</td>
        <td class="px-6 py-4 bold text-red-500 font-bold text-base">{{ $poin->jumlah }}</td>

      </tr>
    @endforeach
  </tbody>
</table>
