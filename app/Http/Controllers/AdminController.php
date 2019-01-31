<?php

namespace App\Http\Controllers;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AdminController extends Controller
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */


    // public function __construct()
    // {
    //     $this->middleware('auth:api');
    // }

  
    public function index()
    {
      try{
        return response()->json(['data' => Admin::all()], 200);
    } catch (\Exception $e) {
 
        return response()->json(['message' => $e->getMessage()], 422);
    }
    
    }


    public function show($id)
    {
        try{
        $times = Admin::findOrFail($id);
        return response()->json(['data' => $times], 200);
    } catch (\Exception $e) {
 
        return response()->json(['message' => $e->getMessage()], 422);
    }
    }

  

    public function store(Request $request, $call_time_id)
    {
        $validation = Validator::make($request->all(), [
            'call_time_name'=>'required',
           // 'default_start'=>'required',
          //  'default_stop'=>'required'
                 
    ]);

    if ($validation->fails()) {

        return response()->json(['message' => $validation->messages()->all()], 422);
        
    }else{
        try{

            $admin = new Admin();
            $admin->call_time_name=$request->call_time_name;
            $admin->call_time_id=$call_time_id;
                   
         
if($admin->save()){
    
   return response()->json(['data' => $admin], 201);

}else{

   return response()->json(['message' => $e->getMessage()], 422);}       


        } catch (\Exception $e) {

            return response()->json(['message' => 'Data could not be saved'], 422);
        }
    }
         

    
    }



    public function update(Request $request, Admin $admin)
    {
       try{ 
    
        $admin->call_time_name=$request->call_time_name;
        $admin->call_time_id=$request->call_time_id;
           
        
        if($admin->update()){
    
            return response()->json(['data' => $admin], 200);
    
            }else{
    
           return response()->json(['message' => $e->getMessage()], 422);}
    
           
       } catch (\Exception $e) {
       
        return response()->json(['message' => $e->getMessage()], 422);
    } 
    
    }
  
    public function destroy($id)
    {
        try {

            $calltime = Admin::findOrFail($id);
            $calltime->delete();

            return response()->json(['response' => 'success', 'message' => 'Call time Deleted']);

        } catch (\Exception $e) {

            return response()->json(['message' => $e->getMessage()], 422);
        }
    }
}
