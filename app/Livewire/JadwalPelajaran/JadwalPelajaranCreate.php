<?php

namespace App\Livewire\JadwalPelajaran;

use Livewire\Component;
use App\Models\PengampuMapel;
use App\Models\JadwalPelajaran;

class JadwalPelajaranCreate extends Component
{

    

    public function simpan()
    {
      dd(request());

      $jadwalLama = JadwalPelajaran::where('lembaga_id', request('lembaga_id'))->get();

        if ($jadwalLama) {
          foreach ($jadwalLama as $jl) {
            $jl->delete();
          }
        }

        for ($i=0; $i < count($request->pengampu_id); $i++) { 
          if ($request->pengampu_id[$i]) {
            $pengampu = PengampuMapel::find($request->pengampu_id[$i]);
            JadwalPelajaran::create([
              'user_id' => $pengampu->user_id,
              'lembaga_id' => request('lembaga_id'),
              'pelajaran_id' => $pengampu->pelajaran_id,
              'kelas_id' => $request->kelas[$i],
              'hari' => $request->hari[$i],
              'jam' => $request->jam[$i]
            ]);
          }
        }
    }

    public function render()
    {
        return view('livewire.jadwal-pelajaran.jadwal-pelajaran-create');
    }
}
