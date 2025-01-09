<div class=" overflow-x-hidden shadow-md sm:rounded-lg">
  <div class="flex items-center gap-2 mb-2 flex-wrap">
    <div class="flex items-center gap-2 mb-2 flex-wrap">
      <a wire:navigate href="/{{ $role }}/izinPulangPendamping"
        class="px-3 py-1 rounded-md bg-slate-500 text-white inline-block">Kembali</a>
      <div class="flex gap-2">
        <div class="">
          <select wire:model.live="paginate" class="px-3 py-1 rounded-md dark:bg-slate-800 dark:text-white">
            <option value="20">20</option>
            <option value="40">40</option>
            <option value="50">50</option>
            <option value="100">100</option>
          </select>
        </div>

      </div>
    </div>
  </div>

  <div class="overflow-auto">
    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 bg-opacity-85">
      <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
          <th scope="col" class="px-6 py-3">
            No
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
            Persetujuan Pengasuh
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
            <td class="px-6 py-4">{{ $izin->keperluan }}</td>
            <td class="px-6 py-4">{{ date('d-m-Y H:i:s', strtotime($izin->waktu_mulai)) }}</td>
            <td class="px-6 py-4">{{ date('d-m-Y H:i:s', strtotime($izin->waktu_selesai)) }}</td>
            <td>

              <span
                class="px-3 py-1 rounded-md @if ($izin->persetujuan_pengasuh == 'Ya') bg-green-500 @else bg-red-500 @endif text-white">{{ $izin->persetujuan_pengasuh }}</span>
            </td>
            <td>
              @if ($izin->cek_satpam == true)
                <span class="px-3 py-1 rounded-md bg-green-500 text-white">Sudah</span>
              @else
                <span class="px-3 py-1 rounded-md bg-red-500 text-white">Belum</span>
              @endif
            </td>
            <td class="px-6 py-4">

              @if (strtotime($izin->waktu_selesai) > time() && $izin->waktu_kembali == null)
                <span class="px-3 py-1 rounded-md bg-green-500 text-white">Berlaku</span>
              @else
                <span class="px-3 py-1 rounded-md bg-slate-500 text-white">Kadaluarsa</span>
              @endif
            </td>
            <td class="px-6 py-4">
              @if ($izin->waktu_kembali)
                {{ date('d-m-Y H:i:s', strtotime($izin->waktu_kembali)) }}
                @if (strtotime($izin->waktu_kembali) < strtotime($izin->waktu_selesai))
                  <span class="px-3 py-1 rounded-md bg-green-500 text-white mt-2 inline-block">Tepat</span>
                @else
                  <span class="px-3 py-1 rounded-md bg-red-500 text-white mt-2 inline-block">Terlambat</span>
                @endif
              @endif
            </td>

          </tr>
        @endforeach
      </tbody>
    </table>
  </div>

  <div class="mt-4 flex justify-end">
    {{ $izins->links() }}
  </div>


</div>
