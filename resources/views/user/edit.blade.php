@extends('templates.main')
@section('container')
  <form action="/user/{{ $user->username }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('put')

    @if ($user->dataUser)
      <input type="hidden" name="foto_lama" value="{{ $user->dataUser->foto }}">
      <input type="hidden" name="usernameLama" value="{{ $user->username }}">
    @endif

    <div class="bg-white dark:bg-slate-900 dark:text-white rounded-sm p-5 shadow-lg flex flex-wrap gap-5">
      <div class="w-full lg:flex-1">
        <div class="p-2 text-slate-700 dark:text-white">
          <h5 class="mb-3 text-green-500">Data Diri Asatidz</h5>
          <p class="italic text-red-500 text-xs">*Wajib</p>

          <div class="flex items-center gap-2">
            <label for="status" class="w-1/3 align-middle text-sm">Status<span class="text-red-500">*</span></label>
            <div class="w-2/3">
              <select id="status"
                class="border border-slate-300 dark:bg-slate-900 rounded-md focus:outline-none focus:border-green-500 focus:border-2 text-sm w-full p-2 @error('status')
                                    is-invalid
                                @enderror"
                name="status" required>
                <option value="" class="text-slate-700 dark:text-white text-xs md:text-base">Pilih
                </option>
                <option value="GURU TIDAK TETAP (GTT)" class="text-slate-700 dark:text-white text-xs md:text-base"
                  @if ($user->dataUser) @if ($user->dataUser->status == 'GURU TIDAK TETAP (GTT)')
                                        selected @endif
                  @endif>GURU
                  TIDAK TETAP (GTT)
                </option>
                <option value="GURU TETAP YAYASAN (GTY)"
                  class="text-slate-700 dark:text-white text-xs md:text-base"@if ($user->dataUser) @if ($user->dataUser->status == 'GURU TETAP YAYASAN (GTY)')
                                    selected @endif
                  @endif>GURU
                  TETAP YAYASAN (GTY)
                </option>
              </select>
              @error('status')
                <p class="text-red-500 italic text-xs">{{ $message }}</p>
              @enderror
            </div>
          </div>


          <div class="flex items-center dark:text-white gap-2">
            <label for="aktif" class="w-1/3 align-middle text-sm">Status Aktif<span
                class="text-red-500">*</span></label>
            <div class="w-2/3">
              <select id="aktif"
                class="border border-slate-300 dark:bg-slate-900 rounded-md focus:outline-none focus:border-green-500 focus:border-2 text-sm w-full p-2"
                name="aktif" required>
                <option value="" class="text-slate-700 dark:text-white text-xs md:text-base">Pilih
                </option>
                <option value="1" class="text-slate-700 dark:text-white text-xs md:text-base"
                  @if ($user->dataUser) @if ($user->dataUser->aktif == true)
                    selected @endif
                  @endif>AKTIF</option>
                <option value="0" class="text-slate-700 dark:text-white text-xs md:text-base"
                  @if ($user->dataUser) @if ($user->dataUser->aktif == false)
                    selected @endif
                  @endif>TIDAK AKTIF</option>
              </select>
            </div>
          </div>


          <div class="flex items-center gap-2 mt-2">
            <label for="tahun_masuk" class="w-1/3 align-middle text-sm">Tahun Masuk<span
                class="text-red-500">*</span></label>
            <div class="w-2/3">
              <input type="text"
                class="border border-slate-300 dark:bg-slate-900 rounded-md focus:outline-none focus:border-green-500 focus:border-2 text-sm w-full px-2 py-1 @error('tahun_masuk')
                                    is-invalid
                                @enderror"
                name="tahun_masuk" id="tahun_masuk"
                @if (old('tahun_masuk')) value="{{ old('tahun_masuk') }}"
                                    @else
                                    @if ($user->dataUser)
                                        value="{{ $user->dataUser->tahun_masuk }}" @endif
                value="" @endif
              required>
              @error('tahun_masuk')
                <p class="text-red-500 italic text-xs">{{ $message }}</p>
              @enderror
            </div>
          </div>

          <div class="flex items-center gap-2 mt-2">
            <label for="niy" class="w-1/3 align-middle text-sm">Nomor Induk Yayasan</label>
            <div class="w-2/3">
              <input type="text"
                class="border border-slate-300 dark:bg-slate-900 rounded-md focus:outline-none focus:border-green-500 focus:border-2 text-sm w-full px-2 py-1"
                name="niy" id="niy"
                @if (old('niy')) value="{{ old('niy') }}"
                                    @else
                                    @if ($user->dataUser)
                                        value="{{ $user->dataUser->niy }}" @endif
                value="" @endif>
            </div>
          </div>

          <div class="flex items-center gap-2 mt-2">
            <label for="nuptk" class="w-1/3 align-middle text-sm">NUPTK</label>
            <div class="w-2/3">
              <input type="text"
                class="border border-slate-300 dark:bg-slate-900 rounded-md focus:outline-none focus:border-green-500 focus:border-2 text-sm w-full px-2 py-1"
                name="nuptk" id="nuptk"
                @if (old('nuptk')) value="{{ old('nuptk') }}"
                                    @else
                                    @if ($user->dataUser)
                                        value="{{ $user->dataUser->nuptk }}" @endif
                value="" @endif>
            </div>
          </div>

          <div class="flex items-center gap-2 mt-2">
            <label for="nik" class="w-1/3 align-middle text-sm">NIK</label>
            <div class="w-2/3">
              <input type="text"
                class="border border-slate-300 dark:bg-slate-900 rounded-md focus:outline-none focus:border-green-500 focus:border-2 text-sm w-full px-2 py-1"
                name="nik" id="nik"
                @if (old('nik')) value="{{ old('nik') }}"
                                    @else
                                    @if ($user->dataUser)
                                        value="{{ $user->dataUser->nik }}" @endif
                value="" @endif>
            </div>
          </div>

          <div class="flex items-center gap-2 mt-2">
            <label for="name" class="w-1/3 align-middle text-sm">Nama Lengkap<span
                class="text-red-500">*</span></label>
            <div class="w-2/3">
              <input type="text"
                class="border border-slate-300 dark:bg-slate-900 rounded-md focus:outline-none focus:border-green-500 focus:border-2 text-sm w-full px-2 py-1"
                name="name" id="name"
                @if (old('name')) value="{{ old('name') }}"
                                    @else
                                    
                                        value="{{ $user->name }}" @endif
                required>
            </div>
          </div>

          <div class="flex items-center gap-2 mt-2">
            <label for="jenis_kelamin" class="w-1/3 align-middle text-sm">Jenis Kelamin<span
                class="text-red-500">*</span></label>
            <div class="w-2/3 flex">

              <div class="form-check">
                <input type="radio" class="form-check-input" id="Laki-laki" name="jenis_kelamin" value="Laki-laki" /
                  @if ($user->dataUser) @if ($user->dataUser->jenis_kelamin == 'Laki-laki')
                                        checked @endif
                  @endif>
                <label class="form-check-label mb-0" for="Laki-laki">Laki-laki</label>
              </div>

              <div class="ml-3">
                <input type="radio" class="form-check-input" id="Perempuan" name="jenis_kelamin" value="Perempuan"
                  /
                  @if ($user->dataUser) @if ($user->dataUser->jenis_kelamin == 'Perempuan')
                                    checked @endif
                  @endif>
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
                @if (old('tempat_lahir')) value="{{ old('tempat_lahir') }}"
                                    @else
                                    @if ($user->dataUser)
                                        value="{{ $user->dataUser->tempat_lahir }}" @endif
                value="" @endif>
            </div>
          </div>

          <div class="flex items-center gap-2 mt-2">
            <label for="tanggal_lahir" class="w-1/3 align-middle text-sm">Tanggal Lahir</label>
            <div class="w-2/3">
              <input type="date"
                class="border border-slate-300 dark:bg-slate-900 rounded-md focus:outline-none focus:border-green-500 focus:border-2 text-sm w-full px-2 py-1"
                name="tanggal_lahir" id="tanggal_lahir"
                @if (old('tanggal_lahir')) value="{{ old('tanggal_lahir') }}"
                                    @else
                                    @if ($user->dataUser)
                                        value="{{ $user->dataUser->tanggal_lahir }}" @endif
                value="" @endif>
            </div>
          </div>


          <div class="flex items-center gap-2 mt-2">
            <label for="nama_ibu" class="w-1/3 align-middle text-sm">Nama Ibu Kandung</label>
            <div class="w-2/3">
              <input type="text"
                class="border border-slate-300 dark:bg-slate-900 rounded-md focus:outline-none focus:border-green-500 focus:border-2 text-sm w-full px-2 py-1"
                name="nama_ibu" id="nama_ibu"
                @if (old('nama_ibu')) value="{{ old('nama_ibu') }}"
                                    @else
                                    @if ($user->dataUser)
                                        value="{{ $user->dataUser->nama_ibu }}" @endif
                value="" @endif>
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
              <p class="italic text-xs">ukuran maksimal 1MB</p>

              @error('foto')
                <p class="italic text-xs text-red-500">{{ $message }}</p>
              @enderror

              @if ($user->dataUser)

                @if ($user->dataUser->foto)
                  <img src="{{ asset('storage/' . $user->dataUser->foto) }}" alt=""
                    class="img-preview w-34 lg:w-42">
                @else
                  <img src="" alt="" class="img-preview w-34 lg:w-42">
                @endif
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
                @if (old('jalan')) value="{{ old('jalan') }}"
                                    @else
                                    @if ($user->dataUser)
                                        value="{{ $user->dataUser->jalan }}" @endif
                value="" @endif>
            </div>
          </div>

          <div class="flex items-center gap-2 mt-2">
            <label for="dusun" class="w-1/3 align-middle text-sm">Dusun</label>
            <div class="w-2/3">
              <input type="text"
                class="border border-slate-300 dark:bg-slate-900 rounded-md focus:outline-none focus:border-green-500 focus:border-2 text-sm w-full px-2 py-1"
                name="dusun" id="dusun"
                @if (old('dusun')) value="{{ old('dusun') }}"
                                    @else
                                    @if ($user->dataUser)
                                        value="{{ $user->dataUser->dusun }}" @endif
                value="" @endif>
            </div>
          </div>

          <div class="flex items-center gap-2 mt-2">
            <label for="rt" class="w-1/3 align-middle text-sm">RT</label>
            <div class="w-2/3">
              <input type="text"
                class="border border-slate-300 dark:bg-slate-900 rounded-md focus:outline-none focus:border-green-500 focus:border-2 text-sm w-full px-2 py-1"
                name="rt" id="rt"
                @if (old('rt')) value="{{ old('rt') }}"
                                    @else
                                    @if ($user->dataUser)
                                        value="{{ $user->dataUser->rt }}" @endif
                value="" @endif>
            </div>
          </div>

          <div class="flex items-center gap-2 mt-2">
            <label for="rw" class="w-1/3 align-middle text-sm">RW</label>
            <div class="w-2/3">
              <input type="text"
                class="border border-slate-300 dark:bg-slate-900 rounded-md focus:outline-none focus:border-green-500 focus:border-2 text-sm w-full px-2 py-1"
                name="rw" id="rw"
                @if (old('rw')) value="{{ old('rw') }}"
                                    @else
                                    @if ($user->dataUser)
                                        value="{{ $user->dataUser->rw }}" @endif
                value="" @endif>
            </div>
          </div>

          <div class="flex items-center gap-2 mt-2">
            <label for="kodepos" class="w-1/3 align-middle text-sm">Kode Pos</label>
            <div class="w-2/3">
              <input type="text"
                class="border border-slate-300 dark:bg-slate-900 rounded-md focus:outline-none focus:border-green-500 focus:border-2 text-sm w-full px-2 py-1"
                name="kodepos" id="kodepos"
                @if (old('kodepos')) value="{{ old('kodepos') }}"
                                    @else
                                    @if ($user->dataUser)
                                        value="{{ $user->dataUser->kodepos }}" @endif
                value="" @endif>
            </div>
          </div>

        </div>
      </div>
      <div class="w-full lg:flex-1">
        <div class="p-2 text-slate-700 dark:text-white">
          <h5 class="text-green-500">Riwayat Pendidikan</h5>
          <p class="italic text-red-500 text-xs">Nama lembaga, tahun masuk, tahun keluar, Contoh: SMP Bustanul
            (2009, 2012)</p>


          <div class="flex items-center gap-2 mt-2">
            <label for="riwayat_sd" class="w-1/3 align-middle text-sm">Sekolah Dasar (SD)</label>
            <div class="w-2/3">
              <input type="text"
                class="border border-slate-300 dark:bg-slate-900 rounded-md focus:outline-none focus:border-green-500 focus:border-2 text-sm w-full px-2 py-1"
                name="riwayat_sd" id="riwayat_sd"
                @if (old('riwayat_sd')) value="{{ old('riwayat_sd') }}"
                                    @else
                                    @if ($user->dataUser)
                                        value="{{ $user->dataUser->riwayat_sd }}" @endif
                value="" @endif>
            </div>
          </div>

          <div class="flex items-center gap-2 mt-2">
            <label for="riwayat_smp" class="w-1/3 align-middle text-sm">SMP/MTs/ Sederajat </label>
            <div class="w-2/3">
              <input type="text"
                class="border border-slate-300 dark:bg-slate-900 rounded-md focus:outline-none focus:border-green-500 focus:border-2 text-sm w-full px-2 py-1"
                name="riwayat_smp" id="riwayat_smp"
                @if (old('riwayat_smp')) value="{{ old('riwayat_smp') }}"
                                    @else
                                    @if ($user->dataUser)
                                        value="{{ $user->dataUser->riwayat_smp }}" @endif
                value="" @endif>
            </div>
          </div>

          <div class="flex items-center gap-2 mt-2">
            <label for="riwayat_sma" class="w-1/3 align-middle text-sm">SMA/MA/SMK Sederajat</label>
            <div class="w-2/3">
              <input type="text"
                class="border border-slate-300 dark:bg-slate-900 rounded-md focus:outline-none focus:border-green-500 focus:border-2 text-sm w-full px-2 py-1"
                name="riwayat_sma" id="riwayat_sma"
                @if (old('riwayat_sma')) value="{{ old('riwayat_sma') }}"
                                    @else
                                    @if ($user->dataUser)
                                        value="{{ $user->dataUser->riwayat_sma }}" @endif
                value="" @endif>
            </div>
          </div>

          <div class="flex items-center gap-2 mt-2">
            <label for="riwayat_kuliah_s1" class="w-1/3 align-middle text-sm">S1</label>
            <div class="w-2/3">
              <input type="text"
                class="border border-slate-300 dark:bg-slate-900 rounded-md focus:outline-none focus:border-green-500 focus:border-2 text-sm w-full px-2 py-1"
                name="riwayat_kuliah_s1" id="riwayat_kuliah_s1"
                @if (old('riwayat_kuliah_s1')) value="{{ old('riwayat_kuliah_s1') }}"
                                    @else
                                    @if ($user->dataUser)
                                        value="{{ $user->dataUser->riwayat_kuliah_s1 }}" @endif
                value="" @endif>
            </div>
          </div>

          <div class="flex items-center gap-2 mt-2">
            <label for="riwayat_kuliah_s2" class="w-1/3 align-middle text-sm">S2</label>
            <div class="w-2/3">
              <input type="text"
                class="border border-slate-300 dark:bg-slate-900 rounded-md focus:outline-none focus:border-green-500 focus:border-2 text-sm w-full px-2 py-1"
                name="riwayat_kuliah_s2" id="riwayat_kuliah_s2"
                @if (old('riwayat_kuliah_s2')) value="{{ old('riwayat_kuliah_s2') }}"
                                    @else
                                    @if ($user->dataUser)
                                        value="{{ $user->dataUser->riwayat_kuliah_s2 }}" @endif
                value="" @endif>
            </div>
          </div>

          <div class="flex items-center gap-2 mt-2">
            <label for="riwayat_kuliah_s3" class="w-1/3 align-middle text-sm">S3</label>
            <div class="w-2/3">
              <input type="text"
                class="border border-slate-300 dark:bg-slate-900 rounded-md focus:outline-none focus:border-green-500 focus:border-2 text-sm w-full px-2 py-1"
                name="riwayat_kuliah_s3" id="riwayat_kuliah_s3"
                @if (old('riwayat_kuliah_s3')) value="{{ old('riwayat_kuliah_s3') }}"
                                    @else
                                    @if ($user->dataUser)
                                        value="{{ $user->dataUser->riwayat_kuliah_s3 }}" @endif
                value="" @endif>
            </div>
          </div>

          <div class="flex items-center gap-2 mt-2">
            <label for="riwayat_pondok" class="w-1/3 align-middle text-sm">Pondok Pesantren</label>
            <div class="w-2/3">
              <input type="text"
                class="border border-slate-300 dark:bg-slate-900 rounded-md focus:outline-none focus:border-green-500 focus:border-2 text-sm w-full px-2 py-1"
                name="riwayat_pondok" id="riwayat_pondok"
                @if (old('riwayat_pondok')) value="{{ old('riwayat_pondok') }}"
                                    @else
                                    @if ($user->dataUser)
                                        value="{{ $user->dataUser->riwayat_pondok }}" @endif
                value="" @endif>
            </div>
          </div>



        </div>

        <div class="p-2 mt-2">
          <h5 class="text-green-500">Data Media Sosial</h5>


          <div class="flex items-center gap-2 mt-2">
            <label for="no_hp" class="w-1/3 align-middle text-sm">Nomor HP<span
                class="text-red-500">*</span></label>
            <div class="w-2/3">
              <input type="text"
                class="border border-slate-300 dark:bg-slate-900 rounded-md focus:outline-none focus:border-green-500 focus:border-2 text-sm w-full px-2 py-1"
                name="no_hp" id="no_hp"
                @if (old('no_hp')) value="{{ old('no_hp') }}"
                                    @else
                                    @if ($user->dataUser)
                                        value="{{ substr_replace($user->dataUser->no_hp, '0', 0, 2) }}" @endif
                value="" @endif
              >
            </div>
          </div>

          <div class="flex items-center gap-2 mt-2">
            <label for="email" class="w-1/3 align-middle text-sm">Email</label>
            <div class="w-2/3">
              <input type="text"
                class="border border-slate-300 dark:bg-slate-900 rounded-md focus:outline-none focus:border-green-500 focus:border-2 text-sm w-full px-2 py-1"
                name="email" id="email"
                @if (old('email')) value="{{ old('email') }}"
                                    @else
                                    value="{{ $user->email }}" @endif>
            </div>
          </div>

          <div class="mt-5">
            <div class="flex">
              @can('Super Admin')
                <div class="w-full lg:w-1/2">
                  <h5 class="text-green-500">Role User<span class="text-red-500">*</span></h5>

                  @foreach ($roles as $role)
                    <div class="flex items-center mb-4">
                      <input id="role{{ $role->id }}" type="checkbox" value="{{ $role->name }}"
                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                        name="roles[]" @if ($user->hasRole($role->name)) checked @endif>
                      <label for="role{{ $role->id }}"
                        class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $role->name }}</label>
                    </div>
                  @endforeach
                </div>
              @endcan

              <div class="w-full lg:w-1/2">
                <h5 class="text-green-500">Lembaga Mengajar<span class="text-red-500">*</span></h5>

                @foreach ($lembagas as $lembaga)
                  <div class="flex items-center mb-4">
                    <input id="{{ $lembaga->id }}" type="checkbox" value="{{ $lembaga->id }}"
                      class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600"
                      name="lembagas[]" @if (in_array($lembaga->id, $lembagaUser)) checked @endif>
                    <label for="{{ $lembaga->id }}"
                      class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{ $lembaga->name }}</label>
                  </div>
                @endforeach

                <div class="min-w-full mt-5">
                  <h5 class="text-green-500">Notifikasi Khusus</h5>

                  <div class="flex flex-wrap">

                    <div class="w-full">
                      <p class="text-slate-700 dark:text-white font-semibold">Nama Role</p>

                      <div class="flex items-center dark:text-white gap-2 mt-2">
                        <div class="block min-h-6 pl-2">
                          <select name="notifikasiKhusus" id="notifikasiKhusus"
                            class="px-3 py-1 rounded-md dark:bg-slate-800 dark:text-white">
                            <option value="">pilih</option>
                            <option value="Pengasuh"
                              @if ($user->dataUser) @if ($user->dataUser->notifikasiKhusus == 'Pengasuh') selected @endif
                              @endif>Pengasuh
                            </option>
                            <option value="Ketua Asrama Putra"
                              @if ($user->dataUser) @if ($user->dataUser->notifikasiKhusus == 'Ketua Asrama Putra') selected @endif
                              @endif>Ketua
                              Asrama Putra</option>
                            <option value="Ketua Asrama Putri"
                              @if ($user->dataUser) @if ($user->dataUser->notifikasiKhusus == 'Ketua Asrama Putri') selected @endif
                              @endif>Ketua
                              Asrama Putri</option>
                            <option value="Kepala SMP"
                              @if ($user->dataUser) @if ($user->dataUser->notifikasiKhusus == 'Kepala SMP') selected @endif
                              @endif>Kepala SMP
                            </option>
                            <option value="Kepala MA"
                              @if ($user->dataUser) @if ($user->dataUser->notifikasiKhusus == 'Kepala MA') selected @endif
                              @endif>Kepala MA
                            </option>
                            <option value="Kepala MADIN"
                              @if ($user->dataUser) @if ($user->dataUser->notifikasiKhusus == 'Kepala MADIN') selected @endif
                              @endif>Kepala MADIN
                            </option>
                            <option value="Kepala MMQ"
                              @if ($user->dataUser) @if ($user->dataUser->notifikasiKhusus == 'Kepala MMQ') selected @endif
                              @endif>Kepala MMQ
                            </option>
                            <option value="Kurikulum SMP"
                              @if ($user->dataUser) @if ($user->dataUser->notifikasiKhusus == 'Kurikulum SMP') selected @endif
                              @endif>Kurikulum
                              SMP</option>
                            <option value="Kurikulum MA"
                              @if ($user->dataUser) @if ($user->dataUser->notifikasiKhusus == 'Kurikulum MA') selected @endif
                              @endif>Kurikulum MA
                            </option>
                            <option value="Kurikulum MADIN"
                              @if ($user->dataUser) @if ($user->dataUser->notifikasiKhusus == 'Kurikulum MADIN') selected @endif
                              @endif>Kurikulum
                              MADIN</option>
                            <option value="Kurikulum MMQ"
                              @if ($user->dataUser) @if ($user->dataUser->notifikasiKhusus == 'Kurikulum MMQ') selected @endif
                              @endif>Kurikulum
                              MMQ</option>
                          </select>
                        </div>
                      </div>
                    </div>

                  </div>

                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="bg-white dark:bg-slate-900 dark:text-white rounded-sm p-5 shadow-lg flex flex-wrap gap-5 mt-5">
      <div class="min-w-full">
        <h5 class="text-green-500">Kelas Mengajar</h5>

        <div class="flex flex-wrap">

          <div class="w-full lg:w-1/5">
            <p class="text-slate-700 dark:text-white font-semibold">Kelas SMP</p>
            @foreach ($kelasSmp as $smp)
              <div class="flex items-center dark:text-white gap-2 mt-2">
                <div class="block min-h-6 pl-2">
                  <label>
                    <input id="{{ $smp->name }}" class="checkbox bg-white checkbox-success" type="checkbox" /
                      name="kelasSmp[]" value="{{ $smp->id }}"
                      @if ($kelasUserSmp) @if (in_array($smp->id, $kelasUserSmp)) checked @endif @endif>
                    <label for="{{ $smp->name }}"
                      class="cursor-pointer select-none text-slate-700 dark:text-white text-sm">{{ $smp->name }}</label>
                  </label>
                </div>
              </div>
            @endforeach
          </div>
          <div class="w-full lg:w-1/5">
            <p class="text-slate-700 dark:text-white font-semibold">Kelas MA</p>
            @foreach ($kelasMa as $ma)
              <div class="flex items-center dark:text-white gap-2 mt-2">
                <div class="block min-h-6 pl-2">
                  <label>
                    <input id="{{ $ma->name }}" class="checkbox bg-white checkbox-success" type="checkbox" /
                      name="kelasMa[]" value="{{ $ma->id }}"
                      @if ($kelasUserMa) @if (in_array($ma->id, $kelasUserMa)) checked @endif @endif>
                    <label for="{{ $ma->name }}"
                      class="cursor-pointer select-none text-slate-700 dark:text-white text-sm">{{ $ma->name }}</label>
                  </label>
                </div>
              </div>
            @endforeach
          </div>

          <div class="w-full lg:w-1/5">
            <p class="text-slate-700 dark:text-white font-semibold">Kelas Madin</p>
            @foreach ($kelasMadin as $madin)
              <div class="flex items-center dark:text-white gap-2 mt-2">
                <div class="block min-h-6 pl-2">
                  <label>
                    <input id="{{ $madin->name }}" class="checkbox bg-white checkbox-success" type="checkbox" /
                      name="kelasMadin[]" value="{{ $madin->id }}"
                      @if ($kelasUserMadin) @if (in_array($madin->id, $kelasUserMadin)) checked @endif @endif>
                    <label for="{{ $madin->name }}"
                      class="cursor-pointer select-none text-slate-700 dark:text-white text-sm">{{ $madin->name }}</label>
                  </label>
                </div>
              </div>
            @endforeach
          </div>

          <div class="w-full lg:w-1/5">
            <p class="text-slate-700 dark:text-white font-semibold">Kelas MMQ</p>
            @foreach ($kelasMmq as $mmq)
              <div class="flex items-center dark:text-white gap-2 mt-2">
                <div class="block min-h-6 pl-2">
                  <label>
                    <input id="{{ $mmq->name }}" class="checkbox bg-white checkbox-success" type="checkbox" /
                      name="kelasMmq[]" value="{{ $mmq->id }}"
                      @if ($kelasUserMmq) @if (in_array($mmq->id, $kelasUserMmq)) checked @endif @endif>
                    <label for="{{ $mmq->name }}"
                      class="cursor-pointer select-none text-slate-700 dark:text-white text-sm">{{ $mmq->name }}</label>
                  </label>
                </div>
              </div>
            @endforeach
          </div>

          <div class="w-full lg:w-1/5">
            <p class="text-slate-700 dark:text-white font-semibold">Kamar</p>
            @foreach ($kamars as $kamar)
              <div class="flex items-center dark:text-white gap-2 mt-2">
                <div class="block min-h-6 pl-2">
                  <label>
                    <input id="{{ $kamar->name }}" class="checkbox bg-white checkbox-success" type="checkbox" /
                      name="kamar[]" value="{{ $kamar->id }}"
                      @if ($kamarUser) @if (in_array($kamar->id, $kamarUser)) checked @endif @endif>
                    <label for="{{ $kamar->name }}"
                      class="cursor-pointer select-none text-slate-700 dark:text-white text-sm">{{ $kamar->name }}
                      ({{ $kamar->untuk }})</label>
                  </label>
                </div>
              </div>
            @endforeach
          </div>
        </div>
      </div>

      <div class="min-w-full mt-3">
        <h5 class="text-green-500">Mapel Mengajar</h5>

        <div class="flex flex-wrap gap-3 lg:gap-0">

          <div class="w-full lg:w-1/4">
            <p class="text-slate-700 dark:text-white font-semibold">Mapel SMP</p>
            @foreach ($mapelSMP as $mapelSmp)
              <div class="flex items-center dark:text-white gap-2 mt-2">
                <div class="block min-h-6 pl-2">
                  <label>
                    <input id="{{ $mapelSmp->name }}{{ $mapelSmp->id }}" class="checkbox bg-white checkbox-success"
                      type="checkbox" / name="pelajaran[]" value="{{ $mapelSmp->id }}"
                      @if (in_array($mapelSmp->id, $mapelUser)) checked @endif>
                    <label for="{{ $mapelSmp->name }}{{ $mapelSmp->id }}"
                      class="cursor-pointer select-none dark:text-white text-slate-700 text-sm">{{ $mapelSmp->name }}</label>
                  </label>
                </div>
              </div>
            @endforeach
          </div>

          <div class="w-full lg:w-1/4">
            <p class="text-slate-700 dark:text-white font-semibold">Mapel MA</p>
            @foreach ($mapelMA as $mapelMa)
              <div class="flex items-center dark:text-white gap-2 mt-2">
                <div class="block min-h-6 pl-2">
                  <label>
                    <input id="{{ $mapelMa->name }}{{ $mapelMa->id }}" class="checkbox bg-white checkbox-success"
                      type="checkbox" / name="pelajaran[]" value="{{ $mapelMa->id }}"
                      @if (in_array($mapelMa->id, $mapelUser)) checked @endif>
                    <label for="{{ $mapelMa->name }}{{ $mapelMa->id }}"
                      class="cursor-pointer select-none dark:text-white text-slate-700 text-sm">{{ $mapelMa->name }}</label>
                  </label>
                </div>
              </div>
            @endforeach
          </div>

          <div class="w-full lg:w-1/4">
            <p class="text-slate-700 dark:text-white font-semibold">Mapel Madin</p>
            @foreach ($mapelMADIN as $mapelMadin)
              <div class="flex items-center dark:text-white gap-2 mt-2">
                <div class="block min-h-6 pl-2">
                  <label>
                    <input id="{{ $mapelMadin->name }}" class="checkbox bg-white checkbox-success" type="checkbox" /
                      name="pelajaran[]" value="{{ $mapelMadin->id }}"
                      @if (in_array($mapelMadin->id, $mapelUser)) checked @endif>
                    <label for="{{ $mapelMadin->name }}"
                      class="cursor-pointer select-none dark:text-white text-slate-700 text-sm">{{ $mapelMadin->name }}</label>
                  </label>
                </div>
              </div>
            @endforeach
          </div>

          <div class="w-full lg:w-1/4">
            <p class="text-slate-700 dark:text-white font-semibold">Mapel MMQ</p>
            @foreach ($mapelMMQ as $mapelMmq)
              <div class="flex items-center dark:text-white gap-2 mt-2">
                <div class="block min-h-6 pl-2">
                  <label>
                    <input id="{{ $mapelMmq->name }}" class="checkbox bg-white checkbox-success" type="checkbox" /
                      name="pelajaran[]" value="{{ $mapelMmq->id }}"
                      @if (in_array($mapelMmq->id, $mapelUser)) checked @endif>
                    <label for="{{ $mapelMmq->name }}"
                      class="cursor-pointer select-none dark:text-white text-slate-700 text-sm">{{ $mapelMmq->name }}</label>
                  </label>
                </div>
              </div>
            @endforeach
          </div>
        </div>
      </div>

      <div class="min-w-full mt-3">
        <h5 class="text-green-500">Pendamping Hafalan</h5>

        <div class="flex flex-wrap">

          <div class="w-full lg:w-1/5">
            <p class="text-slate-700 dark:text-white font-semibold">Kelas Madin</p>
            @foreach ($kelasMadin as $madin)
              <div class="flex items-center dark:text-white gap-2 mt-2">
                <div class="block min-h-6 pl-2">
                  <label>
                    <input id="pendampingHafalanMadin{{ $madin->name }}" class="checkbox bg-white checkbox-success"
                      type="checkbox" / name="pendampingHafalanMadin[]" value="{{ $madin->id }}"
                      @if (in_array($madin->name, $pendampingHafalanMadin)) checked @endif>
                    <label for="pendampingHafalanMadin{{ $madin->name }}"
                      class="cursor-pointer select-none text-slate-700 dark:text-white text-sm">{{ $madin->name }}</label>
                  </label>
                </div>
              </div>
            @endforeach
          </div>

          <div class="w-full lg:w-1/5">
            <p class="text-slate-700 dark:text-white font-semibold">Kelas MMQ</p>
            @foreach ($kelasMmq as $mmq)
              <div class="flex items-center dark:text-white gap-2 mt-2">
                <div class="block min-h-6 pl-2">
                  <label>
                    <input id="pendampingHafalanMmq{{ $mmq->name }}" class="checkbox bg-white checkbox-success"
                      type="checkbox" / name="pendampingHafalanMmq[]" value="{{ $mmq->id }}"
                      @if (in_array($mmq->name, $pendampingHafalanMmq)) checked @endif>
                    <label for="pendampingHafalanMmq{{ $mmq->name }}"
                      class="cursor-pointer select-none text-slate-700 dark:text-white text-sm">{{ $mmq->name }}</label>
                  </label>
                </div>
              </div>
            @endforeach
          </div>

        </div>

      </div>


      <div class="min-w-full mt-3">
        <h5 class="text-green-500">Pendamping Ekstrakurikuler</h5>

        <div class="flex flex-wrap">

          <div class="w-full lg:w-1/5">
            <p class="text-slate-700 dark:text-white font-semibold">Nama Ekstra</p>
            @foreach ($ekstrakurikulers as $ekstrakurikuler)
              <div class="flex items-center dark:text-white gap-2 mt-2">
                <div class="block min-h-6 pl-2">
                  <label>
                    <input id="ekstrakurikuler{{ $ekstrakurikuler->name }}" class="checkbox bg-white checkbox-success"
                      type="checkbox" / name="ekstrakurikulers[]" value="{{ $ekstrakurikuler->id }}"
                      @if (in_array($ekstrakurikuler->id, $ekstrakurikulerUser)) checked @endif>
                    <label for="ekstrakurikuler{{ $ekstrakurikuler->name }}"
                      class="cursor-pointer select-none text-slate-700 dark:text-white text-sm">{{ $ekstrakurikuler->name }}</label>
                  </label>
                </div>
              </div>
            @endforeach
          </div>

        </div>

      </div>
    </div>

    <div class="flex mt-3 gap-3">
      <div class="mx-auto">
        <button type="submit"
          class=" px-3 py-1 bg-green-500 text-white rounded-md hover:scale-105 transition duration-300">Ubah</button>
        <a href="/user"
          class="inline-block px-3 py-1 bg-slate-500 text-white rounded-md hover:scale-105 transition duration-300">Kembali</a>
      </div>
    </div>
  </form>




  <input type="hidden" id="dataStudent"
    data-provinsiStudent="@if ($user->dataUser) {{ $user->dataUser->provinsi }} @endif"
    data-kotakabStudent="@if ($user->dataUser) {{ $user->dataUser->kabupaten }} @endif"
    data-kecamatanStudent="@if ($user->dataUser) {{ $user->dataUser->kecamatan }} @endif"
    data-desaStudent="@if ($user->dataUser) {{ $user->dataUser->desa }} @endif">

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
