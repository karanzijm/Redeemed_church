<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Church;
use Maatwebsite\Excel\Concerns\FromQuery;
// use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;


class ChurchExport implements FromQuery
{
    use Exportable;

    public function __construct(string $filter){
        $this->filter = $filter;
    }

    public function query()
    {
        return Church::query()->whereName('name','like','%'.$this->filter.'%')
                              ->whereEmail('email','like','%'.$this->filter.'%')
                              ->whereDepartment('department','like','%'.$this->filter.'%')
        ;
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    // public function collection()
    // {
    //     //
    //     return Church::all();
    // }
}
