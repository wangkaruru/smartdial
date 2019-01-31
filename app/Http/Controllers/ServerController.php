<?php

namespace App\Http\Controllers;

use App\Models\Server;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ServerController extends Controller
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */

    public function index()
    {
        try{
            return response()->json(Server::active()->paginate(10)->toArray());
        } catch (\Exception $e) {
 
            return response()->json(['message' => $e->getMessage()], 422);
        }
    }

    /**
     *
     */
  

    /**
     * @param Request $request
     */
    public function store(Request $request)
    {
        try{

//
        } catch (\Exception $e) {
 
            return response()->json(['message' => $e->getMessage()], 422);
        }
    }

    /**
     * @param Server $server
     */
    public function show(Server $server)
    {
        try{

//
        } catch (\Exception $e) {
 
            return response()->json(['message' => $e->getMessage()], 422);
        }
    }

   

    /**
     * @param Request $request
     * @param Server $server
     */
    public function update(Request $request, Server $server)
    {
        try{

            //

        } catch (\Exception $e) {
 
            return response()->json(['message' => $e->getMessage()], 422);
        }
    }

    /**
     * @param Server $server
     */
    public function destroy(Server $server)
    {
        try{
                //
        } catch (\Exception $e) {
 
            return response()->json(['message' => $e->getMessage()], 422);
        }
    }
}
