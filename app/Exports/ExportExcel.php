<?php

/**
 * Created by PhpStorm.
 * User: EMMAN
 * Date: 16/10/2021
 * Time: 11:09
 */

namespace App\Exports;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ExportExcel implements FromCollection, WithHeadings,ShouldAutoSize
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection(){
        return session('incidents');
    }
    public function  headings():array{
        return [
            "Date Emission",
            "Module",
            "Hierarchie",
            "Emetteur",
            "Etat",
            "Date Résolue",
            "Avis Emetteur",
            "Commentaire Emetteur",
            "Technicien",
        ];
    }
}