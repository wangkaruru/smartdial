<template>
    <!-- Start Content-->
    
    <div class="container-fluid">
    
        <!-- start page title -->
    
        <div class="row">
    
            <div class="col-12">
    
                <div class="page-title-box">
    
                    <h4 class="page-title">Remote Agent List</h4>
    
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
    
                                    <table class="table table-hover">
    
                                        <thead>
    
                                            <tr>
    
                                                <th>USER </th>
    
                                                <th>LINES </th>
    
                                                <th>SERVER </th>
    
                                                <th>CONF-EXTEN </th>
    
                                                <th>GROUP</th>
    
                                                <th>STATUS</th>
    
                                                <th>CAMPAIGN</th>
    
                                                <th>ACTION</th>
    
                                            </tr>
    
                                        </thead>
    
                                        <tbody>
    
                                            <tr v-for="remoteagents in remoteagents.data">
    
                                                <td>{{remoteagents.user_start}}</td>
    
                                                <td>{{remoteagents.number_of_lines}}</td>
    
                                                <td>{{remoteagents.server_ip}}</td>
    
                                                <td>{{remoteagents.conf_exten}}</td>
    
                                                <td>{{remoteagents.extension_group}}</td>
    
                                                <td>{{remoteagents.status}}</td>
    
                                                <td>{{remoteagents.closer_campaigns}}</td>
    
    
    
                                                <td>
    
    
    
                                                    <a data-toggle="dropdown" aria-haspopup="false" aria-expanded="false">
    
                                                        <div class="test">
    
                                                            <div class="options">
    
                                                                <a href="#" @click="editModal(remoteagents)">Edit</a><br>
    
                                                                <a href="#" @click="deleteRemoteagents(remoteagents.remote_agent_id)">Delete</a>
    
    
    
                                                            </div>
    
                                                        </div>
    
                                                    </a>
    
                                                </td>
    
                                            </tr>
    
                                        </tbody>
    
                                    </table>
    
                                </div>
    
                            </div>
    
                            <!-- end col -->
    
                        </div>
    
                        <div class="row">
    
                            <div class="col-md-12">
    
                                <pagination :data="remoteagents" v-on:pagination-change-page="getRemoteagents"></pagination>
    
                            </div>
    
                        </div>
    
    
    
                    </div>
    
                    <!-- end card-body -->
    
                </div>
    
                <!-- end card -->
    
            </div>
    
            <!-- end col -->
    
        </div>
    
    
    
    
    
        <div class="modal fade" id="addNew" tabindex="-1" role="dialog" aria-labelledby="addNewLabel" aria-hidden="true">
    
            <div class="modal-dialog modal-lg" role="document">
    
                <div class="modal-content">
    
                    <div class="modal-header">
    
    
    
                        <h5 class="modal-title" id="addNewLabel">Remote Agent's Info</h5>
    
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    
                        <span aria-hidden="true">&times;</span>
    
                        </button>
    
                    </div>
    
                    <form @submit.prevent="updateRemoteagents()">
    
                        <div class="modal-body">
    
    
    
                            <div class="form-row">
    
                                <div class="form-group col-md-4">
    
                                    <label for="inputState" class="col-form-label">User ID Start</label>
    
                                    <input type="text" v-model="form.user_start" name="user_start" class="form-control">
    
    
    
                                </div>
    
    
    
                                <div class="form-group col-md-4">
    
                                    <label for="inputState" class="col-form-label">Mix Name</label>
    
                                    <input type="text" v-model="form.number_of_lines" name="number_of_lines" class="form-control">
    
    
    
                                </div>
    
    
    
                                <div class="form-group col-md-4">
    
                                    <label for="inputState" class="col-form-label">Server IP</label>
    
    
    
                                    <select id="server_ip" v-model="form.server_ip" name="server_ip" class="form-control">
    
                                                          <option v-for="remoteagents in remoteagents.data">{{remoteagents.server_ip}}</option>
    
                                                           </select>
    
    
    
                                </div>
    
                            </div>
    
                            <div class="form-row">
    
    
    
                                <div class="form-group col-md-4">
    
                                    <label for="inputState" class="col-form-label">External Extension</label>
    
                                    <input type="text" v-model="form.conf_exten" name="conf_exten" class="form-control">
    
    
    
                                </div>
    
    
    
                                <div class="form-group col-md-4">
    
                                    <label for="inputState" class="col-form-label">External Group</label>
    
                                    <select id="extension_group" v-model="form.extension_group" name="extension_group" class="form-control">
    
                                                            <option value="NONE">NONE</option>
    
                                                            <option value="chew-1">chew-1</option>
    
                                                           </select>
    
                                </div>
    
    
    
                                <div class="form-group col-md-4">
    
                                    <label for="inputState" class="col-form-label">Status</label>
    
                                    <select id="status" v-model="form.status" name="status" class="form-control">
    
                                                            <option value="ACTIVE">ACTIVE</option>
    
                                                            <option value="INACTIVE">INACTIve</option>
    
                                                           </select>
    
                                </div>
    
                            </div>
    
                            <div class="form-row">
    
                                <div class="form-group col-md-4">
    
                                    <label for="inputState" class="col-form-label">Campaign</label>
    
                                    <select id="campaign_id" v-model="form.campaign_id" name="campaign_id" class="form-control">
    
                                                          <option v-for="remoteagents in remoteagents.data" v-bind:value="remoteagents.campaign_id">{{remoteagents.campaign_id}}</option>
    
                                                           </select>
    
                                </div>
    
    
    
                                <div class="form-group col-md-4">
    
                                    <label for="inputState" class="col-form-label">On Hook Agent</label>
    
                                    <select id="on_hook_agent" v-model="form.on_hook_agent" name="on_hook_agent" class="form-control">
    
                                                          <option value="Y">YES</option>
    
                                                          <option value="N">NO</option>
    
                                                           </select>
    
                                </div>
    
    
    
                                <div class="form-group col-md-4">
    
                                    <label for="inputState" class="col-form-label">On Hook Ring Time</label>
    
                                    <input type="text" v-model="form.on_hook_ring_time" name="on_hook_ring_time" class="form-control">
    
    
    
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
    import {
    
        Form,
    
        HasError,
    
        AlertError
    
    } from "vform";
    
    
    
    export default {
    
        mounted() {},
    
        data() {
    
            return {
    
                remoteagents: {},
    
                editmode: false,
    
    
    
                form: new Form({
    
                    remote_agent_id: '',
    
                    user_start: '',
    
                    number_of_lines: '',
    
                    server_ip: '',
    
                    conf_exten: '',
    
                    extension_group: '',
    
                    on_hook_agent: '',
    
                    on_hook_ring_time: ''
    
    
    
                })
    
            }
    
        },
    
    
    
    
    
        created() {
    
            this.getRemoteagents();
    
        },
    
    
    
        methods: {
    
            getRemoteagents(page) {
    
                if (typeof page === 'undefined') {
    
                    page = 1;
    
                }
    
                axios.get('/api/remoteagents?page=' + page)
    
                    .then(response => this.remoteagents = response.data);
    
            },
    
            updateRemoteagents() {
    
                //this.$Progress.start();
    
                // console.log('Editing data');
    
                //alert(id);
    
                this.form.put('/api/remoteagents/' + this.form.remote_agent_id)
    
                    .then(() => {
    
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
    
            editModal(remoteagents) {
    
                this.editmode = true;
    
                this.form.reset();
    
                $('#addNew').modal('show');
    
                this.form.fill(remoteagents);
    
            },
    
            newModal() {
    
                this.editmode = false;
    
                this.form.reset();
    
                $('#addNew').modal('show');
    
            },
    
            deleteRemoteagents(remote_agent_id) {
    
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
    
                        this.form.delete('/api/remoteagents/' + remote_agent_id).then(() => {
    
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
<style>
    .test:after {
    
        content: '\2807';
    
        font-size: 20px;
    
        position: relative;
    
        display: inline-block;
    
    }
    
    
    
    .options a:hover {
    
        background-color: #f1f1f1;
    
    }
    
    
    
    .test:hover .options {
    
        display: block;
    
    }
    
    
    
    .options {
    
        padding: 8px 16px;
    
        display: none;
    
        position: absolute;
    
        right: 4;
    
        background-color: #f9f9f9;
    
        min-width: 160px;
    
        box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
    
        z-index: 1;
    
        border-radius: 7px;
    
    }
</style>