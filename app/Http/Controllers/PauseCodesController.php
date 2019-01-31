<?php

namespace App\Http\Controllers;

use App\Models\PauseCode;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PauseCodesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
 

    public function index()
    {
        try {
            $codes =PauseCode::all();
            return response()->json(['response' => 'success', 'pausecodes' => $codes]);
        } catch (\Exception $e) {
    
            return response()->json(['message' => $e->getMessage()], 422);
        }
          
    }

  
 
    public function store(Request $request,$campaign_id)
    {
        $validation = Validator::make($request->all(), [
            'pause_code'=>'required',
           'pause_code_name'=>'required',
            
    ]);

    if ($validation->fails()) {

        return response()->json(['message' => $validation->messages()->all()], 422);
        
    }else{
        try{

            $pauseCode = new PauseCode();
            $pauseCode->campaign_id = $campaign_id;
            $pauseCode->pause_code=$request->pause_code;
            $pauseCode->pause_code_name=$request->pause_code_name;
           // $pauseCode->require_mgr_approval=$request->require_mgr_approval; //accepts yes or no values only
           // $pauseCode->time_limit=$request->time_limit;
            //$pauseCode->billable=$request->billable; //accepts yes/no/half values only

if($pauseCode->save()){

   return response()->json(['data' => $pauseCode], 201);

}else{

   return response()->json(['message' => $e->getMessage()], 422);}       


        } catch (\Exception $e) {

            return response()->json(['message' => 'Data could not be saved'], 422);
        }
    }
         

    
    }

 

    public function show(Request $request,$campaign_id)
    {
        try {       
           
            $pauseCode = PauseCode::where('campaign_id',$request->campaign_id)->get();
                return response()->json(['response' => 'success', 'pausecodes' => $pauseCode]);
            } catch (\Exception $e) {
    
                return response()->json(['message' => $e->getMessage()], 422);
            } 
   
    }
 

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PauseCode  $pauseCode
     * @return \Illuminate\Http\Response
     */
 
    public function update(Request $request, PauseCode $pauseCode)
    {
        try{ 
          
           // $UpdateDetails =PauseCode::where('pause_code', $pauseCode)->firstOrFail();

            $pauseCode->pause_code =$request->pause_code;
            $pauseCode->pause_code_name  =$request->pause_code_name;
            $pauseCode->billable=$request->billable;
         
            
            if($pauseCode->update()){
        
                return response()->json(['data' => $pauseCode], 200);
        
                }else{
        
               return response()->json(['message' => $e->getMessage()], 422);}
        
               
           } catch (\Exception $e) {
           
            return response()->json(['message' => $e->getMessage()], 422);
        } 
        
    }

  
    public function destroy(PauseCode $pauseCode,$campaign_id)
    {
               
            try {
    
                $pauseCode = PauseCode::find($pauseCode)->where([
                    ['campaign_id', '=', '$campaign_id'],            
                ]);
                $pauseCode->delete();
    
                return response()->json(['response' => 'success', 'message' => 'Pause code Deleted']);
    
            } catch (\Exception $e) {
    
                return response()->json(['message' => $e->getMessage()], 422);
            }
        
    }
}
