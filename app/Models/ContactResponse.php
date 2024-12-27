<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ContactResponse extends Model
{
    
    //basic  stuff
    protected $fillable = ['name', 'email', 'message']; 
}
