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
                                <th>Name</th>
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
                                                @foreach($unconfirmed_ph->receiptUploads as $receipt)
                                                    @if($receipt->provide_help_id == $unconfirmed_ph->merge->provide_help_id)
                                                        <div class="text-primary">Paid</div>
                                                    @else
                                                        <div id="gh-merge-countdown"
                                                             class="text-danger"
                                                             data-countdown="{{\Carbon\Carbon::parse($unconfirmed_ph->merge->expires_at)->format('Y/m/d H:i:s')}}">
                                                        </div>
                                                    @endif
                                                @endforeach
                                            @else
                                                <div id="gh-merge-countdown"
                                                     class="text-danger"
                                                     data-countdown="{{\Carbon\Carbon::parse($unconfirmed_ph->merge->expires_at)->format('Y/m/d H:i:s')}}">
                                                </div>
                                            @endif
                                        </b>
                                    </td>
                                    <td>{{$unconfirmed_ph->user->bankDetail->full_name}}</td>
                                    <td>&#8358;{{number_format($unconfirmed_ph->merge->merge_amount)}}</td>
                                    <td>{{$unconfirmed_ph->user->phone_number}}</td>
                                    <td>
                                        @if($unconfirmed_ph->receiptUploads->count() > 0)
                                            @foreach($unconfirmed_ph->receiptUploads as $receipt)
                                                @if($receipt->provide_help_id == $unconfirmed_ph->merge->provide_help_id)
                                                    <button type="button"
                                                            class="btn btn-primary btn-sm waves-effect waves-light"
                                                            data-toggle="modal"
                                                            data-target=".gh-show-receipt-not-complete-modal-{{$receipt->token}}">
                                                        Show Receipt
                                                    </button>
                                                    @if(!$receipt->is_fake)
                                                        <button type="button"
                                                                class="btn btn-danger btn-sm waves-effect waves-light"
                                                                data-toggle="modal"
                                                                data-target=".gh-report-receipt-not-complete-modal-{{$receipt->token}}">
                                                            Report Receipt
                                                        </button>
                                                    @endif
                                                @else
                                                    <button type="button"
                                                            class="btn btn-danger btn-sm waves-effect waves-light" disabled>
                                                        No Receipt Yet
                                                    </button>
                                                @endif
                                            @endforeach
                                        @else
                                            <button type="button"
                                                    class="btn btn-danger btn-sm waves-effect waves-light" disabled>
                                                No Receipt Yet
                                            </button>
                                        @endif
                                    </td>
                                    <td>
                                        @if($unconfirmed_ph->receiptUploads->count() > 0)
                                            @foreach($unconfirmed_ph->receiptUploads as $receipt)
                                                @if($receipt->provide_help_id == $unconfirmed_ph->merge->provide_help_id)
                                                    @if(!$receipt->is_fake)
                                                        <button type="button"
                                                                class="btn btn-primary btn-sm waves-effect waves-light"
                                                                data-toggle="modal"
                                                                data-target=".gh-confirm-ph-confirmation-not-complete-modal-{{$unconfirmed_ph->token}}">
                                                            Confirm
                                                        </button>
                                                    @else
                                                        <b class="text-danger">Flagged as Fake</b>
                                                    @endif
                                                @else
                                                    <button type="button"
                                                            class="btn btn-primary btn-sm waves-effect waves-light"
                                                            data-toggle="modal"
                                                            data-target=".gh-confirm-ph-confirmation-not-complete-modal-{{$unconfirmed_ph->token}}">
                                                        Confirm
                                                    </button>
                                                @endif
                                            @endforeach
                                        @else
                                            <button type="button"
                                                    class="btn btn-primary btn-sm waves-effect waves-light"
                                                    data-toggle="modal"
                                                    data-target=".gh-confirm-ph-confirmation-not-complete-modal-{{$unconfirmed_ph->token}}">
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
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Get Help Summary</h4>
                        <hr>
                        <p class="card-title-desc">
                            Amount you requested to GH (Total amount) =
                            &#8358;{{number_format($gh_pending_amount)}}
                        </p>
                        <hr>
                        <p class="card-title-desc">
                            Amount paid (Completed Transaction) =
                            &#8358;{{number_format($gh_pending_amount_paid)}}
                        </p>
                        <hr>
                        <p class="card-title-desc">
                            Amount on processing (Merged but not completed) =
                            &#8358;{{number_format($gh_pending_amount_on_processing)}}
                        </p>
                        <hr>
                        <p class="card-title-desc">
                            Amount left to be paid (Not merged yet) =
                            &#8358;{{number_format($gh_pending_amount_left_to_balance)}}
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Get Help Important Notice</h4>
                        <hr>
                        <div class="card-title-desc">
                            <ol>
                                <li><b class="text-danger">Do not</b> <b class="text-primary">confirm</b> a user if he/she has not paid you.</li>
                                <li>You may <b class="text-primary">confirm</b> a user, without the user uploading receipt, <b class="text-danger">only if</b> you have seen his/her credit alert</li>
                                <li>If a user <b class="text-danger">uploads a fake receipt</b> and he/she has not paid you. You may <b class="text-danger">flag the receipt as fake</b> by clicking <b class="text-danger">report button</b>. <b class="text-primary">Admin will response</b> to the matter and <b class="text-danger">defaulter will be punished</b>. Note that report button is only available when receipt has been uploaded.</li>
                                <li>If a user <b class="text-danger">does not pay</b> you before merge expires, you be <b class="text-danger">automatically unmerged</b> from such user and you will be <b class="text-primary">re-merged</b> with another user</li>
                                <li>If multiple users were merged to pay you and one of them is <b class="text-danger">facing disciplinary actions</b>. You will be <b class="text-danger">unmerged</b> from such user and you will be <b class="text-primary">re-merged</b> with another user</li>
                            </ol>
                        </div>
                        <hr>
                        <b>Tip: You could call who you were merged with to notify
                            him/her that they have been merged to pay you.</b>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- end col -->
</div>
