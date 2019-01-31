<template>
    <!-- Start Content-->
    <div class="container-fluid">
        <!-- start page title -->
        
        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    
                                    <h4 class="page-title">Recycles</h4>
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
                                            <th> NAME</th>
                                            <th>RECYCLES</th>
                                            <th></th>
                                            
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr v-for="leadrecycle in leadrecycle.lead">
                                            <td>{{ leadrecycle.recycle_id }}</td>
                                            <td>{{ leadrecycle.campaign_id }}</td>
                                            <td>{{ leadrecycle.status }}</td>
                                            
                                            
                                            <td>

                                                <a  data-toggle="dropdown"  aria-haspopup="false"
                                                    aria-expanded="false">
                                                    <div class="test">
                                                            <div class="options" >
                                                            <router-link href="#" v-bind:to="{name: 'campaigns.recycles-update', params: {recycle_id: leadrecycle.recycle_id}}"></router-link>
                                                              <a href="#" @click="editModal(leadrecycle)">Edit</a><br> 
                                                              <a href="#"  @click="createLeadrecycle()">Create</a><br>
                                                              <a href="#" @click="deleteLeadrecycle(leadrecycle.status)">Delete</a>
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
    <div class="modal fade" id="addNew" tabindex="-1" role="dialog" 
aria-labelledby="addNewLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addNewLabel">Update Lead Recycle</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
<!--start of modal body-->
      
      <div class="modal-body">
      <form @submit.prevent="editmode ? updateLeadrecycle() : createLeadrecycle()">
                                            
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="inputEmail4" class="col-form-label">Status</label>
                                                    <input name="status" v-model="form.status"  class="form-control">
                                                        
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
                                                    <label for="inputState" class="col-form-label">Active</label>
                                                    <select id="active" v-model="form.active" type="text" name="active" placeholder=""
                                                     class="form-control" >
                                                    <option value="Y">Yes</option>
                                                    <option value="N">No</option>
                                                     </select>
                                                </div>
                                            </div>

                                            <button type="submit" class="btn btn-primary">Update</button>

                                        </form>
     </div>
    </div>
    
  </div>
  </div>
<div class="modal fade" id="addNew" tabindex="-1" role="dialog" 
aria-labelledby="addNewLabel" aria-hidden="true">
  <div class="modal-dinpm run watchalog" role="document">
    <div class="modal-content">
      <div class="modal-header">
      <h5 v-show="!editmode" class="modal-title" id="addNewLabel">Add New Lead Recycle</h5>
       <h5 v-show="editmode" class="modal-title" id="addNewLabel">Edit Lead Recycle Info</h5>
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

                                            

                                            <button  type="submit" v-show="!editmode"  class="btn btn-primary">Create</button>
                                                <button type="submit"  v-show="editmode" class="btn btn-primary">Update</button>
                                              <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>

                                        </form> 
     </div>
    </div>
    
  </div>
  </div>
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
        
                   recycle_id:'',
                   campaign_id:'',
                   status:'',
                   attempt_delay:'',
                   attempt_maximum:'',
                   active:''

                    
        
        }) } },
 mounted() {
        },

        created() {
            this.getLeadrecycle();
        },
        
        methods: {
        
             getLeadrecycle(page) {
                if (typeof page === 'undefined') {
                    page = 1;
                }
                axios.get('/api/leadrecycle?page=' + page)
                    .then(response => this.leadrecycle = response.data);
            },
             updateLeadrecycle(){
                //this.$Progress.start();
                // console.log('Editing data');
                //alert(id);
                this.form.put('/api/leadrecycle/'+this.form.campaign_id)
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
            editModal(leadrecycle){
                this.editmode = true;
                this.form.reset();
                $('#addNew').modal('show');
                this.form.fill(leadrecycle);
            },
            newModal(){
               
            },
            createLeadrecycle() {
                 
                this.form.reset();
                $('#addNew').modal('show');
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
    deleteLeadrecycle(status){
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
                            // alert(id);
                                this.form.delete('/api/leadrecycle/'+status).then(()=>{
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