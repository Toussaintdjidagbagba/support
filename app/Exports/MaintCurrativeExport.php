<?php

namespace App\Exports;

use Illuminate\Support\Facades\Storage;
use Dompdf\Dompdf;

class MaintCurrativeExport
{
    protected $list;
    protected $entete;
    
    public function __construct($list,$entete)
    {
        $this->list = $list;
        $this->entete = $entete;
    }

    public function generatePdf()
    {
        $list = $this->list;

        $entete = $this->entete;

        $pdf = new Dompdf();
        $pdf->loadHtml(view('viewadmindste.export.expmaintcur', compact('list','entete'))->render());
        $pdf->render();

        $filePath = 'exports/Currative_export.pdf';
        Storage::put($filePath, $pdf->output());

        return $filePath;
    }
}