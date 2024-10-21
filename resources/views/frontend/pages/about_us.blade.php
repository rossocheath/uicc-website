@extends('frontend.layouts.master')
@section('title', 'About Us')

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
    <!-- ======= About Us Section ======= -->
    <section class="about-us">
        <div class="container">
            <div class="section-title">
                <h1>About Us</h1>
                <hr>
                <p>The University-Industry Cooperation Center (UICC) at the Royal University of Phnom Penh is dedicated to bridging the gap between academia and industry. We focus on developing competencies in students through various initiatives like internships, entrepreneurship, and research collaborations, preparing them for the dynamic Cambodian labor market..</p>
            </div>

            {{-- <div class="row" data-aos="fade-up">
                <div class="col-md-5">
                    <img src="assets/img/about_us/features-1.svg" class="img-fluid" alt="">
                </div>
                <div class="col-md-7 pt-4">
                    <h3>Voluptatem dignissimos provident quasi corporis voluptates sit assumenda.</h3>
                    <p class="fst-italic">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                        et
                        dolore
                        magna aliqua.
                    </p>
                    <ul>
                        <li><i class="bi bi-check"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
                        <li><i class="bi bi-check"></i> Duis aute irure dolor in reprehenderit in voluptate velit.</li>
                    </ul>
                </div>
            </div> --}}

            <div class="row" data-aos="fade-up">
                <div class="col-md-5 order-1 order-md-2">
                    <img src="assets/img/about_us/features-2.svg" class="img-fluid" alt="">
                </div>
                <div class="col-md-7 pt-5 order-2 order-md-1">
                    <h1>Vision</h1>
                    <p class="fst-italic">
                        The center aims to become the commercial arm of the university in linkage between industry and university.
                    </p>
                    {{-- <p>
                        Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                        voluptate
                        velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident,
                        sunt in
                        culpa qui officia deserunt mollit anim id est laborum
                    </p> --}}
                </div>
            </div>

            <div class="row" data-aos="fade-up">
                <div class="col-md-5">
                    <img src="assets/img/about_us/features-3.svg" class="img-fluid" alt="">
                </div>
                <div class="col-md-7 pt-5">
                    <h1>Mission</h1>
                    <p>Promote and leverage the capacity of the young student entrepreneurship, Link students to the industry in order to reinforce entrepreneurship, core capacity and leadership skills Coordinate events, internship, short-course business training and career consultation Initiate and develop industrial partnership in order to develop entrepreneurship, innovation and technology transfer.</p>
                    {{-- <ul>
                        <li><i class="bi bi-check"></i> Ullamco laboris nisi ut aliquip ex ea commodo consequat.</li>
                        <li><i class="bi bi-check"></i> Duis aute irure dolor in reprehenderit in voluptate velit.</li>
                        <li><i class="bi bi-check"></i> Facilis ut et voluptatem aperiam. Autem soluta ad fugiat.</li>
                    </ul> --}}
                </div>
            </div>


        </div>
    </section><!-- End About Us Section -->





    <!-- Director Message Section -->
    <section class="about-us">
        <div class="container">
            <div class="row" data-aos="fade-up">
                <div class="col-md-5 order-1 order-md-2">
                    <img src="assets/img/about_us/features-4.svg" class="img-fluid" alt="">
                </div>
                <div class="col-md-7 pt-5 order-2 order-md-1"​>
                    <h1>Message's Director</h1>
                    <p class="fst-italic">
                        Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                        et
                        dolore
                        magna aliqua.
                    </p>
                    <p>
                        Ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in
                        voluptate
                        velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident,
                        sunt in
                        culpa qui officia deserunt mollit anim id est laborum
                    </p>
                </div>
            </div>

        </div>
    </section>
    <!-- End Director Message Section -->
    <!-- ======= Team Section ======= -->
    <section id="team" class="team section-bg">
        <div class="container">
            <hr>
            <div class="section-title">
                <h2>Our Team</h2>
                <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint
                    consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat
                    sit in iste officiis commodi quidem hic quas.</p>
            </div>
            <div class="row">
                <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                    <div class="member">
                        <div class="member-img">
                            <img src="assets/img/team/team-1.jpg" class="img-fluid" alt="">
                            <div class="social">
                                <a href=""><i class="bi bi-twitter"></i></a>
                                <a href=""><i class="bi bi-facebook"></i></a>
                                <a href=""><i class="bi bi-instagram"></i></a>
                                <a href=""><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                        <div class="member-info">
                            <h4>Mr. OEM Tav</h4>
                            <span>Media and Graphic Designer</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                    <div class="member">
                        <div class="member-img">
                            <img src="assets/img/team/team-2.jpg" class="img-fluid" alt="">
                            <div class="social">
                                <a href=""><i class="bi bi-twitter"></i></a>
                                <a href=""><i class="bi bi-facebook"></i></a>
                                <a href=""><i class="bi bi-instagram"></i></a>
                                <a href=""><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                        <div class="member-info">
                            <h4>Sarah Jhonson</h4>
                            <span>Product Manager</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                    <div class="member">
                        <div class="member-img">
                            <img src="assets/img/team/team-3.jpg" class="img-fluid" alt="">
                            <div class="social">
                                <a href=""><i class="bi bi-twitter"></i></a>
                                <a href=""><i class="bi bi-facebook"></i></a>
                                <a href=""><i class="bi bi-instagram"></i></a>
                                <a href=""><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                        <div class="member-info">
                            <h4>William Anderson</h4>
                            <span>CTO</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                    <div class="member">
                        <div class="member-img">
                            <img src="assets/img/team/team-4.jpg" class="img-fluid" alt="">
                            <div class="social">
                                <a href=""><i class="bi bi-twitter"></i></a>
                                <a href=""><i class="bi bi-facebook"></i></a>
                                <a href=""><i class="bi bi-instagram"></i></a>
                                <a href=""><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                        <div class="member-info">
                            <h4>Amanda Jepson</h4>
                            <span>Accountant</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                    <div class="member">
                        <div class="member-img">
                            <img src="assets/img/team/team-3.jpg" class="img-fluid" alt="">
                            <div class="social">
                                <a href=""><i class="bi bi-twitter"></i></a>
                                <a href=""><i class="bi bi-facebook"></i></a>
                                <a href=""><i class="bi bi-instagram"></i></a>
                                <a href=""><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                        <div class="member-info">
                            <h4>William Anderson</h4>
                            <span>CTO</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                    <div class="member">
                        <div class="member-img">
                            <img src="assets/img/team/team-4.jpg" class="img-fluid" alt="">
                            <div class="social">
                                <a href=""><i class="bi bi-twitter"></i></a>
                                <a href=""><i class="bi bi-facebook"></i></a>
                                <a href=""><i class="bi bi-instagram"></i></a>
                                <a href=""><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                        <div class="member-info">
                            <h4>Amanda Jepson</h4>
                            <span>Accountant</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                    <div class="member">
                        <div class="member-img">
                            <img src="assets/img/team/team-3.jpg" class="img-fluid" alt="">
                            <div class="social">
                                <a href=""><i class="bi bi-twitter"></i></a>
                                <a href=""><i class="bi bi-facebook"></i></a>
                                <a href=""><i class="bi bi-instagram"></i></a>
                                <a href=""><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                        <div class="member-info">
                            <h4>William Anderson</h4>
                            <span>CTO</span>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 d-flex align-items-stretch">
                    <div class="member">
                        <div class="member-img">
                            <img src="assets/img/team/team-4.jpg" class="img-fluid" alt="">
                            <div class="social">
                                <a href=""><i class="bi bi-twitter"></i></a>
                                <a href=""><i class="bi bi-facebook"></i></a>
                                <a href=""><i class="bi bi-instagram"></i></a>
                                <a href=""><i class="bi bi-linkedin"></i></a>
                            </div>
                        </div>
                        <div class="member-info">
                            <h4>Amanda Jepson</h4>
                            <span>Accountant</span>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section><!-- End Team Section -->







@endsection
