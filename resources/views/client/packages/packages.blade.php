@extends('client.layouts.mainlayouts')
@section('title', 'Home')

@php
    use Carbon\Carbon;
@endphp

@section('content')
    <!-- start banner Area -->
    <section class="about-banner relative">
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="about-content col-lg-12">
                    <h1 class="text-white">
                        Packages
                    </h1>
                    <p class="text-white link-nav"><a href="/">Home </a> <span class="lnr lnr-arrow-right"></span> <a
                            href="/packages-page"> Packages</a></p>
                </div>
            </div>
        </div>
    </section>
    <!-- End banner Area -->

    <!-- Start destinations Area -->
    <section class="destinations-area section-gap">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="menu-content pb-40 col-lg-8">
                    <div class="title text-center">
                        <h1 class="mb-10">Explore Packages</h1>
                        <p>We all live in an age that belongs to the young at heart. Life that is becoming extremely fast,
                            day to.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($packages as $item)
                    @php
                        $startDate = Carbon::parse($item->start_date);
                        $endDate = Carbon::parse($item->end_date);
                        $diffInDays = $startDate->diffInDays($endDate);
                    @endphp
                    <div class="col-lg-4">
                        <div class="single-destinations">
                            <div class="thumb">
                                <img src="{{ asset('storage/packages/' . $item->image) }}" alt=""
                                    style="height: 200px; background-size: cover">
                            </div>
                            <div class="details">
                                <h4 class="d-flex justify-content-between">
                                    <span>{{ $item->name }}</span>
                                    <div class="star">
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star checked"></span>
                                        <span class="fa fa-star"></span>
                                    </div>
                                </h4>
                                <p>
                                    View on map | 49 Reviews
                                </p>
                                <ul class="package-list">
                                    <li class="d-flex justify-content-between align-items-center">
                                        <span>Start Date</span>
                                        <span>{{ $item->start_date }}</span>
                                    </li>
                                    <li class="d-flex justify-content-between align-items-center">
                                        <span>End Date</span>
                                        <span>{{ $item->end_date }}</span>
                                    </li>
                                    <li class="d-flex justify-content-between align-items-center">
                                        <span>Days Total</span>
                                        <span>{{ $diffInDays }} Hari</span>
                                    </li>
                                    <li class="d-flex justify-content-between align-items-center">
                                        <span>Max Capacity</span>
                                        <span>{{ $item->max_capacity }}</span>
                                    </li>
                                    <li class="d-flex justify-content-between align-items-center">
                                        <span>Price per trip</span>
                                        <a href="/packages-detail/{{$item->id}}" class="price-btn">IDR {{ number_format($item->price) }}</a>
                                    </li>
                                </ul>
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
                    <img class="img-fluid" src="https://images.unsplash.com/photo-1574080344876-1f4089ba07fe?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=869&q=80" alt="">
                </div>
            </div>
        </div>
    </section>
    <!-- End home-about Area -->
@endsection
