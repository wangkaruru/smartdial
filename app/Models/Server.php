<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Server extends Model
{


    protected $primaryKey = 'server_id';

    public $table = 'servers';

  
    public function scopeActive($query)
    {
        return $query->where('active', 'Y');

    }
}
