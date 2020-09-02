@extends('layouts.adminApp')

@section('page-title')Secured Investment -Admin | Dashboard @endsection

@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="mb-0 font-size-18">Admin- Dashboard</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->


                @if(auth()->user()->role == 'ceo' || auth()->user()->role == 'manager')
                    <div class="row">
                        <div class="col-xl-12">
                            <div class="row">
                                <div class="col-md-3">
                                    <div class="card mini-stats-wid">
                                        <div class="card-body">
                                            <div class="media">
                                                <div class="media-body">
                                                    <p class="text-muted font-weight-medium">Total Users</p>
                                                    <h4 class="mb-0">{{$total_user->count()}}</h4>
                                                </div>

                                                <div class="mini-stat-icon avatar-sm rounded-circle bg-primary align-self-center">
                                                        <span class="avatar-title">
                                                            <i class="bx bx-copy-alt font-size-24"></i>
                                                        </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card mini-stats-wid">
                                        <div class="card-body">
                                            <div class="media">
                                                <div class="media-body">
                                                    <p class="text-muted font-weight-medium">Complete PH Amount</p>
                                                    <h4 class="mb-0">&#8358;{{number_format($total_completed_ph_amount)}}</h4>
                                                </div>

                                                <div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                                                        <span class="avatar-title rounded-circle bg-primary">
                                                            <i class="bx bx-money font-size-24"></i>
                                                        </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card mini-stats-wid">
                                        <div class="card-body">
                                            <div class="media">
                                                <div class="media-body">
                                                    <p class="text-muted font-weight-medium">Completed GH Amount</p>
                                                    <h4 class="mb-0">&#8358;{{number_format($total_completed_gh_amount)}}</h4>
                                                </div>

                                                <div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                                                        <span class="avatar-title rounded-circle bg-primary">
                                                            <i class="bx bx-money font-size-24"></i>
                                                        </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="card mini-stats-wid">
                                        <div class="card-body">
                                            <div class="media">
                                                <div class="media-body">
                                                    <p class="text-muted font-weight-medium">Currently Active</p>
                                                    <h4 class="mb-0">{{$currently_active_transactions->count()}}</h4>
                                                </div>

                                                <div class="avatar-sm rounded-circle bg-primary align-self-center mini-stat-icon">
                                                        <span class="avatar-title rounded-circle bg-primary">
                                                            <i class="bx bx-line-chart font-size-24"></i>
                                                        </span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- end row -->

                            <div class="card">
                                <div class="card-body">
                                    <h4 class="card-title">All Completed Transactions</h4>
                                    <p class="card-title-desc">Below are all the transactions so far on the website.</p>
                                    <div class="table-rep-plugin">
                                        <div class="mb-0" data-pattern="priority-columns">
                                            <table id="all-transactions"
                                                   class="table table-bordered dt-responsive nowrap"
                                                   style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                                <thead>
                                                <tr>
                                                    <th>Time Filter</th>
                                                    <th>Date</th>
                                                    <th>Time</th>
                                                    <th>Transaction Status</th>
                                                    <th>Transaction Type</th>
                                                    <th>Amount (&#8358;)</th>
                                                    <th>Username</th>
                                                </tr>
                                                </thead>
                                                <tbody>
                                                {{--{{dd($all_five_latest_transactions_gh)}}--}}
                                                @if($total_completed_ph->count() > 0)
                                                    @foreach($total_completed_ph as $row)
                                                        <tr>
                                                            <td>{{\Carbon\Carbon::parse($row->created_at)}}</td>
                                                            <td>{{\Carbon\Carbon::parse($row->created_at)->format('d/m/y')}}</td>
                                                            <td>{{\Carbon\Carbon::parse($row->created_at)->format('l\, g:i A')}}</td>
                                                            <td>
                                                                @if($row->status == 'completed')
                                                                    <span class="badge badge-success">Completed</span>
                                                                @else
                                                                    <span class="badge badge-danger">Incomplete</span>
                                                                @endif
                                                            </td>

                                                            <td>
                                                                <b class="text-danger">Provide Help</b>
                                                            </td>
                                                            <td>{{number_format($row->amount)}}</td>
                                                            <td>{{$row->user->username}}</td>
                                                        </tr>
                                                    @endforeach
                                                @endif
                                                @if($total_completed_gh->count() > 0)
                                                    @foreach($total_completed_gh as $row)
                                                        <tr>
                                                            <td>{{\Carbon\Carbon::parse($row->created_at)}}</td>
                                                            <td>{{\Carbon\Carbon::parse($row->created_at)->format('d/m/y')}}</td>
                                                            <td>{{\Carbon\Carbon::parse($row->created_at)->format('l\, g:i A')}}</td>
                                                            <td>
                                                                @if($row->status == 'completed')
                                                                    <span class="badge badge-success">Completed</span>
                                                                @else
                                                                    <span class="badge badge-danger">Incomplete</span>
                                                                @endif
                                                            </td>

                                                            <td>
                                                                <b class="text-primary">Get Help</b>
                                                            </td>
                                                            <td>{{number_format($row->amount)}}</td>
                                                            <td>{{$row->user->username}}</td>
                                                        </tr>
                                                    @endforeach
                                                @endif
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif

                <!-- end row -->


            </div>
        </div>
    </div>



@endsection

@section('js')
    <script>
        $('#all-transactions').DataTable({
            "language": {
                "emptyTable": "No Transaction Yet."
            },
            "order": [[ 0, "desc" ]],
            "columnDefs": [
                {
                    "targets": [ 0 ],
                    "visible": false,
                }
            ]
        })
    </script>
@endsection
