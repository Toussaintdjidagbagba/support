<?php

namespace App\Exports;

use App\Providers\InterfaceServiceProvider;
use Illuminate\Support\Facades\Storage;
use Dompdf\Dompdf;
use Illuminate\Support\Collection;

class IncidentRechpdf 
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
        $list = $this->list->map(function ($incident) {
            return [
                'DateEmission' => $incident['DateEmission'], 
                'Module' => $incident['Module'], 
                'hierarchie' => InterfaceServiceProvider::LibelleHier($incident['hierarchie']), 
                'emetteur' => InterfaceServiceProvider::LibelleUser($incident['Emetteur']), 
                'etat' => InterfaceServiceProvider::libetat($incident['etat']),
                'DateResolue' => InterfaceServiceProvider::formatDate($incident['DateResolue']), 
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
