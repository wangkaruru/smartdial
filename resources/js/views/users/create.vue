<template>
 <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        
                                    </div>
                                    <h4 class="page-title">User Form</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="header-title">User Form</h4>
                                        

                                        <form @submit.prevent="createUser()">
                                            <div class="form-row">
                                                <label for="inputPassword4" class="col-form-label">User</label>
                                                <vue-password size="15"  auto="true"  class=""></vue-password>

                                               
                                            </div>


                                             <div class="form-group">
                                                    <label for="inputPassword4" class="col-form-label">Password</label>
                                                    <input v-model="form.pass" type="password" name="pass" placeholder="password"
                                                    class="form-control" >
                                                </div>
                                            
                                            <div class="form-group">
                                                <label for="inputAddress" class="col-form-label">Fullname</label>
                                                <input v-model="form.full_name" type="text" name="full_name" placeholder="Fullname"
                                                  class="form-control" >
                                            </div>

                                            

                                            <div class="form-row">
                                                <div class="form-group col-md-6">
                                                    <label for="inputCity" class="col-form-label">Phone Login</label>
                                                    <input v-model="form.phone_login" name="phone_login"  type="text" class="form-control" placeholder="phone login" >
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="inputCity" class="col-form-label">Phone Password</label>
                                                    <input type="password" v-model="form.phone_pass" name="phone_pass" class="form-control" placeholder="phone password">
                                                </div>


                                                 <div class="form-group col-md-4">
                                                    <label for="inputState" class="col-form-label"> User Group</label>
                                                    <select name="user_group" v-model="form.user_group" id="user_group" class="form-control">
                                                
                                                            <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3"> 3</option>
                                                </select>
                                                    </div>

                                                
                                                 <div class="form-group col-md-4">
                                                    <label for="inputState" class="col-form-label">User level</label>
                                                    <select id="user_level" v-model="form.user_level" name="user_level" class="form-control">
                                                    
                                                        <option value="1">1</option>
                                                        <option value="2">2</option>
                                                        <option value="3">3</option>
                                                        <option value="4">4</option>
                                                        <option value="5">5</option>
                                                        <option value="6">6</option>
                                                        <option value="7">7</option>
                                                        <option value="8">8</option>
                                                        <option value="9">9</option>
                                                    </select>
                                                </div>
                                                
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
    return{   
        users: {},
            //numero: this.value,
        user: this.value,
                
        form: new Form({
        user_id:'',
        user:'',
        //user: this.value,
        pass:'',
        full_name: '',             
        user_level: '',
        user_group: '',
        phone_login:'',
        phone_pass:''
        
        }) }
  },
                
         created() {
            this.getUsers();
        },

        // mounted () {
        //     setInterval(() => {
        //         let message = this.rndStr(7)
            
        //         this.message = message
        //     }, 3000)
        // },

        methods: {
            getUsers(page) {
                if (typeof page === 'undefined') {
                    page = 1;
                }
                axios.get('/api/users?page=' + page)
                    .then(response => this.users = response.data);
                     //$('#loader').success('hide')
            },
    //         rndStr(len) {
    // 	let text = " "
    // 	let chars = "abcdefghijklmnopqrstuvwxyz1234567890"
    
    //   for( let i=0; i < len; i++ ) {
	// 			text += chars.charAt(Math.floor(Math.random() * chars.length))
    //   }

	// 		return text
	// 	},
            updateUser(){
                //this.$Progress.start();
                // console.log('Editing data');
                //alert(id);
                this.form.put('api/users/'+this.form.user_id)
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
                    this.$Progress.fail();
                });
            },
            
            editModal(user){
                this.editmode = true;
                this.form.reset();
                $('#addNew').modal('show');
                this.form.fill(user);
            },
            newModal(){
                this.editmode = false;
                this.form.reset();
                $('#addNew').modal('show');
            },
            deleteUser(user_id){
                swal({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                    }).then((result) => {
                        //alert(user_id);
                        // Send request to the server
                         
                              this.form.delete('api/users/'+user_id).then(()=>{
                                   //alert(id);
                                        swal(
                                        'Deleted!',
                                        'Your file has been deleted.',
                                        'success'
                                        )
                                    Fire.$emit('AfterCreate');
                                });
                        
                    })
            },
            createUser(){
                //this.$Progress.start();
                this.form.post('/api/users')
                .then(()=>{
                    Fire.$emit('AfterCreate');
                    //$('#addNew').modal('hide')
                    toast({
                        type: 'success',
                        title: 'User Created in successfully'
                        })
                    this.$Progress.finish();
                })
                .catch(()=>{
                })
            },
            
            say: function (message) {
            alert(message)
                }
        },
        
        
        
    }
       
</script>
