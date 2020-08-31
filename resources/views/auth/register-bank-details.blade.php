<!doctype html>
<html lang="en">


<head>

    <title>Secured Investment -Bank Details</title>
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
                                    <h5 class="text-primary"><b class="text-primary">Bank Details</b></h5>
                                    <p>ensure that you provide a correct bank details</p>
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
                            <form class="form-horizontal" action="{{route('bank.store')}}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="full_name">Account Name</label>
                                    <input class="form-control" id="full_name" placeholder="Enter Account Name" type="text" name="full_name" value="{{ old('full_name') }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="account_number">Account Number</label>
                                    <input class="form-control" id="account_number" placeholder="Enter Account Number" type="number" name="account_number" value="{{ old('account_number') }}" required>
                                </div>

                                <div class="form-group">
                                    <label for="bank_name">Bank Name</label>
                                    <input class="form-control" id="bank_name" placeholder="Enter Bank Name" type="text" name="bank_name" value="{{ old('bank_name') }}" required>
                                </div>

                                <div class="mt-3">
                                    <button class="btn btn-primary btn-block waves-effect waves-light" type="submit">Complete Registration</button>
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
