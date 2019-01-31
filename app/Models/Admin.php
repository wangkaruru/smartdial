<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Admin extends Model
{

    public $table = 'vicidial_call_times';
    public $incrementing = false;

    protected $fillable=[

        'call_time_name','call_time_name','call_time_comments','call_time_id','ct_default_start','ct-default_stop'
    ];
    
    protected $primaryKey = 'call_time_id';

    public $timestamps = false;
}
