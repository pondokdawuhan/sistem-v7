<?php

namespace App\Livewire\CatatanAsatidz;

use App\Models\CatatanAsatidz;
use App\Models\Lembaga;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class CatatanAsatidzDetail extends Component
{
    use WithPagination;

    public $lembaga;
    public $role;
    public $user;

    public $page;
    public $paginate = 20;
    public $search;

    public function mount(Lembaga $lembaga, User $user)
    {
      $this->lembaga = $lembaga;
      $this->role = explode('/', request()->path())[1];
      $this->user = $user;
    }

    public function render()
    {

         if ($this->search) {
          $catatans = CatatanAsatidz::where('lembaga_id', $this->lembaga->id)->where('user_id', $this->user->id)->filter($this->search)->latest()->get();
          $this->page = 1;
        } else {
          $catatans = CatatanAsatidz::where('lembaga_id', $this->lembaga->id)->where('user_id', $this->user->id)->latest()->paginate($this->paginate);
          $this->page = $catatans->firstItem();
        }

        return view('livewire.catatan-asatidz.catatan-asatidz-detail', [
          'catatans' => $catatans
        ])->title('Detail Catatan Asatidz ' . $this->user->name);
    }
}
