<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    //
    protected $fillable = [
        'name','email','interest','phone','message','status'
        
    ]; 
}
