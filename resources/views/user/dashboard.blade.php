@extends('layouts.userApp')

@section('page-title')Secured Investment -Dashboard @endsection

@section('content')
    <div class="main-content">
        <div class="page-content">

            <div class="container-fluid">
                {{--@if(!auth()->user()->is_blocked)@endif--}}

                @if(!auth()->user()->is_activated)
                    @if(auth()->user()->activation == 'first')
                        @if($ph_activation)
                            @if($ph_activation->status == 'pending' && !$ph_activation->is_merged)
                                <div class="row">
                                    <div class="col-12">
                                        <div class="page-title-box d-flex align-items-center justify-content-between">
                                            <h4 class="mb-0 font-size-18">Dashboard</h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">

                                        <div class="card">
                                            <div class="card-body">

                                                <h4 class="card-title pt-4">Your Subscription expires on N/A </h4>

                                                <div class="row pt-2">

                                                    <div class="col-md-2  col-sm-6 m-2">
                                                        <button
                                                            class="btn btn-primary btn-block waves-effect waves-light font-weight-bold btn-block"
                                                            disabled>Provide
                                                            Help
                                                        </button>
                                                    </div>

                                                    <div class="col-md-2 col-sm-6 m-2 ">
                                                        <button
                                                            class="btn btn-success btn-block waves-effect waves-light font-weight-bold btn-block"
                                                            disabled>Get
                                                            Help
                                                        </button>
                                                    </div>

                                                </div>
                                                <div class="pt-4 pl-2">
                                                    <p class="">Your request to Provide Help of
                                                        <b>&#8358;{{number_format($ph_activation->amount)}} (Activation Fee)</b> is
                                                        Pending. You will be merged very soon.
                                                        However, if you like to change your mind, you can cancel your
                                                        request to provide
                                                        help. Please note that <b>Activation Fee</b> attracts no profit.
                                                        <a style="color: #fff" class="btn btn-danger mt-2"
                                                           data-toggle="modal"
                                                           data-target=".first-activation-cancel-confirmation">Cancel PH</a></p>

                                                    <div class="modal fade first-activation-cancel-confirmation" tabindex="-1" role="dialog"
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
                                                                            <h5><strong>Are you sure you want to cancel
                                                                                    your Provide Help
                                                                                    Request (<b>Activation Fee
                                                                                        Payment</b>) ? </strong></h5>
                                                                        </div>
                                                                        <div class="swal2-content"
                                                                             style="display: block;">You won't be able
                                                                            to revert this!
                                                                        </div>
                                                                        <div class="swal2-actions">
                                                                            <button type="button"
                                                                                    class="swal2-cancel swal2-styled btn-danger"
                                                                                    style="display: inline-block;"
                                                                                    data-dismiss="modal">Close
                                                                            </button>
                                                                            <form action="{{route('cancel.activation.fee', $ph_activation->token)}}" method="POST">
                                                                                @csrf
                                                                                @method('DELETE')
                                                                                <button type="button "
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
                                                    </div><!-- /.modal -->
                                                </div>

                                            </div>
                                        </div>


                                    </div>
                                </div>
                            @elseif($ph_activation->status == 'pending' && $ph_activation->is_merged)
                                Activation merged
                            @endif
                        @else
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
                            <!-- end row -->
                            {{--Modal--}}
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
                                                <div class="swal2-icon swal2-warning swal2-animate-warning-icon" style="display: flex;"></div>
                                                <div class="swal2-header">
                                                    <h5><strong>Are you sure you want to pay activation fee of &#8358;1,000 to activate your
                                                            account ?</strong></h5>
                                                </div>
                                                <div class="swal2-content" style="display: block;">You won't be able to revert this!</div>
                                                <div class="swal2-actions">
                                                    <button type="button" class="swal2-cancel swal2-styled btn-danger"
                                                            style="display: inline-block;" data-dismiss="modal">Close
                                                    </button>
                                                    <form action="{{route('pay.activation.fee')}}" method="POST">
                                                        @csrf
                                                        <button type="submit" class="swal2-confirm swal2-styled btn-success"
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
                            @if($ph_activation->status == 'pending' && !$ph_activation->is_merged)
                                <div class="row">
                                    <div class="col-12">
                                        <div class="page-title-box d-flex align-items-center justify-content-between">
                                            <h4 class="mb-0 font-size-18">Dashboard</h4>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="card">
                                            <div class="card-body">

                                                <h4 class="card-title pt-4">Your Subscription has expired </h4>

                                                <div class="row pt-2">

                                                    <div class="col-md-2  col-sm-6 m-2">
                                                        <button
                                                            class="btn btn-primary btn-block waves-effect waves-light font-weight-bold btn-block"
                                                            disabled>Provide
                                                            Help
                                                        </button>
                                                    </div>

                                                    <div class="col-md-2 col-sm-6 m-2 ">
                                                        <button
                                                            class="btn btn-success btn-block waves-effect waves-light font-weight-bold btn-block"
                                                            disabled>Get
                                                            Help
                                                        </button>
                                                    </div>

                                                </div>
                                                <div class="pt-4 pl-2">
                                                    <p class="">Your request to Provide Help of
                                                        <b>&#8358;{{number_format($ph_activation->amount)}} (Reactivation Fee)</b> is
                                                        Pending. You will be merged very soon.
                                                        However, if you like to change your mind, you can cancel your
                                                        request to provide
                                                        help. Please note that <b>Reactivation Fee</b> attracts no profit.
                                                        <a style="color: #fff" class="btn btn-danger mt-2"
                                                           data-toggle="modal"
                                                           data-target=".subsequent-activation-cancel-confirmation">Cancel PH</a></p>

                                                    <div class="modal fade subsequent-activation-cancel-confirmation" tabindex="-1" role="dialog"
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
                                                                            <h5><strong>Are you sure you want to cancel
                                                                                    your Provide Help
                                                                                    Request (<b>Reactivation Fee
                                                                                        Payment</b>) ? </strong></h5>
                                                                        </div>
                                                                        <div class="swal2-content"
                                                                             style="display: block;">You won't be able
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
                                                                                    style="display: inline-block;">Yes,
                                                                                Cancel Request
                                                                            </button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div><!-- /.modal-content -->
                                                        </div><!-- /.modal-dialog -->
                                                    </div><!-- /.modal -->
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @elseif($ph_activation->status == 'pending' && $ph_activation->is_merged)
                                Reactivation merged 10% of total gh for 30days
                            @endif
                        @else
                            <div class="row">
                                <div class="col-lg-12 pt-5 pb-5">
                                    <div class="card card-body pb-5">
                                        <h1 class="card-title mt-0 text-center">Subscription Expired!</h1>
                                        <p class="card-text text-center">Your subscription has expired. Reactivation is
                                            only 10% of the profit on your total Get Help in the past 30days.
                                            Total GH in 30days: &#8358;{{number_format(200000)}} Reactivation Fee: <strong>&#8358;{{number_format(20000)}}</strong>.
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
                            <!-- end row -->
                            {{--Modal--}}
                            <div class="modal fade reactivation-confirmation-modal" tabindex="-1" role="dialog"
                                 aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title mt-0">Reactivate Account</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="text-center">
                                                <div class="swal2-icon swal2-warning swal2-animate-warning-icon" style="display: flex;"></div>
                                                <div class="swal2-header">
                                                    <h5><strong>Are you sure you want to pay reactivation fee of &#8358;{{number_format(20000)}} to reactivate your
                                                            account ?</strong></h5>
                                                </div>
                                                <div class="swal2-content" style="display: block;">You won't be able to revert this!</div>
                                                <div class="swal2-actions">
                                                    <button type="button" class="swal2-cancel swal2-styled btn-danger"
                                                            style="display: inline-block;" data-dismiss="modal">Close
                                                    </button>
                                                    <button type="button " class="swal2-confirm swal2-styled btn-success"
                                                            style="display: inline-block;">Yes, Proceed
                                                    </button>
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
                        User Blocked
                    @elseif($ph)
                        @if($ph->status == 'pending' && !$ph->is_merged)
                            <div class="row">
                                <div class="col-12">
                                    <div class="page-title-box d-flex align-items-center justify-content-between">
                                        <h4 class="mb-0 font-size-18">Dashboard</h4>
                                    </div>
                                </div>
                                <div class="col-lg-12">

                                    <div class="card">
                                        <div class="card-body">

                                            <h4 class="card-title pt-4">Your Subscription expires {{\Carbon\Carbon::parse(auth()->user()->sub_expires_at)->format('g:ia \o\n l jS F Y')}} </h4>

                                            <div class="row pt-2">

                                                <div class="col-md-2  col-sm-6 m-2">
                                                    <button
                                                        class="btn btn-primary btn-block waves-effect waves-light font-weight-bold btn-block"
                                                        disabled>Provide
                                                        Help
                                                    </button>
                                                </div>

                                                <div class="col-md-2 col-sm-6 m-2 ">
                                                    <button
                                                        class="btn btn-success btn-block waves-effect waves-light font-weight-bold btn-block"
                                                        disabled>Get
                                                        Help
                                                    </button>
                                                </div>

                                            </div>
                                            <div class="pt-4 pl-2">
                                                <p class="">Your request to Provide Help of
                                                    <b>&#8358;{{number_format($ph->amount)}}</b> is Pending. You will be
                                                    merged very soon.
                                                    However, if you like to change your mind, you can cancel your
                                                    request to provide
                                                    help. <a style="color: #fff" class="btn btn-danger mt-2"
                                                             data-toggle="modal"
                                                             data-target=".ph-cancel-confirmation">Cancel PH</a></p>

                                                <div class="modal fade ph-cancel-confirmation" tabindex="-1"
                                                     role="dialog"
                                                     aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title mt-0">Provide Help
                                                                    Confirmation</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
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
                                                                        <h5><strong>Are you sure you want to cancel your
                                                                                Provide Help
                                                                                Request ? </strong></h5>
                                                                    </div>
                                                                    <div class="swal2-content" style="display: block;">
                                                                        You won't be able
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
                                                                                style="display: inline-block;">Yes,
                                                                            Cancel Request
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div><!-- /.modal-content -->
                                                    </div><!-- /.modal-dialog -->
                                                </div><!-- /.modal -->
                                            </div>

                                        </div>
                                    </div>


                                </div>
                            </div>
                        @elseif($ph->status == 'pending' && $ph->is_merged)
                            Provide Help merged
                        @endif
                    @elseif($gh)
                        @if($gh->status == 'pending' && !$gh->is_merged)
                            <div class="row">
                                <div class="col-12">
                                    <div class="page-title-box d-flex align-items-center justify-content-between">
                                        <h4 class="mb-0 font-size-18">Dashboard</h4>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="card">
                                        <div class="card-body">

                                            <h4 class="card-title pt-4">Your Subscription expires {{\Carbon\Carbon::parse(auth()->user()->sub_expires_at)->format('g:ia \o\n l jS F Y')}}</h4>

                                            <div class="row pt-2">

                                                <div class="col-md-2  col-sm-6 m-2">
                                                    <button
                                                        class="btn btn-primary btn-block waves-effect waves-light font-weight-bold btn-block"
                                                        disabled>Provide
                                                        Help
                                                    </button>
                                                </div>

                                                <div class="col-md-2 col-sm-6 m-2 ">
                                                    <button
                                                        class="btn btn-success btn-block waves-effect waves-light font-weight-bold btn-block"
                                                        disabled>Get
                                                        Help
                                                    </button>
                                                </div>

                                            </div>
                                            <div class="pt-4 pl-2">
                                                <p class="">Your request to Get Help of
                                                    <b>&#8358;{{number_format($gh->amount)}}</b> is Pending. You will be
                                                    merged very soon. However,
                                                    if you like to change your mind, you can cancel your request to get
                                                    help. <a
                                                        href="" class="btn btn-danger mt-2" data-toggle="modal"
                                                        data-target=".gh-cancel-confirmation">Cancel GH</a></p>

                                                <div class="modal fade gh-cancel-confirmation" tabindex="-1"
                                                     role="dialog"
                                                     aria-labelledby="mySmallModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title mt-0">Get Help Confirmation</h5>
                                                                <button type="button" class="close" data-dismiss="modal"
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
                                                                        <h5><strong>Are you sure you want to cancel your
                                                                                Get Help
                                                                                Request ? </strong></h5>
                                                                    </div>
                                                                    <div class="swal2-content" style="display: block;">
                                                                        You won't be able
                                                                        to revert this!
                                                                    </div>
                                                                    <div class="swal2-actions">
                                                                        <button type="button"
                                                                                class="swal2-cancel swal2-styled btn-danger"
                                                                                style="display: inline-block;"
                                                                                data-dismiss="modal">Close
                                                                        </button>
                                                                        <button type="button"
                                                                                class="swal2-confirm swal2-styled btn-success"
                                                                                style="display: inline-block;">Yes,
                                                                            Cancel Request
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div><!-- /.modal-content -->
                                                    </div><!-- /.modal-dialog -->
                                                </div><!-- /.modal -->
                                            </div>

                                        </div>
                                    </div>


                                </div>
                            </div>
                        @elseif($gh->status == 'pending' && $gh->is_merged)
                            Get Help Merged
                        @endif
                    @endif
                @endif
            </div>
            <!-- end main content-->
        </div>
    </div>

@endsection

@section('js')

@endsection
