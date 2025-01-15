<div>
  <x-loading></x-loading>
  <form method="POST" enctype="multipart/form-data" wire:submit.prevent='edit'>
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
                class="border @error('lembaga_id')
                  border-red-500
                @enderror dark:bg-slate-800 rounded-md text-sm w-full p-2"
                wire:model="lembaga_id">
                <option value="" class="text-slate-700 dark:text-white text-xs md:text-base">Pilih
                </option>
                @foreach ($lembagaFormals as $lembagaFormal)
                  <option value="{{ $lembagaFormal->id }}" class="text-slate-700 dark:text-white text-xs md:text-base">
                    {{ $lembagaFormal->nama }}
                  </option>
                @endforeach
                <option value="0">LAINNYA</option>
              </select>
              @error('jenjang')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
              @enderror
            </div>
          </div>

          <div class="flex items-center gap-2 mt-2">
            <label for="aktif" class="w-1/3 align-middle text-sm">Status<span class="text-red-500">*</span></label>
            <div class="w-2/3">
              <select id="aktif"
                class="border @error('aktif')
                  border-red-500
                @enderror  dark:bg-slate-800 rounded-md text-sm w-full p-2"
                wire:model="aktif">
                <option value="" class="text-slate-700 dark:text-white text-xs md:text-base">Pilih
                </option>
                <option value="1" class="text-slate-700 dark:text-white text-xs md:text-base">Aktif
                </option>
                <option value="0" class="text-slate-700 dark:text-white text-xs md:text-base">Tidak
                  Aktif
                </option>
              </select>
              @error('aktif')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
              @enderror
            </div>
          </div>

          <div class="flex items-center gap-2 mt-2">
            <label for="tahun_masuk" class="w-1/3 align-middle text-sm">Tahun Masuk<span
                class="text-red-500">*</span></label>
            <div class="w-2/3">
              <input type="text"
                class="border @error('tahun_masuk')
                  border-red-500
                @enderror  dark:bg-slate-800 rounded-md text-sm w-full px-2 py-1"
                wire:model="tahun_masuk" id="tahun_masuk" value="{{ old('tahun_masuk') }}">
              @error('tahun_masuk')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
              @enderror
            </div>
          </div>

          <div class="flex items-center gap-2 mt-2">
            <label for="nisn" class="w-1/3 align-middle text-sm">NISN</label>
            <div class="w-2/3">
              <input type="text" class="border  dark:bg-slate-800 rounded-md text-sm w-full px-2 py-1"
                wire:model="nisn" id="nisn" value="{{ old('nisn') }}">
            </div>
          </div>

          <div class="flex items-center gap-2 mt-2">
            <label for="nis" class="w-1/3 align-middle text-sm">NIS</label>
            <div class="w-2/3">
              <input type="text" class="border  dark:bg-slate-800 rounded-md text-sm w-full px-2 py-1"
                wire:model="nis" id="nis" value="{{ old('nis') }}">
            </div>
          </div>

          <div class="flex items-center gap-2 mt-2">
            <label for="nik" class="w-1/3 align-middle text-sm">NIK</label>
            <div class="w-2/3">
              <input type="text" class="border  dark:bg-slate-800 rounded-md text-sm w-full px-2 py-1"
                wire:model="nik" id="nik" value="{{ old('nik') }}">
            </div>
          </div>

          <div class="flex items-center gap-2 mt-2">
            <label for="name" class="w-1/3 align-middle text-sm">Nama Lengkap<span
                class="text-red-500">*</span></label>
            <div class="w-2/3">
              <input type="text"
                class="border @error('name')
                  border-red-500
                @enderror  dark:bg-slate-800 rounded-md text-sm w-full px-2 py-1"
                wire:model="name" id="name" value="{{ old('name') }}">
              @error('name')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
              @enderror
            </div>
          </div>

          <div class="flex items-center gap-2 mt-2">
            <label for="jenis_kelamin" class="w-1/3 align-middle text-sm">Jenis Kelamin<span
                class="text-red-500">*</span></label>
            <div class="w-2/3 flex">
              <div class="flex">
                <div class="form-check">
                  <input type="radio" class="form-check-input" id="Laki-laki" wire:model="jenis_kelamin"
                    value="Laki-laki" />
                  <label class="form-check-label mb-0" for="Laki-laki">Laki-laki</label>
                </div>

                <div class="ml-3">
                  <input type="radio" class="form-check-input" id="Perempuan" wire:model="jenis_kelamin"
                    value="Perempuan" />
                  <label class="form-check-label mb-0" for="Perempuan">Perempuan</label>
                </div>
              </div>
              @error('jenis_kelamin')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
              @enderror

            </div>
          </div>

          <div class="flex items-center gap-2 mt-2">
            <label for="tempat_lahir" class="w-1/3 align-middle text-sm">Tempat Lahir</label>
            <div class="w-2/3">
              <input type="text" class="border  dark:bg-slate-800 rounded-md text-sm w-full px-2 py-1"
                wire:model="tempat_lahir" id="tempat_lahir" value="{{ old('tempat_lahir') }}">
            </div>
          </div>

          <div class="flex items-center gap-2 mt-2">
            <label for="tanggal_lahir" class="w-1/3 align-middle text-sm">Tanggal Lahir</label>
            <div class="w-2/3">
              <input type="date" class="border  dark:bg-slate-800 rounded-md text-sm w-full px-2 py-1"
                wire:model="tanggal_lahir" id="tanggal_lahir" value="{{ old('tanggal_lahir') }}">
            </div>
          </div>


          <div class="flex items-center gap-2 mt-2">
            <label for="status_anak" class="w-1/3 align-middle text-sm">Status Anak</label>
            <div class="w-2/3">
              <select id="status_anak" class="border  dark:bg-slate-800 rounded-md text-sm w-full p-2"
                wire:model="status_anak">
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
              <input type="text" class="border  dark:bg-slate-800 rounded-md text-sm w-full px-2 py-1"
                wire:model="anak_ke" id="anak_ke" value="{{ old('anak_ke') }}">
            </div>
          </div>

          <div class="flex items-center gap-2 mt-2">
            <label for="jumlah_saudara" class="w-1/3 align-middle text-sm">Jumlah Saudara Kandung (selain
              calon santri)</label>
            <div class="w-2/3">
              <input type="text" class="border  dark:bg-slate-800 rounded-md text-sm w-full px-2 py-1"
                wire:model="jumlah_saudara" id="jumlah_saudara" value="{{ old('jumlah_saudara') }}">
            </div>
          </div>

          <div class="flex items-center gap-2 mt-2">
            <label for="foto" class="w-1/3 align-middle text-sm">Foto</label>
            <div class="w-2/3">
              <input type="file"
                class="border  dark:bg-slate-900 rounded-md text-sm w-full px-2 @error('foto')
                                    is-invalid
                                @enderror"
                wire:model="foto" id="foto">
              <p class="italic text-xs">ukuran maksimal 1MB</p>

              @error('foto')
                <p class="italic text-xs text-red-500">{{ $message }}</p>
              @enderror
              @if ($this->foto)
                <img src="{{ $this->foto->temporaryUrl() }}" alt="" class="img-preview w-24 h-24">
              @elseif ($santri->dataSantri->foto)
                <img src="{{ asset('storage/' . $santri->dataSantri->foto) }}" alt=""
                  class="img-preview w-24 h-24">
              @endif
            </div>
          </div>
        </div>

        <div class="p-2 text-slate-700 dark:text-white">
          <h5 class="mb-3 text-green-500">Alamat sesuai KK</h5>


          <div class="flex items-center dark:text-white gap-2">
            <label for="provinsi" class="w-1/3 align-middle text-sm">Provinsi</label>
            <div class="w-2/3">
              <select id="provinsi" class="border  dark:bg-slate-900 rounded-md text-sm w-full p-2"
                wire:model="provinsi">
                <option value="" class="text-slate-700 dark:text-white text-xs md:text-base">Pilih
                  Provinsi</option>
                <option data-provinsi="11" class="text-slate-700 dark:text-white text-xs md:text-base">ACEH</option>
                <option data-provinsi="12" class="text-slate-700 dark:text-white text-xs md:text-base">SUMATERA UTARA
                </option>
                <option data-provinsi="13" class="text-slate-700 dark:text-white text-xs md:text-base">SUMATERA BARAT
                </option>
                <option data-provinsi="14" class="text-slate-700 dark:text-white text-xs md:text-base">RIAU</option>
                <option data-provinsi="15" class="text-slate-700 dark:text-white text-xs md:text-base">JAMBI</option>
                <option data-provinsi="16" class="text-slate-700 dark:text-white text-xs md:text-base">SUMATERA
                  SELATAN
                </option>
                <option data-provinsi="17" class="text-slate-700 dark:text-white text-xs md:text-base">BENGKULU
                </option>
                <option data-provinsi="18" class="text-slate-700 dark:text-white text-xs md:text-base">LAMPUNG
                </option>
                <option data-provinsi="19" class="text-slate-700 dark:text-white text-xs md:text-base">KEPULAUAN
                  BANGKA
                  BELITUNG</option>
                <option data-provinsi="31" class="text-slate-700 dark:text-white text-xs md:text-base">DKI JAKARTA
                </option>
                <option data-provinsi="32" class="text-slate-700 dark:text-white text-xs md:text-base">JAWA BARAT
                </option>
                <option data-provinsi="33" class="text-slate-700 dark:text-white text-xs md:text-base">JAWA TENGAH
                </option>
                <option data-provinsi="34" class="text-slate-700 dark:text-white text-xs md:text-base">DI YOGYAKARTA
                </option>
                <option data-provinsi="35" class="text-slate-700 dark:text-white text-xs md:text-base">JAWA TIMUR
                </option>
                <option data-provinsi="36" class="text-slate-700 dark:text-white text-xs md:text-base">BANTEN
                </option>
                <option data-provinsi="51" class="text-slate-700 dark:text-white text-xs md:text-base">BALI
                </option>
                <option data-provinsi="52" class="text-slate-700 dark:text-white text-xs md:text-base">NUSA TENGGARA
                  BARAT
                </option>
                <option data-provinsi="53" class="text-slate-700 dark:text-white text-xs md:text-base">NUSA TENGGARA
                  TIMUR
                </option>
                <option data-provinsi="61" class="text-slate-700 dark:text-white text-xs md:text-base">KALIMANTAN
                  BARAT
                </option>
                <option data-provinsi="62" class="text-slate-700 dark:text-white text-xs md:text-base">KALIMANTAN
                  TENGAH
                </option>
                <option data-provinsi="63" class="text-slate-700 dark:text-white text-xs md:text-base">KALIMANTAN
                  SELATAN
                </option>
                <option data-provinsi="64" class="text-slate-700 dark:text-white text-xs md:text-base">KALIMANTAN
                  TIMUR
                </option>
                <option data-provinsi="65" class="text-slate-700 dark:text-white text-xs md:text-base">KALIMANTAN
                  UTARA
                </option>
                <option data-provinsi="71" class="text-slate-700 dark:text-white text-xs md:text-base">SULAWESI UTARA
                </option>
                <option data-provinsi="72" class="text-slate-700 dark:text-white text-xs md:text-base">SULAWESI TENGAH
                </option>
                <option data-provinsi="73" class="text-slate-700 dark:text-white text-xs md:text-base">SULAWESI
                  SELATAN
                </option>
                <option data-provinsi="74" class="text-slate-700 dark:text-white text-xs md:text-base">SULAWESI
                  TENGGARA
                </option>
                <option data-provinsi="75" class="text-slate-700 dark:text-white text-xs md:text-base">GORONTALO
                </option>
                <option data-provinsi="76" class="text-slate-700 dark:text-white text-xs md:text-base">SULAWESI BARAT
                </option>
                <option data-provinsi="81" class="text-slate-700 dark:text-white text-xs md:text-base">MALUKU
                </option>
                <option data-provinsi="82" class="text-slate-700 dark:text-white text-xs md:text-base">MALUKU UTARA
                </option>
                <option data-provinsi="91" class="text-slate-700 dark:text-white text-xs md:text-base">PAPUA BARAT
                </option>
                <option data-provinsi="94" class="text-slate-700 dark:text-white text-xs md:text-base">PAPUA
                </option>
              </select>
            </div>
          </div>
          <div class="flex items-center dark:text-white gap-2 mt-2">
            <label for="kotakab" class="w-1/3 align-middle text-sm">Kota Kabupaten</label>
            <div class="w-2/3">
              <select id="kotakab" class="border  dark:bg-slate-900 rounded-md text-sm w-full p-2"
                wire:model="kabupaten">
                <option value="" class="text-slate-700 dark:text-white text-xs md:text-base">
                  {{ $kabupaten }}
                </option>
              </select>
            </div>
          </div>

          <div class="flex items-center dark:text-white gap-2 mt-2">
            <label for="kecamatan" class="w-1/3 align-middle text-sm">Kecamatan</label>
            <div class="w-2/3">
              <select id="kecamatan" class="border  dark:bg-slate-900 rounded-md text-sm w-full p-2"
                wire:model="kecamatan">
                <option value="" class="text-slate-700 dark:text-white text-xs md:text-base">
                  {{ $kecamatan }}
                </option>
              </select>
            </div>
          </div>

          <div class="flex items-center dark:text-white gap-2 mt-2">
            <label for="desa" class="w-1/3 align-middle text-sm">Desa</label>
            <div class="w-2/3">
              <select id="desa" class="border  dark:bg-slate-900 rounded-md text-sm w-full p-2"
                wire:model="desa">
                <option value="" class="text-slate-700 dark:text-white text-xs md:text-base">
                  {{ $desa }}</option>
              </select>
            </div>
          </div>


          <div class="flex items-center dark:text-white gap-2 mt-2">
            <label for="jalan" class="w-1/3 align-middle text-sm">Jalan</label>
            <div class="w-2/3">
              <input type="text" class="border  dark:bg-slate-900 rounded-md text-sm w-full px-2 py-1"
                wire:model="jalan" id="jalan" value="{{ old('jalan') }}">
            </div>
          </div>

          <div class="flex items-center dark:text-white gap-2 mt-2">
            <label for="dusun" class="w-1/3 align-middle text-sm">Dusun</label>
            <div class="w-2/3">
              <input type="text" class="border  dark:bg-slate-900 rounded-md text-sm w-full px-2 py-1"
                wire:model="dusun" id="dusun" value="{{ old('dusun') }}">
            </div>
          </div>

          <div class="flex items-center dark:text-white gap-2 mt-2">
            <label for="rt" class="w-1/3 align-middle text-sm">RT</label>
            <div class="w-2/3">
              <input type="text" class="border  dark:bg-slate-900 rounded-md text-sm w-full px-2 py-1"
                wire:model="rt" id="rt" value="{{ old('rt') }}">
            </div>
          </div>

          <div class="flex items-center dark:text-white gap-2 mt-2">
            <label for="rw" class="w-1/3 align-middle text-sm">RW</label>
            <div class="w-2/3">
              <input type="text" class="border  dark:bg-slate-900 rounded-md text-sm w-full px-2 py-1"
                wire:model="rw" id="rw" value="{{ old('rw') }}">
            </div>
          </div>

          <div class="flex items-center dark:text-white gap-2 mt-2">
            <label for="kodepos" class="w-1/3 align-middle text-sm">Kode Pos</label>
            <div class="w-2/3">
              <input type="text" class="border  dark:bg-slate-900 rounded-md text-sm w-full px-2 py-1"
                wire:model="kodepos" id="kodepos" value="{{ old('kodepos') }}">
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
              <input type="text" class="border  dark:bg-slate-800 rounded-md text-sm w-full px-2 py-1"
                wire:model="no_kk" id="no_kk" value="{{ old('no_kk') }}">
            </div>
          </div>

          <div class="flex items-center gap-2 mt-2">
            <label for="nama_ayah" class="w-1/3 align-middle text-sm">Nama Ayah</label>
            <div class="w-2/3">
              <input type="text" class="border  dark:bg-slate-800 rounded-md text-sm w-full px-2 py-1"
                wire:model="nama_ayah" id="nama_ayah" value="{{ old('nama_ayah') }}">
            </div>
          </div>

          <div class="flex items-center gap-2 mt-2">
            <label for="nik_ayah" class="w-1/3 align-middle text-sm">NIK Ayah</label>
            <div class="w-2/3">
              <input type="text" class="border  dark:bg-slate-800 rounded-md text-sm w-full px-2 py-1"
                wire:model="nik_ayah" id="nik_ayah" value="{{ old('nik_ayah') }}">
            </div>
          </div>


          <div class="flex items-center gap-2 mt-2">
            <label for="pendidikan_ayah" class="w-1/3 align-middle text-sm">Pendidikan Ayah</label>
            <div class="w-2/3">
              <select id="pendidikan_ayah" class="border  dark:bg-slate-800 rounded-md text-sm w-full p-2"
                wire:model="pendidikan_ayah">
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
              <input type="text" class="border  dark:bg-slate-800 rounded-md text-sm w-full px-2 py-1"
                wire:model="pekerjaan_ayah" id="pekerjaan_ayah" value="{{ old('pekerjaan_ayah') }}">
            </div>
          </div>


          <div class="flex items-center gap-2 mt-2">
            <label for="penghasilan_ayah" class="w-1/3 align-middle text-sm">Penghasilan Ayah</label>
            <div class="w-2/3">
              <select id="penghasilan_ayah" class="border  dark:bg-slate-800 rounded-md text-sm w-full p-2"
                wire:model="penghasilan_ayah">
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
              <input type="text" class="border  dark:bg-slate-800 rounded-md text-sm w-full px-2 py-1"
                wire:model="nama_ibu" id="nama_ibu" value="{{ old('nama_ibu') }}">
            </div>
          </div>

          <div class="flex items-center gap-2 mt-2">
            <label for="nik_ibu" class="w-1/3 align-middle text-sm">NIK ibu</label>
            <div class="w-2/3">
              <input type="text" class="border  dark:bg-slate-800 rounded-md text-sm w-full px-2 py-1"
                wire:model="nik_ibu" id="nik_ibu" value="{{ old('nik_ibu') }}">
            </div>
          </div>


          <div class="flex items-center gap-2 mt-2">
            <label for="pendidikan_ibu" class="w-1/3 align-middle text-sm">Pendidikan ibu</label>
            <div class="w-2/3">
              <select id="pendidikan_ibu" class="border  dark:bg-slate-800 rounded-md text-sm w-full p-2"
                wire:model="pendidikan_ibu">
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
              <input type="text" class="border  dark:bg-slate-800 rounded-md text-sm w-full px-2 py-1"
                wire:model="pekerjaan_ibu" id="pekerjaan_ibu" value="{{ old('pekerjaan_ibu') }}">
            </div>
          </div>


          <div class="flex items-center gap-2 mt-2">
            <label for="penghasilan_ibu" class="w-1/3 align-middle text-sm">Penghasilan ibu</label>
            <div class="w-2/3">
              <select id="penghasilan_ibu" class="border  dark:bg-slate-800 rounded-md text-sm w-full p-2"
                wire:model="penghasilan_ibu">
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
                class="border @error('no_hp')
                  border-red-500
                @enderror  dark:bg-slate-800 rounded-md text-sm w-full px-2 py-1"
                wire:model="no_hp" id="no_hp" value="{{ old('no_hp') }}">
              @error('no_hp')
                <p class="text-red-500 text-xs italic">{{ $message }}</p>
              @enderror
            </div>
          </div>

          <div class="flex items-center gap-2 mt-2">
            <label for="email" class="w-1/3 align-middle text-sm">Email</label>
            <div class="w-2/3">
              <input type="email" class="border  dark:bg-slate-800 rounded-md text-sm w-full px-2 py-1"
                wire:model="email" id="email" value="{{ old('email') }}">
            </div>
          </div>


        </div>

        <div class="p-2 mt-2 dark:text-white">
          <h5 class="text-green-500">Data Wali</h5>

          <div class="flex items-center gap-2 mt-2">
            <label for="nama_wali" class="w-1/3 align-middle text-sm">Nama Wali</label>
            <div class="w-2/3">
              <input type="text" class="border  dark:bg-slate-800 rounded-md text-sm w-full px-2 py-1"
                wire:model="nama_wali" id="nama_wali" value="{{ old('nama_wali') }}">
            </div>
          </div>

          <div class="flex items-center gap-2 mt-2">
            <label for="no_wali" class="w-1/3 align-middle text-sm">Nomor HP Wali</label>
            <div class="w-2/3">
              <input type="text" class="border  dark:bg-slate-800 rounded-md text-sm w-full px-2 py-1"
                wire:model="no_wali" id="no_wali" value="{{ old('no_wali') }}">
            </div>
          </div>

          <h5 class="text-green-500 mt-5">Data Kelas</h5>
          @foreach ($lembagaFormals as $lembaga)
            <div class="flex items-center gap-2 mt-2">
              <label for="kelasSmp" class="w-1/3 align-middle text-sm">Kelas {{ $lembaga->nama }}</label>
              <div class="w-2/3">
                <select id="kelas" class="border  dark:bg-slate-800 rounded-md text-sm w-full p-2"
                  wire:model="selectedKelasFormals">
                  <option value="" class="text-slate-700 dark:text-white text-xs md:text-base">Pilih
                  </option>
                  @foreach ($lembaga->kelas as $kls)
                    <option value="{{ $kls->id }}" class="text-slate-700 dark:text-white text-xs md:text-base">
                      {{ $kls->nama }}</option>
                  @endforeach
                </select>
              </div>
            </div>
          @endforeach

          @foreach ($lembagaMadins as $lembaga)
            <div class="flex items-center gap-2 mt-2">
              <label for="kelasSmp" class="w-1/3 align-middle text-sm">Kelas {{ $lembaga->nama }}</label>
              <div class="w-2/3">
                <select id="kelas" class="border  dark:bg-slate-800 rounded-md text-sm w-full p-2"
                  wire:model="selectedKelasMadins">
                  <option value="" class="text-slate-700 dark:text-white text-xs md:text-base">Pilih
                  </option>
                  @foreach ($lembaga->kelas as $kls)
                    <option value="{{ $kls->id }}" class="text-slate-700 dark:text-white text-xs md:text-base">
                      {{ $kls->nama }}</option>
                  @endforeach
                </select>
              </div>
            </div>
          @endforeach

          @foreach ($lembagaMmqs as $lembaga)
            <div class="flex items-center gap-2 mt-2">
              <label for="kelasSmp" class="w-1/3 align-middle text-sm">Kelas {{ $lembaga->nama }}</label>
              <div class="w-2/3">
                <select id="kelas" class="border  dark:bg-slate-800 rounded-md text-sm w-full p-2"
                  wire:model="selectedKelasMmqs">
                  <option value="" class="text-slate-700 dark:text-white text-xs md:text-base">Pilih
                  </option>
                  @foreach ($lembaga->kelas as $kls)
                    <option value="{{ $kls->id }}" class="text-slate-700 dark:text-white text-xs md:text-base">
                      {{ $kls->nama }}</option>
                  @endforeach
                </select>
              </div>
            </div>
          @endforeach

          @foreach ($lembagaAsramas as $lembaga)
            <div class="flex items-center gap-2 mt-2">
              <label for="kelasSmp" class="w-1/3 align-middle text-sm">Kelas {{ $lembaga->nama }}</label>
              <div class="w-2/3">
                <select id="kelas" class="border  dark:bg-slate-800 rounded-md text-sm w-full p-2"
                  wire:model="selectedKelasAsramas">
                  <option value="" class="text-slate-700 dark:text-white text-xs md:text-base">Pilih
                  </option>
                  @foreach ($lembaga->kelas as $kls)
                    <option value="{{ $kls->id }}" class="text-slate-700 dark:text-white text-xs md:text-base">
                      {{ $kls->nama }}</option>
                  @endforeach
                </select>
              </div>
            </div>
          @endforeach
        </div>

        <div class="p-2 mt-2 dark:text-white">
          <h5 class="text-green-500">Data Riwayat Kesehatan</h5>
          <div class="flex items-center gap-2 mt-2">
            <label for="riwayat_penyakit" class="w-1/3 align-middle text-sm">Riwayat Penyakit</label>
            <div class="w-2/3">
              <input type="riwayat_penyakit" class="border  dark:bg-slate-800 rounded-md text-sm w-full px-2 py-1"
                wire:model="riwayat_penyakit" id="riwayat_penyakit" value="{{ old('riwayat_penyakit') }}">
            </div>
          </div>
        </div>

        <div class="p-2 mt-2 dark:text-white">
          <h5 class="text-green-500">Data Riwayat Pendidikan</h5>
          <div class="flex items-center gap-2 mt-2">
            <label for="riwayat_sd" class="w-1/3 align-middle text-sm">Sekolah Dasar (SD)</label>
            <div class="w-2/3">
              <input type="riwayat_sd" class="border  dark:bg-slate-800 rounded-md text-sm w-full px-2 py-1"
                wire:model="riwayat_sd" id="riwayat_sd" value="{{ old('riwayat_sd') }}">
            </div>
          </div>
          <div class="flex items-center gap-2 mt-2">
            <label for="riwayat_smp" class="w-1/3 align-middle text-sm">Sekolah Menengah Pertama (SMP)</label>
            <div class="w-2/3">
              <input type="riwayat_smp" class="border  dark:bg-slate-800 rounded-md text-sm w-full px-2 py-1"
                wire:model="riwayat_smp" id="riwayat_smp" value="{{ old('riwayat_smp') }}">
            </div>
          </div>
          <div class="flex items-center gap-2 mt-2">
            <label for="riwayat_sma" class="w-1/3 align-middle text-sm">Sekolah Menengah Atas (SMA)</label>
            <div class="w-2/3">
              <input type="riwayat_sma" class="border  dark:bg-slate-800 rounded-md text-sm w-full px-2 py-1"
                wire:model="riwayat_sma" id="riwayat_sma" value="{{ old('riwayat_sma') }}">
            </div>
          </div>
          <div class="flex items-center gap-2 mt-2">
            <label for="riwayat_pondok" class="w-1/3 align-middle text-sm">Pondok Pesantren</label>
            <div class="w-2/3">
              <input type="riwayat_pondok" class="border  dark:bg-slate-800 rounded-md text-sm w-full px-2 py-1"
                wire:model="riwayat_pondok" id="riwayat_pondok" value="{{ old('riwayat_pondok') }}">
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
  @script
    <script>
      const inputProvinsi = document.querySelector("#provinsi")
      const inputKotaKab = document.querySelector("#kotakab")
      const inputKecamatan = document.querySelector("#kecamatan")
      const inputDesa = document.querySelector("#desa")

      inputProvinsi.addEventListener('change', function(e) {


        const idProvinsi = $("#provinsi option:selected").data('provinsi')

        inputKotaKab.innerHTML = `<option value="">Pilih Kota / Kabupaten</option>`
        fetch(`https://bustanulmutaallimin.github.io/api-wilayah-indonesia/api/regencies/` + idProvinsi + `.json`)
          .then(response => response.json())
          .then(regencies => regencies.forEach(regence => {
            inputKotaKab.innerHTML += `<option value="` + regence.name + `" data-kotakab="` + regence.id +
              `" class="text-slate-700 dark:text-white text-xs md:text-base">` + regence.name + `</option>`
          }))
      });

      inputKotaKab.addEventListener('change', function(e) {
        const idKotaKab = $("#kotakab option:selected").data("kotakab")
        inputKecamatan.innerHTML = `<option value="">Pilih Kecamatan</option>`
        fetch(`https://bustanulmutaallimin.github.io/api-wilayah-indonesia/api/districts/` + idKotaKab + `.json`)
          .then(response => response.json())
          .then(districts => districts.forEach(district => {
            inputKecamatan.innerHTML += `<option value="` + district.name + `" data-kecamatan="` + district
              .id +
              `" class="text-slate-700 dark:text-white text-xs md:text-base">` + district.name + `</option>`
          }))
      });

      inputKecamatan.addEventListener('change', function(e) {
        const idKecamatan = $("#kecamatan option:selected").data("kecamatan")
        inputDesa.innerHTML = `<option value="">Pilih Desa/Kelurahan</option>`
        fetch(`https://bustanulmutaallimin.github.io/api-wilayah-indonesia/api/villages/` + idKecamatan + `.json`)
          .then(response => response.json())
          .then(villages => villages.forEach(village => {
            inputDesa.innerHTML += `<option value="` + village.name +
              `" class="text-slate-700 dark:text-white text-xs md:text-base">` + village.name + `</option>`
          }));
      });
    </script>
    <script>
      document.addEventListener('livewire:init', () => {
        const inputProvinsi = document.querySelector("#provinsi")
        const inputKotaKab = document.querySelector("#kotakab")
        const inputKecamatan = document.querySelector("#kecamatan")
        const inputDesa = document.querySelector("#desa")

        inputProvinsi.addEventListener('change', function(e) {

          const idProvinsi = $("#provinsi option:selected").data("provinsi")
          inputKotaKab.innerHTML = `<option value="">Pilih Kota / Kabupaten</option>`
          fetch(`https://bustanulmutaallimin.github.io/api-wilayah-indonesia/api/regencies/` + idProvinsi + `.json`)
            .then(response => response.json())
            .then(regencies => regencies.forEach(regence => {
              inputKotaKab.innerHTML += `<option value="` + regence.name + `" data-kotakab="` + regence.id +
                `" class="text-slate-700 dark:text-white text-xs md:text-base">` + regence.name + `</option>`
            }))
        });

        inputKotaKab.addEventListener('change', function(e) {
          const idKotaKab = $("#kotakab option:selected").data("kotakab")
          inputKecamatan.innerHTML = `<option value="">Pilih Kecamatan</option>`
          fetch(`https://bustanulmutaallimin.github.io/api-wilayah-indonesia/api/districts/` + idKotaKab + `.json`)
            .then(response => response.json())
            .then(districts => districts.forEach(district => {
              inputKecamatan.innerHTML += `<option value="` + district.name + `" data-kecamatan="` + district
                .id +
                `" class="text-slate-700 dark:text-white text-xs md:text-base">` + district.name + `</option>`
            }))
        });

        inputKecamatan.addEventListener('change', function(e) {
          const idKecamatan = $("#kecamatan option:selected").data("kecamatan")
          inputDesa.innerHTML = `<option value="">Pilih Desa/Kelurahan</option>`
          fetch(`https://bustanulmutaallimin.github.io/api-wilayah-indonesia/api/villages/` + idKecamatan + `.json`)
            .then(response => response.json())
            .then(villages => villages.forEach(village => {
              inputDesa.innerHTML += `<option value="` + village.name +
                `" class="text-slate-700 dark:text-white text-xs md:text-base">` + village.name + `</option>`
            }));
        });
      });
    </script>
  @endscript
</div>
