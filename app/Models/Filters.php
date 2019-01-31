<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Filters extends Model
{
    public $table = 'vicidial_lead_filters';

    public $timestamps = false;
   
    protected $primaryKey = 'lead_filter_id';
}
