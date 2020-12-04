<?php

namespace App\Imports;

use App\Church;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Illuminate\Validation\Rule;

class churchImport implements ToModel, WithHeadingRow, WithValidation
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        // dd($row);
        if($row['phone']){
            $number = preg_replace('/^0/', '256', $row['phone']);
            if(!Church::where('phone_number', '=', $number)->exists()){

                return new Church([
                    'name' => $row['name'],
                    'email' =>$row['email'],
                    'home_cell' => $row['homecell'],
                    'phone_number' => $number,//convert this to 256 number
                    'watsup_number' => $row['watsup'],
                    'marital_status' => $row['marital_status'],
                    'no_of_children' => $row['no_of_children'],
                    'age' => $row['age'],
            ]);
            }
        }


    }


    public function rules(): array
    {
        return [
            '0' => Rule::unique('churches', 'phone_number')
        ];
    }

    public function customValidationMessages()
{
    return [
        '0.unique' => 'Duplicate',
    ];
}
}
