<template>
    <!-- Start Content-->
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">AC-CID</h4>
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
                                            <th>CAMPAIGN ID</th>
                                            <th> NAME</th>
                                            <th>LIST MIX</th>
                                            <th>ACTION</th>
                                            
                                        </tr>
                                        </thead>
                                        <tbody>
                                         <tr v-for="ac_cid in ac_cid.data">
                                            <td>{{ac_cid.mix_id}}</td>
                                            <td>
                                                <a  data-toggle="dropdown"  aria-haspopup="false"
                                                    aria-expanded="false">
                                                    <div class="test">
                                                            <div class="options">
                                                                 <a href="#">Edit</a><br>
                                                                <a href="#" >Delete</a>
              
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
<script>
    import { Form, HasError, AlertError } from "vform";

 export default {
     

      data(){
    return {
                ac_cid: {},
                editmode: false,
                ac_cid : {},
      form: new Form({
        lead_id:'',
        
        hopper_level:''
        
        }) } },

        mounted() {
        },
         created() {
            this.getAccid();
        },



     methods: {
            getAccid(page) {
                if (typeof page === 'undefined') {
                    page = 1;
                }
                axios.get('/api/ac_cid?page=' + page)
                    .then(response => this.ac_cid = response.data);
            },
     },
 }
</script>