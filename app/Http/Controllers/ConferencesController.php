<?php

namespace App\Http\Controllers;
use App\Models\Conference;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ConferencesController extends Controller
{
<<<<<<< HEAD
   
=======
      
>>>>>>> 1461621d1b878b67bda2ebe455f249df354cd5f1
    public function index()
    {
        try{
        $conference =Conference::all();
       return response()->json(['data'=> $conference], 200) ; 
    } catch (\Exception $e) {
 
        return response()->json(['message' => $e->getMessage()], 422);
    }
    }


    public function store(Request $request)
    {
     
        $validation = Validator::make($request->all(), [
            'conf_exten' => 'required',
            'server_ip' => 'required',
        ]);

        if ($validation->fails()) {

            return response()->json(['message' => $validation->messages()->first()], 422);

        } else {

            $data = $request->all();

            $conf = Conference::create($data);
            return response()->json(['response' => 'success', 'message' => 'Conference Created', 'data' => $conf]);
        }
    }


    public function show($conf_exten)
    {
        try {
        $conference = Conference::where('conf_exten',$conf_exten)->get();

        return response()->json(['response' => 'success', 'conference' => $conference]);
        
    } catch (\Exception $e) {

        return response()->json(['message' => $e->getMessage()], 422);
    }
}

 
    public function update(Request $request, Conference $conference)
    {
        //
    }

    public function destroy($conf_exten)
    {
        
        try {

            $conf = Conference::find($conf_exten);
            $conf->delete();

            return response()->json(['response' => 'success', 'message' => 'conference Deleted']);

        } catch (\Exception $e) {

            return response()->json(['message' => $e->getMessage()], 422);
        }
    }
}


