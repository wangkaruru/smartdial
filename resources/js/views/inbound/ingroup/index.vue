<template>
    <!-- Start Content-->
    
    <div class="container-fluid">
    
        <!-- start page title -->
    
        <div class="row">
    
            <div class="col-12">
    
                <div class="page-title-box">
    
                    <h4 class="page-title">Ingroup</h4>
    
                </div>
    
            </div>
    
        </div>
    
        <!-- end page title -->
    
        <div class="row">
    
            <div class="col-12">
    
                <div class="card">
    
                    <div class="card-body">
    
                        <div class="row">
    
                            <div class="col-lg-12">
    
                                <div class="table-responsive">
    
                                    <table class="table table-hover">
    
                                        <thead>
    
                                            <tr>
    
                                                <th>IN GROUP</th>
    
                                                <th>NAME</th>
    
                                                <th>PRIORITY</th>
    
                                                <th>ACTIVE</th>
    
                                                <th>ADMIN GROUP</th>
    
                                                <th>TIME</th>
    
                                                <th></th>
    
                                            </tr>
    
                                        </thead>
    
                                        <tbody>
    
                                            <tr v-for="inbound in inbounds.data">
    
                                                <td>{{inbound.group_id}}</td>
    
                                                <td>{{inbound.group_name }}</td>
    
                                                <td>{{ inbound.queue_priority}}</td>
    
                                                <td>{{inbound.active}}</td>
    
                                                <td>{{inbound.user_group}}</td>
    
                                                <td>{{inbound.call_time_id}}</td>
    
    
    
                                                <td>
    
                                                    <a data-toggle="dropdown" aria-haspopup="false" aria-expanded="false">
    
                                                        <div class="test">
    
                                                            <div class="options">
    
                                                                <a href="#" @click="editModal(inbound)">Edit</a><br>
    
                                                                <a href="#" @click="deleteList(inbound.group_id)">Delete</a>
    
    
    
                                                            </div>
    
                                                        </div>
    
                                                    </a>
    
                                                </td>
    
                                            </tr>
    
                                        </tbody>
    
                                    </table>
    
                                </div>
    
                            </div>
    
                            <!-- end col -->
    
                        </div>
    
                        <div class="row">
    
                            <div class="col-md-12">
    
    
    
                            </div>
    
                        </div>
    
    
    
                    </div>
    
                    <!-- end card-body -->
    
                </div>
    
                <!-- end card -->
    
            </div>
    
            <!-- end col -->
    
        </div>
    
        <div class="modal fade" id="addNew" tabindex="-1" role="dialog" aria-labelledby="addNewLabel" aria-hidden="true">
    
            <div class="modal-dialog modal-lg" role="document">
    
                <div class="modal-content">
    
                    <div class="modal-header">
    
    
    
                        <h5 class="modal-title" id="addNewLabel">Update Ingroup's Info</h5>
    
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    
                        <span aria-hidden="true">&times;</span>
    
                        </button>
    
                    </div>
    
                    <form @submit.prevent="editmode ? updateInbounds() : createInbounds()">
    
                        <div class="modal-body">
    
                            <div class="form-row">

                                <div class="form-group col-md-4">
    
                                    <label for="inputEmail4" class="col-form-label">Group ID</label>
    
                                    <input v-model="form.group_id" type="text" name="group_id" placeholder="" class="form-control">
    
    
    
                                </div>
    
                                <div class="form-group col-md-4">
    
                                    <label for="inputEmail4" class="col-form-label">Group Name</label>
    
                                    <input v-model="form.group_name" type="text" name="group_name" placeholder="" class="form-control">
    
    
    
                                </div>
    
                                <div class="form-group col-md-4">
    
                                    <label for="inputPassword4" class="col-form-label">Group color</label>
    
                                    <input v-model="form.group_color" type="text" name="group_color" placeholder="" class="form-control">
    
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
    
                                    <input v-model="form.group_color" type="text" name="group_color" placeholder="" class="form-control">
    
                                </div>
    
    
    
    
    
                                <div class="form-group col-md-4">
    
                                    <label for="inputState" class="col-form-label">Web Form</label>
    
                                    <input v-model="form.web_form_address" type="text" name="web_form_address" placeholder="" class="form-control">
    
                                </div>
    
    
    
                                <div class="form-group col-md-4">
    
                                    <label for="inputState" class="col-form-label">Web Form Two</label>
    
                                    <input v-model="form.web_form_address_two" type="text" name="web_form_address_two" placeholder="" class="form-control">
    
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
    
                                    <label for="inputState" class="col-form-label"> Call Time</label>
    
                                    <select id="call_time_id" v-model="form.call_time_id" name="call_time_id" class="form-control">
                                        <option v-for="inbound in inbounds.data" v-bind:value="inbound.call_time_id">{{inbound.call_time_id}}</option>
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

                                <div class="form-group col-md-4">
    
                                    <label for="inputState" class="col-form-label">After Hours Transfer Group</label>
    
                                    <select id="afterhours_xfer_group" v-model="form.afterhours_xfer_group" name="afterhours_xfer_group" class="form-control">
                                        <option v-for="inbound in inbounds.data" v-bind:value="inbound.afterhours_xfer_group">{{inbound.afterhours_xfer_group}}</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-4">
    
                                    <label for="inputState" class="col-form-label">After Hours Call Menu</label>
    
                                    <select id="after_hours_callmenu" v-model="form.after_hours_callmenu" name="after_hours_callmenu" class="form-control">
                                        <option v-for="inbound in inbounds.data" v-bind:value="inbound.after_hours_callmenu">{{inbound.after_hours_callmenu}}</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-4">
    
                                    <label for="inputState" class="col-form-label">No Agent No Queueing</label>
    
                                    <select id="no_agent_no_queue" v-model="form.no_agent_no_queue" name="no_agent_no_queue" class="form-control">
                                        <option value="Y">YES</option>
                                        <option value="N">NO</option>
                                        <option value="NO_READY">NO_READY</option>
                                        <option value="NO_PAUSED">NO_PAUSED</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-4">
    
                                    <label for="inputState" class="col-form-label">No Agent No Queue Action</label>
    
                                    <select id="no_agent_action" v-model="form.no_agent_action" name="no_agent_action" class="form-control">
                                        <option value="DID">DID</option>
                                        <option value="CALLMENU">CALLMENU</option>
                                        <option value="INGROUP">INGROUP</option>
                                        <option value="MESSAGE">MESSAGE</option>
                                        <option value="EXT">EXT</option>
                                    </select>
                                </div>

                                <div class="form-group col-md-4">
    
                                    <label for="inputState" class="col-form-label">No Agent No Queue Lead Reset</label>
    
                                    <select id="nanq_lead_reset" v-model="form.nanq_lead_reset" name="nanq_lead_reset" class="form-control">
                                        <option value="Y">YES</option>
                                        <option value="N">NO</option>
                                        
                                    </select>
                                </div>

                                <div class="form-group col-md-4">
    
                                    <label for="inputState" class="col-form-label">No Agent No Queue Lead Reset</label>
    
                                    <select id="nanq_lead_reset" v-model="form.nanq_lead_reset" name="nanq_lead_reset" class="form-control">
                                        <option value="Y">YES</option>
                                        <option value="N">NO</option>
                                        
                                    </select>
                                </div>

                                <div class="form-group col-md-4">
    
                                    <label for="inputState" class="col-form-label">Area Code Filter</label>
    
                                    <select id="areacode_filter_action" v-model="form.areacode_filter_action" name="areacode_filter_action" class="form-control">
                                        <option value="ALLOW_ONLY">ALLOW_ONLY</option>
                                        <option value="DROP_ONLY">DROP_ONLY</option>
                                        <option value="DISABLED">DISABLED</option>
                                        
                                    </select>
                                       
                                </div>

                                <div class="form-group col-md-4">
    
                                    <label for="inputState" class="col-form-label">Area Code Filter Seconds</label>
    
                                    <input type="text" v-model="form.areacode_filter_seconds" name="areacode_filter_seconds" class="form-control">
                                       
                                       
                                </div>

                                <div class="form-group col-md-4">
    
                                    <label for="inputState" class="col-form-label">Area Code Filter Action</label>
    
                                    <select id="areacode_filter_action" v-model="form.areacode_filter_action" name="areacode_filter_action" class="form-control">
                                        <option value="CALLMENU">CALLMENU</option>
                                        <option value="INGROUP">INGROUP</option>
                                        <option value="DID">DID</option>
                                        <option value="MESSAGE">MESSAGE</option>
                                        <option value="EXTENSION">EXTENSION</option>
                                        <option value="INGROUP">INGROUP</option>
                                        <option value="VOICEMAIL">VOICEMAIL</option>
                                        <option value="VMAIL_NO_INST">VMAIL_NO_INST</option>
                                        
                                    </select>
                                       
                                </div>

                                <div class="form-group col-md-4">
    
                                    <label for="inputState" class="col-form-label">Max Call Method</label>
    
                                    <select id="max_calls_method" v-model="form.max_calls_method" name="max_calls_method" class="form-control">
                                        <option value="TOTAL">TOTAL</option>
                                        <option value="DISABLED">DISABLED</option>
                                        <option value="IN_QUEUE">IN_QUEUE</option>
                                        
                                        
                                    </select>
                                       
                                </div>

                                <div class="form-group col-md-4">
    
                                    <label for="inputState" class="col-form-label">Max Call Count</label>
    
                                    <input type="text" v-model="form.max_calls_count" name="max_calls_count" class="form-control">
                                       
                                       
                                </div>

                                <div class="form-group col-md-4">
    
                                    <label for="inputState" class="col-form-label">Max Call Action</label>
    
                                    <select id="max_calls_action" v-model="form.max_calls_action" name="max_calls_action" class="form-control">
                                        <option value="DROP">DROP</option>
                                        <option value="AFTERHOURS">AFTERHOURS</option>
                                        <option value="NO_AGENT_NO_QUEUE">NO_AGENT_NO_QUEUE</option>
                                        <option value="AREACODE_FILTER">AREACODE_FILTER</option>
                                      
                                        
                                    </select>
                                       
                                </div>

                                <div class="form-group col-md-4">
    
                                    <label for="inputState" class="col-form-label">Welcome Message Filename</label>
    
                                    <input type="text" v-model="form.welcome_message_filename" name="welcome_message_filename" class="form-control">
                                     
                                       
                                </div>

                                <div class="form-group col-md-4">
    
                                    <label for="inputState" class="col-form-label">Play Welcome Message</label>
    
                                    <select id="play_welcome_message" v-model="form.play_welcome_message" name="play_welcome_message" class="form-control">
                                        <option value="ALWAYS">ALWAYS</option>
                                        <option value="NEVER">NEVER</option>
                                        <option value="IF_WAIT_ONLY">IF_WAIT_ONLY</option>
                                        <option value="YES_UNLESS_NODELAY">YES_UNLESS_NODELAY</option>
                                      
                                        
                                    </select>
                                       
                                </div>

                                <div class="form-group col-md-4">
    
                                    <label for="inputState" class="col-form-label">Music On Hold Context</label>
    
                                    <input type="text" v-model="form.moh_context" name="moh_context" class="form-control">
                                     
                                       
                                </div>

                                <div class="form-group col-md-4">
    
                                    <label for="inputState" class="col-form-label">On Hold Prompt Filename</label>
    
                                    <input type="text" v-model="form.onhold_prompt_filename" name="onhold_prompt_filename" class="form-control">
                                     
                                       
                                </div>

                                <div class="form-group col-md-4">
    
                                    <label for="inputState" class="col-form-label">On Hold Prompt Interval</label>
    
                                    <input type="text" v-model="form.prompt_interval" name="prompt_interval" class="form-control">
                                     
                                       
                                </div>

                                <div class="form-group col-md-4">
    
                                    <label for="inputState" class="col-form-label">On Hold Prompt No Block</label>
    
                                    <select id="onhold_prompt_no_block" v-model="form.onhold_prompt_no_block" name="onhold_prompt_no_block" class="form-control">
                                     <option value="Y">YES</option>
                                     <option value="N">NO</option>
                                       </select>
                                </div>

                                <div class="form-group col-md-4">
    
                                    <label for="inputState" class="col-form-label">On Hold Prompt Seconds</label>
    
                                    <input type="text" v-model="form.onhold_prompt_seconds" name="onhold_prompt_seconds" class="form-control">
                                     
                                       
                                </div>

                                <div class="form-group col-md-4">
    
                                    <label for="inputState" class="col-form-label">Play Place In Line</label>
    
                                    <select id="play_place_in_line"  v-model="form.play_place_in_line" name="play_place_in_line" class="form-control">
                                     <option value="Y">YES</option>
                                     <option value="N">NO</option>
                                       </select>
                                </div>

                                <div class="form-group col-md-4">
    
                                    <label for="inputState" class="col-form-label">Play Estimated Hold Time</label>
    
                                    <select id="play_estimate_hold_time"  v-model="form.play_estimate_hold_time" name="play_estimate_hold_time" class="form-control">
                                     <option value="Y">YES</option>
                                     <option value="N">NO</option>
                                       </select>
                                </div>

                                <div class="form-group col-md-4">
    
                                    <label for="inputState" class="col-form-label">Calculate Estimated Hold Seconds</label>
    
                                    <input  type="text" v-model="form.calculate_estimated_hold_seconds" name="calculate_estimated_hold_seconds" class="form-control">
                                     
                                </div>

                                <div class="form-group col-md-4">
    
                                    <label for="inputState" class="col-form-label">Estimated Hold Time Minimum Filename</label>
    
                                    <input  type="text" v-model="form.eht_minimum_prompt_filename" name="eht_minimum_prompt_filename" class="form-control">
                                     
                                </div>

                                <div class="form-group col-md-4">
    
                                    <label for="inputState" class="col-form-label">Estimated Hold Time Minimum Prompt No Block</label>
    
                                    <select id="eht_minimum_prompt_no_block"  v-model="form.eht_minimum_prompt_no_block" name="eht_minimum_prompt_no_block" class="form-control">
                                     <option value="Y">YES</option>
                                     <option value="N">NO</option>
                                       </select>
                                </div>

                                <div class="form-group col-md-4">
    
                                    <label for="inputState" class="col-form-label">Estimated Hold Time Minimum Prompt Seconds</label>
    
                                    <input  type="text" v-model="form.eht_minimum_prompt_seconds" name="eht_minimum_prompt_seconds" class="form-control">
                                     
                                </div>

                                <div class="form-group col-md-4">
    
                                    <label for="inputState" class="col-form-label">Wait Time Option</label>
    
                                    <select id="wait_time_option"  v-model="form.wait_time_option" name="wait_time_option" class="form-control">
                                     <option v-for="inbound in inbounds.data" v-bind:value="inbound.wait_time_option">{{inbound.wait_time_option}}</option>
                                       </select>
                                </div>

                                <div class="form-group col-md-4">
    
                                    <label for="inputState" class="col-form-label">Wait Time Second Option</label>
    
                                    <select id="wait_time_second_option"  v-model="form.wait_time_second_option" name="wait_time_second_option" class="form-control">
                                     <option v-for="inbound in inbounds.data" v-bind:value="inbound.wait_time_second_option">{{inbound.wait_time_second_option}}</option>
                                       </select>
                                </div>

                                <div class="form-group col-md-4">
    
                                    <label for="inputState" class="col-form-label">Wait Time Third Option</label>
    
                                    <select id="wait_time_third_option"  v-model="form.wait_time_third_option" name="wait_time_third_option" class="form-control">
                                     <option v-for="inbound in inbounds.data" v-bind:value="inbound.wait_time_third_option">{{inbound.wait_time_third_option}}</option>
                                       </select>
                                </div>

                                <div class="form-group col-md-4">
    
                                    <label for="inputState" class="col-form-label">Wait time Option Seconds</label>
    
                                    <input  type="text" v-model="form.wait_time_option_seconds" name="wait_time_option_seconds" class="form-control">
                                     
                                </div>

                                <div class="form-group col-md-4">
    
                                    <label for="inputState" class="col-form-label">Wait Time Option Lead Reset</label>
    
                                    <select id="wait_time_lead_reset" type="text" v-model="form.wait_time_lead_reset" name="wait_time_lead_reset" class="form-control">
                                     <option value="Y">YES</option>
                                     <option value="N">NO</option>
                                       </select>
                                </div>

                                <div class="form-group col-md-4">
    
                                    <label for="inputState" class="col-form-label">Wait Time Option Extension</label>
    
                                    <input  type="text" v-model="form.wait_time_option_exten" name="wait_time_option_exten" class="form-control">
                                     
                                </div>

                                <div class="form-group col-md-4">
    
                                    <label for="inputState" class="col-form-label">Wait Time Option Callmenu</label>
    
                                    <select id="wait_time_option_callmenu"  v-model="form.wait_time_option_callmenu" name="wait_time_option_callmenu" class="form-control">
                                     <option v-for="inbound in inbounds.data" v-bind:value="inbound.wait_time_option_callmenu">{{inbound.wait_time_option_callmenu}}</option>
                                       </select>
                                </div>

                                <div class="form-group col-md-4">
    
                                    <label for="inputState" class="col-form-label">Wait Time Option Voicemail</label>
    
                                    <input  type="text" v-model="form.wait_time_option_voicemail" name="wait_time_option_voicemail" class="form-control">
                                     
                                </div>

                                <div class="form-group col-md-4">
    
                                    <label for="inputState" class="col-form-label">Wait Time Option Transfer In-Group</label>
    
                                    <select id="wait_time_option_xfer_group"  v-model="form.wait_time_option_xfer_group" name="wait_time_option_xfer_group" class="form-control">
                                     <option v-for="inbound in inbounds.data" v-bind:value="inbound.wait_time_option_xfer_group">{{inbound.wait_time_option_xfer_group}}</option>
                                       </select>
                                </div>

                                <div class="form-group col-md-4">
    
                                    <label for="inputState" class="col-form-label">Wait Time Option Press Filename</label>
    
                                    <input  type="text" v-model="form.wait_time_option_press_filename" name="wait_time_option_press_filename" class="form-control">
                                     
                                </div>

                                <div class="form-group col-md-4">
    
                                    <label for="inputState" class="col-form-label">Wait Time Option Press No Block</label>
    
                                    <select id="wait_time_option_no_block" type="text" v-model="form.wait_time_option_no_block" name="wait_time_option_no_block" class="form-control">
                                     <option value="Y">YES</option>
                                     <option value="N">NO</option>
                                       </select>
                                </div>

                                <div class="form-group col-md-4">
    
                                    <label for="inputState" class="col-form-label">Wait Time Option Press Filename Seconds</label>
    
                                    <input  type="text" v-model="form.wait_time_option_prompt_seconds" name="wait_time_option_prompt_seconds" class="form-control">
                                     
                                </div>

                                <div class="form-group col-md-4">
    
                                    <label for="inputState" class="col-form-label">Wait Time Option After Press Filename</label>
    
                                    <input  type="text" v-model="form.wait_time_option_callback_filename" name="wait_time_option_callback_filename" class="form-control">
                                     
                                </div>

                                <div class="form-group col-md-4">
    
                                    <label for="inputState" class="col-form-label">Wait Time Option Callback List ID</label>
    
                                    <input  type="text" v-model="form.wait_time_option_callback_list_id" name="wait_time_option_callback_list_id" class="form-control">
                                     
                                </div>

                                <div class="form-group col-md-4">
    
                                    <label for="inputState" class="col-form-label">Wait Hold Option Priority</label>
    
                                    <select id="wait_hold_option_priority"  v-model="form.wait_hold_option_priority" name="wait_hold_option_priority" class="form-control">
                                     <option v-for="inbound in inbounds.data" v-bind:value="inbound.wait_hold_option_priority">{{inbound.wait_hold_option_priority}}</option>
                                     </select>
                                </div>
                                

                                <div class="form-group col-md-4">
    
                                    <label for="inputState" class="col-form-label">Estimated Hold Time Option </label>
    
                                    <select id="hold_time_option"  v-model="form.hold_time_option" name="hold_time_option" class="form-control">
                                     <option v-for="inbound in inbounds.data" v-bind:value="inbound.hold_time_option">{{inbound.hold_time_option}}</option>
                                     </select>
                                </div>

                                <div class="form-group col-md-4">
    
                                    <label for="inputState" class="col-form-label">Hold Time Second Option </label>
    
                                    <select id="hold_time_second_option"  v-model="form.hold_time_second_option" name="hold_time_second_option" class="form-control">
                                     <option v-for="inbound in inbounds.data" v-bind:value="inbound.hold_time_second_option">{{inbound.hold_time_second_option}}</option>
                                     </select>
                                </div>

                                <div class="form-group col-md-4">
    
                                    <label for="inputState" class="col-form-label">Hold Time Third Option </label>
    
                                    <select id="hold_time_third_option"  v-model="form.hold_time_third_option" name="hold_time_third_option" class="form-control">
                                     <option v-for="inbound in inbounds.data" v-bind:value="inbound.hold_time_third_option">{{inbound.hold_time_third_option}}</option>
                                     </select>
                                </div>

                                <div class="form-group col-md-4">
    
                                    <label for="inputState" class="col-form-label">Hold Time Option Seconds</label>
    
                                    <input  type="text" v-model="form.hold_time_option_seconds" name="hold_time_option_seconds" class="form-control">
                                     
                                </div>

                                <div class="form-group col-md-4">
    
                                    <label for="inputState" class="col-form-label">Hold Time Option Lead Reset</label>
    
                                    <select id="hold_time_lead_reset" type="text" v-model="form.hold_time_lead_reset" name="hold_time_lead_reset" class="form-control">
                                     <option value="Y">YES</option>
                                     <option value="N">NO</option>
                                       </select>
                                </div>

                                <div class="form-group col-md-4">
    
                                    <label for="inputState" class="col-form-label">Hold Time Option Minimum</label>
    
                                    <input  type="text" v-model="form.hold_time_option_minimum" name="hold_time_option_minimum" class="form-control">
                                     
                                </div>

                                <div class="form-group col-md-4">
    
                                    <label for="inputState" class="col-form-label">Hold Time Option Extension</label>
    
                                    <input  type="text" v-model="form.hold_time_option_exten" name="hold_time_option_exten" class="form-control">
                                     
                                </div>

                                <div class="form-group col-md-4">
    
                                    <label for="inputState" class="col-form-label">Hold Time Option Callmenu</label>
    
                                    <select id="hold_time_option_callmenu"  v-model="form.hold_time_option_callmenu" name="hold_time_option_callmenu" class="form-control">
                                     <option v-for="inbound in inbounds.data" v-bind:value="inbound.hold_time_option_callmenu">{{inbound.hold_time_option_callmenu}}</option>
                                     </select>
                                </div>

                                <div class="form-group col-md-4">
    
                                    <label for="inputState" class="col-form-label">Hold Time Option Voicemail</label>
    
                                    <input  type="text" v-model="form.hold_time_option_voicemail" name="hold_time_option_voicemail" class="form-control">
                                     
                                </div>

                                <div class="form-group col-md-4">
    
                                    <label for="inputState" class="col-form-label">Wait Time Option Transfer In-Group</label>
    
                                    <select id="hold_time_option_xfer_group"  v-model="form.hold_time_option_xfer_group" name="hold_time_option_xfer_group" class="form-control">
                                     <option v-for="inbound in inbounds.data" v-bind:value="inbound.hold_time_option_xfer_group">{{inbound.hold_time_option_xfer_group}}</option>
                                     </select>
                                </div>

                                <div class="form-group col-md-4">
    
                                    <label for="inputState" class="col-form-label">Wait Time Option Press Filename</label>
    
                                    <input  type="text" v-model="form.hold_time_option_press_filename" name="hold_time_option_press_filename" class="form-control">
                                     
                                </div>

                                <div class="form-group col-md-4">
    
                                    <label for="inputState" class="col-form-label">Wait Time Option Press No Block</label>
    
                                    <select id="hold_time_option_no_block" type="text" v-model="form.hold_time_option_no_block" name="hold_time_option_no_block" class="form-control">
                                     <option value="Y">YES</option>
                                     <option value="N">NO</option>
                                       </select>
                                </div>

                                <div class="form-group col-md-4">
    
                                    <label for="inputState" class="col-form-label">Wait Time Option Press Filename Seconds</label>
    
                                    <input  type="text" v-model="form.wait_time_option_callback_filename" name="wait_time_option_callback_filename" class="form-control">
                                     
                                </div>

                                <div class="form-group col-md-4">
    
                                    <label for="inputState" class="col-form-label">Wait Time Option Callback List ID</label>
    
                                    <input  type="text" v-model="form.wait_time_option_callback_list_id" name="wait_time_option_callback_list_id" class="form-control">
                                     
                                </div>

                                <div class="form-group col-md-4">
    
                                    <label for="inputState" class="col-form-label">Wait Hold Option Priority</label>
    
                                    <select id="wait_hold_option_priority" type="text" v-model="form.wait_hold_option_priority" name="wait_hold_option_priority" class="form-control">
                                     <option value="WAIT">WAIT</option>
                                     <option value="HOLD">HOLD</option>
                                     <option value="BOTH">BOTH</option>
                                       </select>
                                </div>

                                <div class="form-group col-md-4">
    
                                    <label for="inputState" class="col-form-label">Wait Time Option Transfer In-Group</label>
    
                                    <select id="hold_time_option"  v-model="form.hold_time_option" name="hold_time_option" class="form-control">
                                     <option v-for="inbound in inbounds.data" v-bind:value="inbound.hold_time_option">{{inbound.hold_time_option}}</option>
                                     </select>
                                </div>

                                <div class="form-group col-md-4">
    
                                    <label for="inputState" class="col-form-label">Hold Time Second Option</label>
    
                                    <select id="hold_time_second_option"  v-model="form.hold_time_second_option" name="hold_time_second_option" class="form-control">
                                     <option v-for="inbound in inbounds.data" v-bind:value="inbound.hold_time_second_option">{{inbound.hold_time_second_option}}</option>
                                     </select>
                                </div>

                                <div class="form-group col-md-4">
    
                                    <label for="inputState" class="col-form-label">Hold Time Third Option</label>
    
                                    <select id="hold_time_third_option"  v-model="form.hold_time_third_option" name="hold_time_third_option" class="form-control">
                                     <option v-for="inbound in inbounds.data" v-bind:value="inbound.hold_time_third_option">{{inbound.hold_time_third_option}}</option>
                                     </select>
                                </div>

                                <div class="form-group col-md-4">
    
                                    <label for="inputState" class="col-form-label">Hold Time Option Seconds</label>
    
                                    <input  type="text" v-model="form.hold_time_option_seconds" name="hold_time_option_seconds" class="form-control">
                                     
                                </div>

                                <div class="form-group col-md-4">
    
                                    <label for="inputState" class="col-form-label">Wait Time Option Lead Reset</label>
    
                                    <select id="hold_time_lead_reset" type="text" v-model="form.hold_time_lead_reset" name="hold_time_lead_reset" class="form-control">
                                     <option value="Y">YES</option>
                                     <option value="N">NO</option>
                                       </select>
                                </div>

                                <div class="form-group col-md-4">
    
                                    <label for="inputState" class="col-form-label">Hold Time Option Minimum</label>
    
                                    <input  type="text" v-model="form.hold_time_option_minimum" name="hold_time_option_minimum" class="form-control">
                                     
                                </div>

                                <div class="form-group col-md-4">
    
                                    <label for="inputState" class="col-form-label">Hold Time Option Extension</label>
    
                                    <input  type="text" v-model="form.hold_time_option_exten" name="hold_time_option_exten" class="form-control">
                                     
                                </div>

                                <div class="form-group col-md-4">
    
                                    <label for="inputState" class="col-form-label">Hold Time Option Callmenu</label>
    
                                    <select id="hold_time_option_callmenu"  v-model="form.hold_time_option_callmenu" name="hold_time_option_callmenu" class="form-control">
                                     <option v-for="inbound in inbounds.data" v-bind:value="inbound.hold_time_option_callmenu">{{inbound.hold_time_option_callmenu}}</option>
                                     </select>
                                </div>

                                <div class="form-group col-md-4">
    
                                    <label for="inputState" class="col-form-label">Hold Time Option Voicemail</label>
    
                                    <input  type="text" v-model="form.hold_time_option_voicemail" name="hold_time_option_voicemail" class="form-control">
                                     
                                </div>

                                <div class="form-group col-md-4">
    
                                    <label for="inputState" class="col-form-label">Hold Time Option Press Filename</label>
    
                                    <input type="text"  v-model="form.hold_time_option_press_filename" name="hold_time_option_xfer_group" class="form-control">
                                     
                                </div>

                                <div class="form-group col-md-4">
    
                                    <label for="inputState" class="col-form-label">Hold Time Option Press No Block </label>
    
                                    <select id="hold_time_option_no_block" type="text" v-model="form.hold_time_option_no_block" name="hold_time_lead_reset" class="form-control">
                                     <option value="Y">YES</option>
                                     <option value="N">NO</option>
                                       </select>
                                </div>

                                <div class="form-group col-md-4">
    
                                    <label for="inputState" class="col-form-label">Hold Time Option Press Filename Seconds</label>
    
                                    <input type="text"  v-model="form.hold_time_option_prompt_seconds" name="hold_time_option_prompt_seconds" class="form-control">
                                     
                                </div>

                                <div class="form-group col-md-4">
    
                                    <label for="inputState" class="col-form-label">Hold Time Option Callback List ID</label>
    
                                    <input type="text"  v-model="form.hold_time_option_callback_list_id" name="hold_time_option_callback_list_id" class="form-control">
                                     
                                </div>

                                <div class="form-group col-md-4">
    
                                    <label for="inputState" class="col-form-label">Callback Queue Expire Hours</label>
    
                                    <input type="text"  v-model="form.icbq_expiration_hours" name="icbq_expiration_hours" class="form-control">
                                     
                                </div>

                                <div class="form-group col-md-4">
    
                                    <label for="inputState" class="col-form-label">Callback Queue Calltime</label>
    
                                    <select id="icbq_call_time_id"  v-model="form.icbq_call_time_id" name="icbq_call_time_id" class="form-control">
                                     <option v-for="inbound in inbounds.data" v-bind:value="inbound.icbq_call_time_id">{{inbound.icbq_call_time_id}}</option>
                                     </select>
                                </div>

                                <div class="form-group col-md-4">
    
                                    <label for="inputState" class="col-form-label">Callback Queue Dial Filter</label>
    
                                    <select id="icbq_dial_filter"  v-model="form.icbq_dial_filter" name="icbq_dial_filter" class="form-control">
                                     <option v-for="inbound in inbounds.data" v-bind:value="inbound.icbq_dial_filter">{{inbound.icbq_dial_filter}}</option>
                                     </select>
                                </div>

                             





    
    
    
    
    
                            </div>
    
    
    
    
    
    
    
                           <div class="modal-footer">
    
                                
    
                                <button type="submit" v-show="editmode" class="btn btn-primary">Update</button>
    
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
    
                            </div>
    
                        </div>
    
                    </form>
    
                </div>
    
            </div>
    
        </div>
    
    </div>
</template>

<script>
    import {
    
        Form,
    
        HasError,
    
        AlertError
    
    } from "vform";
    
    
    
    export default {
    
    
    
    
    
        mounted() {},
    
    
    
        data() {
    
            return {
    
                inbounds: {},
    
                editmode: false,
    
    
    
                form: new Form({
    
                    group_id: '',
    
                    group_name: '',
    
                    active: '',
    
                    user_group: '',
    
                    group_color: '',
    
                    after_hours_exten: '',
    
                    after_hours_lead_reset: '',
    
                    after_hours_voicemail: '',
    
                    after_hours_message_filename: '',
    
                    action_hours_action: '',
    
                    action_xfer_cid: '',
    
                    call_time_id: '',
    
                    drop_callmenu: '',
    
                    default_xfer_group: '',
    
                    voicemail_ext: '',
    
                    drop_exten: '',
    
                    drop_call_seconds: '',
    
                    timer_action_destination: '',
    
                    web_form_address: '',
    
                    web_form_address_two: '',
    
                    next_agent_call: '',
    
                    queue_priority: '',
    
                    on_hook_ring_time: '',
    
                    on_hook_cid: '',
    
                    on_hook_cid_number: '',
    
                    ignore_list_script_override: '',
    
                    status_group_id: '',
    
                    get_call_launch: '',
    
                    xferconf_a_dtmf: '',
    
                    xferconf_a_number: '',
    
                    xferconf_b_dtmf: '',
    
                    xferconf_b_number: '',
    
                    xferconf_c_number: '',
    
                    xferconf_d_number: '',
    
                    xferconf_e_number: '',
    
                    timer_action: '',
    
                    timer_action_destination: '',
    
                    timer_action_message: '',
    
                    timer_action_seconds: '',
    
                    drop_action: '',
    
                    drop_call_seconds: '',
    
                    drop_callmenu: '',
    
                    drop_exten: '',
    
                    voicemail_ext: '',
    
                    default_xfer_group: '',
    
                    drop_callmenu: '',
    
                    call_time_id: '',
    
                    action_xfer_cid: '',
    
                    action_hours_action: '',
    
                    action_xfer_cid: '',
    
                    after_hours_lead_reset: '',
                    after_hours_callmenu:'',
                    no_agent_no_queue:'',
                    no_agent_action:'',
                    nanq_lead_reset:'',
                    areacode_filter:'',
                    areacode_filter_seconds:'',
                    areacode_filter_action:'',
                    max_calls_method:'',
                    max_calls_count:'',
                    max_calls_action:'',
                    welcome_message_filename:'',
                    play_welcome_message:'',
                    moh_context:'',
                    onhold_prompt_filename:'',
                    prompt_interval:'',
                    onhold_prompt_no_block:'',
                    onhold_prompt_seconds:'',
                    play_place_in_line:'',
                    play_estimate_hold_time:'',
                    calculate_estimated_hold_seconds:'',
                    eht_minimum_prompt_filename:'',
                    eht_minimum_prompt_no_block:'',
                    eht_minimum_prompt_seconds:'',
                    wait_time_option:'',
                    wait_time_second_option:'',
                    wait_time_third_option:'',
                    wait_time_option_seconds:'',
                    wait_time_lead_reset:'',
                    wait_time_option_exten:'',
                    wait_time_option_voicemail:'',
                    wait_time_option_xfer_group:'',
                    wait_time_option_press_filename:'',
                    wait_time_option_no_block:'',
                    wait_time_option_prompt_seconds:'',
                    wait_time_option_callback_filename:'',
                    wait_time_option_callback_list_id:'',
                    wait_hold_option_priority:'',
                    hold_time_option:'',
                    hold_time_second_option:'',
                    hold_time_third_option:'',
                    hold_time_option_seconds:'',
                    hold_time_lead_reset:'',
                    hold_time_option_minimum:'',
                    hold_time_option_exten:'',
                    hold_time_option_callmenu:'',
                    hold_time_option_xfer_group:'',
                    hold_time_option_press_filename:'',
                    hold_time_option_no_block:'',
                    wait_time_option_callback_filename:'',
                    wait_time_option_callback_list_id:'',
                    wait_hold_option_priority:'',
                    hold_time_option:'',
                    hold_time_second_option:'',
                    hold_time_third_option:'',
                    hold_time_option_seconds:'',
                    hold_time_lead_reset:'',
                    hold_time_option_minimum:'',
                    hold_time_option_exten:'',
                    hold_time_option_callmenu:'',
                    hold_time_option_voicemail:'',
                    hold_time_option_xfer_group:'',
                    hold_time_option_callback_filename:'',
                    hold_time_option_no_block:'',
                    hold_time_option_prompt_seconds:'',
                    hold_time_option_press_filename:'',
                    hold_time_option_callback_list_id:'',
                    icbq_expiration_hours:'',
                    icbq_call_time_id:'',
                    icbq_dial_filter:''

    
    
    
    
    
    
    
                })
    
            }
    
        },
    
    
    
        created() {
    
            this.getInbounds();
    
        },
    
    
    
        methods: {
    
            getInbounds(page) {
    
                if (typeof page === 'undefined') {
    
                    page = 1;
    
                }
    
                axios.get('/api/inbounds?page=' + page)
    
                    .then(response => this.inbounds = response.data);
    
            },
    
            updateInbounds() {
    
                //this.$Progress.start();
    
                // console.log('Editing data');
    
                //  alert(campaign_id);
    
                // this.form.put('/api/campaignstatus/'+this.form.campaign_id)
    
                this.form.put('/api/inbounds/' + this.form.group_id)
    
    
    
                    .then(() => {
    
                        // success
    
                        //console.log('$data');
    
                        $('#addNew').modal('hide');
    
                        swal(
    
                            'Updated!',
    
                            'Information has been updated.',
    
                            'success'
    
                        )
    
                        this.$Progress.finish();
    
                        Fire.$emit('AfterCreate');
    
                    })
    
                    .catch(() => {
    
                        //this.$Progress.fail();
    
                    });
    
            },
    
            editModal(inbounds) {
    
                // alert(camapign_id);
    
                this.editmode = true;
    
                this.form.reset();
    
                $('#addNew').modal('show');
    
                this.form.fill(inbounds);
    
            },
    
            newModal() {
    
                this.editmode = false;
    
                this.form.reset();
    
                $('#addNew').modal('show');
    
            },
    
        },
    
    }
</script>
<style>
    .test:after {
    
        content: '\2807';
    
        font-size: 20px;
    
        position: relative;
    
        display: inline-block;
    
    }
    
    
    
    .options a:hover {
    
        background-color: #f1f1f1;
    
    }
    
    
    
    .test:hover .options {
    
        display: block;
    
    }
    
    
    
    .options {
    
        padding: 8px 16px;
    
        display: none;
    
        position: absolute;
    
        right: 4;
    
        background-color: #f9f9f9;
    
        min-width: 160px;
    
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
    
        z-index: 1;
    
        border-radius: 7px;
    
    }
</style>