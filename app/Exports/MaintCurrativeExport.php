<?php

namespace App\Exports;

use Illuminate\Support\Facades\Storage;
use Dompdf\Dompdf;

class MaintCurrativeExport
{
    protected $list;
    protected $entete;
    protected $carct;
    protected $details;
    
    public function __construct($list,$entete,$carct,$details)
    {
        $this->list = $list;
        $this->entete = $entete;
        $this->carct = $carct;
        $this->details = $details;
    }

    public function generatePdf()
    {
        $list = $this->list;
        $entete = $this->entete;
        $carct =  $this->carct;
        $details = $this->details;

        //dd($details);

        $pdf = new Dompdf();
        $pdf->loadHtml(view('viewadmindste.export.expmaintcur', compact('list','entete','carct','details'))->render());
        $pdf->render();
        return $pdf->output();
    }

}