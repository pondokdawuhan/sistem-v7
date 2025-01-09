<?php

namespace App\Livewire\IzinPulangPendamping;

use App\Models\IzinPulangPendamping;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class IzinPulangPendampingDetail extends Component
{ 
    use WithPagination;
    public $user;
    public $paginate = 20;
    public $role;

    public function mount(User $user)
    {
      $this->role = explode('/', request()->path())[0];
      $this->user = $user;
    }
    public function render()
    {
        return view('livewire.izin-pulang-pendamping.izin-pulang-pendamping-detail', [
          'izins' => IzinPulangPendamping::where('user_id', $this->user->id)->latest()->paginate($this->paginate)
        ])->title('Rekap Izin Pulang Pendamping ' . $this->user->name);
    }
}
