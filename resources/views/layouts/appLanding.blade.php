<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="img/favicon.png" type="image/png">
    <title>Home</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('asset/css/bootstrap.css')}}">
    <link rel="stylesheet" href="{{asset('asset/vendors/linericon/style.css')}}">
    <link rel="stylesheet" href="{{asset('asset/css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('asset/vendors/owl-carousel/owl.carousel.min.css')}}">
    <link rel="stylesheet" href="{{asset('asset/vendors/nice-select/css/nice-select.css')}}">
    <link rel="stylesheet" href="{{asset('asset/vendors/animate-css/animate.css')}}">
    <link rel="stylesheet" href="{{asset('asset/vendors/flaticon/flaticon.css')}}">
    <!-- main css -->
    <link rel="stylesheet" href="{{asset('asset/css/style.css')}}">
    <link rel="stylesheet" href="{{asset('asset/css/responsive.css')}}">

    {{--Toastr--}}
    <link rel="stylesheet" type="text/css" href="{{asset('assets/libs/toastr/build/toastr.min.css')}}">

</head>
<body>

<!--================Header Menu Area =================-->
<header class="header_area">
    <div class="main_menu">
        <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container box_1620">
                <!-- Brand and toggle get grouped for better mobile display -->
                <a class="navbar-brand logo_h" href="index.html"><img src="{{asset('assets/images/secur.png')}}" alt="" height="50px" alt=""></a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <!-- Collect the nav links, forms, and other content for toggling -->
                <div class="ml-auto" id="navbarSupportedContent">
                    <ul class="nav navbar-nav menu_nav justify-content-center">
                        @auth
                            @if(auth()->user()->role == 'regular')
                                <li class="nav-item active"><a class="nav-link" href="{{route('dashboard')}}">Dashboard</a></li>
                            @else
                                <li class="nav-item active"><a class="nav-link" href="{{route('admin.dashboard')}}">Dashboard</a></li>
                            @endif
                        @else
                            <li class="nav-item active"><a class="nav-link" href="{{route('login')}}">Login</a></li>
                            <li class="nav-item active"><a class="nav-link" href="{{route('register')}}">Register</a></li>
                        @endauth
                            <li class="nav-item"><a class="nav-link" href="{{route('terms')}}">T&C</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</header>
<!--================Header Menu Area =================-->

<!--================Home Banner Area =================-->
<section class="home_banner_area">
    <div class="banner_inner">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="banner_content">
                        <h2>Invest and be Financial Free !</h2>
                        <p>Sign Up process super easy with awesome user friendly interface.<strong> You get 50% of your investment in 2 days and subsequently in 4 days.</strong></p>
                        @auth
                            @if(auth()->user()->role == 'regular')
                                <a class="banner_btn2" href="{{route('dashboard')}}">Goto Dashboard</a>
                            @else
                                <a class="banner_btn2" href="{{route('admin.dashboard')}}">Goto Dashboard</a>
                            @endif
                        @else
                            <a class="banner_btn" href="{{route('login')}}">LOG IN</a>
                            <a class="banner_btn2" href="{{route('register')}}">REGISTER</a>
                        @endauth
                    </div>
                </div>
                <div class="col-lg-7">
                    <div class="home_left_img">
                        <img class="img-fluid" src="" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!--================CONTENT AREA =================-->


@yield('content');


<!--================ END CONTENT AREA=================-->





<!--================Footer Area =================-->
<footer class="footer_area p_120">
    <div class="container">
        <div class="row footer_inner">
            <div class="col-lg-5 col-sm-6">
                <aside class="f_widget ab_widget">
                    <div class="f_title">
                        <h3>Quick Links</h3>
                    </div>
                    <p><a href="{{route('terms')}}">Terms and Conditions</a></p>
                    <p><a href="">How it Works</a></p>
                </aside>
            </div>
            <div class="col-lg-5 col-sm-6">
                <aside class="f_widget news_widget">
                    <div class="f_title">
                        <h3>Newsletter</h3>
                    </div>
                    <p>Stay updated with our latest trends</p>
                    <div id="mc_embed_signup">
                        <form target="_blank" action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01" method="get" class="subscribe_form relative">
                            <div class="input-group d-flex flex-row">
                                <input name="EMAIL" placeholder="Enter email address" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Email Address '" required="" type="email">
                                <button class="btn sub-btn"><span class="lnr lnr-arrow-right"></span></button>
                            </div>
                            <div class="mt-10 info"></div>
                        </form>
                    </div>
                </aside>
            </div>
            <div class="col-lg-2">
                <aside class="f_widget social_widget">
                    <div class="f_title">
                        <h3>Join Us</h3>
                    </div>
                    <p>Let us be social</p>
                    <ul class="list">
                        <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                        <li><a href="#"><i class="fa fa-whatsapp"></i></a></li>
                        <li><a href="#"><i class="fa fa-telegram-plane"></i></a></li>
                    </ul>
                </aside>
            </div>
        </div>
    </div>
</footer>
<!--================End Footer Area =================-->

<script type="text/javascript">
    function toggleIcon(e) {
        $(e.target)
            .prev('.panel-heading')
            .find(".more-less")
            .toggleClass('glyphicon-plus glyphicon-minus');
    }
    $('.panel-group').on('hidden.bs.collapse', toggleIcon);
    $('.panel-group').on('shown.bs.collapse', toggleIcon);
</script>



<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="{{asset('asset/js/jquery-3.2.1.min.js')}}"></script>
<script src="{{asset('asset/js/popper.js')}}"></script>
<script src="{{asset('asset/js/bootstrap.min.js')}}"></script>
<script src="{{asset('asset/js/stellar.js')}}"></script>
<script src="{{asset('assets/libs/metismenu/metisMenu.min.js')}}"></script>
<script src="{{asset('asset/vendors/lightbox/simpleLightbox.min.js')}}"></script>
<script src="{{asset('asset/vendors/nice-select/js/jquery.nice-select.min.js')}}"></script>
<script src="{{asset('asset/vendors/isotope/imagesloaded.pkgd.min.js')}}"></script>
<script src="{{asset('asset/vendors/isotope/isotope-min.js')}}"></script>
<script src="{{asset('asset/vendors/owl-carousel/owl.carousel.min.js')}}"></script>
<script src="{{asset('asset/js/jquery.ajaxchimp.min.js')}}"></script>
<script src="{{asset('asset/vendors/counter-up/jquery.waypoints.min.js')}}"></script>
<script src="{{asset('asset/vendors/counter-up/jquery.counterup.min.js')}}"></script>
<script src="{{asset('asset/js/mail-script.js')}}"></script>
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
<!--gmaps Js-->
<script src="https://maps.googleapis.com/maps/apijs?key=AIzaSyCjCGmQ0Uq4exrzdcL6rvxywDDOvfAu6eE"></script>
<script src="js/gmaps.min.js')}}"></script>
<script src="js/theme.js')}}"></script>
</body>
</html>
