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

class Export implements FromCollection, WithHeadings,ShouldAutoSize
{
    /**
     * @return \Illuminate\Support\Collection
     */
    public function collection(){
        return session('traite');
    }
    public function  headings():array{
        return [];
    }
}