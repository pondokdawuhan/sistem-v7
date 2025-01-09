@extends('templates.main')
@section('container')
  <form action="/santri" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="bg-white dark:bg-slate-900 rounded-sm p-5 shadow-lg flex flex-wrap gap-5">
      <div class="w-full lg:flex-1">
        <div class="p-2 text-slate-700 dark:text-white ">
          <h5 class="mb-3 text-green-500">Data Diri Santri Sesuai Akta</h5>
          <p class="text-xs italic text-red-500">*Wajib</p>

          <div class="flex items-center gap-2">
            <label for="jenjang" class="w-1/3 align-middle text-sm">Jenjang<span class="text-red-500">*</span></label>
            <div class="w-2/3">
              <select id="jenjang"
                class="border border-slate-300 dark:bg-slate-800 rounded-md focus:outline-none focus:border-green-500 focus:border-2 text-sm w-full p-2"
                name="jenjang" required>
                <option value="" class="text-slate-700 dark:text-white text-xs md:text-base">Pilih
                </option>
                <option value="SMP" class="text-slate-700 dark:text-white text-xs md:text-base">SMP
                </option>
                <option value="MA" class="text-slate-700 dark:text-white text-xs md:text-base">MA
                </option>
                <option value="LAINNYA" class="text-slate-700 dark:text-white text-xs md:text-base">LAINNYA
                </option>
              </select>
            </div>
          </div>

          <div class="flex items-center gap-2 mt-2">
            <label for="aktif" class="w-1/3 align-middle text-sm">Status<span class="text-red-500">*</span></label>
            <div class="w-2/3">
              <select id="aktif"
                class="border border-slate-300 dark:bg-slate-800 rounded-md focus:outline-none focus:border-green-500 focus:border-2 text-sm w-full p-2"
                name="aktif" required>
                <option value="" class="text-slate-700 dark:text-white text-xs md:text-base">Pilih
                </option>
                <option value="1" class="text-slate-700 dark:text-white text-xs md:text-base">Aktif
                </option>
                <option value="0" class="text-slate-700 dark:text-white text-xs md:text-base">Tidak
                  Aktif
                </option>
              </select>
            </div>
          </div>

          <div class="flex items-center gap-2 mt-2">
            <label for="tahun_masuk" class="w-1/3 align-middle text-sm">Tahun Masuk<span
                class="text-red-500">*</span></label>
            <div class="w-2/3">
              <input type="text"
                class="border border-slate-300 dark:bg-slate-800 rounded-md focus:outline-none focus:border-green-500 focus:border-2 text-sm w-full px-2 py-1"
                name="tahun_masuk" id="tahun_masuk" value="{{ old('tahun_masuk') }}" required>
            </div>
          </div>

          <div class="flex items-center gap-2 mt-2">
            <label for="nisn" class="w-1/3 align-middle text-sm">NISN</label>
            <div class="w-2/3">
              <input type="text"
                class="border border-slate-300 dark:bg-slate-800 rounded-md focus:outline-none focus:border-green-500 focus:border-2 text-sm w-full px-2 py-1"
                name="nisn" id="nisn" value="{{ old('nisn') }}">
            </div>
          </div>

          <div class="flex items-center gap-2 mt-2">
            <label for="nis" class="w-1/3 align-middle text-sm">NIS</label>
            <div class="w-2/3">
              <input type="text"
                class="border border-slate-300 dark:bg-slate-800 rounded-md focus:outline-none focus:border-green-500 focus:border-2 text-sm w-full px-2 py-1"
                name="nis" id="nis" value="{{ old('nis') }}">
            </div>
          </div>

          <div class="flex items-center gap-2 mt-2">
            <label for="nik" class="w-1/3 align-middle text-sm">NIK</label>
            <div class="w-2/3">
              <input type="text"
                class="border border-slate-300 dark:bg-slate-800 rounded-md focus:outline-none focus:border-green-500 focus:border-2 text-sm w-full px-2 py-1"
                name="nik" id="nik" value="{{ old('nik') }}">
            </div>
          </div>

          <div class="flex items-center gap-2 mt-2">
            <label for="name" class="w-1/3 align-middle text-sm">Nama Lengkap<span
                class="text-red-500">*</span></label>
            <div class="w-2/3">
              <input type="text"
                class="border border-slate-300 dark:bg-slate-800 rounded-md focus:outline-none focus:border-green-500 focus:border-2 text-sm w-full px-2 py-1"
                name="name" id="name" value="{{ old('name') }}" required>
            </div>
          </div>

          <div class="flex items-center gap-2 mt-2">
            <label for="jenis_kelamin" class="w-1/3 align-middle text-sm">Jenis Kelamin</label>
            <div class="w-2/3 flex">

              <div class="form-check">
                <input type="radio" class="form-check-input" id="Laki-laki" name="jenis_kelamin" value="Laki-laki" />
                <label class="form-check-label mb-0" for="Laki-laki">Laki-laki</label>
              </div>

              <div class="ml-3">
                <input type="radio" class="form-check-input" id="Perempuan" name="jenis_kelamin" value="Perempuan" />
                <label class="form-check-label mb-0" for="Perempuan">Perempuan</label>
              </div>

            </div>
          </div>

          <div class="flex items-center gap-2 mt-2">
            <label for="tempat_lahir" class="w-1/3 align-middle text-sm">Tempat Lahir</label>
            <div class="w-2/3">
              <input type="text"
                class="border border-slate-300 dark:bg-slate-800 rounded-md focus:outline-none focus:border-green-500 focus:border-2 text-sm w-full px-2 py-1"
                name="tempat_lahir" id="tempat_lahir" value="{{ old('tempat_lahir') }}">
            </div>
          </div>

          <div class="flex items-center gap-2 mt-2">
            <label for="tanggal_lahir" class="w-1/3 align-middle text-sm">Tanggal Lahir</label>
            <div class="w-2/3">
              <input type="date"
                class="border border-slate-300 dark:bg-slate-800 rounded-md focus:outline-none focus:border-green-500 focus:border-2 text-sm w-full px-2 py-1"
                name="tanggal_lahir" id="tanggal_lahir" value="{{ old('tanggal_lahir') }}">
            </div>
          </div>


          <div class="flex items-center gap-2 mt-2">
            <label for="status_anak" class="w-1/3 align-middle text-sm">Status Anak</label>
            <div class="w-2/3">
              <select id="status_anak"
                class="border border-slate-300 dark:bg-slate-800 rounded-md focus:outline-none focus:border-green-500 focus:border-2 text-sm w-full p-2"
                name="status_anak">
                <option value="" class="text-slate-700 dark:text-white text-xs md:text-base">Pilih
                </option>
                <option value="KANDUNG" class="text-slate-700 dark:text-white text-xs md:text-base">
                  KANDUNG</option>
                <option value="ANGKAT" class="text-slate-700 dark:text-white text-xs md:text-base">ANGKAT
                </option>
                <option value="LAINNYA" class="text-slate-700 dark:text-white text-xs md:text-base">
                  LAINNYA</option>
              </select>
            </div>
          </div>


          <div class="flex items-center gap-2 mt-2">
            <label for="anak_ke" class="w-1/3 align-middle text-sm">Anak Ke</label>
            <div class="w-2/3">
              <input type="text"
                class="border border-slate-300 dark:bg-slate-800 rounded-md focus:outline-none focus:border-green-500 focus:border-2 text-sm w-full px-2 py-1"
                name="anak_ke" id="anak_ke" value="{{ old('anak_ke') }}">
            </div>
          </div>

          <div class="flex items-center gap-2 mt-2">
            <label for="jumlah_saudara" class="w-1/3 align-middle text-sm">Jumlah Saudara Kandung (selain
              calon santri)</label>
            <div class="w-2/3">
              <input type="text"
                class="border border-slate-300 dark:bg-slate-800 rounded-md focus:outline-none focus:border-green-500 focus:border-2 text-sm w-full px-2 py-1"
                name="jumlah_saudara" id="jumlah_saudara" value="{{ old('jumlah_saudara') }}">
            </div>
          </div>

          <div class="flex items-center gap-2 mt-2">
            <label for="foto" class="w-1/3 align-middle text-sm">Foto</label>
            <div class="w-2/3">
              <input type="file"
                class="border border-slate-300 dark:bg-slate-800 rounded-md focus:outline-none focus:border-green-500 focus:border-2 text-sm w-full px-2 py-1 @error('foto')
                                    is-invalid
                                @enderror"
                name="foto" id="foto" onchange="previewImage()">
              <p class="italic text-xs">ukuran maksimal 1MB</p>

              @error('foto')
                <p class="italic text-xs text-red-500">{{ $message }}</p>
              @enderror

              <img src="" alt="" class="img-preview w-34 lg:w-42">

            </div>
          </div>
        </div>

        <div class="p-2 text-slate-700 dark:text-white">
          <h5 class="mb-3 text-green-500">Alamat sesuai KK</h5>


          <div class="flex items-center gap-2">
            <label for="provinsi" class="w-1/3 align-middle text-sm">Provinsi</label>
            <div class="w-2/3">
              <select id="provinsi"
                class="border border-slate-300 dark:bg-slate-800 rounded-md focus:outline-none focus:border-green-500 focus:border-2 text-sm w-full p-2"
                name="provinsi">
                <option value="" class="text-slate-700 dark:text-white text-xs md:text-base">Pilih
                  Provinsi</option>
              </select>
            </div>
          </div>

          <div class="flex items-center gap-2 mt-2">
            <label for="kotakab" class="w-1/3 align-middle text-sm">Kota Kabupaten</label>
            <div class="w-2/3">
              <select id="kotakab"
                class="border border-slate-300 dark:bg-slate-800 rounded-md focus:outline-none focus:border-green-500 focus:border-2 text-sm w-full p-2"
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
                class="border border-slate-300 dark:bg-slate-800 rounded-md focus:outline-none focus:border-green-500 focus:border-2 text-sm w-full p-2"
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
                class="border border-slate-300 dark:bg-slate-800 rounded-md focus:outline-none focus:border-green-500 focus:border-2 text-sm w-full p-2"
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
                class="border border-slate-300 dark:bg-slate-800 rounded-md focus:outline-none focus:border-green-500 focus:border-2 text-sm w-full px-2 py-1"
                name="jalan" id="jalan" value="{{ old('jalan') }}">
            </div>
          </div>

          <div class="flex items-center gap-2 mt-2">
            <label for="dusun" class="w-1/3 align-middle text-sm">Dusun</label>
            <div class="w-2/3">
              <input type="text"
                class="border border-slate-300 dark:bg-slate-800 rounded-md focus:outline-none focus:border-green-500 focus:border-2 text-sm w-full px-2 py-1"
                name="dusun" id="dusun" value="{{ old('dusun') }}">
            </div>
          </div>

          <div class="flex items-center gap-2 mt-2">
            <label for="rt" class="w-1/3 align-middle text-sm">RT</label>
            <div class="w-2/3">
              <input type="text"
                class="border border-slate-300 dark:bg-slate-800 rounded-md focus:outline-none focus:border-green-500 focus:border-2 text-sm w-full px-2 py-1"
                name="rt" id="rt" value="{{ old('rt') }}">
            </div>
          </div>

          <div class="flex items-center gap-2 mt-2">
            <label for="rw" class="w-1/3 align-middle text-sm">RW</label>
            <div class="w-2/3">
              <input type="text"
                class="border border-slate-300 dark:bg-slate-800 rounded-md focus:outline-none focus:border-green-500 focus:border-2 text-sm w-full px-2 py-1"
                name="rw" id="rw" value="{{ old('rw') }}">
            </div>
          </div>

          <div class="flex items-center gap-2 mt-2">
            <label for="kodepos" class="w-1/3 align-middle text-sm">Kode Pos</label>
            <div class="w-2/3">
              <input type="text"
                class="border border-slate-300 dark:bg-slate-800 rounded-md focus:outline-none focus:border-green-500 focus:border-2 text-sm w-full px-2 py-1"
                name="kodepos" id="kodepos" value="{{ old('kodepos') }}">
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
                class="border border-slate-300 dark:bg-slate-800 rounded-md focus:outline-none focus:border-green-500 focus:border-2 text-sm w-full px-2 py-1"
                name="no_kk" id="no_kk" value="{{ old('no_kk') }}">
            </div>
          </div>

          <div class="flex items-center gap-2 mt-2">
            <label for="nama_ayah" class="w-1/3 align-middle text-sm">Nama Ayah</label>
            <div class="w-2/3">
              <input type="text"
                class="border border-slate-300 dark:bg-slate-800 rounded-md focus:outline-none focus:border-green-500 focus:border-2 text-sm w-full px-2 py-1"
                name="nama_ayah" id="nama_ayah" value="{{ old('nama_ayah') }}">
            </div>
          </div>

          <div class="flex items-center gap-2 mt-2">
            <label for="nik_ayah" class="w-1/3 align-middle text-sm">NIK Ayah</label>
            <div class="w-2/3">
              <input type="text"
                class="border border-slate-300 dark:bg-slate-800 rounded-md focus:outline-none focus:border-green-500 focus:border-2 text-sm w-full px-2 py-1"
                name="nik_ayah" id="nik_ayah" value="{{ old('nik_ayah') }}">
            </div>
          </div>


          <div class="flex items-center gap-2 mt-2">
            <label for="pendidikan_ayah" class="w-1/3 align-middle text-sm">Pendidikan Ayah</label>
            <div class="w-2/3">
              <select id="pendidikan_ayah"
                class="border border-slate-300 dark:bg-slate-800 rounded-md focus:outline-none focus:border-green-500 focus:border-2 text-sm w-full p-2"
                name="pendidikan_ayah">
                <option value="" class="text-slate-700 dark:text-white text-xs md:text-base">Pilih
                </option>
                <option value="SD" class="text-slate-700 dark:text-white text-xs md:text-base">SD
                </option>
                <option value="SMP/MTS/SEDERAJAT" class="text-slate-700 dark:text-white text-xs md:text-base">
                  SMP/MTS/SEDERAJAT</option>
                <option value="SMA/MA/SMK SEDERAJAT" class="text-slate-700 dark:text-white text-xs md:text-base">
                  SMA/MA/SMK SEDERAJAT</option>
                <option value="D1" class="text-slate-700 dark:text-white text-xs md:text-base">D1
                </option>
                <option value="D2" class="text-slate-700 dark:text-white text-xs md:text-base">D2
                </option>
                <option value="D3" class="text-slate-700 dark:text-white text-xs md:text-base">D3
                </option>
                <option value="D4" class="text-slate-700 dark:text-white text-xs md:text-base">D4
                </option>
                <option value="S1" class="text-slate-700 dark:text-white text-xs md:text-base">S1
                </option>
                <option value="S2" class="text-slate-700 dark:text-white text-xs md:text-base">S2
                </option>
                <option value="S3" class="text-slate-700 dark:text-white text-xs md:text-base">S3
                </option>
                <option value="TIDAK SEKOLAH" class="text-slate-700 dark:text-white text-xs md:text-base">
                  TIDAK SEKOLAH
                </option>
              </select>
            </div>
          </div>


          <div class="flex items-center gap-2 mt-2">
            <label for="pekerjaan_ayah" class="w-1/3 align-middle text-sm">Pekerjaan Ayah</label>
            <div class="w-2/3">
              <input type="text"
                class="border border-slate-300 dark:bg-slate-800 rounded-md focus:outline-none focus:border-green-500 focus:border-2 text-sm w-full px-2 py-1"
                name="pekerjaan_ayah" id="pekerjaan_ayah" value="{{ old('pekerjaan_ayah') }}">
            </div>
          </div>


          <div class="flex items-center gap-2 mt-2">
            <label for="penghasilan_ayah" class="w-1/3 align-middle text-sm">Penghasilan Ayah</label>
            <div class="w-2/3">
              <select id="penghasilan_ayah"
                class="border border-slate-300 dark:bg-slate-800 rounded-md focus:outline-none focus:border-green-500 focus:border-2 text-sm w-full p-2"
                name="penghasilan_ayah">
                <option value="" class="text-slate-700 dark:text-white text-xs md:text-base">Pilih
                </option>
                <option value="Kurang dari Rp. 500.000" class="text-slate-700 dark:text-white text-xs md:text-base">
                  Kurang
                  dari Rp. 500.000</option>
                <option value="Rp. 500.000 = Rp. 999.999" class="text-slate-700 dark:text-white text-xs md:text-base">
                  Rp. 500.000 = Rp. 999.999</option>
                <option value="Rp. 1.000.000 - Rp. 1.999.999"
                  class="text-slate-700 dark:text-white text-xs md:text-base">
                  Rp. 1.000.000 - Rp. 1.999.999</option>
                <option value="Rp. 2.000.000 - Rp. 4.999.999"
                  class="text-slate-700 dark:text-white text-xs md:text-base">
                  Rp. 2.000.000 - Rp. 4.999.999</option>
                <option value="Rp. 5.000.000 - Rp. 20.000.000"
                  class="text-slate-700 dark:text-white text-xs md:text-base">
                  Rp. 5.000.000 - Rp. 20.000.000</option>
                <option value="Lebih dari Rp. 20.000.000" class="text-slate-700 dark:text-white text-xs md:text-base">
                  Lebih dari Rp. 20.000.000</option>
                <option value="Tidak berpenghasilan" class="text-slate-700 dark:text-white text-xs md:text-base">
                  Tidak berpenghasilan</option>

              </select>
            </div>
          </div>

          <div class="flex items-center gap-2 mt-2">
            <label for="nama_ibu" class="w-1/3 align-middle text-sm">Nama Ibu</label>
            <div class="w-2/3">
              <input type="text"
                class="border border-slate-300 dark:bg-slate-800 rounded-md focus:outline-none focus:border-green-500 focus:border-2 text-sm w-full px-2 py-1"
                name="nama_ibu" id="nama_ibu" value="{{ old('nama_ibu') }}">
            </div>
          </div>

          <div class="flex items-center gap-2 mt-2">
            <label for="nik_ibu" class="w-1/3 align-middle text-sm">NIK ibu</label>
            <div class="w-2/3">
              <input type="text"
                class="border border-slate-300 dark:bg-slate-800 rounded-md focus:outline-none focus:border-green-500 focus:border-2 text-sm w-full px-2 py-1"
                name="nik_ibu" id="nik_ibu" value="{{ old('nik_ibu') }}">
            </div>
          </div>


          <div class="flex items-center gap-2 mt-2">
            <label for="pendidikan_ibu" class="w-1/3 align-middle text-sm">Pendidikan ibu</label>
            <div class="w-2/3">
              <select id="pendidikan_ibu"
                class="border border-slate-300 dark:bg-slate-800 rounded-md focus:outline-none focus:border-green-500 focus:border-2 text-sm w-full p-2"
                name="pendidikan_ibu">
                <option value="" class="text-slate-700 dark:text-white text-xs md:text-base">Pilih
                </option>
                <option value="SD" class="text-slate-700 dark:text-white text-xs md:text-base">SD
                </option>
                <option value="SMP/MTS/SEDERAJAT" class="text-slate-700 dark:text-white text-xs md:text-base">
                  SMP/MTS/SEDERAJAT</option>
                <option value="SMA/MA/SMK SEDERAJAT" class="text-slate-700 dark:text-white text-xs md:text-base">
                  SMA/MA/SMK SEDERAJAT</option>
                <option value="D1" class="text-slate-700 dark:text-white text-xs md:text-base">D1
                </option>
                <option value="D2" class="text-slate-700 dark:text-white text-xs md:text-base">D2
                </option>
                <option value="D3" class="text-slate-700 dark:text-white text-xs md:text-base">D3
                </option>
                <option value="D4" class="text-slate-700 dark:text-white text-xs md:text-base">D4
                </option>
                <option value="S1" class="text-slate-700 dark:text-white text-xs md:text-base">S1
                </option>
                <option value="S2" class="text-slate-700 dark:text-white text-xs md:text-base">S2
                </option>
                <option value="S3" class="text-slate-700 dark:text-white text-xs md:text-base">S3
                </option>
                <option value="TIDAK SEKOLAH" class="text-slate-700 dark:text-white text-xs md:text-base">
                  TIDAK SEKOLAH
                </option>
              </select>
            </div>
          </div>


          <div class="flex items-center gap-2 mt-2">
            <label for="pekerjaan_ibu" class="w-1/3 align-middle text-sm">Pekerjaan ibu</label>
            <div class="w-2/3">
              <input type="text"
                class="border border-slate-300 dark:bg-slate-800 rounded-md focus:outline-none focus:border-green-500 focus:border-2 text-sm w-full px-2 py-1"
                name="pekerjaan_ibu" id="pekerjaan_ibu" value="{{ old('pekerjaan_ibu') }}">
            </div>
          </div>


          <div class="flex items-center gap-2 mt-2">
            <label for="penghasilan_ibu" class="w-1/3 align-middle text-sm">Penghasilan ibu</label>
            <div class="w-2/3">
              <select id="penghasilan_ibu"
                class="border border-slate-300 dark:bg-slate-800 rounded-md focus:outline-none focus:border-green-500 focus:border-2 text-sm w-full p-2"
                name="penghasilan_ibu">
                <option value="" class="text-slate-700 dark:text-white text-xs md:text-base">Pilih
                </option>
                <option value="Kurang dari Rp. 500.000" class="text-slate-700 dark:text-white text-xs md:text-base">
                  Kurang
                  dari Rp. 500.000</option>
                <option value="Rp. 500.000 = Rp. 999.999" class="text-slate-700 dark:text-white text-xs md:text-base">
                  Rp. 500.000 = Rp. 999.999</option>
                <option value="Rp. 1.000.000 - Rp. 1.999.999"
                  class="text-slate-700 dark:text-white text-xs md:text-base">
                  Rp. 1.000.000 - Rp. 1.999.999</option>
                <option value="Rp. 2.000.000 - Rp. 4.999.999"
                  class="text-slate-700 dark:text-white text-xs md:text-base">
                  Rp. 2.000.000 - Rp. 4.999.999</option>
                <option value="Rp. 5.000.000 - Rp. 20.000.000"
                  class="text-slate-700 dark:text-white text-xs md:text-base">
                  Rp. 5.000.000 - Rp. 20.000.000</option>
                <option value="Lebih dari Rp. 20.000.000" class="text-slate-700 dark:text-white text-xs md:text-base">
                  Lebih dari Rp. 20.000.000</option>
                <option value="Tidak berpenghasilan" class="text-slate-700 dark:text-white text-xs md:text-base">
                  Tidak berpenghasilan</option>

              </select>
            </div>
          </div>


          <div class="flex items-center gap-2 mt-2">
            <label for="no_hp" class="w-1/3 align-middle text-sm">Nomor HP<span
                class="text-red-500">*</span></label>
            <div class="w-2/3">
              <input type="text"
                class="border border-slate-300 dark:bg-slate-800 rounded-md focus:outline-none focus:border-green-500 focus:border-2 text-sm w-full px-2 py-1"
                name="no_hp" id="no_hp" value="{{ old('no_hp') }}">
            </div>
          </div>

          <div class="flex items-center gap-2 mt-2">
            <label for="email" class="w-1/3 align-middle text-sm">Email</label>
            <div class="w-2/3">
              <input type="email"
                class="border border-slate-300 dark:bg-slate-800 rounded-md focus:outline-none focus:border-green-500 focus:border-2 text-sm w-full px-2 py-1"
                name="email" id="email" value="{{ old('email') }}">
            </div>
          </div>


        </div>

        <div class="p-2 mt-2 dark:text-white">
          <h5 class="text-green-500">Data Wali</h5>

          <div class="flex items-center gap-2 mt-2">
            <label for="nama_wali" class="w-1/3 align-middle text-sm">Nama Wali</label>
            <div class="w-2/3">
              <input type="text"
                class="border border-slate-300 dark:bg-slate-800 rounded-md focus:outline-none focus:border-green-500 focus:border-2 text-sm w-full px-2 py-1"
                name="nama_wali" id="nama_wali" value="{{ old('nama_wali') }}">
            </div>
          </div>

          <div class="flex items-center gap-2 mt-2">
            <label for="no_wali" class="w-1/3 align-middle text-sm">Nomor HP Wali</label>
            <div class="w-2/3">
              <input type="text"
                class="border border-slate-300 dark:bg-slate-800 rounded-md focus:outline-none focus:border-green-500 focus:border-2 text-sm w-full px-2 py-1"
                name="no_wali" id="no_wali" value="{{ old('no_wali') }}">
            </div>
          </div>

          <h5 class="text-green-500 mt-5">Data Kelas</h5>
          @foreach ($lembagas as $lembaga)
            <div class="flex items-center gap-2 mt-2">
              <label for="" class="w-1/3 align-middle text-sm">Kelas {{ $lembaga->nama }}</label>
              @foreach ($lembaga->kelas as $kelas)
                <div class="w-2/3">
                  <select id="kelas"
                    class="border border-slate-300 dark:bg-slate-800 rounded-md focus:outline-none focus:border-green-500 focus:border-2 text-sm w-full p-2"
                    name="kelas[]">
                    <option value="" class="text-slate-700 dark:text-white text-xs md:text-base">Pilih
                    </option>
                    @foreach ($kelas as $kls)
                      <option value="{{ $kls->id }}" class="text-slate-700 dark:text-white text-xs md:text-base">
                        {{ $kls->nama }}</option>
                    @endforeach
                  </select>
                </div>
              @endforeach
            </div>
          @endforeach
        </div>

        <div class="p-2 mt-2 dark:text-white">
          <h5 class="text-green-500">Data Riwayat Kesehatan</h5>
          <div class="flex items-center gap-2 mt-2">
            <label for="riwayat_penyakit" class="w-1/3 align-middle text-sm">Riwayat Penyakit</label>
            <div class="w-2/3">
              <input type="riwayat_penyakit"
                class="border border-slate-300 dark:bg-slate-800 rounded-md focus:outline-none focus:border-green-500 focus:border-2 text-sm w-full px-2 py-1"
                name="riwayat_penyakit" id="riwayat_penyakit" value="{{ old('riwayat_penyakit') }}">
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
                name="riwayat_sd" id="riwayat_sd" value="{{ old('riwayat_sd') }}">
            </div>
          </div>
          <div class="flex items-center gap-2 mt-2">
            <label for="riwayat_smp" class="w-1/3 align-middle text-sm">Sekolah Menengah Pertama (SMP)</label>
            <div class="w-2/3">
              <input type="riwayat_smp"
                class="border border-slate-300 dark:bg-slate-800 rounded-md focus:outline-none focus:border-green-500 focus:border-2 text-sm w-full px-2 py-1"
                name="riwayat_smp" id="riwayat_smp" value="{{ old('riwayat_smp') }}">
            </div>
          </div>
          <div class="flex items-center gap-2 mt-2">
            <label for="riwayat_sma" class="w-1/3 align-middle text-sm">Sekolah Menengah Atas (SMA)</label>
            <div class="w-2/3">
              <input type="riwayat_sma"
                class="border border-slate-300 dark:bg-slate-800 rounded-md focus:outline-none focus:border-green-500 focus:border-2 text-sm w-full px-2 py-1"
                name="riwayat_sma" id="riwayat_sma" value="{{ old('riwayat_sma') }}">
            </div>
          </div>
          <div class="flex items-center gap-2 mt-2">
            <label for="riwayat_pondok" class="w-1/3 align-middle text-sm">Pondok Pesantren</label>
            <div class="w-2/3">
              <input type="riwayat_pondok"
                class="border border-slate-300 dark:bg-slate-800 rounded-md focus:outline-none focus:border-green-500 focus:border-2 text-sm w-full px-2 py-1"
                name="riwayat_pondok" id="riwayat_pondok" value="{{ old('riwayat_pondok') }}">
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="flex mt-3 gap-3">
      <div class="mx-auto">
        <button type="submit"
          class=" px-3 py-1 bg-green-500 text-white rounded-md hover:scale-105 transition duration-300">Tambah</button>
        <a href="/santri"
          class="inline-block px-3 py-1 bg-slate-500 text-white rounded-md hover:scale-105 transition duration-300">Kembali</a>
      </div>
    </div>
  </form>

  @vite('resources/js/region.js')

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
