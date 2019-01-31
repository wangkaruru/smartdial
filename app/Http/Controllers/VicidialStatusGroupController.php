<?php

namespace App\Http\Controllers;

use App\Models\VicidialStatusGroup;
use Illuminate\Http\Request;

class VicidialStatusGroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
        $statgroup =VicidialStatusGroup::all();
        return response()->json(['data'=> $statgroup], 200) ; 
    } catch (\Exception $e) {
 
        return response()->json(['message' => $e->getMessage()], 422);
    }
    }

   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try{

        } catch (\Exception $e) {
 
            return response()->json(['message' => $e->getMessage()], 422);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\VicidialStatusGroup  $vicidialStatusGroup
     * @return \Illuminate\Http\Response
     */
    public function show(VicidialStatusGroup $vicidialStatusGroup)
    {
        try{

        } catch (\Exception $e) {
 
            return response()->json(['message' => $e->getMessage()], 422);
        }
    }

    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\VicidialStatusGroup  $vicidialStatusGroup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, VicidialStatusGroup $vicidialStatusGroup)
    {
        try{

        } catch (\Exception $e) {
 
            return response()->json(['message' => $e->getMessage()], 422);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\VicidialStatusGroup  $vicidialStatusGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy(VicidialStatusGroup $vicidialStatusGroup)
    {
        try{

        } catch (\Exception $e) {
 
            return response()->json(['message' => $e->getMessage()], 422);
        }
    }
}
