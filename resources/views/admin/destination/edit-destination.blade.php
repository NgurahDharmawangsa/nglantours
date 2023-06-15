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
                        <span class="align-middle">Edit Destination</span>
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
                            <h4 class="card-title">Form Edit Destinasi</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form form-horizontal"
                                    action="{{ route('destination.update', $destination->id) }}" method="post"
                                    enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <label>Nama Destinasi</label>
                                            </div>
                                            <div class="col-md-10 form-group">
                                                <input type="text" id="name" class="form-control" name="name"
                                                    value="{{ $destination->name }}">
                                            </div>
                                            <div class="col-md-2">
                                                <label>Deskripsi</label>
                                            </div>
                                            <div class="col-md-10 form-group">
                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description">{{ $destination->description }}</textarea>
                                            </div>
                                            <div class="col-md-2">
                                                <label>Gambar</label>
                                            </div>
                                            <div class="col-md-10 form-group d-flex flex-wrap">
                                                @foreach (json_decode($destination->image) as $index => $image)
                                                    <div class="mb-2 me-2 position-relative">
                                                        <img src="{{ asset('storage/destination/' . $image) }}"
                                                            alt="Gambar" class="img-thumbnail"
                                                            style="height: 100px; width: auto;">
                                                        <button type="button"
                                                            class="btn btn-danger btn-sm position-absolute top-0 end-0 mt-1"
                                                            onclick="deleteImage(this, {{ $index }})">
                                                            <i class="fas fa-times"></i>
                                                        </button>
                                                        <input type="hidden" name="existing_images[]"
                                                            value="{{ $image }}">
                                                    </div>
                                                @endforeach
                                                <input class="form-control" type="file" id="formFile" name="image[]"
                                                    multiple>
                                            </div>
                                            @foreach (json_decode($destination->image) as $index => $image)
                                                <input type="hidden" name="deleted_images[]"
                                                    id="deletedImage{{ $index }}">
                                            @endforeach
                                            <div class="col-md-2">
                                                <label>Latitude</label>
                                            </div>
                                            <div class="col-md-10 form-group">
                                                <input type="text" id="latitude" class="form-control" name="latitude"
                                                    value="{{ $destination->latitude }}">
                                            </div>
                                            <div class="col-md-2">
                                                <label>Longitude</label>
                                            </div>
                                            <div class="col-md-10 form-group">
                                                <input type="text" id="longitude" class="form-control" name="longitude"
                                                    value="{{ $destination->longitude }}">
                                            </div>
                                            <div class="col-md-10 form-group" style="width: 100%; display: flex; justify-content: flex-end">
                                                <div id="mapid" style="height: 350px; border-radius: 10px; width: 83%;"></div>
                                            </div>
                                            <div class="col-sm-12 d-flex justify-content-end">
                                                <button type="submit" class="btn btn-primary me-1 mb-1">Update</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
    <script>
        function deleteImage(button, index) {
            const elemenGambar = button.parentNode;
            elemenGambar.remove();

            const inputGambarTerhapus = document.getElementById(`deletedImage${index}`);
            inputGambarTerhapus.value = '1';
        }
    </script>
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
        integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
        crossorigin=""></script>
    <script src="https://unpkg.com/leaflet-geosearch/dist/bundle.min.js"></script>
    <script>
        const latitude = {{ $destination->latitude }};
        const longitude = {{ $destination->longitude }};
        var mymap = L.map('mapid').setView([latitude, longitude], 12);
        var theMarker;

        L.tileLayer('http://{s}.tile.osm.org/{z}/{x}/{y}.png', {
            attribution: '&copy; <a href="http://osm.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(mymap);

        L.marker([latitude, longitude]).addTo(mymap);

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
    <!-- // Basic Horizontal form layout section end -->
@endsection
