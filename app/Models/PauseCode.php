<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PauseCode extends Model
{
   
    public $timestamps = false;


    protected $primaryKey = 'pause_code';

 
    public $table = 'vicidial_pause_codes';


    public $incrementing = false;

    //protected $guarded = []; 
    protected $fillable = [
        'pause_code_name', 'pause_code','campaign_id','billable '
    ];

    public function campaigns()
    {
    	return $this->belongsTo(Campaign::class,'campaign_id','campaign_id');
    }
}
