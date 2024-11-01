@extends('frontend.layouts.master')
@section('title', 'Career')

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
    <!-- Jobs Start -->
    <div class="container-xxl py-5">
        <hr>
        <div class="container">
            <h1 class="text-center mb-5 wow fadeInUp" data-wow-delay="0.1s">{{__('career.career')}}</h1>
            <div class="tab-class text-center wow fadeInUp" data-wow-delay="0.3s">
                <ul class="nav nav-pills d-inline-flex justify-content-center border-bottom mb-5">
                    <li class="nav-item">
                        <a class="d-flex align-items-center text-start mx-3 ms-0 pb-3 active" data-bs-toggle="pill"
                            href="#tab-1">
                            <h6 class="mt-n1 mb-0">{{__('career.all_time')}}</h6>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="d-flex align-items-center text-start mx-3 pb-3" 
                        data-bs-toggle="pill" 
                        href="#tab-2">
                            <h6 class="mt-n1 mb-0">{{__('career.full_time')}}</h6>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="d-flex align-items-center text-start mx-3 me-0 pb-3" data-bs-toggle="pill" href="#tab-3">
                            <h6 class="mt-n1 mb-0">{{__('career.part_time')}}</h6>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="d-flex align-items-center text-start mx-3 pb-3" data-bs-toggle="pill" href="#tab-4">
                            <h6 class="mt-n1 mb-0">{{__('career.internship')}}</h6>
                        </a>
                    </li>
                </ul>
                <div class="tab-content">
                    <div id="tab-1" class="tab-pane fade show p-0 active">
                        @foreach ($all_time as $all)
                        <div class="job-item p-4 mb-4">
                            <div class="row g-4">
                                @if(Config::get('languages')[App::getLocale()]['display']==='English')
                                <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                    <img class="flex-shrink-0 img-fluid border rounded" src="{{asset('storage/'. $all->logo)}}"
                                        alt="" style="width: 80px; height: 80px;">
                                    <div class="text-start ps-4">
                                        <h5 class="mb-3">{{$all->title_en}}</h5>
                                        <span class="text-truncate me-3"><i
                                                class="fa fa-map-marker-alt text-primary me-2"></i>{{$all->location_en}}</span>
                                        <span class="text-truncate me-3"><i class="far fa-clock text-primary me-2"></i>{{$all->job_nature}}</span>
                                        {{-- <span class="text-truncate me-0"><i
                                                class="far fa-money-bill-alt text-primary me-2"></i>$123 - $456</span> --}}
                                    </div>
                                </div>
                                @endif
                                @if(Config::get('languages')[App::getLocale()]['display']==='ខ្មែរ')
                                <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                    <img class="flex-shrink-0 img-fluid border rounded" src="{{asset('storage/'. $all->logo)}}"
                                        alt="" style="width: 80px; height: 80px;">
                                    <div class="text-start ps-4">
                                        <h5 class="mb-3">{{$all->title_kh}}</h5>
                                        <span class="text-truncate me-3"><i
                                                class="fa fa-map-marker-alt text-primary me-2"></i>{{$all->location_kh}}</span>
                                        <span class="text-truncate me-3"><i class="far fa-clock text-primary me-2"></i>{{$all->job_nature}}</span>
                                        {{-- <span class="text-truncate me-0"><i
                                                class="far fa-money-bill-alt text-primary me-2"></i>$123 - $456</span> --}}
                                    </div>
                                </div>
                                @endif
                                <div
                                    class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                    <div class="d-flex mb-3">
                                        <a class="btn btn-primary" href="{{route('career-show',$all->id)}}">{{__('career.read_apply')}}</a>
                                    </div>
                                    <small class="text-truncate"><i class="far fa-calendar-alt text-primary me-2"></i>{{__('career.date_line')}}: {{ \Carbon\Carbon::parse($all->date_end)->format('F j, Y') }}

                                    </small>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div id="tab-2" class="tab-pane fade show p-0">
                        @foreach ($full_time as $full)
                        <div class="job-item p-4 mb-4">
                            <div class="row g-4">
                                @if(Config::get('languages')[App::getLocale()]['display']==='English')
                                <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                    <img class="flex-shrink-0 img-fluid border rounded" src="{{asset('storage/'. $full->logo)}}"
                                        alt="" style="width: 80px; height: 80px;">
                                    <div class="text-start ps-4">
                                        <h5 class="mb-3">{{$full->title_en}}</h5>
                                        <span class="text-truncate me-3"><i
                                                class="fa fa-map-marker-alt text-primary me-2"></i>{{$full->location_en}}</span>
                                        <span class="text-truncate me-3"><i class="far fa-clock text-primary me-2"></i>{{$full->job_nature}}</span>
                                        {{-- <span class="text-truncate me-0"><i
                                                class="far fa-money-bill-alt text-primary me-2"></i>$123 - $456</span> --}}
                                    </div>
                                </div>
                                @endif
                                @if(Config::get('languages')[App::getLocale()]['display']==='ខ្មែរ')
                                <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                    <img class="flex-shrink-0 img-fluid border rounded" src="{{asset('storage/'. $full->logo)}}"
                                        alt="" style="width: 80px; height: 80px;">
                                    <div class="text-start ps-4">
                                        <h5 class="mb-3">{{$full->title_kh}}</h5>
                                        <span class="text-truncate me-3"><i
                                                class="fa fa-map-marker-alt text-primary me-2"></i>{{$full->location_kh}}</span>
                                        <span class="text-truncate me-3"><i class="far fa-clock text-primary me-2"></i>{{$full->job_nature}}</span>
                                        {{-- <span class="text-truncate me-0"><i
                                                class="far fa-money-bill-alt text-primary me-2"></i>$123 - $456</span> --}}
                                    </div>
                                </div>
                                @endif
                                <div
                                    class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                    <div class="d-flex mb-3">
                                        <a class="btn btn-primary" href="{{route('career-show',$full->id)}}">{{__('career.read_apply')}}</a>
                                    </div>
                                    <small class="text-truncate"><i class="far fa-calendar-alt text-primary me-2"></i>{{__('career.date_line')}}: {{ \Carbon\Carbon::parse($full->date_end)->format('F j, Y') }}

                                    </small>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div id="tab-3" class="tab-pane fade show p-0">
                        @foreach ($part_time as $part)
                        <div class="job-item p-4 mb-4">
                            <div class="row g-4">
                                @if(Config::get('languages')[App::getLocale()]['display']==='English')
                                <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                    <img class="flex-shrink-0 img-fluid border rounded" src="{{asset('storage/'. $part->logo)}}"
                                        alt="" style="width: 80px; height: 80px;">
                                    <div class="text-start ps-4">
                                        <h5 class="mb-3">{{$part->title_en}}</h5>
                                        <span class="text-truncate me-3"><i
                                                class="fa fa-map-marker-alt text-primary me-2"></i>{{$part->location_en}}</span>
                                        <span class="text-truncate me-3"><i class="far fa-clock text-primary me-2"></i>{{$part->job_nature}}</span>
                                        {{-- <span class="text-truncate me-0"><i
                                                class="far fa-money-bill-alt text-primary me-2"></i>$123 - $456</span> --}}
                                    </div>
                                </div>
                                @endif
                                @if(Config::get('languages')[App::getLocale()]['display']==='ខ្មែរ')
                                <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                    <img class="flex-shrink-0 img-fluid border rounded" src="{{asset('storage/'. $part->logo)}}"
                                        alt="" style="width: 80px; height: 80px;">
                                    <div class="text-start ps-4">
                                        <h5 class="mb-3">{{$part->title_kh}}</h5>
                                        <span class="text-truncate me-3"><i
                                                class="fa fa-map-marker-alt text-primary me-2"></i>{{$part->location_kh}}</span>
                                        <span class="text-truncate me-3"><i class="far fa-clock text-primary me-2"></i>{{$part->job_nature}}</span>
                                        {{-- <span class="text-truncate me-0"><i
                                                class="far fa-money-bill-alt text-primary me-2"></i>$123 - $456</span> --}}
                                    </div>
                                </div>
                                @endif
                                <div
                                    class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                    <div class="d-flex mb-3">
                                        <a class="btn btn-primary" href="{{route('career-show',$part->id)}}">{{__('career.read_apply')}}</a>
                                    </div>
                                    <small class="text-truncate"><i class="far fa-calendar-alt text-primary me-2"></i>{{__('career.date_line')}}: {{ \Carbon\Carbon::parse($part->date_end)->format('F j, Y') }}

                                    </small>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    <div id="tab-4" class="tab-pane fade show p-0">
                        @foreach ($internship as $internship)
                        <div class="job-item p-4 mb-4">
                            <div class="row g-4">
                                @if(Config::get('languages')[App::getLocale()]['display']==='English')
                                <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                    <img class="flex-shrink-0 img-fluid border rounded" src="{{asset('storage/'. $internship->logo)}}"
                                        alt="" style="width: 80px; height: 80px;">
                                    <div class="text-start ps-4">
                                        <h5 class="mb-3">{{$internship->title_en}}</h5>
                                        <span class="text-truncate me-3"><i
                                                class="fa fa-map-marker-alt text-primary me-2"></i>{{$internship->location_en}}</span>
                                        <span class="text-truncate me-3"><i class="far fa-clock text-primary me-2"></i>{{$internship->job_nature}}</span>
                                        {{-- <span class="text-truncate me-0"><i
                                                class="far fa-money-bill-alt text-primary me-2"></i>$123 - $456</span> --}}
                                    </div>
                                </div>
                                @endif
                                @if(Config::get('languages')[App::getLocale()]['display']==='ខ្មែរ')
                                <div class="col-sm-12 col-md-8 d-flex align-items-center">
                                    <img class="flex-shrink-0 img-fluid border rounded" src="{{asset('storage/'. $internship->logo)}}"
                                        alt="" style="width: 80px; height: 80px;">
                                    <div class="text-start ps-4">
                                        <h5 class="mb-3">{{$internship->title_kh}}</h5>
                                        <span class="text-truncate me-3"><i
                                                class="fa fa-map-marker-alt text-primary me-2"></i>{{$internship->location_kh}}</span>
                                        <span class="text-truncate me-3"><i class="far fa-clock text-primary me-2"></i>{{$internship->job_nature}}</span>
                                        {{-- <span class="text-truncate me-0"><i
                                                class="far fa-money-bill-alt text-primary me-2"></i>$123 - $456</span> --}}
                                    </div>
                                </div>
                                @endif
                                <div
                                    class="col-sm-12 col-md-4 d-flex flex-column align-items-start align-items-md-end justify-content-center">
                                    <div class="d-flex mb-3">
                                        <a class="btn btn-primary" href="{{route('career-show',$internship->id)}}">{{__('career.read_apply')}}</a>
                                    </div>
                                    <small class="text-truncate"><i class="far fa-calendar-alt text-primary me-2"></i>{{__('career.date_line')}}: {{ \Carbon\Carbon::parse($internship->date_end)->format('F j, Y') }}

                                    </small>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Jobs End -->




@endsection
