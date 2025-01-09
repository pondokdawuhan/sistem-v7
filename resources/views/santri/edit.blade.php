@extends('templates.main')
@section('container')
  <form action="/santri/{{ $santri->username }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('put')

    <input type="hidden" name="fotoLama" value="{{ $santri->dataSantri->foto }}">
    <input type="hidden" name="dataId" value="{{ $santri->dataSantri->id }}">
    <div class="bg-white dark:bg-slate-900 rounded-sm p-5 shadow-lg flex flex-wrap gap-5">
      <div class="w-full lg:flex-1">
        <div class="p-2 text-slate-700 dark:text-white">
          <h5 class="mb-3 text-green-500">Data Diri Santri Sesuai Akta</h5>
          <p class="italic text-xs text-red-500">*Wajib</p>

          <div class="flex items-center gap-2">
            <label for="jenjang" class="w-1/3 align-middle text-sm">Jenjang<span class="text-red-500">*</span></label>
            <div class="w-2/3">
              <select id="jenjang"
                class="border border-slate-300 dark:bg-slate-900 rounded-md focus:outline-none focus:border-green-500 focus:border-2 text-sm w-full p-2"
                name="jenjang" required>
                <option value="" class="text-slate-700 dark:text-white text-xs md:text-base">Pilih
                </option>
                <option value="SMP" class="text-slate-700 dark:text-white text-xs md:text-base"
                  @if ($santri->dataSantri->jenjang == 'SMP') selected @endif>SMP</option>
                <option value="MA" class="text-slate-700 dark:text-white text-xs md:text-base"
                  @if ($santri->dataSantri->jenjang == 'MA') selected @endif>MA</option>
                <option value="LAINNYA" class="text-slate-700 dark:text-white text-xs md:text-base"
                  @if ($santri->dataSantri->jenjang == 'LAINNYA') selected @endif>LAINNYA</option>
              </select>
            </div>
          </div>

          <div class="flex items-center gap-2 mt-2">
            <label for="aktif" class="w-1/3 align-middle text-sm">Status<span class="text-red-500">*</span></label>
            <div class="w-2/3">
              <select id="aktif"
                class="border border-slate-300 dark:bg-slate-900 rounded-md focus:outline-none focus:border-green-500 focus:border-2 text-sm w-full p-2"
                name="aktif" required>
                <option value="" class="text-slate-700 dark:text-white text-xs md:text-base">Pilih
                </option>
                <option value="1" class="text-slate-700 dark:text-white text-xs md:text-base"
                  @if ($santri->dataSantri->aktif == true) selected @endif>Aktif</option>
                <option value="0" class="text-slate-700 dark:text-white text-xs md:text-base"
                  @if ($santri->dataSantri->aktif == false) selected @endif>Tidak Aktif</option>
              </select>
            </div>
          </div>

          <div class="flex items-center gap-2 mt-2">
            <label for="tahun_masuk" class="w-1/3 align-middle text-sm">Tahun Masuk<span
                class="text-red-500">*</span></label>
            <div class="w-2/3">
              <input type="text"
                class="border border-slate-300 dark:bg-slate-900 rounded-md focus:outline-none focus:border-green-500 focus:border-2 text-sm w-full px-2 py-1"
                name="tahun_masuk" id="tahun_masuk"
                @if (old('tahun_masuk')) value="{{ old('tahun_masuk') }}" @else
                                    value="{{ $santri->dataSantri->tahun_masuk }}" @endif
                required>
            </div>
          </div>

          <div class="flex items-center gap-2 mt-2">
            <label for="nisn" class="w-1/3 align-middle text-sm">NISN</label>
            <div class="w-2/3">
              <input type="text"
                class="border border-slate-300 dark:bg-slate-900 rounded-md focus:outline-none focus:border-green-500 focus:border-2 text-sm w-full px-2 py-1"
                name="nisn" id="nisn"
                @if (old('nisn')) value="{{ old('nisn') }}" @else
                                value="{{ $santri->dataSantri->nisn }}" @endif>
            </div>
          </div>

          <div class="flex items-center gap-2 mt-2">
            <label for="nis" class="w-1/3 align-middle text-sm">NIS</label>
            <div class="w-2/3">
              <input type="text"
                class="border border-slate-300 dark:bg-slate-900 rounded-md focus:outline-none focus:border-green-500 focus:border-2 text-sm w-full px-2 py-1"
                name="nis" id="nis"
                @if (old('nis')) value="{{ old('nis') }}" @else
                                value="{{ $santri->dataSantri->nis }}" @endif>
            </div>
          </div>

          <div class="flex items-center gap-2 mt-2">
            <label for="nik" class="w-1/3 align-middle text-sm">NIK</label>
            <div class="w-2/3">
              <input type="text"
                class="border border-slate-300 dark:bg-slate-900 rounded-md focus:outline-none focus:border-green-500 focus:border-2 text-sm w-full px-2 py-1"
                name="nik" id="nik"
                @if (old('nik')) value="{{ old('nik') }}" @else
                                value="{{ $santri->dataSantri->nik }}" @endif>
            </div>
          </div>

          <div class="flex items-center gap-2 mt-2">
            <label for="name" class="w-1/3 align-middle text-sm">Nama Lengkap</label>
            <div class="w-2/3">
              <input type="text"
                class="border border-slate-300 dark:bg-slate-900 rounded-md focus:outline-none focus:border-green-500 focus:border-2 text-sm w-full px-2 py-1"
                name="name" id="name"
                @if (old('name')) value="{{ old('name') }}" @else
                                value="{{ $santri->name }}" @endif
                required>
            </div>
          </div>

          <div class="flex items-center gap-2 mt-2">
            <label for="jenis_kelamin" class="w-1/3 align-middle text-sm">Jenis Kelamin</label>
            <div class="w-2/3 flex">

              <div class="form-check">
                <input type="radio" class="form-check-input" id="Laki-laki" name="jenis_kelamin" value="Laki-laki" /
                  @if ($santri->dataSantri->jenis_kelamin == 'Laki-laki') checked @endif>
                <label class="form-check-label mb-0" for="Laki-laki">Laki-laki</label>
              </div>

              <div class="ml-3">
                <input type="radio" class="form-check-input" id="Perempuan" name="jenis_kelamin" value="Perempuan" /
                  @if ($santri->dataSantri->jenis_kelamin == 'Perempuan') checked @endif>
                <label class="form-check-label mb-0" for="Perempuan">Perempuan</label>
              </div>

            </div>
          </div>

          <div class="flex items-center gap-2 mt-2">
            <label for="tempat_lahir" class="w-1/3 align-middle text-sm">Tempat Lahir</label>
            <div class="w-2/3">
              <input type="text"
                class="border border-slate-300 dark:bg-slate-900 rounded-md focus:outline-none focus:border-green-500 focus:border-2 text-sm w-full px-2 py-1"
                name="tempat_lahir" id="tempat_lahir"
                @if (old('tempat_lahir')) value="{{ old('tempat_lahir') }}" @else
                                value="{{ $santri->dataSantri->tempat_lahir }}" @endif>
            </div>
          </div>

          <div class="flex items-center gap-2 mt-2">
            <label for="tanggal_lahir" class="w-1/3 align-middle text-sm">Tanggal Lahir</label>
            <div class="w-2/3">
              <input type="date"
                class="border border-slate-300 dark:bg-slate-900 rounded-md focus:outline-none focus:border-green-500 focus:border-2 text-sm w-full px-2 py-1"
                name="tanggal_lahir" id="tanggal_lahir"
                @if (old('tanggal_lahir')) value="{{ old('tanggal_lahir') }}" @else
                                value="{{ $santri->dataSantri->tanggal_lahir }}" @endif>
            </div>
          </div>


          <div class="flex items-center gap-2 mt-2">
            <label for="status_anak" class="w-1/3 align-middle text-sm">Status Anak</label>
            <div class="w-2/3">
              <select id="status_anak"
                class="border border-slate-300 dark:bg-slate-900 rounded-md focus:outline-none focus:border-green-500 focus:border-2 text-sm w-full p-2"
                name="status_anak">
                <option value="" class="text-slate-700 dark:text-white text-xs md:text-base">Pilih
                </option>
                <option value="KANDUNG" class="text-slate-700 dark:text-white text-xs md:text-base"
                  @if ($santri->dataSantri->status_anak == 'KANDUNG') selected @endif>KANDUNG</option>
                <option value="ANGKAT" class="text-slate-700 dark:text-white text-xs md:text-base"
                  @if ($santri->dataSantri->status_anak == 'ANGKAT') selected @endif>ANGKAT</option>
                <option value="LAINNYA" class="text-slate-700 dark:text-white text-xs md:text-base"
                  @if ($santri->dataSantri->status_anak == 'LAINNYA') selected @endif>LAINNYA</option>
              </select>
            </div>
          </div>


          <div class="flex items-center gap-2 mt-2">
            <label for="anak_ke" class="w-1/3 align-middle text-sm">Anak Ke</label>
            <div class="w-2/3">
              <input type="text"
                class="border border-slate-300 dark:bg-slate-900 rounded-md focus:outline-none focus:border-green-500 focus:border-2 text-sm w-full px-2 py-1"
                name="anak_ke" id="anak_ke"
                @if (old('anak_ke')) value="{{ old('anak_ke') }}" @else
                                value="{{ $santri->dataSantri->anak_ke }}" @endif>
            </div>
          </div>

          <div class="flex items-center gap-2 mt-2">
            <label for="jumlah_saudara" class="w-1/3 align-middle text-sm">Jumlah Saudara Kandung (selain
              calon santri)</label>
            <div class="w-2/3">
              <input type="text"
                class="border border-slate-300 dark:bg-slate-900 rounded-md focus:outline-none focus:border-green-500 focus:border-2 text-sm w-full px-2 py-1"
                name="jumlah_saudara" id="jumlah_saudara"
                @if (old('jumlah_saudara')) value="{{ old('jumlah_saudara') }}" @else
                                value="{{ $santri->dataSantri->jumlah_saudara }}" @endif>
            </div>
          </div>

          <div class="flex items-center gap-2 mt-2">
            <label for="foto" class="w-1/3 align-middle text-sm">Foto</label>
            <div class="w-2/3">
              <input type="file"
                class="border border-slate-300 dark:bg-slate-900 rounded-md focus:outline-none focus:border-green-500 focus:border-2 text-sm w-full px-2 py-1 @error('foto')
                                    is-invalid
                                @enderror"
                name="foto" id="foto" onchange="previewImage()">
              <p class="italic text-xs text-red-500">ukuran maksimal 1MB</p>

              @error('foto')
                <p class="italic text-xs text-red-500">{{ $message }}</p>
              @enderror

              @if ($santri->dataSantri->foto)
                <img src="{{ asset('storage/' . $santri->dataSantri->foto) }}" alt=""
                  class="img-preview w-34 lg:w-42">
              @else
                <img src="" alt="" class="img-preview w-34 lg:w-42">
              @endif


            </div>
          </div>
        </div>

        <div class="p-2 text-slate-700 dark:text-white">
          <h5 class="mb-3 text-green-500">Alamat sesuai KK</h5>


          <div class="flex items-center gap-2">
            <label for="provinsi" class="w-1/3 align-middle text-sm">Provinsi</label>
            <div class="w-2/3">
              <select id="provinsi"
                class="border border-slate-300 dark:bg-slate-900 rounded-md focus:outline-none focus:border-green-500 focus:border-2 text-sm w-full p-2"
                name="provinsi" data-provinsi="">
                <option value="" class="text-slate-700 dark:text-white text-xs md:text-base">Pilih
                  Provinsi</option>
              </select>
            </div>
          </div>

          <div class="flex items-center gap-2 mt-2">
            <label for="kotakab" class="w-1/3 align-middle text-sm">Kota Kabupaten</label>
            <div class="w-2/3">
              <select id="kotakab"
                class="border border-slate-300 dark:bg-slate-900 rounded-md focus:outline-none focus:border-green-500 focus:border-2 text-sm w-full p-2"
                name="kabupaten">
                <option value="" class="text-slate-700 dark:text-white text-xs md:text-base">Pilih
                  Kota Kabupaten
                </option>
              </select>
            </div>
          </div>

          <div class="flex items-center gap-2 mt-2">
            <label for="kecamatan" class="w-1/3 align-middle text-sm">Kecamatan</label>
            <div class="w-2/3">
              <select id="kecamatan"
                class="border border-slate-300 dark:bg-slate-900 rounded-md focus:outline-none focus:border-green-500 focus:border-2 text-sm w-full p-2"
                name="kecamatan">
                <option value="" class="text-slate-700 dark:text-white text-xs md:text-base">Pilih
                  Kecamatan
                </option>
              </select>
            </div>
          </div>

          <div class="flex items-center gap-2 mt-2">
            <label for="desa" class="w-1/3 align-middle text-sm">Desa</label>
            <div class="w-2/3">
              <select id="desa"
                class="border border-slate-300 dark:bg-slate-900 rounded-md focus:outline-none focus:border-green-500 focus:border-2 text-sm w-full p-2"
                name="desa">
                <option value="" class="text-slate-700 dark:text-white text-xs md:text-base">Pilih
                  Desa
                </option>
              </select>
            </div>
          </div>


          <div class="flex items-center gap-2 mt-2">
            <label for="jalan" class="w-1/3 align-middle text-sm">Jalan</label>
            <div class="w-2/3">
              <input type="text"
                class="border border-slate-300 dark:bg-slate-900 rounded-md focus:outline-none focus:border-green-500 focus:border-2 text-sm w-full px-2 py-1"
                name="jalan" id="jalan"
                @if (old('jalan')) value="{{ old('jalan') }}" @else
                                value="{{ $santri->dataSantri->jalan }}" @endif>
            </div>
          </div>

          <div class="flex items-center gap-2 mt-2">
            <label for="dusun" class="w-1/3 align-middle text-sm">Dusun</label>
            <div class="w-2/3">
              <input type="text"
                class="border border-slate-300 dark:bg-slate-900 rounded-md focus:outline-none focus:border-green-500 focus:border-2 text-sm w-full px-2 py-1"
                name="dusun" id="dusun"
                @if (old('dusun')) value="{{ old('dusun') }}" @else
                                value="{{ $santri->dataSantri->dusun }}" @endif>
            </div>
          </div>

          <div class="flex items-center gap-2 mt-2">
            <label for="rt" class="w-1/3 align-middle text-sm">RT</label>
            <div class="w-2/3">
              <input type="text"
                class="border border-slate-300 dark:bg-slate-900 rounded-md focus:outline-none focus:border-green-500 focus:border-2 text-sm w-full px-2 py-1"
                name="rt" id="rt"
                @if (old('rt')) value="{{ old('rt') }}" @else
                                value="{{ $santri->dataSantri->rt }}" @endif>
            </div>
          </div>

          <div class="flex items-center gap-2 mt-2">
            <label for="rw" class="w-1/3 align-middle text-sm">RW</label>
            <div class="w-2/3">
              <input type="text"
                class="border border-slate-300 dark:bg-slate-900 rounded-md focus:outline-none focus:border-green-500 focus:border-2 text-sm w-full px-2 py-1"
                name="rw" id="rw"
                @if (old('rw')) value="{{ old('rw') }}" @else
                                value="{{ $santri->dataSantri->rw }}" @endif>
            </div>
          </div>

          <div class="flex items-center gap-2 mt-2">
            <label for="kodepos" class="w-1/3 align-middle text-sm">Kode Pos</label>
            <div class="w-2/3">
              <input type="text"
                class="border border-slate-300 dark:bg-slate-900 rounded-md focus:outline-none focus:border-green-500 focus:border-2 text-sm w-full px-2 py-1"
                name="kodepos" id="kodepos"
                @if (old('kodepos')) value="{{ old('kodepos') }}" @else
                                value="{{ $santri->dataSantri->kodepos }}" @endif>
            </div>
          </div>

        </div>
      </div>
      <div class="w-full lg:flex-1">
        <div class="p-2 text-slate-700 dark:text-white">
          <h5 class="text-green-500">Data Orang Tua Kandung</h5>


          <div class="flex items-center gap-2 mt-2">
            <label for="no_kk" class="w-1/3 align-middle text-sm">Nomor KK</label>
            <div class="w-2/3">
              <input type="text"
                class="border border-slate-300 dark:bg-slate-900 rounded-md focus:outline-none focus:border-green-500 focus:border-2 text-sm w-full px-2 py-1"
                name="no_kk" id="no_kk"
                @if (old('no_kk')) value="{{ old('no_kk') }}" @else
                                value="{{ $santri->dataSantri->no_kk }}" @endif>
            </div>
          </div>

          <div class="flex items-center gap-2 mt-2">
            <label for="nama_ayah" class="w-1/3 align-middle text-sm">Nama Ayah</label>
            <div class="w-2/3">
              <input type="text"
                class="border border-slate-300 dark:bg-slate-900 rounded-md focus:outline-none focus:border-green-500 focus:border-2 text-sm w-full px-2 py-1"
                name="nama_ayah" id="nama_ayah"
                @if (old('nama_ayah')) value="{{ old('nama_ayah') }}" @else
                                value="{{ $santri->dataSantri->nama_ayah }}" @endif>
            </div>
          </div>

          <div class="flex items-center gap-2 mt-2">
            <label for="nik_ayah" class="w-1/3 align-middle text-sm">NIK Ayah</label>
            <div class="w-2/3">
              <input type="text"
                class="border border-slate-300 dark:bg-slate-900 rounded-md focus:outline-none focus:border-green-500 focus:border-2 text-sm w-full px-2 py-1"
                name="nik_ayah" id="nik_ayah"
                @if (old('nik_ayah')) value="{{ old('nik_ayah') }}" @else
                                value="{{ $santri->dataSantri->nik_ayah }}" @endif>
            </div>
          </div>


          <div class="flex items-center gap-2 mt-2">
            <label for="pendidikan_ayah" class="w-1/3 align-middle text-sm">Pendidikan Ayah</label>
            <div class="w-2/3">
              <select id="pendidikan_ayah"
                class="border border-slate-300 dark:bg-slate-900 rounded-md focus:outline-none focus:border-green-500 focus:border-2 text-sm w-full p-2"
                name="pendidikan_ayah">
                <option value="" class="text-slate-700 dark:text-white text-xs md:text-base">Pilih
                </option>
                <option value="SD" class="text-slate-700 dark:text-white text-xs md:text-base"
                  @if ($santri->dataSantri->pendidikan_ayah == 'SD') selected @endif>SD</option>
                <option value="SMP/MTS/SEDERAJAT" class="text-slate-700 dark:text-white text-xs md:text-base"
                  @if ($santri->dataSantri->pendidikan_ayah == 'SMP/MTS/SEDERAJAT') selected @endif>
                  SMP/MTS/SEDERAJAT</option>
                <option value="SMA/MA/SMK SEDERAJAT" class="text-slate-700 dark:text-white text-xs md:text-base"
                  @if ($santri->dataSantri->pendidikan_ayah == 'SMA/MA/SMK SEDERAJAT') selected @endif>
                  SMA/MA/SMK SEDERAJAT</option>
                <option value="D1" class="text-slate-700 dark:text-white text-xs md:text-base"
                  @if ($santri->dataSantri->pendidikan_ayah == 'D1') selected @endif>D1</option>
                <option value="D2" class="text-slate-700 dark:text-white text-xs md:text-base"
                  @if ($santri->dataSantri->pendidikan_ayah == 'D2') selected @endif>D2</option>
                <option value="D3" class="text-slate-700 dark:text-white text-xs md:text-base"
                  @if ($santri->dataSantri->pendidikan_ayah == 'D3') selected @endif>D3</option>
                <option value="D4" class="text-slate-700 dark:text-white text-xs md:text-base"
                  @if ($santri->dataSantri->pendidikan_ayah == 'D4') selected @endif>D4</option>
                <option value="S1" class="text-slate-700 dark:text-white text-xs md:text-base"
                  @if ($santri->dataSantri->pendidikan_ayah == 'S1') selected @endif>S1</option>
                <option value="S2" class="text-slate-700 dark:text-white text-xs md:text-base"
                  @if ($santri->dataSantri->pendidikan_ayah == 'S2') selected @endif>S2</option>
                <option value="S3" class="text-slate-700 dark:text-white text-xs md:text-base"
                  @if ($santri->dataSantri->pendidikan_ayah == 'S3') selected @endif>S3</option>
                <option value="TIDAK SEKOLAH" class="text-slate-700 dark:text-white text-xs md:text-base"
                  @if ($santri->dataSantri->pendidikan_ayah == 'TIDAK SEKOLAH') selected @endif>TIDAK SEKOLAH
                </option>
              </select>
            </div>
          </div>


          <div class="flex items-center gap-2 mt-2">
            <label for="pekerjaan_ayah" class="w-1/3 align-middle text-sm">Pekerjaan Ayah</label>
            <div class="w-2/3">
              <input type="text"
                class="border border-slate-300 dark:bg-slate-900 rounded-md focus:outline-none focus:border-green-500 focus:border-2 text-sm w-full px-2 py-1"
                name="pekerjaan_ayah" id="pekerjaan_ayah"
                @if (old('pekerjaan_ayah')) value="{{ old('pekerjaan_ayah') }}" @else
                                value="{{ $santri->dataSantri->pekerjaan_ayah }}" @endif>
            </div>
          </div>


          <div class="flex items-center gap-2 mt-2">
            <label for="penghasilan_ayah" class="w-1/3 align-middle text-sm">Penghasilan Ayah</label>
            <div class="w-2/3">
              <select id="penghasilan_ayah"
                class="border border-slate-300 dark:bg-slate-900 rounded-md focus:outline-none focus:border-green-500 focus:border-2 text-sm w-full p-2"
                name="penghasilan_ayah">
                <option value="" class="text-slate-700 dark:text-white text-xs md:text-base">Pilih
                </option>
                <option value="Kurang dari Rp. 500.000" class="text-slate-700 dark:text-white text-xs md:text-base"
                  @if ($santri->dataSantri->penghasilan_ayah == 'Kurang dari Rp. 500.000') selected @endif>Kurang
                  dari Rp. 500.000</option>
                <option value="Rp. 500.000 = Rp. 999.999" class="text-slate-700 dark:text-white text-xs md:text-base"
                  @if ($santri->dataSantri->penghasilan_ayah == 'Rp. 500.000 = Rp. 999.999') selected @endif>
                  Rp. 500.000 = Rp. 999.999</option>
                <option value="Rp. 1.000.000 - Rp. 1.999.999"
                  class="text-slate-700 dark:text-white text-xs md:text-base"
                  @if ($santri->dataSantri->penghasilan_ayah == 'Rp. 1.000.000 - Rp. 1.999.999') selected @endif>
                  Rp. 1.000.000 - Rp. 1.999.999</option>
                <option value="Rp. 2.000.000 - Rp. 4.999.999"
                  class="text-slate-700 dark:text-white text-xs md:text-base"
                  @if ($santri->dataSantri->penghasilan_ayah == 'Rp. 2.000.000 - Rp. 4.999.999') selected @endif>
                  Rp. 2.000.000 - Rp. 4.999.999</option>
                <option value="Rp. 5.000.000 - Rp. 20.000.000"
                  class="text-slate-700 dark:text-white text-xs md:text-base"
                  @if ($santri->dataSantri->penghasilan_ayah == 'Rp. 5.000.000 - Rp. 20.000.000') selected @endif>
                  Rp. 5.000.000 - Rp. 20.000.000</option>
                <option value="Lebih dari Rp. 20.000.000" class="text-slate-700 dark:text-white text-xs md:text-base"
                  @if ($santri->dataSantri->penghasilan_ayah == 'Lebih dari Rp. 20.000.000') selected @endif>
                  Lebih dari Rp. 20.000.000</option>
                <option value="Tidak berpenghasilan" class="text-slate-700 dark:text-white text-xs md:text-base"
                  @if ($santri->dataSantri->penghasilan_ayah == 'Tidak berpenghasilan') selected @endif>
                  Tidak berpenghasilan</option>

              </select>
            </div>
          </div>


          <div class="flex items-center gap-2 mt-2">
            <label for="nama_ibu" class="w-1/3 align-middle text-sm">Nama ibu</label>
            <div class="w-2/3">
              <input type="text"
                class="border border-slate-300 dark:bg-slate-900 rounded-md focus:outline-none focus:border-green-500 focus:border-2 text-sm w-full px-2 py-1"
                name="nama_ibu" id="nama_ibu"
                @if (old('nama_ibu')) value="{{ old('nama_ibu') }}" @else
                                value="{{ $santri->dataSantri->nama_ibu }}" @endif>
            </div>
          </div>

          <div class="flex items-center gap-2 mt-2">
            <label for="nik_ibu" class="w-1/3 align-middle text-sm">NIK ibu</label>
            <div class="w-2/3">
              <input type="text"
                class="border border-slate-300 dark:bg-slate-900 rounded-md focus:outline-none focus:border-green-500 focus:border-2 text-sm w-full px-2 py-1"
                name="nik_ibu" id="nik_ibu"
                @if (old('nik_ibu')) value="{{ old('nik_ibu') }}" @else
                                value="{{ $santri->dataSantri->nik_ibu }}" @endif>
            </div>
          </div>


          <div class="flex items-center gap-2 mt-2">
            <label for="pendidikan_ibu" class="w-1/3 align-middle text-sm">Pendidikan ibu</label>
            <div class="w-2/3">
              <select id="pendidikan_ibu"
                class="border border-slate-300 dark:bg-slate-900 rounded-md focus:outline-none focus:border-green-500 focus:border-2 text-sm w-full p-2"
                name="pendidikan_ibu">
                <option value="" class="text-slate-700 dark:text-white text-xs md:text-base">Pilih
                </option>
                <option value="SD" class="text-slate-700 dark:text-white text-xs md:text-base"
                  @if ($santri->dataSantri->pendidikan_ibu == 'SD') selected @endif>SD</option>
                <option value="SMP/MTS/SEDERAJAT" class="text-slate-700 dark:text-white text-xs md:text-base"
                  @if ($santri->dataSantri->pendidikan_ibu == 'SMP/MTS/SEDERAJAT') selected @endif>
                  SMP/MTS/SEDERAJAT</option>
                <option value="SMA/MA/SMK SEDERAJAT" class="text-slate-700 dark:text-white text-xs md:text-base"
                  @if ($santri->dataSantri->pendidikan_ibu == 'SMA/MA/SMK SEDERAJAT') selected @endif>
                  SMA/MA/SMK SEDERAJAT</option>
                <option value="D1" class="text-slate-700 dark:text-white text-xs md:text-base"
                  @if ($santri->dataSantri->pendidikan_ibu == 'D1') selected @endif>D1</option>
                <option value="D2" class="text-slate-700 dark:text-white text-xs md:text-base"
                  @if ($santri->dataSantri->pendidikan_ibu == 'D2') selected @endif>D2</option>
                <option value="D3" class="text-slate-700 dark:text-white text-xs md:text-base"
                  @if ($santri->dataSantri->pendidikan_ibu == 'D3') selected @endif>D3</option>
                <option value="D4" class="text-slate-700 dark:text-white text-xs md:text-base"
                  @if ($santri->dataSantri->pendidikan_ibu == 'D4') selected @endif>D4</option>
                <option value="S1" class="text-slate-700 dark:text-white text-xs md:text-base"
                  @if ($santri->dataSantri->pendidikan_ibu == 'S1') selected @endif>S1</option>
                <option value="S2" class="text-slate-700 dark:text-white text-xs md:text-base"
                  @if ($santri->dataSantri->pendidikan_ibu == 'S2') selected @endif>S2</option>
                <option value="S3" class="text-slate-700 dark:text-white text-xs md:text-base"
                  @if ($santri->dataSantri->pendidikan_ibu == 'S3') selected @endif>S3</option>
                <option value="TIDAK SEKOLAH" class="text-slate-700 dark:text-white text-xs md:text-base"
                  @if ($santri->dataSantri->pendidikan_ibu == 'TIDAK SEKOLAH') selected @endif>TIDAK SEKOLAH
                </option>
              </select>
            </div>
          </div>


          <div class="flex items-center gap-2 mt-2">
            <label for="pekerjaan_ibu" class="w-1/3 align-middle text-sm">Pekerjaan ibu</label>
            <div class="w-2/3">
              <input type="text"
                class="border border-slate-300 dark:bg-slate-900 rounded-md focus:outline-none focus:border-green-500 focus:border-2 text-sm w-full px-2 py-1"
                name="pekerjaan_ibu" id="pekerjaan_ibu"
                @if (old('pekerjaan_ibu')) value="{{ old('pekerjaan_ibu') }}" @else
                                value="{{ $santri->dataSantri->pekerjaan_ibu }}" @endif>
            </div>
          </div>


          <div class="flex items-center gap-2 mt-2">
            <label for="penghasilan_ibu" class="w-1/3 align-middle text-sm">Penghasilan ibu</label>
            <div class="w-2/3">
              <select id="penghasilan_ibu"
                class="border border-slate-300 dark:bg-slate-900 rounded-md focus:outline-none focus:border-green-500 focus:border-2 text-sm w-full p-2"
                name="penghasilan_ibu">
                <option value="" class="text-slate-700 dark:text-white text-xs md:text-base">Pilih
                </option>
                <option value="Kurang dari Rp. 500.000" class="text-slate-700 dark:text-white text-xs md:text-base"
                  @if ($santri->dataSantri->penghasilan_ibu == 'Kurang dari Rp. 500.000') selected @endif>Kurang
                  dari Rp. 500.000</option>
                <option value="Rp. 500.000 = Rp. 999.999" class="text-slate-700 dark:text-white text-xs md:text-base"
                  @if ($santri->dataSantri->penghasilan_ibu == 'Rp. 500.000 = Rp. 999.999') selected @endif>
                  Rp. 500.000 = Rp. 999.999</option>
                <option value="Rp. 1.000.000 - Rp. 1.999.999"
                  class="text-slate-700 dark:text-white text-xs md:text-base"
                  @if ($santri->dataSantri->penghasilan_ibu == 'Rp. 1.000.000 - Rp. 1.999.999') selected @endif>
                  Rp. 1.000.000 - Rp. 1.999.999</option>
                <option value="Rp. 2.000.000 - Rp. 4.999.999"
                  class="text-slate-700 dark:text-white text-xs md:text-base"
                  @if ($santri->dataSantri->penghasilan_ibu == 'Rp. 2.000.000 - Rp. 4.999.999') selected @endif>
                  Rp. 2.000.000 - Rp. 4.999.999</option>
                <option value="Rp. 5.000.000 - Rp. 20.000.000"
                  class="text-slate-700 dark:text-white text-xs md:text-base"
                  @if ($santri->dataSantri->penghasilan_ibu == 'Rp. 5.000.000 - Rp. 20.000.000') selected @endif>
                  Rp. 5.000.000 - Rp. 20.000.000</option>
                <option value="Lebih dari Rp. 20.000.000" class="text-slate-700 dark:text-white text-xs md:text-base"
                  @if ($santri->dataSantri->penghasilan_ibu == 'Lebih dari Rp. 20.000.000') selected @endif>
                  Lebih dari Rp. 20.000.000</option>
                <option value="Tidak berpenghasilan" class="text-slate-700 dark:text-white text-xs md:text-base"
                  @if ($santri->dataSantri->penghasilan_ibu == 'Tidak berpenghasilan') selected @endif>
                  Tidak berpenghasilan</option>

              </select>
            </div>
          </div>


          <div class="flex items-center gap-2 mt-2">
            <label for="no_hp" class="w-1/3 align-middle text-sm">Nomor HP</label>
            <div class="w-2/3">
              <input type="text"
                class="border border-slate-300 dark:bg-slate-900 rounded-md focus:outline-none focus:border-green-500 focus:border-2 text-sm w-full px-2 py-1"
                name="no_hp" id="no_hp"
                @if (old('no_hp')) value="{{ old('no_hp') }}" @else
                                value="{{ substr_replace($santri->dataSantri->no_hp, '0', 0, 2) }}" @endif>
            </div>
          </div>


          <div class="flex items-center gap-2 mt-2">
            <label for="email" class="w-1/3 align-middle text-sm">Email</label>
            <div class="w-2/3">
              <input type="email"
                class="border border-slate-300 dark:bg-slate-900 rounded-md focus:outline-none focus:border-green-500 focus:border-2 text-sm w-full px-2 py-1"
                name="email" id="email"
                @if (old('email')) value="{{ old('email') }}" @else
                                value="{{ $santri->email }}" @endif>
            </div>
          </div>


        </div>

        <div class="p-2 mt-2 dark:bg-slate-900 dark:text-white">
          <h5 class="text-green-500">Data Wali</h5>

          <div class="flex items-center gap-2 mt-2">
            <label for="nama_wali" class="w-1/3 align-middle text-sm">Nama Wali</label>
            <div class="w-2/3">
              <input type="text"
                class="border border-slate-300 dark:bg-slate-900 rounded-md focus:outline-none focus:border-green-500 focus:border-2 text-sm w-full px-2 py-1"
                name="nama_wali" id="nama_wali"
                @if (old('nama_wali')) value="{{ old('nama_wali') }}" @else
                                value="{{ $santri->dataSantri->nama_wali }}" @endif>
            </div>
          </div>

          <div class="flex items-center gap-2 mt-2">
            <label for="no_wali" class="w-1/3 align-middle text-sm">Nomor HP Wali</label>
            <div class="w-2/3">
              <input type="text"
                class="border border-slate-300 dark:bg-slate-900 rounded-md focus:outline-none focus:border-green-500 focus:border-2 text-sm w-full px-2 py-1"
                name="no_wali" id="no_wali"
                @if (old('no_wali')) value="{{ old('no_wali') }}" @else
                                value="{{ substr_replace($santri->dataSantri->no_wali, '0', 0, 2) }}" @endif>
            </div>
          </div>


          <h5 class="text-green-500 mt-5">Data Kelas</h5>

          <div class="flex items-center gap-2 mt-2">
            <label for="kelasSmp" class="w-1/3 align-middle text-sm">Kelas Formal</label>
            <div class="w-2/3">
              <select id="kelasSmp"
                class="border border-slate-300 dark:bg-slate-900 rounded-md focus:outline-none focus:border-green-500 focus:border-2 text-sm w-full p-2"
                name="kelasSmp">
                <option value="" class="text-slate-700 dark:text-white text-xs md:text-base">Pilih
                </option>
                @foreach ($kelasSmp as $smp)
                  <option value="{{ $smp->id }}" class="text-slate-700 dark:text-white text-xs md:text-base"
                    @if ($smp->id == $santri->kelas_smp_id) selected @endif>
                    {{ $smp->name }}</option>
                @endforeach
              </select>
            </div>
          </div>

          <div class="flex items-center gap-2 mt-2">
            <label for="kelasMa" class="w-1/3 align-middle text-sm">Kelas Formal</label>
            <div class="w-2/3">
              <select id="kelasMa"
                class="border border-slate-300 dark:bg-slate-900 rounded-md focus:outline-none focus:border-green-500 focus:border-2 text-sm w-full p-2"
                name="kelasMa">
                <option value="" class="text-slate-700 dark:text-white text-xs md:text-base">Pilih
                </option>
                @foreach ($kelasMa as $ma)
                  <option value="{{ $ma->id }}" class="text-slate-700 dark:text-white text-xs md:text-base"
                    @if ($ma->id == $santri->kelas_ma_id) selected @endif>
                    {{ $ma->name }}</option>
                @endforeach
              </select>
            </div>
          </div>

          <div class="flex items-center gap-2 mt-2">
            <label for="kelasMadin" class="w-1/3 align-middle text-sm">Kelas Madin</label>
            <div class="w-2/3">
              <select id="kelasMadin"
                class="border border-slate-300 dark:bg-slate-900 rounded-md focus:outline-none focus:border-green-500 focus:border-2 text-sm w-full p-2"
                name="kelasMadin">
                <option value="" class="text-slate-700 dark:text-white text-xs md:text-base">Pilih
                </option>
                @foreach ($kelasMadin as $madin)
                  <option value="{{ $madin->id }}" class="text-slate-700 dark:text-white text-xs md:text-base"
                    @if ($madin->id == $santri->kelas_madin_id) selected @endif>
                    {{ $madin->name }}</option>
                @endforeach
              </select>
            </div>
          </div>

          <div class="flex items-center gap-2 mt-2">
            <label for="kelasMmq" class="w-1/3 align-middle text-sm">Kelas MMQ</label>
            <div class="w-2/3">
              <select id="kelasMmq"
                class="border border-slate-300 dark:bg-slate-900 rounded-md focus:outline-none focus:border-green-500 focus:border-2 text-sm w-full p-2"
                name="kelasMmq">
                <option value="" class="text-slate-700 dark:text-white text-xs md:text-base">Pilih
                </option>
                @foreach ($kelasMmq as $mmq)
                  <option value="{{ $mmq->id }}" class="text-slate-700 dark:text-white text-xs md:text-base"
                    @if ($mmq->id == $santri->kelas_mmq_id) selected @endif>
                    {{ $mmq->name }}</option>
                @endforeach
              </select>
            </div>
          </div>

          <div class="flex items-center gap-2 mt-2">
            <label for="kamar" class="w-1/3 align-middle text-sm">Kamar</label>
            <div class="w-2/3">
              <select id="kamar"
                class="border border-slate-300 dark:bg-slate-900 rounded-md focus:outline-none focus:border-green-500 focus:border-2 text-sm w-full p-2"
                name="kamar">
                <option value="" class="text-slate-700 dark:text-white text-xs md:text-base">Pilih
                </option>
                @foreach ($kamar as $kmr)
                  <option value="{{ $kmr->id }}" class="text-slate-700 dark:text-white text-xs md:text-base"
                    @if ($kmr->id == $santri->kamar_id) selected @endif>
                    {{ $kmr->name }} ({{ $kmr->untuk }})</option>
                @endforeach
              </select>
            </div>
          </div>


          <div class="p-2 mt-2 dark:text-white">
            <h5 class="text-green-500">Data Riwayat Kesehatan</h5>
            <div class="flex items-center gap-2 mt-2">
              <label for="riwayat_penyakit" class="w-1/3 align-middle text-sm">Riwayat Penyakit</label>
              <div class="w-2/3">
                <input type="riwayat_penyakit"
                  class="border border-slate-300 dark:bg-slate-800 rounded-md focus:outline-none focus:border-green-500 focus:border-2 text-sm w-full px-2 py-1"
                  name="riwayat_penyakit" id="riwayat_penyakit"
                  @if (old('riwayat_penyakit')) value="{{ old('riwayat_penyakit') }}" @else
                                value="{{ $santri->dataSantri->riwayat_penyakit }}" @endif>
              </div>
            </div>
          </div>

          <div class="p-2 mt-2 dark:text-white">
            <h5 class="text-green-500">Data Riwayat Pendidikan</h5>
            <div class="flex items-center gap-2 mt-2">
              <label for="riwayat_sd" class="w-1/3 align-middle text-sm">Sekolah Dasar (SD)</label>
              <div class="w-2/3">
                <input type="riwayat_sd"
                  class="border border-slate-300 dark:bg-slate-800 rounded-md focus:outline-none focus:border-green-500 focus:border-2 text-sm w-full px-2 py-1"
                  name="riwayat_sd" id="riwayat_sd"
                  @if (old('riwayat_sd')) value="{{ old('riwayat_sd') }}" @else
                                value="{{ $santri->dataSantri->riwayat_sd }}" @endif>
              </div>
            </div>
            <div class="flex items-center gap-2 mt-2">
              <label for="riwayat_smp" class="w-1/3 align-middle text-sm">Sekolah Menengah Pertama
                (SMP)</label>
              <div class="w-2/3">
                <input type="riwayat_smp"
                  class="border border-slate-300 dark:bg-slate-800 rounded-md focus:outline-none focus:border-green-500 focus:border-2 text-sm w-full px-2 py-1"
                  name="riwayat_smp" id="riwayat_smp"
                  @if (old('riwayat_smp')) value="{{ old('riwayat_smp') }}" @else
                                value="{{ $santri->dataSantri->riwayat_smp }}" @endif>
              </div>
            </div>
            <div class="flex items-center gap-2 mt-2">
              <label for="riwayat_sma" class="w-1/3 align-middle text-sm">Sekolah Menengah Atas
                (SMA)</label>
              <div class="w-2/3">
                <input type="riwayat_sma"
                  class="border border-slate-300 dark:bg-slate-800 rounded-md focus:outline-none focus:border-green-500 focus:border-2 text-sm w-full px-2 py-1"
                  name="riwayat_sma" id="riwayat_sma"
                  @if (old('riwayat_sma')) value="{{ old('riwayat_sma') }}" @else
                                value="{{ $santri->dataSantri->riwayat_sma }}" @endif>
              </div>
            </div>
            <div class="flex items-center gap-2 mt-2">
              <label for="riwayat_pondok" class="w-1/3 align-middle text-sm">Pondok Pesantren</label>
              <div class="w-2/3">
                <input type="riwayat_pondok"
                  class="border border-slate-300 dark:bg-slate-800 rounded-md focus:outline-none focus:border-green-500 focus:border-2 text-sm w-full px-2 py-1"
                  name="riwayat_pondok" id="riwayat_pondok"
                  @if (old('riwayat_pondok')) value="{{ old('riwayat_pondok') }}" @else
                                    value="{{ $santri->dataSantri->riwayat_pondok }}" @endif>
              </div>
            </div>
          </div>

        </div>
      </div>
    </div>
    <div class="flex mt-3 gap-3">
      <div class="mx-auto">
        <button type="submit"
          class=" px-3 py-1 bg-green-500 text-white rounded-md hover:scale-105 transition duration-300">Ubah</button>
        <a href="/santri"
          class="inline-block px-3 py-1 bg-slate-500 text-white rounded-md hover:scale-105 transition duration-300">Kembali</a>
      </div>
    </div>
  </form>



  <input type="hidden" id="dataStudent" data-provinsiStudent="{{ $santri->dataSantri->provinsi }}"
    data-kotakabStudent="{{ $santri->dataSantri->kabupaten }}"
    data-kecamatanStudent="{{ $santri->dataSantri->kecamatan }}" data-desaStudent="{{ $santri->dataSantri->desa }}">

  @vite('resources/js/regionEdit.js')
  <script>
    function previewImage() {
      const image = document.querySelector('#foto');
      const imgPreview = document.querySelector('.img-preview');

      imgPreview.style.display = 'block';

      const ofReader = new FileReader();
      ofReader.readAsDataURL(image.files[0]);

      ofReader.onload = function(oFREvent) {
        imgPreview.src = oFREvent.target.result;
      }
    }
  </script>
@endsection
