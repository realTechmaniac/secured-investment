@extends('layouts.userApp')

@section('page-title')Secured Investment -Admin | Referrals @endsection

@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="mb-0 font-size-18">Users You Referred</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">Your Referrals</h4>
                                <p class="card-title-desc">Below are users that registered via your referral link.</p>
                                <p><b>Your Referral link is: </b> <a href="#">https://securedinvestment.com/register/{{auth()->user()->referrerDetail->referrer_link}}</a></p>

                                <div class="table-rep-plugin">
                                    <div class="mb-0" data-pattern="priority-columns">

                                        <table id="referrals-datatable" class="table table-bordered dt-responsive nowrap"
                                               style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                            <tr>
                                                <th>Date Registered</th>
                                                <th>Time Registered</th>
                                                <th>Date Active</th>
                                                <th>Time Active</th>
                                                <th>Username</th>
                                                <th>PH Completed</th>

                                            </tr>
                                            </thead>
                                            <tbody>
                                            @if($refs->count() > 0)
                                                @foreach($refs as $row)
                                                    <tr>
                                                        <td>{{\Carbon\Carbon::parse($row->user->created_at)->format('d/m/y')}}</td>
                                                        <td>{{\Carbon\Carbon::parse($row->user->created_at)->format('g:i A')}}</td>
                                                        <td>{{\Carbon\Carbon::parse($row->created_at)->format('d/m/y')}}</td>
                                                        <td>{{\Carbon\Carbon::parse($row->created_at)->format('g:i A')}}</td>
                                                        <td>{{$row->user->username}}</td>
                                                        <td><b class="text-primary">{{$row->user->provideHelps->count()}}</b></td>

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
                </div> <!-- end row -->


                <!-- end row -->


            </div>
        </div>
    </div>

@endsection

@section('js')
    <script>
        $('#referrals-datatable').DataTable({
            "language": {
                "emptyTable": "You have not referred an active user yet."
            },
            "order": [[ 1, "desc" ]]
        })
    </script>
@endsection
