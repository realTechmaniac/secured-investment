@extends('layouts.adminApp')

@section('page-title')Secured Investment -Admin | Resolve Unconfirmed Receipt Issues @endsection

@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="mb-0 font-size-18">Admin- Resolve Unconfirmed Receipt Issues</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Unconfirmed Transactions</h4>
                                <p class="card-title-desc">Below are transactions that has receipt but has not been confirmed.</p>
                                <div class="table-rep-plugin">
                                    <div class="mb-0" data-pattern="priority-columns">
                                        <table id="unconfirmed-transactions"
                                               class="table table-bordered dt-responsive nowrap"
                                               style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                            <tr>
                                                <th>Time</th>
                                                <th>Uploaded Date</th>
                                                <th>Uploaded Time</th>
                                                <th>PH Username</th>
                                                <th>GH Username</th>
                                                <th>Amount (&#8358;)</th>
                                                <th>Receipt</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            {{--{{dd($all_five_latest_transactions_gh)}}--}}
                                            @if($get_all_unconfirmed_receipts->count() > 0)
                                                @foreach($get_all_unconfirmed_receipts as $row)
                                                    <tr>
                                                        <td>{{\Carbon\Carbon::parse($row->expires_at)}}</td>
                                                        <td>{{\Carbon\Carbon::parse($row->created_at)->format('d/m/y')}}</td>
                                                        <td>{{\Carbon\Carbon::parse($row->created_at)->format('g:i A')}}</td>
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
                                                               data-target=".unconfirmed-transaction-payment-receipt-modal-{{$row->token}}"
                                                               aria-pressed="false">View</a>
                                                        </td>
                                                        <td>
                                                            @if(\App\Http\Controllers\Admin\ResolveIssuesController::isMergeConfirmed($row))
                                                                <a href="#" class="btn btn-success btn-sm"
                                                                   data-toggle="modal"
                                                                   data-target=".unconfirmed-transaction-confirm-receipt-{{$row->token}}"
                                                                   aria-pressed="false">Confirm</a>
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
                </div>

                <!-- end row -->


            </div>
        </div>
    </div>



    @if($get_all_unconfirmed_receipts->count() > 0)
        {{--RECEIPT IMAGE MODAL--}}
        @foreach($get_all_unconfirmed_receipts as $receipt)
            <div class="modal fade unconfirmed-transaction-payment-receipt-modal-{{$receipt->token}}" tabindex="-1" role="dialog"
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

            {{--CONFIRM FAKE RECEIPT PAYMENT--}}
            <div class="modal fade unconfirmed-transaction-confirm-receipt-{{$receipt->token}}" tabindex="-1" role="dialog"
                 aria-labelledby="mySmallModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title mt-0">Confirm Payment Confirmation</h5>
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

        @endforeach
    @endif
@endsection

@section('js')
    <script>
        $('#unconfirmed-transactions').DataTable({
            "language": {
                "emptyTable": "No Unconfirmed Transaction Yet."
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
