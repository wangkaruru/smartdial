<template>
    <!-- Start Content-->
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Call Times</h4>
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
                                            <th>CALLTIME ID</th>
                                            <th>CALLTIME NAME</th>
                                            <th>DEFAULT START</th>
                                            <th>DEFAULT STOP</th>
                                            <th>ADMIN GROUP</th>
                                            <th></th>
                                            
                                        </tr>
                                        </thead>
                                        <tbody>
                                       <tr v-for="calltimes in calltimes.data">
    
                                                <td>{{calltimes.call_time_id}}</td>
                                                <td>{{calltimes.call_time_name}}</td>
                                                <td>{{calltimes.ct_default_start}}</td>
                                                <td>{{calltimes.ct_default_stop}}</td>
                                                <td>{{calltimes.user_group}}</td>
                                        
                                         <td>

                                                <a  data-toggle="dropdown"  aria-haspopup="false"
                                                    aria-expanded="false">
                                                    <div class="test" >
                                                            <div class="options" >
                                                                 <a href="#" @click="editModal(calltimes)">Edit</a><br>
                                                                 <a href="#" @click="deleteCallTimes(calltimes.call_time_id)">Delete</a><br>
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
    
    
    
                        <h5 class="modal-title" id="addNewLabel">Update Call Times' Info</h5>
    
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    
                        <span aria-hidden="true">&times;</span>
    
                        </button>
    
                    </div>
    
                    <form @submit.prevent="editMode ? updateCallTimes():createCallTimes()">
    
                        <div class="modal-body">
    
    
    
                            <div class="form-row">
    
                                <div class="form-group col-md-4">
    
                                    <label for="inputState" class="col-form-label">Call Time ID</label>
    
                                    <input type="text" v-model="form.call_time_id" name="call_time_id" class="form-control" readonly>
    
    
    
                                </div>
    
    
    
                                <div class="form-group col-md-4">
    
                                    <label for="inputState" class="col-form-label">Call Time Name</label>
    
                                    <input type="text" v-model="form.call_time_name" name="call_time_name" class="form-control">
    
    
    
                                </div>

                                <div class="form-group col-md-4">
    
                                    <label for="inputState" class="col-form-label">Call Time Comments</label>
    
                                    <input type="text" v-model="form.call_time_comments" name="call_time_comments" class="form-control">
    
    
    
                                </div>
    
    
    
                                <div class="form-group col-md-4">
    
                                    <label for="inputState" class="col-form-label">Admin User Group</label>
    
                                    <select id="user_group" v-model="form.user_group" name="user_group" class="form-control">
    
                                            <option v-for="calltimes in calltimes.data" v-bind:value="calltimes.user_group">{{calltimes.user_group}}</option>           
    
                                                        </select>
    
                                </div>
    
                            </div>
    
    
    
                            <div class="modal-footer">
    
                                <button type="submit" v-show="!editMode" class="btn btn-primary">Submit</button>
    
                                <button type="submit" v-show="editMode" class="btn btn-primary">Submit</button>
    
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
   import { Form, HasError, AlertError } from "vform";
    export default {
        data(){
    return {    
          
                calltimes : {},
                form: new Form({
                call_time_id:'',
                call_time_name:'',
                call_time_comments:''
      
        
        }) } },
         mounted() {
        },

         created() {
            this.getCallTimes();
        },
        methods: {
           getCallTimes(page) {
    
                if (typeof page === 'undefined') {
    
                    page = 1;
    
                }
    
                axios.get('/api/calltimes?page=' + page)
    
                    .then(response => this.calltimes = response.data);
    
            },
    
            updateCallTimes() {
    
                //this.$Progress.start();
    
                // console.log('Editing data');
    
                //  alert(campaign_id);
    
                // this.form.put('/api/campaignstatus/'+this.form.campaign_id)
    
                this.form.put('/api/calltimes/' + this.form.call_time_id)
    
    
    
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
    
            editModal(calltimes) {
    
                // alert(camapign_id);
    
                this.editmode = true;
    
                this.form.reset();
    
                $('#addNew').modal('show');
    
                this.form.fill(calltimes);
    
            },
    
            newModal(calltimes) {
    
                this.editmode = false;
    
                this.form.reset();
    
                $('#addNew').modal('show');
    
            },
    
    
    
            createCallTimes() {
    
                //this.$Progress.start();
    
                this.form.post('/api/calltimes')
    
                    // this.form.post('/api/users')
    
                    .then(() => {
    
                        Fire.$emit('AfterCreate');
    
                        //$('#addNew').modal('hide')
    
                        toast({
    
                            type: 'success',
    
                            title: 'CallTime Created  successfully'
    
                        })
    
                        this.$Progress.finish();
    
                    })
    
                    .catch(() => {})
    
            },
    
    
    
            deleteCallTimes(calltimes) {
    
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
    
                        this.form.delete('/api/calltimes/' + call_time_id).then(() => {
    
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