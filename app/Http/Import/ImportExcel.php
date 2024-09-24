<?php

namespace App\Http\Import;

use Maatwebsite\Excel\Concerns\ToArray;

class ImportExcel implements ToArray
{
    public function array(array $row)
    {
        return $row;
    }
}
