<?php

namespace App\Listeners;

use App\Models\Status;
use App\Events\CampaignCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class CreateStatus
{
    
    public function __construct()
    {
        //
    }

    //alistener that generates a status to default 'none'  everytime acampaign is created
    public function handle(CampaignCreated $event)
    {
        $status= new Status();
        $status->status='None';

        $event->campaign->status()->save($status);
    }
}
