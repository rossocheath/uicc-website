@extends('frontend.layouts.master')
@section('title', 'Home')

@section('content')
    <!-- Carousel Start -->
    <div class="container-fluid p-0 mb-5">
        <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @if(count($banner)<1)
                    <div class="carousel-item active">
                        <img class="w-100" src="carousel_uicc.jpg" alt="Image">
                        <div class="carousel-caption">

                        </div>
                    </div>
                @endif
                @foreach($banner as $banner)
                    @if ($loop->index == 0)
                        <div class="carousel-item active">
                            <img class="w-100" src="{{asset('storage/'. $banner->image)}}" alt="Image">
                            <div class="carousel-caption">
                                <div class="container">
                                    @if(Config::get('languages')[App::getLocale()]['display']==='English')
                                        <div class="row justify-content-center">
                                            <div class="col-lg-7 pt-5">
                                                <h1 class="display-4 text-white mb-3 animated slideInDown">{{$banner->title_en}}</h1>
                                                <p class="fs-5 text-white-50 mb-5 animated slideInDown">{{strip_tags($banner->detail_en)}}</p>
                                                
                                            </div>
                                        </div>
                                    @endif
                                    @if(Config::get('languages')[App::getLocale()]['display']==='ខ្មែរ')
                                        <div class="row justify-content-center">
                                            <div class="col-lg-7 pt-5">
                                                <h1 class="display-4 text-white mb-3 animated slideInDown">{{$banner->title_kh}}</h1>
                                                <p class="fs-5 text-white-50 mb-5 animated slideInDown">{{strip_tags($banner->detail_kh)}}</p>
                                                
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @else
                        <div class="carousel-item">
                            <img class="w-100" src="{{asset('storage/'. $banner->image)}}" alt="Image">
                            <div class="carousel-caption">
                                <div class="container">
                                    @if(Config::get('languages')[App::getLocale()]['display']==='English')
                                        <div class="row justify-content-center">
                                            <div class="col-lg-7 pt-5">
                                                <h1 class="display-4 text-white mb-3 animated slideInDown">{{$banner->title_en}}</h1>
                                                <p class="fs-5 text-white-50 mb-5 animated slideInDown">{{strip_tags($banner->detail_en)}}</p>
                                                <a class="btn btn-red py-2 px-3 animated slideInDown" href="">
                                                    Learn More
                                                    <div
                                                        class="d-inline-flex btn-sm-square bg-white text-primary rounded-circle ms-2">
                                                        <i class="fa fa-arrow-right"></i>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    @endif
                                    @if(Config::get('languages')[App::getLocale()]['display']==='ខ្មែរ')
                                        <div class="row justify-content-center">
                                            <div class="col-lg-7 pt-5">
                                                <h1 class="display-4 text-white mb-3 animated slideInDown">{{$banner->title_kh}}</h1>
                                                <p class="fs-5 text-white-50 mb-5 animated slideInDown">{{strip_tags($banner->detail_kh)}}</p>
                                                <a class="btn btn-red py-2 px-3 animated slideInDown" href="">
                                                    Learn More
                                                    <div
                                                        class="d-inline-flex btn-sm-square bg-white text-primary rounded-circle ms-2">
                                                        <i class="fa fa-arrow-right"></i>
                                                    </div>
                                                </a>
                                            </div>
                                        </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @endif
                @endforeach
            </div>
            @if(count($banner_carousel_count) >1)
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel"
                    data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel"
                    data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
            @endif
        </div>
    </div>
    <!-- Carousel End -->
    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
        <div class="container">
            <div class="section-title">
                <h2 data-aos="fade-in">{{__('home.service')}}</h2>
                <hr>
                <p data-aos="fade-in">{{__('home.body')}}</p>
            </div>

            <div class="row">
                @if(Config::get('languages')[App::getLocale()]['display']==='English')
                    @foreach($service_en as $service_en)
                        <div class="col-lg-6 col-xl-4 col-md-6 d-flex" data-aos="fade-right">
                            <div class="card">
                                <div class="card-img">
                                    <img src="{{asset('storage/'. $service_en->image)}}" alt="...">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title"><a href="">{{$service_en->name_en}}</a></h5>
                                    <a class="card-text">{{strip_tags($service_en->detail_en)}}</a>
                                    <div class="read-more"><a href="#"><i class="bi bi-arrow-right"></i> Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
                @if(Config::get('languages')[App::getLocale()]['display']==='ខ្មែរ')
                    @foreach($service_kh as $service_kh)
                        <div class="col-lg-6 col-xl-4 col-md-6 d-flex" data-aos="fade-right">
                            <div class="card">
                                <div class="card-img">
                                    <img src="{{asset('storage/'. $service_kh->image)}}" alt="...">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title"><a href="">{{$service_kh->name_kh}}</a></h5>
                                    <a class="card-text">{{strip_tags($service_kh->detail_kh)}}</a>
                                    <div class="read-more"><a href="#"><i class="bi bi-arrow-right"></i> Read More</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endif
            </div>

        </div>
    </section><!-- End Services Section -->

    <!-- ======= Clients Section ======= -->
    <section id="clients" class="clients section-bg">

        <div class="container" data-aos="fade-up">

            <div class="section-title">
                <hr>
                <h2>{{__('home.partner')}}</h2>
            </div>

            <div class="clients-slider swiper" data-aos="fade-up" data-aos-delay="100">
                <div class="swiper-wrapper align-items-center">
                    <div class="swiper-slide"><img src="assets/img/client-1.png" class="img-fluid" alt="">
                    </div>
                    <div class="swiper-slide"><img src="assets/img/client-2.png" class="img-fluid" alt="">
                    </div>
                    <div class="swiper-slide"><img src="assets/img/client-3.png" class="img-fluid"
                                                   alt=""></div>
                    <div class="swiper-slide"><img src="assets/img/client-4.png" class="img-fluid"
                                                   alt=""></div>
                    <div class="swiper-slide"><img src="assets/img/client-5.png" class="img-fluid"
                                                   alt=""></div>
                    <div class="swiper-slide"><img src="assets/img/client-6.png" class="img-fluid"
                                                   alt=""></div>
                    <div class="swiper-slide"><img src="assets/img/client-7.png" class="img-fluid"
                                                   alt=""></div>
                    <div class="swiper-slide"><img src="assets/img/client-8.png" class="img-fluid"
                                                   alt=""></div>
                </div>
                <div class="swiper-pagination"></div>
            </div>

        </div>
    </section><!-- End Clients Section -->
    <!-- ======= Cta Section ======= -->
    <section id="cta" class="cta">
        <div class="container" data-aos="fade-in">
            <hr>
            <div class="text-center">
                <h3>Grow With Us <br>In Your Career Journey</h3>
                <a class="cta-btn" href="#">Brow for Job</a>
            </div>

        </div>
    </section><!-- End Cta Section -->

@endsection
