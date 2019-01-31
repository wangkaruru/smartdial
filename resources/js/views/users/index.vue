<template>
    <!-- Start Content-->
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">User List</h4>
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

                                <div v-if="users">
                                    <table class="table table-hover" >
                                        <thead>
                                         <tr>
                                            <th>USER ID</th>
                                            <th>FULL NAME</th>
                                            <th>USER</th>
                                            <th>LEVEL</th>
                                            <th>GROUP</th>
                                            <th>ACTIVE</th>
                                           
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr v-for="user in users.data">
                                            <td>{{ user.user_id }}</td>
                                            <td>{{ user.full_name}}</td>
                                            <td>{{ user.user}}</td>
                                            <td>{{ user.user_level }}</td>
                                            <td>{{ user.user_group }}</td>
                                            <td>{{ user.active }}</td>
                                            <td>

                                                <a  data-toggle="dropdown"  aria-haspopup="false"
                                                    aria-expanded="false">
                                                    <div class="test">
                                                            <div class="options" >
                                                                <a href="#" @click="editModal(user)">Edit</a><br>
                                                                <a href="#" @click="deleteUser(user.user_id)">Delete</a><br>
                                                            </div>
                                                    </div>
                                                </a>

                                            </td>
                                             
                                            
                                            </tr>
                                        </tbody>
                                    </table></div>
                                    <div v-else> 
                                        <h3>Loading...</h3>
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <pagination :data="users" v-on:pagination-change-page="getUsers"></pagination>
                            </div>
                        </div>

                    </div> <!-- end card-body -->
                </div> <!-- end card -->
            </div><!-- end col -->
        </div>
        

        


        <!-- Modal -->
        <div class="modal fade" id="addNew" tabindex="-1" role="dialog" aria-labelledby="addNewLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    
                    <h5 class="modal-title"  id="addNewLabel">Update User's Info</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form @submit.prevent="editmode ? updateUser() : createUser()">
                <div class="modal-body">
                  <div class="form-row">
                     <div class="form-group col-md-4">
                           <label for="inputCity" class="col-form-label">User</label>
                         <input type="text" class="form-control" v-model="form.user" name="user" placeholder="user">
                     </div>
                    <div class="form-group col-md-4">
                       <label for="inputState" class="col-form-label">Password</label>
                         <input type="text" class="form-control" v-model="form.pass" name="pass" placeholder="password">
                     </div>
                     <div class="form-group col-md-4">
                       <label for="inputState" class="col-form-label"> Force Change Password</label>
                       <select name="force_change_password" v-model="form.force_change_password" id="force_change_password" class="form-control">
                  
                  <option value="Y">Y</option>
                  <option value="N">N</option>
                  </select>
                     </div>
                    </div>

                    <div class="form-row">
                     <div class="form-group col-md-4">
                       <label for="inputState" class="col-form-label">Last Login</label>
                         <input type="text" class="form-control" v-model="form.last_login_date" name="last_login_date" placeholder="last login">
                     </div>
                    <div class="form-group col-md-4">
                       <label for="inputState" class="col-form-label">Full Name</label>
                         <input type="text" class="form-control" v-model="form.full_name" name="full_name" placeholder="full name">
                     </div>
                     <div class="form-group col-md-4">
                       <label for="inputState" class="col-form-label">User Group</label>
                         <input type="text" class="form-control" v-model="form.user_group" name="user_group" placeholder="user group">
                     </div>
                    </div>

                    <div class="form-row">
                     <div class="form-group col-md-4">
                       <label for="inputState" class="col-form-label">User Level</label>
                         <select name="user_level" v-model="form.user_level" id="user_level" class="form-control">
                        <option value="1">1</option>
                       <option value="2">2</option>
                       <option value="3">3</option>
                       <option value="4">4</option>
                       <option value="5">5</option>
                       <option value="6">6</option>
                       <option value="7">7</option>
                       <option value="8">8</option>
                       <option value="9">9</option>
                  </select>
                     </div>
                    <div class="form-group col-md-4">
                       <label for="inputState" class="col-form-label">Phone Login</label>
                         <input type="text" class="form-control" v-model="form.phone_login" name="phone_login" placeholder="phone login">
                     </div>
                     <div class="form-group col-md-4">
                       <label for="inputState" class="col-form-label">Phone Pass</label>
                         <input type="text" class="form-control" v-model="form.phonepass" name="phone_pass" placeholder="phone pass">
                     </div>
                    </div>

                    <div class="form-row">
                    <div class="form-group col-md-4">
                      <label for="inputState" class="col-form-label">Active</label>
                       <select name="active" v-model="form.active" id="active" class="form-control">
                       <option value="Y">Y</option>
                       <option value="N">N</option>
                  </select>
                     </div>
                    <div class="form-group col-md-4">
                       <label for="inputState" class="col-form-label">Voicemail ID</label>
                         <input type="text" class="form-control" v-model="form.voicemail_id" name="voicemail_id" placeholder="voicemail ID">
                     </div>
                     <div class="form-group col-md-4">
                       <label for="inputState" class="col-form-label">Email</label>
                         <input type="text" class="form-control" v-model="form.email" name="email" placeholder="email">
                     </div>
                    </div>

                    <div class="form-row">
                     <div class="form-group col-md-4">
                       <label for="inputState" class="col-form-label">User Code</label>
                         <input type="text" class="form-control" v-model="form.user_code" name="user_code" placeholder="user code">
                     </div>
                    <div class="form-group col-md-4">
                       <label for="inputState" class="col-form-label">Main Territory</label>
                         <input type="text" class="form-control" v-model="form.territory" name="territory" placeholder="main territory">
                     </div>
                     <div class="form-group col-md-4">
                       <label for="inputState" class="col-form-label">User Nickname</label>
                         <input type="text" class="form-control" v-model="form.user_nickname" name="user_nickname" placeholder="user nickname">
                     </div>
                     
                    </div>
                     <div class="modal-header">
                            <h5 class="modal-title" v-show="editmode" id="addNewLabel">Agent Interface Options</h5>
                            </div>

            <div class="form-row">
                     <div class="form-group col-md-4">
                      <label for="inputState" class="col-form-label">Agent Choose Ingroups</label>
                       <select name="agent_choose_ingroups" v-model="form.agent_choose_ingroups" id="agent_choose_ingroups" class="form-control">
                        <option value="1">Y</option>
                     <option value="0">N</option>
                     </select>
                     </div>
                    <div class="form-group col-md-4">
                        <label for="inputState" class="col-form-label">Agent Choose Blended</label>
                       <select name="agent_choose_blended" v-model="form.agent_choose_blended" id="agent_choose_blended" class="form-control">
                        <option value="1">Y</option>
                         <option value="0">N</option>
                        </select>
                     </div>
                     <div class="form-group col-md-4">
                       <label for="inputState" class="col-form-label">Hot Keys Active</label>
                         <select name="hotkeys_active" v-model="form.hotkeys_active" id="hotkeys_active" class="form-control">
                         <option value="1">Y</option>
                         <option value="0">N</option>
                         </select>
                     </div>
                     </div>
                    <div class="form-row">
                     <div class="form-group col-md-4">
                       <label for="inputState" class="col-form-label">Scheduled Callbacks</label>
                         <select name="scheduled_callbacks" v-model="form.scheduled_callbacks" id="scheduled_callbacks" class="form-control">
                            <option value="1">Y</option>
                            <option value="0">N</option>
                            </select>
                     </div>

                     <div class="form-group col-md-4">
                       <label for="inputState" class="col-form-label">Agent-Only Callback</label>
                         <select name="agentonly_callbacks" v-model="form.agentonly_callbacks" id="agentonly_callbacks" class="form-control">
                            <option value="1">Y</option>
                                <option value="0">N</option>
                            </select>
                     </div>

                    <div class="form-group col-md-4">
                       <label for="inputState" class="col-form-label">Agent Call Manual</label>
                         <select name="agentcall_manual" v-model="form.agentcall_manual" id="agentcall_manual" class="form-control">
                            <option value="1">Y</option>
                                <option value="0">N</option>
                            </select>
                     </div>
                     
                    </div>

                  <div class="form-row">
                     <div class="form-group col-md-4">
                      <label for="inputState" class="col-form-label">Agent Recording</label>
                       <select name="vicidial_recording" v-model="form.vicidial_recording" id="vicidial_recording" class="form-control">
                <option value="1">Y</option>
                  <option value="0">N</option>
                  </select>
                     </div>
                    <div class="form-group col-md-4">
                        <label for="inputState" class="col-form-label">Agent Transfers</label>
                       <select name="vicidial_transfers" v-model="form.vicidial_transfers" id="vicidial_transfers" class="form-control">
                <option value="1">Y</option>
                  <option value="0">N</option>
                  </select>
                     </div>
                     <div class="form-group col-md-4">
                       <label for="inputState" class="col-form-label">Closer Default Blended</label>
                         <select name="closer_default_blended" v-model="form.closer_default_blended" id="closer_default_blended" class="form-control">
                <option value="1">Y</option>
                  <option value="0">N</option>
                  </select>
                     </div>

                
                    </div>





                     <div class="form-row">

                     <div class="form-group col-md-4">
                      <label for="inputState" class="col-form-label">Agent Shift Enforcement Override</label>
                       <select name="agent_shift_enforcement_override" v-model="form.agent_shift_enforcement_override" id="agent_shift_enforcement_override" class="form-control">
                <option value="DISABLED">DISABLED</option>
                  <option value="OFF">OFF</option>
                  <option value="START">START</option>
                  <option value="ALL">ALL</option>
                  </select>
                     </div>

                    <div class="form-group col-md-4">
                        <label for="inputState" class="col-form-label">Agent Call Log View Override</label>
                       <select name="agent_call_log_view_override" v-model="form.agent_call_log_view_override" id="agent_call_log_view_override" class="form-control">
                <option value="DISABLED">DISABLED</option>
                  <option value="Y">YES</option>
                  <option value="N">NO</option>
                  </select>
                     </div>

                     <div class="form-group col-md-4">
                       <label for="inputState" class="col-form-label">Agent Lead Search Override</label>
                         <select name="agent_lead_search_override" v-model="form.agent_lead_search_override" id="agent_lead_search_override" class="form-control">
                <option value="NOT_ACTIVE">NOT_ACTIVE</option>
                  <option value="ENABLED">ENABLED</option>
                  <option value="LIVE_CALL_INBOUND">LIVE_CALL_INBOUND</option>
                  <option value="LIVE_CALL_INBOUND_AND_MANUAL">LIVE_CALL_INBOUND_AND_MANUAL</option>
                  <option value="DISABLED">DISABLED</option>
                  </select>
                     </div>

                     </div>
                         <div class="form-row">
                     <div class="form-group col-md-4">
                       <label for="inputState" class="col-form-label">Alert Enabled</label>
                         <select name="alter_custdata_override" v-model="form.alter_custdata_override" id="alter_custdata_override" class="form-control">
                            <option value="NOT_ACTIVE">NOT_ACTIVE</option>
                                <option value="ALLOW_ALTER">ALLOW_ALTER</option>
                            </select>
                     </div>

                    <div class="form-group col-md-4">
                       <label for="inputState" class="col-form-label">Allow Enabled</label>
                         <select name="allow_alerts" v-model="form.allow_alerts" id="allow_alerts" class="form-control">
                                <option value="0">NO</option>
                                <option value="1">YES</option>
                            </select>
                     </div>
                     
                    </div>
      

                    <div class="form-row">
                     <div class="form-group col-md-4">
                       <label for="inputState" class="col-form-label">Agent Recording Override</label>
                         <select name="vicidial_recording_override" v-model="form.vicidial_recording_override" id="vicidial_recording_override" class="form-control">
                            <option value="DISABLED">DISABLED</option>
                            <option value="NEVER">NEVER</option>
                            <option value="ONDEMAND">ONDEMAND</option>
                            <option value="ALLCALLS">ALLCALLS</option>
                            <option value="ALLFORCE">ALLFORCE</option>
                            </select>
                     </div>

                     <div class="form-group col-md-4">
                       <label for="inputState" class="col-form-label">Agent Alter Customer Data Override</label>
                         <select name="alter_custdata_override" v-model="form.alter_custdata_override" id="alter_custdata_override" class="form-control">
                            <option value="NOT_ACTIVE">NOT_ACTIVE</option>
                                <option value="ALLOW_ALTER">ALLOW_ALTER</option>
                            </select>
                     </div>

                    <div class="form-group col-md-4">
                       <label for="inputState" class="col-form-label">Agent Alter Customer Phone Override</label>
                         <select name="alter_custphone_override" v-model="form.alter_custphone_override" id="alter_custphone_override" class="form-control">
                                <option value="NOT_ACTIVE">NOT_ACTIVE</option>
                                <option value="ALLOW_ALTER">ALLOW_ALTER</option>
                            </select>
                     </div>
            </div>

            <div class="form-row">
             <div class="form-group col-md-4">
                       <label for="inputState" class="col-form-label">Allow Alerts</label>
                         <select name="alert_enabled" v-model="form.alert_enabled" id="alert_enabled" class="form-control">
                            <option value="1">Y</option>
                                <option value="0">N</option>
                            </select>
                     </div>
            
            <div class="form-group col-md-4">
                       <label for="inputState" class="col-form-label">Preset Contact Search</label>
                         <select name="preset_contact_search" v-model="form.preset_contact_search" id="preset_contact_search" class="form-control">
                            <option value="NOT_ACTIVE">NOT_ACTIVE</option>
                                <option value="DISABLED">DISABLED</option>
                            </select>
                     </div>

            <div class="form-group col-md-4">
                       <label for="inputState" class="col-form-label">Max Inbound Calls</label>
                    <input type="text" class="form-control" v-model="form.max_inbound_calls" name="max_inbound_calls" >

                     </div>
             
                     
            </div>

            <div class="form-row">
             <div class="form-group col-md-4">
                       <label for="inputState" class="col-form-label">Max Manual Dial Hopper Calls</label>
                        <input type="text" class="form-control" v-model="form.max_hopper_calls" name="max_hopper_calls" >

                     </div>
            
            <div class="form-group col-md-4">
                       <label for="inputState" class="col-form-label">Preset Contact Search</label>
                         <select name="preset_contact_search" v-model="form.preset_contact_search" id="preset_contact_search" class="form-control">
                            <option value="NOT_ACTIVE">NOT_ACTIVE</option>
                                <option value="DISABLED">DISABLED</option>
                            </select>
                     </div>

            <div class="form-group col-md-4">
                       <label for="inputState" class="col-form-label">Max Inbound Calls</label>
                    <input type="text" class="form-control" v-model="form.max_inbound_calls" name="max_inbound_calls" >

                     </div>
             
                     
            </div>

            <div class="form-row">
             <div class="form-group col-md-4">
                       <label for="inputState" class="col-form-label">Max Manual Dial Hopper Calls/hr</label>
                        <input type="text" class="form-control" v-model="form.max_hopper_calls_hour" name="max_hopper_calls_hour" >

                     </div>
            
            <div class="form-group col-md-4">
                       <label for="inputState" class="col-form-label">Wrap Seconds Override</label>
                         	
                 <input type="text" class="form-control" v-model="form.wrapup_seconds_override" name="wrapup_seconds_override" >

                     </div>

            <div class="form-group col-md-4">
                       <label for="inputState" class="col-form-label">Agent Ready Max Logout Override</label>
                    <input type="text" class="form-control" v-model="form.ready_max_logout" name="ready_max_logout" >

                     </div>
             
                     
            </div>

            <div class="modal-header">
                            <h5 class="modal-title" v-show="editmode" id="addNewLabel">Admin Report Options</h5>
                            </div>
            <div class="form-row">
                     <div class="form-group col-md-4">
                       <label for="inputState" class="col-form-label">Realtime Block User Info</label>
                         <select name="realtime_block_user_info" v-model="form.realtime_block_user_info" id="realtime_block_user_info" class="form-control">
                                <option value="0">NO</option>
                                <option value="1">YES</option>
                            </select>
                     </div>

                      <div class="form-group col-md-4">
                       <label for="inputState" class="col-form-label">Admin Hide Lead Data</label>
                         <select name="admin_hide_lead_data" v-model="form.admin_hide_lead_data" id="admin_hide_lead_data" class="form-control">
                                <option value="0">NO</option>
                                <option value="1">YES</option>
                            </select>
                     </div>

                     <div class="form-group col-md-4">
                       <label for="inputState" class="col-form-label">Admin Hide Phone Data</label>
                         <select name="admin_hide_phone_data" v-model="form.admin_hide_phone_data" id="admin_hide_phone_data" class="form-control">
                                <option value="0">NO</option>
                                <option value="1">YES</option>
                            </select>
                     </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                       <label for="inputState" class="col-form-label">Search Lead Ignore Group Restrictions</label>
                         <select name="ignore_group_on_search" v-model="form.ignore_group_on_search" id="ignore_group_on_search" class="form-control">
                                <option value="0">NO</option>
                                <option value="1">YES</option>
                            </select>
                     </div>
            
            </div>
                <div class="modal-header">
                            <h5 class="modal-title" v-show="editmode" id="addNewLabel">Admin Interface Options</h5>
                            </div>

                <div class="form-row">
                <div class="form-group col-md-4">
                       <label for="inputState" class="col-form-label">View Reports</label>
                         <select name="view_reports" v-model="form.view_reports" id="view_reports" class="form-control">
                                <option value="0">NO</option>
                                <option value="1">YES</option>
                            </select>
                     </div>

                <div class="form-group col-md-4">
                       <label for="inputState" class="col-form-label">Alter Agent Interface Options</label>
                         <select name="alter_agent_interface_options" v-model="form.alter_agent_interface_options" id="alter_agent_interface_options" class="form-control">
                                <option value="0">NO</option>
                                <option value="1">YES</option>
                            </select>
                     </div>

                      <div class="form-group col-md-4">
                       <label for="inputState" class="col-form-label">Modify Users</label>
                         <select name="modify_users" v-model="form.modify_users" id="modify_users" class="form-control">
                                <option value="0">NO</option>
                                <option value="1">YES</option>
                            </select>
                     </div>
            
            </div>    

            <div class="form-row">
                <div class="form-group col-md-4">
                       <label for="inputState" class="col-form-label">Change Agent Campaign</label>
                         <select name="modify_campaigns" v-model="form.modify_campaigns" id="modify_campaigns" class="form-control">
                                <option value="0">NO</option>
                                <option value="1">YES</option>
                            </select>
                     </div>

                <div class="form-group col-md-4">
                       <label for="inputState" class="col-form-label">Delete Users</label>
                         <select name="delete_users" v-model="form.delete_users" id="delete_users" class="form-control">
                                <option value="0">NO</option>
                                <option value="1">YES</option>
                            </select>
                     </div>

                      <div class="form-group col-md-4">
                       <label for="inputState" class="col-form-label">Modify Users</label>
                         <select name="modify_users" v-model="form.modify_users" id="modify_users" class="form-control">
                                <option value="0">NO</option>
                                <option value="1">YES</option>
                            </select>
                     </div>
            
            </div>

            <div class="form-row">
                <div class="form-group col-md-4">
                       <label for="inputState" class="col-form-label">Modify User Groups</label>
                         <select name="modify_usergroups" v-model="form.modify_usergroups" id="modify_usergroups" class="form-control">
                                <option value="0">NO</option>
                                <option value="1">YES</option>
                            </select>
                     </div>

                     <div class="form-group col-md-4">
                       <label for="inputState" class="col-form-label">Delete User Groups</label>
                         <select name="delete_user_groups" v-model="form.delete_user_groups" id="delete_user_groups" class="form-control">
                                <option value="0">NO</option>
                                <option value="1">YES</option>
                            </select>
                     </div>

                      <div class="form-group col-md-4">
                       <label for="inputState" class="col-form-label">Modify Lists</label>
                         <select name="modify_lists" v-model="form.modify_lists" id="modify_lists" class="form-control">
                                <option value="0">NO</option>
                                <option value="1">YES</option>
                            </select>
                     </div>
            
            </div> 

            <div class="form-row">
                <div class="form-group col-md-4">
                       <label for="inputState" class="col-form-label">Load Leads</label>
                         <select name="load_leads" v-model="form.load_leads" id="load_leads" class="form-control">
                                <option value="0">NO</option>
                                <option value="1">YES</option>
                            </select>
                     </div>

                <div class="form-group col-md-4">
                       <label for="inputState" class="col-form-label">Modify Leads</label>
                         <select name="modify_leads" v-model="form.modify_leads" id="modify_leads" class="form-control">
                                <option value="0">NO</option>
                                <option value="1">YES</option>
                            </select>
                     </div>

                      <div class="form-group col-md-4">
                       <label for="inputState" class="col-form-label">GDPR-Compliant Export Delete Leads</label>
                         <select name="export_gdpr_leads" v-model="form.export_gdpr_leads" id="export_gdpr_leads" class="form-control">
                                <option value="0">0</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                            </select>
                     </div>
            
            </div>    
                <div class="form-row">
                <div class="form-group col-md-4">
                       <label for="inputState" class="col-form-label">Delete Lists</label>
                         <select name="delete_lists" v-model="form.delete_lists" id="delete_lists" class="form-control">
                                <option value="0">NO</option>
                                <option value="1">YES</option>
                            </select>
                     </div>
                     <div class="form-group col-md-4">
                       <label for="inputState" class="col-form-label">Download Lists</label>
                         <select name="download_lists" v-model="form.download_lists" id="download_lists" class="form-control">
                                <option value="0">NO</option>
                                <option value="1">YES</option>
                            </select>
                     </div>

                     <div class="form-group col-md-4">
                       <label for="inputState" class="col-form-label">Export Reports</label>
                         <select name="export_reports" v-model="form.export_reports" id="export_reports" class="form-control">
                                <option value="0">NO</option>
                                <option value="1">YES</option>
                            </select>
                     </div>
                </div>
                <div class="form-row">
                 <div class="form-group col-md-4">
                       <label for="inputState" class="col-form-label">Delete From DNC Lists</label>
                         <select name="delete_from_dnc" v-model="form.delete_from_dnc" id="delete_from_dnc" class="form-control">
                                <option value="0">NO</option>
                                <option value="1">YES</option>
                            </select>
                     </div>

                      <div class="form-group col-md-4">
                       <label for="inputState" class="col-form-label">Modify Campaigns</label>
                         <select name="modify_campaigns" v-model="form.modify_campaigns" id="modify_campaigns" class="form-control">
                                <option value="0">NO</option>
                                <option value="1">YES</option>
                            </select>
                     </div>
                      <div class="form-group col-md-4">
                       <label for="inputState" class="col-form-label">Campaign Detail</label>
                         <select name="campaign_detail" v-model="form.campaign_detail" id="campaign_detail" class="form-control">
                                <option value="0">NO</option>
                                <option value="1">YES</option>
                            </select>
                     </div>
                </div>
                <div class="form-row">
                <div class="form-group col-md-4">
                       <label for="inputState" class="col-form-label">Delete Campaigns</label>
                         <select name="delete_campaigns" v-model="form.delete_campaigns" id="delete_campaigns" class="form-control">
                                <option value="0">NO</option>
                                <option value="1">YES</option>
                            </select>
                     </div>

                     <div class="form-group col-md-4">
                       <label for="inputState" class="col-form-label">Modify In-Groups</label>
                         <select name="modify_ingroups" v-model="form.modify_ingroups" id="modify_ingroups" class="form-control">
                                <option value="0">NO</option>
                                <option value="1">YES</option>
                            </select>
                     </div>

                     <div class="form-group col-md-4">
                       <label for="inputState" class="col-form-label">Delete In-Groups</label>
                         <select name="delete_ingroups" v-model="form.delete_ingroups" id="delete_ingroups" class="form-control">
                                <option value="0">NO</option>
                                <option value="1">YES</option>
                            </select>
                     </div>
                </div>

                <div class="form-row">
                     <div class="form-group col-md-4">
                       <label for="inputState" class="col-form-label">Modify DIDs</label>
                         <select name="modify_inbound_dids" v-model="form.modify_inbound_dids" id="modify_inbound_dids" class="form-control">
                                <option value="0">NO</option>
                                <option value="1">YES</option>
                            </select>
                     </div>

                     <div class="form-group col-md-4">
                       <label for="inputState" class="col-form-label">Delete DIDs</label>
                         <select name="delete_inbound_dids" v-model="form.delete_inbound_dids" id="delete_inbound_dids" class="form-control">
                                <option value="0">NO</option>
                                <option value="1">YES</option>
                            </select>
                     </div>

                     <div class="form-group col-md-4">
                       <label for="inputState" class="col-form-label">Modify Custom Dialplans</label>
                         <select name="modify_custom_dialplans" v-model="form.modify_custom_dialplans" id="modify_custom_dialplans" class="form-control">
                                <option value="0">NO</option>
                                <option value="1">YES</option>
                            </select>
                     </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                       <label for="inputState" class="col-form-label">Modify Remote Agents</label>
                         <select name="modify_remoteagents" v-model="form.modify_remoteagents" id="modify_remoteagents" class="form-control">
                                <option value="0">NO</option>
                                <option value="1">YES</option>
                            </select>
                     </div>

                     <div class="form-group col-md-4">
                       <label for="inputState" class="col-form-label">Delete Remote Agents</label>
                         <select name="delete_remote_agents" v-model="form.delete_remote_agents" id="delete_remote_agents" class="form-control">
                                <option value="0">NO</option>
                                <option value="1">YES</option>
                            </select>
                     </div>
                     <div class="form-group col-md-4">
                       <label for="inputState" class="col-form-label">Delete Scripts</label>
                         <select name="delete_scripts" v-model="form.delete_scripts" id="delete_scripts" class="form-control">
                                <option value="0">NO</option>
                                <option value="1">YES</option>
                            </select>
                     </div>
                </div>
                <div class="form-row">
                <div class="form-group col-md-4">
                       <label for="inputState" class="col-form-label">Modify Filters</label>
                         <select name="modify_filters" v-model="form.modify_filters" id="modify_filters" class="form-control">
                                <option value="0">NO</option>
                                <option value="1">YES</option>
                            </select>
                     </div>

                     <div class="form-group col-md-4">
                       <label for="inputState" class="col-form-label">Delete Filters</label>
                         <select name="delete_filters" v-model="form.delete_filters" id="delete_filters" class="form-control">
                                <option value="0">NO</option>
                                <option value="1">YES</option>
                            </select>
                     </div>

                     <div class="form-group col-md-4">
                       <label for="inputState" class="col-form-label">AGC Admin Access</label>
                         <select name="ast_admin_access" v-model="form.ast_admin_access" id="ast_admin_access" class="form-control">
                                <option value="0">NO</option>
                                <option value="1">YES</option>
                            </select>
                     </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                       <label for="inputState" class="col-form-label">AGC Delete Phones</label>
                         <select name="ast_delete_phones" v-model="form.ast_delete_phones" id="ast_delete_phones" class="form-control">
                                <option value="0">NO</option>
                                <option value="1">YES</option>
                            </select>
                     </div>

                     <div class="form-group col-md-4">
                       <label for="inputState" class="col-form-label">Modify Call Times</label>
                         <select name="modify_call_times" v-model="form.modify_call_times" id="modify_call_times" class="form-control">
                                <option value="0">NO</option>
                                <option value="1">YES</option>
                            </select>
                     </div>

                     <div class="form-group col-md-4">
                       <label for="inputState" class="col-form-label">Delete Call Times</label>
                         <select name="delete_call_times" v-model="form.delete_call_times" id="delete_call_times" class="form-control">
                                <option value="0">NO</option>
                                <option value="1">YES</option>
                            </select>
                     </div>
                </div>

                <div class="form-row">
                <div class="form-group col-md-4">
                       <label for="inputState" class="col-form-label">Modify Servers</label>
                         <select name="modify_servers" v-model="form.modify_servers" id="modify_servers" class="form-control">
                                <option value="0">NO</option>
                                <option value="1">YES</option>
                            </select>
                     </div>

                <div class="form-group col-md-4">
                       <label for="inputState" class="col-form-label">Modify Shifts</label>
                         <select name="modify_shifts" v-model="form.modify_shifts" id="modify_shifts" class="form-control">
                                <option value="0">NO</option>
                                <option value="1">YES</option>
                            </select>
                     </div>

                <div class="form-group col-md-4">
                       <label for="inputState" class="col-form-label">Modify Phones</label>
                         <select name="modify_phones" v-model="form.modify_phones" id="modify_phones" class="form-control">
                                <option value="0">NO</option>
                                <option value="1">YES</option>
                            </select>
                     </div>
                </div>


                <div class="form-row">
                <div class="form-group col-md-4">
                       <label for="inputState" class="col-form-label">Modify Carriers</label>
                         <select name="modify_carriers" v-model="form.modify_carriers" id="modify_carriers" class="form-control">
                                <option value="0">NO</option>
                                <option value="1">YES</option>
                            </select>
                     </div>

                <div class="form-group col-md-4">
                       <label for="inputState" class="col-form-label">Modify Labels</label>
                         <select name="modify_labels" v-model="form.modify_labels" id="modify_labels" class="form-control">
                                <option value="0">NO</option>
                                <option value="1">YES</option>
                            </select>
                     </div>

                <div class="form-group col-md-4">
                       <label for="inputState" class="col-form-label">Modify Colors</label>
                         <select name="modify_colors" v-model="form.modify_colors" id="modify_colors" class="form-control">
                                <option value="0">NO</option>
                                <option value="1">YES</option>
                            </select>
                     </div>
                </div>

                <div class="form-row">
                <div class="form-group col-md-4">
                       <label for="inputState" class="col-form-label">Modify Statuses</label>
                         <select name="modify_statuses" v-model="form.modify_statuses" id="modify_statuses" class="form-control">
                                <option value="0">NO</option>
                                <option value="1">YES</option>
                            </select>
                     </div>

                <div class="form-group col-md-4">
                       <label for="inputState" class="col-form-label">Modify Voicemail</label>
                         <select name="modify_voicemail" v-model="form.modify_voicemail" id="modify_voicemail" class="form-control">
                                <option value="0">NO</option>
                                <option value="1">YES</option>
                            </select>
                     </div>

                <div class="form-group col-md-4">
                       <label for="inputState" class="col-form-label">Modify Audio Store</label>
                         <select name="modify_audiostore" v-model="form.modify_audiostore" id="modify_audiostore" class="form-control">
                                <option value="0">NO</option>
                                <option value="1">YES</option>
                            </select>
                     </div>
                </div>

                <div class="form-row">
                <div class="form-group col-md-4">
                       <label for="inputState" class="col-form-label">Modify Music On Hold</label>
                         <select name="modify_moh" v-model="form.modify_moh" id="modify_moh" class="form-control">
                                <option value="0">NO</option>
                                <option value="1">YES</option>
                            </select>
                     </div>

                <div class="form-group col-md-4">
                       <label for="inputState" class="col-form-label">Modify TTS</label>
                         <select name="modify_tts" v-model="form.modify_tts" id="modify_tts" class="form-control">
                                <option value="0">NO</option>
                                <option value="1">YES</option>
                            </select>
                     </div>

                <div class="form-group col-md-4">
                       <label for="inputState" class="col-form-label">Modify Contacts</label>
                         <select name="modify_contacts" v-model="form.modify_contacts" id="modify_contacts" class="form-control">
                                <option value="0">NO</option>
                                <option value="1">YES</option>
                            </select>
                     </div>
                </div>

                <div class="form-row">
                <div class="form-group col-md-4">
                       <label for="inputState" class="col-form-label">CallCard Access</label>
                         <select name="callcard_admin" v-model="form.callcard_admin" id="callcard_admin" class="form-control">
                                <option value="0">NO</option>
                                <option value="1">YES</option>
                            </select>
                     </div>

                <div class="form-group col-md-4">
                       <label for="inputState" class="col-form-label">Add Timeclock Log Record</label>
                         <select name="add_timeclock_log" v-model="form.add_timeclock_log" id="add_timeclock_log" class="form-control">
                                <option value="0">NO</option>
                                <option value="1">YES</option>
                            </select>
                     </div>

                <div class="form-group col-md-4">
                       <label for="inputState" class="col-form-label">Modify Timeclock Log Record</label>
                         <select name="modify_timeclock_log" v-model="form.modify_timeclock_log" id="modify_timeclock_log" class="form-control">
                                <option value="0">NO</option>
                                <option value="1">YES</option>
                            </select>
                     </div>
                </div>

                <div class="form-row">
                <div class="form-group col-md-4">
                       <label for="inputState" class="col-form-label">Delete Timeclock Log Record</label>
                         <select name="delete_timeclock_log" v-model="form.delete_timeclock_log" id="delete_timeclock_log" class="form-control">
                                <option value="0">NO</option>
                                <option value="1">YES</option>
                            </select>
                     </div>

                <div class="form-group col-md-4">
                       <label for="inputState" class="col-form-label">Manager Shift Enforcement Override</label>
                         <select name="manager_shift_enforcement_override" v-model="form.manager_shift_enforcement_override" id="manager_shift_enforcement_override" class="form-control">
                                <option value="0">NO</option>
                                <option value="1">YES</option>
                            </select>
                     </div>

                <div class="form-group col-md-4">
                       <label for="inputState" class="col-form-label">Manager Pause Code Approval</label>
                         <select name="pause_code_approval" v-model="form.pause_code_approval" id="pause_code_approval" class="form-control">
                                <option value="0">NO</option>
                                <option value="1">YES</option>
                            </select>
                     </div>
                </div>
                <div class="modal-header">
                            <h5 class="modal-title" v-show="editmode" id="addNewLabel">API USER OPTIONS, Only enable if needed</h5>
                            </div>

                <div class="form-row">
                            <div class="form-group col-md-4">
                       <label for="inputState" class="col-form-label">API Only User</label>
                         <select name="api_only_user" v-model="form.api_only_user" id="api_only_user" class="form-control">
                                <option value="0">NO</option>
                                <option value="1">YES</option>
                            </select>
                     </div>

                     <div class="form-group col-md-4">
                       <label for="inputState" class="col-form-label">API List Restrict</label>
                         <select name="api_list_restrict" v-model="form.api_list_restrict" id="api_list_restrict" class="form-control">
                                <option value="0">NO</option>
                                <option value="1">YES</option>
                            </select>
                     </div>

                     <div class="form-group col-md-4">
                       <label for="inputState" class="col-form-label">Agent API Access</label>
                         <select name="vdc_agent_api_access" v-model="form.vdc_agent_api_access" id="vdc_agent_api_access" class="form-control">
                                <option value="0">NO</option>
                                <option value="1">YES</option>
                            </select>
                     </div>
                </div>
                <div class="form-row">
                
                           
                </div>



              
                </div>
               <div class="modal-footer">
            <button  type="submit" v-show="!editMode"  class="btn btn-primary">Update</button>
            <button type="submit"  v-show="editMode" class="btn btn-primary">Update</button>
            <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
          </div>

                </form>

                </div>
            </div>
            </div>
    </div>
</template>
<style>
  .test:after {
  content: '\2807';
  font-size: 20px;
  position: relative;
 display: inline-block;
  } 
.options a:hover {background-color: #f1f1f1;}

.test:hover .options {
    display: block;
}
.options{
    padding: 8px 16px;
    display: none;
    position: absolute;
    right: 4;
    background-color: #f9f9f9;
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
    border-radius: 7px;
}
 
</style>
<script>
 import { Form, HasError, AlertError } from "vform";
import _ from 'lodash';
    export default {
        data(){
    return {    
                users: [],
                loading: false,
                editmode: false,
                users : {},
                search: '',
                searchit:'',
                //keywords:'',
      form: new Form({
        
                    user_id:'',
                    user : '',
                    pass: '',
                    last_login_date:'',
                    full_name: '',
                    user_group: '',
                    user_level: '',
                    phone_login: '',
                    phone_pass:'',
                    active:'',
                    voicemail_id:'',
                    email:'',
                    user_code:'',
                    territory:'',
                    force_change_password:'',
                    user_nickname:'',
                    agent_choose_ingroups:'',
                    agent_choose_blended:'',
                    hotkeys_active:'',
                    agentonly_callbacks:'',
                    scheduled_callbacks:'',
                    agentcall_manual:'',
                    vicidial_recording:'',
                    vicidial_transfers:'',
                    closer_default_blended:'',
                    vicidial_recording_override:'',
                    alter_custphone_override:'',
                    alter_custdata_override:'',
                    agent_shift_enforcement_override:'',
                    agent_call_log_view_override:'',
                    agent_lead_search_override:'',
                    alert_enabled:'',
                    preset_contact_search:'',
                    max_inbound_calls:'',
                    max_hopper_calls:'',
                    max_hopper_calls_hour:'',
                    wrapup_seconds_override:'',
                    ready_max_logout:'',
                    realtime_block_user_info:'',
                    admin_hide_lead_data:'',
                    admin_hide_phone_data:'',
                    ignore_group_on_search:'',
                    view_reports:'',
                    alter_agent_interface_options:'',
                    modify_users:'',
                    modify_usergroups:'',
                    delete_user_groups:'',
                    delete_lists:'',
                    modify_lists:'',
                    load_leads:'',
                    modify_leads:'',
                    export_gdpr_leads:'',
                    download_lists:'',
                    export_reports:'',
                    download_lists:'',
                    delete_from_dnc:'',
                    modify_campaigns:'',
                    campaign_detail:'',
                    modify_ingroups:'',
                    delete_ingroups:'',
                    modify_custom_dialplans:'',
                    modify_remoteagents:'',
                    delete_remote_agents:'',
                    ast_admin_access:'',
                    ast_delete_phones:'',
                    modify_call_times:'',
                    delete_call_times:'',
                    modify_servers:'',
                    modify_shifts:'',
                    modify_carriers:'',
                    modify_labels:'',
                    modify_phones:'',
                    modify_colors:'',
                    modify_statuses:'',
                    modify_voicemail:'',
                    modify_audiostore:'',
                    modify_moh:'',
                    modify_contacts:'',
                    callcard_admin:'',
                    add_timeclock_log:'',
                    modify_timeclock_log:'',
                    delete_timeclock_log:'',
                    manager_shift_enforcement_override:'',
                    pause_code_approval:'',
                    allow_alerts:'',
                    api_only_user:'',
                    api_list_restrict:'',
                    vdc_agent_api_access:'',
                    api_allowed_functions:''
        
        }) } },

        //  watch: {
        // keywords(after, before) {
        //     this.fetch();
        //        }
        //    },

         created() {
             this.getUsers();
           Fire.$on('searching',() => {
               let query = this.$parent.search;
               axios.get('api/findUser?q=' + query)
               .then((data) => {
                   this.users = data.data
               })
               .catch(() => {

               })
           })
         },
        
        methods: {
        //     fetch() {
        //     axios.get('/api/search', { params: { keywords: this.keywords } })
        //         .then(response => this.users = response.data)
        //         .catch(error => {});
        // },
        
            getUsers(page) {
                if (typeof page === 'undefined') {
                    page = 1;
                }
                axios.get('/api/users?page=' + page)
                
                    .then(response => this.users = response.data);
                    //console.log('Editing data');
                    
                     //$('#loader').success('hide')
            },
            updateUser(){
                //this.$Progress.start();
                // console.log('Editing data');
                //alert(id);
                this.form.put('api/users/'+this.form.user)
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
                    this.$Progress.fail();
                });
            },
            
            editModal(user){
                this.editmode = true;
                this.form.reset();
                $('#addNew').modal('show');
                this.form.fill(user);
            },
            newModal(){
                this.editmode = false;
                this.form.reset();
                $('#addNew').modal('show');
            },
            deleteUser(id){
                swal({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        // Send request to the server
                         if (result.value) {
                             //alert(id);
                                this.form.delete('api/users/'+id).then(()=>{
                                        swal(
                                        'Deleted!',
                                        'Your file has been deleted.',
                                        'success'
                                        )
                                    Fire.$emit('AfterCreate');
                                }).catch(()=> {
                                    swal("Failed!", "There was something wrong.", "warning");
                                });
                         }
                    })
            },
           created() {
                    Fire.$on('searching',() => {
                        let query = this.$parent.search;
                        axios.get('api/findUser?q=' + query)
                        .then((data) => {
                            this.users = data.data
                        })
                        .catch(() => {

                        })
                    })
                this.loadUsers();
                Fire.$on('AfterCreate',() => {
                    this.loadUsers();
                    console.log(_.isEmpty() ? 'Lodash is available here!' : 'Uh oh..');
                });
                //    setInterval(() => this.loadUsers(), 3000);
        },
        
            
            say: function (message) {
            alert(message)
                }
        },
       computed:{
           filteredCampaigns:function(){
               return this.campaigns.filter((campaign)=>{
                   return user.full_name.match(this.search)
               });
           }
       } 
        
        
    }
</script>

