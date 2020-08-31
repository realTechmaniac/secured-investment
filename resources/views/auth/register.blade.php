<!doctype html>
<html lang="en">


<head>

    <title>Secured Investment -Register</title>
    @include('includes.head-content-include')

</head>

<body>
<div class="account-pages my-5 pt-sm-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-9 col-xl-7">
                <div class="card overflow-hidden">
                    <div class="bg-soft-primary">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="text-primary p-4">
                                    <h5 class="text-primary"><b>Register</b></h5>
                                    <p>register now to join us.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div>
                            <a href="{{route('welcome')}}">
                                <div class="avatar-md profile-user-wid mb-4">
                                            <span class="avatar-title rounded-circle bg-light">
                                                <img src="{{asset('assets/images/securedlogo.png')}}" alt=""
                                                     class="rounded-circle" height="34">
                                            </span>
                                </div>
                            </a>
                        </div>
                        <div class="p-2">
                            <form class="form-horizontal" action="{{route('register')}}" method="POST">
                                @csrf
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="first_name">First Name</label>
                                            <input type="text" class="form-control" name="first_name" id="first_name"
                                                   placeholder="First Name" required value="{{ old('first_name') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="last_name">Last Name</label>
                                            <input type="text" class="form-control" name="last_name" id="last_name"
                                                   placeholder="Last Name" required value="{{ old('last_name') }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="username">Username</label>
                                            <input type="text" class="form-control" name="username" id="username"
                                                   placeholder="Username" required value="{{ old('username') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="label">Gender</label>
                                            <div class="d-flex justify-content-start">
                                                <div class="custom-control custom-switch mb-2" dir="ltr">
                                                    <input type="radio" name="gender" value="male" {{ old('gender')=="male" ? 'checked='.'"'.'checked'.'"' : '' }} class="custom-control-input" id="male">
                                                    <label class="custom-control-label" for="male">Male</label>
                                                </div>
                                                <div class="custom-control custom-switch mb-2 ml-3" dir="ltr">
                                                    <input type="radio" name="gender" {{ old('gender')=="female" ? 'checked='.'"'.'checked'.'"' : '' }} value="female" class="custom-control-input" id="female" >
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
                                                   placeholder="Email" required value="{{ old('email') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="phone_number">Phone Number</label>
                                            <input type="text" class="form-control" placeholder="format +234XXXXXXXXXX" name="phone_number" id="phone_number" required value="{{ old('phone_number') }}">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password" class="form-control" name="password" id="password"
                                                   placeholder="Password" required value="{{ old('password') }}">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="password_confirmation">Confirm Password</label>
                                            <input type="password" class="form-control" placeholder="Confirm Password" name="password_confirmation" id="password_confirmation" required>
                                        </div>
                                    </div>
                                </div>

                                <input type="hidden" name="ref" value="{{$ref}}">

                                <div class="mt-4">
                                    <button class="btn btn-primary btn-block waves-effect waves-light" type="submit">
                                        Register
                                    </button>
                                </div>

                                {{--<div class="mt-4 text-center">
                                    <p class="mb-0">By registering you agree to the Secured Investment <a href="#" class="text-primary">Terms of Use</a></p>
                                </div>--}}

                            </form>
                        </div>

                        <div class="mt-5 text-center">
                            <p>Already have an account with us? <a href="{{route('login')}}"
                                                                   class="font-weight-medium text-primary"> Login</a>
                            </p>
                            <p>© 2020 <a href="{{route('welcome')}}">Secured Investment</a>. All right reserved</p>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

<!-- JAVASCRIPT -->
<script src="{{asset('assets/libs/jquery/jquery.min.js')}}"></script>
<script src="{{asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script src="{{asset('assets/libs/metismenu/metisMenu.min.js')}}"></script>
<script src="{{asset('assets/libs/simplebar/simplebar.min.js')}}"></script>
<script src="{{asset('assets/libs/node-waves/waves.min.js')}}"></script>

<!-- App js -->
<script src="{{asset('assets/js/app.js')}}"></script>

<script src="{{asset('assets/libs/toastr/build/toastr.min.js')}}"></script>
<script type="text/javascript">
    @if(session('danger'))
    toastr.error('{{session("danger")}}');
    @endif
    @if(count($errors)>0)
    @foreach($errors->all() as $error)
    toastr.error('{{$error}}');
    @endforeach
    @endif
    @if(session('success'))
    toastr.success('{{session("success")}}');
    @endif
</script>
</body>

</html>
