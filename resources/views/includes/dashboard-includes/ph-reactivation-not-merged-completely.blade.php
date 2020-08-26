<div class="row">
    <div class="col-12">
        {{--PH Table--}}
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Congratulations!!!</h4>
                <p class="card-title-desc">You have been merged to pay the following
                    users
                </p>
                <div class="table-rep-plugin">
                    <div class="mb-0" data-pattern="priority-columns">
                        <table id="ph-activation-merge-datatable"
                               class="table table-bordered dt-responsive nowrap"
                               style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                            <thead>
                            <tr>
                                <th>Expires In</th>
                                <th>Name</th>
                                <th>Amount</th>
                                <th>Bank Name</th>
                                <th>Account No</th>
                                <th>Phone Number</th>
                                <th>Upload Receipt</th>
                            </tr>
                            </thead>
                            <tbody>
                            @foreach($ph_activation->unConfirmedGh as $unconfirmed_gh)
                                <tr>
                                    <td>
                                        <b>
                                            @if($unconfirmed_gh->receiptUploads->count() > 0)
                                                @if(\App\GetHelp::receiptExist($unconfirmed_gh, 'provide_help_id'))
                                                    @if(!\App\GetHelp::getKeyValue($unconfirmed_gh,'provide_help_id', 'is_fake'))
                                                        <span class="text-primary">Paid</span>
                                                    @else
                                                        <span class="text-primary">Paid</span>/<span
                                                            class="text-danger">Fake Receipt</span>
                                                    @endif
                                                @else
                                                    <div id="reactivation-merge-countdown"
                                                         class="text-danger"
                                                         data-countdown="{{\App\GetHelp::mergeExpiresAt($unconfirmed_gh)}}">
                                                    </div>
                                                @endif
                                            @else
                                                <div id="reactivation-merge-countdown"
                                                     class="text-danger"
                                                     data-countdown="{{\App\GetHelp::mergeExpiresAt($unconfirmed_gh)}}">
                                                </div>
                                            @endif
                                        </b>
                                    </td>
                                    <td>{{$unconfirmed_gh->user->bankDetail->full_name}}</td>
                                    <td>
                                        &#8358;{{number_format($unconfirmed_gh->merge->merge_amount)}}</td>
                                    <td>{{$unconfirmed_gh->user->bankDetail->bank_name}}</td>
                                    <td>{{$unconfirmed_gh->user->bankDetail->account_number}}</td>
                                    <td>{{$unconfirmed_gh->user->phone_number}}</td>
                                    <td>
                                        @if($unconfirmed_gh->receiptUploads->count() > 0)
                                            @if(\App\GetHelp::receiptExist($unconfirmed_gh, 'provide_help_id'))
                                                <button type="button"
                                                        class="btn btn-primary btn-sm waves-effect waves-light"
                                                        data-toggle="modal"
                                                        data-target=".ph-reactivation-not-complete-modal-{{\App\GetHelp::getKeyValue($unconfirmed_gh,'provide_help_id', 'token')}}">
                                                    View Receipt
                                                </button>
                                            @else
                                                <form
                                                    action="{{route('upload.payment.receipt', [$unconfirmed_gh->merge->provide_help_id, $unconfirmed_gh->merge->get_help_id])}}"
                                                    method="POST"
                                                    enctype='multipart/form-data'>
                                                    @csrf
                                                    <div
                                                        class="btn btn-outline-primary waves-effect btn-sm waves-light">
                                                                                                <span
                                                                                                    id="select-receipt-text-{{$unconfirmed_gh->token}}">Select Receipt</span>
                                                        <i class="fas fa-receipt"></i>
                                                        <input class="fileInput"
                                                               id="file-input-{{$unconfirmed_gh->token}}"
                                                               type="file"
                                                               name="receipt"/>
                                                    </div>
                                                    <button type="submit"
                                                            class="btn btn-secondary btn-sm waves-effect waves-light">
                                                        Upload
                                                    </button>
                                                </form>
                                            @endif
                                        @else
                                            <form
                                                action="{{route('upload.payment.receipt', [$unconfirmed_gh->merge->provide_help_id, $unconfirmed_gh->merge->get_help_id])}}"
                                                method="POST"
                                                enctype='multipart/form-data'>
                                                @csrf
                                                <div
                                                    class="btn btn-outline-primary waves-effect btn-sm waves-light">
                                                                                        <span
                                                                                            id="select-receipt-text-{{$unconfirmed_gh->token}}">Select Receipt</span>
                                                    <i class="fas fa-receipt"></i>
                                                    <input class="fileInput"
                                                           id="file-input-{{$unconfirmed_gh->token}}"
                                                           type="file"
                                                           name="receipt"/>
                                                </div>
                                                <button type="submit"
                                                        class="btn btn-secondary btn-sm waves-effect waves-light">
                                                    Upload
                                                </button>
                                            </form>
                                        @endif

                                        {{--<a href=""><i class="bx bx-file bx-sm"></i></a>--}}
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        {{--PH Merge Info--}}
        <div class="row">
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Provide Help Summary</h4>
                        <hr>
                        <p class="card-title-desc">
                            Amount you requested to PH (Total amount) =
                            &#8358;{{number_format($ph_activation_amount)}}
                        </p>
                        <hr>
                        <p class="card-title-desc">
                            Amount paid (Completed Transaction) =
                            &#8358;{{number_format($ph_activation_amount_paid)}}
                        </p>
                        <hr>
                        <p class="card-title-desc">
                            Amount on processing (Merged but not completed) =
                            &#8358;{{number_format($ph_activation_amount_on_processing)}}
                        </p>
                        <hr>
                        <p class="card-title-desc">
                            Amount left to be paid (Not merged yet) =
                            &#8358;{{number_format($ph_activation_amount_left_to_balance)}}
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Provide Help Important Notice</h4>
                        <hr>
                        <div class="card-title-desc">
                            <b class="text-warning">NOTICE: </b>Your Account will be
                            <b class="text-danger">suspended</b> if you do
                            not make payment
                            before merge <b class="text-danger">duration expires</b>
                            and reactivation of suspended account costs
                            <b class="text-danger">&#8358;{{number_format(3000)}}</b>.
                            If you are to pay multiple users, they will
                            be unmerged
                            from you automatically if you fail to pay one of them
                            before the merge
                            expires. Earliest merge will expire first.
                        </div>
                        <hr>
                        <b class="text-primary">Earliest Merge
                            expires {{$ph_activation_earliest_merge_expiration}}</b>
                        <hr>
                        <b>Tip: You could call who you were merged with to notify
                            him/her before proceeding with payment</b>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
