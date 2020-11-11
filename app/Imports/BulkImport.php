<?php

namespace App\Imports;

use App\Bulk;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class BulkImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new bulk([
            'name' => $row['name'],
            'email' =>$row['email'],
            'location' =>$row['location'],
            'home_cell' => $row['home_cell'],
            'marital_status' => $row['marital_status'],
            'phone_number' => $row['contact'],
            'number_of_kids' =>$row['number_of_kids']
        ]);
    }
}
