<div class="min-h-screen">
  <x-loading></x-loading>
  <div class="bg-white dark:bg-slate-800 p-3">

    @if (session()->has('success'))
      <div class="bg-green-400 text-white px-3 py-2 mb-5">
        <h4 class="text-center font-semibold">{{ session('success') }}</h4>
      </div>
    @endif
    <a wire:navigate href="/kelas/{{ $lembaga->id }}"
      class="px-3 py-1 rounded-md text-white bg-slate-500 mb-2 inline-block">Kembali</a>
    <button wire:click='resetAnggotaRombel' class="px-2 py-1 rounded-md bg-red-500 text-white inline-block"
      wire:confirm='Apakah Anda Yakin mereset semua anggota rombel kelas ini?'>Reset</button>
    <form method="POST" wire:submit.prevent='destroyAnggotaRombel'>
      @csrf
      <div class="card-body lg:w-2/3">
        <div class="overflow-auto">
          <h4 class="text-center dark:text-white">Data Kelas {{ $kelas->name }}</h4>
          <table class="text-sm border-collapse w-full">
            <thead class="bg-amber-500">
              <tr>
                <td class="text-white px-3 py-1">#</td>
                <td class="text-white px-3 py-1">No</td>
                <td class="text-white px-3 py-1">Nama</td>
                <td class="text-white px-3 py-1">JK</td>
            </thead>
            <tbody>

              @foreach ($anggotaKelas as $ks)
                <tr class="">

                  <td>
                    <input type="checkbox" wire:model="deleteAnggotaRombel" value="{{ $ks->id }}">
                  </td>
                  <td class="text-slate-700 dark:text-white px-3 py-1">{{ $loop->iteration }}</td>
                  <td class="text-slate-700 dark:text-white px-3 py-1">{{ $ks->name }}</td>
                  <td class="text-slate-700 dark:text-white px-3 py-1">{{ $ks->dataSantri->jenis_kelamin ?? '' }}</td>

                </tr>
              @endforeach
            </tbody>
          </table>
        </div>

        <button type="submit" class="bg-red-500 px-3 py-1 mt-2 rounded-md text-white"
          onclick="return confirm('Apakah Anda Yakin mengeluarkan anak tersebut dari kelas ini?')">Keluarkan</button>
      </div>
    </form>
  </div>

  <div class="bg-white dark:bg-slate-800 p-3 w-full lg:w-2/3 mt-5">
    <h5 class="text-slate-800 dark:text-white">Tambah Rombel Kelas</h5>
    <form wire:submit.prevent='tambahRombel' method="POST">
      @csrf
      <div class="">
        <select wire:model="rombel" class=" dark:text-white dark:bg-slate-850 text-lg" id="js-multiple"
          multiple="multiple">
          <option value="">Pilih</option>
          @foreach ($santris as $santri)
            <option value="{{ $santri->id }}">
              {{ $santri->name }} ({{ $santri->dataSantri->jenis_kelamin }})
            </option>
          @endforeach
        </select>
      </div>
      <div class="">
        <button class="bg-sky-500 text-white px-3 py-1 rounded-md mt-5">Tambah</button>
      </div>
    </form>
  </div>

  @script()
    <script>
      $(document).ready(function() {
        // $('#js-multiple').select2()
        new TomSelect('#js-multiple')
      })
    </script>
  @endscript
</div>
