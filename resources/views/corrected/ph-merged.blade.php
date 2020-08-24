@extends('test.layouts.dashboardApp')

<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
@section('content')
    <div class="main-content">

        <div class="page-content">
            <div class="container-fluid">

                {{--Top Dashboard--}}
                <div class="top-main-dashboard">
                    <div class="row">
                        <div class="col-12">
                            <div class="page-title-box d-flex align-items-center justify-content-between">
                                <h4 class="mb-0 font-size-18">Dashboard</h4>
                            </div>
                        </div>
                    </div>
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
                                    </div>
                                </div>
                                <div class="card-body pt-0">
                                    <div class="row">
                                        <div class="col-sm-6">
                                            <div class="row">
                                                <div class="col">
                                                    <div class="my-4 text-center">
                                                        <!-- Small modal -->
                                                        <button type="button"
                                                                style="padding-top: 20px; padding-bottom: 20px;"
                                                                class="btn btn-primary btn-block waves-effect waves-light font-weight-bold btn-block">
                                                            Provide Help
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-6">
                                            <div class="row">
                                                <div class="col">
                                                    <div class="my-4 text-center">
                                                        <!-- Small modal -->
                                                        <button type="button"
                                                                style="padding-top: 20px; padding-bottom: 20px;"
                                                                class="btn btn-success btn-block waves-effect waves-light font-weight-bold btn-block">
                                                            Get Help
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-8">
                            {{--Subcription Notice--}}
                            <div class="card">
                                <div class="alert alert-success mb-0 font-weight-bold alert-dismissible" role="alert">
                                    Your Subscription expires on the 25th of August at 5:00pm
                                </div>
                            </div>
                            {{--Guilder Notice--}}
                            <div class="card">
                                <div class="alert alert-info mb-0 font-weight-bold alert-dismissible" role="alert">
                                    You will automatically become a guilder when you refer 25 active users and make a
                                    total
                                    PH of &#8358;{{number_format(50000)}}
                                </div>
                            </div>
                            {{--Referral Info--}}
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="card mini-stats-wid">
                                        <div class="card-body">
                                            <div class="media">
                                                <div class="media-body">
                                                    <p class="text-muted font-weight-medium">Total Referred Users</p>
                                                    <h4 class="mb-0">13</h4>
                                                </div>

                                                <div
                                                    class="mini-stat-icon avatar-sm rounded-circle bg-primary align-self-center">
                                                        <span class="avatar-title">
                                                            <i class="bx bx-user-plus font-size-24"></i>
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
                                                    <p class="text-muted font-weight-medium">Total Referral Balance</p>
                                                    <h4 class="mb-0">&#8358;{{number_format(40070)}}</h4>
                                                </div>

                                                <div
                                                    class="mini-stat-icon avatar-sm rounded-circle bg-primary align-self-center">
                                                        <span class="avatar-title">
                                                            <i class="bx bx-money font-size-24"></i>
                                                        </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end row -->
                        </div>
                    </div>
                </div>


                {{--PH Merged Tabled--}}
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Congratulations!!!</h4>
                                <p class="card-title-desc">You have been merged to pay the following users on 14, August
                                    2020 at 4:30pm
                                </p>
                                <div class="table-rep-plugin">
                                    <div class="mb-0" data-pattern="priority-columns">
                                        <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                               style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                            <tr>
                                                <th>Expires</th>
                                                <th>Name</th>
                                                <th>Amount</th>
                                                <th>Bank Name</th>
                                                <th>Account No</th>
                                                <th>Account Type</th>
                                                <th>Phone Number</th>
                                                <th>Upload Receipt</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <td>11h 30m 45s</td>
                                                <td>Ayomide Adebayo</td>
                                                <td>&#8358;{{number_format(10000)}}</td>
                                                <td>UBA</td>
                                                <td>2090556730</td>
                                                <td>Savings</td>
                                                <td>09045656787</td>
                                                <td>
                                                    <a href=""><i class="bx bx-file bx-sm"></i></a>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>10h 30m 45s</td>
                                                <td>Femi Adebayo</td>
                                                <td>&#8358;{{number_format(10000)}}</td>
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

                        <div class="row">
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Provide Help Summary</h4>
                                        <hr>
                                        <p class="card-title-desc">
                                            Amount you requested to PH (Total amount) = &#8358;{{number_format(40000)}}
                                        </p>
                                        <hr>
                                        <p class="card-title-desc">
                                            Amount paid (Completed Transaction) = &#8358;{{number_format(30000)}}
                                        </p>
                                        <hr>
                                        <p class="card-title-desc">
                                            Amount on processing (Merged but not completed) = &#8358;{{number_format(5000)}}
                                        </p>
                                        <hr>
                                        <p class="card-title-desc">
                                            Amount left to be paid (Not merged yet) = &#8358;{{number_format(5000)}}
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Provide Help Important Notice</h4>
                                        <hr>
                                        <div class="card-title-desc">
                                            <b class="text-warning">NOTICE: </b>Your Account will be
                                            <b class="text-danger">suspended</b> if you do
                                            not make payment
                                            before merge <b class="text-danger">duration expires</b>
                                            and reactivation of suspended account costs
                                            <b class="text-danger">&#8358;{{number_format(3000)}}</b>.
                                            If you are to pay multiple users, they will
                                            be unmerged
                                            from you automatically if you fail to pay one of them before the merge
                                            expires. Earliest merge will expire first.
                                        </div>
                                        <hr>
                                        <b class="text-primary">Earliest Merge expires on 25 of Aug, 2020 @ 3:19PM</b>
                                        <hr>
                                        <b>Tip: You could call who you were merged with to notify him/her before proceeding with payment</b>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                {{--Last Five Transactions Table--}}
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Latest Transactions</h4>
                                <p class="card-title-desc">Below are your last five transactions you can check the
                                    transactions page to see more.
                                </p>
                                <div class="table-responsive">
                                    <table class="table mb-0">
                                        <thead>
                                        <tr>
                                            <th>Date</th>
                                            <th>Time</th>
                                            <th>Transaction Status</th>
                                            <th>Transaction Type</th>
                                            <th>From/To</th>
                                            <th>Receipt</th>
                                            <th>Action</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr>
                                            <th scope="row">07 Oct, 2019</th>
                                            <td>8:00 a.m</td>
                                            <td><span class="badge badge-primary">Completed</span></td>
                                            <td>GH</td>
                                            <td>Ayomide Adebayo</td>
                                            <td>
                                                <a href=""><i class="bx bx-file bx-sm"></i></a>
                                            </td>
                                            <td>
                                                <button type="button"
                                                        class="btn btn-primary btn-sm btn-rounded waves-effect waves-light p-1 m-1"
                                                        data-toggle="modal" data-target=".exampleModal">
                                                    Confirm
                                                </button>
                                                <button type="button"
                                                        class="btn btn-danger btn-sm btn-rounded waves-effect waves-light p-1 m-1"
                                                        data-toggle="modal" data-target=".exampleModal">
                                                    Report
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">07 Oct, 2019</th>
                                            <td>8:00 a.m</td>
                                            <td><span class="badge badge-primary">Completed</span></td>
                                            <td>GH</td>
                                            <td>Ayomide Adebayo</td>
                                            <td>
                                                <a href=""><i class="bx bx-file bx-sm"></i></a>
                                            </td>
                                            <td>
                                                <button type="button"
                                                        class="btn btn-primary btn-sm btn-rounded waves-effect waves-light p-1 m-1"
                                                        data-toggle="modal" data-target=".exampleModal">
                                                    Confirm
                                                </button>
                                                <button type="button"
                                                        class="btn btn-danger btn-sm btn-rounded waves-effect waves-light p-1 m-1"
                                                        data-toggle="modal" data-target=".exampleModal">
                                                    Report
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th scope="row">07 Oct, 2019</th>
                                            <td>8:00 a.m</td>
                                            <td><span class="badge badge-primary">Completed</span></td>
                                            <td>GH</td>
                                            <td>Ayomide Adebayo</td>
                                            <td>
                                                <a href=""><i class="bx bx-file bx-sm"></i></a>
                                            </td>
                                            <td>
                                                <button type="button"
                                                        class="btn btn-primary btn-sm btn-rounded waves-effect waves-light p-1 m-1"
                                                        data-toggle="modal" data-target=".exampleModal">
                                                    Confirm
                                                </button>
                                                <button type="button"
                                                        class="btn btn-danger btn-sm btn-rounded waves-effect waves-light p-1 m-1"
                                                        data-toggle="modal" data-target=".exampleModal">
                                                    Report
                                                </button>
                                            </td>
                                        </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end col -->
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
            <hr class="mt-0"/>
            <h6 class="text-center mb-0">Choose Layouts</h6>

            <div class="p-4">
                <div class="mb-2">
                    <img src="assets/images/layouts/layout-1.jpg" class="img-fluid img-thumbnail" alt="">
                </div>
                <div class="custom-control custom-switch mb-3">
                    <input type="checkbox" class="custom-control-input theme-choice" id="light-mode-switch" checked/>
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

