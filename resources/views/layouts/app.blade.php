<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.theme.min.css">
    <!-- Styles -->
    <link href="{{URL::to('css/style.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{URL::to('css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{URL::to('css/font-awesome.min.css')}}">
    <link rel="stylesheet" href="{{URL::to('css/docs.css')}}">
    <link rel="stylesheet" href="{{URL::to('css/bootstrap-social.css')}}">
    <link href="{{URL::to('css/nav.css')}}" rel="stylesheet">
    <script src="{{URL::to('js/jquery.min.js')}}"></script>
    <script src="{{URL::to('js/bootstrap.min.js')}}"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/owl-carousel/1.3.3/owl.carousel.min.js"></script>

</head>
<body>
    <div class="scroll-class"></div>
<div class="container-fluid">
            <nav class="navbar navbar-default navbar-fixed-top pos-menu" id="transparent">

                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false"
                            aria-controls="navbar">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    </button>
                    <a href="{{Route('welcome')}}"><img src="{{URL::to('img/i-junior-wh.png')}}" class="navbar-brand hidden-mb" style="height:75px !important; margin-top:-20px;"></a>
                     <a href="{{Route('welcome')}}"><img src="{{URL::to('img/i-junior.png')}}" class="navbar-brand hidden-cm" style="    height: 65px !important; margin-top: -9px; position: absolute;"></a>   
                    </div>
                    <div id="navbar" class="collapse navbar-collapse navbar-right list-menu" style="overflow:hidden">
                        <ul class="nav navbar-nav">
                            <li><a href="#">home</a></li>
                            <li><a href="#">about us</a></li>
                            <li><a href="#">programs</a></li>
                            <li><a href="#">contacts</a></li>
                            <?php
                                if (Auth::check())
                                {
                                ?>
                                 <li><a href="{{Route('logout')}}">LOGOUT</a></li>
                                <?php 
                                }else{
                                    echo '<li class="register drop" style="margin-left: 16px"><a href="#loginModal" data-toggle="modal" class="" onclick="showsignup()">Register Now</a></li>';
                                }
                                
                            ?>
                            <li class="line hidden-sm hidden-xs"></li>
                            @if (Auth::check())
                                @if(Auth::user()->id_schools_name==2)
                                    <li><a href="{{Route('university')}}"><span class="login-btn">Login page</span></a></li>
                                @else
                                    <?php $info = DB::table('student_datas')->where('id_user', Auth::user()->id)->first(); ?>
                                    @if(count($info) > 0)
                                        <li><a href="{{Route('profile-info')}}"><span class="login-btn">Login page</span></a></li>                                        
                                    @else
                                        <li><a href="{{Route('profile-filling')}}"><span class="login-btn">Login page</span></a></li>
                                    @endif
                                @endif
                            @else
                                <li class="register "><a href="#loginModal" class="btn btn-default" data-toggle="modal" onclick="showsignin()">
                                        <div class="btn-login">Login Page</div></a></li>
                            @endif
                            <li class="register1">
                          </li>
                        </ul>
                    </div>
<div class="btn-group lang" role="group">
    <button id="droplang" type="button" class="btn btn-drop dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
     <img src="{{URL::to('img/usa.png')}}" style="margin-right: 4px;" alt="USA"><i class="caret"></i>
    </button>
    <ul class="dropdown-menu" aria-labelledby="droplang">
        <li> <a class="dropdown-item" href="#"><img src="{{URL::to('img/rus.png')}}" alt="RUS"></a></li>
        <li> <a class="dropdown-item" href="#"><img src="{{URL::to('img/esp.png')}}" alt="ESP"></a></li>
    </ul>

  </div>
            </nav>
        </div>
    
        @yield('content')

<!--FOOTER-->
<br>
    <div class="container" id="ffooter">
        <div class="col-md-5 col-lg-5 col-sm-12 col-xs-12 center-xs" style="padding-left:15%">
            <div class="social"><a href=""><span class="fa fa-facebook fa-lg"></span></a></div>
            <div class="social"><a href=""><span class="fa fa-twitter fa-lg"></span></a></div>
            <div class="social"><a href=""><span class="fa fa-instagram fa-lg"></span></a></div>
            <div class="social"><a href=""><span class="fa fa-google-plus fa-lg"></span></a></div>
        </div>
        <div class="col-md-7 col-lg-7 col-sm-12 col-xs-12 center-xs">
            <h3><b>See the complete list of social media sites ></b></h3>
        </div>
    </div>
        <div class="footer">
            <div class="container">
                <div class="col-lg-4 col-md-4 col-ms-4 col-xs-12 text-left center-xs">
                    <ul class="footer_list">
                        <a href="{{Route('welcome')}}"><img src="{{URL::to('img/i-junior.png')}}" width="180" alt=""></a>
                    </ul>
                </div>
                <div class="col-lg-4 col-md-4 col-ms-4 col-xs-12 text-center">
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-right">
                        <ul class="footer_list">
                            <li><a href=""><b>HOME</b></a></li>
                            <li><a href=""><b>ABOUT US</b></a></li>
                        </ul>
                    </div>
                    <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 text-left">
                        <ul class="footer_list">
                            <li><a href=""><b>PROGRAM</b></a></li>
                            <li><a href=""><b>CONTACTS</b></a></li>
                        </ul>
                    </div>

                </div>
                <div class="col-lg-4 col-md-4 col-ms-4 col-xs-12 text-right center-xs">
                    <button class="btn-footer">Sign up</button><br>
                    <button class="btn-footer">For colleges</button>
                </div>
            </div>
        </div>
        <div class="container-fluid downfooter">
            <div class="container" style="padding:5px;">
            <div class="col-md-6 col-sm-12 col-xs-12 center-xs">
                <b>&copy; 2017 University of America - All right reserved</b>
            </div>
            <div class="col-md-6 col-sm-12 col-xs-12 text-right center-xs">
                <ul class="footer-menu">
                <li>Contact us</li>
                <li>Legal Notice</li>
                <li>Sitemap</li>
            </ul>
            </div>
        </div>
        </div>
    <!-- Scripts -->
    
    <script src="{{URL::to('js/slider.js')}}"></script>
    <script src="{{URL::to('js/docs.js')}}"></script>
    
@include('includes.modal')


    <script>
     $(document).ready(function () {
            $("#testimonial-slider").owlCarousel({
                items: 3,
                itemsDesktop: [1000, 3],
                itemsDesktopSmall: [979, 2],
                itemsTablet: [768, 2],
                itemsMobile: [650, 1],
                pagination: false,
                navigation:true,
                navigationText:["",""],
              
            });
        });
        $('#carousel').carousel()
    </script>
    <script src="{{URL::to('js/paralaxbg.js')}}"></script>
    <script>
        var secondaryNav = $('.scroll-class'),
            secondaryNavTopPosition = secondaryNav.offset().top;

        $(window).on('scroll', function () {

            if ($(window).scrollTop() > secondaryNavTopPosition) {
                $(".navbar-fixed-top").addClass('nav-scroll');
            } else {
                $(".navbar-fixed-top").removeClass('nav-scroll');
            }
        });
        initParalaxBg();
    </script>

    @if(session('status'))
    <!-- alert success -->
    <div class="alert alert-success">
    hoorah
    <button data>X</button>
    </div>
    @endif
</body>
</html>
