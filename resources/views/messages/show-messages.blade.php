@extends('layouts.userApp')

@section('page-title')Secured Investment -Inbox @endsection

@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="mb-0 font-size-18"><i class="bx bx-envelope"></i> Inbox</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row d-flex justify-content-center">
                    <div class="col-lg-8">
                        <div class="card card-body">
                            <div class="d-flex justify-content-between mb-4">
                                <h3 class="card-title mt-0">
                                    <a href="{{route('show.messages')}}">
                                        My Messages
                                    </a>
                                </h3>
                                <a href="#" class="btn btn-primary btn-sm"
                                   data-toggle="modal"
                                   data-target=".send-message-modal">
                                    <span><i class="bx bx-paper-plane"></i></span>
                                    Send
                                </a>
                            </div>
                            @if($chats->count() > 0)
                                @foreach($chats as $row)
                                    <div class="card shadow shadow-lg">
                                        <div class="card-body">
                                            <h5 class="card-title mt-0 text-primary">
                                                @if($row->from_id == auth()->id())
                                                    <span class="badge badge-info">Sent</span>
                                                @else
                                                    <span class="badge badge-primary">Received</span>
                                                @endif
                                                <a href="{{route('single.message', $row->token)}}">
                                                    {{\Illuminate\Support\Str::limit($row->message_title, 45)}}
                                                </a>
                                            </h5>
                                            <h6>
                                                <i class="bx bx-time">
                                                            {{\Carbon\Carbon::parse($row->created_at)->format('M jS\, g:i A')}}
                                                </i>
                                            </h6>
                                            <p class="card-text">{{\Illuminate\Support\Str::limit($row->message_body, 75, '...')}}
                                                <a href="{{route('single.message', $row->token)}}">Read Message</a></p>
                                        </div>
                                    </div>
                                @endforeach
                            @else
                                <div class="card shadow shadow-lg">
                                    <div class="card-body">
                                        <h5 class="card-title mt-0 text-primary">
                                            No Message yet.
                                        </h5>
                                    </div>
                                </div>
                            @endif
                            <div class="col-lg-12">
                                <ul class="pagination pagination-rounded justify-content-center mt-2 mb-5">
                                    {{$chats->onEachSide(1)->links()}}
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- end row -->
            </div>
        </div>
    </div>

    <div class="modal fade send-message-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myModalLabel"><i class="fa fa-paper-plane"></i> Send Message</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="{{route('save.message')}}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="message_title">Message Title</label>
                            <input type="text" class="form-control" name="message_title" id="message_title"
                                   placeholder="Enter Message Title...(100 characters only)" maxlength="100" required>
                        </div>
                        <div class="form-group">
                            <label for="message_body">Message Body</label>
                            <textarea class="form-control" name="message_body" id="message_body" rows="5"
                                      placeholder="Enter News Content...(400 characters only)" maxlength="400" required></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Send Message</button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
@endsection

@section('js')

@endsection
