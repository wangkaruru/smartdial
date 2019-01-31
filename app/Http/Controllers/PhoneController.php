<?php

namespace App\Http\Controllers;

use App\Models\Phone;
use Illuminate\Http\Request;

class PhoneController extends Controller
{
    
  
    public function index()
    {
      return response()->json(Phone::active()->paginate(10)->toArray());
   
    }
    public function store(Request $request)
    {
        try{

            //

    } catch (\Exception $e) {
 
        return response()->json(['message' => $e->getMessage()], 422);
    }

    }


    public function show(Request $request)
    {
try{

    //
} catch (\Exception $e) {
 
    return response()->json(['message' => $e->getMessage()], 422);
}
    }

  
    public function update(Request $request, Phone $phone)
    {
        try{
            
//
} catch (\Exception $e) {
 
    return response()->json(['message' => $e->getMessage()], 422);
}

        
    }


    public function destroy(Phone $phone)
    {
        try{

        //

        } catch (\Exception $e) {
 
            return response()->json(['message' => $e->getMessage()], 422);
        }
    }
}
