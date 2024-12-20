@extends('client.layouts.mainlayouts')
@section('title', 'Home')

@php
    use Carbon\Carbon;
@endphp


@section('content')
    <!-- start banner Area -->
    <section class="relative about-banner">
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="about-content col-lg-12">
                    <h1 class="text-white">
                        {{ $packages->name }}
                    </h1>
                    <p class="text-white link-nav"><a href="index.html">Home </a> <span class="lnr lnr-arrow-right"></span><a
                            href="blog-home.html">Packages </a> <span class="lnr lnr-arrow-right"></span> <a
                            href="blog-single.html"> Packages Detail</a></p>
                </div>
            </div>
        </div>
    </section>
    <!-- End banner Area -->

    <!-- Start post-content Area -->
    <section class="post-content-area single-post-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-8 posts-list">
                    <div class="single-post row">
                        <div class="col-lg-12">
                            <div class="feature-img">
                                <img class="img-fluid" src="{{ asset('storage/packages/' . $packages->image) }}"
                                    alt="">
                            </div>
                        </div>
                        <div class="col-lg-3  col-md-3 meta-details">
                            <ul class="tags">
                                <li><a href="#">Tour,</a></li>
                                <li><a href="#">Travel</a></li>
                            </ul>
                            <div class="user-details row">
                                <p class="user-name col-lg-12 col-md-12 col-6"><a
                                        href="#">{{ $packages->max_capacity }} Person</a> <span
                                        class="lnr lnr-user"></span></p>
                                <p class="date col-lg-12 col-md-12 col-6"><a
                                        href="#">{{ \Carbon\Carbon::parse($packages->start_date)->translatedFormat('j F Y') }}</a>
                                    <span class="lnr lnr-calendar-full"></span>
                                </p>
                                <p class="view col-lg-12 col-md-12 col-6"><a href="#">1.2M Views</a> <span
                                        class="lnr lnr-eye"></span></p>
                                <p class="comments col-lg-12 col-md-12 col-6"><a href="#">06 Comments</a> <span
                                        class="lnr lnr-bubble"></span></p>
                                <ul class="social-links col-lg-12 col-md-12 col-6">
                                    <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                    <li><a href="#"><i class="fa fa-github"></i></a></li>
                                    <li><a href="#"><i class="fa fa-behance"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-9 col-md-9">
                            <h3 class="mt-20 mb-20">Description</h3>
                            <p class="excert">
                                {{ $packages->description }}
                            </p>
                        </div>
                        <div class="col-lg-12 recent-blog-area">
                            <div class="quotes">
                                Destinasi yang tersedia,
                            </div>
                            <div class="row mt-30 mb-10 p-3">
                                <div class="active-recent-blog-carusel">
                                    @foreach ($packages->destination as $item)
                                        <div class="single-recent-blog-post item">
                                            <div class="thumb">
                                                @php
                                                    $images = json_decode($item->image);
                                                @endphp
                                                <img class="img-fluid"
                                                    src="{{ asset('storage/destination/' . $images[0]) }}" alt=""
                                                    style="height: 200px; border-radius: 5px" />
                                            </div>
                                            <div class="details">
                                                <a href="/destination-detail/{{ $item->name }}">
                                                    <h4 class="title">{{ $item->name }}</h4>
                                                </a>
                                                <p>
                                                    {{ Str::limit($item->description, 50) }}
                                                </p>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="comments-area">
                        <h4>{{ $review->count() }} Comments</h4>
                        @foreach ($review as $item)
                            <div class="comment-list">
                                <div class="single-comment justify-content-between d-flex">
                                    <div class="user justify-content-between d-flex">
                                        <div class="thumb">
                                            <img src="img/blog/c1.jpg" alt="">
                                        </div>
                                        <div class="desc">
                                            @foreach ($item->user->booking->unique('user_id') as $data)
                                                <h5><a href="#">{{ $data->name }}</a></h5>
                                            @endforeach
                                            <p class="date">{{ $item->created_at }}</p>
                                            <p class="comment">
                                                {{ $item->review }}
                                            </p>
                                        </div>
                                    </div>
                                    <div class="">
                                        <div class="single-testimonial"
                                            style="background: rgba(0, 0, 0, 0); padding: 0; margin-top: 0px; margin-bottom: 15px">
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
                                </div>
                            </div>
                        @endforeach
                    </div>
                    {{-- <div class="comment-form">
                        <h4>Leave a Comment</h4>
                        <form>
                            <div class="form-group form-inline">
                                <div class="form-group col-lg-6 col-md-12 name">
                                    <input type="text" class="form-control" id="name" placeholder="Enter Name"
                                        onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Name'">
                                </div>
                                <div class="form-group col-lg-6 col-md-12 email">
                                    <input type="email" class="form-control" id="email"
                                        placeholder="Enter email address" onfocus="this.placeholder = ''"
                                        onblur="this.placeholder = 'Enter email address'">
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-control" id="subject" placeholder="Subject"
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Subject'">
                            </div>
                            <div class="form-group">
                                <textarea class="form-control mb-10" rows="5" name="message" placeholder="Messege"
                                    onfocus="this.placeholder = ''" onblur="this.placeholder = 'Messege'" required=""></textarea>
                            </div>
                            <a href="#" class="primary-btn text-uppercase">Post Comment</a>
                        </form>
                    </div> --}}
                </div>
                <div class="col-lg-4 sidebar-widgets">
                    <div class="widget-wrap">
                        <div class="single-sidebar-widget user-info-widget">
                            <img src="img/blog/user-info.png" alt="">
                            <a href="#">
                                <h4>Nglantours</h4>
                            </a>
                            <p>
                                Administrator
                            </p>
                            <ul class="social-links">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-github"></i></a></li>
                                <li><a href="#"><i class="fa fa-behance"></i></a></li>
                            </ul>
                            <p>
                                Nglantours: Explore the world with us! We offer a wide range of domestic and international tour packages, tailored to your preferences. Our dedicated team of travel experts ensures a seamless and memorable vacation experience. Embrace the joy of travel with Nglantours and discover new horizons.
                            </p>
                        </div>
                        <div class="single-sidebar-widget popular-post-widget">
                            <a href="{{ route('booking.show', $packages->id) }}" class="genric-btn primary-border w-100"
                                style="font-size: 20px; border-radius: 8px">Booking Now</a>
                        </div>
                        <div class="single-sidebar-widget ads-widget">
                            <a href="#"><img class="img-fluid"
                                    src="https://source.unsplash.com/random/300x250?tour&1" alt=""></a>
                        </div>
                        <div class="single-sidebar-widget post-category-widget">
                            <a href="{{ asset('assets/Itinerary Perjalanan.pdf') }}" download="Itinerary Perjalanan.pdf" class="genric-btn primary w-100"
                                style="font-size: 20px; border-radius: 8px">Itinerary Perjalanan</a>
                        </div>
                        <div class="single-sidebar-widget tag-cloud-widget">
                            <h4 class="flex justify-content-center mb-4">Tag Clouds</h4>
                            <ul>
                                <li><a href="#">Tour</a></li>
                                <li><a href="#">Travel</a></li>
                                <li><a href="#">View</a></li>
                                <li><a href="#">Landscape</a></li>
                                <li><a href="#">Lifestyle</a></li>
                                <li><a href="#">Gallery</a></li>
                                <li><a href="#">Beach</a></li>
                                <li><a href="#">Religion</a></li>
                                <li><a href="#">Adventure</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End post-content Area -->
@endsection
