@extends('frontend.layouts.master')
@section('title', __('home.home'))

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
                            </div>
                        </div>
                    @else
                        <div class="carousel-item">
                            <img class="w-100" src="{{asset('storage/'. $banner->image)}}" alt="Image">
                            <div class="carousel-caption">
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

    <!-- ======= Event Section ======= -->
    <section id="services" class="services section-bg">
        <div class="container">
            <div class="section-title">
                <h2 data-aos="fade-in">{{__('home.event')}}</h2>
                <hr>
                <p data-aos="fade-in">{{__('home.body_event')}}</p>
            </div>

            <div class="row">
                @foreach($event as $event)
                    @if(Config::get('languages')[App::getLocale()]['display']==='English')
                        <div class="col-lg-6 col-xl-4 col-md-6 d-flex" data-aos="fade-right">
                            <div class="card">
                                <div class="card-img">
                                    <img src="{{asset('storage/'. $event->image)}}" alt="...">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title"><a href="">{{$event->title_en}}</a></h5>
                                    <a class="card-text">{!! \Illuminate\Support\Str::limit(strip_tags($event->detail_en, '<p>'), 60) !!}</a>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if(Config::get('languages')[App::getLocale()]['display']==='ខ្មែរ')
                            <div class="col-lg-6 col-xl-4 col-md-6 d-flex" data-aos="fade-right">
                                <div class="card">
                                    <div class="card-img">
                                        <img src="{{asset('storage/'. $event->image)}}" alt="...">
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title"><a href="">{{$event->title_kh}}</a></h5>
                                        <a class="card-text">{!! \Illuminate\Support\Str::limit(strip_tags($event->detail_kh, '<p>'), 60) !!}</a>
                                    </div>
                                </div>
                            </div>
                    @endif
                @endforeach
            </div>

        </div>
    </section><!-- End Services Section -->

    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
        <div class="container">
            <div class="section-title">
                <h2 data-aos="fade-in">{{__('home.service')}}</h2>
                <hr>
                <p data-aos="fade-in">{{__('home.body_service')}}</p>
            </div>

            <div class="row">
                @foreach($service as $service)
                    @if(Config::get('languages')[App::getLocale()]['display']==='English')
                        <div class="col-lg-6 col-xl-4 col-md-6 d-flex" data-aos="fade-right">
                            <div class="card">
                                <div class="card-img">
                                    <img src="{{asset('storage/'. $service->image)}}" alt="...">
                                </div>
                                <div class="card-body">
                                    <h5 class="card-title"><a href="">{{$service->name_en}}</a></h5>
                                    <a class="card-text">{!! \Illuminate\Support\Str::limit(strip_tags($service->detail_en, '<p>'), 160) !!}</a>
                                </div>
                            </div>
                        </div>
                    @endif
                    @if(Config::get('languages')[App::getLocale()]['display']==='ខ្មែរ')
                            <div class="col-lg-6 col-xl-4 col-md-6 d-flex" data-aos="fade-right">
                                <div class="card">
                                    <div class="card-img">
                                        <img src="{{asset('storage/'. $service->image)}}" alt="...">
                                    </div>
                                    <div class="card-body">
                                        <h5 class="card-title"><a href="">{{$service->name_kh}}</a></h5>
                                        <a class="card-text">{!! \Illuminate\Support\Str::limit(strip_tags($service->detail_kh, '<p>'), 160) !!}</a>
                                    </div>
                                </div>
                            </div>
                    @endif
                @endforeach
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
                    @foreach ($partners as $partners)
                        @if($partners->count() < 3)
                                <div class="swiper-slide"><a href="{{$partners->link}}"><img src="{{asset('storage/'. $partners->image)}}" class="img-fluid" alt=""></a></div>
                                <div class="swiper-slide"><a href="{{$partners->link}}"><img src="{{asset('storage/'. $partners->image)}}" class="img-fluid" alt=""></a></div>
                                <div class="swiper-slide"><a href="{{$partners->link}}"><img src="{{asset('storage/'. $partners->image)}}" class="img-fluid" alt=""></a></div>
                        @else
                                <div class="swiper-slide"><a href="{{$partners->link}}"><img src="{{asset('storage/'. $partners->image)}}" class="img-fluid" alt=""></a></div>
                        @endif
                    @endforeach
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
                <h3>{!!__('home.home_career')!!}</h3>
                <a class="cta-btn" href="{{route('career')}}">{{__('home.home_btn_career')}}</a>
            </div>
        </div>
    </section><!-- End Cta Section -->

@endsection
