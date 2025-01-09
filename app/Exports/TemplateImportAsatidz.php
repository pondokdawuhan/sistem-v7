<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class TemplateImportAsatidz implements FromView
{
    public $username;

    public function __construct($username)
    {
      $this->username = $username;
    }
    public function view(): View
    {
       
        return view('exports.templateImportAsatidz', [
          'username' => $this->username
        ]);
    }
}
