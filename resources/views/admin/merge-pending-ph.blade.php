@extends('layouts.userApp')

@section('page-title')Secured Investment -Merge Pending Provide Help @endsection

@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="mb-0 font-size-18">Admin Dashboard</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                @if($gh)
                                    <h4 class="card-title pb-3">
                                        Pending <b class="text-primary">Provide Help</b>
                                    </h4>
                                    <div>
                                        Merge
                                        <b class="text-danger">{{$gh->user->username}} (wants to Get Help of <strong>&#8358;</strong>{{number_format($gh->to_balance)}})</b>
                                        with another user that wants to <b class="text-primary">Provide Help</b>
                                    </div>
                                @else
                                    <h4 class="card-title pb-3">
                                        Merge Pending <b class="text-primary">Provide Help</b>
                                    </h4>
                                @endif

                                <div class="table-rep-plugin">
                                    <div class="mb-0" data-pattern="priority-columns">

                                        <table id="merge-pending-ph-datatable" class="table table-bordered dt-responsive nowrap"
                                               style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                            <tr>
                                                <th>Date</th>
                                                <th>Time</th>
                                                <th>Username</th>
                                                <th>Merged With</th>
                                                <th>Amount <strong>(&#8358;)</strong></th>
                                                <th>Action</th>

                                            </tr>
                                            </thead>
                                            <tbody>
                                            @if($pending_ph->count() > 0)
                                                @foreach($pending_ph as $ph)
                                                    <tr>
                                                        <td>{{$ph->created_at->format('d/m/y')}}</td>
                                                        <td>{{$ph->created_at->format('g:i A')}}</td>
                                                        <td>{{$ph->user->username}}</td>
                                                        <td>{{$ph->getHelps->count()}} User(s)</td>
                                                        <td>{{number_format($ph->to_balance)}}</td>
                                                        <td>
                                                            <i class="bx bx-user bx-sm mr-1 " data-toggle="tooltip"
                                                               data-placement="top" title="View Profile"></i>
                                                            <!-- Button trigger modal -->
                                                            @if(!$gh)
                                                                <a href="{{route('show.pending.gh', [$ph->token])}}"
                                                                   class="btn btn-primary btn-sm btn-rounded waves-effect waves-light mb-3">
                                                                    Merge
                                                                </a>
                                                            @else
                                                                <button type="button"
                                                                        class="btn btn-primary btn-sm btn-rounded waves-effect waves-light mb-3 "
                                                                        data-toggle="modal" data-target=".accept-merge-confirmation-modal-{{$ph->token}}">
                                                                    Accept Merge
                                                                </button>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif

                                            </tbody>
                                        </table>

                                    </div>

                                </div>

                            </div>
                        </div>
                    </div> <!-- end col -->
                </div> <!-- end row -->


                <!-- end row -->


            </div>
        </div>
    </div>

    @if($pending_ph->count() > 0 && $gh)
        @foreach($pending_ph as $ph)
            <div class="modal fade accept-merge-confirmation-modal-{{$ph->token}}"
                 tabindex="-1" role="dialog"
                 aria-labelledby="mySmallModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title mt-0">Merge
                                Confirmation</h5>
                            <button type="button" class="close"
                                    data-dismiss="modal"
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
                                            Are you sure you want to
                                            merge <b class="text-danger">{{$gh->user->username}}
                                                (wants to GH
                                                &#8358;{{number_format($gh->to_balance)}}
                                                )</b>
                                            with <b class="text-primary">{{$ph->user->username}}
                                                (wants to PH
                                                &#8358;{{number_format($ph->to_balance)}}
                                                )</b> ?
                                        </strong>
                                    </h5>
                                </div>
                                <div class="swal2-content"
                                     style="display: block;">You won't
                                    be able
                                    to revert this!
                                </div>
                                <div class="swal2-actions">
                                    <button type="button"
                                            class="swal2-cancel swal2-styled btn-danger"
                                            style="display: inline-block;"
                                            data-dismiss="modal">Close
                                    </button>
                                    <form action="{{route('merge.pending.ph', [$ph->token, $gh->token])}}" method="POST">
                                        @csrf
                                        <button type="submit"
                                                class="swal2-confirm swal2-styled btn-success"
                                                style="display: inline-block;">
                                            Yes, Proceed Merge
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div><!-- /.modal-content -->
                </div><!-- /.modal-dialog -->
            </div>
        @endforeach
    @endif
@endsection

@section('js')
    <script>
        $('#merge-pending-ph-datatable').DataTable({
            "language": {
                "emptyTable": "No User wants to Provide Help at the moment"
            }
        })
    </script>
@endsection
