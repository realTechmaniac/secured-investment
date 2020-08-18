@extends('test.layouts.dashboardApp')


@section('content')

    <!-- ============================================================== -->
    @section('content')
            <div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                         <div class="row">
                                    <div class="col-md-6">
                                        <div class="card border border-primary">
                                            <div class="card-body">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <p class="font-weight-medium">Total GH</p>
                                                        <h4 class="mb-0">100,000 Naira</h4>
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
                                        <div class="card border border-primary">
                                            <div class="card-body">
                                                <div class="media">
                                                    <div class="media-body">
                                                        <p class="text-muted font-weight-medium">Reactivation fee</p>
                                                        <h4 class="mb-0">10,000 Naira</h4>
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

                        <div class="row">
                            <div class="col-lg-12 pt-5 pb-5">
                                <div class="card card-body pb-5">
                                    <h2 class=" mt-0 text-center">NOTICE !!!</h2>
                                    <p class="card-text text-center">Your Subscription has expired. Reactivation fee is <strong>only 10% of your total investment(get Help)</strong> in the last 30 days.Reactivate now to get access to our instant service.</p>

                                   
                                    <div class="text-center">
                                    	<button type="button"  class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target=".bs-example-modal-center">
                                            Reactivate
                                         </button>  
                                    </div>
                                     <div class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title mt-0">NOTICE !!!</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="text-center">
                                                                <div class="swal2-icon swal2-warning swal2-animate-warning-icon" style="display: flex;"></div>

                                                                <div class="swal2-header">
                                                                    <h5><strong>Are you sure you want to pay activation fee of 1,000 Naira to activate your account ? </strong></h5>
                                                                </div>
                                                                <div class = "swal2-content" style="display: block;">You won't be able to revert this!</div>
                                                                <div class="swal2-actions">
                                                                    <button type="button " class="swal2-confirm swal2-styled btn-success" style="display: inline-block;" aria-label="">Proceed</button>
                                                                    <button type="button" class="swal2-cancel swal2-styled btn-danger" style="display: inline-block;" aria-label="">Cancel</button>
                                                            </div>
                                                        </div><!-- /.modal-content -->
                                                    </div><!-- /.modal-dialog -->
                                                </div><!-- /.modal -->
                                            </div>
                                </div>
                            </div>   
                        </div>
                        <!-- end row -->
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
            <!-- Right bar overlay-->
            <div class="rightbar-overlay"></div>
            
            </div>

            </div> <!-- end slimscroll-menu-->
        </div>

       <!-- Right bar overlay-->

         <div class="rightbar-overlay"></div>
    @endsection
        <!-- /Right-bar -->

        















