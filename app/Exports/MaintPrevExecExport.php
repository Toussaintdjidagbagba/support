<?php

namespace App\Exports;

use Dompdf\Dompdf;
use Illuminate\Support\Facades\Storage;

class MaintPrevExecExport
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
        $pdf->loadHtml(view('viewadmindste.export.expmaintexecprev', compact('list','entete'))->render());
        $pdf->render();

        return $pdf->output();
    }
}
