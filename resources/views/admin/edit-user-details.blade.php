@extends('layouts.adminApp')

@section('page-title')Secured Investment -Admin | Edit User Details @endsection

@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="mb-0 font-size-18">Admin- Edit User Details</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row d-flex justify-content-center">
                    <div class="col-lg-7">
                        <div class="card">
                            <div class="card-body">

                                @if($user->misc_token)
                                    <div class="alert alert-info"><a href="#">https://www.securedinvestment.com/reset-password/{{$user->misc_token}}</a></div>
                                @endif

                                <h4 class="card-title">User Details</h4>
                                <a href="{{route('generate.password.reset.link', $user->token)}}" class="btn btn-sm btn-primary">Generate Password Reset Link</a>
                                <p class="card-title-desc mt-2">Tap on tab to switch</p>

                                <!-- Nav tabs -->
                                <ul class="nav nav-pills nav-justified" role="tablist">
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link active" data-toggle="tab" href="#home-1" role="tab">
                                            <span class="d-block d-sm-none"><i class="fas fa-user"></i> User Details</span>
                                            <span class="d-none d-sm-block"><i class="fas fa-user"></i> Personal Details</span>
                                        </a>
                                    </li>
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link" data-toggle="tab" href="#settings-1" role="tab">
                                            <span class="d-block d-sm-none"><i class="fas fa-building"></i> Bank Details</span>
                                            <span class="d-none d-sm-block"><i class="fas fa-building"></i> Bank Details</span>
                                        </a>
                                    </li>
                                </ul>

                                <!-- Tab panes -->
                                <div class="tab-content text-muted">
                                    <div class="tab-pane active" id="home-1" role="tabpanel">
                                        <div class="p-2">
                                            <form class="form-horizontal" action="{{route('save.user.details', $user->token)}}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="first_name">First Name</label>
                                                            <input type="text" class="form-control" name="first_name" id="first_name"
                                                                   placeholder="First Name" required value="{{$user->first_name}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="last_name">Last Name</label>
                                                            <input type="text" class="form-control" name="last_name" id="last_name"
                                                                   placeholder="Last Name" required value="{{$user->last_name}}">
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="username">Username</label>
                                                            <input type="text" class="form-control" name="username" id="username"
                                                                   placeholder="Username" required value="{{$user->username}}">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label class="label">Gender</label>
                                                            <div class="d-flex justify-content-start">
                                                                <div class="custom-control custom-switch mb-2" dir="ltr">
                                                                    <input type="radio" name="gender" value="male" {{ $user->gender == 'male' ? 'checked='.'"'.'checked'.'"' : '' }} class="custom-control-input" id="male">
                                                                    <label class="custom-control-label" for="male">Male</label>
                                                                </div>
                                                                <div class="custom-control custom-switch mb-2 ml-3" dir="ltr">
                                                                    <input type="radio" name="gender" {{ $user->gender == "female" ? 'checked='.'"'.'checked'.'"' : '' }} value="female" class="custom-control-input" id="female" >
                                                                    <label class="custom-control-label" for="female">Female</label>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="email">Email</label>
                                                            <input type="email" class="form-control" name="email" id="email"
                                                                   placeholder="Email" required value="{{ $user->email }}">
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="phone_number">Phone Number</label>
                                                            <input type="text" class="form-control" placeholder="format +234XXXXXXXXXX" name="phone_number" id="phone_number" required value="{{ $user->phone_number }}">
                                                        </div>
                                                    </div>
                                                </div>

                                                @if(auth()->user()->role == 'ceo')
                                                    <div class="row">
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label class="label">Ordinary User Roles</label>
                                                                <div class="d-flex justify-content-start">
                                                                    <div class="custom-control custom-switch mb-2" dir="ltr">
                                                                        <input type="radio" name="role" value="regular" {{ $user->role =="regular" ? 'checked='.'"'.'checked'.'"' : '' }} class="custom-control-input" id="regular" {{$user->role == 'ceo'?'disabled='.'"'.'disabled'.'"' : ''}}>
                                                                        <label class="custom-control-label" for="regular">Regular</label>
                                                                    </div>
                                                                    <div class="custom-control custom-switch mb-2 ml-3" dir="ltr">
                                                                        <input type="radio" name="role" {{ $user->role == "admin" ? 'checked='.'"'.'checked'.'"' : '' }} value="admin" class="custom-control-input" id="admin" {{$user->role == 'ceo'?'disabled='.'"'.'disabled'.'"' : ''}}>
                                                                        <label class="custom-control-label" for="admin">Admin</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-lg-6">
                                                            <div class="form-group">
                                                                <label class="label">Super User Roles</label>
                                                                <div class="d-flex justify-content-start">
                                                                    <div class="custom-control custom-switch mb-2" dir="ltr">
                                                                        <input type="radio" name="role" {{ $user->role == "manager" ? 'checked='.'"'.'checked'.'"' : '' }} value="manager" class="custom-control-input" id="manager" {{$user->role == 'ceo'?'disabled='.'"'.'disabled'.'"' : ''}}>
                                                                        <label class="custom-control-label" for="manager">Manager</label>
                                                                    </div>
                                                                    <div class="custom-control custom-switch mb-2 ml-3" dir="ltr">
                                                                        <input type="radio" name="role" {{ $user->role == "ceo" ? 'checked='.'"'.'checked'.'"' : '' }} value="ceo" class="custom-control-input" id="ceo" {{$user->role == 'ceo'? '' : 'disabled='.'"'.'disabled'.'"'}}>
                                                                        <label class="custom-control-label" for="ceo">CEO</label>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                @endif

                                                <div class="mt-4">
                                                    <button class="btn btn-primary btn-block waves-effect waves-light" type="submit">
                                                        Update User Details
                                                    </button>
                                                </div>

                                                {{--<div class="mt-4 text-center">
                                                    <p class="mb-0">By registering you agree to the Secured Investment <a href="#" class="text-primary">Terms of Use</a></p>
                                                </div>--}}

                                            </form>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="settings-1" role="tabpanel">
                                        <div class="p-2">
                                            <form class="form-horizontal" action="{{route('save.bank.details', $user->bankDetail->token)}}" method="POST">
                                                @csrf
                                                @method('PUT')
                                                <div class="form-group">
                                                    <label for="full_name">Account Name</label>
                                                    <input class="form-control" id="full_name" placeholder="Enter Account Name" type="text" name="full_name" value="{{ $user->bankDetail->full_name }}" required>
                                                </div>

                                                <div class="form-group">
                                                    <label for="account_number">Account Number</label>
                                                    <input class="form-control" id="account_number" placeholder="Enter Account Number" type="number" name="account_number" value="{{ $user->bankDetail->account_number }}" required>
                                                </div>

                                                <div class="form-group">
                                                    <label for="bank_name">Bank Name</label>
                                                    <input class="form-control" id="bank_name" placeholder="Enter Bank Name" type="text" name="bank_name" value="{{ $user->bankDetail->bank_name }}" required>
                                                </div>

                                                <div class="mt-3">
                                                    <button class="btn btn-primary btn-block waves-effect waves-light" type="submit">Update Bank Details</button>
                                                </div>

                                                {{--<div class="mt-4 text-center">
                                                    <a href="auth-recoverpw.html" class="text-muted"><i class="mdi mdi-lock mr-1"></i> Forgot your password?</a>
                                                </div>--}}
                                            </form>
                                        </div>
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
@endsection

@section('js')

@endsection
