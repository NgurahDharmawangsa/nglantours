@extends('client.layouts.mainlayouts')
@section('title', 'Home')

@section('content')
    <!-- start banner Area -->
    <section class="about-banner relative">
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="about-content col-lg-12">
                    <h1 class="text-white">
                        Destination
                    </h1>
                    <p class="text-white link-nav"><a href="/">Home </a> <span class="lnr lnr-arrow-right"></span> <a
                            href="packages.html"> Destination</a></p>
                </div>
            </div>
        </div>
    </section>
    <!-- End banner Area -->

    <!-- Start hot-deal Area -->
    <section class="hot-deal-area section-gap">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="menu-content pb-70 col-lg-8">
                    <div class="title text-center">
                        <h1 class="mb-10">Popular Destination</h1>
                        <p>We all live in an age that belongs to the young at heart. Life that is becoming extremely fast,
                            day to.</p>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-lg-10 active-hot-deal-carusel">
                    @php $count = 0; @endphp

                    @foreach ($destination as $item)
                        @php
                            $images = json_decode($item->image);
                            $words = explode(' ', $item->description);
                            $limitedWords = array_slice($words, 0, 5); // Mengambil 5 kata pertama
                            $limitedText = implode(' ', $limitedWords);
                        @endphp

                        @if ($count < 3)
                            <div class="single-carusel">
                                <div class="thumb relative">
                                    <div class="overlay overlay-bg"></div>
                                    <img class="img-fluidn" src="{{ asset('storage/destination/' . $images[0]) }}"
                                        alt="" style="width: 944px; height: 400px;">
                                </div>
                                <div class="price-detials">
                                    <a href="#" class="price-btn font-weight-normal">Detail</a>
                                </div>
                                <div class="details">
                                    <h4 class="text-white">{{ $item->name }}</h4>
                                    <p class="text-white">
                                        {{ $limitedText }}
                                    </p>
                                </div>
                            </div>
                            @php $count++; @endphp
                        @endif
                    @endforeach

                </div>
            </div>
        </div>
    </section>
    <!-- End hot-deal Area -->


    <!-- Start destinations Area -->
    <section class="destinations-area section-gap">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="menu-content pb-40 col-lg-8">
                    <div class="title text-center">
                        <h1 class="mb-10">Explore Destinations</h1>
                        <p>We all live in an age that belongs to the young at heart. Life that is becoming extremely fast,
                            day to.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($destination as $item)
                    <div class="col-lg-4">
                        <div class="single-destinations">
                            <div class="thumb">
                                @php
                                    $images = json_decode($item->image);
                                @endphp
                                <img class="rounded" src="{{ asset('storage/destination/' . $images[0]) }}" alt="" style="height: 200px">
                            </div>
                            <div class="details rounded-bottom">
                                <h4>{{ $item->name }}</h4>
                                <p class="d-flex justify-content-between align-items-center">
                                    {{ Str::limit($item->description, 25) }}
                                    <a href="destination-detail/{{$item->name}}" class="price-btn">Detail</a>
                                </p>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- End destinations Area -->


    <!-- Start home-about Area -->
    <section class="home-about-area">
        <div class="container-fluid">
            <div class="row align-items-center justify-content-end">
                <div class="col-lg-6 col-md-12 home-about-left">
                    <h1>
                        Did not find your Package? <br>
                        Feel free to ask us. <br>
                        We‘ll make it for you
                    </h1>
                    <p>
                        inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct
                        standards especially in the workplace. That’s why it’s crucial that, as women, our behavior on the
                        job is beyond reproach. inappropriate behavior is often laughed.
                    </p>
                    <a href="#" class="primary-btn text-uppercase">request custom price</a>
                </div>
                <div class="col-lg-6 col-md-12 home-about-right no-padding">
                    <img class="img-fluid" src="{{ asset('assets/client/img/packages/about-img.jpg') }}" alt="">
                </div>
            </div>
        </div>
    </section>
    <!-- End home-about Area -->
@endsection
