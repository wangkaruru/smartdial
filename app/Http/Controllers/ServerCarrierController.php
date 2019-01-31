<?php

namespace App\Http\Controllers;

use App\Models\ServerCarrier;
use Illuminate\Http\Request;

class ServerCarrierController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try{
            return response()->json(['data' => ServerCarrier::all()], 200);
    
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

    public function show(ServerCarrier $serverCarrier)
    {
        try{

            //
        } catch (\Exception $e) {
 
            return response()->json(['message' => $e->getMessage()], 422);
        }
    }

    public function update(Request $request, ServerCarrier $serverCarrier)
    {
        try{
//
        } catch (\Exception $e) {
 
            return response()->json(['message' => $e->getMessage()], 422);
        }
    }


    public function destroy(ServerCarrier $serverCarrier)
    {
        try{
//
        } catch (\Exception $e) {
 
            return response()->json(['message' => $e->getMessage()], 422);
        }
    }
}
