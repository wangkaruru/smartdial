<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Conference extends Model
{
    public $table= 'conferences';
    public $incrementing = false;
    protected $fillable = [
        'conf_exten', 'server_ip',
    ];

    public $timestamps = false;
    protected $primaryKey = 'conf_exten';
}
