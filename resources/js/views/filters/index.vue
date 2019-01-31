<template>
    <!-- Start Content-->
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Filter List</h4>
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
                                            <th>FILTER ID</th>
                                            <th>FILTER NAME</th>
                                            <th>ADMIN GROUP</th>
                                            <th>ACTION</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr v-for="filters in filters.data">
                                            <td>{{filters.lead_filter_id}}</td>
                                            <td>{{filters.lead_filter_name}}</td>
                                            <td>{{filters.user_group}}</td>
                                            
                                            <td>
                                                <a  data-toggle="dropdown"  aria-haspopup="false"
                                                    aria-expanded="false">
                                                    <div class="test">
                                                            <div class="options">
                                                              <a href="#" @click="editModal(filters)" >Edit</a><br>
                                                              <a href="#"  @click="deleteFilter(filter.lead_filter_id)" >Delete</a><br>
              
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
                    
                    <h5 class="modal-title"  id="addNewLabel">Update Filter's Info</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
        <form @submit.prevent="editmode ? updateFilters() : createFilters()">
         <div class="modal-body">
                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputEmail4" class="col-form-label">Filter Id</label>
                                                    <input v-model="form.lead_filter_id" type="text" name="lead_filter_id" placeholder="lead filter id"
                                                    class="form-control" >
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputPassword4" class="col-form-label">Filter Name</label>
                                                    <input v-model="form.lead_filter_name" class="form-control" type="text" name="lead_filter_name" placeholder="Filter Name">
                                                     
                                                </div>
                                            </div>

                                            <div class="form-group">
                                                <label for="inputAddress" class="col-form-label">Filter Comments</label>
                                                <input v-model="form.lead_filter_comments" type="text" name="lead_filter_comments" placeholder="lead filter comments"
                                                    class="form-control" >
                                            </div>

                                            

                                            <div class="form-row">
                                                
                                                <div class="form-group col-md-4">
                                                    <label for="inputState" class="col-form-label">Admin User group</label>
                                                    <select name="user_group" id="user_group" v-model="form.user_group" class="form-control">
                                                        <option>Choose</option>
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                    </select>
                                                </div>

                                                 
                                            </div>
                                            <div class="form-group mb-3">
                                                        <label for="example-textarea">Filter SQL</label>
                                                        <textarea class="form-control" id="lead_filter_sql" name="lead_filter_sql" v-model="form.lead_filter_sql" rows="5"></textarea>
                                                    </div>
                                          

                                            <button type="submit" class="btn btn-primary">Update</button>
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
    return{   filters: {},
      form: new Form({
        lead_filter_id:'',
        lead_filter_comments:'',
        lead_filter_name:'',
        lead_filter_sql:'',
        user_group: ''
        
        }) } },


        mounted() {
        },

        created() {
            this.getFilters();
        },

        methods: {
            getFilters(page) {
                if (typeof page === 'undefined') {
                    page = 1;
                }
                axios.get('api/filters?page=' + page)
                    .then(response => this.filters = response.data);
            },
            updateFilters(){
                //this.$Progress.start();
                // console.log('Editing data');
                //alert(id);
                this.form.put('/api/filters/'+this.form.lead_filter_id)
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
            editModal(filters){
                this.editmode = true;
                this.form.reset();
                $('#addNew').modal('show');
                this.form.fill(filters);
            },
            newModal(){
                this.editmode = false;
                this.form.reset();
                $('#addNew').modal('show');
            },
            createFilters(){
                //this.$Progress.start();
                this.form.post('/api/filters')
                .then(()=>{
                    Fire.$emit('AfterCreate');
                    //$('#addNew').modal('hide')
                    toast({
                        type: 'success',
                        title: 'Filter Created in successfully'
                        })
                    this.$Progress.finish();
                })
                .catch(()=>{
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