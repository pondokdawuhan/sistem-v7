<?php

namespace App\Providers;

use App\Models\Lembaga;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Cache;
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
        $lembagas = Cache::remember('lembagas', Carbon::now()->addHours(8), function(){
            return Lembaga::all();
        });

        $lembagaFormals = Cache::remember('lembaga_formals', Carbon::now()->addHours(8), function(){
            return Lembaga::where('jenis_lembaga', 'FORMAL')->get();
        });

        $lembagaMadins = Cache::remember('lembaga_madins', Carbon::now()->addHours(8), function(){
            return Lembaga::where('jenis_lembaga', 'MADIN')->get();
        });

        $lembagaMmqs = Cache::remember('lembaga_mmqs', Carbon::now()->addHours(8), function(){
            return Lembaga::where('jenis_lembaga', 'MMQ')->get();
        });

        $lembagaAsramas = Cache::remember('lembaga_asramas', Carbon::now()->addHours(8), function(){
            return Lembaga::where('jenis_lembaga', 'ASRAMA')->get();
        });

        $lembagaSelainAsramas = Cache::remember('lembaga_selain_asramas', Carbon::now()->addHours(8), function(){
            return Lembaga::where('jenis_lembaga', '!=' , 'ASRAMA')->get();
        });


         View::share('lembagas', $lembagas);
         View::share('lembagaFormals', $lembagaFormals);
         View::share('lembagaMadins', $lembagaMadins);
         View::share('lembagaMmqs', $lembagaMmqs);
         View::share('lembagaAsramas', $lembagaAsramas);
         View::share('lembagaSelainAsrama', $lembagaSelainAsramas);
        
        Gate::define('viewPulse', function (User $user) {
        return $user->hasRole('Super Admin');
        });
         
    }
}
