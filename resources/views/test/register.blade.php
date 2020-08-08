
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Sign Up Form by Colorlib</title>

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
                        <div class="form-row">
                            <div class="form-group">
                                <label for="first_name">First name</label>
                                <input type="text" class="form-input" name="first_name" id="first_name" />
                            </div>
                            <div class="form-group">
                                <label for="last_name">Last name</label>
                                <input type="text" class="form-input" name="last_name" id="last_name" />
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group form-icon">
                                <label for="username">Username</label>
                                <input type="text" class="form-input" name="username" id="username" placeholder="" />
                            </div>
                            <div class="form-radio">
                                <label for="gender">Gender</label>
                                <div class="form-flex">
                                    <input type="radio" name="gender" value="male" id="male" checked="checked" />
                                    <label for="male">Male</label>
    
                                    <input type="radio" name="gender" value="female" id="female" />
                                    <label for="female">Female</label>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="phone_number">Phone number</label>
                            <input type="number" class="form-input" name="phone_number" id="phone_number" />
                        </div>
                        <div class="form-row">
                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" class="form-input" name="password" id="password"/>
                            </div>
                            <div class="form-group">
                                <label for="re_password">Repeat your password</label>
                                <input type="password" class="form-input" name="re_password" id="re_password"/>
                            </div>
                        </div>
                        <div class="form-text">
                            <a href="#" class="add-info-link"><i class="zmdi zmdi-chevron-right"></i>Additional info</a>
                            <div class="add_info">
                                <div class="text-center">
                                    <h2>BANK DETAILS</h2>
                                </div>
                                <div class="form-group">
                                    <label for="account_name">Account Name</label>
                                    <input type="text" class="form-input" name="account_name" id="email"/>
                                </div>

                                <div class="form-group">
                                    <label for="account_name">Account Number</label>
                                    <input type="text" class="form-input" name="account_no" id="email"/>
                                </div>
                                <div class="form-group">
                                    <label for="account_name">Bank Name</label>
                                    <input type="text" class="form-input" name="account_no" id="email"/>
                                </div>
                                <div class="form-group">
                                    <label for="country">Account Type</label>
                                    <div class="select-list">
                                        <select name="country" id="country" required>
                                            <option value="US">Savings</option>
                                            <option value="UK">Current</option>
                                            <option value="VN">Fixed</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="submit" id="submit" class="form-submit" value="Submit"/>
                        </div>
                    </form>
                </div>
            </div>
        </section>

    </div>

    <!-- JS -->
    <script src="{{asset('asset3/vendor/jquery/jquery.min.js')}}"></script>
    <script src="{{asset('asset3/vendor/jquery-ui/jquery-ui.min.js')}}"></script>
    <script src="{{asset('asset3/vendor/jquery-validation/dist/jquery.validate.min.js')}}"></script>
    <script src="{{asset('asset3/vendor/jquery-validation/dist/additional-methods.min.js')}}"></script>
    <script src="{{asset('asset3/js/main.js')}}"></script>
</body><!-- This templates was made by Colorlib (https://colorlib.com) -->
</html>