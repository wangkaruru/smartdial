<template>
 <!-- Start Content-->
                    <div class="container-fluid">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        
                                    </div>
                                    <h4 class="page-title">Real-Time Whiteboard Report</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title --> 

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        

                                        <form >
                                         <div class="form-row">
                                                <div class="form-group col-md-4">
                                                    <label for="inputEmail4" class="col-form-label">Report Type</label>
                                                    <select class="form-control" id="example-select">
                                                            <option>1</option>
                                                            <option>2</option>
                                                            <option>3</option>
                                                            <option>4</option>
                                                            <option>5</option>
                                                        </select>
                                                    
                                                </div>
                                                <div class="form-group col-md-4">
                                                    <label for="inputPassword4" class="col-form-label">Campaigns</label>
                                                    <select id="example-multiselect" multiple class="form-control">
                                                            <option>1</option>
                                                            <option>2</option>
                                                            <option>3</option>
                                                            <option>4</option>
                                                            <option>5</option>
                                                        </select>
                                                </div>
                                                <div class="form-group col-md-4">
                                                <label for="inputAddress" class="col-form-label">Status Flags</label>
                                                 <select id="example-multiselect" multiple class="form-control">
                                                            <option>1</option>
                                                            <option>2</option>
                                                            <option>3</option>
                                                            <option>4</option>
                                                            <option>5</option>
                                                        </select>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="inputAddress" class="col-form-label">User Groups</label>
                                                 <select id="example-multiselect" multiple class="form-control">
                                                            <option>1</option>
                                                            <option>2</option>
                                                            <option>3</option>
                                                            <option>4</option>
                                                            <option>5</option>
                                                        </select>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="inputAddress" class="col-form-label">Users</label>
                                                 <select id="example-multiselect" multiple class="form-control">
                                                            <option>1</option>
                                                            <option>2</option>
                                                            <option>3</option>
                                                            <option>4</option>
                                                            <option>5</option>
                                                        </select>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="inputAddress" class="col-form-label">Start Date Time</label>
                                                <input type="text" class="form-control date" id="birthdatepicker" data-toggle="date-picker" data-single-date-picker="true">
                                                <br>
                                                <input type="text"  class="form-control">
                                            </div>
                                            <div class="form-group col-md-4">
                                                <label for="inputAddress" class="col-form-label">Ingroups</label>
                                                 <select id="example-multiselect" multiple class="form-control">
                                                            <option>1</option>
                                                            <option>2</option>
                                                            <option>3</option>
                                                            <option>4</option>
                                                            <option>5</option>
                                                        </select>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="inputAddress" class="col-form-label">DIDs</label>
                                                 <select id="example-multiselect" multiple class="form-control">
                                                            <option>1</option>
                                                            <option>2</option>
                                                            <option>3</option>
                                                            <option>4</option>
                                                            <option>5</option>
                                                        </select>
                                            </div>

                                            <div class="form-group col-md-4">
                                                <label for="inputAddress" class="col-form-label">Target Per Unit</label>
                                                <input type="text" class="form-control date" id="birthdatepicker" data-toggle="date-picker" data-single-date-picker="true">
                                                
                                                <label for="inputAddress" class="col-form-label">Target gross sales</label>
                                                <input type="text"  class="form-control">
                                            </div>
                                         </div>
                                         
                                            <button type="submit" class="btn btn-success">RUN REPORT</button>
                                            <button type="submit" class="btn btn-danger">REPORTS</button>

                                        </form>

                                    </div> <!-- end card-body -->
                                </div> <!-- end card-->
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->
                        </div>
</template>
<script>
 
</script>