<div>
  <div class="overflow-auto">
    @include('partials.notifSukses')
    <a href="/lembaga/create" wire:navigate
      class="px-3 py-1 rounded-md inline-block bg-violet-500 text-white mb-2">Tambah</a>

    <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 bg-opacity-85">
      <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
        <tr>
          <th scope="col" class="px-5 py-3">
            No
          </th>
          <th scope="col" class="px-5 py-3">
            Jenis Lembaga
          </th>
          <th scope="col" class="px-5 py-3">
            Nama
          </th>
          <th scope="col" class="px-5 py-3">
            Nama Singkat
          </th>
          <th scope="col" class="px-5 py-3">
            Jam Mengajar
          </th>
          <th scope="col" class="px-5 py-3">
            Aksi
          </th>
        </tr>
      </thead>
      <tbody>
        @foreach ($lembagas as $lembaga)
          <tr
            class="bg-white border-b  bg-opacity-85 dark:bg-slate-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
            <td class="px-5 py-3">{{ $loop->iteration }}</td>
            <td class="px-5 py-3">{{ $lembaga->jenis_lembaga }}</td>
            <td class="px-5 py-3">{{ $lembaga->nama }}</td>
            <td class="px-5 py-3">{{ $lembaga->nama_singkat }}</td>
            <td class="px-5 py-3">{{ $lembaga->jam }}</td>

            <td class="px-5 py-3">

              <a wire:navigate href="/lembaga/{{ $lembaga->id }}/edit"
                class="px-2 text-xs py-1 rounded-md bg-amber-500 text-white inline-block">Edit</a>

              <button wire:click='delete({{ $lembaga->id }})'
                class="px-2 text-xs py-1 rounded-md bg-red-500 text-white inline-block"
                wire:confirm='Apakah Anda Yakin?'>Hapus</button>
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
  </div>
  <x-loading></x-loading>

</div>
