<?php

namespace App\Http\Controllers;
use App\Models\Status;
use App\Models\Campaign;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;

class StatusController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */


    public function index()

    {
        try {
           // $status = Status::paginate(10)->toArray();
            return response()->json(Status::paginate(10)->toArray());
        } catch (\Exception $e) {

            return response()->json(['message' => $e->getMessage()], 422);
        }
    }

   
    //show the status of a campaign

    public function show( $status)
    {
        try {
       
        $status = Status::find($status);
            return response()->json(['response' => 'success', 'status' => $status]);
        } catch (\Exception $e) {

            return response()->json(['message' => $e->getMessage()], 422);
        }
    }
    // Route to display the auto dials for a campaign
    public function showAuto(Request $request,Campaign $campaign)

    {        
        try {
       
            $status = Status::find($status);
                return response()->json(['response' => 'success', 'status' => $status]);
            } catch (\Exception $e) {
    
                return response()->json(['message' => $e->getMessage()], 422);
            }
    }
 
    
   public function create(Request $request,Campaign $campaign)

   {        
        $validation = Validator::make($request->all(), [
           'status'=>'required|max:6',
           
   ]);

   if ($validation->fails()) {

       return response()->json(['message' => $validation->messages()->all()], 422);
       
   }else{
       try{
      
           $status = new Status(['status'=>$request->input('status')]);
           return  $campaign->statuses()->save( $status);
       } catch (\Exception $e) {

           return response()->json(['message' => $e->getMessage()], 422);
       }
   }
   }

   public function store(Request $request,Campaign $campaign)

    {        
         $validation = Validator::make($request->all(), [
            'status'=>'required|max:6',
            
    ]);

    if ($validation->fails()) {

        return response()->json(['message' => $validation->messages()->all()], 422);
        
    }else{
        try{
       
            $status = new Status(['status'=>$request->input('status')]);
            return  $campaign->statuses()->save( $status);
        } catch (\Exception $e) {

            return response()->json(['message' => $e->getMessage()], 422);
        }
    }
    }

       //Function to update status
   public function update(Request $request,Status $status)   {
          
            $validation = Validator::make($request->all(), [
                'status'=>'required|min:2|max:3',
                
        ]);

        if ($validation->fails()) {

            return response()->json(['message' => $validation->messages()->all()], 422);
            
        }else{
     
        try {
                  
            $data=$request->all();
          
        /*   $lead->status=$request->status;
           $lead->status_name=$request->status_name;
           $lead->selectable=$request->selectable;
           $lead->campaign_id=$request->$campaign_id;
           $lead->human_answered=$request->human_answered;
           $lead->category=$request->category;
           $lead->sale=$request->sale;
           $lead->dnc=$request->dnc;
           $lead->customer_contact=$request->customer_contact;
           $lead->not_interested=$request->not_interested;
           $lead->unworkable=$request->unworkable;
           $lead->scheduled_callback=$request->scheduled_callback;
           $lead->completed=$request->completed;
           $lead->min_sec=$request->min_sec;
           $lead->max_sec=$request->max_sec;
           $lead->answering_machine=$request->answering_machine;
*/
           $status->update($data);    
        return response()->json(['message' => 'status updated!', 'data' => $status]);

        } catch (\Exception $e) {

            return response()->json(['message' => $e->getMessage()], 422);
        }
        
    }
    }

    public function destroy($status)
    {

       
        try {

            Status::findOrFail($status)->delete();

            return response()->json(['response' => 'success', 'message' => 'Status Deleted']);

        } catch (\Exception $e) {

            return response()->json(['message' => $e->getMessage()], 422);
        }
    }
    

  
}
