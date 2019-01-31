<?php

namespace App\Http\Controllers;

use App\Models\Carrier;
use Illuminate\Http\Request;

class CarriersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    public function index()
    {
      try{
        return response()->json(['data' => Carrier::all()], 200);
    } catch (\Exception $e) {
 
        return response()->json(['message' => $e->getMessage()], 422);
    }
    
    }
   

    public function store(Request $request)
    {
        //
    }

 
    public function show($id)
    {
        try{
        $carr = Carrier::findOrFail($id);
        return response()->json(['data' => $carr], 200);
    } catch (\Exception $e) {
 
        return response()->json(['message' => $e->getMessage()], 422);
    }
    }

  
    public function update(Request $request, Carrier $carrier)
    {
       try{ 
    
        
               
        if($carrier->update(['carrier_name' =>$request->carrier_name])){
    
            return response()->json(['data' => $carrier], 200);
    
            }else{
    
           return response()->json(['message' => $e->getMessage()], 422);}
    
           
       } catch (\Exception $e) {
       
        return response()->json(['message' => 'Data could not be saved'], 422);
    } 
    
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Carrier  $carrier
     * @return \Illuminate\Http\Response
     */
    public function destroy(Carrier $carrier)
    {
        //
    }
}
