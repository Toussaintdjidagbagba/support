<?php

namespace App\Exports;

use App\Providers\InterfaceServiceProvider;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;

class OutilsExport implements FromView
{
    protected $list;

    public function __construct($list)
    {
        $this->list = $list;
    }

    public function view(): View
    {
       
        $list = $this->list->map(function ($outils) {
            return [
                'reference' => $outils->reference, 
                'dateacquisition' => $outils->dateacquisition, 
                'nameoutils' => $outils->nameoutils, 
                'categorie' => InterfaceServiceProvider::LibelleCategorie($outils->categorie), 
                'user' => InterfaceServiceProvider::LibelleUser($outils->user) , 
            ];
        });
        return view('viewadmindste.export.expoutil', [
            'list' => $list,
        ]);
    }
}
