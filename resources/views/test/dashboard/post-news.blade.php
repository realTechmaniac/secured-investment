@extends('test.layouts.dashboardApp')


@section('content')

	<div class="main-content">

                <div class="page-content">
                    <div class="container-fluid">

                         <div class="row">
                   
                            <div class="col-md-12">
                                <div class="card">
                                    <div class="card-body">
      									<div class="text-center">
      										<h2>CREATE NEWS</h2>
      									</div>
        
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">News Title</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="text" value="Artisanal kale" id="example-text-input">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-search-input" class="col-md-2 col-form-label">News Body</label>
                                            <div class="col-md-10">        	
			                                     <div class="form-group">
												    <textarea class="form-control" id="exampleFormControlTextarea1" rows="6"></textarea>
												  </div>                                 
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-email-input" class="col-md-2 col-form-label">Add Picture</label>
                                            <div class="col-md-10">
                                            	<div class="custom-file">
	                                           <input type="file" class="custom-file-input" id="customFile">
	                                            <label class="custom-file-label" for="customFile">Choose file</label>
                                        		</div>
                                            </div>
                                        </div>
                                       <div class="text-center">
                                       		 <button type="button" class="btn btn-primary waves-effect waves-light " data-toggle="modal" data-target=".bs-example-modal-center">Post</button>   
                                       </div>   
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->     
                         </div>
                          <div class="modal fade bs-example-modal-center" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title mt-0">Post</h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <div class="text-center">
                                                    <div class="swal2-icon swal2-warning swal2-animate-warning-icon" style="display: flex;"></div>
                                                    <div class="swal2-header">
                                                        <h5><strong>Are you sure you want to Post this content? </strong></h5>
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


       <!-- Right bar overlay-->

         <div class="rightbar-overlay"></div>


@endsection




									