<?php

namespace App\Exports;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;

class ExportMaintenance implements FromCollection, WithHeadings,ShouldAutoSize
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection(){
        return session('maintenances');
    }
    public function  headings():array{
        return [
            "Ordinateur",
            "Utilisateur",
            "Commentaire Utilisateur",
            "Avis Utilisateur",
            "Etat Ordinateur",
            "Commentaire Technicien",
            "Technicien",
            "Période",
        ];
    }
}