<table>
  <thead>
    <tr>
      <td>No</td>
      <td>Nama</td>
      <td>Username</td>
      <td>Initial Password</td>
      <td>Email</td>
      <td>Aktif</td>
      <td>Jenis Kelamin</td>
      <td>Tempat Lahir</td>
      <td>Tanggal Lahir</td>
      <td>Tahun Masuk</td>
      <td>NIY</td>
      <td>NIK</td>
      <td>NUPTK</td>
      <td>Status</td>
      <td>Nama Ibu</td>
      <td>Riwayat SD</td>
      <td>Riwayat SMP</td>
      <td>Riwayat SMA</td>
      <td>Riwayat Pondok</td>
      <td>Riwayat s1</td>
      <td>Riwayat s2</td>
      <td>Riwayat s3</td>
      <td>Jalan</td>
      <td>Dusun</td>
      <td>RT</td>
      <td>RW</td>
      <td>Desa</td>
      <td>Kecamatan</td>
      <td>Kabupaten</td>
      <td>Provinsi</td>
      <td>Kode Pos</td>
      <td>No HP</td>
      <td>Notifikasi Khusus</td>
    </tr>
  </thead>
  <tbody>
    @foreach ($users as $user)
      <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $user->name }}</td>
        <td>{{ $user->username }}</td>
        <td>{{ $user->initial_password }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->dataUser->aktif }}</td>
        <td>{{ $user->dataUser->jenis_kelamin }}</td>
        <td>{{ $user->dataUser->tempat_lahir }}</td>
        <td>{{ $user->dataUser->tanggal_lahir }}</td>
        <td>{{ $user->dataUser->tahun_masuk }}</td>
        <td>{{ $user->dataUser->niy }}</td>
        <td>{{ $user->dataUser->nik }}</td>
        <td>{{ $user->dataUser->nuptk }}</td>
        <td>{{ $user->dataUser->status }}</td>
        <td>{{ $user->dataUser->nama_ibu }}</td>
        <td>{{ $user->dataUser->riwayat_sd }}</td>
        <td>{{ $user->dataUser->riwayat_smp }}</td>
        <td>{{ $user->dataUser->riwayat_sma }}</td>
        <td>{{ $user->dataUser->riwayat_pondok }}</td>
        <td>{{ $user->dataUser->riwayat_kuliah_s1 }}</td>
        <td>{{ $user->dataUser->riwayat_kuliah_s2 }}</td>
        <td>{{ $user->dataUser->riwayat_kuliah_s3 }}</td>
        <td>{{ $user->dataUser->jalan }}</td>
        <td>{{ $user->dataUser->dusun }}</td>
        <td>{{ $user->dataUser->rt }}</td>
        <td>{{ $user->dataUser->rw }}</td>
        <td>{{ $user->dataUser->desa }}</td>
        <td>{{ $user->dataUser->kecamatan }}</td>
        <td>{{ $user->dataUser->kabupaten }}</td>
        <td>{{ $user->dataUser->provinsi }}</td>
        <td>{{ $user->dataUser->kodepos }}</td>
        <td>{{ $user->dataUser->no_hp }}</td>
        <td>{{ $user->dataUser->notifikasiKhusus }}</td>
      </tr>
    @endforeach
  </tbody>
</table>
