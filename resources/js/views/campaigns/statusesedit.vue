<template>
 <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        
                                    </div>
                                    <h4 class="page-title">Status Form</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
              
                <form @submit.prevent="createStatus()">
                                  <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="inputEmail4" class="col-form-label">Status</label>
                                                    <input v-model="form.status" type="text" name="campaign_id" placeholder="status"
                                                     class="form-control" >
                                                    
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputPassword4" class="col-form-label">Description</label>
                                                    <input v-model="form.status_name" type="text" name="campaign_name" placeholder="description"
                                                    class="form-control" >
                                                </div>
                                            

                                           
                                            

                                            
                                                <div class="form-group col-md-4">
                                                    <label for="inputCity" class="col-form-label">Selectable</label>
                                                     <select name="selected" v-model="form.selectable" id="selectable" class="form-control">
                                                        <option value="Y">Yes</option>
                                                        <option value="N">No</option>
                                                        
                                                </select>
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputCity" class="col-form-label">Human Answer</label>
                                                     <select name="human_answered" v-model="form.human_answered" id="human_answered" class="form-control">
                                                        <option value="Y">Yes</option>
                                                        <option value="N">No</option>
                                                        
                                                </select>
                                                </div>
                                                


                                                 <div class="form-group col-md-4">
                                                    <label for="inputState" class="col-form-label"> Sale</label>
                                                    <select name="sale" v-model="form.sale" id="sale" class="form-control">
                                                
                                                            <option value="Y">Yes</option>
                                                        <option value="N">No</option>
                                                        
                                                </select>
                                                    </div>

                                                
                                                 <div class="form-group col-md-4">
                                                    <label for="inputState" class="col-form-label">DNC</label>
                                                    <select id="dnc" v-model="form.dnc" name="dnc" class="form-control">
                                                    
                                                            <option value="Y">Yes</option>
                                                        <option value="N">No</option>
                                                    </select>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="inputState" class="col-form-label">Customer Contact</label>
                                                    <select id="customer_contact" v-model="form.customer_contact" name="customer_contact" class="form-control">
                                                    
                                                            <option value="Y">Yes</option>
                                                        <option value="N">No</option>
                                                    </select>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="inputState" class="col-form-label">Not Interested</label>
                                                    <select name="not_interested" v-model="form.not_interested" id="not_interested" class="form-control">
                                                
                                                            <option value="Y">Yes</option>
                                                        <option value="N">No</option>
                                                        
                                                </select>
                                                    </div>

                                                
                                                 <div class="form-group col-md-4">
                                                    <label for="inputState" class="col-form-label">unworkable</label>
                                                    <select id="unworkable" v-model="form.unworkable" name="unworkable" class="form-control">
                                                    
                                                            <option value="Y">Yes</option>
                                                        <option value="N">No</option>
                                                    </select>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="inputState" class="col-form-label">Callback</label>
                                                    <select id="scheduled_callback" v-model="form.scheduled_callback" name="scheduled_callback" class="form-control">
                                                    
                                                            <option value="Y">Yes</option>
                                                        <option value="N">No</option>
                                                    </select>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="inputState" class="col-form-label">Completed</label>
                                                    <select id="completed" v-model="form.completed" name="completed" class="form-control">
                                                    
                                                            <option value="Y">Yes</option>
                                                        <option value="N">No</option>
                                                    </select>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="inputState" class="col-form-label">Answering Machine</label>
                                                    <select id="answering_machine" v-model="form.answering_machine" name="answering_machine" class="form-control">
                                                    
                                                            <option value="Y">Yes</option>
                                                        <option value="N">No</option>
                                                    </select>
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="inputState" class="col-form-label">Category</label>
                                                    <select id="category" v-model="form.category" name="category" class="form-control">
                                                    
                                                            <option value="Y">Yes</option>
                                                        <option value="N">No</option>
                                                    </select>
                                                </div>

                                                
                                            </div>

                                          

                                            <button type="submit" class="btn btn-primary">Create</button>

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
                campaign: {},
                editmode: false,
                campaign : {},
      form: new Form({
        campaign_id:'',
        status:'',
        status_name:'',
        selectable:'',
        human_answered:'',
        sale:'',
        dnc:'',
        customer_contact:'',
        not_interested:'',
        unworkable:'',
        scheduled_callback:'',
        completed:'',
        answering_machine:'',
        category:''
        
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
            createStatus(){
                //this.$Progress.start();
                this.form.post('/api/campaignstatus')
               // this.form.post('/api/users')
                .then(()=>{
                    Fire.$emit('AfterCreate');
                    //$('#addNew').modal('hide')
                    toast({
                        type: 'success',
                        title: 'Campaign Status Created in successfully'
                        })
                    this.$Progress.finish();
                })
                .catch(()=>{
                })
            },
            
            
        },
        
        
        
    }
       
</script>