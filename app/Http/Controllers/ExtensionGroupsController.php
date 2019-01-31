<?php

namespace App\Http\Controllers;
use App\Models\Extension_Groups;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ExtensionGroupsController extends Controller
{


    public function index()
    {
        try{
        $xt_groups =Extension_Groups::all();
        return response()->json(['data'=> $xt_groups], 200) ;
    } catch (\Exception $e) {
 
        return response()->json(['message' => $e->getMessage()], 422);
    }
    }



    public function store(Request $request,$extension_group_id)
    {
        $validation = Validator::make($request->all(), [
        
    ]);

    if ($validation->fails()) {

        return response()->json(['message' => $validation->messages()->all()], 422);
        
    }else{
        try{

    $xt_groups = new Extension_Groups();
    $xt_groups->extension_group_id=$extension_group_id;
    $xt_groups->extension=$request->extension;
   // $xt_groups->rank=$request->rank;
    //$xt_groups->campaign_groups=$request->campaign_groups;
    //$xt_groups->call_count_today=$request->call_count_today;
    //$xt_groups->last_call_time=$request->last_call_time;
    //$xt_groups->last_callerid=$request->last_callerid;

if($xt_groups->save()){

   return response()->json(['data' => $xt_groups], 201);

}else{

   return response()->json(['message' => $e->getMessage()], 422);}

       


        } catch (\Exception $e) {

            return response()->json(['message' => 'Data could not be saved'], 422);
        }
    }
         

    
    }
  
    public function show($extension_id)
    {
        try {
   
            $xt_groups = Extension_Groups::find($extension_id);
           
                return response()->json(['response' => 'success', 'xt_groups' => $xt_groups]);
            } catch (\Exception $e) {
    
                return response()->json(['message' => $e->getMessage()], 422);
            } 
    
    }

  
    public function update(Request $request, Extension_Groups $extension_Groups)
    {
        
    }

    public function destroy($extension_id)
    {
        try {

            $xt_groups = Extension_Groups::findOrFail($extension_id);
            $xt_groups->delete();

            return response()->json(['response' => 'success', 'message' => 'Extension Deleted']);

        } catch (\Exception $e) {

            return response()->json(['message' => $e->getMessage()], 422);
        }
    }

    
}
