@extends('layouts.userApp')

@section('page-title')Secured Investment -Dashboard @endsection

@section('content')
    <div class="main-content">
        <div class="page-content">

            <div class="container-fluid">

                <div class="row">
                    <div class="col-lg-12 pt-5 pb-5">
                        <div class="card card-body pb-5">
                            <h1 class="card-title mt-0 text-center">Welcome to Secured Investment </h1>
                            <p class="card-text text-center">Get Started Now by Activating your acccount to get full
                                access to our investment services. Activation costs <strong>1000 Naira only</strong>.
                            </p>

                            <div class="text-center">
                                <button type="button" class="btn btn-primary waves-effect waves-light"
                                        data-toggle="button" aria-pressed="false">
                                    Activate
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- end row -->
            </div>
            <!-- end main content-->
        </div>
    </div>
@endsection

@section('js')

@endsection
