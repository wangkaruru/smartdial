<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LeadRecycle extends Model
{
    public $table = 'vicidial_lead_recycle';
    protected $primaryKey = 'recycle_id';
    protected $fillable = [
        'status', 
    ];
  

    public function vicidialStatus()
    {
    	return $this->belongsTo(vicidialStatus::class,'status','status');
    }

    public function scopeActive($query)
    {
        return $query->where('active', 'Y');

    }

    public function campaigns()
    {
    	return $this->belongsTo(Campaign::class,'campaign_id','campaign_id');
    }

    public $timestamps = false;

}
