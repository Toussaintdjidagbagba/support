<?php

namespace App\Exports;
use App\Providers\InterfaceServiceProvider;
use Illuminate\Support\Facades\Storage;
use Dompdf\Dompdf;

class OutilsRechPdf 
{
    protected $list;
    protected $entete;

    public function __construct($list,$entete)
    {
        // Convertir le tableau en collection
        $this->list = collect($list);
        $this->entete = $entete;
    }

    public function generatePdf()
    {
       // Utilisation de map() sur la collection
        $list = $this->list->map(function ($outils) {
            return [
                'reference' => $outils['reference'], // Utilisez des clés pour accéder aux valeurs
                'dateacquisition' => $outils['dateacquisition'],
                'nameoutils' => $outils['nameoutils'],
                'categorie' => $outils['co_libelle'],
                'user' => $outils['usersL'],
                'etat' => $outils['etat'],
            ];
        });
        $entete = $this->entete;

        $pdf = new Dompdf();
        $pdf->loadHtml(view('viewadmindste.export.expoutilpdf', ['list' => $list, 'entete' => $entete])->render());
        $pdf->setPaper('A4', 'landscape');
        $pdf->render();

        return $pdf->output();
    }
}
