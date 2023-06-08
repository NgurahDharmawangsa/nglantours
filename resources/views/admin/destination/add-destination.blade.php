@extends('admin.layouts.mainlayouts')
@extends('admin.layouts.navbar')
@section('title', 'Destination')

@section('content')
    <!-- ... Kode sebelumnya ... -->


    <div class="card-content">
        <div class="card-body">
            <form class="form form-horizontal" action="{{ route('destination.store') }}" method="post"
                enctype="multipart/form-data">
                @csrf
                <div class="form-body">
                    <div class="row">
                        <div class="col-md-2">
                            <label>Nama Destinasi</label>
                        </div>
                        <div class="col-md-10 form-group">
                            <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" name="name">
                            @error('name')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-2">
                            <label>Deskripsi</label>
                        </div>
                        <div class="col-md-10 form-group">
                            <textarea class="form-control @error('description') is-invalid @enderror" id="exampleFormControlTextarea1" rows="3" name="description"></textarea>
                            @error('description')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-md-2">
                            <label>Gambar</label>
                        </div>
                        <div class="col-md-10 form-group">
                            <input class="form-control @error('image') is-invalid @enderror" type="file" id="formFile" name="image[]"
                                multiple>
                            @error('image')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="col-sm-12 d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                            <button type="reset" class="btn btn-light-secondary me-1 mb-1">Reset</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- ... Kode selanjutnya ... -->
@endsection
