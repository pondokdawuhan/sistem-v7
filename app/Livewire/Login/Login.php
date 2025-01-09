<?php

namespace App\Livewire\Login;

use Livewire\Component;
use Illuminate\Http\Request;
use Livewire\Attributes\Title;
use Livewire\Attributes\Layout;
use Livewire\Attributes\Computed;
use Illuminate\Support\Facades\Auth;

class Login extends Component
{
  #[Layout('components.layouts.login')]
  #[Title('Selamat Datang')]
  #[Computed]

    public $username;
    public $password;

    public function render()
    {
        return view('livewire.login.login');
    }

    public function authenticate(Request $request)
    {
      $credentials = [
        'username' => $this->username,
        'password' => $this->password
      ];
      if (Auth::attempt($credentials)) {
              if (auth()->user()->dataUser) {
                if (auth()->user()->dataUser->aktif == true) {
                  session()->flash('success', 'Login Berhasil!');
                  $request->session()->regenerate();
                return redirect()->intended('dashboard');
              } else {
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                return back()->with('loginError', 'User Tidak Aktif, Silahkan hubungi Admin');
              }
            } else {
              $request->session()->invalidate();
              $request->session()->regenerateToken();
              return back()->with('loginError', 'Login Gagal!');
            }
        }

        return back()->with('loginError', 'Login Gagal!');
    }

    public function logout()
    {
      Auth::logout();
      request()->session()->invalidate();
      request()->session()->regenerateToken();

      return redirect('/');

    }
}
