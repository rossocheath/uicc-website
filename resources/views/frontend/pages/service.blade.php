@extends('frontend.layouts.master')
@section('title', __('service.title'))

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
    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
        <div class="container">
            <div class="section-title">
                <h2 data-aos="fade-in">{{__('service.title')}}</h2>
                <hr>
                <p data-aos="fade-in">{{__('service.description')}}</p>
            </div>

            <div class="row">
                @foreach ($services as $service)
                <div class="col-md-4 d-flex" data-aos="fade-right">
                    <div class="card">
                        <div class="card-img">
                            <img src="{{asset('storage/'. $service->image)}}" alt="...">
                        </div>
                        @if(Config::get('languages')[App::getLocale()]['display']==='English')
                        <div class="card-body">
                            <h5 class="card-title"><a href="{{route('service-show',$service->id)}}">{{$service->name_en}}</a></h5>
                            <p class="card-text">
                                {!! \Illuminate\Support\Str::limit(strip_tags($service->detail_en, '<p>'), 160) !!}
                            </p>
                            <div class="read-more"><a href="{{route('service-show',$service->id)}}"><i class="bi bi-arrow-right"></i> {{__('service.read_more')}}</a></div>
                        </div>
                        @endif
                        @if(Config::get('languages')[App::getLocale()]['display']==='ខ្មែរ')
                        <div class="card-body">
                            <h5 class="card-title"><a href="{{route('service-show',$service->id)}}">{{$service->name_kh}}</a></h5>
                            <p class="card-text">
                                {!! \Illuminate\Support\Str::limit(strip_tags($service->detail_kh, '<p>'), 160) !!}
                            </p>
                            <div class="read-more"><a href="{{route('service-show',$service->id)}}"><i class="bi bi-arrow-right"></i> {{__('service.read_more')}}</a></div>
                        </div>
                        @endif
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </section><!-- End Services Section -->
@endsection
