<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-body">

                <h4 class="card-title">Congratulations!!!</h4>
                <p class="card-title-desc">The following users have been merged to pay you
                </p>

                <div class="table-rep-plugin">
                    <div class="mb-0" data-pattern="priority-columns">
                        <table id="gh-merge-datatable" class="table table-bordered dt-responsive nowrap"
                               style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>Expires In</th>
                                <th>Username</th>
                                <th>Amount</th>
                                <th>Phone number</th>
                                <th>Receipt</th>
                                <th>Actions</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($gh_pending->unConfirmedPh as $unconfirmed_ph)
                                <tr>
                                    <td>
                                        <b>
                                            @if($unconfirmed_ph->receiptUploads->count() > 0)
                                                @if(\App\ProvideHelp::ghReceiptExist($unconfirmed_ph, 'get_help_id'))
                                                    @if(!\App\ProvideHelp::ghGetKeyValue($unconfirmed_ph,'get_help_id', 'is_fake'))
                                                        <span class="text-primary">Paid</span>
                                                    @else
                                                        <span class="text-primary">Paid</span>/<span
                                                            class="text-danger">Fake Receipt</span>
                                                    @endif
                                                @else
                                                    <div id="gh-merge-countdown"
                                                         class="text-danger"
                                                         data-countdown="{{\App\ProvideHelp::mergeExpiresAt($unconfirmed_ph)}}">
                                                    </div>
                                                @endif
                                            @else
                                                <div id="gh-merge-countdown"
                                                     class="text-danger"
                                                     data-countdown="{{\App\ProvideHelp::mergeExpiresAt($unconfirmed_ph)}}">
                                                </div>
                                            @endif
                                        </b>
                                    </td>
                                    <td>{{$unconfirmed_ph->user->username}}</td>
                                    <td>&#8358;{{number_format($unconfirmed_ph->merge->merge_amount)}}</td>
                                    <td>{{$unconfirmed_ph->user->phone_number}}</td>
                                    <td>
                                        @if($unconfirmed_ph->receiptUploads->count() > 0)
                                            @if(\App\ProvideHelp::ghReceiptExist($unconfirmed_ph, 'get_help_id'))
                                                <button type="button"
                                                        class="btn btn-primary btn-sm waves-effect waves-light"
                                                        data-toggle="modal"
                                                        data-target=".gh-show-receipt-merged-modal-{{\App\ProvideHelp::ghGetKeyValue($unconfirmed_ph,'get_help_id', 'token')}}">
                                                    View Receipt
                                                </button>
                                                @if(!\App\ProvideHelp::ghGetKeyValue($unconfirmed_ph,'get_help_id', 'is_fake'))
                                                    <button type="button"
                                                            class="btn btn-danger btn-sm waves-effect waves-light"
                                                            data-toggle="modal"
                                                            data-target=".gh-report-receipt-merged-modal-{{\App\ProvideHelp::ghGetKeyValue($unconfirmed_ph,'get_help_id', 'token')}}">
                                                        Report Receipt
                                                    </button>
                                                @endif
                                            @else
                                                <button type="button"
                                                        class="btn btn-danger btn-sm waves-effect waves-light" disabled>
                                                    No Receipt Yet
                                                </button>
                                            @endif
                                        @else
                                            <button type="button"
                                                    class="btn btn-danger btn-sm waves-effect waves-light" disabled>
                                                No Receipt Yet
                                            </button>
                                        @endif
                                    </td>
                                    <td>
                                        @if($unconfirmed_ph->receiptUploads->count() > 0)
                                            @if(\App\ProvideHelp::ghReceiptExist($unconfirmed_ph, 'get_help_id'))
                                                @if(!\App\ProvideHelp::ghGetKeyValue($unconfirmed_ph,'get_help_id', 'is_fake'))
                                                    <button type="button"
                                                            class="btn btn-primary btn-sm waves-effect waves-light"
                                                            data-toggle="modal"
                                                            data-target=".gh-confirm-ph-confirmation-merged-modal-{{$unconfirmed_ph->token}}">
                                                        Confirm
                                                    </button>
                                                @else
                                                    <b class="text-danger">Flagged as Fake</b>
                                                @endif
                                            @else
                                                <button type="button"
                                                        class="btn btn-primary btn-sm waves-effect waves-light"
                                                        data-toggle="modal"
                                                        data-target=".gh-confirm-ph-confirmation-merged-modal-{{$unconfirmed_ph->token}}">
                                                    Confirm
                                                </button>
                                            @endif
                                        @else
                                            <button type="button"
                                                    class="btn btn-primary btn-sm waves-effect waves-light"
                                                    data-toggle="modal"
                                                    data-target=".gh-confirm-ph-confirmation-merged-modal-{{$unconfirmed_ph->token}}">
                                                Confirm
                                            </button>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>

        {{--GH Merge Info--}}
        @include('includes.gh-merge-info-include')
    </div> <!-- end col -->
</div>
