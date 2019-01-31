<?php

namespace App\Http\Controllers;
use App\Models\Hotkey;
use App\Models\Campaign;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;


class HotkeysController extends Controller

{


    public function __construct()
    {
        $this->middleware('auth:api');
    }
    
    public function index()

    {
        try {
            return response()->json(Hotkey::paginate(10)->toArray());
           
        } catch (\Exception $e) {

            return response()->json(['message' => $e->getMessage()], 422);
        }
    }

   
    //show the hotkey of a campaign

    public function show($hotkey)
    {
        try {
           
       $key = Hotkey::where('hotkey',$hotkey)->get();
            return response()->json(['response' => 'success', 'hotkey' => $key]);
        } catch (\Exception $e) {

            return response()->json(['message' => $e->getMessage()], 422);
        }
    }

    public function store(Request $request,$campaign_id)

    {        
         $validation = Validator::make($request->all(), [
            'hotkey'=>'required',
            'status'=>'required'
            
    ]);

    if ($validation->fails()) {

        return response()->json(['message' => $validation->messages()->all()], 422);
        
    }else{
        try{
       
        $h = Hotkey::firstOrCreate(
                [
                    'hotkey'=>$request->hotkey,
                    'status'=>$request->status
                ],
                [
                    'hotkey'=>$request->hotkey,
                    'status'=>$request->status,
                    'campaign_id'=>$campaign_id
                ]
                
            );

            return response()->json(['message' => $h], 201);

        } catch (\Exception $e) {

            return response()->json(['message' => $e->getMessage()], 422);
        }
    }
    }


    public function update(Request $request,Hotkey $hotkey)
    
    {
             
       
        try {
            $key = Hotkey::find('hotkey', $hotkey);
            $key->update($hotkey);

            return response()->json(['response' => 'success', 'message' => 'Hotkey updated']);

        } catch (\Exception $e) {

            return response()->json(['message' => $e->getMessage()], 422);
        }
    }




  //destroy a hotkey

    public function destroy($hotkey)
    {
        try {
       
            Hotkey::where('hotkey',$hotkey)->delete();

            return response()->json(['response' => 'success', 'message' => 'Hotkey Deleted']);

        } catch (\Exception $e) {

            return response()->json(['message' => $e->getMessage()], 422);
        }
    }
    

  
}
