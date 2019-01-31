<?php

namespace App\Http\Controllers;

use App\Models\vicidialStatuses;
use Illuminate\Http\Request;

class VicidialStatusesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    
    public function index()
    {
        try {
            $vstatus =VicidialStatuses::all();
            return response()->json(['response' => 'success', 'vstatus' => $vstatus]);
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

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\vicidialStatuses  $vicidialStatuses
     * @return \Illuminate\Http\Response
     */
    public function show(vicidialStatuses $vicidialStatuses)
    {
        try{
//
        } catch (\Exception $e) {
 
            return response()->json(['message' => $e->getMessage()], 422);
        }
    }



    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\vicidialStatuses  $vicidialStatuses
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, vicidialStatuses $vicidialStatuses)
    {
        try{

        } catch (\Exception $e) {
 
            return response()->json(['message' => $e->getMessage()], 422);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\vicidialStatuses  $vicidialStatuses
     * @return \Illuminate\Http\Response
     */
    public function destroy(vicidialStatuses $vicidialStatuses)
    {
        try{

        } catch (\Exception $e) {
 
            return response()->json(['message' => $e->getMessage()], 422);
        }
    }
}
