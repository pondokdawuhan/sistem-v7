<div class=" overflow-x-auto shadow-md sm:rounded-lg text-sm" id="formJadwal">
  <x-loading></x-loading>
  <x-notifsukses></x-notifsukses>

  <div>
    <select wire:model.live='selectedHari' id="" class="px-3 py-1 rounded-md dark:bg-slate-800 dark:text-white">
      <option value="">pilih</option>
      <option value="senin">senin</option>
      <option value="selasa">selasa</option>
      <option value="rabu">rabu</option>
      <option value="kamis">kamis</option>
      <option value="jumat">jumat</option>
      <option value="sabtu">sabtu</option>
      <option value="ahad">ahad</option>
    </select>
  </div>
  @if ($selectedHari)
    <button wire:click='resetJadwal' class="px-3 py-1 rounded-md bg-red-500 text-white my-2"
      wire:confirm='Apakah anda yakin mereset jadwal lembaga ini?'>Reset</button>
    <form action="/{{ $lembaga->id }}/{{ $role }}/jadwalPelajaran" method="POST" class="inline-block w-full">
      @csrf
      <input type="hidden" name="lembaga_id" value="{{ $lembaga->id }}">
      <button type="submit" class="px-3 py-1 rounded-md bg-violet-500 text-white">Simpan</button>

      <div id="senin">
        <h3 class="text-center text-slate-800 dark:text-white my-2">JADWAL PELAJARAN hari {{ $selectedHari }}</h3>

        <table class="border-collapse w-full" style="table-layout: auto">
          <thead>
            <tr class="text-center bg-amber-500 text-white">
              <th class="text-white border border-white px-2 py-1">Jam</th>
              @foreach ($kelas as $kls)
                <th class="text-white border border-white px-2 py-1">{{ $kls->nama }}</th>
              @endforeach
            </tr>
          </thead>
          <tbody>
            @for ($i = 1; $i < $lembaga->jam + 1; $i++)
              <tr>
                <td class="bg-amber-500 text-white border border-white px-2 py-1 text-center">{{ $i }}</td>
                @foreach ($kelas as $kls)
                  <td
                    class="border border-slate-300 text-sm px-2 py-1 text-center w-fit bg-white dark:bg-slate-900 text-slate-800 dark:text-white">
                    <input type="hidden" name="hari" value="{{ $selectedHari }}">
                    <input type="hidden" name="kelas[]" value="{{ $kls->id }}">
                    <input type="hidden" name="jam[]" value="{{ $i }}">
                    <select name="pengampu_id[]" id=""
                      class="dark:bg-slate-900 dark:text-white will-change-contents select-beast-empty">
                      <option value="">pilih</option>
                      @foreach ($pengampuMapels as $pengampu)
                        <option value="{{ $pengampu->id }}"
                          @foreach ($jadwals as $jadwal)
                          @selected($jadwal->user_id == $pengampu->user_id && $jadwal->pelajaran_id == $pengampu->pelajaran_id && $jadwal->hari == $selectedHari && $jadwal->jam == $i && $jadwal->kelas_id == $kls->id) @endforeach>
                          {{ $pengampu->user->name }} | {{ $pengampu->pelajaran->nama }}
                        </option>
                      @endforeach
                    </select>
                  </td>
                @endforeach
              </tr>
            @endfor
          </tbody>
        </table>
      </div>

      <button type="submit" class="px-3 py-1 rounded-md bg-violet-500 text-white my-2">Simpan</button>
    </form>
    <button wire:click='resetJadwal' class="px-3 py-1 rounded-md bg-red-500 text-white my-2"
      wire:confirm='Apakah anda yakin mereset jadwal lembaga ini?'>Reset</button>

  @endif

</div>
