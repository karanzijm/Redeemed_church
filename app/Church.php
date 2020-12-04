<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;


class Church extends Model
{
    //
    use Sortable;

    protected $fillable = [
     'name', 'email','home_cell', 'phone_number', 'watsup_number',
     'marital_status', 'no_of_children','gender','age', 'status'
    ];

    protected $sortable = ['name', 'email','home_cell', 'phone_number', 'watsup_number',
    'marital_status', 'no_of_children','gender','age', 'status'];
}
