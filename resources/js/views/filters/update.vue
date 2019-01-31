<template>
   <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        
                                    </div>
                                    <h4 class="page-title">Update Filter Info</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        
                                        

                                        <form @submit.prevent="updateFilter()">
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
            }
        },
    } 
</script>