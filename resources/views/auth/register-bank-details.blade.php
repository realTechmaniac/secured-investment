<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>Au Register Forms by Colorlib</title>

    <!-- Icons font CSS-->
    <link href="{{asset('asset4/assets/vendor/mdi-font/css/material-design-iconic-font.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('asset4/assets/vendor/font-awesome-4.7/css/font-awesome.min.css')}}" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="{{asset('asset4/assets/vendor/select2/select2.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('asset4/assets/vendor/datepicker/daterangepicker.css')}}" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{asset('asset4/assets/css/main.css')}}" rel="stylesheet" media="all">

    {{--Toastr--}}
    <link rel="stylesheet" type="text/css"
          href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css">

</head>

<body>

<div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
    <div class="wrapper wrapper--w680">
        <div class="card card-4">
            <div class="card-body">

                <h2 class="title">Fill You Bank Details</h2>

                <form method="POST" action="{{route('bank.store')}}">
                    @csrf
                    <div class="row row-space">
                        <div class="col-2">
                            <div class="input-group">
                                <label class="label">Account Name</label>
                                <input class="input--style-4" type="text" name="full_name" value="{{ old('full_name') }}" required>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="input-group">
                                <label class="label">Account Number</label>
                                <input class="input--style-4" type="number" name="account_number" value="{{ old('account_number') }}" required>
                            </div>
                        </div>
                    </div>

                    <div class="row row-space">
                        <div class="col-2">
                            <div class="input-group">
                                <label class="label">Bank Name</label>
                                <input class="input--style-4" type="text" name="bank_name" value="{{ old('bank_name') }}" required>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="input-group ">
                                <label class="label">Account Type</label>
                                <div class="p-t-10">
                                    <label class="radio-container m-r-45">Savings
                                        <input type="radio" {{ old('account_type')=="savings" ? 'checked='.'"'.'checked'.'"' : '' }} value="savings" checked="checked" name="account_type">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="radio-container">Current
                                        <input type="radio" {{ old('account_type')=="current" ? 'checked='.'"'.'checked'.'"' : '' }} value="current" name="account_type">
                                        <span class="checkmark"></span>
                                    </label>
                                    <label class="radio-container m-t-5">Fixed
                                        <input type="radio" {{ old('account_type')=="others" ? 'checked='.'"'.'checked'.'"' : '' }} value="others" name="account_type">
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-center p-t-15">
                        <button class="btn btn--radius-2 btn--blue justify-content-center" type="submit">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Jquery JS-->
<script src="{{asset('asset4/assets/vendor/jquery/jquery.min.js')}}"></script>
<!-- Vendor JS-->
<script src="{{asset('asset4/assets/vendor/select2/select2.min.js')}}"></script>
<script src="{{asset('asset4/assets/vendor/datepicker/moment.min.js')}}"></script>
<script src="{{asset('asset4/assets/vendor/datepicker/daterangepicker.js')}}"></script>

<!-- Main JS-->
<script src="{{asset('asset4/assets/js/global.js')}}"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
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

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
<!-- end document-->
