@extends('test.layouts.dashboardApp')

            <!-- ============================================================== -->
            <!-- Start right Content here -->
            <!-- ============================================================== -->
    @section('content')
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                        <!-- start page title -->
                        <div class="row">
                            <div class="col-12">
                             <div class="page-title-box d-flex align-items-center justify-content-between">
                                    <h4 class="mb-0 font-size-18">Dashboard</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end Topic JUMBOTROM title -->
                        <div class="jumbotron jumbotron-fluid">
                          <div class="">
                            <h1 class="text-center text-primary">Transactions</h1>
                            <p class="lead text-center">Below are the various transactions made on this platform based on your investment activities.</p>
                          </div>
                        </div>
                
 
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
    
                                        <h4 class="card-title">User Transactions</h4>
                                        <p class="card-title-desc">
                                        </p>
        
                                        <div class="table-rep-plugin">
                                            <div class=" mb-0" data-pattern="priority-columns">
                                                
                                        <table id="datatable-buttons" class="table table-striped table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                    <thead>
                                                    <tr>
                                                        <th>Date</th>
                                                        <th data-priority="1">Time</th>
                                                        <th data-priority="3">Transaction Status</th>
                                                        <th data-priority="1">Transaction Type</th>
                                                        <th data-priority="3">From/To</th>
                                                        <th data-priority="3">Receipt</th>
                                                        <th data-priority="3">Action</th>
                                                        
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <th> 07 Oct, 2019</th>
                                                        <td>8:00 a.m</td>
                                                        <td><span class="badge badge-primary">Completed</span></td>
                                                        <td>GH</td>
                                                        <td>Ayomide Adebayo</td>
                                                        <td>
                                                        <a href=""><i class="bx bx-file bx-sm"></i></a>
                                                        </td>
                                                        <td>
                                                             <!-- Button trigger modal -->
                                                            <button type="button" class="btn btn-primary btn-sm btn-rounded waves-effect waves-light p-1 m-1" data-toggle="modal" data-target=".exampleModal">
                                                                Confirm
                                                            </button>
                                                            <button type="button" class="btn btn-danger btn-sm btn-rounded waves-effect waves-light p-1 m-1" data-toggle="modal" data-target=".exampleModal">
                                                                Report
                                                        </td>      
                                                    </tr>
                                                    <tr>
                                                         <th> 07 May, 2019</th>
                                                        <td>9:00 a.m</td>
                                                        <td><span class="badge badge-danger">Pending</span></td>
                                                        <td>PH</td>
                                                        <td>Sola Adebayo</td>
                                                        <td>
                                                        <a href=""><i class="bx bx-file bx-sm"></i></a>
                                                        </td>
                                                        <td>
                                                             <!-- Button trigger modal -->
                                                            <button type="button" class="btn btn-primary btn-sm btn-rounded waves-effect waves-light p-1 m-1" data-toggle="modal" data-target=".exampleModal">
                                                                Confirm
                                                            </button>
                                                            <button type="button" class="btn btn-danger btn-sm btn-rounded waves-effect waves-light p-1 m-1" data-toggle="modal" data-target=".exampleModal">
                                                                Report
                                                        </td>  
                                                    </tr>
                                                 </tbody>
                                                </table>
                                            </div>
        
                                        </div>
        
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->

                                </div>
                            </div>
                            
                        </div>
                    </div>
                </div>
                <!-- end modal -->

                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <script>document.write(new Date().getFullYear())</script> © SecuredInvestment.
                            </div>
                            <div class="col-sm-6">
                                <div class="text-sm-right d-none d-sm-block">
                                    
                                </div>
                            </div>
                        </div>
                    </div>
                </footer>
            </div>
            <!-- end main content-->

       
        <!-- END layout-wrapper -->

        <!-- Right Sidebar -->
        <div class="right-bar">
            <div data-simplebar class="h-100">
                <div class="rightbar-title px-3 py-4">
                    <a href="javascript:void(0);" class="right-bar-toggle float-right">
                        <i class="mdi mdi-close noti-icon"></i>
                    </a>
                    <h5 class="m-0">Settings</h5>
                </div>

                <!-- Settings -->
                <hr class="mt-0" />
                <h6 class="text-center mb-0">Choose Layouts</h6>

                <div class="p-4">
                    <div class="mb-2">
                        <img src="assets/images/layouts/layout-1.jpg" class="img-fluid img-thumbnail" alt="">
                    </div>
                    <div class="custom-control custom-switch mb-3">
                        <input type="checkbox" class="custom-control-input theme-choice" id="light-mode-switch" checked />
                        <label class="custom-control-label" for="light-mode-switch">Light Mode</label>
                    </div>
    
                    <div class="mb-2">
                        <img src="assets/images/layouts/layout-2.jpg" class="img-fluid img-thumbnail" alt="">
                    </div>
                    <div class="custom-control custom-switch mb-3">
                        <input type="checkbox" class="custom-control-input theme-choice" id="dark-mode-switch" data-bsStyle="assets/css/bootstrap-dark.min.css" data-appStyle="assets/css/app-dark.min.css" />
                        <label class="custom-control-label" for="dark-mode-switch">Dark Mode</label>
                    </div>
    
                    <div class="mb-2">
                        <img src="assets/images/layouts/layout-3.jpg" class="img-fluid img-thumbnail" alt="">
                    </div>
                    <div class="custom-control custom-switch mb-5">
                        <input type="checkbox" class="custom-control-input theme-choice" id="rtl-mode-switch" data-appStyle="assets/css/app-rtl.min.css" />
                        <label class="custom-control-label" for="rtl-mode-switch">RTL Mode</label>
                    </div>

            
                </div>

            </div> <!-- end slimscroll-menu-->
        </div>

        <!-- Right bar overlay-->

        <div class="rightbar-overlay"></div>
    @endsection
        <!-- /Right-bar -->

