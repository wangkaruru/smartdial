<template>
    <!-- Start Content-->
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Conferences Listing</h4>
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
                                            <th>CONFERENCE</th>
                                            <th>SERVER IP</th>
                                            <th>EXTENSION</th>
                                            <th></th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr v-for="conferences in conferences.data">
    
                                                <td>{{conferences.conf_exten}}</td>
                                                <td>{{conferences.server_ip}}</td>
                                                <td>{{conferences.extension}}</td>
                                           
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
          
                conferences : {},
      form: new Form({
        conf_exten:'',
      
        
        }) } },
         mounted() {
        },

         created() {
           this.getConferences();
        },
        methods: {
           getConferences(page) {
    
                if (typeof page === 'undefined') {
    
                    page = 1;
    
                }
    
                axios.get('/api/conferences?page=' + page)
    
                    .then(response => this.conferences = response.data);
    
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