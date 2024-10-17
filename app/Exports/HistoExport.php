<?php

namespace App\Exports;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class HistoExport implements FromView
{
    protected $data;
    protected $entete;
    
    public function __construct($data,$entete)
    {
        $this->data = $data; 
        $this->entete = $entete;
    }
   
    public function view(): View
    {
        $data = $this->data;
        $entete = $this->entete;
        return view('viewadmindste.export.exphisto', compact('data','entete'));
    }
}
