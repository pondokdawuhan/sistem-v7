<?php

namespace App\Livewire\CatatanAsatidz;

use App\Models\CatatanAsatidz;
use App\Models\Lembaga;
use Livewire\Component;
use Livewire\WithPagination;
use PhpParser\Node\Expr\FuncCall;

class CatatanAsatidzList extends Component
{
    use WithPagination;
    
    public $lembaga;
    public $role;
    public $search;
    public $page;
    public $paginate = 20;

    public function mount(Lembaga $lembaga)
    {
      $this->lembaga = $lembaga;
      $this->role = explode('/', request()->path())[1];
    }

    public function delete($id)
    {
      CatatanAsatidz::find($id)->delete();
      session()->flash('success', 'Data berhasil dihapus');
    }

    public function render()
    {
        if ($this->search) {
          $catatans = CatatanAsatidz::with('user')->where('lembaga_id', $this->lembaga->id)->filter($this->search)->latest()->get();
          $this->page = 1;
        } else {
          $catatans = CatatanAsatidz::with('user')->where('lembaga_id', $this->lembaga->id)->latest()->paginate($this->paginate);
          $this->page = $catatans->firstItem();
        }
        return view('livewire.catatan-asatidz.catatan-asatidz-list', [
          'catatans' => $catatans
        ])->title('Catatan Asatidz ' . $this->lembaga->nama);
    }
}
