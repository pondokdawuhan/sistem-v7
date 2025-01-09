@extends('templates.main')
@section('container')
  <div class="overflow-auto">
    <div class="bg-white dark:bg-slate-800 shadow-xl rounded-lg py-3">
      <div class="photo-wrapper p-2">
        <img class="w-[3cm] h-[4cm] mx-auto"
          src="{{ $user->dataUser->foto ? asset('storage/' . $user->dataUser->foto) : '/assets/images/default.jpg' }}"
          alt="Profile">
      </div>
      <div class="p-2">
        <h3 class="text-center text-xl text-gray-900 dark:text-white font-bold leading-8">{{ $user->name }}</h3>
        <div class="text-center text-gray-400 dark:text-white text-xs font-semibold">
          <p>
            @if ($user->role)
              @foreach ($user->role as $role)
                {{ $role->name }} |
              @endforeach
            @endif
          </p>
          <p>
            @if ($user->lembaga)
              @foreach ($user->lembaga as $lembaga)
                {{ $lembaga->name }} |
              @endforeach
            @endif
          </p>
        </div>
        <div class="flex flex-wrap lg:flex-nowrap mt-5 gap-10">
          <div class="w-full lg:w-1/2">
            <h5 class="text-slate-800 dark:text-white border-b dark:border-white border-slate-700">Data Diri
            </h5>
            <table class="text-sm my-3 text-slate-900 dark:text-white">
              <tbody>
                <tr>
                  <td class="px-2 py-2 font-semibold">Username</td>
                  <td class="px-2 py-2">: {{ $user->username }}</td>
                </tr>
                <tr>
                  <td class="px-2 py-2 font-semibold">Jenis kelamin</td>
                  <td class="px-2 py-2">: {{ $user->dataUser->jenis_kelamin ?? '' }}</td>
                </tr>
                <tr>
                  <td class="px-2 py-2 font-semibold">Status</td>
                  <td class="px-2 py-2">: {{ $user->dataUser->status ?? '' }}</td>
                </tr>
                <tr>
                  <td class="px-2 py-2 font-semibold">Tahun Masuk</td>
                  <td class="px-2 py-2">: {{ $user->dataUser->tahun_masuk ?? '' }}</td>
                </tr>
                <tr>
                  <td class="px-2 py-2 font-semibold">Nomor Induk Yayasan</td>
                  <td class="px-2 py-2">: {{ $user->dataUser->niy ?? '' }}</td>
                </tr>
                <tr>
                  <td class="px-2 py-2 font-semibold">Nomor Induk Kependudukan</td>
                  <td class="px-2 py-2">: {{ $user->dataUser->nik ?? '' }}</td>
                </tr>
                <tr>
                  <td class="px-2 py-2 font-semibold">Nomor NUPTK</td>
                  <td class="px-2 py-2">: {{ $user->dataUser->nuptk ?? '' }}</td>
                </tr>
                <tr>
                  <td class="px-2 py-2 font-semibold">Email</td>
                  <td class="px-2 py-2">: {{ $user->email }}</td>
                </tr>
                <tr>
                  <td class="px-2 py-2 font-semibold">No HP</td>
                  <td class="px-2 py-2">: @if ($user->dataUser)
                      @if ($user->dataUser->no_hp)
                        {{ nomorHp($user->dataUser->no_hp) }}
                      @else
                        0
                      @endif
                    @else
                      0
                    @endif
                  </td>
                </tr>
                <tr>
                  <td class="px-2 py-2 font-semibold">Tempat, Tanggal Lahir</td>
                  <td class="px-2 py-2">:
                    {{ $user->dataUser->tempat_lahir ?? '', $user->dataUser->tanggal_lahir ?? '' }}
                  </td>
                </tr>
                <tr>
                  <td class="px-2 py-2 font-semibold">Nama Ibu Kandung</td>
                  <td class="px-2 py-2">:
                    {{ $user->dataUser->nama_ibu ?? '' }}
                  </td>
                </tr>
                <tr>
                  <td class="px-2 py-2 font-semibold">Pendidikan SD</td>
                  <td class="px-2 py-2">:
                    {{ $user->dataUser->riwayat_sd ?? '' }}
                  </td>
                </tr>
                <tr>
                  <td class="px-2 py-2 font-semibold">Pendidikan SMP</td>
                  <td class="px-2 py-2">:
                    {{ $user->dataUser->riwayat_smp ?? '' }}
                  </td>
                </tr>
                <tr>
                  <td class="px-2 py-2 font-semibold">Pendidikan SMA</td>
                  <td class="px-2 py-2">:
                    {{ $user->dataUser->riwayat_sma ?? '' }}
                  </td>
                </tr>
                <tr>
                  <td class="px-2 py-2 font-semibold">Pendidikan S1</td>
                  <td class="px-2 py-2">:
                    {{ $user->dataUser->riwayat_kuliah_s1 ?? '' }}
                  </td>
                </tr>
                <tr>
                  <td class="px-2 py-2 font-semibold">Pendidikan S2</td>
                  <td class="px-2 py-2">:
                    {{ $user->dataUser->riwayat_kuliah_s2 ?? '' }}
                  </td>
                </tr>
                <tr>
                  <td class="px-2 py-2 font-semibold">Pendidikan S3</td>
                  <td class="px-2 py-2">:
                    {{ $user->dataUser->riwayat_kuliah_s3 ?? '' }}
                  </td>
                </tr>
                <tr>
                  <td class="px-2 py-2 font-semibold">Pendidikan Pondok Pesantren</td>
                  <td class="px-2 py-2">:
                    {{ $user->dataUser->riwayat_pondok ?? '' }}
                  </td>
                </tr>

              </tbody>
            </table>
          </div>
          <div class="w-full lg:w-1/2">
            <h5 class="text-slate-800 dark:text-white border-b dark:border-white border-slate-700">Data Tempat
              Tinggal
            </h5>
            <table class="text-sm my-3 text-slate-900 dark:text-white">
              <tbody>
                <tr>
                  <td class="px-2 py-2 font-semibold">Jalan</td>
                  <td class="px-2 py-2">: {{ $user->dataUser->jalan ?? '' }}</td>
                </tr>
                <tr>
                  <td class="px-2 py-2 font-semibold">RT</td>
                  <td class="px-2 py-2">: {{ $user->dataUser->rt ?? '' }}</td>
                </tr>
                <tr>
                  <td class="px-2 py-2 font-semibold">RW</td>
                  <td class="px-2 py-2">: {{ $user->dataUser->rw ?? '' }}</td>
                </tr>
                <tr>
                  <td class="px-2 py-2 font-semibold">Desa</td>
                  <td class="px-2 py-2">: {{ $user->dataUser->desa ?? '' }}</td>
                </tr>
                <tr>
                  <td class="px-2 py-2 font-semibold">Kecamatan</td>
                  <td class="px-2 py-2">: {{ $user->dataUser->kecamatan ?? '' }}</td>
                </tr>
                <tr>
                  <td class="px-2 py-2 font-semibold">Kabupaten/Kota</td>
                  <td class="px-2 py-2">: {{ $user->dataUser->kabupaten ?? '' }}</td>
                </tr>
                <tr>
                  <td class="px-2 py-2 font-semibold">Provinsi</td>
                  <td class="px-2 py-2">: {{ $user->dataUser->provinsi ?? '' }}</td>
                </tr>
                <tr>
                  <td class="px-2 py-2 font-semibold">Kode Pos</td>
                  <td class="px-2 py-2">: {{ $user->dataUser->kodepos ?? '' }}</td>
                </tr>
              </tbody>
            </table>

            <h5 class="text-slate-800 dark:text-white border-b dark:border-white border-slate-700">Kelas
              Mengajar </h5>
            <table class="text-sm my-3 text-slate-900 dark:text-white">
              <tbody>
                <tr>
                  <td class="px-2 py-2 font-semibold">SMP</td>
                  <td class="px-2 py-2">:
                    @if ($user->kelasSmp)
                      @foreach ($user->kelasSmp as $smp)
                        {{ $smp->name }}
                      @endforeach
                    @endif |
                  </td>
                </tr>
                <tr>
                  <td class="px-2 py-2 font-semibold">MA</td>
                  <td class="px-2 py-2">: @if ($user->kelasMa)
                      @foreach ($user->kelasMa as $ma)
                        {{ $ma->name }}
                      @endforeach
                    @endif |
                  </td>
                </tr>
                <tr>
                  <td class="px-2 py-2 font-semibold">MADIN</td>
                  <td class="px-2 py-2">: @if ($user->kelasMadin)
                      @foreach ($user->kelasMadin as $madin)
                        {{ $madin->name }}
                      @endforeach
                    @endif |
                  </td>
                </tr>
                <tr>
                  <td class="px-2 py-2 font-semibold">MMQ</td>
                  <td class="px-2 py-2">: @if ($user->kelasMmq)
                      @foreach ($user->kelasMmq as $mmq)
                        {{ $mmq->name }}
                      @endforeach
                    @endif |
                  </td>
                </tr>
                <tr>
                  <td class="px-2 py-2 font-semibold">KAMAR</td>
                  <td class="px-2 py-2">: @if ($user->kamar)
                      @foreach ($user->kamar as $kamar)
                        {{ $kamar->name }}
                      @endforeach
                    @endif |
                  </td>
                </tr>

              </tbody>
            </table>

            <h5 class="text-slate-800 dark:text-white border-b dark:border-white border-slate-700">Pelajaran
            </h5>
            <p class="mt-2 text-slate-800 dark:text-white">
              @if ($user->pelajaran)
                @foreach ($user->pelajaran as $pelajaran)
                  {{ $pelajaran->name }} ({{ $pelajaran->lembaga->name }}) |
                @endforeach
              @endif
            </p>
          </div>
        </div>

        <div class="text-center my-3">
          <a class="bg-slate-700 text-white px-3 py-1 rounded-md font-medium" href="/user">Kembali</a>
        </div>

      </div>
    </div>
  </div>
@endsection
