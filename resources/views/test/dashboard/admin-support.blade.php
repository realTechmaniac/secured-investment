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
                        <div class="page-title-box d-flex align-items-center 
                                justify-content-between">
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
                            <div class="col-md-4">
                                <div class="card mini-stats-wid">
                                    <div class="card-body">
                                        <div class="media">
                                            <div class="media-body">
                                                <p class="text-muted font-weight-medium">Total Messages</p>
                                                <h4 class="mb-0">10</h4>
                                            </div>

                                            <div class="mini-stat-icon avatar-sm rounded-circle bg-primary align-self-center">
                                                <span class="avatar-title">
                                                    <i class="bx bx-chat font-size-24"></i>
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
                                                <p class="text-muted font-weight-medium">Replied</p>
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
                            <div class="col-md-4">
                                <div class="card mini-stats-wid">
                                    <div class="card-body">
                                        <div class="media">
                                            <div class="media-body">
                                                <p class="text-muted font-weight-medium">Pending</p>
                                                <h4 class="mb-0">10</h4>
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

                                <h4 class="card-title">Hello Admin</h4>
                                <p class="card-title-desc">You have the following messages from the users
                                </p>

                                <div class="table-rep-plugin">
                                    <div class="mb-0" data-pattern="priority-columns">
                                       
                                <table id="datatable" class="table table-bordered dt-responsive nowrap" style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th data-priority="1">Subject</th>
                                                <th data-priority="3">Date</th>
                                                <th data-priority="1">Time</th>
                                                <th data-priority="3">Action</th>
                                                <th data-priority="3">Status</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            <tr>
                                                <th>Ayomide Dada</th>
                                                <td>Account has been blocked </td>
                                                <td>19/05/2020</td>
                                                <td>2:00pm</td>
                                                <td>
                                                     <!-- Button trigger modal -->
                                                    <button type="button" class="btn btn-primary btn-sm btn-rounded waves-effect waves-light p-1 m-1" data-toggle="modal" data-target="#myModal">View</button>
                                                    <button type="button" class="btn btn-danger btn-sm btn-rounded waves-effect waves-light p-1 m-1" data-toggle="modal" data-target=".exampleModal">
                                                        Delete
                                                </td>
                                               
                                                <td><span class="badge badge-primary mt-2">Answered</span></td>                                                           
                                            </tr>

                                            <tr>
                                                <th>Femi Dada</th>
                                                <td>Reactivated account blocked </td>
                                                <td>19/05/2020</td>
                                                <td>2:00pm</td>
                                                <td>
                                                     <!-- Button trigger modal -->
                                                    
                                                     <button type="button" class="btn btn-primary btn-sm btn-rounded waves-effect waves-light p-1 m-1" data-toggle="modal" data-target="#myModal">View</button>
                                                    <button type="button" class="btn btn-danger btn-sm btn-rounded waves-effect waves-light p-1 m-1" data-toggle="modal" data-target=".exampleModal">
                                                        Delete
                                                </td>
                                               
                                                <td><span class="badge badge-danger mt-2">Pending</span></td>                                                           
                                            </tr>
                                         </tbody>
                                        </table>
                                    </div>

                                </div>

                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->
                <div class="row">

                    <div class="col-sm-6 col-md-4 col-xl-3">
                        <div class="my-4 text-center">
                            
                           
                        </div>

                        <!-- sample modal content -->
                        <div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title mt-0" id="myModalLabel">Message from user001</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                       <div class="form-group row">
                    <label for="example-text-input" class="col-md-2 col-form-label">Name</label>
                    <div class="col-md-10">
                        <input class="form-control" type="text" value="Artisanal kale" id="example-text-input">
                    </div>
                    </div>
                            <div class="form-group row">
                                <label for="example-number-input" class="col-md-2 col-form-label">Phone Number</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="number" value="42" id="example-number-input">
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <label for="example-email-input" class="col-md-2 col-form-label">Subject</label>
                                <div class="col-md-10">
                                    <input class="form-control" type="email" value="bootstrap@example.com" id="example-email-input">
                                </div>
                            </div>
                        
                            <div class="form-group row">
                                <label for="example-tel-input" class="col-md-2 col-form-label">Message</label>
                                <div class="col-md-10">
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                </div>
                            </div>

                             <div class="form-group row">
                                <label for="example-tel-input" class="col-md-2 col-form-label">Reply</label>
                                <div class="col-md-10">
                                    <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
                                </div>
                            </div>           
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Cancel</button>
                            <button type="button" class="btn btn-primary waves-effect waves-light">Send</button>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div><!-- /.modal -->
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
    

        <!-- Right bar overlay-->

        <div class="rightbar-overlay"></div>
    @endsection
        <!-- /Right-bar -->

