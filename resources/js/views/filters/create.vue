<template>
 <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        
                                    </div>
                                    <h4 class="page-title">Filter Form</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">Filter Form</h4>
                                        

                                        <form @submit.prevent="createFilter()">
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
                                          

                                            <button type="submit" class="btn btn-primary">Submit</button>

                                        </form>

                                    </div> <!-- end card-body -->
                                </div> <!-- end card-->
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->
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
        methods:{
         createFilter(){
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
            }
        },

        mounted() {
        }
    }
</script>