<template>
    <!-- Start Content-->
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">DIDs</h4>
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
                                            <th>#</th>
                                            <th>DID</th>
                                            <th>DESCRIPTION</th>
                                            <th>CARRIER</th>
                                            <th>ACTIVE</th>
                                            <th>ADMIN GROUP</th>
                                            <th>ROUTE</th>
                                            <th>REC</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                            <tr v-for="did in dids.data">
                                            <td>{{ did.did_id }}</td>
                                            <td>{{ did.did_pattern }}</td>
                                            <td>{{ did.did_description }}</td>
                                            <td>{{ did.did_carrier_description }}</td>
                                            <td>{{ did.did_active}}</td>
                                            <td>{{ did.user_group }}</td>
                                            <td>{{ did.did_route }}</td>
                                            <td>{{ did.record_call}}</td>
                                            
                                            <td>

                                                <a  data-toggle="dropdown"  aria-haspopup="false"
                                                    aria-expanded="false">
                                                    <div class="test">
                                                            <div class="options" >
                                                                <a href="#" >Delete</a><br>
                                                                <a><router-link >Stats</router-link></a>
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
                                <pagination :data="dids" v-on:pagination-change-page="getDids"></pagination>
                            </div>
                        </div>

                    </div> <!-- end card-body -->
                </div> <!-- end card -->
            </div><!-- end col -->
        </div>
    </div>
</template>

<script>
import { Form, HasError, AlertError } from "vform";
    export default {
        data(){
    return {    
                dids: [],
                editmode: false,
                dids : {},
                
                //keywords:'',
      form: new Form({
        
                    did_id:'',
                    did_description:''
                    
        
        }) } },
 mounted() {
        },

        created() {
            this.getDids();
        },
        
        methods: {
        //     fetch() {
        //     axios.get('/api/search', { params: { keywords: this.keywords } })
        //         .then(response => this.users = response.data)
        //         .catch(error => {});
        // },
        
             getDids(page) {
                if (typeof page === 'undefined') {
                    page = 1;
                }
                axios.get('/api/dids?page=' + page)
                    .then(response => this.dids = response.data);
            }
    
           
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