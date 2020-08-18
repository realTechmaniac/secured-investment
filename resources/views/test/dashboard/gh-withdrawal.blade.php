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
                                
                                </div>
                            </div>
                        </div>
                        <!-- end page title -->

                        <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
        
                                       <h3 class="card-title pb-3">Available Investments for withdrawal</h3>
                                        
        
                                        <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Date</th>
                                                <th>Time</th>
                                                <th>Amount GH</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
        
        
                                            <tbody>
                                            <tr>
                                                <td>Tiger Nixon</td>
                                                <td>27/09/2020</td>
                                                <td>10:00 am</td>
                                                <td>100,000</td>
                                                <td>
                                                    <span class="badge badge-primary">Available</span>
                                                </td>
                                                <td>
                                                 
                                                    <!-- Small modal -->
                                                    <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target=".bs-example-modal-sm">Withdraw</button>
                                        
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Garrett Winters</td>
                                                <td>10/09/2020</td>
                                                <td>5:00pm</td>
                                                <td>50,000</td>
                                                <td><span class="badge badge-danger">Unvailable</span></td>
                                                <td>
                                                    <!-- Small modal -->
                                                    <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target=".bs-example-modal-sm">Withdraw</button>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td>Folake Nixon</td>
                                                <td>17/09/2020</td>
                                                <td>8:00 am</td>
                                                <td>30,000</td>
                                                <td>
                                                    <span class="badge badge-warning">Pending</span>
                                                </td>
                                                <td><!-- Small modal -->
                                                    <button type="button" class="btn btn-primary waves-effect waves-light" data-toggle="modal" data-target=".bs-example-modal-sm">Withdraw</button>
                                                </td>
                                            </tr>
                                            
                                           
                                            </tbody>
                                        </table>

                                    <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-sm">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title mt-0" id="mySmallModalLabel">Ph Withdrawal Info</h5>
                                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="text-center">
                                                                <div class="swal2-icon swal2-warning swal2-animate-warning-icon" style="display: flex;"></div>
                                                                <div class="swal2-header">
                                                                    <h5><strong>Are you sure you want to withdraw this ? </strong></h5>
                                                                </div>
                                                                <div class = "swal2-content" style="display: block;">You won't be able to revert this!</div>
                                                                <div class="swal2-actions">
                                                                    <button type="button " class="swal2-confirm swal2-styled btn-success" style="display: inline-block;" aria-label="">Proceed</button>
                                                                    <button type="button" class="swal2-cancel swal2-styled btn-danger" style="display: inline-block;" aria-label="">Cancel</button>
                                                                </div>
                                                            </div>
                                                        </div><!-- /.modal-content -->
                                                    </div><!-- /.modal-dialog -->
                                                </div><!-- /.modal -->
                                      </div>
        
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div> <!-- end row -->

                    </div> <!-- container-fluid -->
                </div>
                <!-- End Page-content -->



@endsection