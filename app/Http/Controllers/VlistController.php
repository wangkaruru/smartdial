<?php

namespace App\Http\Controllers;
use App\Models\Vlist;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VlistController extends Controller


{


    public function index()
    {
        try {
           
            
             return response()->json(Vlist::paginate(10)->toArray());
         } catch (\Exception $e) {
 
             return response()->json(['message' => $e->getMessage()], 422);
         }
    }

  
    public function store(Request $request,$campaign_id)
    {
        

        $validation = Validator::make($request->all(), [
            'mix_id'=>'required',
           'mix_name'=>'required',
            
    ]);

    if ($validation->fails()) {

        return response()->json(['message' => $validation->messages()->all()], 422);
        
    }else{
        try{
 //$data=$request->all();
$vlist = new Vlist();
$vlist->campaign_id = $campaign_id;
$vlist->vcl_name=$request->mix_name;
$vlist->vcl_id=$request->mix_id;
$vlist->mix_method=$request->mix_method;

if($vlist->save()){

   return response()->json(['data' => $vlist], 201);

}else{

   return response()->json(['message' => $e->getMessage()], 422);}

       


        } catch (\Exception $e) {

            return response()->json(['message' => 'Data could not be saved'], 422);
        }
    }
         

    
    }

   //Route for showing all vlists for a single campaign
   
   public function showOne(Request $request,$campaign)
   {
       try {
      
          
           $vlist = Vlist::where('campaign_id',$request->campaign_id)->get();
               return response()->json(['response' => 'success', 'vlist' => $vlist]);
           } catch (\Exception $e) {
   
               return response()->json(['message' => $e->getMessage()], 422);
           } 
  
   }
   
   public function show($vcl_id)
    {
        try {
        $vlist = Vlist::where('vcl_id',$vcl_id)->get();

        return response()->json(['response' => 'success', 'list' => $vlist]);
        
    } catch (\Exception $e) {

        return response()->json(['message' => $e->getMessage()], 422);
    }
}
  

public function update(Request $request, Vlist $vlist)
{
   try{ 

    $vlist->status=$request->status;
    $vlist->mix_method=$request->mix_method;
    
    if($vlist->update()){

        return response()->json(['data' => $vlist], 200);

        }else{

       return response()->json(['message' => $e->getMessage()], 422);}

       
   } catch (\Exception $e) {
   
    return response()->json(['message' => $e->getMessage()], 422);
} 

}

 
    public function destroy($list_id)
    {
        
        try {

            $vlist = Vlist::find($list_id);
            $vlist->delete();

            return response()->json(['response' => 'success', 'message' => 'List Deleted']);

        } catch (\Exception $e) {

            return response()->json(['message' => $e->getMessage()], 422);
        }
    }
}
