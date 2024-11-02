@extends('frontend.layouts.master')
@section('title', __('service.detail'))

@section('content')

<!-- Page Header Start -->
<div class="container-fluid page-header mb-5 wow fadeIn" data-wow-delay="0.1s">
    <div class="container text-center">
        <h1 class="display-4 text-white animated slideInDown mb-4">{{__('service.detail')}}</h1>
        <nav aria-label="breadcrumb animated slideInDown">
        </nav>
    </div>
</div>
<!-- Page Header End -->

    <!-- Job Detail Start -->
    <div class="container-xxl py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="section-title">
                @if(Config::get('languages')[App::getLocale()]['display']==='English')
                        <h1>{{$services->name_en}}</h1>
                        @endif
                        @if(Config::get('languages')[App::getLocale()]['display']==='ខ្មែរ')
                        <h1>{{$services->name_en}}</h1>
                        @endif
                <hr>
            </div>
            <div class="row">
                <div class="col-lg">
                    @if(Config::get('languages')[App::getLocale()]['display']==='English')
                    <div class="p-6">
                        {!! str_replace('<img', '<img style="max-width:100%;height:auto;display:block;margin:0 auto;"', $services->detail_en) !!}
                    </div>
                    @endif
                    @if(Config::get('languages')[App::getLocale()]['display']==='ខ្មែរ')
                    <div class="p-6">
                        {!! str_replace('<img', '<img style="max-width:100%;height:auto;display:block;margin:0 auto;"', $services->detail_kh) !!}
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- Job Detail End -->

@endsection
