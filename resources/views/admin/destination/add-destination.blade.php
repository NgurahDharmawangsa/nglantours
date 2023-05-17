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
                                <form class="form form-horizontal" action="{{ route('destination.store') }}" method="post" enctype="multipart/form-data">
                                    @csrf
                                    {{-- @method('POST') --}}
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <label>Nama Destinasi</label>
                                            </div>
                                            <div class="col-md-10 form-group">
                                                <input type="text" id="name" class="form-control" name="name"
                                                    placeholder="Nama Destinasi">
                                            </div>
                                            <div class="col-md-2">
                                                <label>Deskripsi</label>
                                            </div>
                                            <div class="col-md-10 form-group">
                                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="3" name="description"></textarea>
                                            </div>
                                            <div class="col-md-2">
                                                <label>Gambar</label>
                                            </div>
                                            <div class="col-md-10 form-group">
                                                {{-- <input type="file" class="multiple-files-filepond" id="formFile" name="image[]" multiple> --}}
                                                <input class="form-control" type="file" id="formFile" name="image[]" multiple>
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
