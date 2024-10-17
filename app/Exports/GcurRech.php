<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class GcurRech implements FromView
{
    protected $list;
    protected $entete;
    
    public function __construct($list,$entete)
    {
        $this->list = $list;
        $this->entete = $entete;
    }
    
   
    public function view(): View
    {
        $list = $this->list;
        $entete = $this->entete;
       
        return view('viewadmindste.export.rechgestcur', compact('list','entete'));
    }
}
