<template>
    <!-- Start Content-->
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Pause Codes</h4>
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
                                            <th>CAMPAIGN</th>
                                            <th> NAME</th>
                                            <th>PAUSE CODES</th>
                                            <th>ACTION</th>
                                            
                                        </tr>
                                        </thead>
                                        <tbody>
                                           <tr v-for="pausecodes in pausecodes.lead">
                                            <td>{{pausecodes.campaign_id}}</td>
                                            <td>{{pausecodes.pause_code_name}}</td>
                                            <td>{{pausecodes.pause_code}}</td>
                                            
                                            <td>
                                                <a  data-toggle="dropdown"  aria-haspopup="false"
                                                    aria-expanded="false">
                                                    <div class="test">
                                                            <div class="options">
                                                                <a href="#" @click="editModal(pausecodes)">Edit</a><br>
                                                                <a href="#" @click="newModal()">Create</a><br>
                                                                <a href="#" @click="deleteVlist(pausecodes.campaign_id)">Delete</a>
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
        <h5 class="modal-title" id="addNewLabel">Pause Codes</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
<!--start of modal body-->
      
      <form @submit.prevent="editmode ? updatePausecodes() : createPausecodes()">
                                            <div class="modal-body">
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="inputEmail4" class="col-form-label">Pause Code</label>
                                                    <input type="text" name="pause_code" v-model="form.pause_code"  class="form-control">
                                                    
                                                    
                                                </div>
                                              

                                                
                                                 <div class="form-group col-md-4">
                                                    <label for="inputState" class="col-form-label">Pause Code Name</label>
                                                    <input v-model="form.pause_code_name" type="text" name="pause_code_name" placeholder=""
                                                     class="form-control" >
                                                </div>
                                                    
                                                <div class="form-group col-md-4">
                                                    <label for="inputState" class="col-form-label">Billable</label>
                                                    <select v-model="form.billable" type="text" name="billable" id="billable" placeholder=""
                                                     class="form-control" >
                                                     <option value="YES">YES</option>
                                                     <option value="HALF">HALF</option>
                                                     <option value="NO">NO</option>
                                                     </select>
                                                </div>
                                            </div>
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="inputState" class="col-form-label">Mgr Approve</label>
                                                    <select v-model="form.require_mgr_approval" type="text" name="require_mgr_approval" id="require_mgr_approval" placeholder=""
                                                     class="form-control" >
                                                     <option value="YES">YES</option>
                                                     <option value="NO">NO</option>
                                                     </select>
                                                </div>

                                            </div>

                                            <button type="submit" class="btn btn-primary">Submit</button>
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
     

      data(){
    return {
                pausecodes: {},
                editmode: false,
      form: new Form({
        pause_code:'',
        pause_code_name:'',
        billable:'',
        require_mgr_approval:'',
        camapign_id:''
        
        
        
        }) } },

        mounted() {
        },
         created() {
            this.getPausecodes();
        },



     methods: {
            getPausecodes(page) {
                if (typeof page === 'undefined') {
                    page = 1;
                }
                axios.get('/api/pausecodes?page=' + page)
                    .then(response => this.pausecodes = response.data);
            },
            updatePausecodes(){
                //this.$Progress.start();
                // console.log('Editing data');
              //  alert(campaign_id);
               // this.form.put('/api/campaignstatus/'+this.form.campaign_id)
               this.form.put('/api/pausecodes/'+this.form.pause_code)
               
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
            editModal(pausecodes){
               // alert(camapign_id);
                this.editmode = true;
                this.form.reset();
                $('#addNew').modal('show');
                this.form.fill(pausecodes);
            },
            newModal(){
                this.editmode = false;
                this.form.reset();
                $('#addNew').modal('show');
            },
            
            createPausecodes(){
                //this.$Progress.start();
                this.form.post('/api/pausecodes')
               
                .then(()=>{
                    Fire.$emit('AfterCreate');
                    //$('#addNew').modal('hide')
                    toast({
                        type: 'success',
                        title: 'Pausecode Created  successfully'
                        })
                    this.$Progress.finish();
                })
                .catch(()=>{
                })
            },
       
        deletePausecode(pausecodes){
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
                                this.form.delete('/api/pausecodes/'+pause_code).then(()=>{
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
.blinking{
    animation:blinkingText 1.5s infinite;
}
@keyframes blinkingText{
    0%{     color: red;    }
    49%{    color: transparent; }
    50%{    color: transparent; }
    99%{    color:transparent;  }
    100%{   color: #000;    }
}
</style>