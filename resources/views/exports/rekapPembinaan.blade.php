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
        Pembinaan
      </th>
      <th scope="col" class="px-6 py-3">
        Tindak Lanjut
      </th>
      <th scope="col" class="px-6 py-3">
        Aksi
      </th>
    </tr>
  </thead>
  <tbody>
    @foreach ($pembinaans as $pembinaan)
      <tr
        class="bg-white border-b  bg-opacity-85 dark:bg-slate-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

        <td class="px-6 py-4">{{ $loop->iteration }}</td>
        <td class="px-6 py-4">{{ date('d-m-Y', strtotime($pembinaan->tanggal)) }}</td>
        <td class="px-6 py-4">{{ $pembinaan->santri->name }}</td>
        <td class="px-6 py-4">{{ $pembinaan->pembinaan }}</td>
        <td class="px-6 py-4">{{ $pembinaan->tindak_lanjut }}</td>
        <td class="px-6 py-4">
          <a href="/pembinaanSantri/{{ $pembinaan->id }}/edit"><i
              class=" fa-solid fa-edit text-white bg-sky-500 rounded-lg text-xs px-3 py-1 inline-block cursor-pointer"></i></a>
          <i class="toggleDeleteModal mt-2 fa-solid fa-trash text-white bg-red-500 rounded-lg text-xs px-3 py-1 inline-block cursor-pointer"
            data-modal-target="popup-modal" data-modal-toggle="popup-modal"
            data-title="Apakah Anda yakin menghapus pembinaan ini?" data-url="{{ request()->path() }}"
            data-id="{{ $pembinaan->id }}"></i>

        </td>
      </tr>
    @endforeach
  </tbody>
</table>
