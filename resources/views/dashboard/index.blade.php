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

                                    <div class="page-title-right">
                                        <ol class="breadcrumb m-0">
                                            <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboards</a></li>
                                            <li class="breadcrumb-item active">Dashboard</li>
                                        </ol>
                                    </div>

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
                                                    <p>Ayomide Adebayo</p>
                                                </div>
                                            </div>
                                            <div class="col-5 align-self-end">
                                                <img src="assets/images/profile-img.png" alt="" class="img-fluid">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-body pt-0">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="avatar-md profile-user-wid mb-4">
                                                    <img src="assets/images/users/avatar-1.jpg" alt="" class="img-thumbnail rounded-circle">
                                                </div>
                                                
                                            </div>

                                            <div class="col-sm-8">
                                                <div class="pt-4">

                                                    <div class="row">
                                                        <div class="col-6">
                                                            <button type="button" class="btn btn-primary waves-effect waves-light font-weight-bold">Provide Help (PH)</button>
                                                        </div>
                                                        <div class="col-6">
                                                            <button type="button" class="btn btn-success waves-effect waves-light font-weight-bold">Get Help (GH)</button>
                                                        </div>
                                                    </div>
                                                    <div class="mt-4">
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">

                                    <div class="col-m">
                                        
                                    </div>
                                    
                                </div>
                            </div>
                            <div class="col-xl-8">
                                <div class="row">
                                    <div class="col-md-4">
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
                                    <div class="col-md-4">
                                        <div class="card mini-stats-wid">
                                            <div class="card-body">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <p class="text-muted font-weight-medium">Total Investment</p>
                                                        <h4 class="mb-0">$35,000</h4>
                                                    </div>

                                                    <div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                                                        <span class="avatar-title rounded-circle bg-primary">
                                                            <i class="bx bx-archive-in font-size-24"></i>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="card mini-stats-wid">
                                            <div class="card-body">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <p class="text-muted font-weight-medium">Total Withdrawal</p>
                                                        <h4 class="mb-0">$10,000</h4>
                                                    </div>

                                                    <div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                                                        <span class="avatar-title rounded-circle bg-primary">
                                                            <i class="bx bx-purchase-tag-alt font-size-24"></i>
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
                                            <div class="table-responsive mb-0" data-pattern="priority-columns">
                                                <table id="tech-companies-1" class="table table-striped">
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
                                                        <a href=""><i class="bx bx-file"></i></a>
                                                        </td>    
                                                    </tr>
                                                    <tr>
                                                        <th>Femi Adebayo</th>
                                                        <td>First Bank</td>
                                                        <td>2090556730</td>
                                                        <td>Fixed</td>
                                                        <td>09045656787</td>
                                                        <td>
                                                        <a href=""><i class="bx bx-file"></i></a>
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
                                        <p class="card-text pb-c">Your Account will be suspended if you do not make payment before PH duration expires and reactivation of suspended account cost 3000 Naira</p>
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


                        <div class="row">    
                         <div class="col-lg-12">
                        <div class="card">            
                         <div class="card-body">
                        <h4 class="card-title mb-4">Latest Transaction</h4>
                        <div class="table-responsive">
                        <table class="table table-centered table-nowrap mb-0">
                        <thead class="thead-light">     <tr>         <th
                        style="width: 20px;">             <div class="custom-
                        control custom-checkbox">                 <input
                        type="checkbox" class="custom-control-input"
                        id="customCheck1">                 <label class
                        ="custom-control-label"
                        for="customCheck1">&nbsp;</label>             

                        </div>
                            </th>         
                            <th>Date</th>         
                            <th>Time</th>
                            <th>Transaction Status</th>         
                            <th>Transaction Type</th>         
                            <th>From/To</th>         
                            <th>Receipt</th>
                            <th>Action</th>     
                            </tr> </thead> 
                            <tbody>     
                            <tr>
                        <td>     

                            <div class="custom-control custom-
                        checkbox">                 

                        <input type="checkbox"
                        class="custom-control-input" id="customCheck2">
                        <label class="custom-control-label"
                        for="customCheck2">&nbsp;</label>                    
                        </div>
                        </td>
                                                        
                                                        <td>
                                                            07 Oct, 2019
                                                        </td>
                                                        <td>
                                                            8:00 a.m
                                                        </td>
                                                        <td>
                                                            <span class="badge badge-pill badge-soft-success font-size-12">Pending</span>
                                                        </td>
                                                        <td>
                                                            <i class=""></i> PH
                                                        </td>
                                                        <td>
                                                            <p>Sola Poju</p>
                                                        </td>
                                                        <td>
                                                        <a href=""><i class="bx bx-file"></i></a>
                                                        </td>
                                                        <td>
                                                            <!-- Button trigger modal -->
                                                            <button type="button" class="btn btn-primary btn-sm btn-rounded waves-effect waves-light" data-toggle="modal" data-target=".exampleModal">
                                                                Confirm
                                                            </button>
                                                            <button type="button" class="btn btn-danger btn-sm btn-rounded waves-effect waves-light" data-toggle="modal" data-target=".exampleModal">
                                                                Report
                                                            </button>

                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="customCheck3">
                                                                <label class="custom-control-label" for="customCheck3">&nbsp;</label>
                                                            </div>
                                                        </td>
                                                        
                                                        <td>
                                                            07 Oct, 2019
                                                        </td>
                                                        <td>
                                                            10:00a.m
                                                        </td>
                                                        <td>
                                                            <span class="badge badge-pill badge-soft-danger font-size-12">completed</span>
                                                        </td>
                                                        <td>
                                                            <i class=""></i> GH
                                                        </td>
                                                        <td>
                                                            <p>Sola Ayodele</p>
                                                        </td>
                                                        <td>
                                                        <a href=""><i class="bx bx-file"></i></a>
                                                        </td>
                                                        <td>
                                                             <!-- Button trigger modal -->
                                                            <button type="button" class="btn btn-primary btn-sm btn-rounded waves-effect waves-light" data-toggle="modal" data-target=".exampleModal">
                                                                Confirm
                                                            </button>
                                                            <button type="button" class="btn btn-danger btn-sm btn-rounded waves-effect waves-light" data-toggle="modal" data-target=".exampleModal">
                                                                Report
                                                        </td>
                                                    </tr>

                                                    <tr>
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="customCheck4">
                                                                <label class="custom-control-label" for="customCheck4">&nbsp;</label>
                                                            </div>
                                                        </td>
                                                    
                                                        <td>
                                                            06 Oct, 2019
                                                        </td>
                                                        <td>
                                                            12:00PM
                                                        </td>
                                                        <td>
                                                            <span class="badge badge-pill badge-soft-success font-size-12">Pending</span>
                                                        </td>
                                                        <td>
                                                            <i class=""></i> PH
                                                        </td>
                                                        <td>
                                                            <p>Ayomide Adebayo</p>
                                                        </td>
                                                        <td>
                                                        <a href=""><i class="bx bx-file"></i></a>
                                                         </td>
                                                        <td>
                                                            <!-- Button trigger modal -->
                                                            <button type="button" class="btn btn-primary btn-sm btn-rounded waves-effect waves-light" data-toggle="modal" data-target=".exampleModal">
                                                                Confirm
                                                            </button>
                                                            <button type="button" class="btn btn-danger btn-sm btn-rounded waves-effect waves-light" data-toggle="modal" data-target=".exampleModal">
                                                                Report
                                                        </td>
                                                    </tr>
                                                    
                                                        <td>
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="customCheck6">
                                                                <label class="custom-control-label" for="customCheck6">&nbsp;</label>
                                                            </div>
                                                        </td>
                                                        
                                                        <td>
                                                            04 Oct, 2019
                                                        </td>
                                                        <td>
                                                            $404
                                                        </td>
                                                        <td>
                                                            <span class="badge badge-pill badge-soft-warning font-size-12">Pending</span>
                                                        </td>
                                                        <td>
                                                            <i class=""></i>GH
                                                        </td>
                                                        <td>
                                                            <p>Fola Ayodele</p>
                                                        </td>
                                                        <td>
                                                        <a href=""><i class="bx bx-file"></i></a>
                                                        </td>
                                                        <td>
                                                             <!-- Button trigger modal -->
                                                            <button type="button" class="btn btn-primary btn-sm btn-rounded waves-effect waves-light" data-toggle="modal" data-target=".exampleModal">
                                                                Confirm
                                                            </button>
                                                            <button type="button" class="btn btn-danger btn-sm btn-rounded waves-effect waves-light" data-toggle="modal" data-target=".exampleModal">
                                                                Report
                                                        </td>
                                                    </tr>
                                                   
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end modal -->

                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <script>document.write(new Date().getFullYear())</script> © Skote.
                            </div>
                            <div class="col-sm-6">
                                <div class="text-sm-right d-none d-sm-block">
                                    Design & Develop by Themesbrand
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
    @endsection
        <!-- /Right-bar -->

        