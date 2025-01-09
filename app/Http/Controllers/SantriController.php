<?php

namespace App\Http\Controllers;

use App\Models\Santri;
use App\Models\KelasMa;
use App\Models\KelasMmq;
use App\Models\KelasSmp;
use App\Models\DataSantri;
use App\Models\Kamar;
use App\Models\KelasMadin;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class SantriController extends Controller
{
       
    public function downloadKartuSantri(Santri $santri)
    {
        return view('santri.downloadKartuSantri', [
            'title' => 'Download Kartu Santri',
            'santri' => $santri
        ]);
    }

    public function downloadKartuWaliSantri(Santri $santri)
    {
        return view('santri.downloadKartuWaliSantri', [
            'title' => 'Download Kartu Wali Santri',
            'santri' => $santri
        ]);
    }
}
