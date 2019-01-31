<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ServerCarrier extends Model
{
    protected $primaryKey = 'carrier_id';

    public $table = 'vicidial_server_carriers';

}
