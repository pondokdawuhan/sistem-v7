<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class GoogleController extends Controller
{
    public function redirect()
    {
        return Socialite::driver('google')->redirect();
    }

    public function handleGoogleCallback()
    {
        $googleUser = Socialite::driver('google')->stateless()->user();

        $findUser = User::where('email', $googleUser->email)->first();

        if ($findUser) {
            if ($findUser->dataUser) {
                if ($findUser->dataUser->aktif == true) {
                  if ($findUser->google_id) {
                      $findUser->update(['google_user_token' => $googleUser->token]);
                      Auth::login($findUser);
                      request()->session()->regenerate();
                      return redirect()->intended('dashboard');
                  } else {
                      $findUser->update(['google_id' => $googleUser->getId()]);
                      $findUser->update(['google_user_token' => $googleUser->token]);
                      Auth::login($findUser);
                      request()->session()->regenerate();
                      return redirect()->intended('dashboard');
                  }
                } else {
                  return redirect('/')->with('loginError', 'User Tidak Aktif, Silahkan menghubungi admin');
                }
              } else {
                return redirect('/')->with('loginError', 'Email belum terdaftar!');
              }
        } else {
            return redirect('/')->with('loginError', 'Email belum terdaftar!');
        }
    }
}
