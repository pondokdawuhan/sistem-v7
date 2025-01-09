<div>
  <div class="">
    <div class="bg-white dark:bg-slate-800 shadow-xl rounded-lg py-3">
      <div class="photo-wrapper p-2">
        <img class="w-32 h-32 rounded-full mx-auto" src="{{ $santri->dataSantri->foto ?? '/assets/images/default.jpg' }}"
          alt="Profile">
      </div>
      <div class="p-2">
        <h3 class="text-center text-xl text-gray-900 dark:text-white font-bold leading-8">{{ $santri->name }}</h3>
        <div class="text-center text-gray-400 dark:text-white text-xs font-semibold">
          <p>
            @if ($santri->dataSantri)
              @if ($santri->dataSantri->aktif == true)
                Aktif
              @else
                Tidak Aktif
              @endif | {{ $santri->dataSantri->jenjang }}
            @endif
          </p>
          <p>
            {{ $santri->username }} | {{ $santri->email }}
          </p>
        </div>
        <div class="flex flex-col flex-wrap lg:flex-row lg:flex-nowrap gap-2 w-full">

          <div class="w-full lg:w-1/2 flex flex-col gap-3">
            <div>
              <h5 class="text-slate-800 dark:text-white border-b dark:border-white border-slate-700">Data Diri
              </h5>
              <table class="text-sm my-3 text-slate-900 dark:text-white">
                <tbody>

                  <tr>
                    <td class="px-2 py-2 font-semibold">Jenis kelamin</td>
                    <td class="px-2 py-2">: {{ $santri->dataSantri->jenis_kelamin ?? '' }}</td>
                  </tr>

                  <tr>
                    <td class="px-2 py-2 font-semibold">Tahun Masuk</td>
                    <td class="px-2 py-2">: {{ $santri->dataSantri->tahun_masuk ?? '' }}</td>
                  </tr>
                  <tr>
                    <td class="px-2 py-2 font-semibold">Nomor Induk Sekolah</td>
                    <td class="px-2 py-2">: {{ $santri->dataSantri->nis ?? '' }}</td>
                  </tr>
                  <tr>
                    <td class="px-2 py-2 font-semibold">Nomor Induk Kependudukan</td>
                    <td class="px-2 py-2">: {{ $santri->dataSantri->nik ?? '' }}</td>
                  </tr>
                  <tr>
                    <td class="px-2 py-2 font-semibold">Nomor NISN</td>
                    <td class="px-2 py-2">: {{ $santri->dataSantri->nisn ?? '' }}</td>
                  </tr>
                  <tr>
                    <td class="px-2 py-2 font-semibold">Tempat, Tanggal Lahir</td>
                    <td class="px-2 py-2">:
                      {{ $santri->dataSantri->tempat_lahir ?? '', $santri->dataSantri->tanggal_lahir ?? '' }}
                    </td>
                  </tr>
                  <tr>
                    <td class="px-2 py-2 font-semibold">Status Anak</td>
                    <td class="px-2 py-2">: {{ $santri->dataSantri->status_anak ?? '' }}</td>
                  </tr>
                  <tr>
                    <td class="px-2 py-2 font-semibold">Jumlah Saudara</td>
                    <td class="px-2 py-2">: {{ $santri->dataSantri->jumlah_saudara ?? '' }}</td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="mt-3">
              <h5 class="text-slate-800 dark:text-white border-b dark:border-white border-slate-700">Data
                Keluarga
              </h5>
              <table class="text-sm my-3 text-slate-900 dark:text-white">
                <tbody>

                  <tr>
                    <td class="px-2 py-2 font-semibold">No KK</td>
                    <td class="px-2 py-2">: {{ $santri->dataSantri->no_kk ?? '' }}</td>
                  </tr>

                  <tr>
                    <td class="px-2 py-2 font-semibold">Nama Ayah</td>
                    <td class="px-2 py-2">: {{ $santri->dataSantri->nama_ayah ?? '' }}</td>
                  </tr>
                  <tr>
                    <td class="px-2 py-2 font-semibold">NIK Ayah</td>
                    <td class="px-2 py-2">: {{ $santri->dataSantri->nik_ayah ?? '' }}</td>
                  </tr>
                  <tr>
                    <td class="px-2 py-2 font-semibold">Pekerjaan Ayah</td>
                    <td class="px-2 py-2">: {{ $santri->dataSantri->pekerjaan_ayah ?? '' }}</td>
                  </tr>
                  <tr>
                    <td class="px-2 py-2 font-semibold">Penghasilan Ayah</td>
                    <td class="px-2 py-2">: {{ $santri->dataSantri->penghasilan_ayah ?? '' }}</td>
                  </tr>
                  <tr>
                    <td class="px-2 py-2 font-semibold">Pendidikan Ayah</td>
                    <td class="px-2 py-2">:
                      {{ $santri->dataSantri->pendidikan_ayah ?? '' }}
                    </td>
                  </tr>

                  <tr>
                    <td class="px-2 py-2 font-semibold">Nama Ibu</td>
                    <td class="px-2 py-2">: {{ $santri->dataSantri->nama_ibu ?? '' }}</td>
                  </tr>
                  <tr>
                    <td class="px-2 py-2 font-semibold">NIK Ibu</td>
                    <td class="px-2 py-2">: {{ $santri->dataSantri->nik_ibu ?? '' }}</td>
                  </tr>
                  <tr>
                    <td class="px-2 py-2 font-semibold">Pekerjaan Ibu</td>
                    <td class="px-2 py-2">: {{ $santri->dataSantri->pekerjaan_ibu ?? '' }}</td>
                  </tr>
                  <tr>
                    <td class="px-2 py-2 font-semibold">Penghasilan Ibu</td>
                    <td class="px-2 py-2">: {{ $santri->dataSantri->penghasilan_ibu ?? '' }}</td>
                  </tr>
                  <tr>
                    <td class="px-2 py-2 font-semibold">Pendidikan Ibu</td>
                    <td class="px-2 py-2">:
                      {{ $santri->dataSantri->pendidikan_ibu ?? '' }}
                    </td>
                  </tr>
                  <tr>
                    <td class="px-2 py-2 font-semibold">Nama Wali</td>
                    <td class="px-2 py-2">:
                      {{ $santri->dataSantri->nama_wali ?? '' }}
                    </td>
                  </tr>

                </tbody>
              </table>
            </div>

          </div>

          <div class="w-full lg:w-1/2 flex flex-col gap-3">
            <div>
              <h5 class="text-slate-800 dark:text-white border-b dark:border-white border-slate-700">Data
                Tempat
                Tinggal
              </h5>
              <table class="text-sm my-3 text-slate-900 dark:text-white">
                <tbody>
                  <tr>
                    <td class="px-2 py-2 font-semibold">Jalan</td>
                    <td class="px-2 py-2">: {{ $santri->dataSantri->jalan ?? '' }}</td>
                  </tr>
                  <tr>
                    <td class="px-2 py-2 font-semibold">RT</td>
                    <td class="px-2 py-2">: {{ $santri->dataSantri->rt ?? '' }}</td>
                  </tr>
                  <tr>
                    <td class="px-2 py-2 font-semibold">RW</td>
                    <td class="px-2 py-2">: {{ $santri->dataSantri->rw ?? '' }}</td>
                  </tr>
                  <tr>
                    <td class="px-2 py-2 font-semibold">Desa</td>
                    <td class="px-2 py-2">: {{ $santri->dataSantri->desa ?? '' }}</td>
                  </tr>
                  <tr>
                    <td class="px-2 py-2 font-semibold">Kecamatan</td>
                    <td class="px-2 py-2">: {{ $santri->dataSantri->kecamatan ?? '' }}</td>
                  </tr>
                  <tr>
                    <td class="px-2 py-2 font-semibold">Kabupaten/Kota</td>
                    <td class="px-2 py-2">: {{ $santri->dataSantri->kabupaten ?? '' }}</td>
                  </tr>
                  <tr>
                    <td class="px-2 py-2 font-semibold">Provinsi</td>
                    <td class="px-2 py-2">: {{ $santri->dataSantri->provinsi ?? '' }}</td>
                  </tr>
                  <tr>
                    <td class="px-2 py-2 font-semibold">Kode Pos</td>
                    <td class="px-2 py-2">: {{ $santri->dataSantri->kodepos ?? '' }}</td>
                  </tr>
                </tbody>
              </table>
            </div>
            <div class="mt-3">
              <h5 class="text-slate-800 dark:text-white border-b dark:border-white border-slate-700">Data
                Kontak </h5>
              <table class="text-sm my-3 text-slate-900 dark:text-white">
                <tbody>
                  <tr>
                    <td class="px-2 py-2 font-semibold">No HP</td>
                    <td class="px-2 py-2">: {{ $santri->dataSantri->no_hp ?? '' }}</td>
                  </tr>
                  <tr>
                    <td class="px-2 py-2 font-semibold">No Wali</td>
                    <td class="px-2 py-2">: {{ $santri->dataSantri->no_wali ?? '' }}</td>
                  </tr>

                </tbody>
              </table>
            </div>
          </div>
        </div>

        <div class="text-center my-3">
          <a class="bg-slate-700 text-white px-3 py-1 rounded-md font-medium" href="/santri" wire:navigate>Kembali</a>
        </div>

      </div>
    </div>
  </div>
</div>
