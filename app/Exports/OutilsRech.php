<?php

namespace App\Exports;

use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use App\Providers\InterfaceServiceProvider;

class OutilsRech implements FromView
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
        $list = $this->list->map(function ($outils) {
            return [
                'reference' => $outils['reference'], // Utilisez des clés pour accéder aux valeurs
                'dateacquisition' => $outils['dateacquisition'],
                'nameoutils' => $outils['nameoutils'],
                'categorie' => $outils['co_libelle'],
                'user' => $outils['usersL'],
                'etat' => $outils['etat'],
            ];
        });

        $entete = $this->entete;

        // Renvoyer la vue avec la liste transformée
        return view('viewadmindste.export.expoutil', ['list' => $list, 'entete' => $entete]);
    }
}
