<?php

namespace App\Exports;

use App\Providers\InterfaceServiceProvider;
use Illuminate\Support\Facades\Storage;
use Dompdf\Dompdf;

class IncidentpdfExport
{
    protected $list;

    public function __construct($list)
    {
        $this->list = $list;
    }

    public function generatePdf()
    {
        

        $list = $this->list->map(function ($incident) {
            return [
                'DateEmission' => InterfaceServiceProvider::formatDate($incident->DateEmission), 
                'Module' => $incident->Module, 
                'hierarchie' => InterfaceServiceProvider::LibelleHier($incident->hierarchie), 
                'emetteur' => InterfaceServiceProvider::LibelleUser($incident->Emetteur), 
                'etat' => InterfaceServiceProvider::libetat($incident->etat),
                'DateResolue' => InterfaceServiceProvider::formatDate($incident->DateResolue),
                'affecter' => $incident['usersA'],  
            ];
        });
        

        $pdf = new Dompdf();
        $pdf->loadHtml(view('viewadmindste.export.expincidentpdf', ['list' => $list])->render());
        $pdf->setPaper('A4', 'landscape');
        $pdf->render();

        $filePath = 'exports/incident_export.pdf';
        Storage::put($filePath, $pdf->output());

        return $filePath;
    }
}