<?php

namespace App\Livewire\User;

use App\Models\User;
use Livewire\Component;

class UserShow extends Component
{
    public $user;

    public function mount(User $user)
    {
      $this->user = $user;
    }
    public function render()
    {
        return view('livewire.user.user-show', [
          'user' => $this->user
        ])->title('Data Asatidz ' . $this->user->name);
    }
}
