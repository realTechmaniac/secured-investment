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
                    <div class="col-xl-8 col-sm-12">
                        <div class="card">
                            <div class="card-body">
                                @if($news->count() > 0)
                                    @foreach($news as $row)
                                        <div class="media">
                                            <div class="media-body overflow-hidden">
                                                <h5 class="text-truncate font-size-15">
                                                    <a href="{{route('admin.single.news', $row->token)}}" class="text-dark">
                                                        {{\Illuminate\Support\Str::limit($row->title, 40)}}
                                                    </a>
                                                </h5>
                                                <p class="text-muted mb-1">
                                                    <a href="{{route('admin.single.news', $row->token)}}">
                                                        {{\Illuminate\Support\Str::limit($row->body)}}
                                                    </a>
                                                </p>
                                            </div>
                                        </div>
                                        <ul class="list-inline mb-0">
                                            <li class="list-inline-item mr-3">
                                                Post by
                                                @if($row->is_ceo_news)
                                                    <span class="badge badge-dark">CEO</span>
                                                @else
                                                    <span class="badge badge-primary">Admin</span>
                                                @endif
                                            </li>
                                            <li class="list-inline-item mr-3" data-toggle="tooltip" data-placement="top" title="" data-original-title="Date Posted">
                                                <i class="bx bx-calendar mr-1"></i>
                                                {{\Carbon\Carbon::parse($row->created_at)->format('M jS\, g:i A')}}
                                            </li>
                                            <a
                                                href="" class="btn btn-primary btn-sm"
                                                data-toggle="modal"
                                                data-target=".edit-news-modal-{{$row->token}}">
                                                <i class="bx bx-edit"></i> Edit
                                            </a>
                                        </ul>
                                        <hr>
                                    @endforeach
                                @else
                                    <h5 class="d-flex justify-content-center">No News Yet.</h5>
                                @endif

                                    <div class="col-lg-12">
                                        <ul class="pagination pagination-rounded justify-content-center mt-2 mb-5">
                                            {{$news->onEachSide(1)->links()}}
                                        </ul>
                                    </div>

                            </div>
                        </div>
                    </div>
                </div>

                <!-- end row -->
            </div>
        </div>
    </div>

    @if($news->count() > 0)
        @foreach($news as $row)
            <div class="modal fade edit-news-modal-{{$row->token}}" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
                 style="display: none;" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title mt-0" id="myModalLabel"><i class="fa fa-edit"></i> Edit News</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">×</span>
                            </button>
                        </div>
                        <form action="{{route('update.news', $row->token)}}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="modal-body">
                                <div class="form-group">
                                    <label for="title">News Title</label>
                                    <input id="title" value="{{$row->title}}" name="title" type="text" maxlength="100" class="form-control" placeholder="Enter News Title..." required>
                                </div>
                                <div class="form-group">
                                    <label for="body">News Content</label>
                                    <textarea class="form-control" id="body"  name="body" rows="5" maxlength="4000" placeholder="Enter News Content..." required>{{$row->body}}</textarea>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary waves-effect waves-light">Send News</button>
                            </div>
                        </form>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div>
        @endforeach
    @endif

@endsection

@section('js')

@endsection
