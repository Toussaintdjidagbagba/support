<?php

namespace App\Exports;

use Dompdf\Dompdf;
use Illuminate\Support\Facades\Storage;

class GcurRechpdf
{
    protected $list;

    public function __construct($list)
    {
        $this->list = $list;
        //dd($this->list);
    }

    public function generatePdf()
    {
        $list = $this->list;

        $pdf = new Dompdf();
        $pdf->loadHtml(view('viewadmindste.export.rechgestcurpdf', compact('list'))->render());
        $pdf->render();

        $filePath = 'exports/Currative_export.pdf';
        Storage::put($filePath, $pdf->output());

        return $filePath;
    }
}
