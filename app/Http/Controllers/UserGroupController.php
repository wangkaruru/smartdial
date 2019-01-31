<?php

namespace App\Http\Controllers;

use App\Models\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserGroupController extends Controller

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
        return response()->json(['data' => Group::all()], 200);
    } catch (\Exception $e) {
 
        return response()->json(['message' => $e->getMessage()], 422);
    }
    }

    public function show($user_group)
    {
        try {
        $g = Group::where('user_group',$user_group)->get();

        return response()->json(['response' => 'success', 'list' => $g]);
        
    } catch (\Exception $e) {

        return response()->json(['message' => $e->getMessage()], 422);
    }
}
  

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function store(Request $request)
    {
        $validation = Validator::make($request->all(), [
            'group_name' => 'required'
        ]);

        if ($validation->fails()) {

            return response()->json(['message' => $validation->messages()->first()], 422);

        } else {

            $data = $request->all();
            $groups = Group::create($data);
            return response()->json(['response' => 'success', 'message' => 'Group Created', 'data' => $groups]);
        }
    }

    public function update(Request $request,$user_group)
    {
          try {                
           $group=Group::find($user_group);
                    $group->user_group=$user_group;
                    $group->group_name=$request->group_name;
                   /* $group->allowed_campaigns=$request->allowed_campaigns;
                    $group->qc_allowed_campaigns=$request->qc_allowed_campaigns;
                    $group->qc_allowed_inbound_groups=$request->qc_allowed_inbound_groups;
                    $group->group_shifts=$request->group_shifts;
                    $group->forced_timeclock_login=$request->forced_timeclock_login;
                    $group->shift_enforcement=$request->shift_enforcement=$request;
                    $group->agent_status_viewable_groups=$request->agent_status_viewable_groups;
                    $group->agent_status_view_time=$request->agent_status_view_time;
                    $group->agent_call_log_view=$request->agent_call_log_view;
                    $group->agent_xfer_consultative=$request->agent_xfer_consultative;
                    $group->agent_xfer_dial_override=$request->agent_xfer_dial_override;
                    $group->agent_xfer_vm_transfer=$request->agent_xfer_vm_transfer;
                    $group->agent_xfer_blind_transfer=$request->agent_xfer_blind_transfer;
                    $group->agent_xfer_dial_with_customer=$request->agent_xfer_dial_with_customer;
                    $group->agent_xfer_park_customer_dial=$request->agent_xfer_park_customer_dial;
                    $group->agent_fullscreen=$request->agent_fullscreen;
                    $group->allowed_reports=$request->allowed_reports;
                    $group->webphone_url_override=$request->webphone_url_override;
                    $group->webphone_systemkey_override=$request->webphone_systemkey_override;
                    $group->webphone_dialpad_override=$request->webphone_dialpad_override;
                    $group->admin_viewable_groups=$request->admin_viewable_groups;
                    $group->admin_viewable_call_times=$request->admin_viewable_call_times;
                    $group->allowed_custom_reports=$request->allowed_custom_reports;
                    $group->agent_allowed_chat_groups=$request->agent_allowed_chat_groups;
                    $group->agent_xfer_park_3way=$request->agent_xfer_park_3way;
                    $group->admin_ip_list=$request->admin_ip_list;
                    $group->agent_ip_list=$request->agent_ip_list;
                    $group->api_ip_list=$request->api_ip_list;
                    $group->webphone_layout=$request->webphone_layout;*/
                
                if($group->save()){

                    return response()->json(['data' => $group], 200);
            
                    }else{
            
                   return response()->json(['message' => $e->getMessage()], 422);}
            
    
            } catch (\Exception $e) {
    
                return response()->json(['message' => $e->getMessage()], 422);
            }
        
     
        }
    


    public function destroy($user_group)
    {
       try{
        $g = Group::find($user_group);
        $g->delete();
        return response()->json(['response' => 'success', 'message' => 'Group deleted', 'data' => $g]);
       }
       catch (\Exception $e) {

        return response()->json(['message' => $e->getMessage()], 422);
    }
}
    





}
