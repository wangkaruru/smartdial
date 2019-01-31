<template>
    <!-- Start Content-->
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Phones</h4>
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
                                            <th>EXTEN -#-</th>
                                            <th>PROTO</th>
                                            <th>SERVER</th>
                                            <th>DIAL PLAN</th>
                                            <th>STATUS</th>
                                            <th>NAME</th>
                                            <th>VMAIL</th>
                                            <th>GROUPS</th>
                                            <th></th>
                                            
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr v-for="phones in phones.data">
    
                                                <td>{{phones.extension}}</td>
                                                <td>{{phones.protocol}}</td>
                                                <td>{{phones.server_ip}}</td>
                                                <td>{{phones.dialplan_number}}</td>
                                                <td>{{phones.status}}</td>
                                                <td>{{phones.fullname}}</td>
                                                <td>{{phones.voicemail_id}}</td>
                                                <td>{{phones.user_group}}</td>
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
          
                phones : {},
      form: new Form({
        extension:''
      
        
        }) } },
         mounted() {
        },

         created() {
           this.getPhones();
        },
        methods: {
           getPhones(page) {
    
                if (typeof page === 'undefined') {
    
                    page = 1;
    
                }
    
                axios.get('/api/phones?page=' + page)
    
                    .then(response => this.phones = response.data);
    
            },
    
            updatePhones() {
    
                //this.$Progress.start();
    
                // console.log('Editing data');
    
                //  alert(campaign_id);
    
                // this.form.put('/api/campaignstatus/'+this.form.campaign_id)
    
                this.form.put('/api/phones/' + this.form.extension)
    
    
    
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
    
            editModal(phones) {
    
                // alert(camapign_id);
    
                this.editmode = true;
    
                this.form.reset();
    
                $('#addNew').modal('show');
    
                this.form.fill(phones);
    
            },
    
            newModal(phones) {
    
                this.editmode = false;
    
                this.form.reset();
    
                $('#addNew').modal('show');
    
            },
    
    
    
            createPhones() {
    
                //this.$Progress.start();
    
                this.form.post('/api/phones')
    
                    // this.form.post('/api/users')
    
                    .then(() => {
    
                        Fire.$emit('AfterCreate');
    
                        //$('#addNew').modal('hide')
    
                        toast({
    
                            type: 'success',
    
                            title: 'Phone Created  successfully'
    
                        })
    
                        this.$Progress.finish();
    
                    })
    
                    .catch(() => {})
    
            },
    
    
    
            deleteCallTimes(phones) {
    
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
    
                        this.form.delete('/api/phones/' + extension).then(() => {
    
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