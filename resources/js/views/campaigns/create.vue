<template>
 <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        
                                    </div>
                                    <h4 class="page-title">Campaign Form</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                       
                                        

                                        <form @submit.prevent="createCampaign()">
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4" class="col-form-label">Campaign ID</label>
                                                    <input v-model="form.campaign_id" type="text" name="campaign_id" placeholder="campaign id"
                                                     class="form-control" >
                                                    
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputPassword4" class="col-form-label">Campaign Name</label>
                                                    <input v-model="form.campaign_name" type="text" name="campaign_name" placeholder="campaign name"
                                                    class="form-control" >
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="inputAddress" class="col-form-label">Campaign Description</label>
                                                <input v-model="form.campaign_description" type="text" name="campaign_description" placeholder="Campaign description"
                                                  class="form-control" >
                                            </div>

                                            

                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputCity" class="col-form-label">Active</label>
                                                     <select name="active" v-model="form.active" id="active" class="form-control">
                                                        <option value="Y">Yes</option>
                                                        <option value="N">No</option>
                                                        
                                                </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputCity" class="col-form-label">Web Form</label>
                                                    <input type="web_form_address" v-model="form.web_form_address" name="web_form_address" class="form-control" placeholder="web form address">
                                                </div>


                                                 <div class="form-group col-md-4">
                                                    <label for="inputState" class="col-form-label"> Allow Closer</label>
                                                    <select name="allow_closers" v-model="form.allow_closers" id="allow_closers" class="form-control">
                                                
                                                            <option value="Y">Yes</option>
                                                        <option value="N">No</option>
                                                        
                                                </select>
                                                    </div>

                                                
                                                 <div class="form-group col-md-4">
                                                    <label for="inputState" class="col-form-label">Minimum Hopper Level</label>
                                                    <select id="hopper_level" v-model="form.hopper_level" name="hopper_level" class="form-control">
                                                    
                                                        <option value="1">1</option>
                                                        <option value="2">5</option>
                                                        <option value="3"> 10</option>
                                                        <option value="1">20</option>
                                                        <option value="2">50</option>
                                                        <option value="3"> 100</option>
                                                        <option value="1">200</option>
                                                        <option value="2">500</option>
                                                        <option value="3"> 1000</option>
                                                        <option value="3"> 2000</option>
                                                    </select>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="inputState" class="col-form-label">Auto Dial Level</label>
                                                    <select id="auto_dial_level" v-model="form.auto_dial_level" name="auto_dial_level" class="form-control">
                                                    
                                                        <option value="1">1</option>
                                                        <option value="0">0</option>
                                                        <option value="1.1"> 1.1</option>
                                                        <option value="1.2">1.2</option>
                                                        <option value="1.3">1.3</option>
                                                        <option value="1.4">1.4</option>
                                                        <option value="1.5">1.5</option>
                                                        <option value="1.6">1.6</option>
                                                        <option value="1.7">1.7</option>
                                                        <option value="1.8">1.8</option>
                                                        <option value="1.9">1.9</option>
                                                        <option value="2">2</option>
                                                        <option value="2.1"> 2.1</option>
                                                        <option value="2.2">2.2</option>
                                                        <option value="2.3">2.3</option>
                                                        <option value="2.4"> 2.4</option>
                                                        <option value="2.5">2.5</option>
                                                        <option value="2.6">2.6</option>
                                                        <option value="2.7">2.7</option>
                                                        <option value="2.8">2.8</option>
                                                        <option value="2.9">2.9</option>
                                                        <option value="3">3</option>
                                                        <option value="3.25">3.25</option>
                                                        <option value="3.5">3.5</option>
                                                        <option value="3.75">3.75</option>
                                                        <option value="4">4</option>
                                                        
                                                    </select>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="inputState" class="col-form-label">Next Agent Call</label>
                                                    <select id="next_agent_call" v-model="form.next_agent_call" name="next_agent_call" class="form-control">
                                                    
                                                        <option value="random">random</option>
                                                        <option value="oldest_call_start">oldest_call_start</option>
                                                        <option value="oldest_call_finish">oldest_call_finish</option>
                                                        <option value="campaign_rank">campaign_rank</option>
                                                        <option value="overall_user_level">overall_user_level</option>
                                                        <option value="fewest_calls">fewest_calls</option>
                                                        <option value="longest_wait_time">longest_wait_time</option>
                                                        <option value="campaign_grade_random">campaign_grade_random</option>
                                                        
                                                    </select>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="inputState" class="col-form-label">Local Call Time</label>
                                                    <select id="local_call_time" v-model="form.local_call_time" name="local_call_time" class="form-control">
                                                        <option value="1am">1am</option>
                                                        <option value="2am">2am</option>
                                                        
                                                    </select>
                                                </div>

                                                <div class="form-group col-md-6">
                                                    <label for="inputCity" class="col-form-label">Voicemail</label>
                                                    <input type="voicemail_ext" v-model="form.voicemail_ext" name="voicemail_ext" class="form-control" placeholder="voicemail">
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="inputState" class="col-form-label">Script</label>
                                                    <select id="campaign_script" v-model="form.campaign_script" name="campaign_script" class="form-control">
                                                    
                                                        <option value="NONE">NONE</option>
                                                        <option value="SMARTCOLLECTIN">SMARTCOLLECTIN-Smart Collect Inbound</option>
                                                        <option value="CALLNOTES">CALLNOTES-Call Notes and Appointment Setting</option>
                                                        <option value="SMARTCOLLECT">SMARTCOLLECT-Smart Collect</option>
                                                        <option value="TROPEMCRM">TROPEMCRM-Tropem CRM</option>
                                                       
                                                        
                                                    </select>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="inputState" class="col-form-label">Get Call Launch</label>
                                                    <select id="get_call_launch" v-model="form.get_call_launch" name="get_call_launch" class="form-control">
                                                        <option value="NONE">NONE</option>
                                                        <option value="CHAT">CHAT</option>
                                                        <option value="WEBFORM">WEBFORM</option>
                                                        <option value="WEBFORMTWO">WEBFORMTWO</option>
                                                        <option value="SCRIPT">SCRIPT</option>
                                                        <option value="FORM">FORM</option>
                                                        
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
        get_call_launch:''
        
        }) } },
         created() {
            this.getCampaigns();
        },
        methods: {
            getCampaigns(page) {
                if (typeof page === 'undefined') {
                    page = 1;
                }
                axios.get('/api/campaigns?page=' + page)
                    .then(response => this.campaigns = response.data);
                     //$('#loader').success('hide')
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
                        //alert(user_id);
                        // Send request to the server
                         
                              this.form.delete('api/campaigns/'+campaign_id).then(()=>{
                                   //alert(id);
                                        swal(
                                        'Deleted!',
                                        'Your file has been deleted.',
                                        'success'
                                        )
                                    Fire.$emit('AfterCreate');
                                });
                        
                    })
            },
            createCampaign(){
                //this.$Progress.start();
                this.form.post('/api/campaigns')
                .then(()=>{
                    Fire.$emit('AfterCreate');
                    //$('#addNew').modal('hide')
                    toast({
                        type: 'success',
                        title: 'Campaign Created in successfully'
                        })
                    this.$Progress.finish();
                })
                .catch(()=>{
                })
            },
            
            say: function (message) {
            alert(message)
                }
        },
        
        
        
    }
       
</script>