<?php

namespace App\Exports;

use Dompdf\Dompdf;
use Illuminate\Support\Facades\Storage;

class GcurRechpdf
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
        $pdf->loadHtml(view('viewadmindste.export.rechgestcurpdf', compact('list','entete'))->render());
        $pdf->render();

        $filePath = 'exports/Currative_export.pdf';
        Storage::put($filePath, $pdf->output());

        return $filePath;
    }
}
