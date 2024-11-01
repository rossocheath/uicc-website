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
    <!-- Job Detail Start -->
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="section-title">
                <h1>{{__('career.job_description')}}</h1>
                <hr>
            </div>
            <div class="row gy-5 gx-4">
                <div class="col-lg-8">
                    <div class="d-flex align-items-center mb-5">
                        <img class="flex-shrink-0 img-fluid border rounded" src="{{asset('storage/'. $career->logo)}}" alt=""
                            style="width: 80px; height: 80px;">
                        @if(Config::get('languages')[App::getLocale()]['display']==='English')
                        <div class="text-start ps-4">
                            <h3 class="mb-3">{{$career->title_en}}</h3>
                            <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-primary me-2"></i>{{$career->location_en}}</span>
                            <span class="text-truncate me-3"><i class="far fa-clock text-primary me-2"></i>{{$career->job_nature}}</span>
                            {{-- <span class="text-truncate me-0"><i class="far fa-money-bill-alt text-primary me-2"></i>$123 -
                                $456</span> --}}
                        </div>
                        @endif
                        @if(Config::get('languages')[App::getLocale()]['display']==='ខ្មែរ')
                        <div class="text-start ps-4">
                            <h3 class="mb-3">{{$career->title_kh}}</h3>
                            <span class="text-truncate me-3"><i class="fa fa-map-marker-alt text-primary me-2"></i>{{$career->location_kh}}</span>
                            <span class="text-truncate me-3"><i class="far fa-clock text-primary me-2"></i>{{$career->job_nature}}</span>
                            {{-- <span class="text-truncate me-0"><i class="far fa-money-bill-alt text-primary me-2"></i>$123 -
                                $456</span> --}}
                        </div>
                        @endif
                    </div>
                    @if(Config::get('languages')[App::getLocale()]['display']==='English')
                    <div class="mb-5">
                        {!! str_replace('<img', '<img style="max-width:100%;height:auto;display:block;margin:0 auto;"', $career->description_en) !!}
                    </div>
                    @endif
                    @if(Config::get('languages')[App::getLocale()]['display']==='ខ្មែរ')
                    <div class="mb-5">
                        {!! str_replace('<img', '<img style="max-width:100%;height:auto;display:block;margin:0 auto;"', $career->description_kh) !!}
                    </div>
                    @endif
                    <div class="">
                        <h4 class="mb-4">{{__('career.apply_for_the_job')}}</h4>
                        @if(session('success'))
                        <div class="alert alert-success" role="alert">
                            {{session('success')}}
                        </div>
                        @endif
                        <form action="{{route('apply.submit', $career->id)}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <input type="hidden" name="career_id" value="{{ $career->id }}">
                            <div class="row g-3">
                                <div class="col-12 col-sm-6">
                                    <input type="text" class="form-control" name="name" value="{{ old('name') }}" required placeholder="{{__('career.name')}}">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="email" class="form-control" name="email" value="{{ old('email') }}" required placeholder="{{__('career.email')}}">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="text" class="form-control" name="phone" value="{{ old('phone') }}" required placeholder="{{__('career.phone')}}">
                                </div>
                                <div class="col-12 col-sm-6">
                                    <input type="file" name="file" required class="form-control bg-white" >
                                </div>
                                <div class="col-12">
                                    <textarea class="form-control" rows="5" name="cover_letter" required value="{{ old('cover_letter') }}" placeholder="{{__('career.coverletter')}}"></textarea>
                                </div>
                                <div class="col-12">
                                    <button class="btn btn-primary w-100" type="submit">{{__('career.apply_now')}}</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-lg-4">
                    <div class="bg-light rounded p-5 mb-4 wow slideInUp" data-wow-delay="0.1s">
                        <h4 class="mb-4">{{__('career.job_summery')}}</h4>
                        <p><i class="fa fa-angle-right text-primary me-2"></i>{{__('career.published_on')}}: {{$career->date_start}}</p>
                        <p><i class="fa fa-angle-right text-primary me-2"></i>{{__('career.job_nature')}}: {{$career->job_nature}}</p>
                        @if(Config::get('languages')[App::getLocale()]['display']==='English')
                        <p><i class="fa fa-angle-right text-primary me-2"></i>{{__('career.location')}}: {{$career->location_en}}</p>
                        @endif
                        @if(Config::get('languages')[App::getLocale()]['display']==='ខ្មែរ')
                        <p><i class="fa fa-angle-right text-primary me-2"></i>{{__('career.location')}}: {{$career->location_kh}}</p>
                        @endif
                        <p class="m-0"><i class="fa fa-angle-right text-primary me-2"></i>{{__('career.date_line')}}: {{$career->date_end}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Job Detail End -->

@endsection
