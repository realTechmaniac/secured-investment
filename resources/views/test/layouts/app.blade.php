<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Registration Form</title>

    <!-- Font Icon -->
    <link rel="stylesheet" href="{{asset('asset3/fonts/material-icon/css/material-design-iconic-font.min.css')}}">
    <link rel="stylesheet" href="{{asset('asset3/vendor/jquery-ui/jquery-ui.min.css')}}">

    <!-- Main css -->
    <link rel="stylesheet" href="{{asset('asset3/css/style.css')}}">
</head>
<body>

    <div class="main">
        
        <section class="signup">
            
            <!-- <img src="images/signup-bg.jpg" alt=""> -->
            <div class="container">
                <div class="signup-content">
                   
                    <form method="POST" id="signup-form" class="signup-form">
                         <div class="text-center">
                            <h2>REGISTRATION FORM</h2>
                         </div>
                        
                        
                         @yield('content')
                        
                    </form>
                </div>
            </div>
        </section>

    </div>

   
    <script src="{{asset('asset3/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('asset3/vendor/jquery-ui/jquery-ui.min.js')}}"></script>
    <script src="{{asset('asset3/vendor/jquery-validation/dist/jquery.validate.min.js')}}"></script>
    <script src="{{asset('asset3/vendor/jquery-validation/dist/additional-methods.min.js')}}"></script>
    <script src="{{asset('asset3/js/main.js')}}"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com)
</html>