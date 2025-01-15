<?php

namespace App\Livewire\RaporWablas;

use App\Models\User;
use Livewire\Component;
use App\Traits\WablasTrait;

class RaportWablasList extends Component
{
    public $tanggal;

    public function mount()
    {
      return $this->tanggal = date('Y-m-d', time());
    }

    public function render()
    {
      
      $results = WablasTrait::report($this->tanggal);
      if ($results) {
        $data = collect($results['message'])->sortBy('date.created_at', SORT_REGULAR, true);
      } else {
        $data = null;
      }

      
        return view('livewire.rapor-wablas.raport-wablas-list', [
          'reports' => $data,
          'users' => User::all()
        ])->title('Data Wablas');
    }
}
