@extends('layouts.userApp')

@section('page-title')Secured Investment -Admin | Resolve Fake Receipt Issues @endsection

@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="mb-0 font-size-18">Admin- Resolve Fake Receipt Issues</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Transactions With Fake Receipts</h4>
                                <p class="card-title-desc">Below are transactions that are flagged as fake payment
                                    receipts.</p>
                                <div class="table-rep-plugin">
                                    <div class="mb-0" data-pattern="priority-columns">
                                        <table id="fake-receipt-transactions"
                                               class="table table-bordered dt-responsive nowrap"
                                               style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                            <tr>
                                                <th>Time</th>
                                                <th>Date</th>
                                                <th>Expires In</th>
                                                <th>PH Username</th>
                                                <th>GH Username</th>
                                                <th>Amount (&#8358;)</th>
                                                <th>Receipt</th>
                                                <th>PH Action</th>
                                                <th>GH Action</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            {{--{{dd($all_five_latest_transactions_gh)}}--}}
                                            @if($get_fake_receipt->count() > 0)
                                                @foreach($get_fake_receipt as $row)
                                                    <tr>
                                                        <td>{{\Carbon\Carbon::parse($row->expires_at)}}</td>
                                                        <td>{{\Carbon\Carbon::parse($row->created_at)->format('d/m/y')}}</td>
                                                        <td>
                                                            <b class="text-danger">
                                                                <div id="fake-receipt-issue-countdown"
                                                                     class="text-danger"
                                                                     data-countdown="{{\Carbon\Carbon::parse($row->expires_at)->format('Y/m/d H:i:s')}}">
                                                                </div>
                                                            </b>
                                                        </td>
                                                        <td>
                                                            <b class="text-danger">{{$row->provideHelp->user->username}}</b>

                                                        </td>
                                                        <td>
                                                            <b class="text-primary">{{$row->getHelp->user->username}}</b>
                                                        </td>
                                                        <td>
                                                            <b class="text-primary">{{number_format($row->merge_amount)}}</b>
                                                        </td>
                                                        <td>
                                                            <a href="#" class="btn btn-primary btn-sm"
                                                               data-toggle="modal"
                                                               data-target=".fake-payment-receipt-modal-{{$row->token}}"
                                                               aria-pressed="false">View</a>
                                                        </td>
                                                        <td>
                                                            {{--{{dd(in_array($obj->merge->get_help_id, array_column($obj->receiptUploads->toArray(), $column)))}}--}}
                                                            @if(!$row->provideHelp->user->is_blocked)
                                                                <a href="#" class="btn btn-danger btn-sm"
                                                                   data-toggle="modal"
                                                                   data-target=".ph-fake-receipt-block-{{$row->token}}"
                                                                   aria-pressed="false">Block</a>
                                                            @endif
                                                            {{--{{dd(\App\Http\Controllers\Admin\ResolveIssuesController::isMergeConfirmed($row))}}--}}
                                                            @if(\App\Http\Controllers\Admin\ResolveIssuesController::isMergeConfirmed($row))
                                                                <a href="#" class="btn btn-success btn-sm"
                                                                   data-toggle="modal"
                                                                   data-target=".ph-fake-receipt-confirm-{{$row->token}}"
                                                                   aria-pressed="false">Confirm</a>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if(!$row->getHelp->user->is_blocked)
                                                                <a href="#" class="btn btn-danger btn-sm"
                                                                   data-toggle="modal"
                                                                   data-target=".gh-fake-receipt-block-{{$row->token}}"
                                                                   aria-pressed="false">Block</a>
                                                            @endif
                                                            @if(\App\Http\Controllers\Admin\ResolveIssuesController::isMergeConfirmed($row))
                                                                <a href="#" class="btn btn-success btn-sm"
                                                                   data-toggle="modal"
                                                                   data-target=".gh-fake-receipt-unmerge-{{$row->token}}"
                                                                   aria-pressed="false">Unmerge</a>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <a href="#" class="btn btn-danger btn-sm"
                                                               data-toggle="modal"
                                                               data-target=".clear-fake-payment-receipt-modal-{{$row->token}}"
                                                               aria-pressed="false">Clear Issue</a>
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
                </div>

                <!-- end row -->


            </div>
        </div>
    </div>



    @if($get_fake_receipt->count() > 0)
        {{--RECEIPT IMAGE MODAL--}}
        @foreach($get_fake_receipt as $receipt)
            <div class="modal fade fake-payment-receipt-modal-{{$receipt->token}}" tabindex="-1" role="dialog"
                 aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Payment receipt from
                                <b class="text-danger">{{$receipt->provideHelp->user->username}}(PH User)</b> to
                                <b class="text-primary">{{$receipt->getHelp->user->username}}(GH User)</b>
                            </h5>
                            <button type="button" class="close" data-dismiss="modal"
                                    aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="card">
                                <img
                                    src="{{asset('receipts-hua094JHhRsdUE28a1w4ldk1llsNdd1l1/'.$receipt->image)}}"
                                    width="100%" height="100%" alt="Receipt">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary"
                                    data-dismiss="modal">Close
                            </button>
                        </div>
                    </div>
                </div>
            </div>


            {{--CLEAR FAKE RECEIPT ISSUE--}}
            <div class="modal fade clear-fake-payment-receipt-modal-{{$receipt->token}}" tabindex="-1" role="dialog"
                 aria-labelledby="mySmallModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title mt-0">Clear Issue Confirmation</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="text-center">
                                <div class="swal2-icon swal2-warning swal2-animate-warning-icon"
                                     style="display: flex;"></div>
                                <div class="swal2-header">
                                    <h5><strong>
                                            Are you sure you want to clear this issue
                                            between <b class="text-danger">{{$receipt->provideHelp->user->username}}(PH
                                                User)</b> to
                                            <b class="text-primary">{{$receipt->getHelp->user->username}}(GH User)</b>?
                                            Be sure you have taken necessary actions before proceeding.
                                        </strong></h5>
                                </div>
                                <div class="swal2-content" style="display: block;">You won't be able to
                                    revert this!
                                </div>
                                <div class="swal2-actions">
                                    <button type="button" class="swal2-cancel swal2-styled btn-danger"
                                            style="display: inline-block;" data-dismiss="modal">No, Close
                                    </button>
                                    <form action="{{route('clear.fake.payment.issue', $receipt->token)}}" method="POST">
                                        @csrf
                                        <button type="submit"
                                                class="swal2-confirm swal2-styled btn-success"
                                                style="display: inline-block;">Yes, Clear Issue
                                        </button>
                                    </form>
                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->
                </div>
            </div>

            {{--BLOCK PH USER--}}
            <div class="modal fade ph-fake-receipt-block-{{$receipt->token}}" tabindex="-1" role="dialog"
                 aria-labelledby="mySmallModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title mt-0">Block User Confirmation</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="text-center">
                                <div class="swal2-icon swal2-warning swal2-animate-warning-icon"
                                     style="display: flex;"></div>
                                <div class="swal2-header">
                                    <h5>
                                        <strong>
                                            Are you sure you want to
                                            <b class="text-danger">BLOCK {{$receipt->provideHelp->user->username}}(PH
                                                User)</b>?
                                            Be sure you have taken necessary actions before proceeding.
                                        </strong>
                                    </h5>
                                </div>
                                <div class="swal2-content" style="display: block;">You won't be able to
                                    revert this!
                                </div>
                                <div class="swal2-actions">
                                    <button type="button" class="swal2-cancel swal2-styled btn-danger"
                                            style="display: inline-block;" data-dismiss="modal">No, Close
                                    </button>
                                    <form action="{{route('block.ph.user.fake.payment.issue', $receipt->token)}}"
                                          method="POST">
                                        @csrf
                                        <button type="submit"
                                                class="swal2-confirm swal2-styled btn-success"
                                                style="display: inline-block;">Yes, Block User
                                        </button>
                                    </form>
                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->
                </div>
            </div>

            {{--BLOCK GH USER--}}
            <div class="modal fade gh-fake-receipt-block-{{$receipt->token}}" tabindex="-1" role="dialog"
                 aria-labelledby="mySmallModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title mt-0">Block User Confirmation</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="text-center">
                                <div class="swal2-icon swal2-warning swal2-animate-warning-icon"
                                     style="display: flex;"></div>
                                <div class="swal2-header">
                                    <h5><strong>
                                            Are you sure you want to
                                            <b class="text-danger">BLOCK {{$receipt->getHelp->user->username}}(GH
                                                User)</b>?
                                            Be sure you have taken necessary actions before proceeding.
                                        </strong></h5>
                                </div>
                                <div class="swal2-content" style="display: block;">You won't be able to
                                    revert this!
                                </div>
                                <div class="swal2-actions">
                                    <button type="button" class="swal2-cancel swal2-styled btn-danger"
                                            style="display: inline-block;" data-dismiss="modal">No, Close
                                    </button>
                                    <form action="{{route('block.gh.user.fake.payment.issue', $receipt->token)}}"
                                          method="POST">
                                        @csrf
                                        <button type="submit"
                                                class="swal2-confirm swal2-styled btn-success"
                                                style="display: inline-block;">Yes, Block User
                                        </button>
                                    </form>
                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->
                </div>
            </div>

            {{--CONFIRM FAKE RECEIPT PAYMENT--}}
            <div class="modal fade ph-fake-receipt-confirm-{{$receipt->token}}" tabindex="-1" role="dialog"
                 aria-labelledby="mySmallModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title mt-0">Confirm Fake Receipt Confirmation</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="text-center">
                                <div class="swal2-icon swal2-warning swal2-animate-warning-icon"
                                     style="display: flex;"></div>
                                <div class="swal2-header">
                                    <h5><strong>
                                            Are you sure you want to confirm the payment by
                                            <b class="text-danger">{{$receipt->provideHelp->user->username}}(PH
                                                User)</b> to
                                            <b class="text-primary">{{$receipt->getHelp->user->username}}(GH User)</b>?
                                            Be sure you have taken necessary actions before proceeding.
                                        </strong></h5>
                                </div>
                                <div class="swal2-content" style="display: block;">You won't be able to
                                    revert this!
                                </div>
                                <div class="swal2-actions">
                                    <button type="button" class="swal2-cancel swal2-styled btn-danger"
                                            style="display: inline-block;" data-dismiss="modal">No, Close
                                    </button>
                                    <form action="{{route('confirm.fake.payment.issue', $receipt->token)}}"
                                          method="POST">
                                        @csrf
                                        <button type="submit"
                                                class="swal2-confirm swal2-styled btn-success"
                                                style="display: inline-block;">Yes, Confirm Receipt
                                        </button>
                                    </form>
                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->
                </div>
            </div>

            {{--UNMERGE GH FROM PH--}}
            <div class="modal fade gh-fake-receipt-unmerge-{{$receipt->token}}" tabindex="-1" role="dialog"
                 aria-labelledby="mySmallModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title mt-0">Unmerge Users Confirmation</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="text-center">
                                <div class="swal2-icon swal2-warning swal2-animate-warning-icon"
                                     style="display: flex;"></div>
                                <div class="swal2-header">
                                    <h5><strong>
                                            Are you sure you want to unmerge
                                            <b class="text-primary">{{$receipt->getHelp->user->username}}(GH User)</b>
                                            from
                                            <b class="text-danger">{{$receipt->provideHelp->user->username}}(PH
                                                User)</b>?
                                            Be sure you have taken necessary actions before proceeding.
                                        </strong></h5>
                                </div>
                                <div class="swal2-content" style="display: block;">You won't be able to
                                    revert this!
                                </div>
                                <div class="swal2-actions">
                                    <button type="button" class="swal2-cancel swal2-styled btn-danger"
                                            style="display: inline-block;" data-dismiss="modal">No, Close
                                    </button>
                                    <form action="{{route('unmerge.users.fake.payment.issue', $receipt->token)}}"
                                          method="POST">
                                        @csrf
                                        <button type="submit"
                                                class="swal2-confirm swal2-styled btn-success"
                                                style="display: inline-block;">Yes, Unmerge Users
                                        </button>
                                    </form>
                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->
                </div>
            </div>
        @endforeach
    @endif
@endsection

@section('js')
    <script>
        $('#fake-receipt-issue-countdown[data-countdown]').each(function () {
            var $this = $(this), finalDate = $(this).data('countdown');
            $this.countdown(finalDate).on('update.countdown', function (event) {
                var format = '%Hh %Mm %Ss';
                if (event.offset.totalDays > 0) {
                    format = '%-d day%!d ' + format;
                }
                if (event.offset.weeks > 0) {
                    format = '%-w week%!w ' + format;
                }
                $(this).html(event.strftime(format));
            }).on('finish.countdown', function (event) {
                $(this).html('Issue Expired!')
                    .parent().addClass('disabled');
            });
        });

        $('#fake-receipt-transactions').DataTable({
            "language": {
                "emptyTable": "No Transaction With Fake Receipt Yet."
            },
            "order": [[0, "desc"]],
            "columnDefs": [
                {
                    "targets": [0],
                    "visible": false,
                }
            ]
        })
    </script>
@endsection
