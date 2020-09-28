<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bulk extends Model
{
    protected $table = 'church_users';
    protected $fillable = [
        'name', 'marital_status', 'phone_number', 'number_of_kids'
    ];
}
