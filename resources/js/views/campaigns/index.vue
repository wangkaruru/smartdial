<template>
    <!-- Start Content-->
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Campaign List</h4>
                   
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
                                    <table class="table table-hover" >
                                        <thead>
                                        <tr>
                                            <th>CAMPAIGN ID</th>
                                            <th>NAME</th>
                                            <th>ACTIVE</th>
                                             <th>DIAL METHOD</th>
                                             <th>USER GROUP</th>
                                            <th>LEVEL</th>
                                            <th>LEAD ORDER</th>
                                             <th>STATUSES</th>
                                            <th></th>
                                            <th></th>
                                            
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr v-for="campaign in campaigns.data ">
                                            <td>{{campaign.campaign_id}}</td>
                                            <td>{{ campaign.campaign_name }}</td>
                                            <td>{{campaign.active}}</td>
                                            <th>{{campaign.dial_method}}</th>
                                            <th>{{campaign.user_group}}</th>
                                             <th>{{campaign.hopper_level}}</th>
                                            <th>{{campaign.lead_order}}</th>
                                            <th>{{campaign.dial_statuses}}</th>
                                            
                                            
                                            <td>
                                                <a  data-toggle="dropdown"  aria-haspopup="false"
                                                    aria-expanded="false">
                                                    <div class="test">
                                                            <div class="options">
                                                                 <a href="#" @click="editModal(campaign)">Edit</a><br>
                                                                <a href="#"   @click="deleteCampaign(campaign.campaign_id)" >Delete</a>
              
                                                            </div>
                                                    </div>
                                                </a>
                                            </td>
                                        </tr>
                                       
                                        </tbody>
                                    </table>
                                </div>
                            </div> <!-- end col -->
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <pagination :data="campaigns" v-on:pagination-change-page="getCampaigns"></pagination>
                            </div>
                        </div>

                    </div> <!-- end card-body -->
                </div> <!-- end card -->
            </div><!-- end col -->
        </div>
<div class="modal fade" id="addNew" tabindex="-1" role="dialog" aria-labelledby="addNewLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    
                    <h5 class="modal-title"  id="addNewLabel">Update Campaign's Info</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                    <b-card no-body>
  <b-tabs card>
    <b-tab title="Detail" active>
     <form @submit.prevent="editmode ? updateCampaign() : createCampaign()">
                                         <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="inputEmail4" class="col-form-label">Campaign ID</label>
                                                    <input v-model="form.campaign_id" type="text" name="campaign_id" placeholder="campaign id"
                                                     class="form-control" readonly>
                                                    
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputPassword4" class="col-form-label">Campaign Name</label>
                                                    <input v-model="form.campaign_name" type="text" name="campaign_name" placeholder="campaign name"
                                                    class="form-control" >
                                                </div>
                                                <div class="form-group col-md-4">
                                                <label for="inputAddress" class="col-form-label">Campaign Description</label>
                                                <input v-model="form.campaign_description" type="text" name="campaign_description" placeholder="Campaign description"
                                                  class="form-control" >
                                            </div>
                                         </div>
                                         <div class="form-row">
                <div class="form-group col-md-4">
                     <label for="inputAddress" class="col-form-label">Active</label>
                      <select name="active" v-model="form.active" id="active" class="form-control">
                                <option value="0">NO</option>
                                <option value="1">YES</option>
                            </select>
                  </div>

                  <div class="form-group col-md-4">
                     <label for="inputAddress" class="col-form-label">Admin User Group</label>
                      <select name="active" v-model="form.active" id="active" class="form-control">
                                <option value="0">NO</option>
                                <option value="1">YES</option>
                            </select>
                  </div>
                  <div class="form-group col-md-4">
                   <label for="inputPassword4" class="col-form-label">Web Form</label>
                      <input v-model="form.web_form_address" type="text" name="web_form_address" placeholder="web form"
                                                    class="form-control" >
                     </div>
                </div>
                <div class="form-row">
               	 <div class="form-group col-md-4">
                   <label for="inputPassword4" class="col-form-label">Web Form Two</label>
                      <input v-model="form.web_form_address_two" type="text" name="web_form_address_two" placeholder="web form two"
                                                    class="form-control" >
                     </div>

                <div class="form-group col-md-4">
                   <label for="inputPassword4" class="col-form-label">Web Form Target</label>
                      <input v-model="form.web_form_target" type="text" name="web_form_target" placeholder="web form target"
                                                    class="form-control" >
                     </div>
                
                
                <div class="form-group col-md-4">
                   <label for="inputPassword4" class="col-form-label">Allow Closers</label>
                      <select name="allow_closers" v-model="form.allow_closers" id="allow_closers" class="form-control">
                                <option value="0">NO</option>
                                <option value="1">YES</option>
                            </select>
                     </div>
                     
                </div>
                <div class="form-row">
                <div class="form-group col-md-4">
                   <label for="inputPassword4" class="col-form-label">Allow Inbound and Blended</label>
                      <select name="campaign_allow_inbound" v-model="form.campaign_allow_inbound" id="campaign_allow_inbound" class="form-control">
                                <option value="0">NO</option>
                                <option value="1">YES</option>
                            </select>
                     </div>
                     <div class="form-group col-md-4">
                   <label for="inputPassword4" class="col-form-label">Allow Chats</label>
                      <select name="allow_chats" v-model="form.allow_chats" id="allow_chats" class="form-control">
                                <option value="0">NO</option>
                                <option value="1">YES</option>
                            </select>
                     </div>
                     <div class="form-group col-md-4">
                   <label for="inputPassword4" class="col-form-label">Add A Dial Status to Call</label>
                      <select name="campaign_allow_inbound" v-model="form.campaign_allow_inbound" id="campaign_allow_inbound" class="form-control">
                                <option value="0">NO</option>
                                <option value="1">YES</option>
                            </select>
                     </div>
                </div>
                <div class="form-row">
                <div class="form-group col-md-4">
                   <label for="inputPassword4" class="col-form-label">List Order</label>
                      <select name="list_order_mix" v-model="form.list_order_mix" id="list_order_mix" class="form-control">
                                <option value="DISABLED-DISABLED">DISABLED-DISABLED</option>
                                <option value="DISABLED">DISABLED</option>
                            </select>
                     </div>
                     <div class="form-group col-md-4">
                   <label for="inputPassword4" class="col-form-label">Lead Filter</label>
                      <select name="lead_filter_id" v-model="form.lead_filter_id" id="lead_filter_id" class="form-control">
                                <option value="NONE">NONE</option>
                                <option value="NONE">NONE</option>
                            </select>
                     </div>
                     <div class="form-group col-md-4">
                   <label for="inputPassword4" class="col-form-label">Drop Lockout Time</label>
                      <input v-model="form.drop_lockout_time" type="text" name="drop_lockout_time" placeholder="drop lockout time"
                                                    class="form-control" >
                     </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                   <label for="inputPassword4" class="col-form-label">Call Count Limit</label>
                      <input v-model="form.call_count_limit" type="text" name="call_count_limit" placeholder="call count limit"
                                                    class="form-control" >
                     </div>
                     <div class="form-group col-md-4">
                   <label for="inputPassword4" class="col-form-label">Call Count Target</label>
                      <input v-model="form.call_count_target" type="text" name="call_count_target" placeholder="call count target"
                                                    class="form-control" >
                     </div>
                     <div class="form-group col-md-4">
                   <label for="inputPassword4" class="col-form-label">Minimum Hopper Level</label>
                      <select name="lead_filter_id" v-model="form.lead_filter_id" id="lead_filter_id" class="form-control">
                                <option value="NONE">NONE</option>
                                <option value="NONE">NONE</option>
                            </select>
                     </div>

                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                   <label for="inputPassword4" class="col-form-label">List Order Randomize</label>
                      <select name="list_order_mix" v-model="form.list_order_mix" id="list_order_mix" class="form-control">
                                <option value="NONE">NONE</option>
                                <option value="NONE">NONE</option>
                            </select>
                     </div>
                     <div class="form-group col-md-4">
                   <label for="inputPassword4" class="col-form-label">List Order Secondary</label>
                      <select name="list_order_mix" v-model="form.list_order_mix" id="list_order_mix" class="form-control">
                                <option value="NONE">NONE</option>
                                <option value="NONE">NONE</option>
                            </select>
                     </div>
                     <div class="form-group col-md-4">
                   <label for="inputPassword4" class="col-form-label">Automatic Hopper Level</label>
                      <select name="auto_hopper_level" v-model="form.auto_hopper_level" id="auto_hopper_level" class="form-control">
                                <option value="Y">YES</option>
                                <option value="N">NO</option>
                            </select>
                     </div>
                </div>
                <div class="form-row">
                 <div class="form-group col-md-4">
                   <label for="inputPassword4" class="col-form-label">Automatic Hopper Multiplier</label>
                      <select name="auto_hopper_multi" v-model="form.auto_hopper_multi" id="auto_hopper_multi" class="form-control">
                                <option value="1">1</option>
                                <option value="1.1">1.1</option>
                            </select>
                     </div>

                    <div class="form-group col-md-4">
                   <label for="inputPassword4" class="col-form-label">Auto Trim Hopper </label>
                      <select name="auto_trim_hopper" v-model="form.auto_trim_hopper" id="auto_trim_hopper" class="form-control">
                                <option value="Y">YES</option>
                                <option value="N">NO</option>
                            </select>
                     </div>
                     <div class="form-group col-md-4">
                   <label for="inputPassword4" class="col-form-label">Hopper VLC Dup Check </label>
                      <select name="hopper_vlc_dup_check" v-model="form.hopper_vlc_dup_check" id="hopper_vlc_dup_check" class="form-control">
                                <option value="Y">YES</option>
                                <option value="N">NO</option>
                            </select>
                     </div>
                </div>

                <div class="form-row">
                 <div class="form-group col-md-4">
                   <label for="inputPassword4" class="col-form-label">Manual Dial Hopper Check</label>
                      <select name="manual_dial_hopper_check" v-model="form.manual_dial_hopper_check" id="manual_dial_hopper_check" class="form-control">
                                <option value="Y">YES</option>
                                <option value="N">NO</option>
                            </select>
                     </div>

                    <div class="form-group col-md-4">
                   <label for="inputPassword4" class="col-form-label">Force Reset of Hopper </label>
                      <select name="auto_trim_hopper" v-model="form.auto_trim_hopper" id="auto_trim_hopper" class="form-control">
                                <option value="1">1</option>
                                <option value="1.1">1.1</option>
                            </select>
                     </div>
                     <div class="form-group col-md-4">
                   <label for="inputPassword4" class="col-form-label">Dial Method</label>
                      <select name="dial_method" v-model="form.dial_method" id="dial_method" class="form-control">
                                <option value="MANUAL">MANUAL</option>
                                <option value="INBOUND_MAN">INBOUND_MAN</option>
                            </select>
                     </div>
                </div>

                <div class="form-row">
                <div class="form-group col-md-4">
                   <label for="inputPassword4" class="col-form-label">Auto Dial Method</label>
                      <select name="auto_dial_level" v-model="form.auto_dial_level" id="auto_dial_level" class="form-control">
                                <option value="1">1</option>
                                <option value="1.1">1.1</option>
                            </select>
                     </div>

                <div class="form-group col-md-4">
                   <label for="inputPassword4" class="col-form-label">Auto Dial Level Threshold</label>
                      <select name="dial_level_threshold" v-model="form.dial_level_threshold" id="dial_level_threshold" class="form-control">
                                
                                <option value="DISABLED">DISABLED</option>
                                <option value="LOGGED-IN_AGENTS">LOGGED-IN_AGENTS</option>
                                <option value="NON-PAUSED_AGENTS">NON-PAUSED_AGENTS</option>
                                <option value="WAITING_AGENTS">WAITING_AGENTS</option>
                            </select>
                     </div>
                <div class="form-group col-md-4">
                   <label for="inputPassword4" class="col-form-label">Available Only Tally</label>
                      <select name="available_only_ratio_tally" v-model="form.available_only_ratio_tally" id="available_only_ratio_tally" class="form-control">
                                <option value="Y">Y</option>
                                <option value="N">N</option>
                            </select>
                     </div>
                </div>

                <div class="form-row">
                    <div class="form-group col-md-4">
                   <label for="inputPassword4" class="col-form-label">Available Only Tally Threshold</label>
                      <select name="available_only_tally_threshold" v-model="form.available_only_tally_threshold" id="available_only_tally_threshold" class="form-control">
                                
                                <option value="DISABLED">DISABLED</option>
                                <option value="LOGGED-IN_AGENTS">LOGGED-IN_AGENTS</option>
                                <option value="NON-PAUSED_AGENTS">NON-PAUSED_AGENTS</option>
                                <option value="WAITING_AGENTS">WAITING_AGENTS</option>
                            </select>
                     </div>
                     <div class="form-group col-md-4">
                        <label for="inputPassword4" class="col-form-label">Drop Percentage Limit</label>
                      <select name="adaptive_dropped_percentage" v-model="form.adaptive_dropped_percentage" id="adaptive_dropped_percentage" class="form-control">
                                
                                <option value="1">1</option>
                                
                            </select>
                     </div>
                     <div class="form-group col-md-4">
                   <label for="inputPassword4" class="col-form-label">Maximum Adapt Dial Level</label>
                      <input v-model="form.adaptive_maximum_level" type="text" name="adaptive_maximum_level" placeholder="adaptive maximum level"
                                                    class="form-control" >
                     </div>
               </div>
               <div class="form-row">
                    <div class="form-group col-md-4">
                   <label for="inputPassword4" class="col-form-label">Latest Server Time</label>
                      <input v-model="form.adaptive_latest_server_time" type="text" name="adaptive_latest_server_time" placeholder="adaptive latest server time"
                                                    class="form-control" >
                     </div>

                     <div class="form-group col-md-4">
                        <label for="inputPassword4" class="col-form-label">Adapt Intensity Modifier</label>
                      <select name="adaptive_intensity" v-model="form.adaptive_intensity" id="adaptive_intensity" class="form-control">
                                <option value="0-Balanced">0-Balanced</option>
                                <option value="1-More Intense">1-More Intense</option>
                                <option value="2-More Intense">2-More Intense</option>
                                <option value="3-More Intense">3-More Intense</option>
                                <option value="4-More Intense">4-More Intense</option>
                                <option value="5-More Intense">5-More Intense</option>
                                <option value="6-More Intense">6-More Intense</option>
                                <option value="7-More Intense">7-More Intense</option>
                                <option value="8-More Intense">8-More Intense</option>
                                <option value="9-More Intense">9-More Intense</option>
                                <option value="10-More Intense">10-More Intense</option>
                                <option value="11-More Intense">11-More Intense</option>
                                <option value="12-More Intense">12-More Intense</option>
                                <option value="13-More Intense">13-More Intense</option>
                                <option value="14-More Intense">14-More Intense</option>
                                <option value="15-More Intense">15-More Intense</option>
                                <option value="16-More Intense">16-More Intense</option>
                                <option value="17-More Intense">17-More Intense</option>
                                <option value="18-More Intense">18-More Intense</option>
                                <option value="19-More Intense">19-More Intense</option>
                                
                                
                            </select>
                     </div>
               </div>
              

                                       
                                          

                                            <button type="submit"  class="btn btn-primary">Submit</button>
                                            
                                        </form>
    </b-tab>
    <b-tab title="Basic">
      <form @submit.prevent="editmode ? updateCampaign() : updateCampaign()">
                                         <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="inputEmail4" class="col-form-label">Campaign ID</label>
                                                    <input v-model="form.campaign_id" type="text" name="campaign_id" placeholder="campaign id"
                                                     class="form-control" readonly >
                                                    
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputPassword4" class="col-form-label">Campaign Name</label>
                                                    <input v-model="form.campaign_name" type="text" name="campaign_name" placeholder="campaign name"
                                                    class="form-control" >
                                                </div>
                                                <div class="form-group col-md-4">
                                                <label for="inputAddress" class="col-form-label">Campaign Description</label>
                                                <input v-model="form.campaign_description" type="text" name="campaign_description" placeholder="Campaign description"
                                                  class="form-control" >
                                            </div>
                                         </div>
                                         <div class="form-row">
                <div class="form-group col-md-4">
                     <label for="inputAddress" class="col-form-label">Active</label>
                      <select name="active" v-model="form.active" id="active" class="form-control">
                                <option value="0">NO</option>
                                <option value="1">YES</option>
                            </select>
                  </div>

                  <div class="form-group col-md-4">
                     <label for="inputAddress" class="col-form-label">Admin User Group</label>
                      <select name="active" v-model="form.active" id="active" class="form-control">
                                <option value="0">NO</option>
                                <option value="1">YES</option>
                            </select>
                  </div>
                  <div class="form-group col-md-4">
                   <label for="inputPassword4" class="col-form-label">Web Form</label>
                      <input v-model="form.web_form_address" type="text" name="web_form_address" placeholder="web form"
                                                    class="form-control" >
                     </div>
                </div>
                <div class="form-row">
               	 <div class="form-group col-md-4">
                   <label for="inputPassword4" class="col-form-label">Web Form Two</label>
                      <input v-model="form.web_form_address_two" type="text" name="web_form_address_two" placeholder="web form two"
                                                    class="form-control" >
                     </div>

                <div class="form-group col-md-4">
                   <label for="inputPassword4" class="col-form-label">Web Form Target</label>
                      <input v-model="form.web_form_target" type="text" name="web_form_target" placeholder="web form target"
                                                    class="form-control" >
                     </div>
                
                
                <div class="form-group col-md-4">
                   <label for="inputPassword4" class="col-form-label">Allow Closers</label>
                      <select name="allow_closers" v-model="form.allow_closers" id="allow_closers" class="form-control">
                                <option value="0">NO</option>
                                <option value="1">YES</option>
                            </select>
                     </div>
                     
                </div>
                <div class="form-row">
                <div class="form-group col-md-4">
                   <label for="inputPassword4" class="col-form-label">Allow Inbound and Blended</label>
                      <select name="campaign_allow_inbound" v-model="form.campaign_allow_inbound" id="campaign_allow_inbound" class="form-control">
                                <option value="0">NO</option>
                                <option value="1">YES</option>
                            </select>
                     </div>
                     <div class="form-group col-md-4">
                   <label for="inputPassword4" class="col-form-label">Allow Chats</label>
                      <select name="allow_chats" v-model="form.allow_chats" id="allow_chats" class="form-control">
                                <option value="0">NO</option>
                                <option value="1">YES</option>
                            </select>
                     </div>
                     <div class="form-group col-md-4">
                   <label for="inputPassword4" class="col-form-label">Add A Dial Status to Call</label>
                      <select name="campaign_allow_inbound" v-model="form.campaign_allow_inbound" id="campaign_allow_inbound" class="form-control">
                                <option value="0">NO</option>
                                <option value="1">YES</option>
                            </select>
                     </div>
                </div>
                <div class="form-row">
                <div class="form-group col-md-4">
                   <label for="inputPassword4" class="col-form-label">List Order</label>
                      <select name="list_order_mix" v-model="form.list_order_mix" id="list_order_mix" class="form-control">
                                <option value="DISABLED-DISABLED">DISABLED-DISABLED</option>
                                <option value="DISABLED">DISABLED</option>
                            </select>
                     </div>
                     <div class="form-group col-md-4">
                   <label for="inputPassword4" class="col-form-label">Lead Filter</label>
                      <select name="lead_filter_id" v-model="form.lead_filter_id" id="lead_filter_id" class="form-control">
                                <option value="NONE">NONE</option>
                                <option value="NONE">NONE</option>
                            </select>
                     </div>
                     <div class="form-group col-md-4">
                   <label for="inputPassword4" class="col-form-label">Drop Lockout Time</label>
                      <input v-model="form.drop_lockout_time" type="text" name="drop_lockout_time" placeholder="drop lockout time"
                                                    class="form-control" >
                     </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                   <label for="inputPassword4" class="col-form-label">Call Count Limit</label>
                      <input v-model="form.call_count_limit" type="text" name="call_count_limit" placeholder="call count limit"
                                                    class="form-control" >
                     </div>
                     <div class="form-group col-md-4">
                   <label for="inputPassword4" class="col-form-label">Call Count Target</label>
                      <input v-model="form.call_count_target" type="text" name="call_count_target" placeholder="call count target"
                                                    class="form-control" >
                     </div>
                     <div class="form-group col-md-4">
                   <label for="inputPassword4" class="col-form-label">Minimum Hopper Level</label>
                      <select name="lead_filter_id" v-model="form.lead_filter_id" id="lead_filter_id" class="form-control">
                                <option value="NONE">NONE</option>
                                <option value="NONE">NONE</option>
                            </select>
                     </div>

                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                   <label for="inputPassword4" class="col-form-label">List Order Randomize</label>
                      <select name="list_order_mix" v-model="form.list_order_mix" id="list_order_mix" class="form-control">
                                <option value="NONE">NONE</option>
                                <option value="NONE">NONE</option>
                            </select>
                     </div>
                     <div class="form-group col-md-4">
                   <label for="inputPassword4" class="col-form-label">List Order Secondary</label>
                      <select name="list_order_mix" v-model="form.list_order_mix" id="list_order_mix" class="form-control">
                                <option value="NONE">NONE</option>
                                <option value="NONE">NONE</option>
                            </select>
                     </div>
                     <div class="form-group col-md-4">
                   <label for="inputPassword4" class="col-form-label">Automatic Hopper Level</label>
                      <select name="auto_hopper_level" v-model="form.auto_hopper_level" id="auto_hopper_level" class="form-control">
                                <option value="Y">YES</option>
                                <option value="N">NO</option>
                            </select>
                     </div>
                </div>
                <div class="form-row">
                 <div class="form-group col-md-4">
                   <label for="inputPassword4" class="col-form-label">Automatic Hopper Multiplier</label>
                      <select name="auto_hopper_multi" v-model="form.auto_hopper_multi" id="auto_hopper_multi" class="form-control">
                                <option value="1">1</option>
                                <option value="1.1">1.1</option>
                            </select>
                     </div>

                    <div class="form-group col-md-4">
                   <label for="inputPassword4" class="col-form-label">Auto Trim Hopper </label>
                      <select name="auto_trim_hopper" v-model="form.auto_trim_hopper" id="auto_trim_hopper" class="form-control">
                                <option value="Y">YES</option>
                                <option value="N">NO</option>
                            </select>
                     </div>
                     <div class="form-group col-md-4">
                   <label for="inputPassword4" class="col-form-label">Hopper VLC Dup Check </label>
                      <select name="hopper_vlc_dup_check" v-model="form.hopper_vlc_dup_check" id="hopper_vlc_dup_check" class="form-control">
                                <option value="Y">YES</option>
                                <option value="N">NO</option>
                            </select>
                     </div>
                </div>
                <button type="submit"  class="btn btn-primary">Submit</button>
                </form>
    </b-tab>
  </b-tabs>
</b-card>
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
import Multiselect from 'vue-multiselect'
import { Form, HasError, AlertError } from "vform";

 export default {
     components: { Multiselect },
     data(){
    return {    search:'',
                campaigns: {},
                editmode: false,
                campaigns : {},
      form: new Form({
        campaign_id:'',
        active:'',
        web_form_address:'',
        campaign_name: '',             
        campaign_description: '',
        allow_closers: '',
        hopper_level:'',
        auto_dial_level:'',
        next_agent_call:'',
        local_call_time:'',
        campaign_script:'',
        voicemail_ext:'',
        get_call_launch:'',
        web_form_address:'',
        web_form_address_two:'',
        web_form_target:'',
        allow_closers:'',
        campaign_allow_inbound:'',
        ///options:['NO','YES'],
        allow_chats:'',
        lead_filter_id:'',
        list_order_mix:'',
        drop_lockout_time:'',
        call_count_limit:'',
        call_count_target:'',
        auto_hopper_level:'',
        auto_hopper_multi:'',
        auto_trim_hopper:'',
        hopper_vlc_dup_check:'',
        manual_dial_hopper_check:'',
        dial_method:'',
        auto_dial_level:'',
        dial_level_threshold:'',
        available_only_ratio_tally:'',
        adaptive_dropped_percentage:'',
        available_only_tally_threshold:'',
        adaptive_maximum_level:'',
        adaptive_intensity:'',
        adaptive_latest_server_time:'',
        user_group:'',
        dial_statuses:'',
        hopper_level:''
        
        }) } },
        mounted() {
        },

        created() {
            this.getCampaigns();
        },
         computed:{
            filteredcampaigns:function(){
                return this.campaigns.data.filter((campaign)=>{
                    return campaign.campaign_name.match(this.search);
                }); 
            }
        },
        methods: {
            getCampaigns(page) {
                if (typeof page === 'undefined') {
                    page = 1;
                }
                axios.get('/api/campaigns?page=' + page)
                    .then(response => this.campaigns = response.data);
            },
             updateCampaign(){
                //this.$Progress.start();
                // console.log('Editing data');
                //alert(id);
                this.form.put('api/campaigns/'+this.form.campaign_id)
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
             editModal(campaign){
                this.editmode = true;
                this.form.reset();
                $('#addNew').modal('show');
                this.form.fill(campaign);
            },
            newModal(){
                this.editmode = false;
                this.form.reset();
                $('#addNew').modal('show');
            },
            deleteCampaign(campaign_id){
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
                                this.form.delete('api/campaigns/'+campaign_id).then(()=>{
                                        swal(
                                        'Deleted!',
                                        'Your file has been deleted.',
                                        'success'
                                        )
                                    Fire.$emit('AfterCreate');
                                });
                         }
                    })
            },
        },
    }   
</script>
<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>
