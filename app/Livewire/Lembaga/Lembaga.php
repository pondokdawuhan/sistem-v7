<?php

namespace App\Livewire\Lembaga;

use App\Models\Lembaga as Lembagas;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Http\Request;
use Livewire\Component;
use Livewire\Attributes\Title;

class Lembaga extends Component
{
   
    #[Title('Data Lembaga')]
    
    public function render()
    {
        $lembagas = Lembagas::all();
        return view('livewire.lembaga.lembaga', [
          'lembagas' => $lembagas,
          'title' => 'Data Lembaga'
        ]);
    }

    public function delete($id)
    {
      
      Lembagas::find($id)->delete();
      session()->flash('success', 'Data Lembaga berhasil dihapus!');
      return $this->redirect('/lembaga', navigate:true);
    }

}
