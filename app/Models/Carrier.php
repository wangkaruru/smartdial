<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Carrier extends Model
{
    public $table= 'vicidial_server_carriers';
    protected $primaryKey = 'carrier_id';
    protected $guarded = [];
    protected $hidden = [
        'carrier_id'
        ];

}
