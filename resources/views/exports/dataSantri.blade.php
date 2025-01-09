<table>
  <thead>
    <tr>
      <td>No</td>
      <td>Nama</td>
      <td>Username</td>
      <td>Initial Password</td>
      <td>Email</td>
      <td>Kelas Formal</td>
      <td>Kelas Madin</td>
      <td>Kelas Mmq</td>
      <td>Kamar</td>
      <td>Aktif</td>
      <td>NIK</td>
      <td>NISN</td>
      <td>NIS</td>
      <td>Lembaga</td>
      <td>Tahun Masuk</td>
      <td>Tempat Lahir</td>
      <td>Tanggal Lahir</td>
      <td>Jenis Kelamin</td>
      <td>Status Anak</td>
      <td>Anak Ke</td>
      <td>Jumlah Saudara</td>
      <td>No KK</td>
      <td>Nama Ayah</td>
      <td>NIK Ayah</td>
      <td>Pendidikan Ayah</td>
      <td>Pekerjaan Ayah</td>
      <td>Penghasilan Ayah</td>
      <td>Nama Ibu</td>
      <td>NIK Ibu</td>
      <td>Pendidikan Ibu</td>
      <td>Pekerjaan Ibu</td>
      <td>Penghasilan Ibu</td>
      <td>No HP</td>
      <td>Nama Wali</td>
      <td>No Wali</td>
      <td>Jalan</td>
      <td>Dusun</td>
      <td>RT</td>
      <td>RW</td>
      <td>Desa</td>
      <td>Kecamatan</td>
      <td>Kabupaten</td>
      <td>Provinsi</td>
      <td>Kode Pos</td>
      <td>Riwayat Penyakit</td>
      <td>Asal SD</td>
      <td>Asal SMP</td>
      <td>Asal SMA</td>
      <td>Riwayat Pondok</td>
    </tr>
  </thead>
  <tbody>
    @foreach ($santris as $santri)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $santri->name }}</td>
        <td>{{ $santri->username }}</td>
        <td>{{ $santri->initial_password }}</td>
        <td>{{ $santri->email }}</td>
        <td>
          @if ($santri->kelas_formal_id)
            @foreach ($kelas as $kls)
              @if ($kls->id == $santri->kelas_formal_id)
                {{ $kls->nama }}
              @endif
            @endforeach
          @endif
        </td>
        <td>
          @if ($santri->kelas_madin_id)
            @foreach ($kelas as $kls)
              @if ($kls->id == $santri->kelas_madin_id)
                {{ $kls->nama }}
              @endif
            @endforeach
          @endif
        </td>
        <td>
          @if ($santri->kelas_tpq_id)
            @foreach ($kelas as $kls)
              @if ($kls->id == $santri->kelas_tpq_id)
                {{ $kls->nama }}
              @endif
            @endforeach
          @endif
        </td>
        <td>
          @if ($santri->kelas_asrama_id)
            @foreach ($kelas as $kls)
              @if ($kls->id == $santri->kelas_asrama_id)
                {{ $kls->nama }}
              @endif
            @endforeach
          @endif
        </td>
        <td>{{ $santri->dataSantri->aktif ?? '' }}</td>
        <td>{{ $santri->dataSantri->nik ?? '' }}</td>
        <td>{{ $santri->dataSantri->nisn ?? '' }}</td>
        <td>{{ $santri->dataSantri->nis ?? '' }}</td>
        <td>{{ $santri->dataSantri->lembaga->nama ?? 'LAINNYA' }}</td>
        <td>{{ $santri->dataSantri->tahun_masuk ?? '' }}</td>
        <td>{{ $santri->dataSantri->tempat_lahir ?? '' }}</td>
        <td>{{ $santri->dataSantri->tanggal_lahir ?? '' }}</td>
        <td>{{ $santri->dataSantri->jenis_kelamin ?? '' }}</td>
        <td>{{ $santri->dataSantri->status_anak ?? '' }}</td>
        <td>{{ $santri->dataSantri->anak_ke ?? '' }}</td>
        <td>{{ $santri->dataSantri->jumlah_saudara ?? '' }}</td>
        <td>{{ $santri->dataSantri->no_kk ?? '' }}</td>
        <td>{{ $santri->dataSantri->nama_ayah ?? '' }}</td>
        <td>{{ $santri->dataSantri->nik_ayah ?? '' }}</td>
        <td>{{ $santri->dataSantri->pendidikan_ayah ?? '' }}</td>
        <td>{{ $santri->dataSantri->pekerjaan_ayah ?? '' }}</td>
        <td>{{ $santri->dataSantri->penghasilan_ayah ?? '' }}</td>
        <td>{{ $santri->dataSantri->nama_ibu ?? '' }}</td>
        <td>{{ $santri->dataSantri->nik_ibu ?? '' }}</td>
        <td>{{ $santri->dataSantri->pendidikan_ibu ?? '' }}</td>
        <td>{{ $santri->dataSantri->pekerjaan_ibu ?? '' }}</td>
        <td>{{ $santri->dataSantri->penghasilan_ibu ?? '' }}</td>
        <td>{{ $santri->dataSantri->no_hp ?? '' }}</td>
        <td>{{ $santri->dataSantri->nama_wali ?? '' }}</td>
        <td>{{ $santri->dataSantri->no_wali ?? '' }}</td>
        <td>{{ $santri->dataSantri->jalan ?? '' }}</td>
        <td>{{ $santri->dataSantri->dusun ?? '' }}</td>
        <td>{{ $santri->dataSantri->rt ?? '' }}</td>
        <td>{{ $santri->dataSantri->rw ?? '' }}</td>
        <td>{{ $santri->dataSantri->desa ?? '' }}</td>
        <td>{{ $santri->dataSantri->kecamatan ?? '' }}</td>
        <td>{{ $santri->dataSantri->kabupaten ?? '' }}</td>
        <td>{{ $santri->dataSantri->provinsi ?? '' }}</td>
        <td>{{ $santri->dataSantri->kodepos ?? '' }}</td>
        <td>{{ $santri->dataSantri->riwayat_penyakit ?? '' }}</td>
        <td>{{ $santri->dataSantri->riwayat_sd ?? '' }}</td>
        <td>{{ $santri->dataSantri->riwayat_smp ?? '' }}</td>
        <td>{{ $santri->dataSantri->riwayat_sma ?? '' }}</td>
        <td>{{ $santri->dataSantri->riwayat_pondok ?? '' }}</td>
      </tr>
    @endforeach
  </tbody>
</table>
