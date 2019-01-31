<template>
    <!-- Start Content-->
    
    <div class="container-fluid">
    
        <!-- start page title -->
    
        <div class="row">
    
            <div class="col-12">
    
                <div class="page-title-box">
    
                    <h4 class="page-title">Campaign Statuses</h4>
    
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
    
                                                <th>CAMPAIGN</th>
    
                                                <th> NAME</th>
    
                                                <th>STATUSES</th>
    
    
    
                                                <th></th>
    
                                            </tr>
    
                                        </thead>
    
                                        <tbody>
    
                                            <tr v-for="campaignstatus in campaignstatus.data">
    
                                                <td>{{ campaignstatus.campaign_id }}</td>
    
                                                <td>{{ campaignstatus.status_name }}</td>
    
                                                <td>{{ campaignstatus.status }}</td>
    
                                                <td>
    
    
    
                                                    <a data-toggle="dropdown" aria-haspopup="false" aria-expanded="false">
    
                                                        <div class="test">
    
                                                            <div class="options">
    
                                                                <a href="#" @click="editModal(campaignstatus)">Edit</a><br>
    
                                                                <a href="#" @click="newModal(campaignstatus)">Create</a><br>
    
                                                                <a href="#" @click="deleteCampaignstatus(campaignstatus.status)">Delete</a>
    
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
    
                        <h5 v-show="!editmode" class="modal-title" id="addNewLabel">Add New Status</h5>
    
                        <h5 v-show="editmode" class="modal-title" id="addNewLabel">Edit Status</h5>
    
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    
                        <span aria-hidden="true">&times;</span>
    
                        </button>
    
                    </div>
    
                    <form @submit.prevent="editmode ? updateCampaignstatus():createCampaignstatus()">
    
                        <div class="modal-body">
    
                            <div class="form-row">
    
                                <div class="form-group col-md-4">
    
                                    <label for="inputEmail4" class="col-form-label">Status</label>
    
                                    <input v-model="form.status" type="text" name="status" placeholder="status" class="form-control">
    
                                </div>
    
    
    
    
    
    
    
                                <div class="form-group col-md-4">
    
                                    <label for="inputPassword4" class="col-form-label">Description</label>
    
                                    <input v-model="form.status_name" type="text" name="campaign_name" placeholder="description" class="form-control">
    
                                </div>
    
    
    
                                <div class="form-group col-md-4">
    
                                    <label for="inputCity" class="col-form-label">Selectable</label>
    
                                    <select name="selected" v-model="form.selectable" id="selectable" class="form-control">
    
                                                            <option value="Y">Yes</option>
    
                                                            <option value="N">No</option>
    
                                                            
    
                                                    </select>
    
                                </div>
    
                            </div>
    
                            <div class="form-row">
    
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
    
                            </div>
    
                            <div class="form-row">
    
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
    
                            </div>
    
                            <div class="form-row">
    
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
    
                            </div>
    
                            <div class="form-row">
    
    
    
                                <div class="form-group col-md-4">
    
                                    <label for="inputState" class="col-form-label">Category</label>
    
                                    <select id="category" v-model="form.category" name="category" class="form-control">
    
                                                            
    
                                                                    <option value="Y">Yes</option>
    
                                                                <option value="N">No</option>
    
                                                            </select>
    
                                </div>
    
    
    
                            </div>
    
                            <div class="modal-footer">
    
                                <button type="submit" v-show="!editmode" class="btn btn-primary">Create</button>
    
                                <button type="submit" v-show="editmode" class="btn btn-primary">Update</button>
    
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
    
        data() {
    
            return {
    
                editmode: false,
    
                campaignstatus: {},
    
                campaigns: {},
    
    
    
                form: new Form({
    
                    campaign_id: '',
    
                    status: '',
    
                    status_name: '',
    
                    selectable: '',
    
                    human_answered: '',
    
                    sale: '',
    
                    dnc: '',
    
                    customer_contact: '',
    
                    not_interested: '',
    
                    unworkable: '',
    
                    scheduled_callback: '',
    
                    completed: '',
    
                    answering_machine: '',
    
                    category: ''
    
    
    
                })
    
            }
    
        },
    
        mounted() {},
    
    
    
        created() {
    
            this.getCampaignstatus();
    
        },
    
        methods: {
    
            getCampaignstatus(page) {
    
                if (typeof page === 'undefined') {
    
                    page = 1;
    
                }
    
                axios.get('/api/campaignstatus?page=' + page)
    
                    .then(response => this.campaignstatus = response.data);
    
                // console.log('Editing data');
    
    
    
                //$('#loader').success('hide')
    
            },
    
            updateCampaignstatus() {
    
                //this.$Progress.start();
    
                // console.log('Editing data');
    
                //  alert(campaign_id);
    
                // this.form.put('/api/campaignstatus/'+this.form.campaign_id)
    
                this.form.put('/api/campaignstatus/' + this.form.campaign_id)
    
    
    
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
    
            editModal(campaignstatus) {
    
                // alert(camapign_id);
    
                this.editmode = true;
    
                this.form.reset();
    
                $('#addNew').modal('show');
    
                this.form.fill(campaignstatus);
    
            },
    
            newModal(campaignstatus) {
    
                this.editmode = false;
    
                this.form.reset();
    
                $('#addNew').modal('show');
    
            },
    
    
    
    
    
    
    
            deleteCampaignstatus(status) {
    
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
    
                        this.form.delete('/api/campaignstatus/' + status).then(() => {
    
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
    
            createCampaignstatus() {
    
                //this.$Progress.start();
    
                this.form.post('/api/campaignstatus')
    
                    // this.form.post('/api/users')
    
                    .then(() => {
    
                        Fire.$emit('AfterCreate');
    
                        //$('#addNew').modal('hide')
    
                        toast({
    
                            type: 'success',
    
                            title: 'Campaign Status Created in successfully'
    
                        })
    
                        this.$Progress.finish();
    
                    })
    
                    .catch(() => {})
    
            },
    
        }
    
    
    
    
    
    
    
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