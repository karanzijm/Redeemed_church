<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromCollection;
use App\Church;
// use Maatwebsite\Excel\Concerns\FromQuery;
use Maatwebsite\Excel\Concerns\WithHeadings;


use Maatwebsite\Excel\Concerns\Exportable;


class ChurchExport implements FromCollection
{
    use Exportable;

    public function __construct(){
        // $this->filter = $filter;
    }

    // public function query()
    // {
    //     return Church::query()->whereName('name','like','%'.$this->filter.'%')
    //                           ->whereEmail('email','like','%'.$this->filter.'%')
    //                           ->whereDepartment('department','like','%'.$this->filter.'%')
    //     ;
    // }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        //
        return Church::select("name", "email", "home_cell","phone_number", "department", 'role')->get();
    }
    public function headings(): array
    {
        return ['Name', 'Email', 'Home Cell', 'Phone Number', 'Department', 'Role'];
    }
}
