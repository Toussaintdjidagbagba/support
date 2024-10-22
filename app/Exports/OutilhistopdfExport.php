<?php

namespace App\Exports;

use Illuminate\Support\Facades\Storage;
use Dompdf\Dompdf;

class OutilhistopdfExport
{
    protected $data;
    protected $entete;
    
    public function __construct($data,$entete)
    {
        $this->data = $data;
        $this->entete = $entete;
    }

    public function generatePdf()
    {
        $data = $this->data;
        $entete = $this->entete;

        $pdf = new Dompdf();
        $pdf->loadHtml(view('viewadmindste.export.exphistopdf', compact('data','entete'))->render());
        $pdf->render();
        return $pdf->output();
       
    }
}
