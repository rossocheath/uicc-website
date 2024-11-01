@extends('frontend.layouts.master')
@section('title', 'Event')

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

<!-- Carousel End -->
    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h2 data-aos="fade-in">{{__('event.title')}}</h2>
                <hr>
                <p data-aos="fade-in">{{__('event.description')}}</p>
            </div>
            <div class="row">
                <div class="col-lg-8 entries">
                    @foreach ($events as $event)
                    @if(Config::get('languages')[App::getLocale()]['display']==='English')
                    <article class="entry">

                        <div class="entry-img">
                            <img src="{{asset('storage/'. $event->image)}}" alt="" class="img-fluid">
                        </div>

                        <h2 class="entry-title">
                            <a href="{{route('event-show',$event->id)}}">{{$event->title_en}}</a>
                        </h2>

                        <div class="entry-meta">
                            <ul>
                                <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a
                                        href="{{route('about_us')}}">UICC</a></li>
                                <li class="d-flex align-items-center"><i class="bi bi-clock"></i> 
                                    <a>Event Date: <time datetime="{{$event->event_date}}">{{$event->event_date}}</time></a></li>
                            </ul>
                        </div>

                        <div class="entry-content">
                            <p>
                                {!! \Illuminate\Support\Str::limit(strip_tags($event->detail_en, '<p>'), 200) !!}
                            </p>
                            <div class="read-more">
                                <a href="{{route('event-show',$event->id)}}">{{__('event.read_more')}}</a>
                            </div>
                        </div>

                    </article><!-- End blog entry -->
                    @endif
                    @if(Config::get('languages')[App::getLocale()]['display']==='ខ្មែរ')
                    <article class="entry">

                        <div class="entry-img">
                            <img src="{{asset('storage/'. $event->image)}}" alt="" class="img-fluid">
                        </div>

                        <h2 class="entry-title">
                            <a href="{{route('event-show',$event->id)}}">{{$event->title_kh}}</a>
                        </h2>

                        <div class="entry-meta">
                            <ul>
                                <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a
                                        href="{{route('about_us')}}">UICC</a></li>
                                <li class="d-flex align-items-center"><i class="bi bi-clock"></i> 
                                    <a>Event Date: <time datetime="{{$event->event_date}}">{{$event->event_date}}</time></a></li>
                            </ul>
                        </div>

                        <div class="entry-content">
                            <p>
                                {!! \Illuminate\Support\Str::limit(strip_tags($event->detail_kh, '<p>'), 200) !!}
                            </p>
                            <div class="read-more">
                                <a href="{{route('event-show',$event->id)}}">{{__('event.read_more')}}</a>
                            </div>
                        </div>

                    </article><!-- End blog entry -->
                    @endif
                    @endforeach
                    @empty($event)
                    <article>
                        <h1>
                            <a style="display: block; text-align: center;">{{__('event.Empty_Event')}}</a>
                        </h1>                        
                    </article><!-- End blog entry -->
                    @endempty

                    {{ $events->links('vendor.pagination.custom') }}

                </div><!-- End blog entries list -->

                <x-sidebar></x-sidebar> 

            </div>
        </div>
    </section><!-- End Blog Section -->

@endsection
