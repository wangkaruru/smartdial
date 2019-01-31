<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ChatGroup extends Model
{
    public $table='vicidial_inbound_groups';
    protected $primaryKey = 'group_id';
}
