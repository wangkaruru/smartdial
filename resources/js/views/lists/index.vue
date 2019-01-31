<template>
    <!-- Start Content-->
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">List</h4>
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
                                            <th>LIST ID</th>
                                            <th>LIST NAME</th>
                                            <th>LIST DESCRIPTION</th>
                                            <th>RESET TIME</th>
                                            <th>LEAD COUNTS</th>
                                            <th>CALL TIME</th>
                                            <th>LAST CALL DATE</th>
                                            <th>CAMPAIGN</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr v-for="list in lists.data">
                                            <td>{{list.list_id}}</td>
                                            <td>{{list.list_name }}</td>
                                            <td>{{ list.list_description}}</td>
                                            <td>{{list.reset_time}}</td>
                                            <td>{{list.local_call_time}}</td>
                                            <td>{{list.list_lastcalldate}}</td>
                                            <td>{{list.campaign_id}}</td>
                                            <td>{{list.active}}</td>
                                            <td>
                                                <a  data-toggle="dropdown"  aria-haspopup="false"
                                                    aria-expanded="false">
                                                    <div class="test">
                                                            <div class="options">
                                                                <a href="#"   @click="editModal(list)" >Edit</a><br>
                                                                <a href="#"   @click="deleteList(list.list_id)" >Delete</a>
              
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
                    
                    <h5 class="modal-title"  id="addNewLabel">Update List's Info</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form @submit.prevent="editmode ? updateList() : createList()">
                <div class="modal-body">
                                         <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="inputEmail4" class="col-form-label">List ID</label>
                                                    <input v-model="form.list_id" type="text" name="list_id" placeholder="list id"
                                                     class="form-control" >
                                                    
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputPassword4" class="col-form-label">List Name</label>
                                                    <input v-model="form.list_name" type="text" name="list_name" placeholder="list name"
                                                    class="form-control" >
                                                </div>
                                                <div class="form-group col-md-4">
                                                <label for="inputAddress" class="col-form-label">List Description</label>
                                                <input v-model="form.list_description" type="text" name="list_description" placeholder="List description"
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
                     <label for="inputAddress" class="col-form-label">Reset Lead-Called-Status for this list</label>
                      <select name="status_group_id" v-model="form.status_group_id" id="status_group_id" class="form-control">
                                <option value="0">NO</option>
                                <option value="1">YES</option>
                            </select>
                  </div>
                  <div class="form-group col-md-4">
                   <label for="inputPassword4" class="col-form-label">Reset Times</label>
                      <input v-model="form.reset_time" type="text" name="reset_time" placeholder="reset time"
                                                    class="form-control" >
                     </div>
                </div>
                <div class="form-row">
               	 <div class="form-group col-md-4">
                   <label for="inputPassword4" class="col-form-label">Expiration_date</label>
                      <input v-model="form.expiration_date" type="text" name="expiration_date" placeholder="Expiration Date"
                                                    class="form-control" >
                     </div>

                <div class="form-group col-md-4">
                   <label for="inputPassword4" class="col-form-label">Local Call Time</label>
                      <select name="local_call_time" v-model="form.local_call_time" id="local_call_time" class="form-control">
                                <option value="0">NO</option>
                                <option value="1">YES</option>
                            </select>
                     </div>
                
                
                <div class="form-group col-md-4">
                   <label for="inputPassword4" class="col-form-label">Audit Comments</label>
                      <select name="allow_closers" v-model="form.allow_closers" id="allow_closers" class="form-control">
                                <option value="0">NO</option>
                                <option value="1">YES</option>
                            </select>
                     </div>
                     
                </div>
                <div class="form-row">
                <div class="form-group col-md-4">
                   <label for="inputPassword4" class="col-form-label">List Change Dates</label>
                      <select name="list_changedate" v-model="form.list_changedate" id="list_changedate" class="form-control">
                                <option value="0">NO</option>
                                <option value="1">YES</option>
                            </select>
                     </div>
                     <div class="form-group col-md-4">
                   <label for="inputPassword4" class="col-form-label">List Last Call Date</label>
                      <input v-model="form.list_lastcalldate" type="text" name="list_lastcalldate" placeholder="Last Call Date"
                                                    class="form-control" >
                     </div>
                     <div class="form-group col-md-4">
                   <label for="inputPassword4" class="col-form-label">Agent Script Override</label>
                      <select name="agent_script_override" v-model="form.agent_script_override" id="agent_script_override" class="form-control">
                                <option value="0">NO</option>
                                <option value="1">YES</option>
                            </select>
                     </div>
                </div>
                <div class="form-row">
                <div class="form-group col-md-4">
                   <label for="inputPassword4" class="col-form-label">Inbound Script Override</label>
                      <select name="inbound_list_script_override" v-model="form.inbound_list_script_override" id="inbound_list_script_override" class="form-control">
                                <option value="DISABLED-DISABLED">DISABLED-DISABLED</option>
                                <option value="DISABLED">DISABLED</option>
                            </select>
                     </div>
                     <div class="form-group col-md-4">
                   <label for="inputPassword4" class="col-form-label">Camapign CID Override</label>
                      <select name="campaign_cid_override" v-model="form.campaign_cid_override" id="campaign_cid_override" class="form-control">
                                <option value="NONE">NONE</option>
                                <option value="NONE">NONE</option>
                            </select>
                     </div>
                     <div class="form-group col-md-4">
                   <label for="inputPassword4" class="col-form-label">Answering Machine Message Override</label>
                      <input v-model="form.am_message_exten_override" type="text" name="am_message_exten_override" placeholder="Answering Machine Message Override"
                                                    class="form-control" >
                     </div>
                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                   <label for="inputPassword4" class="col-form-label">Drop Inbound Group Override</label>
                        <select name="drop_inbound_group_override" v-model="form.drop_inbound_group_override" id="drop_inbound_group_override" class="form-control">
                                <option value="NONE">NONE</option>
                                <option value="NONE">NONE</option>
                            </select>
                     </div>
                     <div class="form-group col-md-4">
                   <label for="inputPassword4" class="col-form-label">Status Group Override</label>
                       <select name="status_group_id" v-model="form.status_group_id" id="status_group_id" class="form-control">
                                <option value="NONE">NONE</option>
                                <option value="NONE">NONE</option>
                            </select>
                     </div>
                     <div class="form-group col-md-4">
                   <label for="inputPassword4" class="col-form-label">Web Form</label>
                      <input v-model="form.web_form_address" type="text" name="web_form_address" placeholder="web form addresss"
                                                    class="form-control" >
                     </div>

                </div>
                <div class="form-row">
                    <div class="form-group col-md-4">
                   <label for="inputPassword4" class="col-form-label">Web Form Two</label>
                      <input v-model="form.web_form_address_two" type="text" name="web_form_address_two" placeholder="web form address two"
                                                    class="form-control" >
                     
                     </div>
                     <div class="form-group col-md-4">
                   <label for="inputPassword4" class="col-form-label">No Agent Call URL</label>
                      <input v-model="form.na_call_url" type="text" name="na_call_url" placeholder="na call url"
                                                    class="form-control" >
                     </div>
                     <div class="form-group col-md-4">
                   <label for="inputPassword4" class="col-form-label">Transfer-Conf Number 1 Override</label>
                   <input v-model="form.xferconf_a_number" type="text" name="xferconf_a_number" placeholder="xferconf_a_number"
                                                    class="form-control" >
                     </div>
                </div>
                <div class="form-row">
                 <div class="form-group col-md-4">
                   <label for="inputPassword4" class="col-form-label">Transfer-Conf Number 2 Override</label>
                   <input v-model="form.xferconf_b_number" type="text" name="xferconf_b_number" placeholder="xferconf_b_number"
                                                    class="form-control" >
                     
                     </div>

                    <div class="form-group col-md-4">
                   <label for="inputPassword4" class="col-form-label">Transfer-Conf Number 3 Override</label>
                   <input v-model="form.xferconf_c_number" type="text" name="xferconf_c_number" placeholder="xferconf_c_number"
                                                    class="form-control" >
                     
                     </div>
                     <div class="form-group col-md-4">
                   <label for="inputPassword4" class="col-form-label">Transfer-Conf Number 4 Override </label>
                       <input v-model="form.xferconf_d_number" type="text" name="xferconf_d_number" placeholder="xferconf_d_number"
                                                    class="form-control" >
                     </div>
                </div>

                <div class="form-row">
                 <div class="form-group col-md-4">
                   <label for="inputPassword4" class="col-form-label">ransfer-Conf Number 5 Override </label>
                      <input v-model="form.xferconf_e_number" type="text" name="xferconf_e_number" placeholder="xferconf_e_number"
                                                    class="form-control" >
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
                   <label for="inputPassword4" class="col-form-label">Default Transfer Group</label>
                      <select name="default_xfer_group" v-model="form.default_xfer_group" id="default_xfer_group" class="form-control">
                                <option value="1">1</option>
                                <option value="1.1">1.1</option>
                            </select>
                     </div>

                <div class="form-group col-md-4">
                   <label for="inputPassword4" class="col-form-label">Inventory Report</label>
                      <select name="inventory_report" v-model="form.inventory_report" id="inventory_report" class="form-control">
                                
                                <option value="Y">YES</option>
                                <option value="N">NO</option>
                                
                            </select>
                     </div>
                <div class="form-group col-md-4">
                   <label for="inputPassword4" class="col-form-label">Time Zone Setting</label>
                      <select name="time_zone_setting" v-model="form.time_zone_setting" id="time_zone_setting" class="form-control">
                                <option value="Y">Y</option>
                                <option value="N">N</option>
                            </select>
                     </div>
                </div>
                  <button type="submit"  class="btn btn-primary">Update</button>
                                            
                                
                                 </div>
                 </form>
                 </div>
                 </div>
                 </div>

    </div>
</template>

<script>
import { Form, HasError, AlertError } from "vform";

    export default {
        mounted() {
        },
        data(){
   return {
                 lists: {},
                editmode: false,
                
      form: new Form({
       list_id:'',
       list_name:'',
       list_description:'',
       status_group_id:'',
       reset_time:'',
       list_lastcalldate:'',
       campaign_id:'',
       active:'',
       local_call_time:'',
       expiration_date:'',
       reset_time:'',
       list_changedate:'',
       list_lastcalldate:'',
       campaign_cid_override:'',
       inbound_list_script_override:'',
       agent_script_override:'',
       am_message_exten_override:'',
       drop_inbound_group_override:'',
       status_group_id:'',
       web_form_address:'',
       web_form_address_two:'',
       xferconf_a_number:'',
       xferconf_b_number:'',
       xferconf_c_number:'',
       xferconf_d_number:'',
       xferconf_e_number:'',
       inventory_report:'',
       time_zone_setting:''
       }) } },
        

        created() {
            this.getLists();
        },

        methods: {
            getLists(page) {
                if (typeof page === 'undefined') {
                    page = 1;
                }
                axios.get('/api/lists?page=' + page)
                    .then(response => this.lists = response.data);
            },
            updateList(){
                //this.$Progress.start();
                // console.log('Editing data');
                //alert(id);
                this.form.put('api/lists/'+this.form.list_id)
                .then(() => {
                    // success
                    //console.log('$data');
                   // $('#addNew').modal('hide');
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
            editModal(list){
                this.editmode = true;
                this.form.reset();
                $('#addNew').modal('show');
                this.form.fill(list);
            },
            newModal(){
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