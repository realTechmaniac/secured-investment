{{--Top Dashboard--}}
<div class="top-main-dashboard">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0 font-size-18">Dashboard</h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-xl-4">
            <div class="card overflow-hidden">
                <div class="bg-soft-primary">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="text-primary p-3">
                                <h5 class="text-primary">Welcome Back, </h5>
                                <h5>
                                    {{auth()->user()->username}}
                                    @if(auth()->user()->is_guider)
                                        <b class="text-primary">(Guider)</b>
                                    @endif
                                </h5>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-body pt-0">
                    <div class="row">
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col">
                                    <div class="my-4 text-center">
                                        <!-- Small modal -->
                                        <a type="button"
                                                style="padding-top: 20px; padding-bottom: 20px; color: white;"
                                                class="btn btn-primary btn-block waves-effect waves-light font-weight-bold btn-block" disabled>
                                            Provide Help
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="row">
                                <div class="col">
                                    <div class="my-4 text-center">
                                        <!-- Small modal -->
                                        <a type="button"
                                                style="padding-top: 20px; padding-bottom: 20px;  color: white;"
                                                class="btn btn-success btn-block waves-effect waves-light font-weight-bold btn-block" disabled>
                                            Get Help
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row text-center">
                        <div class="col-sm-12"><b class="text-danger">PH & GH CURRENTLY UNAVAILABLE BECAUSE YOU HAVE A PENDING TRANSACTION</b></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-xl-8">
            {{--Subcription Notice--}}
            <div class="card">
                <div class="alert alert-success mb-0 font-weight-bold alert-dismissible" role="alert">
                    INVEST ONLY WITH YOUR SPARE MONEY
                    <hr>
                    Your Subscription
                    @if($sub_expires_at)
                        @if($sub_expires_at >= now())
                            expires {{auth()->user()->sub_expires_at->format('g:ia \o\n l\, jS F Y')}}
                            <div>
                                <b class="text-danger">
                                    Countdown to subscription expiration:
                                    <span id="user-sub-expiration-countdown"
                                          class="text-danger"
                                          data-countdown="{{auth()->user()->sub_expires_at->format('Y/m/d H:i:s')}}">
                                    </span>
                                </b>
                            </div>
                        @else
                            <b class="text-danger">
                                expired {{auth()->user()->sub_expires_at->format('g:ia \o\n l\, jS F Y')}}
                            </b>
                        @endif
                    @else
                        expires N/A
                    @endif

                </div>
            </div>
            {{--Guilder Notice--}}
            @if(!auth()->user()->is_guider)
                <div class="card">
                    <div class="alert alert-info mb-0 font-weight-bold alert-dismissible" role="alert">
                        You will automatically become a guilder when you refer 25 active users and make a
                        total
                        PH of &#8358;{{number_format(50000)}}
                    </div>
                </div>
            @endif
            {{--Referral Info--}}
            <div class="row">
                <div class="col-md-6">
                    <div class="card mini-stats-wid">
                        <div class="card-body">
                            <div class="media">
                                <div class="media-body">
                                    <p class="text-muted font-weight-medium">Total Referred Users</p>
                                    <h4 class="mb-0">{{auth()->user()->referrerDetail->referralHistories->count()}}</h4>
                                </div>

                                <div
                                    class="mini-stat-icon avatar-sm rounded-circle bg-primary align-self-center">
                                                        <span class="avatar-title">
                                                            <i class="bx bx-user-plus font-size-24"></i>
                                                        </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card mini-stats-wid">
                        <div class="card-body">
                            <div class="media">
                                <div class="media-body">
                                    <p class="text-muted font-weight-medium">Total Referral Balance</p>
                                    <h4 class="mb-0">&#8358;{{number_format(auth()->user()->referrerDetail->referrer_balance)}}</h4>
                                </div>

                                <div
                                    class="mini-stat-icon avatar-sm rounded-circle bg-primary align-self-center">
                                                        <span class="avatar-title">
                                                            <i class="bx bx-money font-size-24"></i>
                                                        </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
    </div>
</div>
