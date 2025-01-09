<div class=" overflow-x-hidden shadow-md sm:rounded-lg">
  <x-loading></x-loading>
  @if (session()->has('success'))
    <div class="bg-green-400 text-white px-3 py-2 mb-5">
      <h4 class="text-center font-semibold">{{ session('success') }}</h4>
    </div>
  @endif
  @if ($role == 'guru')
    <a wire:navigate href="/{{ $lembaga->id }}/guru/izinAsatidz/create"
      class=" bg-violet-500 text-white px-3 py-1 rounded-md inline-block mb-2">Tambah</a>
  @endif
  <div class="flex items-center gap-2 mb-2 flex-wrap">

    <div class="flex gap-2">
      <div class="">
        <select wire:model.live="paginate" class="px-3 py-1 rounded-md dark:bg-slate-800 dark:text-white">
          <option value="20">20</option>
          <option value="40">40</option>
          <option value="50">50</option>
          <option value="100">100</option>
        </select>
      </div>
      <input type="text" class="px-3 py-1 rounded-md dark:bg-slate-800 dark:text-white"
        wire:model.live.debounce.300ms='search' placeholder="cari..." autofocus>
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
            Nama
          </th>
          <th scope="col" class="px-6 py-3">
            Keperluan
          </th>
          <th scope="col" class="px-6 py-3">
            Tanggal Mulai
          </th>
          <th scope="col" class="px-6 py-3">
            Tanggal Selesai
          </th>
          <th scope="col" class="px-6 py-3">
            Tugas
          </th>
          <th scope="col" class="px-6 py-3">
            Cek Kepala Sekolah
          </th>
          <th scope="col" class="px-6 py-3">
            Aksi
          </th>
        </tr>
      </thead>
      <tbody>
        @foreach ($izinAsatidz as $izin)
          <tr
            class="bg-white border-b  bg-opacity-85 dark:bg-slate-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

            <td class="px-6 py-4">{{ $loop->index + $page }}</td>
            <td class="px-6 py-4"><a
                href="/{{ $lembaga->id }}/{{ $role }}/izinAsatidz/detail/{{ $izin->user->username }}">{{ $izin->user->name }}</a>
            </td>
            <td class="px-6 py-4">{{ $izin->keperluan }}</td>
            <td class="px-6 py-4">{{ date('d-m-Y H:i:s', strtotime($izin->tanggal_mulai)) }}</td>
            <td class="px-6 py-4">{{ date('d-m-Y H:i:s', strtotime($izin->tanggal_selesai)) }}</td>
            <td class="px-6 py-4">{!! $izin->tugas !!}</td>
            <td>
              @if ($izin->cek_kepala == true)
                <span class="px-3 py-1 rounded-md bg-green-500 text-white">Sudah</span>
              @else
                <span class="px-3 py-1 rounded-md bg-red-500 text-white">Belum</span>
              @endif
            </td>


            <td class="px-6 py-4">
              @if ($role != 'guruPiket')
                @if ($izin->user_id == auth()->user()->id && $izin->cek_kepala == false)
                  <a wire:navigate href="/{{ $lembaga->id }}/guru/izinAsatidz/{{ $izin->id }}/edit"
                    class="text-white bg-sky-500 rounded-lg text-xs px-3 py-1 inline-block">Edit</a>
                @endif

                @if ($role == 'kepala' && $izin->cek_kepala == false)
                  <button type="button"
                    class="mt-2 text-white bg-violet-500 rounded-lg text-xs px-3 py-1 inline-block cursor-pointer"
                    wire:click='cek({{ $izin->id }})' wire:confirm='Apakah Anda yakin?'>Cek</button>
                @endif

                @if ($izin->cek_kepala == false)
                  <button type="button"
                    class="mt-2 text-white bg-red-500 rounded-lg text-xs px-3 py-1 inline-block cursor-pointer"
                    wire:click='delete({{ $izin->id }})'
                    wire:confirm='Apakah Anda yakin menghapus izin ini?'>Hapus</button>
                @endif
              @endif
            </td>
          </tr>
        @endforeach
      </tbody>
    </table>
    @if (!$search)
      <div class="dark:bg-slate-800 mb-3 p-2">
        {{ $izinAsatidz->links() }}
      </div>
    @endif
  </div>
</div>
