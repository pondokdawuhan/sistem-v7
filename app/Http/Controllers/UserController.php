<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Kamar;
use App\Models\KelasMa;
use App\Models\Lembaga;
use App\Models\DataUser;
use App\Models\Ekstrakurikuler;
use App\Models\KelasMmq;
use App\Models\KelasSmp;
use App\Models\Pelajaran;
use App\Models\KelasMadin;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\PendampingHafalanMmq;
use Illuminate\Support\Facades\Hash;
use App\Models\PendampingHafalanMadin;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    
    public function cetakKartu(User $user) {
      
      return view('user.cetakKartu', [
        'title' => 'Download Kartu Asatidz',
        'user' => $user
      ]);
    }
}
