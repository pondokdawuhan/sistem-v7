<?php

namespace App\Livewire\IzinKeluarPendamping;

use App\Models\IzinKeluarPendamping;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class IzinKeluarPendampingDetail extends Component
{
    use WithPagination;
    public $user;
    public $role;
    public $paginate;

    public function mount(User $user)
    {
      $this->role = explode('/', request()->path())[0];

      $this->user = $user;
    }
    public function render()
    { 
        return view('livewire.izin-keluar-pendamping.izin-keluar-pendamping-detail', [
          'izins' => IzinKeluarPendamping::where('user_id', $this->user->id)->latest()->paginate($this->paginate)
        ])->title('Rekap Izin Pendamping ' . $this->user->name);
    }
}
