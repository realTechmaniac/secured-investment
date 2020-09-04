@extends('layouts.userApp')

@section('page-title')Secured Investment -Get Help @endsection

@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="mb-0 font-size-18">Get Help</h4>
                            @if(auth()->user()->role == 'ceo')
                                <button type="button"
                                        class="btn btn-primary waves-effect waves-light"
                                        data-toggle="modal"
                                        data-target=".admin-ceo-get-help-withdrawal-modal">
                                    Withdraw
                                </button>
                            @endif
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">

                                <h3 class="card-title pb-3">Investments that are available for withdrawal</h3>
                                <div class="alert alert-info mt-3">
                                    Notice:
                                    <ol>
                                        <li>GH amount is 50% the corresponding PH amount yields
                                            in {{auth()->user()->role == 'regular' ? '4days' : '2days'}}</li>
                                        <li>
                                            <b class="text-primary">Not Withdrawable</b> means that the system is not
                                            done processing your investment
                                        </li>
                                        <li>
                                            <b class="text-primary">Recommit</b> means that your fund is available but
                                            cannot be withdrawn because you need to reinvest. Every withdrawable fund
                                            requires a successor investment. This is required to sustain the system.
                                        </li>
                                        <li>
                                            <b class="text-primary">Withdraw</b> means that fund can be withdrawn
                                        </li>
                                        <li>
                                            <b class="text-primary">Pending PH</b> means that fund has been processed
                                            but the corresponding investment is yet to be completed.
                                        </li>
                                        <li>
                                            <b class="text-primary">N/A</b> means that countdown is over. That is, fund
                                            can be withdrawn
                                        </li>
                                        <li>
                                            <b class="text-primary">Referral Bonus </b>, if any, will be added
                                            automatically to your withdrawal. Referral bonus added to withdrawal
                                            can only be lesser than or equal to the withdrawal. Your current referral bonus balance is <b
                                                class="text-success">&#8358;{{number_format($ref)}}</b>
                                        </li>
                                        <li>
                                            <b class="text-primary">Minimum Referral bonus</b> withdrawal
                                            is @if(auth()->user()->is_guider)<b class="text-success">&#8358;{{number_format(10000)}}</b>@else
                                               <b class="text-success"> &#8358;{{number_format(5000)}}</b>@endif
                                        </li>
                                    </ol>
                                </div>


                                <table id="ph-pending" class="table table-bordered dt-responsive nowrap"
                                       style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                    <thead>
                                    <tr>
                                        <th>Available In</th>
                                        <th>Date</th>
                                        <th>Time</th>
                                        <th>PH Amount(&#8358;)</th>
                                        <th>GH Amount(&#8358;)</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>


                                    <tbody>
                                    {{--SHOW AVAILABLE PH READY FOR WITHDRAWAL--}}
                                    @if($ph_available_for_gh->count() > 0)
                                        @if(auth()->user()->role == 'regular')
                                            {{--REGULAR USERS NEED TO RECOMMIT--}}
                                            {{--RECOMMITMENT CANNOT BE WITHDRAWN--}}
                                            @if($ph_recommit)
                                                <tr>
                                                    <td><b class="text-primary">N/A</b></td>
                                                    <td>{{$ph_recommit->created_at->format('d/m/y')}}</td>
                                                    <td>{{$ph_recommit->created_at->format('g:i A')}}</td>
                                                    <td>{{number_format($ph_recommit->amount)}}</td>
                                                    <td>{{number_format(($ph_recommit->amount)+($ph_recommit->amount * 0.5))}}</td>
                                                    <td>
                                                        <span class="badge badge-success">Available</span>
                                                    </td>
                                                    <td>
                                                        <b class="text-primary">Recommit</b>
                                                    </td>
                                                </tr>
                                            @endif
                                            {{--LOOP THROUGH THE REST OF THE WITHDRAWABLE COLLECTION--}}
                                            @if($ph_available->count() > 0)
                                                @foreach($ph_available as $row)
                                                    <tr>
                                                        <td><b class="text-primary">N/A</b></td>
                                                        <td>{{$row->created_at->format('d/m/y')}}</td>
                                                        <td>{{$row->created_at->format('g:i A')}}</td>
                                                        <td>{{number_format($row->amount)}}</td>
                                                        <td>{{number_format(($row->amount)+($row->amount * 0.5))}}</td>
                                                        <td>
                                                            <span class="badge badge-success">Available</span>
                                                        </td>
                                                        <td>
                                                            <button type="button"
                                                                    class="btn btn-primary waves-effect waves-light"
                                                                    data-toggle="modal"
                                                                    data-target=".get-help-withdrawal-modal-{{$row->token}}">
                                                                Withdraw
                                                            </button>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                        @else
                                            {{--ADMIN DOES NOT NEED TO RECOMMIT.. SO LOOP THROUGH ALL THE COLLECTIONS WITHOUT FILTERING--}}
                                            @foreach($ph_available_for_gh as $row)
                                                <tr>
                                                    <td><b class="text-primary">N/A</b></td>
                                                    <td>{{$row->created_at->format('d/m/y')}}</td>
                                                    <td>{{$row->created_at->format('g:i A')}}</td>
                                                    <td>{{number_format($row->amount)}}</td>
                                                    <td>{{number_format(($row->amount)+($row->amount * 0.5))}}</td>
                                                    <td>
                                                        <span class="badge badge-success">Available</span>
                                                    </td>
                                                    <td>
                                                        <button type="button"
                                                                class="btn btn-primary waves-effect waves-light"
                                                                data-toggle="modal"
                                                                data-target=".admin-get-help-withdrawal-modal-{{$row->token}}">
                                                            Withdraw
                                                        </button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    @endif

                                    {{--SHOW COUNTDOWN TO USERS IMMEDIATELY FOR FIRST INVESTMENT--}}
                                    {{--COUNTDOWN RUNNING AND PH IS COMPLETED--}}
                                    @if($ph_pending_first_investment)
                                        <tr>
                                            <td>
                                                <b>
                                                    <div id="ph-pending-investment"
                                                         class="text-danger"
                                                         data-countdown="{{\Carbon\Carbon::parse($ph_pending_first_investment->available_for_gh_at)->format('Y/m/d H:i:s')}}">
                                                    </div>
                                                </b>
                                            </td>
                                            <td>{{$ph_pending_first_investment->created_at->format('d/m/y')}}</td>
                                            <td>{{$ph_pending_first_investment->created_at->format('g:i A')}}</td>
                                            <td>{{number_format($ph_pending_first_investment->amount)}}</td>
                                            <td>{{number_format(($ph_pending_first_investment->amount)+($ph_pending_first_investment->amount * 0.5))}}</td>
                                            <td>
                                                <span class="badge badge-primary">Processing</span>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-primary waves-effect waves-light"
                                                        disabled>
                                                    Not Withdrawable
                                                </button>
                                            </td>
                                        </tr>
                                    @endif

                                    {{--SHOW COUNTDOWN TO USERS IMMEDIATELY FOR FIRST INVESTMENT--}}
                                    {{--COUNTDOWN RUNNING AND PH IS PENDING--}}
                                    @if($ph_pending_first_investment_pending)
                                        <tr>
                                            <td>
                                                <b>
                                                    <div id="ph-pending-investment"
                                                         class="text-danger"
                                                         data-countdown="{{\Carbon\Carbon::parse($ph_pending_first_investment_pending->available_for_gh_at)->format('Y/m/d H:i:s')}}">
                                                    </div>
                                                </b>
                                            </td>
                                            <td>{{$ph_pending_first_investment_pending->created_at->format('d/m/y')}}</td>
                                            <td>{{$ph_pending_first_investment_pending->created_at->format('g:i A')}}</td>
                                            <td>{{number_format($ph_pending_first_investment_pending->amount)}}</td>
                                            <td>{{number_format(($ph_pending_first_investment_pending->amount)+($ph_pending_first_investment_pending->amount * 0.5))}}</td>
                                            <td>
                                                <span class="badge badge-primary">Processing</span>
                                            </td>
                                            <td>
                                                <button type="button" class="btn btn-primary waves-effect waves-light"
                                                        disabled>
                                                    Not Withdrawable
                                                </button>
                                            </td>
                                        </tr>
                                    @endif

                                    {{--SHOW COUNTDOWN TO USERS IMMEDIATELY FOR FIRST INVESTMENT--}}
                                    {{--COUNTDOWN IS COMPLETED BUT THE PH IS STILL PENDING--}}
                                    @if($ph_pending_first_investment_completed)
                                        <tr>
                                            <td>
                                                <b class="text-primary">Processed!</b>
                                            </td>
                                            <td>{{$ph_pending_first_investment_completed->created_at->format('d/m/y')}}</td>
                                            <td>{{$ph_pending_first_investment_completed->created_at->format('g:i A')}}</td>
                                            <td>{{number_format($ph_pending_first_investment_completed->amount)}}</td>
                                            <td>{{number_format(($ph_pending_first_investment_completed->amount)+($ph_pending_first_investment_completed->amount * 0.5))}}</td>
                                            <td>
                                                <span class="badge badge-primary">Processed</span>
                                            </td>
                                            <td>
                                                <button type="button"
                                                        class="btn btn-primary waves-effect waves-light"
                                                        disabled>
                                                    Pending PH
                                                </button>
                                            </td>
                                        </tr>
                                    @endif

                                    {{--ADMIN AND REGULAR USER ARE IN DIFFERENT LOOPS BECAUSE THEIR PH TIME DIFFER--}}
                                    @if(auth()->user()->role == 'regular')
                                        {{--START COUNTDOWN DOWN FOR SUBSEQUENT PH IF ANY--}}
                                        @if($ph_pending)
                                            @foreach($ph_pending as $row)
                                                <tr>
                                                    <td>
                                                        @if($row->available_for_gh_at > now()->addDays(4))
                                                            {{--@if($row->available_for_gh_at > now()->addSeconds(45))--}}
                                                            <b class="text-primary">Countdown starts soon...</b>
                                                        @else
                                                            <b>
                                                                <div id="ph-pending-investment"
                                                                     class="text-danger"
                                                                     data-countdown="{{\Carbon\Carbon::parse($row->available_for_gh_at)->format('Y/m/d H:i:s')}}">
                                                                </div>
                                                            </b>
                                                        @endif
                                                    </td>
                                                    <td>{{$row->created_at->format('d/m/y')}}</td>
                                                    <td>{{$row->created_at->format('g:i A')}}</td>
                                                    <td>{{number_format($row->amount)}}</td>
                                                    <td>{{number_format(($row->amount)+($row->amount * 0.5))}}</td>
                                                    <td>
                                                        <span class="badge badge-primary">Processing</span>
                                                    </td>
                                                    <td>
                                                        <button type="button"
                                                                class="btn btn-primary waves-effect waves-light"
                                                                disabled>
                                                            Not Withdrawable
                                                        </button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                        @if($ph_pending_status_not_completed)
                                            @foreach($ph_pending_status_not_completed as $row)
                                                <tr>
                                                    <td>
                                                        @if($row->available_for_gh_at > now()->addDays(4))
                                                            {{--@if($row->available_for_gh_at > now()->addSeconds(45))--}}
                                                            <b class="text-primary">Countdown starts soon...</b>
                                                        @else
                                                            <b>
                                                                <div id="ph-pending-investment"
                                                                     class="text-danger"
                                                                     data-countdown="{{\Carbon\Carbon::parse($row->available_for_gh_at)->format('Y/m/d H:i:s')}}">
                                                                </div>
                                                            </b>
                                                        @endif
                                                    </td>
                                                    <td>{{$row->created_at->format('d/m/y')}}</td>
                                                    <td>{{$row->created_at->format('g:i A')}}</td>
                                                    <td>{{number_format($row->amount)}}</td>
                                                    <td>{{number_format(($row->amount)+($row->amount * 0.5))}}</td>
                                                    <td>
                                                        <span class="badge badge-primary">Processing</span>
                                                    </td>
                                                    <td>
                                                        <button type="button"
                                                                class="btn btn-primary waves-effect waves-light"
                                                                disabled>
                                                            Not Withdrawable
                                                        </button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    @else
                                        {{--DO NOT SHOW COUNTDOWN TO ADMIN UNTIL AFTER 24HOURS--}}
                                        {{--ADMIN AND REGULAR USER ARE IN DIFFERENT LOOPS BECAUSE THEIR PH TIME DIFFER--}}
                                        {{--START COUNTDOWN DOWN FOR SUBSEQUENT PH IF ANY--}}
                                        @if($ph_pending)
                                            @foreach($ph_pending as $row)
                                                <tr>
                                                    <td>
                                                        @if($row->available_for_gh_at > now()->addDays(2))
                                                            {{--@if($row->available_for_gh_at > now()->addSeconds(35))--}}
                                                            <b class="text-primary">Countdown starts soon...</b>
                                                        @else
                                                            <b>
                                                                <div id="ph-pending-investment"
                                                                     class="text-danger"
                                                                     data-countdown="{{\Carbon\Carbon::parse($row->available_for_gh_at)->format('Y/m/d H:i:s')}}">
                                                                </div>
                                                            </b>
                                                        @endif
                                                    </td>
                                                    <td>{{$row->created_at->format('d/m/y')}}</td>
                                                    <td>{{$row->created_at->format('g:i A')}}</td>
                                                    <td>{{number_format($row->amount)}}</td>
                                                    <td>{{number_format(($row->amount)+($row->amount * 0.5))}}</td>
                                                    <td>
                                                        <span class="badge badge-primary">Processing</span>
                                                    </td>
                                                    <td>
                                                        <button type="button"
                                                                class="btn btn-primary waves-effect waves-light"
                                                                disabled>
                                                            Not Withdrawable
                                                        </button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                        @if($ph_pending_status_not_completed)
                                            @foreach($ph_pending_status_not_completed as $row)
                                                <tr>
                                                    <td>
                                                        @if($row->available_for_gh_at > now()->addDays(2))
                                                            {{--@if($row->available_for_gh_at > now()->addSeconds(35))--}}
                                                            <b class="text-primary">Countdown starts soon...</b>
                                                        @else
                                                            <b>
                                                                <div id="ph-pending-investment"
                                                                     class="text-danger"
                                                                     data-countdown="{{\Carbon\Carbon::parse($row->available_for_gh_at)->format('Y/m/d H:i:s')}}">
                                                                </div>
                                                            </b>
                                                        @endif
                                                    </td>
                                                    <td>{{$row->created_at->format('d/m/y')}}</td>
                                                    <td>{{$row->created_at->format('g:i A')}}</td>
                                                    <td>{{number_format($row->amount)}}</td>
                                                    <td>{{number_format(($row->amount)+($row->amount * 0.5))}}</td>
                                                    <td>
                                                        <span class="badge badge-primary">Processing</span>
                                                    </td>
                                                    <td>
                                                        <button type="button"
                                                                class="btn btn-primary waves-effect waves-light"
                                                                disabled>
                                                            Not Withdrawable
                                                        </button>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        @endif
                                    @endif

                                    @if($ph_pending_completed)
                                        @foreach($ph_pending_completed as $row)
                                            <tr>
                                                <td>
                                                    <b class="text-primary">Processed!</b>
                                                </td>
                                                <td>{{$row->created_at->format('d/m/y')}}</td>
                                                <td>{{$row->created_at->format('g:i A')}}</td>
                                                <td>{{number_format($row->amount)}}</td>
                                                <td>{{number_format(($row->amount)+($row->amount * 0.5))}}</td>
                                                <td>
                                                    <span class="badge badge-primary">Processed</span>
                                                </td>
                                                <td>
                                                    <button type="button"
                                                            class="btn btn-primary waves-effect waves-light"
                                                            disabled>
                                                        Pending PH
                                                    </button>
                                                </td>
                                            </tr>
                                        @endforeach
                                    @endif

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div>

            </div> <!-- container-fluid -->
        </div>
    </div>

    @if($ph_available->count() > 0)
        @foreach($ph_available as $row)
            <div>
                <div class="modal fade get-help-withdrawal-modal-{{$row->token}}" tabindex="-1" role="dialog"
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
                                        <h5>
                                            <strong>
                                                Are you sure you want to withdraw
                                                <b class="text-primary">&#8358;{{number_format(($row->amount)+($row->amount * 0.5))}}</b>
                                                + <b
                                                    class="text-success">@if(((($row->amount)+($row->amount * 0.5)) >= $referral_bonus ))&#8358;{{number_format($referral_bonus)}}@else&#8358;{{number_format(($row->amount)+($row->amount * 0.5))}}@endif</b>
                                            </strong>
                                        </h5>
                                    </div>
                                    <div class="swal2-content" style="display: block;">You won't
                                        be able to revert this!
                                    </div>
                                    <div class="swal2-actions">
                                        <button type="button"
                                                class="swal2-cancel swal2-styled btn-danger"
                                                style="display: inline-block;" data-dismiss="modal">
                                            No, Close
                                        </button>
                                        <form action="{{route('save.get.help')}}" method="POST">
                                            @csrf
                                            <input type="hidden" name="withdrawal_amount"
                                                   value="{{($row->amount)+($row->amount * 0.5)}}">

                                            <input type="hidden" name="profit_amount"
                                                   value="{{($row->amount * 0.5)}}">

                                            <input type="hidden" name="ph_id"
                                                   value="{{($row->id)}}">

                                            @if(((($row->amount)+($row->amount * 0.5)) >= $referral_bonus ))
                                                <input type="hidden" name="referral_amount"
                                                       value="{{$referral_bonus}}">
                                            @else
                                                <input type="hidden" name="referral_amount"
                                                       value="{{($row->amount)+($row->amount * 0.5)}}">
                                            @endif

                                            <button type="submit"
                                                    class="swal2-confirm swal2-styled btn-success"
                                                    style="display: inline-block;" aria-label="">
                                                Yes, Proceed
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
            </div>
        @endforeach
    @endif
    @if($ph_available_for_gh->count() > 0)
        @foreach($ph_available_for_gh as $row)
            <div>
                <div class="modal fade admin-get-help-withdrawal-modal-{{$row->token}}" tabindex="-1" role="dialog"
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
                                        <h5>
                                            <strong>
                                                Are you sure you want to withdraw
                                                <b class="text-primary">&#8358;{{number_format(($row->amount)+($row->amount * 0.5))}}</b>
                                                + <b
                                                    class="text-success">@if(((($row->amount)+($row->amount * 0.5)) >= $referral_bonus ))&#8358;{{number_format($referral_bonus)}}@else&#8358;{{number_format(($row->amount)+($row->amount * 0.5))}}@endif</b>
                                            </strong>
                                        </h5>
                                    </div>
                                    <div class="swal2-content" style="display: block;">You won't
                                        be able to revert this!
                                    </div>
                                    <div class="swal2-actions">
                                        <button type="button"
                                                class="swal2-cancel swal2-styled btn-danger"
                                                style="display: inline-block;" data-dismiss="modal">
                                            No, Close
                                        </button>
                                        <form action="{{route('save.get.help')}}" method="POST">
                                            @csrf
                                            <input type="hidden" name="withdrawal_amount"
                                                   value="{{($row->amount)+($row->amount * 0.5)}}">

                                            <input type="hidden" name="profit_amount"
                                                   value="{{($row->amount * 0.5)}}">

                                            <input type="hidden" name="ph_id"
                                                   value="{{($row->id)}}">

                                            @if(((($row->amount)+($row->amount * 0.5)) >= $referral_bonus ))
                                                <input type="hidden" name="referral_amount"
                                                       value="{{$referral_bonus}}">
                                            @else
                                                <input type="hidden" name="referral_amount"
                                                       value="{{($row->amount)+($row->amount * 0.5)}}">
                                            @endif

                                            <button type="submit"
                                                    class="swal2-confirm swal2-styled btn-success"
                                                    style="display: inline-block;" aria-label="">
                                                Yes, Proceed
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
            </div>
        @endforeach
    @endif
    <div class="modal fade admin-ceo-get-help-withdrawal-modal" tabindex="-1" role="dialog" aria-labelledby="mySmallModalLabel" aria-hidden="true" style="display: none;">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="mySmallModalLabel"><b class="text-primary">CEO Withdrawal</b></h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="{{route('save.ceo.get.help')}}" method="POST">
                        @csrf
                        <div class="form-group row">
                            <div class="col-md-10">
                                <h5><b>Enter Amount(&#8358;)</b></h5>
                                <div id="amount-gh"></div>
                                <input id="gh-enter-amount" class="form-control" name="gh_ceo" type="number" required>
                            </div>
                        </div>
                        <button type="submit"
                                class="btn btn-primary waves-effect waves-light">
                            Send
                        </button>
                    </form>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
@endsection

@section('js')

    <script>
        $('div#ph-pending-investment[data-countdown]').each(function () {
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
                $(this).html('Processed!')
                    .parent().addClass('disabled');
            });
        });

        $('#ph-pending').DataTable({
            "language": {
                "emptyTable": "No Investment found"
            },
            "order": [[ 2, "desc" ]]
        })
    </script>

    <script>
        $('input#gh-enter-amount').on('keyup', function () {
            let gh_amount = $('input#gh-enter-amount').val();
            let formatter = new Intl.NumberFormat('en-US', {
                style: 'currency',
                currency: 'NGN',
            });

            let _html = '<b class="text-primary">'+formatter.format(gh_amount)+'</b>'
            $('#amount-gh').html(_html)
        });
    </script>
@endsection

@section('css')

@endsection
