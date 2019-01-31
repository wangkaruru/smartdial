<template>
    <!-- Start Content-->
    
    <div class="container-fluid">
    
        <!-- start page title -->
    
        <div class="row">
    
            <div class="col-12">
    
                <div class="page-title-box">
    
                    <h4 class="page-title">List Mix</h4>
    
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
    
                                                <th>CAMPAIGN ID</th>
    
                                                <th> NAME</th>
    
                                                <th>LIST MIX</th>
    
                                                <th>ACTION</th>
    
    
    
                                            </tr>
    
                                        </thead>
    
                                        <tbody>
    
                                            <tr v-for="vlist in vlist.data">
    
                                                <td>{{vlist.campaign_id}}</td>
    
                                                <td>{{vlist.vcl_name}}</td>
    
                                                <td>{{vlist.list_mix_container}}</td>
    
    
    
                                                <td>
    
                                                    <a data-toggle="dropdown" aria-haspopup="false" aria-expanded="false">
    
                                                        <div class="test">
    
                                                            <div class="options">
    
                                                                <a href="#" @click="editModal(vlist)">Edit</a><br>
    
                                                                <a href="#" @click="newModal(vlist)">Create</a><br>
    
                                                                <a href="#" @click="deleteVlist(vlist.vcl_id)">Delete</a>
    
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
    
    
    
                        <h5 class="modal-title" id="addNewLabel">Update List Mix's Info</h5>
    
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
    
                        <span aria-hidden="true">&times;</span>
    
                        </button>
    
                    </div>
    
                    <form @submit.prevent="editMode ? updateVlist():createVlist()">
    
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
    import {
    
        Form,
    
        HasError,
    
        AlertError
    
    } from "vform";
    
    
    
    export default {
    
    
    
    
    
        data() {
    
            return {
    
                vlist: {},
    
                editmode: false,
    
                form: new Form({
    
                    vcl_id: '',
    
                    vcl_name: '',
    
                    list_mix_container: '',
    
                    campaign_id: '',
    
                    mix_method: ''
    
    
    
    
    
                })
    
            }
    
        },
    
    
    
        mounted() {},
    
        created() {
    
            this.getVlist();
    
        },
    
    
    
    
    
    
    
        methods: {
    
            getVlist(page) {
    
                if (typeof page === 'undefined') {
    
                    page = 1;
    
                }
    
                axios.get('/api/vlist?page=' + page)
    
                    .then(response => this.vlist = response.data);
    
            },
    
            updateVlist() {
    
                //this.$Progress.start();
    
                // console.log('Editing data');
    
                //  alert(campaign_id);
    
                // this.form.put('/api/campaignstatus/'+this.form.campaign_id)
    
                this.form.put('/api/vlist/' + this.form.vcl_id)
    
    
    
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
    
            editModal(vlist) {
    
                // alert(camapign_id);
    
                this.editmode = true;
    
                this.form.reset();
    
                $('#addNew').modal('show');
    
                this.form.fill(vlist);
    
            },
    
            newModal(vlist) {
    
                this.editmode = false;
    
                this.form.reset();
    
                $('#addNew').modal('show');
    
            },
    
    
    
            createVlist() {
    
                //this.$Progress.start();
    
                this.form.post('/api/vlist')
    
                    // this.form.post('/api/users')
    
                    .then(() => {
    
                        Fire.$emit('AfterCreate');
    
                        //$('#addNew').modal('hide')
    
                        toast({
    
                            type: 'success',
    
                            title: 'VList Created in successfully'
    
                        })
    
                        this.$Progress.finish();
    
                    })
    
                    .catch(() => {})
    
            },
    
    
    
            deleteVlist(vlist) {
    
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
    
                        this.form.delete('/api/vlist/' + mix_id).then(() => {
    
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
    
    
    
    .blinking {
    
        animation: blinkingText 1.5s infinite;
    
    }
    
    
    
    @keyframes blinkingText {
    
        0% {
    
            color: red;
    
        }
    
        49% {
    
            color: transparent;
    
        }
    
        50% {
    
            color: transparent;
    
        }
    
        99% {
    
            color: transparent;
    
        }
    
        100% {
    
            color: #000;
    
        }
    
    }
</style>