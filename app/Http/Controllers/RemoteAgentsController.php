<?php

namespace App\Http\Controllers;

use App\Models\RemoteAgent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class RemoteAgentsController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        $agents =RemoteAgent::all();
       return response()->json(['data'=> $agents], 200) ; 
    }

    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
           
           'server_ip'=>'required',
            
    ]);

    if ($validation->fails()) {

        return response()->json(['message' => $validation->messages()->all()], 422);
        
    }else{
        try{

            $agent= new RemoteAgent();
            $agent->server_ip = $request->server_ip;
            
            
            $agent->user_start=$request->user_start;
            $agent->number_of_lines=$request->number_of_lines; 
            $agent->conf_exten=$request->conf_exten;
            $agent->status=$request->status;
            $agent->campaign_id=$request->campaign_id;
            $agent->closer_campaigns=$request->closer_campaigns;
            $agent->extension_group=$request->extension_group;
            $agent->extension_group_order=$request->extension_group_order;
            $agent->on_hook_agent=$request->on_hook_agent;
            $agent->on_hook_ring_time=$request->on_hook_ring_time;
                  
            if($agent->save()){

                return response()->json(['data' => $agent], 201);
            
             }else{
            
                return response()->json(['message' => $e->getMessage()], 422);}
            
                  

        } catch (\Exception $e) {

            return response()->json(['message' => 'Data could not be saved'], 422);
        }
    }     

    
    }

 //Route for showing all vlists for a single campaign
   
 public function show($remote_agent_id)
 {
     try {
    
        
        $gent = RemoteAgent::find($remote_agent_id);
             return response()->json(['response' => 'success', 'agent' => $gent]);
         } catch (\Exception $e) {
 
             return response()->json(['message' => $e->getMessage()], 422);
         } 

 }

    public function destroy($remote_agent_id)
    {
        try {

            $gent = RemoteAgent::findOrFail($remote_agent_id);
            $gent->delete();

            return response()->json(['response' => 'success', 'message' => 'Extension Deleted']);

        } catch (\Exception $e) {

            return response()->json(['message' => $e->getMessage()], 422);
        }
    }
}
