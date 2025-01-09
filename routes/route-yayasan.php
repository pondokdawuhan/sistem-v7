<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\RaporSantri\RaporSantriList;
use App\Livewire\RaporLembaga\RaporLembagaList;
use App\Livewire\RaporSantri\RaporSantriDetail;
use App\Livewire\RaporLembaga\RaporLembagaDetail;
use App\Livewire\RaporPendamping\RaporPendampingList;
use App\Livewire\RaporPendamping\RaporPendampingDetail;

  Route::get('/{lembaga}/yayasan/raporLembaga', RaporLembagaList::class);
  Route::get('/{lembaga}/yayasan/raporLembaga/detail/{user}', RaporLembagaDetail::class);
  
  Route::get('/raporSantri/{kelas}/yayasan', RaporSantriList::class);
  Route::get('/raporSantri/detail/{santri}/{kelas}/yayasan', RaporSantriDetail::class);

  
  // Rapor Pendamping start
  Route::get('/{lembaga}/yayasan/raporPendamping', RaporPendampingList::class);
  Route::get('/{lembaga}/yayasan/raporPendamping/detail/{user}', RaporPendampingDetail::class);
  // Rapor Pendamping End
