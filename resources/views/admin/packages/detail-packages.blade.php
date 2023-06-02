@extends('admin.layouts.mainlayouts')
@extends('admin.layouts.navbar')
@section('title', 'Destination')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last mb-3">
                    <h3 class="d-inline">
                        <a href="{{ route('packages.index') }}" class="bi bi-arrow-left align-middle me-2"></a>
                        <span class="align-middle">Detail Packages</span>
                    </h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="destination">Packages</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Detail Packages</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <div class="col-md-12 col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">{{ $packages->name }}</h5>
                </div>
                <div class="card-body">
                    <div class="row gallery align-items-stretch" data-bs-toggle="modal" data-bs-target="#galleryModal">
                        <div class="col-6 col-sm-6 col-lg-3 mt-2 mt-md-2 mb-md-2 mb-2">
                            <a href="#">
                                <img class="w-100 h-100" src="{{ asset('storage/packages/' . $packages->image) }}"
                                    data-bs-target="#Gallerycarousel" data-bs-slide-to="0">
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            @foreach ($packages->destination as $item)
                <div class="col-xl-4 col-md-6 col-sm-12">
                    <div class="card">
                        <div class="card-content">
                            <div class="card-body">
                                <h4 class="card-title">{{ $item->name }}</h4>
                                {{-- <h6 class="card-subtitle">Support card subtitle</h6> --}}
                            </div>
                            <div id="carousel-{{ $loop->index }}" class="carousel slide" data-bs-ride="carousel"
                                data-bs-interval="3000">
                                <div class="carousel-inner">
                                    @php
                                        $images = json_decode($item->image);
                                    @endphp
                                    @foreach ($images as $index => $image)
                                        <div class="carousel-item {{ $index === 0 ? 'active' : '' }}">
                                            <a href="#">
                                                <img class="w-100 static-height" style="height: 200px; object-fit: cover;"
                                                    src="{{ asset('storage/destination/' . $image) }}"
                                                    data-bs-target="#carousel-{{ $loop->parent->index }}"
                                                    data-bs-slide-to="{{ $index }}">
                                            </a>
                                        </div>
                                    @endforeach
                                </div>
                                <a class="carousel-control-prev" href="#carousel-{{ $loop->index }}" role="button"
                                    data-bs-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carousel-{{ $loop->index }}" role="button"
                                    data-bs-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="visually-hidden">Next</span>
                                </a>
                            </div>
                            <div class="card-body">
                                <p class="card-text">
                                    {{ $item->description }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>



@endsection
