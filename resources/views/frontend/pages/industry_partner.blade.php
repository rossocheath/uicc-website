@extends('frontend.layouts.master')
@section('title', __('partner.title'))

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
    <!-- ======= Industry Partner Section ======= -->
    <section id="industry-partners" class="section-bg">
        <div class="container" data-aos="fade-up">
            <div class="section-header" style="text-align: center">
                <hr>
                <h1>{{__('partner.title')}}</h1>
                <p>{{__('partner.description')}}
                </p>
            </div>

            <div class="row g-0 industry-partners-wrap clearfix" data-aos="zoom-in" data-aos-delay="100">
                @foreach ($partners as $partner)
                <div class="col-lg-3 col-md-4 col-xs-6 ">
                    <div class="client-logo">
                        <a href="{{$partner->link}}">
                        <img src="{{asset('storage/'. $partner->image)}}" class="img-fluid" alt="">
                        </a>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- ======= End Industry Partner Section ======= -->
@endsection
