<template>
 <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        
                                    </div>
                                    <h4 class="page-title">ListForm</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">ListForm</h4>
                                        

                                        <form @submit.prevent="createList()">
                                            <div class="form-row">
                                            
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4" class="col-form-label">List Id</label>
                                                   <input v-model="form.list_id" type="text" name="list_id" placeholder="list id"
                                                    class="form-control" >
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputPassword4" class="col-form-label">List Name</label>
                                                    <input v-model="form.list_name" type="text" name="list_name" placeholder="list name"
                                                    class="form-control" >
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="inputAddress" class="col-form-label">List Description</label>
                                                <input v-model="form.list_description" type="text" name="list_description" placeholder="list description"
                                                    class="form-control" >
                                            </div>

                                            

                                            <div class="form-row">
                                               
                                                <div class="form-group col-md-4">
                                                    <label for="inputState" class="col-form-label">Campaign</label>
                                                  <select name="campaign_id" v-model="form.campaign_id" id="campaign_id" class="form-control">
                                                        <option>Choose</option>
                                                        <option value="1"> 1</option>
                                                        <option value="2"> 2</option>
                                                        <option value="3"> 3</option>
                                                        <option value="4"> 4</option>
                                                        <option value="5"> 5</option>
                                                        <option value="6">6</option>
                                                    </select>
                                                </div>

                                                 <div class="form-group col-md-4">
                                                    <label for="inputState" class="col-form-label">Active</label>
                                                    <select name="active" v-model="form.active" id="active" class="form-control">
                                                        <option >Choose</option>
                                                        <option value="Y">YES</option>
                                                        <option value="N">NO</option>
                                                     
                                                    </select>
                                                </div>
                                                
                                            </div>

                                          

                                            <button type="submit" class="btn btn-primary">Submit</button>

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

        mounted() {
        },
        methods: {
         createList(){
                //this.$Progress.start();
                this.form.post('/api/lists')
                .then(()=>{
                    Fire.$emit('AfterCreate');
                    //$('#addNew').modal('hide')
                    toast({
                        type: 'success',
                        title: 'List Created in successfully'
                        })
                    this.$Progress.finish();
                })
                .catch(()=>{
                })
            }
        },
    }
</script>