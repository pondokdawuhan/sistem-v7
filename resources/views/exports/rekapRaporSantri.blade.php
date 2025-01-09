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
        Poin MADIN
      </th>
      <th scope="col" class="px-6 py-3">
        Poin MMQ
      </th>
      <th scope="col" class="px-6 py-3">
        Poin ASRAMA
      </th>
      <th scope="col" class="px-6 py-3">
        Poin Ekstra
      </th>
      <th scope="col" class="px-6 py-3">
        Poin Ibadah
      </th>
      <th scope="col" class="px-6 py-3">
        Poin Pelanggaran
      </th>
      <th scope="col" class="px-6 py-3">
        Poin Dikurangi
      </th>
      <th scope="col" class="px-6 py-3">
        Jumlah
      </th>
    </tr>
  </thead>
  <tbody>

    @foreach ($santris as $santri)
      <tr
        class="bg-white border-b  bg-opacity-85 dark:bg-slate-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

        <td class="px-6 py-4">{{ $loop->iteration }}</td>
        <td class="px-6 py-4">{{ $santri->name }} ({{ $santri->dataSantri->jenis_kelamin }})</td>
        <td class="px-6 py-4">
          @foreach ($kelass as $kls)
            @if ($kls->id == $santri->kelas_formal_id)
              {{ $kls->nama }} (formal)
            @endif
          @endforeach
        </td>
        <td class="text-center">
          @if ($santri->poinSantri)
            {{ $santri->poinSantri->poin_formal }}
          @endif
        </td>
        <td class="text-center">
          @if ($santri->poinSantri)
            {{ $santri->poinSantri->poin_madin }}
          @endif
        </td>
        <td class="text-center">
          @if ($santri->poinSantri)
            {{ $santri->poinSantri->poin_mmq }}
          @endif
        </td>
        <td class="text-center">
          @if ($santri->poinSantri)
            {{ $santri->poinSantri->poin_asrama }}
          @endif
        </td>
        <td class="text-center">
          @if ($santri->poinSantri)
            {{ $santri->poinSantri->poin_ekstrakurikuler }}
          @endif
        </td>
        <td class="text-center">
          @if ($santri->poinSantri)
            {{ $santri->poinSantri->poin_ibadah }}
          @endif
        </td>
        <td class="text-center">
          @if ($santri->poinSantri)
            {{ $santri->poinSantri->poin_pelanggaran }}
          @endif
        </td>
        <td class="text-center">
          @if ($santri->poinSantri)
            {{ $santri->poinSantri->poin_dikurangi }}
          @endif
        </td>
        <td class="text-center text-red-500 bold">
          @if ($santri->poinSantri)
            {{ $santri->poinSantri->jumlah }}
          @endif
        </td>

      </tr>
    @endforeach
  </tbody>
</table>
