@extends('layouts.adminApp')

@section('page-title')Secured Investment -Admin | Create News @endsection

@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="mb-0 font-size-18">Admin- Create News</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row d-flex justify-content-center">
                    <div class="col-lg-8">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between mb-4">
                                    <h4 class="card-title mt-0">Send News</h4>
                                    <a href="{{route('show.news')}}" class="btn btn-primary btn-sm"><i class="bx bx-news"></i> View News</a>
                                </div>

                                <form action="{{route('save.news')}}" method="POST">
                                    @csrf
                                    <div class="form-group row mb-4">
                                        <label for="title" class="col-form-label col-lg-2">News Title</label>
                                        <div class="col-lg-10">
                                            <input id="title" name="title" type="text" maxlength="100" class="form-control" placeholder="Enter News Title..." required>
                                        </div>
                                    </div>
                                    <div class="form-group row mb-4">
                                        <label for="body" class="col-form-label col-lg-2">News Content</label>
                                        <div class="col-lg-10">
                                            <textarea class="form-control" id="body"  name="body" rows="5" maxlength="4000" placeholder="Enter News Content..." required></textarea>
                                        </div>
                                    </div>

                                    <div class="row justify-content-end">
                                        <div class="col-lg-10">
                                            <button type="submit" class="btn btn-primary">Send News</button>
                                        </div>
                                    </div>
                                </form>

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
