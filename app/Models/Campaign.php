<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Campaign extends Model
{
    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var string
     */
    protected $primaryKey = 'campaign_id';

    /**
     * @var string
     */
    public $table = 'vicidial_campaigns';

    /**
     * @var bool
     */
    public $incrementing = false;

    /**
     * @var array
     */
    protected $guarded = [];
   // protected $fillable = ['campaign_name','campaign_description'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
public function hotkeys(){
    return $this->hasMany(Hotkeys::class,'campaign_id','campaign_id');
}

    public function statuses()
    {
       return $this->hasMany(Status::class,'campaign_id','campaign_id');
    }
    public function inbounds()
    {
       return $this->hasMany(Inbound::class,'campaign_id','campaign_id');
    }
    public function leadrecycles()
    {
       return $this->hasMany(LeadRecycle::class,'campaign_id','campaign_id');
    }
    public function listmixes()
    {
       return $this->hasMany(Vlist::class,'campaign_id','campaign_id');
    }
    public function pausecodes()
    {
       return $this->hasMany(PauseCode::class,'campaign_id','campaign_id');
    }



    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    /**
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeActive($query)
    {
        return $query->where('active', 'Y');

    }
    public function groups()
    {
        return $this->belongsToMany(Group::class);
    }


    
}
