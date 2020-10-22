<!doctype html>
<html lang="en">
<head>

    <title>Secured Investment -Login</title>
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
                                    <h5 class="text-primary"><b class="text-primary">Login</b></h5>
                                    <p>to continue using Secured Investment</p>
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
                            <form class="form-horizontal" action="{{route('login')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="username">Username</label>
                                    <input type="text" class="form-control" name="username" id="username" placeholder="Enter username" value="{{ old('username') }}"
                                           required autocomplete="username">
                                </div>

                                <div class="form-group">
                                    <label for="password">Password</label>
                                    <input type="password" class="form-control" name="password" id="password" placeholder="Enter password" value="{{ old('password') }}"
                                           required autocomplete="password">
                                </div>

                                <div class="mt-3">
                                    <button class="btn btn-primary btn-block waves-effect waves-light" type="submit">Login</button>
                                </div>

                                {{--<div class="mt-4 text-center">
                                    <a href="auth-recoverpw.html" class="text-muted"><i class="mdi mdi-lock mr-1"></i> Forgot your password?</a>
                                </div>--}}
                            </form>
                        </div>

                        <div class="mt-5 text-center">
                            <p>Don't have an account ? <a href="{{route('register')}}" class="font-weight-medium text-primary"> Sign Up here </a> </p>
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
