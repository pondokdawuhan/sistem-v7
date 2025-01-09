<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class TemplateImportSantri implements FromView
{
    public $lembaga;
    public $username;

    public function __construct($lembaga, $username)
    {
      $this->lembaga = $lembaga;
      $this->username = $username;
    }
    public function view(): View
    {
       
        return view('exports.templateImportSantri', [
          'lembaga' => $this->lembaga,
          'username' => $this->username
        ]);
    }
}
