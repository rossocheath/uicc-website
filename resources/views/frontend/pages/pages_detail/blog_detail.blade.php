@extends('frontend.layouts.master')
@section('title', __('publication.detail'))

@section('content')
<!-- Page Header Start -->
<div class="container-fluid page-header mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center">
        <h1 class="display-4 text-white animated slideInDown mb-4">{{__('publication.detail')}}</h1>
        <nav aria-label="breadcrumb animated slideInDown">
        </nav>
    </div>  
</div>
<!-- Page Header End -->
    <!-- ======= Blog Single Section ======= -->
    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">

            <div class="row">

                <div class="col-lg-8 entries">

                    <article class="entry entry-single">
                        <div class="entry-img">
                            <img src="{{asset('storage/'. $blogs->image)}}" alt="" class="img-fluid">
                        </div>
                        @if(Config::get('languages')[App::getLocale()]['display']==='English')
                        <h2 class="entry-title">{{$blogs->title_en}}</h2>

                        <div class="entry-meta">
                            <ul>
                                <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a
                                        href="{{route('about_us')}}">UICC</a></li>
                                <li class="d-flex align-items-center"><i class="bi bi-clock"></i>
                                    {{$blogs->created_at->format('F j, Y')}} - {{ $blogs->created_at->diffForHumans() }}</li>
                            </ul>
                        </div>

                        <div class="entry-content">
                            {!! str_replace('<img', '<img style="max-width:100%;height:auto;display:block;margin:0 auto;"', $blogs->description_en) !!}
                        </div>
                        @endif
                        @if(Config::get('languages')[App::getLocale()]['display']==='ខ្មែរ')
                        <h2 class="entry-title">{{$blogs->title_kh}}</h2>

                        <div class="entry-meta">
                            <ul>
                                <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a
                                        href="{{route('about_us')}}">UICC</a></li>
                                <li class="d-flex align-items-center"><i class="bi bi-clock"></i>
                                    {{$blogs->created_at->format('F j, Y')}} - {{ $blogs->created_at->diffForHumans() }}</li>
                            </ul>
                        </div>

                        <div class="entry-content">
                            {!! str_replace('<img', '<img style="max-width:100%;height:auto;display:block;margin:0 auto;"', $blogs->description_kh) !!}
                        </div>
                        @endif
                    </article><!-- End blog entry -->
                </div><!-- End blog entries list -->

                <x-sidebar></x-sidebar>     

            </div>

        </div>
    </section><!-- End Blog Single Section -->




@endsection
