<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class vicidialStatuses extends Model
{

    public $incrementing = false;
    public $table = 'vicidial_statuses';
    protected $primaryKey = 'status';   
    public $timestamps = false;

    
}


