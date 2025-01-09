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
        UH1
      </th>
      <th scope="col" class="px-6 py-3">
        UH2
      </th>
      <th scope="col" class="px-6 py-3">
        UH3
      </th>
      <th scope="col" class="px-6 py-3">
        UH4
      </th>
      <th scope="col" class="px-6 py-3">
        UH5
      </th>
      <th scope="col" class="px-6 py-3">
        PTS
      </th>
      <th scope="col" class="px-6 py-3">
        PAS
      </th>
      <th scope="col" class="px-6 py-3">
        Rata-rata
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
          @foreach ($nilais as $nilai)
            @if ($nilai->santri_id == $santri->id)
              {{ $nilai->uh1 }}
            @endif
          @endforeach
        </td>
        <td class="px-6 py-4">
          @foreach ($nilais as $nilai)
            @if ($nilai->santri_id == $santri->id)
              {{ $nilai->uh2 }}
            @endif
          @endforeach
        </td>
        <td class="px-6 py-4">
          @foreach ($nilais as $nilai)
            @if ($nilai->santri_id == $santri->id)
              {{ $nilai->uh3 }}
            @endif
          @endforeach
        </td>
        <td class="px-6 py-4">
          @foreach ($nilais as $nilai)
            @if ($nilai->santri_id == $santri->id)
              {{ $nilai->uh4 }}
            @endif
          @endforeach
        </td>
        <td class="px-6 py-4">
          @foreach ($nilais as $nilai)
            @if ($nilai->santri_id == $santri->id)
              {{ $nilai->uh5 }}
            @endif
          @endforeach
        </td>
        <td class="px-6 py-4">
          @foreach ($nilais as $nilai)
            @if ($nilai->santri_id == $santri->id)
              {{ $nilai->pts }}
            @endif
          @endforeach
        </td>
        <td class="px-6 py-4">
          @foreach ($nilais as $nilai)
            @if ($nilai->santri_id == $santri->id)
              {{ $nilai->pas }}
            @endif
          @endforeach
        </td>
        <td class="px-6 py-4">
          @foreach ($nilais as $nilai)
            @if ($nilai->santri_id == $santri->id)
              {{ round(($nilai->uh1 + $nilai->uh2 + $nilai->uh3 + $nilai->uh4 + $nilai->uh5 + $nilai->pts * 2 + $nilai->pas * 2) / 9, 2) }}
            @endif
          @endforeach
        </td>

      </tr>
    @endforeach
  </tbody>
</table>
