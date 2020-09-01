@extends('test.layouts.dashboardApp')



 @section('content')

    <div class="main-content">
        
        <div class="page-content">

            <div class="container-fluid">
                
                <div class="row">
                    <div class="col-md-12">
                        <div class="card card-body">
                            <h3 class="card-title mt-0">Welcome to Secured Investment User Support</h3>
                            <p class="card-text">Our Support Team will reach out within the next 24 hours and you will be notified on your dashboard</p>

                    <div class="row">
                            <div class="col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <label for="example-text-input" class="col-md-2 col-form-label">Username</label>
                                            <div class="col-md-10">
                                            <input class="form-control" type="text" value="" id="example-text-input">
                                        </div>

                                        </div>
                                        <div class="form-group row">
                                            <label for="example-search-input" class="col-md-2 col-form-label">Subject</label>
                                            <div class="col-md-10">
                                                <input class="form-control" type="search" value="" id="example-search-input">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-email-input" class="col-md-2 col-form-label">Message</label>
                                            <div class="col-md-10">
                                                <textarea class="form-control" rows="7">
                                                    
                                                </textarea>
                                               
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label for="example-email-input" class="col-md-2 col-form-label">Attach File</label>
                                            <div class="col-md-10">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="customFile">
                                                    <label class="custom-file-label" for="customFile">Choose file</label>
                                                 </div>
                                            </div>
                                        </div>
                                        <div class="text-center">

                                            <a href="" class="btn btn-primary">Send Message</a>
                                
                                          </div>
                
                                    </div>
                                </div>
                            </div> <!-- end col -->
                        </div>
                        <!-- end row -->
                            
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

 @endsection