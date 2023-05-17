@extends('admin.layouts.mainlayouts')
@extends('admin.layouts.navbar')
@section('title', 'Destination')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last mb-3">
                    <h3 class="d-inline">
                        <a href="{{ route('destination.index') }}" class="bi bi-arrow-left align-middle me-2"></a>
                        <span class="align-middle">Detail Destination</span>
                    </h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="destination">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Form Destination</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <div class="col-md-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">{{ $destination->name }}</h5>
                </div>
                <div class="card-body">
                    <div class="row gallery align-items-stretch" data-bs-toggle="modal" data-bs-target="#galleryModal">
                        @foreach (json_decode($destination->image) as $image)
                            <div class="col-6 col-sm-6 col-lg-3 mt-2 mt-md-2 mb-md-2 mb-2">
                                <a href="#">
                                    <img class="w-100 h-100" src="{{ asset('storage/destination/' . $image) }}"
                                        data-bs-target="#Gallerycarousel" data-bs-slide-to="0">
                                </a>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="galleryModal" tabindex="-1" role="dialog" aria-labelledby="galleryModalTitle"
            aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="galleryModalTitle">Our Gallery Example</h5>
                        <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div id="Gallerycarousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
                            <div class="carousel-indicators">
                                @foreach (json_decode($destination->image) as $key => $image)
                                    <button type="button" data-bs-target="#Gallerycarousel"
                                        data-bs-slide-to="{{ $key }}" class="{{ $key == 0 ? 'active' : '' }}"
                                        aria-current="{{ $key == 0 ? 'true' : 'false' }}"
                                        aria-label="Slide {{ $key + 1 }}"></button>
                                @endforeach
                            </div>
                            <div class="carousel-inner">
                                @foreach (json_decode($destination->image) as $key => $image)
                                    <div class="carousel-item {{ $key == 0 ? 'active' : '' }}">
                                        <img class="w-100" src="{{ asset('storage/destination/' . $image) }}"
                                            data-bs-target="#Gallerycarousel" data-bs-slide-to="{{ $key }}">
                                    </div>
                                @endforeach
                            </div>
                            <a class="carousel-control-prev" href="#Gallerycarousel" role="button" type="button"
                                data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            </a>
                            <a class="carousel-control-next" href="#Gallerycarousel" role="button" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            </a>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-12 col-sm-12 mt-4">
            <div class="card">
                <div class="card-content">                    
                    <div class="card-body">
                        <h6 class="card-title">Deskripsi</h6>
                        <p class="card-text">
                            {{$destination->description}}
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <ol>
        @foreach ($destination->packages as $item)
            <li>{{$item->name}}</li>
        @endforeach
        </ol>
    @endsection
