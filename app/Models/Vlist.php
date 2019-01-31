<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Vlist extends Model
{
    
 
    /**
     * @var string
     */

    public $table ='vicidial_campaigns_list_mix';

    protected $fillable = [
        'vcl_id', 'vcl_name','campaign_id'
    ];
 
    /**
     * @var string
     */
    protected $primaryKey = 'vcl_id';

    /**
     * @var bool
     */
    public $timestamps = false;

    /**
     * @var array
     */
    protected $guarded = [];
}
