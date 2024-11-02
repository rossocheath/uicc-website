@extends('frontend.layouts.master')
@section('title', __('publication.title'))

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
    <!-- ======= Blog Section ======= -->
    <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h2 data-aos="fade-in">{{__('publication.title')}}</h2>
                <hr>
                <p data-aos="fade-in">{{__('publication.description')}}</p>
            </div>
            <div class="row">
                <div class="col-lg-8 entries">
                    @foreach ($blogs as $blog)
                    @if(Config::get('languages')[App::getLocale()]['display']==='English')
                    <article class="entry">

                        <div class="entry-img">
                            <img src="{{asset('storage/'. $blog->image)}}" alt="" class="img-fluid">
                        </div>

                        <h2 class="entry-title">
                            <a href="{{route('publication-show',$blog->id)}}">{{$blog->title_en}}</a>
                        </h2>

                        <div class="entry-meta">
                            {{-- <ul>
                                <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a
                                        href="blog-single.html">John Doe</a></li>
                                <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a
                                        href="blog-single.html"><time datetime="2020-01-01">Jan 1, 2020</time></a></li>
                            </ul> --}}
                        </div>

                        <div class="entry-content">
                            <p>
                                {!! \Illuminate\Support\Str::limit(strip_tags($blog->description_en, '<p>'), 200) !!}
                            </p>
                            <div class="read-more">
                                <a href="{{route('publication-show',$blog->id)}}">{{__('publication.read_more')}}</a>
                            </div>
                        </div>

                    </article><!-- End blog entry -->
                    @endif
                    @if(Config::get('languages')[App::getLocale()]['display']==='ខ្មែរ')
                    <article class="entry">

                        <div class="entry-img">
                            <img src="{{asset('storage/'. $blog->image)}}" alt="" class="img-fluid">
                        </div>

                        <h2 class="entry-title">
                            <a href="{{route('publication-show',$blog->id)}}">{{$blog->title_kh}}</a>
                        </h2>

                        <div class="entry-meta">
                            {{-- <ul>
                                <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a
                                        href="blog-single.html">John Doe</a></li>
                                <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a
                                        href="blog-single.html"><time datetime="2020-01-01">Jan 1, 2020</time></a></li>
                            </ul> --}}
                        </div>

                        <div class="entry-content">
                            <p>
                                {!! \Illuminate\Support\Str::limit(strip_tags($blog->description_kh, '<p>'), 200) !!}
                            </p>
                            <div class="read-more">
                                <a href="{{route('publication-show',$blog->id)}}">{{__('publication.read_more')}}</a>
                            </div>
                        </div>

                    </article><!-- End blog entry -->
                    @endif
                    @endforeach
                    @empty($blogs)
                    <article>
                        <h1>
                            <a style="display: block; text-align: center;">{{__('publication.Empty_Publication')}}</a>
                        </h1>                        
                    </article><!-- End blog entry -->
                    @endempty

                    {{-- <div class="blog-pagination">
                        <ul class="justify-content-center">
                            <li><a href="#">1</a></li>
                            <li class="active"><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                        </ul>
                    </div> --}}
                    {{ $blogs->links('vendor.pagination.custom') }}

                </div><!-- End blog entries list -->

                <x-sidebar></x-sidebar> 

            </div>

        </div>
    </section><!-- End Blog Section -->



@endsection
