<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Kyslik\ColumnSortable\Sortable;


class Congregation extends Model
{
    use Sortable;
    protected $fillable = [
        'name', 'email', 'contact', 'location', 'home_cell', 'marital_status', 'no_of_children', 
        'status', 'age', 'gender'
    ];

    public $sortable = ['name', 'email', 'contact', 'location', 'home_cell'];
}
