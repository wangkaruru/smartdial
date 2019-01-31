<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hotkey extends Model
{

    public $incrementing = false;
    public $table = 'vicidial_campaign_hotkeys';
    protected $primaryKey = 'status';
    protected $fillable = [
        'status','hotkey','campaign_id'
    ];
    public $timestamps = false;
    public function campaigns()
    {
        return $this->belongsTo(Campaign::class,'campaign_id','campaign_id');
    }
}
