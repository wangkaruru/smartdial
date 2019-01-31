<template>
    <!-- Start Content-->
    <div class="container-fluid">
        <!-- start page title -->
        <div class="row">
            <div class="col-12">
                <div class="page-title-box">
                    <h4 class="page-title">Presets</h4>
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
                                            <th>PRESETS</th>
                                            <th>ACTION</th>
                                            
                                        </tr>
                                        </thead>
                                        <tbody>
                                           <tr v-for="presets in presets.data">
                                           <td>{{ presets.campaign_id }}</td>
                                           <td>{{ campaignstatus.status_name }}</td>
                                           <td>{{ campaignstatus.status }}</td>
                                         <td>

                                                <a  data-toggle="dropdown"  aria-haspopup="false"
                                                    aria-expanded="false">
                                                    <div class="test" >
                                                            <div class="options" >
                                                                <a href="#" @click="editModal(campaignstatus)">Edit</a><br>
                                                                <a href="#" @click="deleteCampaignstatus(campaignstatus.status)">Delete</a>
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