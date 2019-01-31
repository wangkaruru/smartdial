<?php

namespace App\Http\Controllers;

use App\Models\Shift;
use Illuminate\Http\Request;

class ShiftsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        try{
        return response()->json(['data' => Shift::all()], 200);

         } catch (\Exception $e) {
            return response()->json(['message' => $e->getMessage()], 422);
        }
    }

    public function store(Request $request)
    {
        try{
            //
        } catch (\Exception $e) {
 
            return response()->json(['message' => $e->getMessage()], 422);
        }
        
    }

    public function show($shift_id)
    {
        try {
       
            $shift = Shift::findOrFail($shift_id);
                return response()->json(['response' => 'success', 'status' => $shift]);
            } catch (\Exception $e) {
    
                return response()->json(['message' => $e->getMessage()], 422);
            }
    }


    public function update(Request $request, Shifts $shifts)
    {
        try{
//

        } catch (\Exception $e) {
 
            return response()->json(['message' => $e->getMessage()], 422);
        }
    }

 
    public function destroy($shift_id)
    {
        try {
       
            $shift = Shift::findOrFail($shift_id)->delete();
                return response()->json(['response' => 'success', 'shift' => $shift]);
            } catch (\Exception $e) {
    
                return response()->json(['message' => $e->getMessage()], 422);
            }
    }

}
