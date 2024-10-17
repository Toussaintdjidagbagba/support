<?php

namespace App\Exports;

use App\Providers\InterfaceServiceProvider;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class IncidentExport implements FromView
{
    protected $list;
    protected $entete;

    public function __construct($list,$entete)
    {
        $this->list = $list;
        $this->entete = $entete;
    }

    public function view(): View
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
        
        return view('viewadmindste.export.expincident', [
            'list' => $list,
            'entete' => $entete
        ]);
    }
}
