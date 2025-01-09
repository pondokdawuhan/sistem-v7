 <div class=" overflow-x-hidden shadow-md sm:rounded-lg">
   <x-notifsukses></x-notifsukses>
   <a wire:navigate href="/{{ $lembaga }}/{{ $role }}/pelanggaranSantri/create"
     class="bg-green-500 text-white px-3 py-1 rounded-md mb-2 inline-block">Tambah</a>
   <div class="flex mb-2 gap-2 items-center">
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

   <div class=" overflow-auto">
     <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400 bg-opacity-85">
       <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
         <tr>
           <th scope="col" class="p-3">
             No
           </th>
           <th scope="col" class="p-3">
             Lembaga
           </th>
           <th scope="col" class="p-3">
             Tanggal
           </th>
           <th scope="col" class="p-3">
             Nama
           </th>
           <th scope="col" class="p-3">
             Kategori
           </th>
           <th scope="col" class="p-3">
             Keterangan
           </th>
           <th scope="col" class="p-3">
             Poin
           </th>
           <th scope="col" class="p-3">
             Aksi
           </th>
         </tr>
       </thead>
       <tbody>
         @foreach ($pelanggarans as $pelanggaran)
           <tr
             class="bg-white border-b  bg-opacity-85 dark:bg-slate-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">

             <td class="p-3">{{ $loop->index + $page }}</td>
             <td class="p-3">{{ $pelanggaran->lembaga->nama_singkat }}</td>
             <td class="p-3">{{ date('d-m-Y', strtotime($pelanggaran->tanggal)) }}</td>
             <td class="p-3"><a wire:navigate
                 href="/{{ $lembaga }}/{{ $role }}/pelanggaranSantri/detail/{{ $pelanggaran->santri->username }}">{{ $pelanggaran->santri->name }}</a>
             </td>
             <td class="p-3">{{ $pelanggaran->referensiPoin->name }}</td>
             <td class="p-3">{{ $pelanggaran->keterangan }}</td>
             <td class="p-3">{{ $pelanggaran->poin }}</td>
             <td class="p-3">
               @if ($pelanggaran->referensi_poin_id != 1)
                 <a wire:navigate
                   href="/{{ $lembaga }}/{{ $role }}/pelanggaranSantri/{{ $pelanggaran->id }}/edit"
                   class="px-3 py-1 rounded-md bg-amber-500 text-white inline-block text-xs">Edit</a>
                 <button class="px-3 py-1 rounded-md bg-red-500 text-white mt-2 text-xs"
                   wire:click='delete({{ $pelanggaran->id }})'
                   wire:confirm='Apakah Anda yakin menghapus pelanggaran ini?'>Hapus</button>
               @endif
             </td>
           </tr>
         @endforeach
       </tbody>
     </table>
   </div>
   <div class="mt-4 flex justify-end">
     {{ $pelanggarans->links() }}
   </div>
   <x-loading></x-loading>
 </div>
