<?php

namespace App\Exports;

use Illuminate\Support\Facades\Storage;
use Dompdf\Dompdf;

class GestMaintCurExport 
{
    protected $list;
    
    public function __construct($list)
    {
        $this->list = $list;
        
    }

    public function generatePdf()
    {
        $list = $this->list;

        $pdf = new Dompdf();
        $pdf->loadHtml(view('viewadmindste.export.expgestcur', compact('list'))->render());
        $pdf->render();

        $filePath = 'exports/HistorOutils_export.pdf';
        Storage::put($filePath, $pdf->output());

        return $filePath;
    }
}