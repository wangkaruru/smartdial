<?php

namespace App\Http\Controllers;

use App\Models\Status;
use App\Models\Campaign;
use Illuminate\Http\Request;
use App\Events\CampaignCreated;
use Illuminate\Support\Facades\Validator;

class CampaignController extends Controller

{



    // public function __construct()
    // {
    //     $this->middleware('auth:api');
    // }
    //Function to pull all campaigns active/inactive

    public function index()
    {
        $campaigns =Campaign::all();
        return response()->json(['data'=> $campaigns], 200) ; 
       
    }

   //Function to create campaign & campaignstatus
    public function store(Request $request)
    {
            $validation = Validator::make($request->all(), [
                'campaign_id'=>'required|min:2',
                'campaign_name'=>'required',
        ]);

        if ($validation->fails()) {

            return response()->json(['message' => $validation->messages()->all()], 422);
            
        } else {
            $data=$request->all();
            
        try {

            $campaign = Campaign::create($data);//create acampaign
            event(new CampaignCreated ($campaign) );/*triger an event that 
            automatically generates the campaign status to none using the rship.

           */
            return response()->json(['message' => 'Campaign added $ status set to none!', 'data' => $campaign]);

        } catch (\Exception $e) {

            return response()->json(['message' => $e->getMessage()], 422);
        }
    }
    }
   

   
//Function to  show acampaign by id
    public function show($campaign_id)
    {
        try{
            $campaign = Campaign::findOrFail($campaign_id);

        return response()->json(['response' => 'success', 'campaign' => $campaign]);
    } catch (\Exception $e) {
 
        return response()->json(['message' => $e->getMessage()], 422);
    }
    }

//Function for listing all statuses for a particular campaign
public function campaignStatuses($campaign_id)
    {
        try {
        $campaign = Campaign::findOrFail($campaign_id);

        return $campaign->statuses()->get();


       // return response()->json(['response' => 'success', 'campaign' => $campaign]);

        } catch (\Exception $e) {

            return response()->json(['message' => $e->getMessage()], 422);
        }
        
    }

    



   //Function to update campaign
   public function update(Request $request,Campaign $campaign)
   {
        
     
        try {
            
            $campaign->update($request->all());
    
            return response()->json(['message' => 'campaign updated!', 'data' => $campaign]);

        } catch (\Exception $e) {

            return response()->json(['message' => $e->getMessage()], 422);
        }
        
    
    }

    //Function to delete a campaign
    public function destroy($campaign_id)
    {
        try {

            $campaign = Campaign::findOrFail($campaign_id);
            $campaign->delete();

            return response()->json(['response' => 'success', 'message' => 'Campaign Deleted']);

        } catch (\Exception $e) {

            return response()->json(['message' => $e->getMessage()], 422);
        }
    }
}