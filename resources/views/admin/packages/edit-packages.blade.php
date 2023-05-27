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
                        <span class="align-middle">Edit Packages</span>
                    </h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Packages</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Form Packages</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <section id="basic-horizontal-layouts">
            <div class="row match-height">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Form Edit Packages</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form form-horizontal" action="{{ route('packages.update', $packages->id) }}"
                                    method="post" enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <label>Nama Packages</label>
                                            </div>
                                            <div class="col-md-10 form-group">
                                                <input type="text" id="name" class="form-control" name="name"
                                                    value="{{ $packages->name }}">
                                            </div>
                                            <div class="col-md-2">
                                                <label>Start Date</label>
                                            </div>
                                            <div class="col-md-10 form-group">
                                                <input type="date" id="form-control flatpickr-range mb-3"
                                                    class="form-control" name="end_date" value="{{ $packages->start_date }}"
                                                    placeholder="Select date..">
                                            </div>
                                            <div class="col-md-2">
                                                <label>End Date</label>
                                            </div>
                                            <div class="col-md-10 form-group">
                                                <input type="date" id="form-control flatpickr-range mb-3"
                                                    class="form-control" name="end_date" value="{{ $packages->end_date }}"
                                                    placeholder="Select date..">
                                            </div>
                                            <div class="col-md-2">
                                                <label>Price</label>
                                            </div>
                                            <div class="col-md-10 form-group">
                                                <input type="text" id="price" class="form-control" name="price"
                                                    value="{{ $packages->price }}">
                                            </div>
                                            <div class="col-md-2">
                                                <label>Max Capacity</label>
                                            </div>
                                            <div class="col-md-10 form-group">
                                                <input type="text" id="max_capacity" class="form-control"
                                                    name="max_capacity" value="{{ $packages->max_capacity }}">
                                            </div>
                                            <div class="col-md-2">
                                                <label for="destination-dropdown">Pilih Destinasi</label>
                                            </div>
                                            <div class="dropdown col-md-10 form-group">
                                                <button class="btn btn-primary dropdown-toggle me-1" type="button"
                                                    id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    Destination
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <div class="checkbox-group">
                                                        @foreach ($destination as $data)
                                                            <div class="form-check">
                                                                <input class="form-check-input" type="checkbox"
                                                                    name="destination[]" value="{{ $data->id }}"
                                                                    id="data-{{ $data->id }}"
                                                                    @if (in_array($data->id, $packages->destination->pluck('id')->toArray())) checked @endif>
                                                                <label class="form-check-label"
                                                                    for="destination-{{ $data->id }}">
                                                                    {{ $data->name }}
                                                                </label>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                </div>
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
@endsection
