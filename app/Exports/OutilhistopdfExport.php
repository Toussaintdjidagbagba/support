<?php

namespace App\Exports;

use App\Providers\InterfaceServiceProvider;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Dompdf\Dompdf;


class OutilhistopdfExport
{
    protected $data;
    
    public function __construct($data)
    {
        $this->data = $data;
        
    }

    public function generatePdf()
    {
        $data = $this->data;

        $pdf = new Dompdf();
        $pdf->loadHtml(view('viewadmindste.export.exphistopdf', compact('data'))->render());
        $pdf->render();

        $filePath = 'exports/HistorOutils_export.pdf';
        Storage::put($filePath, $pdf->output());

        return $filePath;
    }
}
