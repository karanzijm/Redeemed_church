<?php

namespace App\Imports;

use App\Congregation;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CongregationImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Congregation([
            'name' => $row['name'],
            'email' => $row['email'],
            'contact'=> $row['contact'],
            'location' => $row['location'],
            'home_cell' => $row['home_cell'],
            'marital_status' => $row['marital_status'],
            'no_of_children' => $row['number_of_children']
        ]);
    }
}
