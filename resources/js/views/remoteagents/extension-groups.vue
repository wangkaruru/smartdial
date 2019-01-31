<template>
    <!-- Start Content-->
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Remote Group List</h4>
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
                                            <th>GROUP</th>
                                            <th>EXTENSION </th>
                                            <th>RANK </th>
                                            <th>RESTRICT</th>
                                            <th>COUNT</th>
                                            <th>LAST CALL</th>
                                            <th>LAST ID</th>
                                            <th>ACTION</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr v-for="extensiongroups in extensiongroups.data">
                                            <td>{{extensiongroups.extension_group_id}}</td>
                                            <td>{{extensiongroups.extension}}</td>
                                            <td>{{extensiongroups.rank}}</td>
                                            <td>{{extensiongroups.campaign_groups}}</td>
                                            <td>{{extensiongroups.call_count_today}}</td>
                                            <td>{{extensiongroups.last_call_time}}</td>
                                            <td>{{extensiongroups.last_callerid}}</td>
                                            
                                            <td>

                                                <a  data-toggle="dropdown"  aria-haspopup="false"
                                                    aria-expanded="false">
                                                    <div class="test">
                                                            <div class="options">
                                                                <a href="#"   @click="editModal(extensiongroups)" >Edit</a><br>
                                                                <a href="#"   @click="deleteExtensiongroups(extensiongroups.extension_id)" >Delete</a>
              
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
                                <pagination :data="extensiongroups" v-on:pagination-change-page="getExtensiongroups"></pagination>
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
                    <h5 v-show="!editmode" class="modal-title" id="addNewLabel">New Extension Group</h5>
        <h5 v-show="editmode" class="modal-title" id="addNewLabel">Edit Extension Group</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
        <form @submit.prevent="editmode ? updateExtensiongroups() : createExtensions()">
                                           <div class="modal-body">
                                            <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="inputEmail4" class="col-form-label">Extension Group</label>
                                                    <input type="text" class="form-control" v-model="form.extension_group_id" name="extension_group_id" placeholder="(no spaces)">
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputPassword4" class="col-form-label">Extension</label>
                                                    <input type="text" class="form-control" v-model="form.extension" name="extension" placeholder="(numbers only)">
                                                </div>
                                                
                                            
                                            
                                               
                                                <div class="form-group col-md-4">
                                                    <label for="inputState" class="col-form-label">Rank</label>
                                                    <select id="rank" v-model="form.rank" name="rank" class="form-control">
                                                        
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                    </select>
                                                </div>
                                            
                                            <div class="form-group col-md-4">
                                                <label for="inputAddress" class="col-form-label">Campaign Groups</label>
                                                <input type="text" class="form-control" v-model="form.campaign_groups" name="campaign_groups" placeholder=" (pipe-delimited list)">
                                            </div>
                                            </div>

                                            


                                            <button type="submit" class="btn btn-primary">Submit</button>
                                        </div>
                                        </form>
                                        </div></div></div>
    </div>
</template>


<script>
import { Form, HasError, AlertError } from "vform";

    export default {
        mounted() {
        },
        data(){
   return {
                extensiongroups: {},
                editmode: false,
                
      form: new Form({
       extension_id:'',
       extension:'',
       rank:'',
       campaign_groups:'',
       extension_group_id:''
      
      
       }) } },
        

        created() {
            this.getExtensiongroups();
        },

        methods: {
            getExtensiongroups(page) {
                if (typeof page === 'undefined') {
                    page = 1;
                }
                axios.get('/api/extensiongroups?page=' + page)
                    .then(response => this.extensiongroups = response.data);
            },
            updateExtensiongroups(){
                //this.$Progress.start();
                // console.log('Editing data');
                //alert(id);
                this.form.put('/api/extensiongroups/'+this.form.extension_group_id)
                .then(() => {swal(
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
            editModal(extensiongroups){
                this.editmode = true;
                this.form.reset();
                $('#addNew').modal('show');
                this.form.fill(extensiongroups);
            },
            newModal(){
                this.editmode = false;
                this.form.reset();
                $('#addNew').modal('show');
            },
            deleteExtensiongroups(extension_id){
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
                                this.form.delete('/api/extensiongroups/'+extension_id).then(()=>{
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
    min-width: 160px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
    border-radius: 7px;
}
 
</style>