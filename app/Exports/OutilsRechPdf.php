<?php

namespace App\Exports;
use App\Providers\InterfaceServiceProvider;
use Illuminate\Support\Facades\Storage;
use Dompdf\Dompdf;

class OutilsRechPdf 
{
    protected $list;

    public function __construct($list)
    {
        // Convertir le tableau en collection
        $this->list = collect($list);
    }

    public function generatePdf()
    {
       // Utilisation de map() sur la collection
       $list = $this->list->map(function ($outils) {
            return [
                'reference' => $outils['reference'], // Utilisez des clés pour accéder aux valeurs
                'dateacquisition' => $outils['dateacquisition'],
                'nameoutils' => $outils['nameoutils'],
                'categorie' => InterfaceServiceProvider::LibelleCategorie($outils['categorie']),
                'user' => InterfaceServiceProvider::LibelleUser($outils['user']),
                'etat' => $outils['etat'],
            ];
        });
        
        $pdf = new Dompdf();
        $pdf->loadHtml(view('viewadmindste.export.expoutilpdf', ['list' => $list])->render());
        $pdf->setPaper('A4', 'landscape');
        $pdf->render();

        $filePath = 'exports/outils_export.pdf';
        Storage::put($filePath, $pdf->output());

        return $filePath;
    }
}
