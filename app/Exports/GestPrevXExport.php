<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class GestPrevXExport implements FromView
{
    protected $list;
    

    public function __construct($list)
    {
        $this->list = $list;
    }
    
   
    public function view(): View
    {
        $list = $this->list;
       
        return view('viewadmindste.export.expgestprev', compact('list'));
    }
}
