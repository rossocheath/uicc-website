@extends('frontend.layouts.master')
@section('title', 'Service')

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
    <!-- ======= Services Section ======= -->
    <section id="services" class="services section-bg">
        <div class="container">
            <div class="section-title">
                <h2 data-aos="fade-in">Services</h2>
                <hr>
                <p data-aos="fade-in">Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum
                    quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit
                    alias
                    ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
            </div>

            <div class="row">
                <div class="col-md-4 d-flex" data-aos="fade-right">
                    <div class="card">
                        <div class="card-img">
                            <img src="assets/img/services-1.jpg" alt="...">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><a href="">Web Development</a></h5>
                            <p class="card-text">Lorem ipsum dolor sit amet, consectetur elit, sed do eiusmod tempor ut
                                labore et
                                dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi
                                ut
                                aliquip ex ea commodo consequat</p>
                            <div class="read-more"><a href="#"><i class="bi bi-arrow-right"></i> Read More</a></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 d-flex" data-aos="fade-left">
                    <div class="card">
                        <div class="card-img">
                            <img src="assets/img/services-2.jpg" alt="...">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><a href="">Mobile Applicatioin Development</a></h5>
                            <p class="card-text">Sed ut perspiciatis unde omnis iste natus error sit voluptatem doloremque
                                laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi
                                architecto beatae
                                vitae dicta sunt explicabo</p>
                            <div class="read-more"><a href="#"><i class="bi bi-arrow-right"></i> Read More</a></div>
                        </div>
                    </div>

                </div>
                <div class="col-md-4 d-flex" data-aos="fade-right">
                    <div class="card">
                        <div class="card-img">
                            <img src="assets/img/services-3.jpg" alt="...">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><a href="">Network Infrastruture</a></h5>
                            <p class="card-text">Nemo enim ipsam voluptatem quia voluptas sit aut odit aut fugit, sed quia
                                magni
                                dolores eos qui ratione voluptatem sequi nesciunt Neque porro quisquam est, qui dolorem
                                ipsum quia
                                dolor sit amet</p>
                            <div class="read-more"><a href="#"><i class="bi bi-arrow-right"></i> Read More</a></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 d-flex" data-aos="fade-left">
                    <div class="card">
                        <div class="card-img">
                            <img src="assets/img/services-4.jpg" alt="...">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><a href="">Database Administrator</a></h5>
                            <p class="card-text">Nostrum eum sed et autem dolorum perspiciatis. Magni porro quisquam
                                laudantium
                                voluptatem. In molestiae earum ab sit esse voluptatem. Eos ipsam cumque ipsum officiis qui
                                nihil aut
                                incidunt aut</p>
                            <div class="read-more"><a href="#"><i class="bi bi-arrow-right"></i> Read More</a></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 d-flex" data-aos="fade-left">
                    <div class="card">
                        <div class="card-img">
                            <img src="assets/img/services-4.jpg" alt="...">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><a href="">Event Planner</a></h5>
                            <p class="card-text">Nostrum eum sed et autem dolorum perspiciatis. Magni porro quisquam
                                laudantium
                                voluptatem. In molestiae earum ab sit esse voluptatem. Eos ipsam cumque ipsum officiis qui
                                nihil aut
                                incidunt aut</p>
                            <div class="read-more"><a href="#"><i class="bi bi-arrow-right"></i> Read More</a></div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 d-flex" data-aos="fade-left">
                    <div class="card">
                        <div class="card-img">
                            <img src="assets/img/services-4.jpg" alt="...">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title"><a href="">Career Advisor</a></h5>
                            <p class="card-text">Nostrum eum sed et autem dolorum perspiciatis. Magni porro quisquam
                                laudantium
                                voluptatem. In molestiae earum ab sit esse voluptatem. Eos ipsam cumque ipsum officiis qui
                                nihil aut
                                incidunt aut</p>
                            <div class="read-more"><a href="#"><i class="bi bi-arrow-right"></i> Read More</a></div>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </section><!-- End Services Section -->




@endsection
