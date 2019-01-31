<template>
    <!-- Start Content-->
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Hot Keys</h4>
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
                                            <th>HOTKEYS</th>
                                            <th></th>
                                            
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr v-for="hotkeys in hotkeys.data">
                                           <td>{{ hotkeys.campaign_id }}</td>
                                           <td>{{ hotkeys.status_name }}</td>
                                           <td>{{ hotkeys.hotkey }}</td>
                                         <td>

                                                <a  data-toggle="dropdown"  aria-haspopup="false"
                                                    aria-expanded="false">
                                                    <div class="test" >
                                                            <div class="options" >
                                                                 <a href="#" @click="deleteHotkeys(hotkeys.hotkey)" >Delete</a><br>
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
                // search:'',
                // searchit:'',
                hotkeys : {},
      form: new Form({
        campaign_id:'',
        status:'',
        status_name:''
        
        }) } },
         mounted() {
        },

         created() {
            this.getHotkeys();
        },
        methods: {
            getHotkeys(page) {
                if (typeof page === 'undefined') {
                    page = 1;
                }
                axios.get('/api/hotkeys?page=' + page)
                    .then(response => this.hotkeys = response.data);
                   // console.log('Editing data');
                   
                     //$('#loader').success('hide')
            },
             deleteHotkeys(hotkey){
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
                                this.form.delete('/api/hotkeys/'+hotkey).then(()=>{
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