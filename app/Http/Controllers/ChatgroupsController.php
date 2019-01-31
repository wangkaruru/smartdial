<?php

namespace App\Http\Controllers;

use App\Models\ChatGroup;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ChatgroupsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // return response()->json(ChatGroup::active()->paginate(10)->toArray());
try{
    $chats = DB::table('vicidial_inbound_groups')->where([
        ['active', '=', 'Y'],            
    ])->get();

    return response()->json(['data'=>$chats],200);
} catch (\Exception $e) {
 
    return response()->json(['message' => $e->getMessage()], 422);
}
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // perfom validation if need be as below
        $rules=[
            'group_id'=>'required',
            'group_name'=>'required',
           
           ];
           $this->validate($request,$rules);
           $data=$request->all();
          try{          
           $chatgroup=ChatGroup::create($data);
           return response()->json(['data'=>$chatgroup],201);
        } catch (\Exception $e) {
 
            return response()->json(['message' => $e->getMessage()], 422);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ChatGroup  $chatGroup
     * @return \Illuminate\Http\Response
     */
    public function show(ChatGroup $chatGroup)
    {
        try{
            //

        } catch (\Exception $e) {
 
            return response()->json(['message' => $e->getMessage()], 422);
        }
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ChatGroup  $chatGroup
     * @return \Illuminate\Http\Response
     */
    public function edit(ChatGroup $chatGroup)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ChatGroup  $chatGroup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ChatGroup $chatGroup)
    {
        try{

            //
        } catch (\Exception $e) {
 
            return response()->json(['message' => $e->getMessage()], 422);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ChatGroup  $chatGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy($group_id)
    {
       try{ $chat=ChatGroup::findOrFail($group_id);
        $chat->delete();
  
      return response()->json(['data'=>$chat],200);
    } catch (\Exception $e) {
 
        return response()->json(['message' => $e->getMessage()], 422);
    }
    }
}


