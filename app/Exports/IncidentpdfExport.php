<?php

namespace App\Exports;

use App\Providers\InterfaceServiceProvider;
use Carbon\Carbon;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Storage;
use Dompdf\Dompdf;
use Dompdf\Options;

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
                'DateEmission' => $incident->DateEmission, // Assurez-vous que ce champ existe
                'Module' => $incident->Module, // Assurez-vous que ce champ existe
                'hierachie' => InterfaceServiceProvider::LibelleHier($incident->hierarchie), // Ajustez selon votre logique
                'emetteur' => InterfaceServiceProvider::LibelleUser($incident->Emetteur), // Ajustez selon votre logique
                'etat' => InterfaceServiceProvider::libetat($incident->etat), // Ajustez selon votre logique
                'DateResolue' => $incident->DateResolue, // Assurez-vous que ce champ existe
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


