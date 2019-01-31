<template>
    <!-- Start Content-->
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">User Groups List</h4>
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
                                            <th>USER GROUP</th>
                                            <th>GROUP NAME</th>
                                            <th>FORCE TIMECLOCK</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr v-for="usergroups in usergroups.data">
                                            <td>{{usergroups.user_group}}</td>
                                            <td>{{usergroups.group_name}}</td>
                                            <td>{{usergroups.forced_timeclock_login}}</td>
                                            
                                            <td>
                                                <a  data-toggle="dropdown"  aria-haspopup="false"
                                                    aria-expanded="false">
                                                    <div class="test">
                                                            <div class="options">
                                                                <a href="#"   @click="editModal(usergroups)" >Edit</a><br>
                                                                <a href="#"   @click="deleteList(usergroups.user_group)" >Delete</a>
              
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
                            
                        </div>

                    </div> <!-- end card-body -->
                </div> <!-- end card -->
            </div><!-- end col -->
        </div>


        <div class="modal fade" id="addNew" tabindex="-1" role="dialog" aria-labelledby="addNewLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    
                    <h5 class="modal-title"  id="addNewLabel">Update List Mix's Info</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form @submit.prevent="editMode ? updateUsergroups():createUsergroups()">
                                 <div class="modal-body">
                                  
                                             <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="inputState" class="col-form-label">Mix ID</label>
                                                    <input type="text" v-model="form.vcl_id" name="vlc_id" class="form-control">
                                                    
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="inputState" class="col-form-label">Mix Name</label>
                                                    <input type="text" v-model="form.vcl_name" name="vcl_name" class="form-control">
                                                   
                                                </div>

                                                <div class="form-group col-md-4">
                                                    <label for="inputState" class="col-form-label">Mix Method</label>
                                                    <select id="mix_method" v-model="form.mix_method" name="mix_method" class="form-control">
                                                             <option value="EVEN_MIX">EVEN_MIX</option>
                                                             <option value="IN_ORDER">IN_ORDER</option>
                                                             <option value="RANDOM">RANDOM</option>
                                                    </select>
                                                  </div>
                                                 </div>
                                                
                                            <div class="modal-footer">
                                                <button  type="submit" v-show="!editMode"  class="btn btn-primary">Submit</button>
                                                <button type="submit"  v-show="editMode" class="btn btn-primary">Submit</button>
                                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                                            </div>
                                        </div>
                                        </form>
                                        </div>
                                        </div>
                                        </div>


    </div>
</template>

<script>
   
</script>
<script>
 import { Form, HasError, AlertError } from "vform";
 export default {
        
        data(){
    return{   usergroups: {},
      form: new Form({
      
        user_group: '',
        forced_timeclock_login:'',
        group_name:''
        
        }) } },


        mounted() {
        },

        created() {
            this.getUsergroups();
        },

        methods: {
            getUsergroups(page) {
                if (typeof page === 'undefined') {
                    page = 1;
                }
                axios.get('api/usergroups?page=' + page)
                    .then(response => this.usergroups = response.data);
            },
            updateUsergroups(){
                //this.$Progress.start();
                // console.log('Editing data');
              //  alert(campaign_id);
               // this.form.put('/api/campaignstatus/'+this.form.campaign_id)
               this.form.put('/api/usergroups/'+this.form.user_group)
               
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
            editModal(usergroups){
               // alert(camapign_id);
                this.editmode = true;
                this.form.reset();
                $('#addNew').modal('show');
                this.form.fill(usergroups);
            },
            newModal(){
                this.editmode = false;
                this.form.reset();
                $('#addNew').modal('show');
            },
            deleteUsergroups(id){
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
                                this.form.delete('api/usergroups/'+id).then(()=>{
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
    
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
    border-radius: 7px;
}
 
</style>