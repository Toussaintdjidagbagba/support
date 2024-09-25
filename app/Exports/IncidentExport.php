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
       
        $list = $this->list->map(function ($incident) {
            return [
                'DateEmission' => $incident->DateEmission, 
                'Module' => $incident->Module, 
                'hierachie' => InterfaceServiceProvider::LibelleHier($incident->hierarchie), 
                'emetteur' => InterfaceServiceProvider::LibelleUser($incident->Emetteur), 
                'etat' => InterfaceServiceProvider::libetat($incident->etat), 
                'DateResolue' => $incident->DateResolue, 
            ];
        });
        return view('viewadmindste.export.expincident', [
            'list' => $list,
        ]);
    }
}
