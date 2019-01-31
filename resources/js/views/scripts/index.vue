<template>
    <!-- Start Content-->
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Script List</h4>
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
                                            <th>SCRIPT ID</th>
                                            <th>SCRIPT NAME</th>
                                            <th>ACTIVE</th>
                                            <th>ADMIN GROUP</th>
                                            <th>COLOR</th>
                                            <th>ACTION</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                         <tr v-for="script in scripts.data">
                                            <td>{{script.script_id}}</td>
                                            <td>{{script.script_name }}</td>
                                            <td>{{ script.active}}</td>
                                            <td>{{script.user_group}}</td>
                                            <td>{{script.script_color}}</td>
                                            
                                            
                                            <td>
                                                <a  data-toggle="dropdown"  aria-haspopup="false"
                                                    aria-expanded="false">
                                                    <div class="test">
                                                            <div class="options">
                                                            <a href="#" @click="editModal(script)">Edit</a><br>
                                                                <a href="#" @click="deleteScripts(script.script_id)">Delete</a>
              
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
        <form @submit.prevent="createScripts()">
        <div class="modal-body">
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4" class="col-form-label">Script ID</label>
                                                    <input type="text" class="form-control" name="script_id" v-model="form.script_id" placeholder="Script ID">
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputPassword4" class="col-form-label">Script Name</label>
                                                    <input type="text" class="form-control" name="script_name" v-model="form.script_name" placeholder="Script name">
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="inputAddress" class="col-form-label">Script Comments</label>
                                                <input type="text" class="form-control" name="script_comments" v-model="form.script_comments" placeholder="Script Comments">
                                            </div>

                                            

                                            <div class="form-row">
                                               
                                                <div class="form-group col-md-4">
                                                    <label for="inputState" class="col-form-label">Admin User group</label>
                                                    <select id="user_group" name="user_group" v-model="form.user_group" class="form-control">
                                                        
                                                        <option value="1">Option 1</option>
                                                        <option value="1">Option 2</option>
                                                        <option value="1">Option 3</option>
                                                    </select>
                                                </div>

                                                 <div class="form-group col-md-4">
                                                    <label for="inputState" class="col-form-label">Active</label>
                                                    <select id="active"  name="active" v-model="form.active" class="form-control">
                                                        
                                                        <option value="Y">YES</option>
                                                        <option value="N">NO</option>
                                                        
                                                    </select>
                                                </div>
                                                
                                                
                                            </div>

                                          <div class="form-group mb-3">
                                                        <label for="example-textarea">Script Text</label>
                                                        <textarea class="form-control" id="script_text" name="script_text" v-model="form.script_text" rows="5"></textarea>
                                                    </div>


                                            <button type="submit" class="btn btn-primary">Submit</button>
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
import Multiselect from 'vue-multiselect'
import { Form, HasError, AlertError } from "vform";
export default {
        

        mounted() {
        },

        data(){
    return{   scripts: {},
      form: new Form({
        script_id:'',
        script_comments:'',
        script_name:'',
        user_group:'',
        script_text:''
      
        
        }) } },

        created() {
            this.getScripts();
        },

        methods: {
            getScripts(page) {
                if (typeof page === 'undefined') {
                    page = 1;
                }
                axios.get('/api/scripts?page=' + page)
                    .then(response => this.scripts = response.data);
            },
             updateScripts(){
                //this.$Progress.start();
                // console.log('Editing data');
              //  alert(campaign_id);
               // this.form.put('/api/campaignstatus/'+this.form.campaign_id)
               this.form.put('/api/scripts/'+this.form.script_id)
               
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
            editModal(scripts){
               // alert(camapign_id);
                this.editmode = true;
                this.form.reset();
                $('#addNew').modal('show');
                this.form.fill(scripts);
            },
            newModal(){
                this.editmode = false;
                this.form.reset();
                $('#addNew').modal('show');
            },
            
            createScripts(){
                //this.$Progress.start();
                this.form.post('/api/scripts')
               
                .then(()=>{
                    Fire.$emit('AfterCreate');
                    //$('#addNew').modal('hide')
                    toast({
                        type: 'success',
                        title: 'Script Created  successfully'
                        })
                    this.$Progress.finish();
                })
                .catch(()=>{
                })
            },
          deleteScripts(script_id) {
    
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
    
                        this.form.delete('/api/scripts/' + script_id).then(() => {
    
                            swal(
    
                                'Deleted!',
    
                                'Your file has been deleted.',
    
                                'success'
    
                            )
    
                            Fire.$emit('AfterCreate');
    
                        }).catch(() => {
    
                            swal("Failed!", "There was something wrong.", "warning");
    
                        });
    
                    }
    
                })
    
            },
       
        },
    }
    
</script>