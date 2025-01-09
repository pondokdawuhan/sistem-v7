<?php

namespace App\Livewire\IzinAsatidz;

use App\Models\User;
use App\Models\Lembaga;
use Livewire\Component;
use App\Models\IzinAsatidz;
use Livewire\WithPagination;

class IzinAsatidzDetail extends Component
{
    use WithPagination;

    public $role;
    public $lembaga;
    public $search;
    public $paginate = 20;
    public $user;

    public function mount(Lembaga $lembaga, User $user)
    {
      $this->role = explode('/', request()->path())[1];
      $this->lembaga = $lembaga;
      $this->user = $user;
    }

    public function render()
    {
        
          $izins = IzinAsatidz::where('lembaga_id', $this->lembaga->id)->where('user_id', $this->user->id)->latest()->paginate($this->paginate);
        
        return view('livewire.izin-asatidz.izin-asatidz-detail', [
          'izinAsatidz' => $izins
        ]);
    }
}
