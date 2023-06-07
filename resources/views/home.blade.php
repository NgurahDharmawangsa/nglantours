@extends('client.layouts.mainlayouts')
@section('title', 'Home')

@section('content')
    <!-- start banner Area -->
    <section class="banner-area relative">
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row fullscreen align-items-center justify-content-between">
                <div class="col-lg-3 col-md-6 banner-left">
                    <h1 class="text-white">Bali Travel</h1>
                    <p class="text-white">If you are looking at blank cassettes on the web, you may be very confused at the
                        difference in price. You may see some for as low as $.17 each.</p>
                    <a href="#" class="primary-btn text-uppercase">Get Started</a>
                </div>
                <div class="col-lg-7 col-md-6 banner-right mt-5">
                    <div class="embed-responsive embed-responsive-16by9">
                        <iframe class="embed-responsive-item rounded" src="https://www.youtube.com/embed/psNFdY9jhZ8?&theme=dark&autohide=2&modestbranding=1&showinfo=0" frameborder="0"
                            allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End banner Area -->

    <!-- Start popular-destination Area -->
    <section class="popular-destination-area section-gap">
        <div class="container" data-aos="fade-up" data-aos-duration="1000">
            <div class="row d-flex justify-content-center">
                <div class="menu-content pb-70 col-lg-8">
                    <div class="title text-center">
                        <h1 class="mb-10">Popular Destinations</h1>
                        <p>We all live in an age that belongs to the young at heart. Life that is becoming extremely fast,
                            day.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                {{-- {{ $destination }} --}}
                @foreach ($destination as $item)
                    <div class="col-lg-4">
                        <div class="single-destination relative">
                            <div class="thumb relative">
                                <div class="overlay overlay-bg"></div>
                                @php
                                    $images = json_decode($item->image);
                                @endphp
                                <img class="img-fluid rounded" src="{{ asset('storage/destination/' . $images[0]) }}"
                                    alt="" />
                            </div>
                            <div class="desc">
                                <a href="#" class="price-btn">Detail</a>
                                <h4>{{ $item->name }}</h4>
                                <p>{{ Str::limit($item->description, 50) }}</p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- End popular-destination Area -->

    <!-- Start price Area -->
    <section class="price-area section-gap">
        <div class="container" data-aos="fade-up" data-aos-duration="1000">
            <div class="row d-flex justify-content-center">
                <div class="menu-content pb-70 col-lg-8">
                    <div class="title text-center">
                        <h1 class="mb-10">We Provide Affordable Prices</h1>
                        <p>Well educated, intellectual people, especially scientists at all times demonstrate considerably.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-4">
                    <div class="single-price">
                        <h4>Cheap Packages</h4>
                        <ul class="price-list">
                            <li class="d-flex justify-content-between align-items-center">
                                <span>New York</span>
                                <a href="#" class="price-btn">$1500</a>
                            </li>
                            <li class="d-flex justify-content-between align-items-center">
                                <span>Maldives</span>
                                <a href="#" class="price-btn">$1500</a>
                            </li>
                            <li class="d-flex justify-content-between align-items-center">
                                <span>Sri Lanka</span>
                                <a href="#" class="price-btn">$1500</a>
                            </li>
                            <li class="d-flex justify-content-between align-items-center">
                                <span>Nepal</span>
                                <a href="#" class="price-btn">$1500</a>
                            </li>
                            <li class="d-flex justify-content-between align-items-center">
                                <span>Thiland</span>
                                <a href="#" class="price-btn">$1500</a>
                            </li>
                            <li class="d-flex justify-content-between align-items-center">
                                <span>Singapore</span>
                                <a href="#" class="price-btn">$1500</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-price">
                        <h4>Luxury Packages</h4>
                        <ul class="price-list">
                            <li class="d-flex justify-content-between align-items-center">
                                <span>New York</span>
                                <a href="#" class="price-btn">$1500</a>
                            </li>
                            <li class="d-flex justify-content-between align-items-center">
                                <span>Maldives</span>
                                <a href="#" class="price-btn">$1500</a>
                            </li>
                            <li class="d-flex justify-content-between align-items-center">
                                <span>Sri Lanka</span>
                                <a href="#" class="price-btn">$1500</a>
                            </li>
                            <li class="d-flex justify-content-between align-items-center">
                                <span>Nepal</span>
                                <a href="#" class="price-btn">$1500</a>
                            </li>
                            <li class="d-flex justify-content-between align-items-center">
                                <span>Thiland</span>
                                <a href="#" class="price-btn">$1500</a>
                            </li>
                            <li class="d-flex justify-content-between align-items-center">
                                <span>Singapore</span>
                                <a href="#" class="price-btn">$1500</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-price">
                        <h4>Camping Packages</h4>
                        <ul class="price-list">
                            <li class="d-flex justify-content-between align-items-center">
                                <span>New York</span>
                                <a href="#" class="price-btn">$1500</a>
                            </li>
                            <li class="d-flex justify-content-between align-items-center">
                                <span>Maldives</span>
                                <a href="#" class="price-btn">$1500</a>
                            </li>
                            <li class="d-flex justify-content-between align-items-center">
                                <span>Sri Lanka</span>
                                <a href="#" class="price-btn">$1500</a>
                            </li>
                            <li class="d-flex justify-content-between align-items-center">
                                <span>Nepal</span>
                                <a href="#" class="price-btn">$1500</a>
                            </li>
                            <li class="d-flex justify-content-between align-items-center">
                                <span>Thiland</span>
                                <a href="#" class="price-btn">$1500</a>
                            </li>
                            <li class="d-flex justify-content-between align-items-center">
                                <span>Singapore</span>
                                <a href="#" class="price-btn">$1500</a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End price Area -->

    <!-- Start other-issue Area -->
    <section class="other-issue-area section-gap">
        <div class="container" data-aos="fade-up" data-aos-duration="1000">
            <div class="row d-flex justify-content-center">
                <div class="menu-content pb-70 col-lg-9">
                    <div class="title text-center">
                        <h1 class="mb-10">Other issues we can help you with</h1>
                        <p>We all live in an age that belongs to the young at heart. Life that is.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($packages as $data)
                    <div class="col-lg-3 col-md-6">
                        <div class="single-other-issue">
                            <div class="thumb">
                                <img class="img-fluid" src="{{ asset('storage/packages/' . $data->image) }}"
                                    alt="" />
                            </div>
                            <a href="#">
                                <h4>{{ $data->name }}</h4>
                            </a>
                            <p>{{ $data->price }}</p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- End other-issue Area -->

    <!-- Start testimonial Area -->
    <section class="testimonial-area section-gap">
        <div class="container" data-aos="fade-up" data-aos-duration="1000">
            <div class="row d-flex justify-content-center">
                <div class="menu-content pb-70 col-lg-8">
                    <div class="title text-center">
                        <h1 class="mb-10">Testimonial from our Clients</h1>
                        <p>The French Revolution constituted for the conscience of the dominant aristocratic class a fall
                            from</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="active-testimonial">
                    <div class="single-testimonial item d-flex flex-row">
                        <div class="thumb">
                            <img class="img-fluid" src="{{ asset('assets/client/img/elements/user1.png') }}"
                                alt="" />
                        </div>
                        <div class="desc">
                            <p>Do you want to be even more successful? Learn to love learning and growth. The more effort
                                you put into improving your skills, the bigger the payoff you.</p>
                            <h4>Harriet Maxwell</h4>
                            <div class="star">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                            </div>
                        </div>
                    </div>
                    <div class="single-testimonial item d-flex flex-row">
                        <div class="thumb">
                            <img class="img-fluid" src="{{ asset('assets/client/img/elements/user2.png') }}"
                                alt="" />
                        </div>
                        <div class="desc">
                            <p>A purpose is the eternal condition for success. Every former smoker can tell you just how
                                hard it is to stop smoking cigarettes. However.</p>
                            <h4>Carolyn Craig</h4>
                            <div class="star">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                            </div>
                        </div>
                    </div>
                    <div class="single-testimonial item d-flex flex-row">
                        <div class="thumb">
                            <img class="img-fluid" src="{{ asset('assets/client/img/elements/user1.png') }}"
                                alt="" />
                        </div>
                        <div class="desc">
                            <p>Do you want to be even more successful? Learn to love learning and growth. The more effort
                                you put into improving your skills, the bigger the payoff you.</p>
                            <h4>Harriet Maxwell</h4>
                            <div class="star">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                            </div>
                        </div>
                    </div>
                    <div class="single-testimonial item d-flex flex-row">
                        <div class="thumb">
                            <img class="img-fluid" src="{{ asset('assets/client/img/elements/user2.png') }}"
                                alt="" />
                        </div>
                        <div class="desc">
                            <p>A purpose is the eternal condition for success. Every former smoker can tell you just how
                                hard it is to stop smoking cigarettes. However.</p>
                            <h4>Carolyn Craig</h4>
                            <div class="star">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                            </div>
                        </div>
                    </div>
                    <div class="single-testimonial item d-flex flex-row">
                        <div class="thumb">
                            <img class="img-fluid" src="{{ asset('assets/client/img/elements/user1.png') }}"
                                alt="" />
                        </div>
                        <div class="desc">
                            <p>Do you want to be even more successful? Learn to love learning and growth. The more effort
                                you put into improving your skills, the bigger the payoff you.</p>
                            <h4>Harriet Maxwell</h4>
                            <div class="star">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                            </div>
                        </div>
                    </div>
                    <div class="single-testimonial item d-flex flex-row">
                        <div class="thumb">
                            <img class="img-fluid" src="{{ asset('assets/client/img/elements/user2.png') }}"
                                alt="" />
                        </div>
                        <div class="desc">
                            <p>A purpose is the eternal condition for success. Every former smoker can tell you just how
                                hard it is to stop smoking cigarettes. However.</p>
                            <h4>Carolyn Craig</h4>
                            <div class="star">
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star checked"></span>
                                <span class="fa fa-star"></span>
                                <span class="fa fa-star"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End testimonial Area -->

    <!-- Start home-about Area -->
    <section class="home-about-area">
        <div class="container-fluid" data-aos="fade-up" data-aos-duration="1000">
            <div class="row align-items-center justify-content-end">
                <div class="col-lg-6 col-md-12 home-about-left">
                    <h1>
                        Did not find your Package? <br />
                        Feel free to ask us. <br />
                        We‘ll make it for you
                    </h1>
                    <p>
                        inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct
                        standards especially in the workplace. That's why it's crucial that, as women, our behavior
                        on the job is beyond reproach. inappropriate behavior is often laughed.
                    </p>
                    <a href="#" class="primary-btn text-uppercase">request custom price</a>
                </div>
                <div class="col-lg-6 col-md-12 home-about-right no-padding">
                    <img class="img-fluid" src="{{ asset('assets/client/img/about-img.jpg') }}" alt="" />
                </div>
            </div>
        </div>
    </section>
    <!-- End home-about Area -->

    <!-- Start blog Area -->
    <section class="recent-blog-area section-gap">
        <div class="container" data-aos="fade-up" data-aos-duration="1000">
            <div class="row d-flex justify-content-center">
                <div class="menu-content pb-60 col-lg-9">
                    <div class="title text-center">
                        <h1 class="mb-10">Latest from Our Blog</h1>
                        <p>With the exception of Nietzsche, no other madman has contributed so much to human sanity as has.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="active-recent-blog-carusel">
                    <div class="single-recent-blog-post item">
                        <div class="thumb">
                            <img class="img-fluid" src="{{ asset('assets/client/img/b1.jpg') }}" alt="" />
                        </div>
                        <div class="details">
                            <div class="tags">
                                <ul>
                                    <li>
                                        <a href="#">Travel</a>
                                    </li>
                                    <li>
                                        <a href="#">Life Style</a>
                                    </li>
                                </ul>
                            </div>
                            <a href="#">
                                <h4 class="title">Low Cost Advertising</h4>
                            </a>
                            <p>Acres of Diamonds… you've read the famous story, or at least had it related to you. A farmer.
                            </p>
                            <h6 class="date">31st January,2018</h6>
                        </div>
                    </div>
                    <div class="single-recent-blog-post item">
                        <div class="thumb">
                            <img class="img-fluid" src="{{ asset('assets/client/img/b2.jpg') }}" alt="" />
                        </div>
                        <div class="details">
                            <div class="tags">
                                <ul>
                                    <li>
                                        <a href="#">Travel</a>
                                    </li>
                                    <li>
                                        <a href="#">Life Style</a>
                                    </li>
                                </ul>
                            </div>
                            <a href="#">
                                <h4 class="title">Creative Outdoor Ads</h4>
                            </a>
                            <p>Acres of Diamonds… you've read the famous story, or at least had it related to you. A farmer.
                            </p>
                            <h6 class="date">31st January,2018</h6>
                        </div>
                    </div>
                    <div class="single-recent-blog-post item">
                        <div class="thumb">
                            <img class="img-fluid" src="{{ asset('assets/client/img/b3.jpg') }}" alt="" />
                        </div>
                        <div class="details">
                            <div class="tags">
                                <ul>
                                    <li>
                                        <a href="#">Travel</a>
                                    </li>
                                    <li>
                                        <a href="#">Life Style</a>
                                    </li>
                                </ul>
                            </div>
                            <a href="#">
                                <h4 class="title">It's Classified How To Utilize Free</h4>
                            </a>
                            <p>Acres of Diamonds… you've read the famous story, or at least had it related to you. A farmer.
                            </p>
                            <h6 class="date">31st January,2018</h6>
                        </div>
                    </div>
                    <div class="single-recent-blog-post item">
                        <div class="thumb">
                            <img class="img-fluid" src="{{ asset('assets/client/img/b1.jpg') }}" alt="" />
                        </div>
                        <div class="details">
                            <div class="tags">
                                <ul>
                                    <li>
                                        <a href="#">Travel</a>
                                    </li>
                                    <li>
                                        <a href="#">Life Style</a>
                                    </li>
                                </ul>
                            </div>
                            <a href="#">
                                <h4 class="title">Low Cost Advertising</h4>
                            </a>
                            <p>Acres of Diamonds… you've read the famous story, or at least had it related to you. A farmer.
                            </p>
                            <h6 class="date">31st January,2018</h6>
                        </div>
                    </div>
                    <div class="single-recent-blog-post item">
                        <div class="thumb">
                            <img class="img-fluid" src="{{ asset('assets/client/img/b2.jpg') }}" alt="" />
                        </div>
                        <div class="details">
                            <div class="tags">
                                <ul>
                                    <li>
                                        <a href="#">Travel</a>
                                    </li>
                                    <li>
                                        <a href="#">Life Style</a>
                                    </li>
                                </ul>
                            </div>
                            <a href="#">
                                <h4 class="title">Creative Outdoor Ads</h4>
                            </a>
                            <p>Acres of Diamonds… you've read the famous story, or at least had it related to you. A farmer.
                            </p>
                            <h6 class="date">31st January,2018</h6>
                        </div>
                    </div>
                    <div class="single-recent-blog-post item">
                        <div class="thumb">
                            <img class="img-fluid" src="{{ asset('assets/client/img/b3.jpg') }}" alt="" />
                        </div>
                        <div class="details">
                            <div class="tags">
                                <ul>
                                    <li>
                                        <a href="#">Travel</a>
                                    </li>
                                    <li>
                                        <a href="#">Life Style</a>
                                    </li>
                                </ul>
                            </div>
                            <a href="#">
                                <h4 class="title">It's Classified How To Utilize Free</h4>
                            </a>
                            <p>Acres of Diamonds… you've read the famous story, or at least had it related to you. A farmer.
                            </p>
                            <h6 class="date">31st January,2018</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End recent-blog Area -->
@endsection
