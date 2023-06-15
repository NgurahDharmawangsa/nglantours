@extends('client.layouts.mainlayouts')
@section('title', 'Home')

@php
    use Carbon\Carbon;
@endphp

@section('content')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
        integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
        crossorigin="" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.css" />
    <!-- start banner Area -->
    <section class="about-banner relative"
        style="background-image: url('https://images.unsplash.com/photo-1593261893060-7d88ec1681dc?ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D&auto=format&fit=crop&w=873&q=80')">
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="about-content col-lg-12">
                    <h1 class="text-white">
                        Detail Destination
                    </h1>
                    <p class="text-white link-nav"><a href="/">Home </a> <span class="lnr lnr-arrow-right"></span> <a
                            href="/destinations"> Destination</a><span class="lnr lnr-arrow-right"></span> <a
                            href="packages.html"> Detail Destination</a></p>
                </div>
            </div>
        </div>
    </section>
    <!-- End banner Area -->

    <!-- Start about-info Area -->
    <section class="about-info-area section-gap">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 info-left">
                    <div id="carouselExample" class="carousel slide" data-ride="carousel">
                        <div class="carousel-inner">
                            @php
                                $images = json_decode($destination->image);
                                $active = true;
                            @endphp
                            @foreach ($images as $image)
                                <div class="carousel-item {{ $active ? 'active' : '' }}">
                                    <img class="d-block img-fluid" src="{{ asset('storage/destination/' . $image) }}"
                                        alt="Slide Image">
                                </div>
                                @php
                                    $active = false;
                                @endphp
                            @endforeach
                        </div>
                        <a class="carousel-control-prev" href="#carouselExample" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>
                        <a class="carousel-control-next" href="#carouselExample" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
                <div class="col-lg-6 info-right">
                    <h1>{{ $destination->name }}</h1>
                    <p>{{ $destination->description }}</p>
                </div>
            </div>
        </div>
    </section>
    <!-- End about-info Area -->

    <!-- Map -->
    <div class="section-gap" style="margin-top: -100px">
        <div class="container">
            <div id="mapid" style="height: 400px; border-radius: 10px;">
                <div
                    style="display: flex; justify-content: flex-start; width: 100%; padding: 10px; position: absolute; bottom: 0">
                    <a href="http://maps.google.com/?q={{ $destination->latitude }},{{ $destination->longitude }}"><button
                            class="btn btn-primary" style="position: relative; z-index: 499;">Lokasi</button></a>
                </div>
            </div>
        </div>
    </div>
    {{-- End Map --}}

    <!-- Start blog Area -->
    <section class="recent-blog-area section-gap" style="background-color: #faf9f7">
        <div class="container">
            <div class="row d-flex justify-content-center">
                <div class="menu-content pb-60 col-lg-9">
                    <div class="title text-center">
                        <h1 class="mb-10">Paket Terkait</h1>
                        <p>With the exception of Nietzsche, no other madman has contributed so much to human sanity as has.
                        </p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="active-recent-blog-carusel">
                    @foreach ($destination->packages as $item)
                        @php
                            $startDate = Carbon::parse($item->start_date);
                            $endDate = Carbon::parse($item->end_date);
                            $diffInDays = $startDate->diffInDays($endDate);
                        @endphp
                        <div class="single-recent-blog-post item">
                            <div class="thumb">
                                <img class="img-fluid" src="{{ asset('storage/packages/' . $item->image) }}" alt=""
                                    style="height: 200px; background-size: cover; background-position: center">
                            </div>
                            <div class="details">
                                <div class="tags">
                                    <ul>
                                        <li>
                                            <i class="bi bi-cloud-moon-fill"></i>
                                            <a href="#">{{ $diffInDays }} Days</a>
                                        </li>
                                        <li>
                                            <i class="bi bi-person-fill"></i>
                                            <a href="#">{{ $item->max_capacity }} person</a>
                                        </li>
                                    </ul>
                                </div>
                                <a href="/packages-detail/{{ $item->id }}">
                                    <h4 class="title">{{ $item->name }}</h4>
                                </a>
                                <p>
                                    Acres of Diamonds… you've read the famous story, or at least had it related to you. A
                                    farmer.
                                </p>
                                <h6 class="date">
                                    {{ \Carbon\Carbon::parse($item->start_date)->translatedFormat('j F Y') }}
                                </h6>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
        integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
        crossorigin=""></script>
    <script src="https://unpkg.com/leaflet-routing-machine@latest/dist/leaflet-routing-machine.js"></script>
    {{-- <script>
        const latitude = {{ $destination->latitude }};
        const longitude = {{ $destination->longitude }};

        var leafletMap = L.map('mapid').setView([latitude, longitude], 12);

        L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors',
        }).addTo(leafletMap);

        L.marker([latitude, longitude]).addTo(leafletMap);
    </script> --}}
    {{-- <script>
        const latitude = {{ $destination->latitude }};
        const longitude = {{ $destination->longitude }};
        let map = L.map('mapid').setView([-8.8295929, 115.1567985], 13);
        let latLng1 = L.latLng(-8.8295929, 115.1567985);
        let latLng2 = L.latLng(latitude, longitude);
        let wp1 = new L.Routing.Waypoint(latLng1);
        let wp2 = new L.Routing.Waypoint(latLng2);
    
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);
    
        L.Routing.control({
            waypoints: [latLng1,latLng2]
        }).addTo(map);
    
        let routeUs = L.Routing.osrmv1();
        routeUs.route([wp1,wp2],(err,routes)=>{
            if(!err)
            {
                let best = 100000000000000;
                let bestRoute = 0;
                for(i in routes)
                {
                    if(routes[i].summary.totalDistance < best) {
                        bestRoute = i;
                        best = routes[i].summary.totalDistance;
                    }
                }
                console.log('best route',routes[bestRoute]);
                // L.Routing.line(routes[bestRoute],{
                //     styles : [
                //         {
                //             color : 'green',
                //             weight : '10'
                //         }
                //     ]
                // }).addTo(map);
            
            }
        })
    
    </script> --}}
    <script>
        let latLng1;

        // Mendapatkan lokasi saat ini menggunakan geolocation API
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                // Mendapatkan koordinat latitude dan longitude
                const latitude = position.coords.latitude;
                const longitude = position.coords.longitude;

                // Membuat objek latLng1 dengan koordinat saat ini
                latLng1 = L.latLng(latitude, longitude);

                // Melanjutkan dengan inisialisasi peta dan penggunaan koordinat
                initializeMap(latLng1);
            }, function(error) {
                console.log('Gagal mendapatkan lokasi saat ini:', error);
                // Melanjutkan dengan inisialisasi peta menggunakan koordinat default atau yang lainnya
                initializeMap(latLng1);
            });
        } else {
            console.log('Geolocation tidak didukung oleh browser.');
            // Melanjutkan dengan inisialisasi peta menggunakan koordinat default atau yang lainnya
            initializeMap(latLng1);
        }

        function initializeMap(latLng1) {
            const latitude = {{ $destination->latitude }};
            const longitude = {{ $destination->longitude }};
            let map = L.map('mapid').setView([-8.8295929, 115.1567985], 13);
            let latLng2 = L.latLng(latitude, longitude);
            let wp1 = new L.Routing.Waypoint(latLng1);
            let wp2 = new L.Routing.Waypoint(latLng2);

            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
            }).addTo(map);

            L.Routing.control({
                waypoints: [latLng1, latLng2]
            }).addTo(map);

            let routeUs = L.Routing.osrmv1();
            routeUs.route([wp1, wp2], (err, routes) => {
                if (!err) {
                    let best = 100000000000000;
                    let bestRoute = 0;
                    for (i in routes) {
                        if (routes[i].summary.totalDistance < best) {
                            bestRoute = i;
                            best = routes[i].summary.totalDistance;
                        }
                    }
                    console.log('best route', routes[bestRoute]);
                    // L.Routing.line(routes[bestRoute],{
                    //     styles : [
                    //         {
                    //             color : 'green',
                    //             weight : '10'
                    //         }
                    //     ]
                    // }).addTo(map);

                }
            })
        }
    </script>
    <!-- End recent-blog Area -->
@endsection
