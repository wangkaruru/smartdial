<?php

namespace App\Http\Controllers;

use App\Models\Vlists;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class VlistsController extends Controller
{
    /**
     * @return \Illuminate\Http\JsonResponse
     */

    // public function __construct()
    // {
    //     $this->middleware('auth:api');
    // }

    public function index()
    {
        try{
        
        return response()->json(Vlists::active()->paginate(10)->toArray());
    } catch (\Exception $e) {
 
        return response()->json(['message' => $e->getMessage()], 422);
    }
        
    }

 
    public function store(Request $request)
    {
     
        $validation = Validator::make($request->all(), [
            'list_id' => 'required',
        ]);

        if ($validation->fails()) {

            return response()->json(['message' => $validation->messages()->first()], 422);

        } else {

            $data = $request->all();

            $lists = Vlists::create($data);
            return response()->json(['response' => 'success', 'message' => 'Lists Created', 'data' => $lists]);
        }
    }

    /**
     * @param $id
     */
    public function show($list_id)
    {
        try{
        
        $lists=Vlists::findOrFail($list_id);
          
        return response()->json(['data'=>$lists],200);

    } catch (\Exception $e) {
 
        return response()->json(['message' => $e->getMessage()], 422);
    }
    }


    public function update(Request $request, $list_id)
    {
       //$this->authorize('isAdmin') || $this->authorize('isSupervisor');

        $list=Vlists::findOrFail($list_id);
        $rules=[
                      
        ];

        if($request->has('list_name')){
        $list->list_name=$request->list_name;
        }
        
        if($request->has('list_description')){
            $list->list_description=$request->list_description;
            }
        if ($request->has('campaign_id')){
            $list->campaign_id=$request->campaign_id;
        }

if(!$list->isDirty()){
    return response()->json(['error'=>'You need  to specify  something for an update' , 'code'=>422],422);
    
    }
$list->update($request->all());
return response()->json(['data'=>$list],200);

    }


    /**
     * @param $id
     */
    public function destroy($list_id)
    {
        try{
  
        $list=Vlists::findOrFail($list_id);
        $list->delete();
  
      return response()->json(['data'=>$list],200);

        } catch (\Exception $e) {
 
            return response()->json(['message' => $e->getMessage()], 422);
        }

    
    }
}
