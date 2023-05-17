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
                        <span class="align-middle">Add Packages</span>
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
                            <h4 class="card-title">Form Tambah Paket Wisata</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form form-horizontal" action="{{route('packages.store')}}" method="post">
                                    @csrf
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <label>Paket Wisata</label>
                                            </div>
                                            <div class="col-md-10 form-group">
                                                <input type="text" id="name" class="form-control" name="name"
                                                    placeholder="Nama Paket Wisata">
                                            </div>
                                            <div class="col-md-2">
                                                <label>Keberangkatan</label>
                                            </div>
                                            <div class="col-md-10 form-group">
                                                <input type="date" id="start_date" class="form-control" name="start_date"
                                                    placeholder="Nama Destinasi">
                                            </div>
                                            <div class="col-md-2">
                                                <label>Kedatangan</label>
                                            </div>
                                            <div class="col-md-10 form-group">
                                                <input type="date" id="first-name" class="form-control" name="end_date"
                                                    placeholder="Nama Destinasi">
                                            </div>
                                            <div class="col-md-2">
                                                <label>Harga</label>
                                            </div>
                                            <div class="col-md-10 form-group">
                                                <input type="text" id="first-name" class="form-control" name="price"
                                                    placeholder="Harga">
                                            </div>
                                            <div class="col-md-2">
                                                <label>Kapasitas Maksimal</label>
                                            </div>
                                            <div class="col-md-10 form-group">
                                                <input type="number" id="first-name" class="form-control" name="max_capacity"
                                                    placeholder="Kapasitas Maksimal">
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
                                                            <input class="form-check-input" type="checkbox" name="destination[]" value="{{ $data->id }}"
                                                                id="destination-{{ $data->id }}">
                                                            <label class="form-check-label" for="destination-{{ $data->id }}">
                                                                {{ $data->name }}
                                                            </label>
                                                        </div>
                                                        @endforeach
                                                    </div>
                                                </div>
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
        </section>
        <!-- // Basic Horizontal form layout section end -->
    @endsection
