<?php

namespace App\Exports;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class HistoExport implements FromView
{
    protected $data;
    
    public function __construct($data)
    {
        $this->data = $data; 
    }
   
    public function view(): View
    {
        $data = $this->data;
        return view('viewadmindste.export.exphisto', compact('data'));
    }
}
