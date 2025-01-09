<div class="overflow-hidden">
  <x-loading></x-loading>

  <div class="mt-2 overflow-hidden">
    <p class="mb-2 text-white italic">
      Klik nama untuk detail rapor santri</p>
    <div class=" overflow-x-auto shadow-md sm:rounded-lg">
      <div class="flex gap-2">
        <div class="">
          <select wire:model.live="paginate" class="px-3 py-1 rounded-md dark:bg-slate-800 dark:text-white">
            <option value="20">20</option>
            <option value="40">40</option>
            <option value="50">50</option>
            <option value="100">100</option>
          </select>
        </div>
        <input type="search" class="px-3 py-1 rounded-md dark:bg-slate-800 dark:text-white"
          wire:model.live.debounce.300ms='search' placeholder="cari..." autofocus>
      </div>
      @if ($santris)

        <button type="submit" class="px-3 py-1 rounded-md bg-green-500 text-white my-2"
          wire:click='download'>Download</button>
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

                  <td class="px-6 py-4">{{ $loop->index + $page }}</td>
                  <td class="px-6 py-4"><a
                      href="/raporSantri/detail/{{ $santri->username }}/{{ $kelas }}/{{ $role }}"
                      wire:navigate>{{ $santri->name }}
                      ({{ $santri->dataSantri->jenis_kelamin }})
                    </a></td>
                  <td class="px-6 py-4">
                    @foreach ($kelass as $kls)
                      @if ($kls->id == $santri->kelas_formal_id)
                        {{ $kls->nama }} (formal) <br>
                      @endif
                      @if ($kls->id == $santri->kelas_madin_id)
                        {{ $kls->nama }} (madin) <br>
                      @endif
                      @if ($kls->id == $santri->kelas_mmq_id)
                        {{ $kls->nama }} (mmq) <br>
                      @endif
                      @if ($kls->id == $santri->kelas_asrama_id)
                        {{ $kls->nama }} (asrama)
                      @endif
                    @endforeach
                  </td>
                  <td class="text-center">
                    @if ($santri->poinSantri)
                      {{ $santri->poinSantri->poin_formal }}

                      @if ($batasFormal)
                        @if ($santri->poinSantri->poin_formal <= $batasFormal->batas_aman)
                          <p>Aman</p>
                        @elseif (
                            $santri->poinSantri->poin_formal > $batasFormal->batas_aman &&
                                $santri->poinSantri->poin_formal < $batasFormal->batas_waspada)
                          <p class="text-amber-500">Waspada</p>
                        @else
                          <p class="text-red-500">Bahaya</p>
                        @endif
                      @endif
                    @endif

                  </td>
                  <td class="text-center">
                    @if ($santri->poinSantri)
                      {{ $santri->poinSantri->poin_madin }}

                      @if ($batasMadin)
                        @if ($santri->poinSantri->poin_madin <= $batasMadin->batas_aman)
                          <p>Aman</p>
                        @elseif (
                            $santri->poinSantri->poin_madin > $batasMadin->batas_aman &&
                                $santri->poinSantri->poin_madin < $batasMadin->batas_waspada)
                          <p class="text-amber-500">Waspada</p>
                        @else
                          <p class="text-red-500">Bahaya</p>
                        @endif
                      @endif
                    @endif
                  </td>
                  <td class="text-center">
                    @if ($santri->poinSantri)
                      {{ $santri->poinSantri->poin_mmq }}

                      @if ($batasMmq)
                        @if ($santri->poinSantri->poin_mmq <= $batasMmq->batas_aman)
                          <p>Aman</p>
                        @elseif ($santri->poinSantri->poin_mmq > $batasMmq->batas_aman && $santri->poinSantri->poin_mmq < $batasMmq->batas_waspada)
                          <p class="text-amber-500">Waspada</p>
                        @else
                          <p class="text-red-500">Bahaya</p>
                        @endif
                      @endif
                    @endif
                  </td>
                  <td class="text-center">
                    @if ($santri->poinSantri)
                      {{ $santri->poinSantri->poin_asrama }}

                      @if ($batasAsrama)
                        @if ($santri->poinSantri->poin_asrama <= $batasAsrama->batas_aman)
                          <p>Aman</p>
                        @elseif (
                            $santri->poinSantri->poin_asrama > $batasAsrama->batas_aman &&
                                $santri->poinSantri->poin_asrama < $batasAsrama->batas_waspada)
                          <p class="text-amber-500">Waspada</p>
                        @else
                          <p class="text-red-500">Bahaya</p>
                        @endif
                      @endif
                    @endif
                  </td>
                  <td class="text-center">
                    @if ($santri->poinSantri)
                      {{ $santri->poinSantri->poin_ekstrakurikuler }}

                      @if ($batasEkstrakurikuler)
                        @if ($santri->poinSantri->poin_ekstrakurikuler <= $batasEkstrakurikuler->batas_aman)
                          <p>Aman</p>
                        @elseif (
                            $santri->poinSantri->poin_ekstrakurikuler > $batasEkstrakurikuler->batas_aman &&
                                $santri->poinSantri->poin_ekstrakurikuler < $batasEkstrakurikuler->batas_waspada)
                          <p class="text-amber-500">Waspada</p>
                        @else
                          <p class="text-red-500">Bahaya</p>
                        @endif
                      @endif
                    @endif
                  </td>
                  <td class="text-center">
                    @if ($santri->poinSantri)
                      {{ $santri->poinSantri->poin_ibadah }}

                      @if ($batasIbadah)
                        @if ($santri->poinSantri->poin_ibadah <= $batasIbadah->batas_aman)
                          <p>Aman</p>
                        @elseif (
                            $santri->poinSantri->poin_ibadah > $batasIbadah->batas_aman &&
                                $santri->poinSantri->poin_ibadah < $batasIbadah->batas_waspada)
                          <p class="text-amber-500">Waspada</p>
                        @else
                          <p class="text-red-500">Bahaya</p>
                        @endif
                      @endif
                    @endif
                  </td>
                  <td class="text-center">
                    @if ($santri->poinSantri)
                      {{ $santri->poinSantri->poin_pelanggaran }}

                      @if ($batasPelanggaran)
                        @if ($santri->poinSantri->poin_pelanggaran <= $batasPelanggaran->batas_aman)
                          <p>Aman</p>
                        @elseif (
                            $santri->poinSantri->poin_pelanggaran > $batasPelanggaran->batas_aman &&
                                $santri->poinSantri->poin_pelanggaran < $batasPelanggaran->batas_waspada)
                          <p class="text-amber-500">Waspada</p>
                        @else
                          <p class="text-red-500">Bahaya</p>
                        @endif
                      @endif
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
        </div>
      @endif
    </div>
    @if (!$search)
      <div>
        {{ $santris->links() }}
      </div>
    @endif
  </div>
</div>
