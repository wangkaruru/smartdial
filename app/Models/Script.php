<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Script extends Model
{
  
    public $table = 'vicidial_scripts';

    protected $primaryKey = 'script_id';

    public $timestamps = false;

    protected $guarded = [];

    public function scopeActive($query)
    {
        return $query->where('active', 'Y');

    }
}
