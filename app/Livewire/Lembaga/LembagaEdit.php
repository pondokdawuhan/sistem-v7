<?php

namespace App\Livewire\Lembaga;

use Carbon\Carbon;
use App\Models\Lembaga;
use Livewire\Component;
use Livewire\Attributes\Title;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Cache;

class LembagaEdit extends Component
{   
    public $lembaga;
    #[Validate('string')]
    #[Validate('min:5', message: 'mininal diisi 5 karakter')]
    public $nama;
    #[Validate('string')]
    #[Validate('min:2', message: 'minimal diisi 2 karakter')]
    public $nama_singkat;
    #[Validate('string')]
    public $jenis_lembaga;
    #[Validate('integer',  message:' Jam harus diisi dengan angka')]
    public $jam;



    public function mount(Lembaga $lembaga)
    {
      $this->nama = $lembaga->nama;
      $this->nama_singkat = $lembaga->nama_singkat;
      $this->jenis_lembaga = $lembaga->jenis_lembaga;
      $this->jam = $lembaga->jam;

      $this->lembaga = $lembaga;
    }
    #[Title('Edit Lembaga')]

    public function editLembaga()
    {
      
      $data = $this->validate();
      
      $this->lembaga->update($data);

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
        
      session()->flash('success', 'Data Lembaga berhasil diubah!');
      return $this->redirect('/lembaga', navigate:true);
    }

    public function render()
    {
        
        return view('livewire.lembaga.lembaga-edit', [
          'lembaga' => $this->lembaga
        ]);
    }
}
