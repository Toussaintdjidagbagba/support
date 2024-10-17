<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use App\Providers\InterfaceServiceProvider;

class IncidentDeclarRech implements FromView
{
    protected $list;
    protected $entete;

    public function __construct($list,$entete)
    {
        // Convertir le tableau en collection
        $this->list = collect($list);
        $this->entete = $entete;
    }

    public function view(): View
    {
        // Utilisation de map() sur la collection
        $list = $this->list->map(function ($incident) {
            return [
                'DateEmission' => $incident['DateEmission'], 
                'Module' => $incident['Module'], 
                'Description' => $incident['description'], 
                'hierarchie' => $incident['hierarchie'], 
                'categorie' => $incident['cat'], 
                'temps' => $incident['tempsRestant'], 
                'etat' => $incident['etat'],
            ];
        });

        $entete = $this->entete;

        return view('viewadmindste.export.expincidentrech', [
            'list' => $list,
            'entete' => $entete,
        ]);
    }
}
