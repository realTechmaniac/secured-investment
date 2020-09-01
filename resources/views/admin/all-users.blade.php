@extends('layouts.adminApp')

@section('page-title')Secured Investment -Admin | All Users @endsection

@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="mb-0 font-size-18">Admin- All Users</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="card-title">All Registered Users on Secured Investment</h4>
                                <p class="card-title-desc">Below is list of users. Admin can edit as required.</p>
                                <div class="table-rep-plugin">
                                    <div class="mb-0" data-pattern="priority-columns">
                                        <table id="all-users-datatable"
                                               class="table table-bordered dt-responsive nowrap"
                                               style="border-collapse: collapse; border-spacing: 0; width: 100%;">
                                            <thead>
                                            <tr>
                                                <th>S/N</th>
                                                <th>Username</th>
                                                <th>Email</th>
                                                <th>Phone No</th>
                                                <th>Status</th>
                                                <th>Role</th>
                                                <th>Action</th>
                                            </tr>
                                            </thead>
                                            <tbody>
                                            {{--{{dd($all_five_latest_transactions_gh)}}--}}
                                            @if($users->count() > 0)
                                                @foreach($users as $row)
                                                    <tr>
                                                        <td>{{$row->id}}</td>
                                                        <td>{{$row->username}}</td>
                                                        <td>{{$row->email}}</td>
                                                        <td>{{$row->phone_number}}</td>
                                                        <td>
                                                            @if($row->is_activated)
                                                                <div class="badge badge-success">Active</div>
                                                            @else
                                                                <div class="badge badge-danger">Inactive</div>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            @if($row->role == 'ceo')
                                                                <div class="badge badge-dark">CEO</div>
                                                            @elseif($row->role == 'manager')
                                                                <div class="badge badge-primary">Manager</div>
                                                            @elseif($row->role == 'admin')
                                                                <div class="badge badge-success">Admin</div>
                                                            @elseif($row->role == 'regular')
                                                                <div class="badge badge-soft-danger">Regular</div>
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <a href="{{route('edit.user.details', $row->token)}}" class="btn btn-primary btn-sm">
                                                                <span><i class="fa fa-edit"></i></span>
                                                                Edit User</a>
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                            @if(auth()->user()->role == 'ceo')
                                                <tr>
                                                    <td>{{$ceo->id}}</td>
                                                    <td>{{$ceo->username}}</td>
                                                    <td>{{$ceo->email}}</td>
                                                    <td>{{$ceo->phone_number}}</td>
                                                    <td>
                                                        @if($ceo->is_activated)
                                                            <div class="badge badge-success">Active</div>
                                                        @else
                                                            <div class="badge badge-danger">Inactive</div>
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <div class="badge badge-dark">CEO</div>
                                                    </td>
                                                    <td>
                                                        <a href="{{route('edit.user.details', $ceo->token)}}" class="btn btn-primary btn-sm">
                                                            <span><i class="fa fa-edit"></i></span>
                                                            Edit User</a>
                                                    </td>
                                                </tr>
                                            @endif
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div>

                <!-- end row -->
            </div>
        </div>
    </div>
@endsection

@section('js')
    <script>

        $('#all-users-datatable').DataTable({
            "language": {
                "emptyTable": "No registered users yet"
            },
            "order": [[0, "desc"]],
        })
    </script>
@endsection
