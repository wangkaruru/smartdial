<template>
 <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        
                                    </div>
                                    <h4 class="page-title">Ingroup Form</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                       
                                        

                                        <form @submit.prevent="updateIngroup()">
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="inputEmail4" class="col-form-label">Group Name</label>
                                                    <input v-model="form.group_name" type="text" name="group_name" placeholder=""
                                                     class="form-control" >
                                                    
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputPassword4" class="col-form-label">Group color</label>
                                                    <input v-model="form.group_color" type="text" name="group_color" placeholder=""
                                                    class="form-control" >
                                                </div>
                                            

                                           
                                            

                                            
                                                <div class="form-group col-md-4">
                                                    <label for="inputCity" class="col-form-label">Active</label>
                                                     <select name="active" v-model="form.active" id="active" class="form-control">
                                                        <option value="Y">Yes</option>
                                                        <option value="N">No</option>
                                                        
                                                </select>
                                                </div>
                                                <div class="form-group col-md-4">
                                                      <label for="inputCity" class="col-form-label">Admin User Group</label>
                                                        <select name="user_group" v-model="form.user_group" id="user_group" class="form-control">
                                                            <option value="N">No</option>
                                                            <option value="Y">Yes</option>
                                                        </select>
                                                </div>
                                                


                                                 <div class="form-group col-md-4">
                                                    <label for="inputState" class="col-form-label">Park Music On Hold</label>
                                                    <input v-model="form.group_color" type="text" name="group_color" placeholder=""
                                                    class="form-control" >
                                                    </div>

                                                
                                                 <div class="form-group col-md-4">
                                                    <label for="inputState" class="col-form-label">Web Form</label>
                                                    <input v-model="form.web_form_address" type="text" name="web_form_address" placeholder=""
                                                    class="form-control" >
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="inputState" class="col-form-label">Web Form Two</label>
                                                     <input v-model="form.web_form_address_two" type="text" name="web_form_address_two" placeholder=""
                                                    class="form-control" >
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="inputState" class="col-form-label">Next Agent Call</label>
                                                    <select name="next_agent_call" v-model="form.next_agent_call" id="next_agent_call" class="form-control">
                                                
                                                            <option value="Y">Yes</option>
                                                        <option value="N">No</option>
                                                        
                                                </select>
                                                    </div>

                                                
                                                 <div class="form-group col-md-4">
                                                    <label for="inputState" class="col-form-label">Queue priority</label>
                                                    <select id="queue_priority" v-model="form.queue_priority" name="queue_priority" class="form-control">
                                                    
                                                            <option value="Y">Yes</option>
                                                        <option value="N">No</option>
                                                    </select>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="inputState" class="col-form-label">On-hook Ring Time</label>
                                                    <input v-model="form.on_hook_ring_time" type="text" name="on_hook_ring_time" class="form-control">
                                                    
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="inputState" class="col-form-label">On-hook CID</label>
                                                    <select id="on_hook_cid" v-model="form.on_hook_cid" name="on_hook_cid" class="form-control">
                                                    
                                                            <option value="Y">Yes</option>
                                                        <option value="N">No</option>
                                                    </select>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="inputState" class="col-form-label">On-hook CID Number</label>
                                                    <input v-model="form.on_hook_cid_number" type="text" name="on_hook_cid_number" class="form-control">
                                                    
                                                </div>

                                                
                                                <div class="form-group col-md-4">
                                                    <label for="inputState" class="col-form-label">Ignore List Script Override</label>
                                                        <select id="ignore_list_script_override" v-model="form.ignore_list_script_override" name="ignore_list_script_override" class="form-control">
                                                            <option value="Y">Yes</option>
                                                            <option value="N">No</option>
                                                        </select>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputState" class="col-form-label">Status Group Override</label>
                                                    <select id="status_group_id" v-model="form.status_group_id" name="status_group_id" class="form-control">
                                                    
                                                            <option value="Y">Yes</option>
                                                        <option value="N">No</option>
                                                    </select>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="inputState" class="col-form-label">Get Call Launch</label>
                                                    <select id="get_call_launch" v-model="form.get_call_launch" name="get_call_launch" class="form-control">
                                                        <option value="Y">Yes</option>
                                                        <option value="N">No</option>
                                                    </select>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="inputState" class="col-form-label">Transfer-Conf DTMF 1</label>
                                                    <input type="text" v-model="form.xferconf_a_dtmf" name="xferconf_a_dtmf" class="form-control">
                                                        
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="inputState" class="col-form-label">Transfer-Conf Number 1</label>
                                                    <input type="text" v-model="form.xferconf_a_number" name="xferconf_a_number" class="form-control">
                                                    
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="inputState" class="col-form-label">Transfer-Conf DTMF 2</label>
                                                    <input type="text" v-model="form.xferconf_b_dtmf" name="xferconf_b_dtmf" class="form-control">
                                                      
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="inputState" class="col-form-label">Transfer-Conf Number 2</label>
                                                    <input type="text" v-model="form.xferconf_b_number" name="xferconf_b_number" class="form-control">
                                                       
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="inputState" class="col-form-label">Transfer-Conf Number 3</label>
                                                    <input type="text" v-model="form.xferconf_c_number" name="xferconf_c_number" class="form-control">
                                                       
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="inputState" class="col-form-label">Transfer-Conf Number 4</label>
                                                    <input type="text" v-model="form.xferconf_d_number" name="xferconf_d_number" class="form-control">
                                                      
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="inputState" class="col-form-label">Transfer-Conf Number 5</label>
                                                    <input type="text" v-model="form.xferconf_e_number" name="xferconf_e_number" class="form-control">
                                                        
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="inputState" class="col-form-label">Timer Action</label>
                                                    <select id="timer_action" v-model="form.timer_action" name="timer_action" class="form-control">
                                                        <option value="Y">Yes</option>
                                                        <option value="N">No</option>
                                                    </select>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="inputState" class="col-form-label">Time Action Message</label>
                                                    <input type="text" v-model="form.timer_action_message" name="timer_action_message" class="form-control">
                                                        
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="inputState" class="col-form-label">Time Action Seconds</label>
                                                    <input type="text" v-model="form.timer_action_seconds" name="timer_action_seconds" class="form-control">
                                                        
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="inputState" class="col-form-label">Time Action Destination</label>
                                                    <input type="text" v-model="form.timer_action_destination" name="timer_action_destination" class="form-control">
                                                        
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="inputState" class="col-form-label">Drop Call Seconds</label>
                                                    <input type="text" v-model="form.drop_call_seconds" name="drop_call_seconds" class="form-control">
                                                        
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="inputState" class="col-form-label">Drop Action Message</label>
                                                    <select id="drop_action" v-model="form.drop_action" name="drop_action" class="form-control">
                                                        <option value="Y">Yes</option>
                                                        <option value="N">No</option>
                                                    </select>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="inputState" class="col-form-label">Drop Lead Reset</label>
                                                    <select id="drop_action" v-model="form.drop_action" name="drop_action" class="form-control">
                                                        <option value="Y">Yes</option>
                                                        <option value="N">No</option>
                                                    </select>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="inputState" class="col-form-label">Drop Exten</label>
                                                    <input type="text" v-model="form.drop_exten" name="drop_exten" class="form-control">
                                                     
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="inputState" class="col-form-label">Voicemail</label>
                                                    <input type="text" v-model="form.voicemail_ext" name="voicemail_ext" class="form-control">
                                                     
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="inputState" class="col-form-label">Drop Transfer Group</label>
                                                    <select id="default_xfer_group" v-model="form.default_xfer_group" name="default_xfer_group" class="form-control">
                                                        <option value="Y">Yes</option>
                                                        <option value="N">No</option>
                                                    </select>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="inputState" class="col-form-label">Drop Call Menu</label>
                                                    <select id="drop_callmenu" v-model="form.drop_callmenu" name="drop_callmenu" class="form-control">
                                                        <option value="Y">Yes</option>
                                                        <option value="N">No</option>
                                                    </select>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="inputState" class="col-form-label">Call Time</label>
                                                    <select id="call_time_id" v-model="form.call_time_id" name="call_time_id" class="form-control">
                                                        <option value="Y">Yes</option>
                                                        <option value="N">No</option>
                                                    </select>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="inputState" class="col-form-label">Action Transfer CID</label>
                                                    <input type="text" v-model="form.action_xfer_cid" name="action_xfer_cid" class="form-control">
                                                     
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="inputState" class="col-form-label">After Hours Action</label>
                                                    <select id="action_hours_action" v-model="form.action_hours_action" name="action_hours_action" class="form-control">
                                                        <option value="Y">Yes</option>
                                                        <option value="N">No</option>
                                                    </select>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="inputState" class="col-form-label">After Hours Lead Reset</label>
                                                    <select id="after_hours_lead_reset" v-model="form.after_hours_lead_reset" name="after_hours_lead_reset" class="form-control">
                                                        <option value="Y">Yes</option>
                                                        <option value="N">No</option>
                                                    </select>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="inputState" class="col-form-label">After Hours Message FileName</label>
                                                    <select id="after_hours_message_filename" v-model="form.after_hours_message_filename" name="after_hours_message_filename" class="form-control">
                                                        <option value="Y">Yes</option>
                                                        <option value="N">No</option>
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputState" class="col-form-label">After Hours Extension</label>
                                                    <input type="text" v-model="form.after_hours_exten" name="after_hours_exten" class="form-control">
                                                        
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="inputState" class="col-form-label">After Hours Voicemail</label>
                                                    <input type="text" v-model="form.after_hours_voicemail" name="after_hours_voicemail" class="form-control">
                                                        
                                                </div>
                
                                                
                                            </div>

                                          

                                            <button type="submit" class="btn btn-primary">Update</button>

                                        </form>

                                    </div> <!-- end card-body -->
                                </div> <!-- end card-->
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->
                        </div>
</template>
<script>
   import { Form, HasError, AlertError } from "vform";

    export default {
        data(){
   return {
                inbounds: {},
                editmode: false,
               
      form: new Form({
        group_name:'',
        group_id:'',
        user_group:''

        
        
        }) } },
         created() {
            this.getCampaigns();
        },
        methods: {
            
            
            
            
            
           
            
            
        },
        
        
        
    }
       
</script>