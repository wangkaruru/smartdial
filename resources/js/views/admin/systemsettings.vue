<template>
    <!-- Start Content-->
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">System Settings</h4>
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
                                    <form @submit.prevent="editMode ? updateVlist():createVlist()">
    
                        <div class="modal-body">
    
    
    
                            <div class="form-row">
    
                                <div class="form-group col-md-4">
    
                                    <label for="inputState" class="col-form-label">Version</label>
    
                                    <input type="text" v-model="form.vcl_id" name="vlc_id" class="form-control">
    
    
    
                                </div>
    
    
    
                                <div class="form-group col-md-4">
    
                                    <label for="inputState" class="col-form-label">SVN Version</label>
    
                                    <input type="text" v-model="form.vcl_name" name="vcl_name" class="form-control">
    
    
    
                                </div>
    
    
    
                                <div class="form-group col-md-4">
    
                                    <label for="inputState" class="col-form-label">DB Schema Version</label>
                                    <input type="text" v-model="form.vcl_name" name="vcl_name" class="form-control">
                                    
    
                                </div>

                                   <div class="form-group col-md-4">
    
                                    <label for="inputState" class="col-form-label">DB Schema Update Date</label>
    
                                    <input type="text" v-model="form.vcl_id" name="vlc_id" class="form-control">
    
    
    
                                </div>
    
    
    
                                <div class="form-group col-md-4">
    
                                    <label for="inputState" class="col-form-label">Password Encryption</label>
    
                                    <input type="text" v-model="form.vcl_name" name="vcl_name" class="form-control">
    
    
    
                                </div>
    
    
    
                                <div class="form-group col-md-4">
    
                                    <label for="inputState" class="col-form-label">Auto User-add Value</label>
                                    <input type="text" v-model="form.vcl_name" name="vcl_name" class="form-control">
                                    
    
                                </div>

                                
                                <div class="form-group col-md-4">
    
                                    <label for="inputState" class="col-form-label">Recording Prompt Count</label>
    
                                    <input type="text" v-model="form.vcl_name" name="vcl_name" class="form-control">
    
    
    
                                </div>
    
    
    
                                <div class="form-group col-md-4">
    
                                    <label for="inputState" class="col-form-label">Install Date</label>
                                    <input type="text" v-model="form.vcl_name" name="vcl_name" class="form-control">
                                    
    
                                </div>

                                <div class="form-group col-md-4">
    
                                    <label for="inputState" class="col-form-label">Phone Codes </label>
                                    <input type="text" v-model="form.vcl_name" name="vcl_name" class="form-control">
                                    
    
                                </div>

                                <div class="form-group col-md-4">
    
                                    <label for="inputState" class="col-form-label"> Today's System Stats</label>
                                    <input type="text" v-model="form.vcl_name" name="vcl_name" class="form-control">
                                    
    
                                </div>

                                <div class="form-group col-md-4">
    
                                    <label for="inputState" class="col-form-label"> Use Non-Latin</label>
                                     <select id="mix_method" v-model="form.mix_method" name="mix_method" class="form-control">
    
                                                                 <option value="1">Yes</option>
    
                                                                 <option value="0">No</option>
    
    
                                                        </select>
                                </div>

                                <div class="form-group col-md-4">
    
                                    <label for="inputState" class="col-form-label">Enable Languages</label>
                                     <select id="mix_method" v-model="form.mix_method" name="mix_method" class="form-control">
    
                                                                 <option value="1">Yes</option>
    
                                                                 <option value="0">No</option>
    
    
                                                        </select>
                                </div>

                                <div class="form-group col-md-4">
    
                                    <label for="inputState" class="col-form-label"> </label>
                                    <input type="text" v-model="form.vcl_name" name="vcl_name" class="form-control">
                                    
    
                                </div>

                                <div class="form-group col-md-4">
    
                                    <label for="inputState" class="col-form-label"> </label>
                                    <input type="text" v-model="form.vcl_name" name="vcl_name" class="form-control">
                                    
    
                                </div>

                                
    
                            </div>
    
    
    
                            <div class="modal-footer">
    
                                <button type="submit" v-show="!editMode" class="btn btn-primary">Submit</button>
    
                                <button type="submit" v-show="editMode" class="btn btn-primary">Submit</button>
    
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
    
                            </div>
    
                        </div>
    
                    </form>
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
       data() {
    
            return {
    
                //vlist: {},
    
                editmode: false,
    
                form: new Form({
    
                   
    
    
    
    
                })
    
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