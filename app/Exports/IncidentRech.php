<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use App\Providers\InterfaceServiceProvider;

class IncidentRech implements FromView
{

    protected $list;

    public function __construct($list)
    {
        // Convertir le tableau en collection
        $this->list = collect($list);
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
            ];
        });

        return view('viewadmindste.export.expincident', [
            'list' => $list,
        ]);
    }
}
