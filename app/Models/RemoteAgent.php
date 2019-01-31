<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class RemoteAgent extends Model
{
    public $table = 'vicidial_remote_agents';

    protected $primaryKey = 'remote_agent_id';
    
    protected $fillable = [
       
    ];
    public $timestamps = false;
    protected $guarded = [];
}
