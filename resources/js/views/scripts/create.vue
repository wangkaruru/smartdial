<template>
 <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        
                                    </div>
                                    <h4 class="page-title"> Create Script Form</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        

                                        <form @submit.prevent="createScripts()">
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
                                                        <option>Choose</option>
                                                        <option value="1">Option 1</option>
                                                        <option value="1">Option 2</option>
                                                        <option value="1">Option 3</option>
                                                    </select>
                                                </div>

                                                 <div class="form-group col-md-4">
                                                    <label for="inputState" class="col-form-label">Active</label>
                                                    <select id="active"  name="active" v-model="form.active" class="form-control">
                                                        <option>Choose</option>
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

                                        </form>

                                    </div> <!-- end card-body -->
                                </div> <!-- end card-->
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->
                        </div>
</template>
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
             createScripts(){
                //this.$Progress.start();
                this.form.post('/api/scripts')
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
    }
    
</script>