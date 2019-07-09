<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GeneralSetting extends Model
{
    protected $table = "general_settings" ; 


    protected $fillable = ['id' , 'last_updated_by']; 
}
