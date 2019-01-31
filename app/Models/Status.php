<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Http\Resources\Campaign;

class Status extends Model
{
    public $table = 'vicidial_campaign_statuses';
    protected $primaryKey = 'status';
    protected $fillable = [
        'status', 'status_name',
    ];
    public $incrementing = false;

    public function campaigns()
    {
    	return $this->belongsTo(Campaign::class,'campaign_id','campaign_id');
    }
    

    public function scopeActive($query)
    {
        return $query->where('active', 'Y');

    }



    public $timestamps = false;


}
