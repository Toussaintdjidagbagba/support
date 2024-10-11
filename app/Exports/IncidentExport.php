<?php

namespace App\Exports;

use App\Providers\InterfaceServiceProvider;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class IncidentExport implements FromView
{
    protected $list;

    public function __construct($list)
    {
        $this->list = $list;
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
        
        return view('viewadmindste.export.expincident', [
            'list' => $list,
        ]);
    }
}
