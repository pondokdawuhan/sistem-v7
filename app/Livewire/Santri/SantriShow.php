<?php

namespace App\Livewire\Santri;

use App\Models\Santri;
use Livewire\Component;

class SantriShow extends Component
{
    public $santri;

    public function mount(Santri $santri)
    {
      $this->santri = $santri;
    }

    public function render()
    { 
        
        return view('livewire.santri.santri-show', [
          'santri' => $this->santri
        ])->title('Data Santri ' . $this->santri->name);
    }
}
