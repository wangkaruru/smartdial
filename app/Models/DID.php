<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DID extends Model
{
    public $table='vicidial_inbound_dids'; 
    protected $primaryKey = 'did_id';
}
