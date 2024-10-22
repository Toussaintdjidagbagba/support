<?php

namespace App\Exports;

use Dompdf\Dompdf;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Concerns\FromCollection;

class GprevRechpdf 
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
        $pdf->loadHtml(view('viewadmindste.export.rechgestprevpdf', compact('list','entete'))->render());
        $pdf->setPaper('A4', 'landscape');
        $pdf->render();

        return $pdf->output();
    }
}
