<?php

namespace App\Http\Controllers;
use App\Models\Status;
use App\Models\LeadRecycle;
use Illuminate\Http\Request;
use App\Models\vicidialStatuses;
use Illuminate\Support\Facades\Validator;

class LeadRecyclesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->middleware('auth:api');
    }


    public function index()
    {
      try {
        $statuses =LeadRecycle::all();
        return response()->json(['response' => 'success', 'lead' => $statuses]);
    } catch (\Exception $e) {

        return response()->json(['message' => $e->getMessage()], 422);
    }
      
     
    }
//




//route to create an auto-alt-dial

public function create(Request $request,$campaign)
{
    $validation = Validator::make($request->all(), [
        'status'=>'required',
            
]);

if ($validation->fails()) {

    return response()->json(['message' => $validation->messages()->all()], 422);
    
}else{
    try{
       
        $dial = new Status();
        
        $dial->status=$request->status;
        $dial->campaign_id=$request->campaign_id; 
if($dial->save()){

return response()->json(['data' => $dial], 201);

}else{

return response()->json(['message' => $e->getMessage()], 422);}

     
    } catch (\Exception $e) {

        return response()->json(['message' => 'Data could not be saved'], 422);
    }
}
     


}

//Route to create a lead recycle
   
    public function store(Request $request,$campaign_id)
    {
        $validation = Validator::make($request->all(), [
            'status'=>'required',
            'attempt_delay'=>'required',
            'attempt_maximum'=>'required',
            
    ]);

    if ($validation->fails()) {

        return response()->json(['message' => $validation->messages()->all()], 422);
        
    }else{
        try{
       
 $lead = new LeadRecycle();
 $lead->campaign_id = $campaign_id;
 $lead->status=$request->status;
 $lead->attempt_delay=$request->attempt_delay;
 $lead->attempt_maximum=$request->attempt_maximum;

 if($lead->save()){

    return response()->json(['data' => $lead], 201);

 }else{

    return response()->json(['message' => $e->getMessage()], 422);}

         
        } catch (\Exception $e) {

            return response()->json(['message' => 'Data could not be saved'], 422);
        }
    }
         

    
    }
//Route for showing one campaign-lead recycles
   
    public function showOne(Request $request,$campaign)
    {
        try {
       
           // dd($request->all());
            $lead = LeadRecycle::where('campaign_id',$request->campaign_id)->get();
                return response()->json(['response' => 'success', 'lead' => $lead]);
            } catch (\Exception $e) {
    
                return response()->json(['message' => $e->getMessage()], 422);
            } 
   
    }
//Route for showing one campaign-lead recycles
 
public function show($recycle_id)
{
    try {
   
        $lead = LeadRecycle::where('recycle_id',$recycle_id)->get();
       
            return response()->json(['response' => 'success', 'lead' => $lead]);
        } catch (\Exception $e) {

            return response()->json(['message' => $e->getMessage()], 422);
        } 

}


public function update(Request $request,$status)
    {

        
        try {

         $lead = LeadRecycle::find('status', $status);
         $lead->attempt_delay=$request->attempt_delay;
         $lead->attempt_maximum=$request->attempt_maximum;
         
         if($lead->save()){

            return response()->json(['data' => $lead], 200);
        
         }else{
        
            return response()->json(['message' => $e->getMessage()], 422);}

        } 
        catch (\Exception $e) {

            return response()->json(['message' => $e->getMessage()], 422);
        }
    
    }


  
 // destroying a lead
    
    public function destroy($status)
    {
        try {

           LeadRecycle::where('status', $status)->delete();
           return response()->json(['response' => 'success', 'message' => 'Lead Deleted']);

        } catch (\Exception $e) {

            return response()->json(['message' => $e->getMessage()], 422);
        }
    }




}
