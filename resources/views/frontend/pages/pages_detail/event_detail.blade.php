@extends('frontend.layouts.master')
@section('title', 'Home')

@section('content')
<!-- Carousel Start -->
<div class="container-fluid p-0 mb-5">
    <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
        <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="{{asset('carousel_uicc.jpg')}}" alt="Image">
                    <div class="carousel-caption">
                    </div>
                </div>
        </div>
    </div>
</div>
<!-- Carousel End -->
    <!-- ======= Blog Single Section ======= -->
    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">

            <div class="row">

                <div class="col-lg-8 entries">

                    <article class="entry entry-single">
                        <div class="entry-img">
                            <img src="{{asset('storage/'. $events->image)}}" alt="" class="img-fluid">
                        </div>
                        @if(Config::get('languages')[App::getLocale()]['display']==='English')
                        <h2 class="entry-title">{{$events->title_en}}</h2>

                        <div class="entry-meta">
                            <ul>
                                <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a
                                        href="{{route('about_us')}}">UICC</a></li>
                                        <li class="d-flex align-items-center"><i class="bi bi-clock"></i> 
                                            <a>Event Date: <time datetime="{{$events->event_date}}">{{$events->event_date}}</time></a></li>
                            </ul>
                        </div>

                        <div class="entry-content">
                            {!! str_replace('<img', '<img style="max-width:100%;height:auto;display:block;margin:0 auto;"', $events->detail_en) !!}
                        </div>
                        @endif
                        @if(Config::get('languages')[App::getLocale()]['display']==='ខ្មែរ')
                        <h2 class="entry-title">{{$events->title_kh}}</h2>

                        <div class="entry-meta">
                            <ul>
                                <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a
                                        href="{{route('about_us')}}">UICC</a></li>
                                        <li class="d-flex align-items-center"><i class="bi bi-clock"></i> 
                                            <a>Event Date: <time datetime="{{$events->event_date}}">{{$events->event_date}}</time></a></li>
                            </ul>
                        </div>

                        <div class="entry-content">
                            {!! str_replace('<img', '<img style="max-width:100%;height:auto;display:block;margin:0 auto;"', $events->detail_kh) !!}
                        </div>
                        @endif
                    </article><!-- End blog entry -->
                </div><!-- End blog entries list -->

                <x-sidebar></x-sidebar>     

            </div>

        </div>
    </section><!-- End Blog Single Section -->




@endsection
