<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use App\Providers\InterfaceServiceProvider;

class IncidentDeclarRech implements FromView
{

    protected $list;

    public function __construct($list)
    {
        // Convertir le tableau en collection
        $this->list = collect($list);
    }

    public function view(): View
    {
       
       // Utilisation de map() sur la collection
        $list = $this->list->map(function ($incident) {
            return [
                'DateEmission' => $incident['DateEmission'], 
                'Module' => $incident['Module'], 
                'Description' => $incident['description'], 
                'hierarchie' => InterfaceServiceProvider::LibelleHier($incident['hierarchie']), 
                'categorie' => InterfaceServiceProvider::LibelleCat($incident['cat']), 
                'temps' => InterfaceServiceProvider::TempsCats($incident['id'], $incident['cat'], $incident['created_at']), 
                'etat' => InterfaceServiceProvider::libetat($incident['etat']),
            ];
        });

        return view('viewadmindste.export.expincidentrech', [
            'list' => $list,
        ]);
    }
}
