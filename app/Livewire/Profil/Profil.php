<?php

namespace App\Livewire\Profil;

use App\Models\User;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class Profil extends Component
{

    public $user;

    public $passwordLama;
    public $passwordBaru1;
    public $passwordBaru2;

    public function mount(User $username)
    {
      $this->user = $username;
    }

    public function gantiPassword()
    {
      if (password_verify($this->passwordLama, auth()->user()->password)) {
        if ($this->passwordBaru1 == $this->passwordBaru2) {
          auth()->user()->update([
            'password' => Hash::make($this->passwordBaru1),
            'initial_password' => null
          ]);
          session()->flash('success', 'password berhasil diubah');
          Auth::logout();
          request()->session()->invalidate();
          request()->session()->regenerateToken();

          return redirect('/');
        } else {
          session()->flash('gagal', 'password baru tidak cocok, silakan coba lagi');
        }
      } else {
        session()->flash('gagal', 'Password Lama Salah, silakan coba lagi');
      }
    }

    public function render()
    {
        return view('livewire.profil.profil')->title('Profil ' . $this->user->name);
    }
}
