@extends('layouts.userApp')

@section('page-title')Secured Investment -Dashboard @endsection

@section('content')
    <div class="main-content">
        <div class="page-content">

            <div class="container-fluid">
                {{--Include top dashboard--}}
                @include('includes.top-dashboard-include')


                {{--START::::: Provide Help and Get Help Logics--}}
                @if(!auth()->user()->is_activated)
                    @if(auth()->user()->activation == 'first')
                        @if($ph_activation)
                            @if(!$ph_activation->is_merged)
                                @if($ph_activation->getHelps->count() > 0)
                                    {{--PH Activation NOT Merged completely Table--}}
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
                                                                                <div id="activation-merge-countdown"
                                                                                     class="text-danger"
                                                                                     data-countdown="{{\Carbon\Carbon::parse($unconfirmed_gh->merge->expires_at)->format('Y/m/d H:i:s')}}"></div>
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
                                                                                @foreach($unconfirmed_gh->receiptUploads as $receipt)
                                                                                    @if($receipt->provide_help_id == $unconfirmed_gh->merge->provide_help_id)
                                                                                        <button type="button"
                                                                                                class="btn btn-primary btn-sm waves-effect waves-light"
                                                                                                data-toggle="modal"
                                                                                                data-target=".{{$receipt->token}}">
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
                                                                                @endforeach
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
                                @else
                                    {{--Pending First Activation Fee--}}
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="card">
                                                <div class="card-body">
                                                    <div class="pt-4 pl-2">
                                                        {{--Pending First Activation Fee--}}
                                                        <h4 class="card-title pt-4">Pending Activation Fee Request</h4>
                                                        <p>
                                                            Your request to Provide Help of
                                                            <b>&#8358;{{number_format($ph_activation->amount)}}
                                                                (Activation Fee)</b> is
                                                            Pending. You will be merged very soon.
                                                            However, if you like to change your mind, you can cancel
                                                            your
                                                            request to provide
                                                            help. Please note that <b>Activation Fee</b> attracts no
                                                            profit.
                                                            <a style="color: #fff" class="btn btn-danger mt-2"
                                                               data-toggle="modal"
                                                               data-target=".first-activation-cancel-confirmation">Cancel
                                                                PH</a>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @elseif($ph_activation->is_merged)
                                {{--PH Activation Merged Tabled--}}
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
                                                                            <div id="activation-merge-countdown"
                                                                                 class="text-danger"
                                                                                 data-countdown="{{\Carbon\Carbon::parse($unconfirmed_gh->merge->expires_at)->format('Y/m/d H:i:s')}}"></div>
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
                                                                            @foreach($unconfirmed_gh->receiptUploads as $receipt)
                                                                                @if($receipt->provide_help_id == $unconfirmed_gh->merge->provide_help_id)
                                                                                    <button type="button"
                                                                                            class="btn btn-primary btn-sm waves-effect waves-light"
                                                                                            data-toggle="modal"
                                                                                            data-target=".{{$receipt->token}}">
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
                                                                            @endforeach
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
                                                                                           type="file" name="receipt"/>
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
                            @endif
                        @else
                            {{--Activate Your Account--}}
                            <div class="row">
                                <div class="col-lg-12 pt-5 pb-5">
                                    <div class="card card-body pb-5">
                                        <h1 class="card-title mt-0 text-center">Welcome to Secured Investment</h1>
                                        <p class="card-text text-center">Get Started Now by Activating your account to
                                            get full
                                            access to our investment services. Activation costs <strong>&#8358;1,000
                                                only</strong>.
                                        </p>

                                        <div class="text-center">
                                            <button type="button" class="btn btn-primary waves-effect waves-light"
                                                    data-toggle="modal" data-target=".activation-confirmation-modal"
                                                    aria-pressed="false">
                                                Activate
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @elseif(auth()->user()->activation == 'subsequent')
                        @if($ph_activation)
                            @if(!$ph_activation->is_merged)
                                @if($ph_activation->getHelps->count() > 0)
                                    {{--PH Reactivation NOT Merged completely Table--}}
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
                                                                                <div id="activation-merge-countdown"
                                                                                     class="text-danger"
                                                                                     data-countdown="{{\Carbon\Carbon::parse($unconfirmed_gh->merge->expires_at)->format('Y/m/d H:i:s')}}"></div>
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
                                                                                @foreach($unconfirmed_gh->receiptUploads as $receipt)
                                                                                    @if($receipt->provide_help_id == $unconfirmed_gh->merge->provide_help_id)
                                                                                        <button type="button"
                                                                                                class="btn btn-primary btn-sm waves-effect waves-light"
                                                                                                data-toggle="modal"
                                                                                                data-target=".{{$receipt->token}}">
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
                                                                                @endforeach
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
                                @else
                                    {{--REACTIVATION PENDING--}}
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="card">
                                                <div class="card-body">

                                                    <h4 class="card-title pt-4">Pending Reactivation Fee Request</h4>
                                                    <div class="pt-4 pl-2">
                                                        <p class="">Your request to Provide Help of
                                                            <b>&#8358;{{number_format($ph_activation->amount)}}
                                                                (Reactivation Fee)</b> is
                                                            Pending. You will be merged very soon.
                                                            However, if you like to change your mind, you can cancel
                                                            your
                                                            request to provide
                                                            help. Please note that <b>Reactivation Fee</b> attracts no
                                                            profit.
                                                            <a style="color: #fff" class="btn btn-danger mt-2"
                                                               data-toggle="modal"
                                                               data-target=".subsequent-activation-cancel-confirmation">Cancel
                                                                PH</a></p>

                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endif
                            @elseif($ph_activation->is_merged)
                                {{--PH Reactivation Merged Table--}}
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
                                                                            <div id="activation-merge-countdown"
                                                                                 class="text-danger"
                                                                                 data-countdown="{{\Carbon\Carbon::parse($unconfirmed_gh->merge->expires_at)->format('Y/m/d H:i:s')}}"></div>
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
                                                                            @foreach($unconfirmed_gh->receiptUploads as $receipt)
                                                                                @if($receipt->provide_help_id == $unconfirmed_gh->merge->provide_help_id)
                                                                                    <button type="button"
                                                                                            class="btn btn-primary btn-sm waves-effect waves-light"
                                                                                            data-toggle="modal"
                                                                                            data-target=".{{$receipt->token}}">
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
                                                                            @endforeach
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
                                                                                           type="file" name="receipt"/>
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
                            @endif
                        @else
                            {{--Reactivate Your Account--}}
                            <div class="row">
                                <div class="col-lg-12 pt-5 pb-5">
                                    <div class="card card-body pb-5">
                                        <h1 class="card-title mt-0 text-center">Subscription Expired!</h1>
                                        <p class="card-text text-center">Your subscription has expired. Reactivation is
                                            only 5% of the profit on your total Get Help (including Referral Bonus) in
                                            the past 30days.<br>
                                            Total profit on GH (including Referral Bonus) in 30days:
                                            <b class="text-danger">&#8358;{{number_format($user_profit_for_the_month)}}</b>
                                            <br>Reactivation Fee:
                                            <strong class="text-primary">&#8358;{{number_format($user_reactivation_fee)}}</strong>.
                                        </p>

                                        <div class="text-center">
                                            <button type="button" class="btn btn-primary waves-effect waves-light"
                                                    data-toggle="modal" data-target=".reactivation-confirmation-modal"
                                                    aria-pressed="false">
                                                Reactivate
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endif
                @else
                    @if(auth()->user()->is_blocked)
                        {{--Account Blocked--}}
                        <div class="row">
                            <div class="col-lg-12 pt-5 pb-5">
                                <div class="card card-body pb-5">
                                    <h1 class="card-title mt-0 text-center text-danger">Account Sanctioned !!!</h1>
                                    <p class="card-text text-center">Your account has been sanctioned. This is usually due to
                                        failure to provide help to user(s) you have been merged to pay or you have disobeyed
                                        Secured Investment rule(s). Sanction fee is <strong
                                            class="text-primary">&#8358;{{number_format(3000)}} </strong>only. Make payment now
                                        to get full access to our investment services. Note that sanction fine attracts no
                                        profit.</p>

                                    <div class="text-center">
                                        <button type="button" class="btn btn-primary waves-effect waves-light"
                                                data-toggle="modal" data-target=".account-sanctioned-confirmation-modal">
                                            Pay Sanction Fine
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @elseif($ph_pending)
                        @if(!$ph_pending->is_merged)
                            @if($ph_pending->getHelps->count() > 0)
                                {{--Regular PH NOT Merged completely Table--}}
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
                                                            @foreach($ph_pending->unConfirmedGh as $unconfirmed_gh)
                                                                <tr>
                                                                    <td>
                                                                        <b>
                                                                            <div id="activation-merge-countdown"
                                                                                 class="text-danger"
                                                                                 data-countdown="{{\Carbon\Carbon::parse($unconfirmed_gh->merge->expires_at)->format('Y/m/d H:i:s')}}"></div>
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
                                                                            @foreach($unconfirmed_gh->receiptUploads as $receipt)
                                                                                @if($receipt->provide_help_id == $unconfirmed_gh->merge->provide_help_id)
                                                                                    <button type="button"
                                                                                            class="btn btn-primary btn-sm waves-effect waves-light"
                                                                                            data-toggle="modal"
                                                                                            data-target=".{{$receipt->token}}">
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
                                                                            @endforeach
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
                                                            &#8358;{{number_format($ph_pending_amount)}}
                                                        </p>
                                                        <hr>
                                                        <p class="card-title-desc">
                                                            Amount paid (Completed Transaction) =
                                                            &#8358;{{number_format($ph_pending_amount_paid)}}
                                                        </p>
                                                        <hr>
                                                        <p class="card-title-desc">
                                                            Amount on processing (Merged but not completed) =
                                                            &#8358;{{number_format($ph_pending_amount_on_processing)}}
                                                        </p>
                                                        <hr>
                                                        <p class="card-title-desc">
                                                            Amount left to be paid (Not merged yet) =
                                                            &#8358;{{number_format($ph_pending_amount_left_to_balance)}}
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
                                                            expires {{$ph_earliest_merge_expiration}}</b>
                                                        <hr>
                                                        <b>Tip: You could call who you were merged with to notify
                                                            him/her before proceeding with payment</b>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @else
                                {{--Pending Provide Help--}}
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="card-title pt-4">Pending Provide Help Request</h4>
                                                <div class="pt-4 pl-2">
                                                    <p class="">Your request to Provide Help of
                                                        <b class="text-primary">&#8358;{{number_format($ph_pending->amount)}}</b> is Pending.
                                                        You will be
                                                        merged very soon.
                                                        However, if you like to change your mind, you can cancel your
                                                        request to provide
                                                        help.
                                                        <a style="color: #fff" class="btn btn-danger mt-2"
                                                                 data-toggle="modal"
                                                                 data-target=".ph-cancel-confirmation">
                                                            Cancel PH
                                                        </a>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endif
                        @elseif($ph_pending->is_merged)
                            {{--Regular PH Merged Table--}}
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
                                                        @foreach($ph_pending->unConfirmedGh as $unconfirmed_gh)
                                                            <tr>
                                                                <td>
                                                                    <b>
                                                                        <div id="activation-merge-countdown"
                                                                             class="text-danger"
                                                                             data-countdown="{{\Carbon\Carbon::parse($unconfirmed_gh->merge->expires_at)->format('Y/m/d H:i:s')}}"></div>
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
                                                                        @foreach($unconfirmed_gh->receiptUploads as $receipt)
                                                                            @if($receipt->provide_help_id == $unconfirmed_gh->merge->provide_help_id)
                                                                                <button type="button"
                                                                                        class="btn btn-primary btn-sm waves-effect waves-light"
                                                                                        data-toggle="modal"
                                                                                        data-target=".{{$receipt->token}}">
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
                                                                        @endforeach
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
                                                        &#8358;{{number_format($ph_pending_amount)}}
                                                    </p>
                                                    <hr>
                                                    <p class="card-title-desc">
                                                        Amount paid (Completed Transaction) =
                                                        &#8358;{{number_format($ph_pending_amount_paid)}}
                                                    </p>
                                                    <hr>
                                                    <p class="card-title-desc">
                                                        Amount on processing (Merged but not completed) =
                                                        &#8358;{{number_format($ph_pending_amount_on_processing)}}
                                                    </p>
                                                    <hr>
                                                    <p class="card-title-desc">
                                                        Amount left to be paid (Not merged yet) =
                                                        &#8358;{{number_format($ph_pending_amount_left_to_balance)}}
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
                                                        expires {{$ph_earliest_merge_expiration}}</b>
                                                    <hr>
                                                    <b>Tip: You could call who you were merged with to notify
                                                        him/her before proceeding with payment</b>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endif
                    @elseif($gh_pending)
                        @if(!$gh_pending->is_merged)
                            @if($gh_pending->provideHelps->count() > 0)
                                @foreach($gh_pending->unConfirmedPh as $unconfirmed_ph)
                                    {{$unconfirmed_ph->merge->merge_amount}}
                                    <b>
                                        <div id="gh-merge-countdown" class="text-danger"
                                             data-countdown="{{\Carbon\Carbon::parse($unconfirmed_ph->merge->expires_at)->format('Y/m/d H:i:s')}}"></div>
                                    </b>
                                    {{$unconfirmed_ph->user->username}}
                                @endforeach
                                {{$gh_pending_amount_left_to_balance}}
                                {{$gh_pending_amount}}
                                {{$gh_pending_amount_on_processing}}
                                {{$gh_pending_amount_paid}}
                                gh amount left to be paid = x   amount on processing = y amount paid = z
                                Then remaining pending ph to balance up
                                balance = amount - getHelps
                                kkkkkkkkkkkkk
                                {{$gh_earliest_merge_expiration}}
                                <b>
                                    <div id="gh-merge-countdown" class="text-danger"
                                         data-countdown="2030/08/20 19:02:59"></div>
                                </b>
                                <b>
                                    <div id="ph-merge-countdown" class="text-danger"
                                         data-countdown="2090/08/20 19:02:49"></div>
                                </b>
                                <b>
                                    <div id="activation-merge-countdown" class="text-danger"
                                         data-countdown="2028/08/20 19:02:39"></div>
                                </b>

                            @else
                                <div class="row">
                                    <div class="col-lg-12">
                                        <div class="card">
                                            <div class="card-body">

                                                <h4 class="card-title pt-4">Pending Get Help Request</h4>

                                                <div class="pt-4 pl-2">
                                                    <p class="">Your request to Get Help of
                                                        <b class="text-primary">
                                                            &#8358;{{number_format($gh_pending->amount)}}
                                                        </b> is Pending.
                                                        You will be
                                                        merged very soon. However,
                                                        if you like to change your mind, you can cancel your request to
                                                        get
                                                        help. <a
                                                            href="" class="btn btn-danger mt-2" data-toggle="modal"
                                                            data-target=".gh-cancel-confirmation">Cancel GH</a></p>
                                                </div>

                                            </div>
                                        </div>


                                    </div>
                                </div>
                            @endif
                        @elseif($gh_pending->is_merged)
                            Get Help Merged
                        @endif
                    @endif
                @endif
                {{--END::::: Provide Help and Get Help Logics--}}



                {{--Include last five transaction--}}
                @include('includes.last-five-transaction-include')
            </div>
            <!-- end main content-->
        </div>
    </div>

























    {{--MODALS--}}
    {{--MODALS--}}
    {{--MODALS--}}
    {{--MODALS--}}
    {{--MODALS--}}
    {{--MODALS--}}
    {{--MODALS--}}
    {{--MODALS--}}
    {{--MODALS--}}
    {{--MODALS--}}
    {{--MODALS--}}
    {{--MODALS--}}
    {{--MODALS--}}
    @if(!auth()->user()->is_activated)
        @if(auth()->user()->activation == 'first')
            @if($ph_activation)
                @if(!$ph_activation->is_merged)
                    @if($ph_activation->getHelps->count() > 0)
                        {{--PH First Activation NOT Merged completely Table--}}
                        @foreach($ph_activation->unConfirmedGh as $unconfirmed_gh)
                            @if($unconfirmed_gh->receiptUploads->count() > 0)
                                @foreach($unconfirmed_gh->receiptUploads as $receipt)
                                    @if($receipt->provide_help_id == $unconfirmed_gh->merge->provide_help_id)
                                        {{--PH First Activation NOT Merged completely Table--}}
                                        <!--PH RECEIPT MODAL -->
                                        <div class="modal fade {{$receipt->token}}" tabindex="-1" role="dialog"
                                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Payment receipt
                                                            from <b
                                                                class="text-primary">{{$receipt->provideHelp->user->username}}</b>
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
                                    @endif
                                @endforeach
                            @endif
                        @endforeach
                    @else
                        {{--Pending First Activation Fee--}}
                        {{--CANCEL PENDING FIRST ACTIVATION FEE MODAL--}}
                        <div class="modal fade first-activation-cancel-confirmation"
                             tabindex="-1" role="dialog"
                             aria-labelledby="mySmallModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title mt-0">Cancel <b>Activation
                                                Fee</b> PH Confirmation</h5>
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
                                                <h5><strong>Are you sure you want to
                                                        cancel
                                                        your Provide Help
                                                        Request (<b>Activation Fee
                                                            of
                                                            &#8358;{{number_format($ph_activation->amount)}}</b>)
                                                        ? </strong>
                                                </h5>
                                            </div>
                                            <div class="swal2-content"
                                                 style="display: block;">You won't be
                                                able
                                                to revert this!
                                            </div>
                                            <div class="swal2-actions">
                                                <button type="button"
                                                        class="swal2-cancel swal2-styled btn-danger"
                                                        style="display: inline-block;"
                                                        data-dismiss="modal">Close
                                                </button>
                                                <form
                                                    action="{{route('cancel.activation.fee', $ph_activation->token)}}"
                                                    method="POST">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="button "
                                                            class="swal2-confirm swal2-styled btn-success"
                                                            style="display: inline-block;">
                                                        Yes,
                                                        Cancel Request
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div>
                    @endif
                @elseif($ph_activation->is_merged)
                    @foreach($ph_activation->unConfirmedGh as $unconfirmed_gh)
                        @if($unconfirmed_gh->receiptUploads->count() > 0)
                            @foreach($unconfirmed_gh->receiptUploads as $receipt)
                                @if($receipt->provide_help_id == $unconfirmed_gh->merge->provide_help_id)
                                    {{--PH First Activation Merged Table--}}
                                    <!--PH RECEIPT MODAL -->
                                    <div class="modal fade {{$receipt->token}}" tabindex="-1" role="dialog"
                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Payment receipt from
                                                        <b class="text-primary">{{$receipt->provideHelp->user->username}}</b>
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
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                @endif
            @else
                {{--ACTIVATE ACCOUNT CONFIRMATION MODAL--}}
                <div class="modal fade activation-confirmation-modal" tabindex="-1" role="dialog"
                     aria-labelledby="mySmallModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title mt-0">Activate Account Confirmation</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <div class="text-center">
                                    <div class="swal2-icon swal2-warning swal2-animate-warning-icon"
                                         style="display: flex;"></div>
                                    <div class="swal2-header">
                                        <h5><strong>Are you sure you want to pay activation fee of &#8358;1,000
                                                to activate your
                                                account ?</strong></h5>
                                    </div>
                                    <div class="swal2-content" style="display: block;">You won't be able to
                                        revert this!
                                    </div>
                                    <div class="swal2-actions">
                                        <button type="button" class="swal2-cancel swal2-styled btn-danger"
                                                style="display: inline-block;" data-dismiss="modal">Close
                                        </button>
                                        <form action="{{route('pay.activation.fee')}}" method="POST">
                                            @csrf
                                            <button type="submit"
                                                    class="swal2-confirm swal2-styled btn-success"
                                                    style="display: inline-block;">Yes, Proceed
                                            </button>
                                        </form>
                                    </div>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->
                    </div>
                </div>
            @endif
        @elseif(auth()->user()->activation == 'subsequent')
            @if($ph_activation)
                @if(!$ph_activation->is_merged)
                    @if($ph_activation->getHelps->count() > 0)
                        {{--PH Reactivation NOT Merged completely Table--}}
                        <!--PH RECEIPT MODAL -->
                        @foreach($ph_activation->unConfirmedGh as $unconfirmed_gh)
                            @if($unconfirmed_gh->receiptUploads->count() > 0)
                                @foreach($unconfirmed_gh->receiptUploads as $receipt)
                                    @if($receipt->provide_help_id == $unconfirmed_gh->merge->provide_help_id)
                                        {{--PH Reactivation NOT Merged completely Table--}}
                                        <!--PH RECEIPT MODAL -->
                                        <div class="modal fade {{$receipt->token}}" tabindex="-1" role="dialog"
                                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">Payment receipt
                                                            from <b
                                                                class="text-primary">{{$receipt->provideHelp->user->username}}</b>
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
                                    @endif
                                @endforeach
                            @endif
                        @endforeach
                    @else
                        {{--CANCEL REACTIVATION CONFIRMATION MODAL--}}
                        <div
                            class="modal fade subsequent-activation-cancel-confirmation"
                            tabindex="-1" role="dialog"
                            aria-labelledby="mySmallModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title mt-0">Provide Help (<b>Reactivation
                                                Fee</b>) Confirmation</h5>
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
                                                    <strong>Are you sure you want to
                                                        cancel
                                                        your Provide Help
                                                        Request (
                                                        <b>Reactivation Fee:
                                                            &#8358;{{number_format($ph_activation->amount)}}</b>)?
                                                    </strong>
                                                </h5>
                                            </div>
                                            <div class="swal2-content"
                                                 style="display: block;">You won't be
                                                able
                                                to revert this!
                                            </div>
                                            <div class="swal2-actions">
                                                <button type="button"
                                                        class="swal2-cancel swal2-styled btn-danger"
                                                        style="display: inline-block;"
                                                        data-dismiss="modal">Close
                                                </button>
                                                <button type="button "
                                                        class="swal2-confirm swal2-styled btn-success"
                                                        style="display: inline-block;">
                                                    Yes,
                                                    Cancel Request
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div>
                    @endif
                @elseif($ph_activation->is_merged)
                    {{--PH Reactivation Merged Table--}}
                    <!--PH RECEIPT MODAL -->
                    @foreach($ph_activation->unConfirmedGh as $unconfirmed_gh)
                        @if($unconfirmed_gh->receiptUploads->count() > 0)
                            @foreach($unconfirmed_gh->receiptUploads as $receipt)
                                @if($receipt->provide_help_id == $unconfirmed_gh->merge->provide_help_id)
                                    {{--PH Reactivation Merged Table--}}
                                    <!--PH RECEIPT MODAL -->
                                    <div class="modal fade {{$receipt->token}}" tabindex="-1" role="dialog"
                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Payment receipt from
                                                        <b class="text-primary">{{$receipt->provideHelp->user->username}}</b>
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
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                @endif
            @else
                {{--Reactivate Your Account--}}
                {{--REACTIVATE ACCOUNT CONFIRMATION MODAL--}}
                <div class="modal fade reactivation-confirmation-modal" tabindex="-1" role="dialog"
                     aria-labelledby="mySmallModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title mt-0">Reactivate Account Confirmation</h5>
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
                                            <strong>Are you sure you want to pay reactivation fee of
                                                <b class="text-primary">&#8358;{{number_format($user_reactivation_fee)}}</b> to reactivate your
                                                account ?
                                            </strong>
                                        </h5>
                                    </div>
                                    <div class="swal2-content" style="display: block;">You won't be able to
                                        revert this!
                                    </div>
                                    <div class="swal2-actions">
                                        <button type="button" class="swal2-cancel swal2-styled btn-danger"
                                                style="display: inline-block;" data-dismiss="modal">Close
                                        </button>
                                        <form action="{{route('pay.reactivation.fee')}}" method="POST">
                                            @csrf
                                            <input type="hidden" value="{{$user_reactivation_fee}}" name="reactivation_fee">
                                            <button type="submit"
                                                    class="swal2-confirm swal2-styled btn-success"
                                                    style="display: inline-block;">Yes, Proceed
                                            </button>
                                        </form>
                                    </div>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div><!-- /.modal -->
                    </div>
                </div>
            @endif
        @endif
    @else
        @if(auth()->user()->is_blocked)
            {{--Account Blocked--}}
            {{--ACCOUNT SANCTIONED CONFIRMATION MODAL--}}
            <div class="modal fade account-sanctioned-confirmation-modal" tabindex="-1" role="dialog"
                 aria-labelledby="mySmallModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title mt-0">Sanction Fine Confirmation</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="text-center">
                                <div class="swal2-icon swal2-warning swal2-animate-warning-icon"
                                     style="display: flex;"></div>
                                <div class="swal2-header">
                                    <h5><strong>Are you sure you want to pay sanction fine of <strong
                                                class="text-primary">&#8358;{{number_format(3000)}} </strong>
                                            to reactivate your account ? </strong></h5>
                                </div>
                                <div class="swal2-content" style="display: block;">You won't be able to
                                    revert this!
                                </div>
                                <div class="swal2-actions">
                                    <button type="button"
                                            class="swal2-cancel swal2-styled btn-danger"
                                            style="display: inline-block;"
                                            data-dismiss="modal">Close
                                    </button>
                                    <form action="{{route('pay.sanction.fine')}}" method="POST">
                                        @csrf
                                        <button type="submit"
                                                class="swal2-confirm swal2-styled btn-success"
                                                style="display: inline-block;">Yes, Proceed
                                        </button>
                                    </form>
                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div><!-- /.modal -->
                </div>
            </div>
        @elseif($ph_pending)
            @if(!$ph_pending->is_merged)
                @if($ph_pending->getHelps->count() > 0)
                    {{-- Regular PH NOT Merged completely Table--}}
                    @foreach($ph_pending->unConfirmedGh as $unconfirmed_gh)
                        @if($unconfirmed_gh->receiptUploads->count() > 0)
                            @foreach($unconfirmed_gh->receiptUploads as $receipt)
                                @if($receipt->provide_help_id == $unconfirmed_gh->merge->provide_help_id)
                                    {{--Regular PH NOT Merged completely Table--}}
                                    <!--PH RECEIPT MODAL -->
                                    <div class="modal fade {{$receipt->token}}" tabindex="-1" role="dialog"
                                         aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Payment receipt
                                                        from <b
                                                            class="text-primary">{{$receipt->provideHelp->user->username}}</b>
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
                                @endif
                            @endforeach
                        @endif
                    @endforeach
                @else
                    {{--Pending Provide Help Request--}}
                    {{--CANCEL PROVIDE HELP CONFIRMATION MODAL--}}
                    <div class="modal fade ph-cancel-confirmation" tabindex="-1"
                         role="dialog"
                         aria-labelledby="mySmallModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title mt-0">Cancel Provide Help
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
                                                <strong>Are you sure you want to cancel
                                                    your request to
                                                    Provide Help of
                                                    <b class="text-primary">
                                                        &#8358;{{number_format($ph_pending->amount)}}
                                                    </b>
                                                    ?
                                                </strong></h5>
                                        </div>
                                        <div class="swal2-content"
                                             style="display: block;">
                                            You won't be able
                                            to revert this!
                                        </div>
                                        <div class="swal2-actions">
                                            <button type="button"
                                                    class="swal2-cancel swal2-styled btn-danger"
                                                    style="display: inline-block;"
                                                    data-dismiss="modal">Close
                                            </button>
                                            <form action="{{route('cancel.provide.help', $ph_pending->token)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                        class="swal2-confirm swal2-styled btn-success"
                                                        style="display: inline-block;">Yes,
                                                    Cancel Request
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div><!-- /.modal-content -->
                        </div><!-- /.modal-dialog -->
                    </div>
                @endif
            @elseif($ph_pending->is_merged)
                {{-- Regular PH Merged Table--}}
                @foreach($ph_pending->unConfirmedGh as $unconfirmed_gh)
                    @if($unconfirmed_gh->receiptUploads->count() > 0)
                        @foreach($unconfirmed_gh->receiptUploads as $receipt)
                            @if($receipt->provide_help_id == $unconfirmed_gh->merge->provide_help_id)
                                {{--Regular PH Merged Table--}}
                                <!--PH RECEIPT MODAL -->
                                <div class="modal fade {{$receipt->token}}" tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Payment receipt
                                                    from <b
                                                        class="text-primary">{{$receipt->provideHelp->user->username}}</b>
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
                            @endif
                        @endforeach
                    @endif
                @endforeach
            @endif
        @elseif($gh_pending)
            @if(!$gh_pending->is_merged)
                @if($gh_pending->provideHelps->count() > 0)
                    @foreach($gh_pending->unConfirmedPh as $unconfirmed_ph)
                        {{$unconfirmed_ph->merge->merge_amount}}
                        <b>
                            <div id="gh-merge-countdown" class="text-danger"
                                 data-countdown="{{\Carbon\Carbon::parse($unconfirmed_ph->merge->expires_at)->format('Y/m/d H:i:s')}}"></div>
                        </b>
                        {{$unconfirmed_ph->user->username}}
                    @endforeach
                    {{$gh_pending_amount_left_to_balance}}
                    {{$gh_pending_amount}}
                    {{$gh_pending_amount_on_processing}}
                    {{$gh_pending_amount_paid}}
                    gh amount left to be paid = x   amount on processing = y amount paid = z
                    Then remaining pending ph to balance up
                    balance = amount - getHelps
                    kkkkkkkkkkkkk
                    {{$gh_earliest_merge_expiration}}
                    <b>
                        <div id="gh-merge-countdown" class="text-danger"
                             data-countdown="2030/08/20 19:02:59"></div>
                    </b>
                    <b>
                        <div id="ph-merge-countdown" class="text-danger"
                             data-countdown="2090/08/20 19:02:49"></div>
                    </b>
                    <b>
                        <div id="activation-merge-countdown" class="text-danger"
                             data-countdown="2028/08/20 19:02:39"></div>
                    </b>

                @else
                    {{--Pending Get Help Request--}}
                    {{--CANCEL GET HELP CONFIRMATION MODAL--}}
                    <div class="modal fade gh-cancel-confirmation" tabindex="-1"
                         role="dialog"
                         aria-labelledby="mySmallModalLabel" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title mt-0">Cancel Get Help
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
                                                <strong>Are you sure you want to cancel
                                                    your request to
                                                    Get Help of
                                                    <b class="text-primary">
                                                        &#8358;{{number_format($gh_pending->amount)}}
                                                    </b>?
                                                </strong>
                                            </h5>
                                        </div>
                                        <div class="swal2-content"
                                             style="display: block;">
                                            You won't be able
                                            to revert this!
                                        </div>
                                        <div class="swal2-actions">
                                            <button type="button"
                                                    class="swal2-cancel swal2-styled btn-danger"
                                                    style="display: inline-block;"
                                                    data-dismiss="modal">Close
                                            </button>
                                            <form action="{{route('cancel.get.help', $gh_pending->token)}}" method="POST">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit"
                                                        class="swal2-confirm swal2-styled btn-success"
                                                        style="display: inline-block;">Yes,
                                                    Cancel Request
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.modal-dialog -->
                    </div>
                @endif
            @elseif($gh_pending->is_merged)
                Get Help Merged
            @endif
        @endif
    @endif
@endsection

@section('js')
    <!-- Countdown js-->
    <script src="{{asset('assets/libs/jquery-countdown/jquery.countdown.min.js')}}"></script>
    <script>
        $(document).ready(function () {
            var ph_activation = {!! json_encode($ph_activation?$ph_activation->unConfirmedGh:null) !!};
            if (ph_activation) {
                $.each(ph_activation, function (key, valueObj) {
                    $(document).on("input", '#file-input-' + valueObj.token, function () {
                        var file = $(this)[0].files[0]
                        if (file) {
                            var fileName = file.name;
                            var fileExtension = fileName.substr(fileName.lastIndexOf('.') + 1);
                            if (fileName.length > 10) fileName = fileName.substring(0, 5) + "..." + fileExtension;
                            $("div>span#select-receipt-text-" + valueObj.token).html(fileName);
                        }
                    })
                });
            }

            var ph_pending = {!! json_encode($ph_pending?$ph_pending->unConfirmedGh:null) !!};
            if (ph_pending) {
                $.each(ph_pending, function (key, valueObj) {
                    $(document).on("input", '#file-input-' + valueObj.token, function () {
                        var file = $(this)[0].files[0]
                        if (file) {
                            var fileName = file.name;
                            var fileExtension = fileName.substr(fileName.lastIndexOf('.') + 1);
                            if (fileName.length > 10) fileName = fileName.substring(0, 5) + "..." + fileExtension;
                            $("div>span#select-receipt-text-" + valueObj.token).html(fileName);
                        }
                    })
                });
            }

            var gh_pending = {!! json_encode($gh_pending?$gh_pending->unConfirmedPh:null) !!};
            if (gh_pending) {
                $.each(gh_pending, function (key, valueObj) {
                    $(document).on("input", '#file-input-' + valueObj.token, function () {
                        var file = $(this)[0].files[0]
                        if (file) {
                            var fileName = file.name;
                            var fileExtension = fileName.substr(fileName.lastIndexOf('.') + 1);
                            if (fileName.length > 10) fileName = fileName.substring(0, 5) + "..." + fileExtension;
                            $("div>span#select-receipt-text-" + valueObj.token).html(fileName);
                        }
                    })
                });
            }
        })

        $('div#activation-merge-countdown[data-countdown]').each(function () {
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
                $(this).html('Activation expired')
                    .parent().addClass('disabled');
            });
        });
        $('div#ph-merge-countdown[data-countdown]').each(function () {
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
                $(this).html('PH expired')
                    .parent().addClass('disabled');
            });
        });
        $('div#gh-merge-countdown[data-countdown]').each(function () {
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
                $(this).html('GH expired')
                    .parent().addClass('disabled');
            });
        });

        /*PH activation merge DataTable*/
        $('#ph-activation-merge-datatable').DataTable();

    </script>
@endsection

@section('css')
    <style>
        .fileInput {
            cursor: pointer;
            height: 100%;
            position: absolute;
            top: 0;
            right: 0;
            z-index: 99;
            /*This makes the button huge. If you want a bigger button, increase the font size*/
            font-size: 50px;
            /*Opacity settings for all browsers*/
            opacity: 0;
            -moz-opacity: 0;
            filter: progid:DXImageTransform.Microsoft.Alpha(opacity=0)
        }
    </style>
@endsection
