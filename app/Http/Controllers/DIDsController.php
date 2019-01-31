<?php

namespace App\Http\Controllers;

use App\Models\DID;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class DIDsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       try{ $dids = DB::table('vicidial_inbound_dids')->where([
            ['did_active', '=', 'Y'],            
        ])->get();
    
        return response()->json(['data'=>$dids],200);
    } catch (\Exception $e) {
 
        return response()->json(['message' => $e->getMessage()], 422);
    }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
  
   /* public function store(Request $request)
    {
        
        $validation = Validator::make($request->all(), [
            'mix_id'=>'required',
           'mix_name'=>'required',
            
    ]);

    if ($validation->fails()) {

        return response()->json(['message' => $validation->messages()->all()], 422);
        
    }else{
        try{
 //$data=$request->all();
$did = new Vlist();
$did->campaign_id = $campaign_id;
$did->vcl_name=$request->mix_name;
$did->vcl_id=$request->mix_id;
$did->mix_method=$request->mix_method;

if($did->save()){

   return response()->json(['data' => $did], 201);

}else{

   return response()->json(['message' => $e->getMessage()], 422);}

       


        } catch (\Exception $e) {

            return response()->json(['message' => 'Data could not be saved'], 422);
        }
    }
         

    
    }
*/

    /**
     * Display the specified resource.
     *
     * @param  \App\DID  $dID
     * @return \Illuminate\Http\Response
     */
    public function show(DID $dID)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\DID  $dID
     * @return \Illuminate\Http\Response
     */
    public function edit(DID $dID)
    {
        //
    }
  
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\DID  $dID
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DID $dID)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\DID  $dID
     * @return \Illuminate\Http\Response
     */
    public function destroy($did_id)
    {
        $did=DID::findOrFail($did_id);
        $did->delete();
  
        return response()->json(['data'=>$did],200);
    }
}
