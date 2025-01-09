<?php

namespace App\Livewire\BatasPoin;

use App\Models\BatasPoin;
use Livewire\Attributes\Title;
use Livewire\Component;

class BatasPoinList extends Component
{

    #[Title('Batas Poin')]

    public function delete($id)
    {
      BatasPoin::find($id)->delete();

      session()->flash('success', 'Data berhasil dihapus');
    }
    
    public function render()
    {
        return view('livewire.batas-poin.batas-poin-list', [
          'batasPoins' => BatasPoin::all()
        ]);
    }
}
