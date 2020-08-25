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
                                    @include('includes.dashboard-includes.ph-activation-not-merged-completely')
                                @else
                                    {{--Pending First Activation Fee--}}
                                    @include('includes.dashboard-includes.ph-pending-first-activation-fee')
                                @endif
                            @elseif($ph_activation->is_merged)
                                {{--PH Activation Merged Tabled--}}
                                @include('includes.dashboard-includes.ph-activation-merged')
                            @endif
                        @else
                            {{--Activate Your Account--}}
                            @include('includes.dashboard-includes.activate-your-account')
                        @endif
                    @elseif(auth()->user()->activation == 'subsequent')
                        @if($ph_activation)
                            @if(!$ph_activation->is_merged)
                                @if($ph_activation->getHelps->count() > 0)
                                    {{--PH Reactivation NOT Merged completely Table--}}
                                    @include('includes.dashboard-includes.ph-reactivation-not-merged-completely')
                                @else
                                    {{--PH Pending Reactivation --}}
                                    @include('includes.dashboard-includes.ph-pending-reactivation')
                                @endif
                            @elseif($ph_activation->is_merged)
                                {{--PH Reactivation Merged Table--}}
                                @include('includes.dashboard-includes.ph-reactivation-merged')
                            @endif
                        @else
                            {{--Reactivate Your Account--}}
                            @include('includes.dashboard-includes.reactivate-your-account')
                        @endif
                    @endif
                @else
                    @if(auth()->user()->is_blocked)
                        {{--Account Blocked--}}
                        @include('includes.dashboard-includes.account-blocked')
                    @elseif($ph_pending)
                        @if(!$ph_pending->is_merged)
                            @if($ph_pending->getHelps->count() > 0)
                                {{--PH NOT Merged completely Table--}}
                                @include('includes.dashboard-includes.ph-not-merged-completely')
                            @else
                                {{--Provide Help Pending--}}
                                @include('includes.dashboard-includes.ph-pending')
                            @endif
                        @elseif($ph_pending->is_merged)
                            {{--PH Merged Table--}}
                            @include('includes.dashboard-includes.ph-merged')
                        @endif
                    @elseif($gh_pending)
                        @if(!$gh_pending->is_merged)
                            @if($gh_pending->provideHelps->count() > 0)
                                {{--Get Help Not Merged Completely--}}
                                @include('includes.dashboard-includes.gh-not-merged-completely')
                            @else
                                {{--Pending Get Help Request--}}
                                @include('includes.dashboard-includes.gh-pending')
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
                                        <div class="modal fade ph-activation-not-complete-modal-{{$receipt->token}}" tabindex="-1" role="dialog"
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
                                        <h5 class="modal-title mt-0">Cancel <b class="text-primary">Activation
                                                Fee</b> Confirmation</h5>
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
                                                        Request (<b class="text-primary">Activation Fee
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
                                    <div class="modal fade ph-activation-merged-modal-{{$receipt->token}}" tabindex="-1" role="dialog"
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
                                        <h5><strong>Are you sure you want to pay activation fee of
                                                <b class="text-primary">&#8358;1,000</b>
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
                                        <div class="modal fade ph-reactivation-not-complete-modal-{{$receipt->token}}" tabindex="-1" role="dialog"
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
                                    <div class="modal fade ph-reactivation-merged-modal-{{$receipt->token}}" tabindex="-1" role="dialog"
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
                                    <div class="modal fade ph-regular-not-complete-modal-{{$receipt->token}}" tabindex="-1" role="dialog"
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
                                <div class="modal fade ph-regular-merged-modal-{{$receipt->token}}" tabindex="-1" role="dialog"
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
                    {{--GH Not completely merged--}}
                    @foreach($gh_pending->unConfirmedPh as $unconfirmed_ph)
                        @if($unconfirmed_ph->receiptUploads->count() > 0)
                            @foreach($unconfirmed_ph->receiptUploads as $receipt)
                                {{--GH REPORT RECEIPT MODAL--}}
                                <div class="modal fade gh-report-receipt-not-complete-modal-{{$receipt->token}}" tabindex="-1"
                                     role="dialog"
                                     aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                    <div class="modal-dialog modal-dialog-centered">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title mt-0">
                                                    <b class="text-danger">Report</b> Payment Confirmation
                                                </h5>
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
                                                            <strong>Are you sure you want to <b
                                                                    class="text-danger">report</b> the payment
                                                                receipt of
                                                                <b class="text-primary">
                                                                    &#8358;{{number_format($unconfirmed_ph->merge->merge_amount)}}
                                                                </b> from <b class="text-primary">
                                                                    {{$receipt->provideHelp->user->bankDetail->full_name}}
                                                                </b> to <b
                                                                    class="text-danger">flag</b> your
                                                                transaction with {{$receipt->provideHelp->user->gender == 'male' ? 'him' : 'her'}}
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
                                                                data-dismiss="modal">No, Close
                                                        </button>
                                                        <form action="{{route('flag.receipt.as.fake', $receipt->token)}}" method="POST">
                                                            @csrf
                                                            <button type="submit"
                                                                    class="swal2-confirm swal2-styled btn-success"
                                                                    style="display: inline-block;">Yes,
                                                                Report Receipt
                                                            </button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div><!-- /.modal-content -->
                                    </div><!-- /.modal-dialog -->
                                </div>
                                {{--GH SHOW RECEIPT MODAL--}}
                                <div class="modal fade gh-show-receipt-not-complete-modal-{{$receipt->token}}" tabindex="-1" role="dialog"
                                     aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">Payment receipt
                                                    from <b
                                                        class="text-primary">{{$receipt->provideHelp->user->bankDetail->full_name}}</b>
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
                            @endforeach
                        @endif
                        {{--GH COMFIRM PH CONFIRMATION MODAL--}}
                        <div class="modal fade gh-confirm-ph-confirmation-not-complete-modal-{{$unconfirmed_ph->token}}" tabindex="-1"
                             role="dialog"
                             aria-labelledby="mySmallModalLabel" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title mt-0">
                                            Payment Confirmation
                                        </h5>
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
                                                    <strong>Are you sure you want to confirm the payment
                                                        of
                                                        <b class="text-primary">
                                                            &#8358;{{number_format($unconfirmed_ph->merge->merge_amount)}}
                                                        </b> from <b class="text-primary">
                                                            {{$unconfirmed_ph->user->bankDetail->full_name}}
                                                        </b> to complete your transaction with
                                                        {{$unconfirmed_ph->user->gender == 'male' ? 'him' : 'her'}}
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
                                                        data-dismiss="modal">No, Close
                                                </button>
                                                <form action="{{route('payment.confirmation', $unconfirmed_ph->token)}}" method="POST">
                                                    @csrf
                                                    <button type="submit"
                                                            class="swal2-confirm swal2-styled btn-success"
                                                            style="display: inline-block;">Yes,
                                                        Confirm Payment
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div><!-- /.modal-content -->
                            </div><!-- /.modal-dialog -->
                        </div>
                    @endforeach
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

        $('div#reactivation-merge-countdown[data-countdown]').each(function () {
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
                $(this).html('Reactivation expired')
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

        /*GH merge DataTable*/
        $('#gh-merge-datatable').DataTable();

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
