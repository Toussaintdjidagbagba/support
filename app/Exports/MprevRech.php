<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class MprevRech implements FromView
{
    protected $list;
    

    public function __construct($list)
    {
        $this->list = $list;
    }
    
   
    public function view(): View
    {
        $list = $this->list;
       
        return view('viewadmindste.export.rechmprev', compact('list'));
    }
}
