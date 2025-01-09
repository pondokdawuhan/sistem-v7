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
        Keperluan
      </th>
      <th scope="col" class="px-6 py-3">
        Waktu Mulai
      </th>
      <th scope="col" class="px-6 py-3">
        Waktu Selesai
      </th>
      <th scope="col" class="px-6 py-3">
        Cek Satpam
      </th>
      <th scope="col" class="px-6 py-3">
        Status
      </th>
      <th scope="col" class="px-6 py-3">
        Waktu Kembali
      </th>
      <th scope="col" class="px-6 py-3">
        Penanggungjawab
      </th>
    </tr>
  </thead>
  <tbody>
    @php
      $i = (request('page') ?? 1) * 20 - 19;
    @endphp
    @foreach ($izins as $izin)
      <tr
        class="bg-white border-b  bg-opacity-85 dark:bg-slate-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

        <td class="px-6 py-4">{{ $i++ }}</td>
        <td class="px-6 py-4"><a
            href="/detailIzinKeluarSantri/{{ $izin->santri->username }}">{{ $izin->santri->name }}</a>
        </td>
        <td class="px-6 py-4">{{ $izin->keperluan }}</td>
        <td class="px-6 py-4">{{ date('d-m-Y H:i:s', strtotime($izin->waktu_mulai)) }}</td>
        <td class="px-6 py-4">{{ date('d-m-Y H:i:s', strtotime($izin->waktu_selesai)) }}</td>
        <td>
          @if ($izin->cek_satpam == true)
            <span class="px-3 py-1 rounded-md bg-green-500 text-white">Sudah</span>
          @else
            <span class="px-3 py-1 rounded-md bg-red-500 text-white">Belum</span>
          @endif
        </td>
        <td class="px-6 py-4">

          @if ($izin->waktu_selesai > time() && $izin->waktu_kembali == null)
            <span class="px-3 py-1 rounded-md bg-green-500 text-white">Berlaku</span>
          @else
            <span class="px-3 py-1 rounded-md bg-slate-500 text-white">Kadaluarsa</span>
          @endif
        </td>
        <td class="px-6 py-4">
          @if ($izin->waktu_kembali)
            {{ date('d-m-Y H:i:s', strtotime($izin->waktu_kembali)) }} @if ($izin->waktu_kembali < $izin->waktu_selesai)
              <span class="px-3 py-1 rounded-md bg-green-500 text-white mt-2 inline-block">Tepat</span>
            @else
              <span class="px-3 py-1 rounded-md bg-red-500 text-white mt-2 inline-block">Terlambat</span>
            @endif
          @endif
        </td>
        <td class="px-6 py-4">{{ $izin->user->name }}</td>

      </tr>
    @endforeach
  </tbody>
</table>
