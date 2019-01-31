<template>
    <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                         <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        <button type="button" class="btn btn-success" @click="newModal">Create</button>

                                    </div>
                                    <h4 class="page-title">Recycles</h4>
                                </div>
                            </div>
                        </div> 
                        <!-- end page title --> 
                        <!-- Modal -->
<div class="modal fade" id="addNew" tabindex="-1" role="dialog" 
aria-labelledby="addNewLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addNewLabel">New Lead Recycle</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
<!--start of modal body-->
      
      <div class="modal-body">
      <form @submit.prevent="editmode ? updateLeadrecycle() : createLeadrecycle()">
                                            
                                                <div class="form-group ">
                                                    <label for="inputEmail4" class="col-form-label">Status</label>
                                                    <select name="status" v-model="form.status" id="status" class="form-control">
                                                        <option value="0">NO</option>
                                                        <option value="1">YES</option>
                                                    </select>
                                                    
                                                </div>
                                              

                                                
                                                 <div class="form-group">
                                                    <label for="inputState" class="col-form-label">Attempt Delay</label>
                                                    <input v-model="form.attempt_delay" type="text" name="attempt_delay" placeholder=""
                                                     class="form-control" >
                                                </div>
                                                    
                                                <div class="form-group">
                                                    <label for="inputState" class="col-form-label">Attempt Maximum</label>
                                                    <input v-model="form.attempt_maximum" type="text" name="attempt_maximum" placeholder=""
                                                     class="form-control" >
                                                </div>

                                            

                                            <button type="submit" class="btn btn-primary">Create</button>

                                        </form> 
     </div>
    </div>
    
  </div>
  </div>
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                       
                                        

                                        <form @submit.prevent="createRecycle()">
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="inputEmail4" class="col-form-label">Status</label>
                                                    <select name="status" v-model="form.status" id="status" class="form-control">
                                                        <option value="0">NO</option>
                                                        <option value="1">YES</option>
                                                    </select>
                                                    
                                                </div>
                                               
                                                 <div class="form-group col-md-4">
                                                    <label for="inputState" class="col-form-label">Attempt Delay</label>
                                                    <input v-model="form.attempt_delay" type="text" name="attempt_delay" placeholder=""
                                                     class="form-control" >
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="inputState" class="col-form-label">Attempt Maximum</label>
                                                    <input v-model="form.attempt_maximum" type="text" name="attempt_maximum" placeholder=""
                                                     class="form-control" >
                                                </div>
                                                  <div class="form-group col-md-4">
                                                    <label for="inputState" class="col-form-label">Leads At Maximum</label>
                                                    <input v-model="form.campaign_id" type="text" name="campaign_id" placeholder=""
                                                     class="form-control" >
                                                </div>

                                                  <div class="form-group col-md-4">
                                                    <label for="inputState" class="col-form-label">Active</label>
                                                    <input v-model="form.active" type="text" name="active" placeholder=""
                                                     class="form-control" >
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
                leadrecycle: [],
                editmode: false,
             //keywords:'',
      form: new Form({
        
                   lead_filter_id:'',
                   status:'',
                   attempt_delay:'',
                   attempt_maximum:'',
                   active:'',


                    
        
        }) } },
 mounted() {
        },

        created() {
            this.getLeadrecycle();
        },
        
        methods: {
        //     fetch() {
        //     axios.get('/api/search', { params: { keywords: this.keywords } })
        //         .then(response => this.users = response.data)
        //         .catch(error => {});
        // },
             newModal(){
                this.editMode=false;
                this.form.reset();
                $("#addNew").modal("show");
                },
             getLeadrecycle(page) {
                if (typeof page === 'undefined') {
                    page = 1;
                }
                axios.get('/api/leadrecycle?page=' + page)
                    .then(response => this.leadrecycle = response.data);
            },
           
            createLeadrecycle() {
      //this.$Progress.start();
      this.form
        .post("/api/leadrecycle/{campaign_id}")
        .then(() => {
          $("#addNew").modal("hide");
          this.$Progress.finish();

          Fire.$emit('AfterCreate');
          toast({
            type: "success",
            title: "Lead Recycle Created"
          });
          this.$Progress.finish();
        })
        .catch(() => {});
    },
           
        },
      
        
        
    }
    

</script>