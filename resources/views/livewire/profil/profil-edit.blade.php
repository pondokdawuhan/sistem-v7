<div>
  <div>
    <form method="POST" enctype="multipart/form-data" wire:submit.prevent='edit'>
      @csrf
      <div class="bg-white dark:bg-slate-900 rounded-sm p-5 shadow-lg flex flex-wrap gap-5">
        <div class="w-full lg:flex-1">
          <div class="p-2 text-slate-700 dark:text-white">
            <h5 class="mb-3 text-green-500">Data Diri Asatidz</h5>
            <p class="italic text-red-500 text-xs">*Wajib</p>

            <div class="flex items-center dark:text-white gap-2">
              <label for="status" class="w-1/3 align-middle text-sm">Status<span class="text-red-500">*</span></label>
              <div class="w-2/3">
                <select id="status"
                  class="border @error('status')
                  border-red-500
                @enderror border-slate-300 dark:bg-slate-900 rounded-md focus:outline-none focus:border-green-500 focus:border-2 text-sm w-full p-2"
                  wire:model="status">
                  <option value="" class="text-slate-700 dark:text-white text-xs md:text-base">Pilih
                  </option>
                  <option value="GURU TIDAK TETAP (GTT)" class="text-slate-700 dark:text-white text-xs md:text-base">
                    GURU
                    TIDAK TETAP (GTT)
                  </option>
                  <option value="GURU TETAP YAYASAN (GTY)" class="text-slate-700 dark:text-white text-xs md:text-base">
                    GURU
                    TETAP YAYASAN (GTY)
                  </option>
                </select>
                @error('status')
                  <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
              </div>
            </div>

            <div class="flex items-center dark:text-white gap-2 mt-2">
              <label for="aktif" class="w-1/3 align-middle text-sm">Status Aktif<span
                  class="text-red-500">*</span></label>
              <div class="w-2/3">
                <select id="aktif"
                  class="border @error('aktif')
                  border-red-500
                @enderror border-slate-300 dark:bg-slate-900 rounded-md focus:outline-none focus:border-green-500 focus:border-2 text-sm w-full p-2"
                  wire:model="aktif">
                  <option value="" class="text-slate-700 dark:text-white text-xs md:text-base">Pilih
                  </option>
                  <option value="1" class="text-slate-700 dark:text-white text-xs md:text-base">AKTIF</option>
                  <option value="0" class="text-slate-700 dark:text-white text-xs md:text-base">TIDAK AKTIF
                  </option>
                </select>
                @error('aktif')
                  <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
              </div>
            </div>


            <div class="flex items-center dark:text-white gap-2 mt-2">
              <label for="tahun_masuk" class="w-1/3 align-middle text-sm">Tahun Masuk<span
                  class="text-red-500">*</span></label>
              <div class="w-2/3">
                <input type="text"
                  class="border @error('tahun_masuk')
                  border-red-500
                @enderror border-slate-300 dark:bg-slate-900 rounded-md focus:outline-none focus:border-green-500 focus:border-2 text-sm w-full px-2 py-1"
                  wire:model="tahun_masuk" id="tahun_masuk" value="{{ old('tahun_masuk') }}">
                @error('tahun_masuk')
                  <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
              </div>
            </div>

            <div class="flex items-center dark:text-white gap-2 mt-2">
              <label for="niy" class="w-1/3 align-middle text-sm">Nomor Induk Yayasan</label>
              <div class="w-2/3">
                <input type="text"
                  class="border border-slate-300 dark:bg-slate-900 rounded-md focus:outline-none focus:border-green-500 focus:border-2 text-sm w-full px-2 py-1"
                  wire:model="niy" id="niy" value="{{ old('niy') }}">
              </div>
            </div>

            <div class="flex items-center dark:text-white gap-2 mt-2">
              <label for="nuptk" class="w-1/3 align-middle text-sm">NUPTK</label>
              <div class="w-2/3">
                <input type="text"
                  class="border border-slate-300 dark:bg-slate-900 rounded-md focus:outline-none focus:border-green-500 focus:border-2 text-sm w-full px-2 py-1"
                  wire:model="nuptk" id="nuptk" value="{{ old('nuptk') }}">
              </div>
            </div>

            <div class="flex items-center dark:text-white gap-2 mt-2">
              <label for="nik" class="w-1/3 align-middle text-sm">NIK</label>
              <div class="w-2/3">
                <input type="text"
                  class="border border-slate-300 dark:bg-slate-900 rounded-md focus:outline-none focus:border-green-500 focus:border-2 text-sm w-full px-2 py-1"
                  wire:model="nik" id="nik" value="{{ old('nik') }}">
              </div>
            </div>

            <div class="flex items-center dark:text-white gap-2 mt-2">
              <label for="name" class="w-1/3 align-middle text-sm">Nama Lengkap<span
                  class="text-red-500">*</span></label>
              <div class="w-2/3">
                <input type="text"
                  class="border @error('name')
                  border-red-500
                @enderror border-slate-300 dark:bg-slate-900 rounded-md focus:outline-none focus:border-green-500 focus:border-2 text-sm w-full px-2 py-1"
                  wire:model="name" id="name" value="{{ old('name') }}">
                @error('name')
                  <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
              </div>
            </div>

            <div class="flex items-center dark:text-white gap-2 mt-2">
              <label for="jenis_kelamin" class="w-1/3 align-middle text-sm">Jenis Kelamin<span
                  class="text-red-500">*</span></label>
              <div class="w-2/3 flex flex-col">
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
                <div>
                  @error('jenis_kelamin')
                    <p class="text-red-500 text-xs italic">{{ $message }}</p>
                  @enderror
                </div>

              </div>
            </div>

            <div class="flex items-center dark:text-white gap-2 mt-2">
              <label for="tempat_lahir" class="w-1/3 align-middle text-sm">Tempat Lahir</label>
              <div class="w-2/3">
                <input type="text"
                  class="border border-slate-300 dark:bg-slate-900 rounded-md focus:outline-none focus:border-green-500 focus:border-2 text-sm w-full px-2 py-1"
                  wire:model="tempat_lahir" id="tempat_lahir" value="{{ old('tempat_lahir') }}">
              </div>
            </div>

            <div class="flex items-center dark:text-white gap-2 mt-2">
              <label for="tanggal_lahir" class="w-1/3 align-middle text-sm">Tanggal Lahir</label>
              <div class="w-2/3">
                <input type="date"
                  class="border border-slate-300 dark:bg-slate-900 rounded-md focus:outline-none focus:border-green-500 focus:border-2 text-sm w-full px-2 py-1"
                  wire:model="tanggal_lahir" id="tanggal_lahir" value="{{ old('tanggal_lahir') }}">
              </div>
            </div>


            <div class="flex items-center dark:text-white gap-2 mt-2">
              <label for="nama_ibu" class="w-1/3 align-middle text-sm">Nama Ibu Kandung</label>
              <div class="w-2/3">
                <input type="text"
                  class="border border-slate-300 dark:bg-slate-900 rounded-md focus:outline-none focus:border-green-500 focus:border-2 text-sm w-full px-2 py-1"
                  wire:model="nama_ibu" id="nama_ibu" value="{{ old('nama_ibu') }}">
              </div>
            </div>
          </div>

          <div class="p-2 text-slate-700 dark:text-white">
            <h5 class="mb-3 text-green-500">Alamat sesuai KK</h5>


            <div class="flex items-center dark:text-white gap-2">
              <label for="provinsi" class="w-1/3 align-middle text-sm">Provinsi</label>
              <div class="w-2/3">
                <select id="provinsi"
                  class="border border-slate-300 dark:bg-slate-900 rounded-md focus:outline-none focus:border-green-500 focus:border-2 text-sm w-full p-2"
                  wire:model="provinsi">
                  <option value="" class="text-slate-700 dark:text-white text-xs md:text-base">Pilih
                    Provinsi</option>
                  <option data-provinsi="11" class="text-slate-700 dark:text-white text-xs md:text-base">ACEH</option>
                  <option data-provinsi="12" class="text-slate-700 dark:text-white text-xs md:text-base">SUMATERA
                    UTARA
                  </option>
                  <option data-provinsi="13" class="text-slate-700 dark:text-white text-xs md:text-base">SUMATERA
                    BARAT
                  </option>
                  <option data-provinsi="14" class="text-slate-700 dark:text-white text-xs md:text-base">RIAU</option>
                  <option data-provinsi="15" class="text-slate-700 dark:text-white text-xs md:text-base">JAMBI
                  </option>
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
                  <option data-provinsi="71" class="text-slate-700 dark:text-white text-xs md:text-base">SULAWESI
                    UTARA
                  </option>
                  <option data-provinsi="72" class="text-slate-700 dark:text-white text-xs md:text-base">SULAWESI
                    TENGAH
                  </option>
                  <option data-provinsi="73" class="text-slate-700 dark:text-white text-xs md:text-base">SULAWESI
                    SELATAN
                  </option>
                  <option data-provinsi="74" class="text-slate-700 dark:text-white text-xs md:text-base">SULAWESI
                    TENGGARA
                  </option>
                  <option data-provinsi="75" class="text-slate-700 dark:text-white text-xs md:text-base">GORONTALO
                  </option>
                  <option data-provinsi="76" class="text-slate-700 dark:text-white text-xs md:text-base">SULAWESI
                    BARAT
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
                <select id="kotakab"
                  class="border border-slate-300 dark:bg-slate-900 rounded-md focus:outline-none focus:border-green-500 focus:border-2 text-sm w-full p-2"
                  wire:model="kabupaten">
                  <option value="" class="text-slate-700 dark:text-white text-xs md:text-base">
                    {{ $kabupaten }}</option>
                </select>
              </div>
            </div>

            <div class="flex items-center dark:text-white gap-2 mt-2">
              <label for="kecamatan" class="w-1/3 align-middle text-sm">Kecamatan</label>
              <div class="w-2/3">
                <select id="kecamatan"
                  class="border border-slate-300 dark:bg-slate-900 rounded-md focus:outline-none focus:border-green-500 focus:border-2 text-sm w-full p-2"
                  wire:model="kecamatan">
                  <option value="" class="text-slate-700 dark:text-white text-xs md:text-base">
                    {{ $kecamatan }}</option>
                </select>
              </div>
            </div>

            <div class="flex items-center dark:text-white gap-2 mt-2">
              <label for="desa" class="w-1/3 align-middle text-sm">Desa</label>
              <div class="w-2/3">
                <select id="desa"
                  class="border border-slate-300 dark:bg-slate-900 rounded-md focus:outline-none focus:border-green-500 focus:border-2 text-sm w-full p-2"
                  wire:model="desa">
                  <option value="" class="text-slate-700 dark:text-white text-xs md:text-base">
                    {{ $desa }}</option>
                </select>
              </div>
            </div>


            <div class="flex items-center dark:text-white gap-2 mt-2">
              <label for="jalan" class="w-1/3 align-middle text-sm">Jalan</label>
              <div class="w-2/3">
                <input type="text"
                  class="border border-slate-300 dark:bg-slate-900 rounded-md focus:outline-none focus:border-green-500 focus:border-2 text-sm w-full px-2 py-1"
                  wire:model="jalan" id="jalan" value="{{ old('jalan') }}">
              </div>
            </div>

            <div class="flex items-center dark:text-white gap-2 mt-2">
              <label for="dusun" class="w-1/3 align-middle text-sm">Dusun</label>
              <div class="w-2/3">
                <input type="text"
                  class="border border-slate-300 dark:bg-slate-900 rounded-md focus:outline-none focus:border-green-500 focus:border-2 text-sm w-full px-2 py-1"
                  wire:model="dusun" id="dusun" value="{{ old('dusun') }}">
              </div>
            </div>

            <div class="flex items-center dark:text-white gap-2 mt-2">
              <label for="rt" class="w-1/3 align-middle text-sm">RT</label>
              <div class="w-2/3">
                <input type="text"
                  class="border border-slate-300 dark:bg-slate-900 rounded-md focus:outline-none focus:border-green-500 focus:border-2 text-sm w-full px-2 py-1"
                  wire:model="rt" id="rt" value="{{ old('rt') }}">
              </div>
            </div>

            <div class="flex items-center dark:text-white gap-2 mt-2">
              <label for="rw" class="w-1/3 align-middle text-sm">RW</label>
              <div class="w-2/3">
                <input type="text"
                  class="border border-slate-300 dark:bg-slate-900 rounded-md focus:outline-none focus:border-green-500 focus:border-2 text-sm w-full px-2 py-1"
                  wire:model="rw" id="rw" value="{{ old('rw') }}">
              </div>
            </div>

            <div class="flex items-center dark:text-white gap-2 mt-2">
              <label for="kodepos" class="w-1/3 align-middle text-sm">Kode Pos</label>
              <div class="w-2/3">
                <input type="text"
                  class="border border-slate-300 dark:bg-slate-900 rounded-md focus:outline-none focus:border-green-500 focus:border-2 text-sm w-full px-2 py-1"
                  wire:model="kodepos" id="kodepos" value="{{ old('kodepos') }}">
              </div>
            </div>

          </div>
        </div>
        <div class="w-full lg:flex-1">
          <div class="p-2 text-slate-700 dark:text-white">
            <h5 class="text-green-500">Riwayat Pendidikan</h5>
            <p class="italic text-red-500 text-xs">Nama lembaga, tahun masuk, tahun keluar, Contoh: SMP Bustanul
              (2009, 2012)</p>


            <div class="flex items-center dark:text-white gap-2 mt-2">
              <label for="riwayat_sd" class="w-1/3 align-middle text-sm">Sekolah Dasar (SD)</label>
              <div class="w-2/3">
                <input type="text"
                  class="border border-slate-300 dark:bg-slate-900 rounded-md focus:outline-none focus:border-green-500 focus:border-2 text-sm w-full px-2 py-1"
                  wire:model="riwayat_sd" id="riwayat_sd" value="{{ old('riwayat_sd') }}">
              </div>
            </div>

            <div class="flex items-center dark:text-white gap-2 mt-2">
              <label for="riwayat_smp" class="w-1/3 align-middle text-sm">SMP/MTs/ Sederajat </label>
              <div class="w-2/3">
                <input type="text"
                  class="border border-slate-300 dark:bg-slate-900 rounded-md focus:outline-none focus:border-green-500 focus:border-2 text-sm w-full px-2 py-1"
                  wire:model="riwayat_smp" id="riwayat_smp" value="{{ old('riwayat_smp') }}">
              </div>
            </div>

            <div class="flex items-center dark:text-white gap-2 mt-2">
              <label for="riwayat_sma" class="w-1/3 align-middle text-sm">SMA/MA/SMK Sederajat</label>
              <div class="w-2/3">
                <input type="text"
                  class="border border-slate-300 dark:bg-slate-900 rounded-md focus:outline-none focus:border-green-500 focus:border-2 text-sm w-full px-2 py-1"
                  wire:model="riwayat_sma" id="riwayat_sma" value="{{ old('riwayat_sma') }}">
              </div>
            </div>

            <div class="flex items-center dark:text-white gap-2 mt-2">
              <label for="riwayat_kuliah_s1" class="w-1/3 align-middle text-sm">S1</label>
              <div class="w-2/3">
                <input type="text"
                  class="border border-slate-300 dark:bg-slate-900 rounded-md focus:outline-none focus:border-green-500 focus:border-2 text-sm w-full px-2 py-1"
                  wire:model="riwayat_kuliah_s1" id="riwayat_kuliah_s1" value="{{ old('riwayat_kuliah_s1') }}">
              </div>
            </div>

            <div class="flex items-center dark:text-white gap-2 mt-2">
              <label for="riwayat_kuliah_s2" class="w-1/3 align-middle text-sm">S2</label>
              <div class="w-2/3">
                <input type="text"
                  class="border border-slate-300 dark:bg-slate-900 rounded-md focus:outline-none focus:border-green-500 focus:border-2 text-sm w-full px-2 py-1"
                  wire:model="riwayat_kuliah_s2" id="riwayat_kuliah_s2" value="{{ old('riwayat_kuliah_s2') }}">
              </div>
            </div>

            <div class="flex items-center dark:text-white gap-2 mt-2">
              <label for="riwayat_kuliah_s3" class="w-1/3 align-middle text-sm">S3</label>
              <div class="w-2/3">
                <input type="text"
                  class="border border-slate-300 dark:bg-slate-900 rounded-md focus:outline-none focus:border-green-500 focus:border-2 text-sm w-full px-2 py-1"
                  wire:model="riwayat_kuliah_s3" id="riwayat_kuliah_s3" value="{{ old('riwayat_kuliah_s3') }}">
              </div>
            </div>

            <div class="flex items-center dark:text-white gap-2 mt-2">
              <label for="riwayat_pondok" class="w-1/3 align-middle text-sm">Pondok Pesantren</label>
              <div class="w-2/3">
                <input type="text"
                  class="border border-slate-300 dark:bg-slate-900 rounded-md focus:outline-none focus:border-green-500 focus:border-2 text-sm w-full px-2 py-1"
                  wire:model="riwayat_pondok" id="riwayat_pondok" value="{{ old('riwayat_pondok') }}">
              </div>
            </div>



          </div>

          <div class="p-2 mt-2">
            <h5 class="text-green-500">Data Media Sosial</h5>


            <div class="flex items-center dark:text-white gap-2 mt-2">
              <label for="no_hp" class="w-1/3 align-middle text-sm">Nomor HP<span
                  class="text-red-500">*</span></label>
              <div class="w-2/3">
                <input type="text"
                  class="border @error('no_hp')
                  border-red-500
                @enderror border-slate-300 dark:bg-slate-900 rounded-md focus:outline-none focus:border-green-500 focus:border-2 text-sm w-full px-2 py-1"
                  wire:model="no_hp" id="no_hp" value="{{ old('no_hp') }}">
                @error('no_hp')
                  <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
              </div>
            </div>

            <div class="flex items-center dark:text-white gap-2 mt-2">
              <label for="email" class="w-1/3 align-middle text-sm">Email</label>
              <div class="w-2/3">
                <input type="text"
                  class="border @error('email')
                  border-red-500
                @enderror border-slate-300 dark:bg-slate-900 rounded-md focus:outline-none focus:border-green-500 focus:border-2 text-sm w-full px-2 py-1"
                  wire:model="email" id="email" value="{{ old('email') }}">
                @error('email')
                  <p class="text-red-500 text-xs italic">{{ $message }}</p>
                @enderror
              </div>
            </div>
          </div>
        </div>
      </div>

      <div class="flex mt-3 gap-3">
        <div class="mx-auto">
          <button type="submit"
            class=" px-3 py-1 bg-green-500 text-white rounded-md hover:scale-105 transition duration-300">Ubah</button>
          <a href="/profil/{{ auth()->user()->username }}" wire:navigate
            class="inline-block px-3 py-1 bg-slate-500 text-white rounded-md hover:scale-105 transition duration-300">Kembali</a>
        </div>
      </div>

    </form>
    <x-loading></x-loading>
    <input type="hidden" id="dataStudent"
      data-kotakabStudent="@if ($user->dataUser) {{ $user->dataUser->kabupaten }} @endif"
      data-kecamatanStudent="@if ($user->dataUser) {{ $user->dataUser->kecamatan }} @endif"
      data-desaStudent="@if ($user->dataUser) {{ $user->dataUser->desa }} @endif">

    @script()
      <script>
        const inputProvinsi = document.querySelector("#provinsi")
        const inputKotaKab = document.querySelector("#kotakab")
        const inputKecamatan = document.querySelector("#kecamatan")
        const inputDesa = document.querySelector("#desa")

        const kotakabStudent = document.querySelector('#dataStudent').getAttribute('data-kotakabStudent')
        const kecamatanStudent = document.querySelector('#dataStudent').getAttribute('data-kecamatanStudent')
        const desaStudent = document.querySelector('#dataStudent').getAttribute('data-desaStudent')

        inputKotaKab.innerHTML = `<option value="` + kotakabStudent + `">` + kotakabStudent + `</option>`
        inputKecamatan.innerHTML = `<option value="` + kecamatanStudent + `">` + kecamatanStudent + `</option>`
        inputDesa.innerHTML = `<option value="` + desaStudent + `">` + desaStudent + `</option>`


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

          const kotakabStudent = document.querySelector('#dataStudent').getAttribute('data-kotakabStudent')
          const kecamatanStudent = document.querySelector('#dataStudent').getAttribute('data-kecamatanStudent')
          const desaStudent = document.querySelector('#dataStudent').getAttribute('data-desaStudent')

          inputKotaKab.innerHTML = `<option value="` + kotakabStudent + `">` + kotakabStudent + `</option>`
          inputKecamatan.innerHTML = `<option value="` + kecamatanStudent + `">` + kecamatanStudent + `</option>`
          inputDesa.innerHTML = `<option value="` + desaStudent + `">` + desaStudent + `</option>`


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
        });
      </script>
    @endscript
  </div>
</div>
