@extends('test.layouts.adminApp')

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
                                    <h4 class="mb-0 font-size-18">Admin Dashboard</h4>
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-xl-4">
                                <div class="card overflow-hidden">
                                    <div class="bg-soft-primary">
                                        <div class="row">
                                            <div class="col-7">
                                                <div class="text-primary p-3">
                                                    <h5 class="text-primary">Welcome Back !</h5>
                                                    <p>Admin</p>
                                                </div>
                                            </div>
                                            <div class="col-5 align-self-end">
                                                <img src="assets/images/profile-img.png" alt="" class="img-fluid">
                                            </div>  
                                        </div>
                                    </div>
                                    <div class="card-body pt-0">
                                <div class="row">
                                    <div class="col-sm-6">
                                        <div class="pt-1">

                                            <div class="row">
                                                
                                                <div class="col">
                                        <div class="my-4 text-center">
                                            <!-- Small modal -->
                                           <button type="button" class="btn btn-primary waves-effect waves-light btn-block" data-toggle="modal" data-target=".bs-example-modal-center">Provide Help</button>
                                        </div>

                                        <div class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title mt-0">Provide Help</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="text-center">
                                                            <div class="swal2-icon swal2-warning swal2-animate-warning-icon" style="display: flex;"></div>
                                                            <div class="swal2-header">
                                                                <h5><strong>Are you sure you want to Provide Help? </strong></h5>
                                                            </div>
                                                            <div class = "swal2-content" style="display: block;">You won't be able to revert this!</div>
                                                            <div class="swal2-actions">
                                                                <button type="button" class="swal2-confirm btn btn-success m-3" aria-label="" style="display: inline-block;">Yes, Proceed!</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->
                                    </div>

                                </div>
                                    
                                </div>
                            </div>

                                <div class="col-sm-6">
                                        <div class="pt-1">

                                            <div class="row">
                                                
                                                <div class="col">
                                                    <!-- <button type="button" class="btn btn-success btn-block waves-effect waves-light font-weight-bold btn-block">Get Help</button> -->
                                                    <div class="my-4 text-center">
                                    <!-- Small modal -->
                                    <button type="button" class="btn btn-success btn-block waves-effect waves-light font-weight-bold btn-block">Get Help</button>
                                </div>

                            <div class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title mt-0">Center modal</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <p>Cras mattis consectetur purus sit amet fermentum.
                                                    Cras justo odio, dapibus ac facilisis in,
                                                    egestas eget quam. Morbi leo risus, porta ac
                                                    consectetur ac, vestibulum at eros.</p>
                                                <p>Praesent commodo cursus magna, vel scelerisque
                                                    nisl consectetur et. Vivamus sagittis lacus vel
                                                    augue laoreet rutrum faucibus dolor auctor.</p>
                                                <p class="mb-0">Aenean lacinia bibendum nulla sed consectetur.
                                                    Praesent commodo cursus magna, vel scelerisque
                                                    nisl consectetur et. Donec sed odio dui. Donec
                                                    ullamcorper nulla non metus auctor
                                                    fringilla.</p>
                                            </div>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div><!-- /.modal -->
                                                </div>
                                            </div>
                                            <div class="mt-4">
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                    </div>
                            <div class="col-xl-8">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="card mini-stats-wid">
                                            <div class="card-body">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <p class="text-muted font-weight-medium">Total Referral Balance</p>
                                                        <h4 class="mb-0">$50,000</h4>
                                                    </div>

                                                    <div class="mini-stat-icon avatar-sm rounded-circle bg-primary align-self-center">
                                                        <span class="avatar-title">
                                                            <i class="bx bx-copy-alt font-size-24"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="card mini-stats-wid">
                                            <div class="card-body">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <p class="text-muted font-weight-medium">New Messages</p>
                                                        <h4 class="mb-0">10</h4>
                                                    </div>

                                                    <div class="mini-stat-icon avatar-sm rounded-circle bg-primary align-self-center">
                                                        <span class="avatar-title">
                                                            <i class="bx bx-message-dots font-size-24"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <!-- end row -->

                                <div class="card">
                                    <div class="alert alert-info mb-0 font-weight-bold alert-dismissible" role="alert">
                                            Your Subscription expires on the 25th of August at 5:00pm
                                     </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
        
                                        <h4 class="card-title">Congratulations!!!</h4>
                                        <p class="card-title-desc">You have been merged to pay the following users on 14, August 2020 at 4:30pm
                                        </p>
        
                                        <div class="table-rep-plugin">
                                            <div class="mb-0" data-pattern="priority-columns">
                                               
                                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                    <thead>
                                                    <tr>
                                                        <th>Name</th>
                                                        <th data-priority="1">Bank Name</th>
                                                        <th data-priority="3">Account No</th>
                                                        <th data-priority="1">Account Type</th>
                                                        <th data-priority="3">Phone Number</th>
                                                        <th data-priority="3">Proof of Payment</th>
                                                        
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    <tr>
                                                        <th>Ayomide Adebayo</th>
                                                        <td>UBA</td>
                                                        <td>2090556730</td>
                                                        <td>Savings</td>
                                                        <td>09045656787</td>
                                                        <td>
                                                        <a href=""><i class="bx bx-file bx-sm"></i></a>
                                                        </td>    
                                                    </tr>
                                                    <tr>
                                                        <th>Femi Adebayo</th>
                                                        <td>First Bank</td>
                                                        <td>2090556730</td>
                                                        <td>Fixed</td>
                                                        <td>09045656787</td>
                                                        <td>
                                                        <a href=""><i class="bx bx-file bx-sm"></i></a>
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
                       
                        <!-- end row -->  
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="card bg-primary text-white-50">
                                    <div class="card-body">
                                        <h5 class="mt-0 mb-4 text-white"><i class="mdi mdi-bullseye-arrow mr-3"></i>NOTICE!!</h5>
                                        <p class="card-text pb-3">Your Account will be suspended if you do not make payment before PH duration expires and reactivation of suspended account cost 3000 Naira</p>
                                    </div>
                                </div>
                            </div>
        
                            <div class="col-lg-4">
                                <div class="card bg-danger text-white-50">
                                    <div class="card-body">
                                        <h5 class="mt-0 mb-4 text-white"><i class="mdi mdi-alert-circle-outline mr-3"></i>IMPORTANT INFO <i class="dripicons-alarm"></i></h5>
                                        <div class="row">
                                            <div class="col">
                                                <p>Provide Help request expires:</p>
                                            </div>

                                            <div class="col">
                                                <h4 class="text-white">5 hours 30 minutes</h4>
                                            </div>
                                        </div>     
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- end row -->


 <!-- end row -->
                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
        
                                        <h4 class="card-title">Latest Transactions</h4>
                                        <p class="card-title-desc">Below are your last five transactions you can check the transactions page to see more.
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

        </div>
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

