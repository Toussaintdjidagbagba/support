<?php

namespace App\Exports;

use App\Providers\InterfaceServiceProvider;
use Illuminate\Support\Facades\Storage;
use Dompdf\Dompdf;

class OutilspdfExport
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

        $list = $this->list->map(function ($outils) {
            return [
                'reference' => $outils->reference, 
                'dateacquisition' => $outils->dateacquisition , 
                'nameoutils' => $outils->nameoutils, 
                'categorie' => InterfaceServiceProvider::LibelleCategorie($outils->categorie), 
                'user' => InterfaceServiceProvider::LibelleUser($outils->user) , 
                'etat' => $outils['etat'],
            ];
        });
        $entete = $this->entete;

        $pdf = new Dompdf();
        $pdf->loadHtml(view('viewadmindste.export.expoutilpdf', ['list' => $list,'entete' => $entete])->render());
        $pdf->setPaper('A4', 'landscape');
        $pdf->render();

        $filePath = 'exports/outils_export.pdf';
        Storage::put($filePath, $pdf->output());

        return $filePath;
    }
}


