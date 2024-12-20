<!DOCTYPE html>
<html lang="zxx" class="no-js">

<style>
    html{
        scroll-behavior: smooth
    }
</style>

<head>
    <!-- Mobile Specific Meta -->
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <!-- Favicon-->
    <link rel="shortcut icon" href="img/fav.png" />
    <!-- Author Meta -->
    <meta name="author" content="colorlib" />
    <!-- Meta Description -->
    <meta name="description" content="" />
    <!-- Meta Keyword -->
    <meta name="keywords" content="" />
    <!-- meta character set -->
    <meta charset="UTF-8" />
    <!-- Site Title -->
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <link rel="shortcut icon" href="{{ asset('assets/client/logo/favicon-logo.png') }}" type="image/x-icon">
    <link rel="shortcut icon" href="{{ asset('assets/client/logo/favicon-logo.png') }}" type="image/png">

    <title>@yield('title')</title>

    <link href="https://fonts.googleapis.com/css?family=Poppins:100,200,400,300,500,600,700" rel="stylesheet" />
    <!-- CSS ============================================= -->
    <link rel="stylesheet" href="{{ asset('assets/client/css/linearicons.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/client/css/font-awesome.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/client/css/bootstrap.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/client/css/magnific-popup.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/client/css/jquery-ui.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/client/css/nice-select.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/client/css/animate.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/client/css/owl.carousel.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/client/css/main.css') }}" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <header id="header" style="z-index: 10000">
        <div class="header-top">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-sm-6 col-6 header-top-left">
                        {{-- <ul>
                            <li><a href="#">Visit Us</a></li>
                            <li><a href="#">Buy Tickets</a></li>
                        </ul> --}}
                    </div>
                    <div class="col-lg-6 col-sm-6 col-6 header-top-right">
                        {{-- <div class="header-social">
                            <a href="#"><i class="fa fa-facebook"></i></a>
                            <a href="#"><i class="fa fa-twitter"></i></a>
                            <a href="#"><i class="fa fa-dribbble"></i></a>
                            <a href="#"><i class="fa fa-behance"></i></a>
                        </div> --}}
                    </div>
                </div>
            </div>
        </div>
        <div class="container main-menu">
            <div class="row align-items-center justify-content-between d-flex">
                <div id="logo">
                    <a href="/"><img src="{{ asset('assets/logo travek.png') }}" style="height: 20px; scale: 2.5; margin-left: 20px; filter: invert(1);" alt=""
                            title="" /></a>
                </div>
                <nav id="nav-menu-container">
                    <ul class="nav-menu">
                        <li><a href="/">Home</a></li>
                        <li><a href="/destinations">Destination</a></li>
                        <li><a href="/packages-page">Packages</a></li>
                        <li class="menu-has-children">
                            @if (Auth::check())
                                <a href="">{{Auth::user()->name}}</a>
                                <ul>
                                    <li><a href="{{ route('booking.index') }}">Booking</a></li>
                                    <li><a href="/logout">Logout</a></li>
                                </ul>
                            @else
                                <a href="{{route('login')}}">Login</a>
                            @endif                            
                        </li>
                    </ul>
                </nav>
                <!-- #nav-menu-container -->
            </div>
        </div>
    </header>
    <!-- #header -->

    @yield('content');

    <!-- start footer Area -->
    <footer class="footer-area section-gap">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-footer-widget">
                        <h6>About Agency</h6>
                        <p>
                            The world has become so fast paced that people don’t want to stand by reading a page of
                            information, they would much rather look at a presentation and understand the message. It
                            has
                            come to a point
                        </p>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-footer-widget">
                        <h6>Navigation Links</h6>
                        <div class="row">
                            <div class="col">
                                <ul>
                                    <li><a href="#">Home</a></li>
                                    <li><a href="#">Destination</a></li>
                                </ul>
                            </div>
                            <div class="col">
                                <ul>
                                    <li><a href="#">Packages</a></li>
                                    <li><a href="#">Login</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-footer-widget">
                        <h6>Newsletter</h6>
                        <p>For business professionals caught between high OEM price and mediocre print and graphic
                            output.</p>
                        <div id="mc_embed_signup">
                            <form target="_blank"
                                action="https://spondonit.us12.list-manage.com/subscribe/post?u=1462626880ade1ac87bd9c93a&amp;id=92a4423d01"
                                method="get" class="subscription relative">
                                <div class="input-group d-flex flex-row">
                                    <input name="EMAIL" placeholder="Email Address" onfocus="this.placeholder = ''"
                                        onblur="this.placeholder = 'Email Address '" required="" type="email" />
                                    <button class="btn bb-btn"><span class="lnr lnr-location"></span></button>
                                </div>
                                <div class="mt-10 info"></div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6">
                    <div class="single-footer-widget mail-chimp">
                        <h6 class="mb-20">InstaFeed</h6>
                        <ul class="instafeed d-flex flex-wrap">
                            <li><img src="https://source.unsplash.com/random/58x58?sig=1" alt="" /></li>
                            <li><img src="https://source.unsplash.com/random/58x58?sig=2" alt="" /></li>
                            <li><img src="https://source.unsplash.com/random/58x58?sig=3" alt="" /></li>
                            <li><img src="https://source.unsplash.com/random/58x58?sig=4" alt="" /></li>
                            <li><img src="https://source.unsplash.com/random/58x58?sig=5" alt="" /></li>
                            <li><img src="https://source.unsplash.com/random/58x58?sig=6" alt="" /></li>
                            <li><img src="https://source.unsplash.com/random/58x58?sig=7" alt="" /></li>
                            <li><img src="https://source.unsplash.com/random/58x58?sig=8" alt="" /></li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="row footer-bottom d-flex justify-content-between align-items-center">
                <p class="col-lg-8 col-sm-12 footer-text m-0">
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                    Copyright &copy;
                    <script>
                        document.write(new Date().getFullYear());
                    </script> by <a href="https://www.instagram.com/ngrhdhrmwngs" target="_blank">Ngurah Dharmawangsa</a>
                    <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                </p>
                {{-- <div class="col-lg-4 col-sm-12 footer-social">
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-twitter"></i></a>
                    <a href="#"><i class="fa fa-dribbble"></i></a>
                    <a href="#"><i class="fa fa-behance"></i></a>
                </div> --}}
            </div>
        </div>
    </footer>
    <!-- End footer Area -->

    <script src="{{ asset('assets/client/js/vendor/jquery-2.2.4.min.js') }}"></script>
    <script src="{{ asset('assets/client/js/popper.min.js') }}"></script>
    <script src="{{ asset('assets/client/js/vendor/bootstrap.min.js') }}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBhOdIF3Y9382fqJYt5I_sswSrEw5eihAA"></script>
    <script src="{{ asset('assets/client/js/jquery-ui.js') }}"></script>
    <script src="{{ asset('assets/client/js/easing.min.js') }}"></script>
    <script src="{{ asset('assets/client/js/hoverIntent.js') }}"></script>
    <script src="{{ asset('assets/client/js/superfish.min.js') }}"></script>
    <script src="{{ asset('assets/client/js/jquery.ajaxchimp.min.js') }}"></script>
    <script src="{{ asset('assets/client/js/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/client/js/jquery.nice-select.min.js') }}"></script>
    <script src="{{ asset('assets/client/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('assets/client/js/mail-script.js') }}"></script>
    <script src="{{ asset('assets/client/js/main.js') }}"></script>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>
        AOS.init();
    </script>
</body>

</html>
