<?php

namespace App\Exports;

use App\Congregation;
use Maatwebsite\Excel\Concerns\FromCollection;

class CongregationExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Congregation::all();
    }
}
