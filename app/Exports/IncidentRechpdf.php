<?php

namespace App\Exports;

use App\Providers\InterfaceServiceProvider;
use Illuminate\Support\Facades\Storage;
use Dompdf\Dompdf;
use Illuminate\Support\Collection;

class IncidentRechpdf 
{
    protected $list;
    protected $entete;

    public function __construct($list,$entete)
    {
        // Convertir le tableau en collection
        $this->list = collect($list);
        $this->entete = $entete;
        //dd($list);
       
    }

    public function generatePdf()
    {
        // Utilisation de map() sur la collection
        $list = $this->list->map(function ($incident) {
            return [
                'DateEmission' => $incident['DateEmission'], 
                'Module' => $incident['Module'], 
                'hierarchie' => $incident['hierarchie'], 
                'emetteur' => $incident['usersE'], 
                'etat' => $incident['etats'],
                'DateResolue' => $incident['DateResolue'], 
                'affecter' => $incident['usersA'], 
            ];
        });

        $entete = $this->entete;

        $pdf = new Dompdf();
        $pdf->loadHtml(view('viewadmindste.export.expincidentpdf', ['list' => $list,'entete' => $entete])->render());
        $pdf->setPaper('A4', 'landscape');
        $pdf->render();

        return $pdf->output();
    }
}
