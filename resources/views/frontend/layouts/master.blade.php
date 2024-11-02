<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>{{__('app.name') }} - @yield('title')</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="" name="keywords">
    <meta content="{{__('app.description')}}" name="description">

    <!-- Favicon -->
    <link href="{{asset('uicc_logo.svg')}}" rel="icon">
    <link href="{{asset('assets/vendor/boxicons/css/boxicons.min.css')}}" rel="stylesheet">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Kantumruy+Pro:wght@400;500;600&family=Saira:wght@500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flag-icon-css/3.1.0/css/flag-icon.min.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{asset('assets/lib/animate/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('assets/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{asset('assets/css/style.css')}}" rel="stylesheet">
    <!--  Swiper  CSS-->
    <link href="{{asset('assets/css/swiper-bundle.min.css')}}" rel="stylesheet">


</head>

<body>
<!-- Spinner Start -->
<div id="spinner"
     class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
    <div class="spinner-grow text-primary" role="status"></div>
</div>
<!-- Spinner End -->


<!-- Navbar Start -->
<div class="container-fluid fixed-top px-0 wow fadeIn" data-wow-delay="0.1s">
    <div class="top-bar text-white-50 row gx-0 align-items-center d-none d-lg-flex">
        <div class="col-lg-6 px-5 text-start">
            <small><i class="fa fa-map-marker-alt me-2"></i>{{__('nav.location')}}</small>
            <small class="ms-4"><i class="fa fa-envelope me-2"></i>{{__('nav.email')}}</small>
        </div>
        <div class="col-lg-6 px-5 text-end">
            <small>{{__('nav.follow')}}</small>
            <a class="text-white-50 ms-3" href=""><i class="fab fa-facebook-f"></i></a>
            <a class="text-white-50 ms-3" href=""><i class="fab fa-twitter"></i></a>
            <a class="text-white-50 ms-3" href=""><i class="fab fa-linkedin-in"></i></a>
            <a class="text-white-50 ms-3" href=""><i class="fab fa-instagram"></i></a>
        </div>
    </div>

    <nav class="navbar navbar-expand-lg navbar-dark py-lg-0 px-lg-5 wow fadeIn " data-wow-delay="0.1s">
        <a href="{{url('/')}}" class="navbar-brand ms-4 ms-lg-0">
            <img class="img-fluid" src="{{asset('uicc_logo.svg')}}" alt="Image"
                 style="width: 200px; height: 100px">
        </a>
        <button type="button" class="navbar-toggler me-4" data-bs-toggle="collapse"
                data-bs-target="#navbarCollapse">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarCollapse">
            <div class="navbar-nav ms-auto p-4 p-lg-0">
                <a href="/" class="nav-item nav-link {{ (request()->is('/')) ? 'active' : '' }}">{{__('nav.home')}}</a>
                <a href="/service" class="nav-item nav-link {{ (request()->is('service*')) ? 'active' : '' }}">{{__('nav.service')}}</a>
                <a href="/industry_partner" class="nav-item nav-link {{ (request()->is('industry_partner')) ? 'active' : '' }}">{{__('nav.partner')}}</a>
                <a href="/career" class="nav-item nav-link {{ (request()->is('career*')) ? 'active' : '' }}">{{__('nav.career')}}</a>
                <a href="/event" class="nav-item nav-link {{ (request()->is('event*')) ? 'active' : '' }}">{{__('nav.event')}}</a>
                <a href="/publication" class="nav-item nav-link {{ (request()->is('publication*')) ? 'active' : '' }}">{{__('nav.publication')}}</a>
                <a href="/about_us" class="nav-item nav-link {{ (request()->is('about_us')) ? 'active' : '' }}">{{__('nav.about')}}</a>
                <a href="/contact_us" class="nav-item nav-link {{ (request()->is('contact_us')) ? 'active' : '' }}">{{__('nav.contact')}}</a>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <span class="flag-icon flag-icon-{{Config::get('languages')[App::getLocale()]['flag-icon']}}"></span> {{ Config::get('languages')[App::getLocale()]['display'] }}
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        @foreach (Config::get('languages') as $lang => $language)
                            @if ($lang != App::getLocale())
                                <a class="dropdown-item" href="{{ route('lang.switch', $lang) }}"><span class="flag-icon flag-icon-{{$language['flag-icon']}}"></span> {{$language['display']}}</a>
                            @endif
                        @endforeach
                    </div>
                </li>

            </div>

        </div>
    </nav>

</div>


<!-- Navbar End -->
{{-- Body Start --}}
@section('content')
@endsection
{{-- Body Start --}}

@yield('content')


<!-- Footer Start -->
<div class="container-fluid page-footer text-white-50 footer mt-5 pt-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container py-5">
        <div class="row g-5">
            <div class="col-lg-4 col-md-6">
                <h5 class="text-dark mb-4">{{__('footer.contact information')}}</h5>
                <p class="text-dark"><i class="fa fa-map-marker-alt me-3"></i>{{__('footer.location')}}</p>
                <p class="text-dark"><i class="fa fa-phone-alt me-3"></i>{{__('footer.phone')}}</p>
                <p class="text-dark"><i class="fa fa-envelope me-3"></i>{{__('footer.email')}}</p>
            </div>

            <div class="col-lg-4 col-md-6">
                <h5 class="text-dark mb-4">{{__('footer.connect with UICC on social media')}}</h5>
                <div class="d-flex">
                    <a class="btn btn-square me-1 text-dark" href=""><i class="fab fa-telegram"></i></a>
                    <a class="btn btn-square me-1 text-dark" href=""><i class="fab fa-facebook-f"></i></a>
                    <a class="btn btn-square me-1 text-dark" href=""><i class="fab fa-youtube"></i></a>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <h5 class="text-dark mb-4">{{__('footer.useful link')}}</h5>
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <a class="btn btn-link text-dark" href="{{Route('home')}}">{{__('footer.home')}}</a>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <a class="btn btn-link text-dark" href="{{Route('service')}}">{{__('footer.service')}}</a>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <a class="btn btn-link text-dark" href="{{Route('industry_partner')}}">{{__('footer.partner')}}</a>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <a class="btn btn-link text-dark" href="{{Route('career')}}">{{__('footer.career')}}</a>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <a class="btn btn-link text-dark" href="{{Route('event')}}">{{__('footer.event')}}</a>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <a class="btn btn-link text-dark" href="{{Route('publication')}}">{{__('footer.publication')}}</a>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <a class="btn btn-link text-dark" href="{{Route('about_us')}}">{{__('footer.about')}}</a>
                    </div>
                    <div class="col-lg-3 col-md-6">
                        <a class="btn btn-link text-dark" href="{{Route('contact_us')}}">{{__('footer.contact')}}</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12 text-center copyright">
            <div class="container text-dark">
                {{__('footer.copyright')}}
            </div>
        </div>
    </div>
</div>
<!-- Footer End -->


<!-- Back to Top -->
<a href="#" class="btn btn-lg btn-dark btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>


<!-- JavaScript Libraries -->
<script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
<script src="{{asset('assets/lib/wow/wow.min.js')}}"></script>
<script src="{{asset('assets/lib/easing/easing.min.js')}}"></script>
<script src="{{asset('assets/lib/waypoints/waypoints.min.js')}}"></script>
<script src="{{asset('assets/lib/owlcarousel/owl.carousel.min.js')}}"></script>
<script src="{{asset('assets/lib/parallax/parallax.min.js')}}"></script>
<script src="{{asset('assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
<!-- Template Javascript -->
<script src="{{asset('assets/js/main.js')}}"></script>

</body>

</html>
