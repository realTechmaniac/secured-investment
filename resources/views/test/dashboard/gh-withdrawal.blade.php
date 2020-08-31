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
                            <h4 class="mb-0 font-size-18">Get Help</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <h3 class="card-title pb-3">Investments that are available for withdrawal</h3>


                                <table id="datatable" class="table table-bordered dt-responsive nowrap"
                                       style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                    <tr>
                                        <th>Available In</th>
                                        <th>PH Amount(&#8358;)</th>
                                        <th>GH Amount(&#8358;)</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>


                                    <tbody>
                                    <tr>
                                        <td><b class="text-primary">Countdown starts soon...</b></td>
                                        <td>{{number_format(100000)}}</td>
                                        <td>{{number_format(150000)}}</td>
                                        <td>
                                            <span class="badge badge-primary">Available</span>
                                        </td>
                                        <td>
                                            <button type="button" class="btn btn-primary waves-effect waves-light"
                                                    data-toggle="modal" data-target=".get-help-withdrawal-modal">
                                                Withdraw
                                            </button>
                                        </td>
                                    </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->

                <div>
                    <div class="modal fade get-help-withdrawal-modal" tabindex="-1" role="dialog"
                         aria-labelledby="mySmallModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title mt-0">Get Help Confirmation</h5>
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
                                            <h5>
                                                <strong>
                                                    Are you sure you want to withdraw
                                                    <b class="text-primary">&#8358;{{number_format(150000)}}</b>
                                                </strong>
                                            </h5>
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
                                            <button type="submit"
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

            </div> <!-- container-fluid -->
        </div>
    </div>
        <!-- End Page-content -->


@endsection
