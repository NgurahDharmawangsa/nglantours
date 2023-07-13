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
                    <a href="#sec1" class="primary-btn text-uppercase">Get Started</a>
                </div>
                <div class="col-lg-7 col-md-6 banner-right mt-5">
                    <div class="embed-responsive embed-responsive-16by9">
                        {{-- <embed class="embed-responsive-item rounded" src="https://www.youtube.com/embed/psNFdY9jhZ8?&theme=dark&autohide=2&modestbranding=1&showinfo=0&rel=0&controls=0" frameborder="0"
                            allowfullscreen></embed> --}}
                        <iframe class="embed-responsive-item rounded" width="560" height="315"
                            src="https://www.youtube.com/embed/psNFdY9jhZ8?rel=0&modestbranding=1" frameborder="0"
                            allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End banner Area -->

    <!-- Start blog Area -->
    <section id="sec1" class="recent-blog-area section-gap">
        <div class="container" data-aos="fade-up" data-aos-duration="1000">
            <div class="row d-flex justify-content-center">
                <div class="menu-content pb-60 col-lg-9">
                    <div class="title text-center">
                        <h1 class="mb-10">Destination</h1>
                        <p>With the exception of Nietzsche, no other madman has contributed so much to human sanity as has.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="active-recent-blog-carusel">
                    @php $count = 0; @endphp
                    @foreach ($destination as $item)
                        @if ($count < 6)
                            <div class="single-recent-blog-post item">
                                <div class="thumb">
                                    @php
                                        $images = json_decode($item->image);
                                    @endphp
                                    <img class="img-fluid" src="{{ asset('storage/destination/' . $images[0]) }}"
                                        alt="" style="height: 200px; border-radius: 5px" />
                                </div>
                                <div class="details">
                                    <a href="#">
                                        <h4 class="title">{{ $item->name }}</h4>
                                    </a>
                                    <p>{{ Str::limit($item->description, 50) }}</p>
                                    <div class="btn btn-sm btn-warning">
                                        <a href="destination-detail/{{ $item->name }}" class="text-white">Detail</a>
                                    </div>
                                </div>
                            </div>
                            @php $count++; @endphp
                        @endif
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <!-- End recent-blog Area -->

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
                        <h4>Basic Packages</h4>
                        <ul class="price-list">
                            @foreach ($packages as $item)
                                @if ($item->price < 100000000)
                                    <li class="d-flex justify-content-between align-items-center">
                                        <span>{{ $item->name }}</span>
                                        <a href="#" class="price-btn">IDR {{ number_format($item->price) }}</a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-price">
                        <h4>Intermediate Packages</h4>
                        <ul class="price-list">
                            @foreach ($packages as $item)
                                @if ($item->price > 100000000 && $item->price < 1000000000)
                                    <li class="d-flex justify-content-between align-items-center">
                                        <span>{{ $item->name }}</span>
                                        <a href="#" class="price-btn">IDR {{ number_format($item->price) }}</a>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="single-price">
                        <h4>Premium Packages</h4>
                        <ul class="price-list">
                            @foreach ($packages as $item)
                                @if ($item->price > 10000000000)
                                    <li class="d-flex justify-content-between align-items-center">
                                        <span>{{ $item->name }}</span>
                                        <a href="#" class="price-btn">IDR {{ number_format($item->price) }}</a>
                                    </li>
                                @endif
                            @endforeach
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
                                <img class="img-fluid" src="{{ asset('storage/packages/' . $data->image) }}" alt=""
                                    style="height: 200px" />
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
                    @foreach ($review as $item)
                        <div class="single-testimonial item d-flex flex-row" style="height: 160px;">
                            <div class="thumb">
                                <img class="img-fluid" src="{{ asset('assets/client/img/elements/user2.png') }}"
                                    alt="" />
                            </div>
                            <div class="desc">
                                <p>{{ $item->review }}</p>
                                @foreach ($item->user->booking->unique('user_id') as $data)
                                    <h4>{{ $data->name }}</h4>
                                @endforeach
                                <div class="star">
                                    @for ($i = 1; $i <= 5; $i++)
                                        @if ($item->rating >= $i)
                                            <span class="fa fa-star checked"></span>
                                        @else
                                            <span class="fa fa-star"></span>
                                        @endif
                                    @endfor
                                </div>
                            </div>
                        </div>
                    @endforeach
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
                    @if (Auth::check())
                        <a href="https://api.whatsapp.com/send?phone=6281529928192"
                            class="primary-btn text-uppercase">request custom price</a>
                    @else
                        <a href="/login" class="primary-btn text-uppercase">request custom price</a>
                    @endif
                </div>
                <div class="col-lg-6 col-md-12 home-about-right no-padding">
                    <img class="img-fluid" src="{{ asset('assets/client/img/about-img.jpg') }}" alt="" />
                </div>
            </div>
        </div>
    </section>
    <!-- End home-about Area -->
@endsection
