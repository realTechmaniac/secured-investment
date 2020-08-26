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
                            <h4 class="mb-0 font-size-18">Provide Help</h4>
                        </div>
                    </div>
                </div>

                <!-- start page title -->
                <div class="row d-flex justify-content-center">
                    <div class="col-lg-6">
                        <div class="card border ">
                            <div class="card-header bg-transparent border-primary">
                                <h5 class="my-0 text-primary">Enter the
                                    amount you want to invest</h5>
                            </div>
                            <div class="card-body">
                                <form>
                                    <div class="form-group">
                                        <label for="exampleInputEmail1">Amount</label>
                                        <input type="number" class="form-control" id="exampleInputEmail1"
                                               aria-describedby="emailHelp" placeholder="Enter Amount">
                                    </div>
                                    <div class="my-4 text-center">
                                        <!-- Small modal -->
                                        <button type="button"
                                                class="btn btn-primary waves-effect waves-light font-weight-bold "
                                                data-toggle="modal" data-target=".bs-example-modal-center">Provide Help
                                        </button>
                                    </div>

                                    <div>
                                        <div class="modal fade bs-example-modal-center" tabindex="-1" role="dialog"
                                             aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title mt-0">Provide Help Confirmation</h5>
                                                        <button type="button" class="close" data-dismiss="modal"
                                                                aria-label="Close">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="text-center">
                                                            <div
                                                                class="swal2-icon swal2-warning swal2-animate-warning-icon"
                                                                style="display: flex;"></div>
                                                            <div class="swal2-header">
                                                                <h5><strong>Are you sure you want to Provide Help of
                                                                        <b class="text-danger">60,000</b> to get
                                                                        <b class="text-primary">90,000</b> after 4days? </strong></h5>
                                                            </div>
                                                            <div class="swal2-content" style="display: block;">You won't
                                                                be able to revert this!
                                                            </div>
                                                            <div class="swal2-actions">
                                                                <button type="button"
                                                                        class="swal2-cancel swal2-styled btn-danger"
                                                                        style="display: inline-block;" data-dismiss="modal">
                                                                    No, Close
                                                                </button>
                                                                <button type="button "
                                                                        class="swal2-confirm swal2-styled btn-success"
                                                                        style="display: inline-block;" aria-label="">
                                                                    Yes, Proceed
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div><!-- /.modal-content -->
                                            </div><!-- /.modal-dialog -->
                                        </div><!-- /.modal -->
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- end modal -->

                <footer class="footer">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-sm-6">
                                <script>document.write(new Date().getFullYear())</script>
                                © SecuredInvestment.
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
                <hr class="mt-0"/>
                <h6 class="text-center mb-0">Choose Layouts</h6>

                <div class="p-4">
                    <div class="mb-2">
                        <img src="assets/images/layouts/layout-1.jpg" class="img-fluid img-thumbnail" alt="">
                    </div>
                    <div class="custom-control custom-switch mb-3">
                        <input type="checkbox" class="custom-control-input theme-choice" id="light-mode-switch"
                               checked/>
                        <label class="custom-control-label" for="light-mode-switch">Light Mode</label>
                    </div>

                    <div class="mb-2">
                        <img src="assets/images/layouts/layout-2.jpg" class="img-fluid img-thumbnail" alt="">
                    </div>
                    <div class="custom-control custom-switch mb-3">
                        <input type="checkbox" class="custom-control-input theme-choice" id="dark-mode-switch"
                               data-bsStyle="assets/css/bootstrap-dark.min.css"
                               data-appStyle="assets/css/app-dark.min.css"/>
                        <label class="custom-control-label" for="dark-mode-switch">Dark Mode</label>
                    </div>

                    <div class="mb-2">
                        <img src="assets/images/layouts/layout-3.jpg" class="img-fluid img-thumbnail" alt="">
                    </div>
                    <div class="custom-control custom-switch mb-5">
                        <input type="checkbox" class="custom-control-input theme-choice" id="rtl-mode-switch"
                               data-appStyle="assets/css/app-rtl.min.css"/>
                        <label class="custom-control-label" for="rtl-mode-switch">RTL Mode</label>
                    </div>


                </div>

            </div> <!-- end slimscroll-menu-->
        </div>

        <!-- Right bar overlay-->

        <div class="rightbar-overlay"></div>
    @endsection
    <!-- /Right-bar -->

    </div>
