<template>
    <!-- Start Content-->
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Servers</h4>
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
                                            <th>SERVER ID</th>
                                            <th>NAME</th>
                                            <th>SERVER IP</th>
                                            <th>ACTIVE</th>
                                            <th>AGENT</th>
                                            <th>ASTERISK</th>
                                            <th>TRUNKS</th>
                                            <th>GMT</th>
                                            <th></th>
                                            
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr v-for="servers in servers.data">
    
                                                <td>{{servers.server_id}}</td>
                                                <td>{{servers.server_description}}</td>
                                                <td>{{servers.server_ip}}</td>
                                                <td>{{servers.active}}</td>
                                                <td>{{servers.active_agent_login_server}}</td>
                                                <td>{{servers.asterisk_version}}</td>
                                                <td>{{servers.max_vicidial_trunks}}</td>
                                                <td>{{servers.local_gmt}}</td>
                                           
                                         <td>

                                                <a  data-toggle="dropdown"  aria-haspopup="false"
                                                    aria-expanded="false">
                                                    <div class="test" >
                                                            <div class="options" >
                                                                 
                                                                 <a href="#" @click="editModal(servers)" >Edit</a><br>
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
    
    
    
                        <h5 class="modal-title" id="addNewLabel">Update Servers's Info</h5>
    
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    
                        <span aria-hidden="true">&times;</span>
    
                        </button>
    
                    </div>
    
                    <form @submit.prevent="editmode ? updateServers():createServers()">
    
                        <div class="modal-body">
    
    
    
                            <div class="form-row">
    
                                <div class="form-group col-md-4">
    
                                    <label for="inputState" class="col-form-label">Server ID</label>
    
                                    <input type="text" v-model="form.server_id" name="server_id" class="form-control">
    
    
    
                                </div>
    
    
    
                                <div class="form-group col-md-4">
    
                                    <label for="inputState" class="col-form-label">Server Description</label>
    
                                    <input type="text" v-model="form.server_description" name="server_description" class="form-control">
    
    
    
                                </div>

                                <div class="form-group col-md-4">
    
                                    <label for="inputState" class="col-form-label">Server IP Address</label>
    
                                    <input type="text" v-model="form.server_ip" name="server_ip" class="form-control">
    
    
    
                                </div>
    
    
    
                                <div class="form-group col-md-4">
    
                                    <label for="inputState" class="col-form-label">Mix Method</label>
    
                                    <select id="active" v-model="form.active" name="active" class="form-control">
    
                                                                 <option value="0">NO</option>
    
                                                                 <option value="1">YES</option>
    
                                                                 
    
                                                        </select>
    
                                </div>

                                <div class="form-group col-md-4">
    
                                    <label for="inputState" class="col-form-label">System Load</label>
    
                                    <input type="text" v-model="form.sysload" name="sysload" class="form-control" readonly>
    
    
    
                                </div>

                                <div class="form-group col-md-4">
    
                                    <label for="inputState" class="col-form-label">Live Channels</label>
    
                                    <input type="text" v-model="form.live_channels" name="live_channels" class="form-control" readonly>
    
    
    
                                </div>

                                <div class="form-group col-md-4">
    
                                    <label for="inputState" class="col-form-label">Live Channels</label>
    
                                    <input type="text" v-model="form.live_channels" name="live_channels" class="form-control" readonly>
    
    
    
                                </div>
    
    
                            </div>
    
    
    
                            <div class="modal-footer">
    
                                <button type="submit" v-show="!editmode" class="btn btn-primary">Submit</button>
    
                                <button type="submit" v-show="editmode" class="btn btn-primary">Submit</button>
    
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
          
                servers : {},
                editmode: false,
      form: new Form({
        server_id:'',
        server_description:'',
        server_ip:'',
        active:'',
        sysload:'',
        live_channels:''
      
        
        }) } },
         mounted() {
        },

         created() {
           this.getServers();
        },
        methods: {
           getServers(page) {
    
                if (typeof page === 'undefined') {
    
                    page = 1;
    
                }
    
                axios.get('/api/servers?page=' + page)
    
                    .then(response => this.servers = response.data);
    
            },
            updateServers(){
                //this.$Progress.start();
                // console.log('Editing data');
                //alert(id);
                this.form.put('/api/servers/'+this.form.server_id)
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
            editModal(servers){
                this.editmode = true;
                this.form.reset();
                $('#addNew').modal('show');
                this.form.fill(servers);
            },
            newModal(){
                this.editmode = false;
                this.form.reset();
                $('#addNew').modal('show');
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