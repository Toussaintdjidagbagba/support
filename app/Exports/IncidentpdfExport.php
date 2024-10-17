<?php

namespace App\Exports;

use App\Providers\InterfaceServiceProvider;
use Illuminate\Support\Facades\Storage;
use Dompdf\Dompdf;

class IncidentpdfExport
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
        // Utilisation de map() sur la collection
        $list = $this->list->map(function ($incident) {
            return [
                'DateEmission' => $incident->DateEmission, // Notation objet
                'Module' => $incident->Module, 
                'hierarchie' => $incident->hierarchie, 
                'emetteur' => $incident->usersE, 
                'etat' => $incident->etats,
                'DateResolue' => $incident->DateResolue, 
                'affecter' => $incident->usersA, 
            ];
        });

        $entete = $this->entete;

        $pdf = new Dompdf();
        $pdf->loadHtml(view('viewadmindste.export.expincidentpdf', ['list' => $list,'entete' => $entete])->render());
        $pdf->setPaper('A4', 'landscape');
        $pdf->render();

        $filePath = 'exports/incident_export.pdf';
        Storage::put($filePath, $pdf->output());

        return $filePath;
    }
}