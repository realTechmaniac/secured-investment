@extends('layouts.adminApp')

@section('page-title')Secured Investment -Admin | News @endsection

@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="mb-0 font-size-18">Secured Investment Updates</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row d-flex justify-content-center">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                @if($single_news)
                                    <h4 class="text-primary">{{$single_news->title}}</h4>
                                    <h4 class="card-title mt-0"><b class="text-secondary">Post By</b> &nbsp;
                                        @if($single_news->is_ceo_news)
                                            <span class="badge badge-dark">CEO</span>
                                        @else
                                            <span class="badge badge-primary">Admin</span>
                                        @endif
                                         On <i class="bx bx-calendar mr-1"></i> {{\Carbon\Carbon::parse($single_news->created_at)->format('M jS\, g:i A')}}</h4>
                                    <hr>
                                    <p class="card-text">{{$single_news->body}}</p>
                                @else
                                    <h5 class="d-flex justify-content-center">News Not Found.</h5>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

                <!-- end row -->
            </div>
        </div>
    </div>
@endsection

@section('js')

@endsection
