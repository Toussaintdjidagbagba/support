<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use App\Providers\InterfaceServiceProvider;

class IncidentRech implements FromView
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

    public function view(): View
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
                'cat' => $incident['cat'], 
                'desc' => $incident['description'], 
            ];
        });

        $entete = $this->entete;

        return view('viewadmindste.export.expincident', [
            'list' => $list,
            'entete' => $entete
        ]);
    }
}
