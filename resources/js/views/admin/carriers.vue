<template>
    <!-- Start Content-->
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Carriers</h4>
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
                                            <th>CARRIER ID</th>
                                            <th>CARRIER NAME</th>
                                            <th>SERVER IP</th>
                                            <th>PROTOCOL</th>
                                            <th>REGISTRATION</th>
                                            <th>ACTIVE</th>
                                            <th>ADMIN GROUP</th>
                                            <th></th>
                                            
                                        </tr>
                                        </thead>
                                        <tbody>
                                         <tr v-for="servercarriers in servercarriers.data">
    
                                                <td>{{servercarriers.carrier_id}}</td>
                                                <td>{{servercarriers.carrier_name}}</td>
                                                <td>{{servercarriers.server_ip}}</td>
                                                <td>{{servercarriers.protocol}}</td>
                                                <td>{{servercarriers.registration_string}}</td>
                                                <td>{{servercarriers.active}}</td>
                                                <td>{{servercarriers.user_group}}</td>
                                                
                                         <td>

                                                <a  data-toggle="dropdown"  aria-haspopup="false"
                                                    aria-expanded="false">
                                                    <div class="test" >
                                                            <div class="options" >
                                                                 <a href="#" >Delete</a><br>
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
    </div>
</template>
<script>
   import { Form, HasError, AlertError } from "vform";
    export default {
        data(){
    return {    
          
                servercarriers : {},
      form: new Form({
        carrier_id:''
      
        
        }) } },
         mounted() {
        },

         created() {
           this.getCarriers();
        },
        methods: {
           getCarriers(page) {
    
                if (typeof page === 'undefined') {
    
                    page = 1;
    
                }
    
                axios.get('/api/servercarriers?page=' + page)
    
                    .then(response => this.servercarriers = response.data);
    
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