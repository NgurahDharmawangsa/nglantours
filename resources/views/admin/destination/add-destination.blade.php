@extends('admin.layouts.mainlayouts')
@extends('admin.layouts.navbar')
@section('title', 'Destination')

@section('content')
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
        integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
        crossorigin="" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet-geosearch/dist/style.css" />

    <style>
        .leaflet-control-geosearch {
            z-index: 100000;
            position: relative;
            display: flex;
            justify-content: center;
            color: red;
            padding: 10px;
            border-radius: 10px;
        }
    </style>

    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last mb-3">
                    <h3 class="d-inline">
                        <a href="{{ route('destination.index') }}" class="bi bi-arrow-left align-middle me-2"></a>
                        <span class="align-middle">Add Destination</span>
                    </h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="destination">Destination</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Form Destination</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>



        <!-- Basic Horizontal form layout section start -->
        <section id="basic-horizontal-layouts">
            <div class="row match-height">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Form Tambah Destinasi</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form form-horizontal" action="{{ route('destination.store') }}" method="post"
                                    enctype="multipart/form-data">
                                    @csrf
                                    {{-- @method('POST') --}}
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <label>Nama Destinasi</label>
                                            </div>
                                            <div class="col-md-10 form-group">
                                                <input type="text" id="name"
                                                    class="form-control @error('name') is-invalid @enderror" name="name">
                                            </div>
                                            <div class="col-md-2">
                                                <label>Deskripsi</label>
                                            </div>
                                            <div class="col-md-10 form-group">
                                                <textarea class="form-control @error('description') is-invalid @enderror" id="exampleFormControlTextarea1"
                                                    rows="3" name="description"></textarea>
                                            </div>
                                            <div class="col-md-2">
                                                <label>Gambar</label>
                                            </div>
                                            <div class="col-md-10 form-group">
                                                {{-- <input type="file" class="multiple-files-filepond" id="formFile" name="image[]" multiple> --}}
                                                <input class="form-control @error('image') is-invalid @enderror"
                                                    type="file" id="formFile" name="image[]" multiple>
                                            </div>
                                            <div class="col-md-2">
                                                <label>Latitude</label>
                                            </div>
                                            <div class="col-md-10 form-group">
                                                <input type="text" id="latitude"
                                                    class="form-control @error('latitude') is-invalid @enderror"
                                                    name="latitude">
                                            </div>
                                            <div class="col-md-2">
                                                <label>Longitude</label>
                                            </div>
                                            <div class="col-md-10 form-group">
                                                <input type="text" id="longitude"
                                                    class="form-control @error('longitude') is-invalid @enderror"
                                                    name="longitude">
                                            </div>
                                            <div class="col-md-2">
                                                <label></label>
                                            </div>
                                            <div class="col-md-10 form-group">
                                                <div id="mapid" style="height: 350px; border-radius: 10px"></div>
                                            </div>
                                            <div class="col-sm-12 d-flex justify-content-end">
                                                <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                                <button type="reset"
                                                    class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
                integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
                crossorigin=""></script>
            <script src="https://unpkg.com/leaflet-geosearch/dist/bundle.min.js"></script>
            <script>
                var mymap = L.map('mapid').setView([-8.8295929, 115.1567985], 12);
                var theMarker;

                // L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
                //     attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>',
                //     maxZoom: 18,
                //     id: 'mapbox/streets-v11',
                //     tileSize: 512,
                //     zoomOffset: -1,
                //     fullscreenControl: true,
                //     detectRetina: true,
                //     accessToken: 'your.mapbox.access.token'
                // }).addTo(mymap);

                L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
                    attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
                }).addTo(mymap);

                // Fungsi popup saat peta diklik
                function onMapClick(e) {
                    if (theMarker) {
                        mymap.removeLayer(theMarker);
                    }

                    theMarker = L.marker(e.latlng).addTo(mymap);
                    document.getElementById("latitude").value = e.latlng.lat;
                    document.getElementById("longitude").value = e.latlng.lng;
                }

                mymap.on('click', onMapClick);

                // Inisialisasi provider pencarian (GeoSearch)
                const provider = new GeoSearch.OpenStreetMapProvider();

                // Konfigurasi kontrol pencarian
                const searchControl = new GeoSearch.GeoSearchControl({
                    provider: provider,
                    style: 'bar',
                    searchLabel: 'Cari lokasi',
                    showMarker: false,
                    showPopup: false,
                });

                // Tambahkan kontrol pencarian ke peta
                mymap.addControl(searchControl);

                // Tangani hasil pencarian
                searchControl.on('results', handleSearchResult);

                // Fungsi untuk menangani hasil pencarian
                function handleSearchResult(results) {
                    if (results && results.length > 0) {
                        const result = results[0]; // Ambil hasil pencarian pertama
                        const {
                            lat,
                            lng
                        } = result.location;
                        const name = result.label;
                        if (theMarker) {
                            mymap.removeLayer(theMarker);
                        }
                        theMarker = L.marker([lat, lng]).addTo(mymap);
                        document.getElementById("latitude").value = lat;
                        document.getElementById("longitude").value = lng;
                    }
                }
            </script>
        </section>
        <!-- // Basic Horizontal form layout section end -->
    @endsection
