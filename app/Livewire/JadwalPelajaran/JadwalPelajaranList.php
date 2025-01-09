<?php

namespace App\Livewire\JadwalPelajaran;

use App\Models\Kelas;
use App\Models\Lembaga;
use Livewire\Component;
use App\Models\PengampuMapel;
use App\Models\JadwalPelajaran;
use App\Models\User;

class JadwalPelajaranList extends Component
{
    public $lembaga;
    public $role;
    public $selectedHari;

    public function mount(Lembaga $lembaga)
    {
      $this->lembaga = $lembaga;
      $this->role = explode('/', request()->path())[1];
    }

     public function simpan()
    {
      
      $jadwalLama = JadwalPelajaran::where('lembaga_id', request('lembaga_id'))->where('hari', request('hari'))->get();

        if ($jadwalLama) {
          foreach ($jadwalLama as $jl) {
            $jl->delete();
          }
        }

        for ($i=0; $i < count(request()->pengampu_id); $i++) { 
          if (request()->pengampu_id[$i]) {
            $pengampu = PengampuMapel::find(request()->pengampu_id[$i]);
            JadwalPelajaran::create([
              'user_id' => $pengampu->user_id,
              'lembaga_id' => request('lembaga_id'),
              'pelajaran_id' => $pengampu->pelajaran_id,
              'kelas_id' => request()->kelas[$i],
              'hari' => request()->hari,
              'jam' => request()->jam[$i]
            ]);
          }
        }

        session()->flash('success', 'Jadwal Pelajaran berhasil diubah');
        return redirect()->back();
    }

    public function resetJadwal()
    {
      
      $jadwalLama = JadwalPelajaran::where('lembaga_id', $this->lembaga->id)->where('hari', $this->selectedHari)->get();
        if ($jadwalLama) {
          foreach ($jadwalLama as $jl) {
            $jl->delete();
          }
        }

        session()->flash('success', 'Jadwal Pelajaran berhasil direset');
        return $this->redirect('/' . $this->lembaga->id . '/' . $this->role . '/jadwalPelajaran', true);
    }

    public function render()
    {

        return view('livewire.jadwal-pelajaran.jadwal-pelajaran-list', [
          'kelas' => Kelas::where('lembaga_id', $this->lembaga->id)->get(),
          'jadwals' => JadwalPelajaran::with('user', 'pelajaran')->where('lembaga_id', $this->lembaga->id)->where('hari', $this->selectedHari)->get(),
          'pengampuMapels' => PengampuMapel::with('user', 'pelajaran')->whereRelation('pelajaran', 'lembaga_id', $this->lembaga->id)->orderBy(User::select('name')
        ->whereColumn('users.id', 'pelajaran_user.user_id'),
    'asc')->get() 
        ])->title('Jadwal Pelajaran ' . $this->lembaga->nama);
    }
}
