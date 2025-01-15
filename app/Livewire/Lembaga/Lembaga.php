<?php

namespace App\Livewire\Lembaga;

use App\Models\Lembaga as Lembagas;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Livewire\Attributes\Computed;
use Livewire\Component;
use Livewire\Attributes\Title;

class Lembaga extends Component
{
   
    #[Title('Data Lembaga')]

    public function render()
    {
        $lembagas = Cache::remember('lembagas', Carbon::now()->addHours(8), function() {
          return Lembagas::all();
        });

        return view('livewire.lembaga.lembaga', [
          'title' => 'Data Lembaga',
          'lembagas' => $lembagas
        ]);
    }

    public function delete($id)
    {
      
      Lembagas::find($id)->delete();
      Cache::forget('lembagas');
      Cache::forget('lembaga_dashboard');
      Cache::forget('lembaga_formals');
      Cache::forget('lembaga_madins');
      Cache::forget('lembaga_mmqs');
      Cache::forget('lembaga_asramas');
      Cache::forget('lembaga_selain_asramas');
      Cache::remember('lembagas', Carbon::now()->addHours(8), function() {
          return Lembagas::all();
        });
      session()->flash('success', 'Data Lembaga berhasil dihapus!');
      return $this->redirect('/lembaga', navigate:true);
    }

}
