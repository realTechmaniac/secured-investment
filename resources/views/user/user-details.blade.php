@extends('layouts.userApp')

@section('page-title')Secured Investment -Admin | Users Details @endsection

@section('content')
    <div class="main-content">
        <div class="page-content">
            <div class="container-fluid">

                <!-- start page title -->
                <div class="row">
                    <div class="col-12">
                        <div class="page-title-box d-flex align-items-center justify-content-between">
                            <h4 class="mb-0 font-size-18">User Details</h4>
                        </div>
                    </div>
                </div>
                <!-- end page title -->

                <div class="row d-flex justify-content-center">
                    <div class="col-lg-7">
                        <div class="card">
                            <div class="card-body">

                                <h4 class="card-title">Your Submitted Details</h4>
                                <p class="card-title-desc">Tap on tab to switch</p>
                                <p class="card-title-desc">You can only change your password.
                                    Contact the admin to change any data other than password</p>

                                <!-- Nav tabs -->
                                <ul class="nav nav-pills nav-justified" role="tablist">
                                    <li class="nav-item waves-effect waves-light">
                                        <a class="nav-link active" data-toggle="tab" href="#home-1" role="tab">
                                            <span class="d-block d-sm-none"><i
                                                    class="fas fa-user"></i> User Details</span>
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
                                            <form class="form-horizontal">
                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="first_name">First Name</label>
                                                            <input type="text" class="form-control" name="first_name"
                                                                   id="first_name"
                                                                   placeholder="First Name" required
                                                                   value="{{$user->first_name}}" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="last_name">Last Name</label>
                                                            <input type="text" class="form-control" name="last_name"
                                                                   id="last_name"
                                                                   placeholder="Last Name" required
                                                                   value="{{$user->last_name}}" disabled>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row">
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="username">Username</label>
                                                            <input type="text" class="form-control" name="username"
                                                                   id="username"
                                                                   placeholder="Username" required
                                                                   value="{{$user->username}}" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label class="label">Gender</label>
                                                            <div class="d-flex justify-content-start">
                                                                <div class="custom-control custom-switch mb-2"
                                                                     dir="ltr">
                                                                    <input type="radio" name="gender" value="male"
                                                                           {{ $user->gender == 'male' ? 'checked='.'"'.'checked'.'"' : '' }} class="custom-control-input"
                                                                           id="male" {{$user->gender == 'male'? '' : 'disabled='.'"'.'disabled'.'"'}}>
                                                                    <label class="custom-control-label"
                                                                           for="male">Male</label>
                                                                </div>
                                                                <div class="custom-control custom-switch mb-2 ml-3"
                                                                     dir="ltr">
                                                                    <input type="radio" name="gender"
                                                                           {{ $user->gender == "female" ? 'checked='.'"'.'checked'.'"' : '' }} value="female"
                                                                           class="custom-control-input"
                                                                           id="female" {{$user->gender == 'female'? '' : 'disabled='.'"'.'disabled'.'"'}}>
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
                                                            <input type="email" class="form-control" name="email"
                                                                   id="email"
                                                                   placeholder="Email" required
                                                                   value="{{ $user->email }}" disabled>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-6">
                                                        <div class="form-group">
                                                            <label for="phone_number">Phone Number</label>
                                                            <input type="text" class="form-control"
                                                                   placeholder="format +234XXXXXXXXXX"
                                                                   name="phone_number" id="phone_number" required
                                                                   value="{{ $user->phone_number }}" disabled>
                                                        </div>
                                                    </div>
                                                </div>

                                                {{--<div class="mt-4 text-center">
                                                    <p class="mb-0">By registering you agree to the Secured Investment <a href="#" class="text-primary">Terms of Use</a></p>
                                                </div>--}}
                                                <button type="button"
                                                        class="btn btn-primary waves-effect waves-light"
                                                        data-toggle="modal"
                                                        data-target=".change-password-modal">
                                                    <i class="fa fa-lock"></i> Change Password
                                                </button>
                                            </form>
                                        </div>
                                    </div>
                                    <div class="tab-pane" id="settings-1" role="tabpanel">
                                        <div class="p-2">
                                            <form class="form-horizontal">
                                                <div class="form-group">
                                                    <label for="full_name">Account Name</label>
                                                    <input class="form-control" id="full_name"
                                                           placeholder="Enter Account Name" type="text" name="full_name"
                                                           value="{{ $user->bankDetail->full_name }}" disabled>
                                                </div>

                                                <div class="form-group">
                                                    <label for="account_number">Account Number</label>
                                                    <input class="form-control" id="account_number"
                                                           placeholder="Enter Account Number" type="number"
                                                           name="account_number"
                                                           value="{{ $user->bankDetail->account_number }}" disabled>
                                                </div>

                                                <div class="form-group">
                                                    <label for="bank_name">Bank Name</label>
                                                    <input class="form-control" id="bank_name"
                                                           placeholder="Enter Bank Name" type="text" name="bank_name"
                                                           value="{{ $user->bankDetail->bank_name }}" disabled>
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

    <div class="modal fade change-password-modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
         style="display: none;" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title mt-0" id="myModalLabel"><i class="fa fa-key"></i> Change Password</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                    </button>
                </div>
                <form action="{{route('change.password', $user->token)}}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="first_name">Old Password</label>
                            <input type="password" class="form-control" name="old_password" id="first_name"
                                   placeholder="Enter Your Old Password" required>
                        </div>
                        <div class="form-group">
                            <label for="password">New Password</label>
                            <input type="password" class="form-control" name="password" id="password"
                                   placeholder="Enter Your New Password" required>
                        </div>
                        <div class="form-group">
                            <label for="password_confirmation">Confirm New Password</label>
                            <input type="password" class="form-control" name="password_confirmation"
                                   id="password_confirmation"
                                   placeholder="Enter Your New Password Again" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary waves-effect waves-light">Save Changes</button>
                    </div>
                </form>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div>
@endsection

@section('js')

@endsection
