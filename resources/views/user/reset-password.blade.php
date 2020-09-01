<!doctype html>
<html lang="en">


<head>

    <title>Secured Investment -Reset Password</title>
    @include('includes.head-content-include')
</head>

<body>
<div class="account-pages my-5 pt-sm-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8 col-lg-6 col-xl-5">
                <div class="card overflow-hidden">
                    <div class="bg-soft-primary">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="text-primary p-4">
                                    <h5 class="text-primary"><b class="text-primary">Reset Your Password</b></h5>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="card-body pt-0">
                        <div>
                            <a href="{{route('welcome')}}">
                                <div class="avatar-md profile-user-wid mb-4">
                                            <span class="avatar-title rounded-circle bg-light">
                                                <img src="{{asset('assets/images/securedlogo.png')}}" alt="" class="rounded-circle" height="34">
                                            </span>
                                </div>
                            </a>
                        </div>
                        <div class="p-2">
                            <form class="form-horizontal" action="{{route('save.password.reset', $misc_token)}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="password">New Password</label>
                                    <input class="form-control" id="password" placeholder="Enter New Password" type="password" name="password" required>
                                </div>

                                <div class="form-group">
                                    <label for="password_confirmation">New Password Confirmation</label>
                                    <input class="form-control" id="password_confirmation" placeholder="Enter New Password Again" type="password" name="password_confirmation" required>
                                </div>

                                <div class="mt-3">
                                    <button class="btn btn-primary btn-block waves-effect waves-light" type="submit">Reset Password</button>
                                </div>

                                {{--<div class="mt-4 text-center">
                                    <a href="auth-recoverpw.html" class="text-muted"><i class="mdi mdi-lock mr-1"></i> Forgot your password?</a>
                                </div>--}}
                            </form>
                        </div>

                        <div class="mt-5 text-center">
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
