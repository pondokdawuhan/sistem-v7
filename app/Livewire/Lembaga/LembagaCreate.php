<?php

namespace App\Livewire\Lembaga;

use Carbon\Carbon;
use App\Models\Lembaga as lembaga;
use Livewire\Component;
use Livewire\Attributes\Title;
use Illuminate\Support\Facades\Cache;
use Livewire\Features\SupportNavigate\SupportNavigate;

class LembagaCreate extends Component
{
  #[Title('Tambah Lembaga')]
    public $nama;
    public $nama_singkat;
    public $jenis_lembaga;
    public $jam;

    public function postLembaga()
    {
      $data = $this->validate([
        'nama' => 'required',
        'nama_singkat' => 'required|min:3',
        'jenis_lembaga' => 'required',
        'jam' => 'required'
      ]);
      
      Lembaga::create($data);

      Cache::forget('lembagas');
      Cache::forget('lembaga_dashboard');
      Cache::forget('lembaga_formals');
      Cache::forget('lembaga_madins');
      Cache::forget('lembaga_mmqs');
      Cache::forget('lembaga_asramas');
      Cache::forget('lembaga_selain_asramas');
      Cache::remember('lembagas', Carbon::now()->addHours(8), function() {
          return lembaga::all();
        });

      session()->flash('success', 'Data Lembaga berhasil ditambahkan!');
      return $this->redirect('/lembaga', navigate:true);
    }

    public function render()
    {
        return view('livewire.lembaga.lembaga-create');
    }
}
