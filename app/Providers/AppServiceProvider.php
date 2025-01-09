<?php

namespace App\Providers;

use App\Models\Lembaga;
use App\Models\User;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Gate;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
         View::share('lembagas', Lembaga::all());
         View::share('lembagaFormals', Lembaga::where('jenis_lembaga', 'FORMAL')->get());
         View::share('lembagaMadins', Lembaga::where('jenis_lembaga', 'MADIN')->get());
         View::share('lembagaTpqs', Lembaga::where('jenis_lembaga', 'MMQ')->get());
         View::share('lembagaAsramas', Lembaga::where('jenis_lembaga', 'ASRAMA')->get());
         View::share('lembagaSelainAsrama', Lembaga::where('jenis_lembaga', '!=' , 'ASRAMA')->get());
        //  View::share('lembagaUser', User::lembagaUser(auth()->user()));
        
        Gate::define('viewPulse', function (User $user) {
        return $user->hasRole('Super Admin');
        });
         
    }
}
