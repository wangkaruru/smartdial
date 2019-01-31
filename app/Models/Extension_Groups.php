<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class Extension_Groups extends Model
{
    public $table = 'vicidial_extension_groups';
    protected $primaryKey = 'extension_id';
    public $timestamps = false;
}
