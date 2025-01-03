<?php

namespace App\Exports;

use Illuminate\Support\Facades\Storage;
use Dompdf\Dompdf;

class MprevRechpdf 
{
    protected $list;
    protected $entete;

    public function __construct($list,$entete)
    {
        $this->list = $list;
        $this->entete = $entete;
        //dd($this->list);
    }

    public function generatePdf()
    {
        $list = $this->list;
        $entete = $this->entete;

        $pdf = new Dompdf();
        $pdf->loadHtml(view('viewadmindste.export.rechmprevpdf', compact('list','entete'))->render());
        $pdf->setPaper('A4', 'landscape');
        $pdf->render();

        return $pdf->output();
    }
}
