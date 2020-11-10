<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Church extends Model
{
    //
    protected $fillable = [
     'name', 'email','home_cell', 'phone_number', 'watsup_number',
     'marital_status', 'no_of_children','gender','age', 'status'
    ];
}
