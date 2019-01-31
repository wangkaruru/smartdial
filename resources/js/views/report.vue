<template>
<div class="container-fluid">
                        
                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                                <div class="page-title-box">
                                    <div class="page-title-right">
                                        
                                    </div>
                                    <h4 class="page-title">Server Stats and Reports</h4>
                                </div>
                            </div>
                        </div>     
                        <!-- end page title -->

                            <div class="card">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-sm-6">
                                                <h4 class="header-title">Real-Time Reports</h4>
                                               
                                                
                                                <p><u><router-link :to="{ name: 'reports.main-report' }">Real-Time Main Report</router-link></u></p>
                                                
                                                
                                                
                                                <p><u><router-link :to="{ name: 'reports.whiteboard' }">Real-Time Whiteboard Report</router-link></u></p>
                                                
                                            <br>

                                            
                                                <h4 class="header-title">Inbound and Outbound Calling Reports</h4>
                                                
                                                
                                                <p><u><router-link :to="{ name: 'reports.outbound' }">Outbound Calling Report</router-link></u></p>
                                                
                                                
                                                
                                                <p><u><router-link :to="{ name: 'reports.exportcall' }">Export Calls Report</router-link></u></p>
                                                
                                            </div>

                                            
    
                                            <div class="col-sm-6 m-t-sm-50">
                                               <h4 class="header-title">Agent Reports</h4>
                                             


                                             <p><u><router-link :to="{ name: 'reports.agenttime' }">Agent Time Detail</router-link></u><p>
                                                 
                                                    <p><u><router-link :to="{ name: 'reports.agentperformance' }">Agent Performance Detail</router-link></u></p>
                                                    <p><u><router-link :to="{ name: 'reports.teamperformance' }">Team Performance Detail</router-link></u></p>
                                                   
                                                    <p><u><router-link :to="{ name: 'reports.userstats' }">User Stats</router-link></u></p>
                                                    
                                                
                                            </div>
    
                                        </div>
                                        <!-- end row -->

                                    </div> <!-- end card-body-->
                                </div> <!-- end card -->
    </div>
</template>