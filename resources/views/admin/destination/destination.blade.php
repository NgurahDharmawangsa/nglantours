@extends('admin.layouts.mainlayouts')
@extends('admin.layouts.navbar')
@section('title', 'Destination')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Destination</h3>
                    <p class="text-subtitle text-muted">Discover amazing travel destinations around the world.</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">DataTable Jquery</li>
                        </ol>
                    </nav>
                </div>
                @if (Session::has('status'))
                    <div class="alert alert-success alert-dismissible show fade">
                        {{Session::get('message')}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
            </div>
        </div>

        <!-- Basic Tables start -->
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('destination.create') }}" class="btn btn-primary">Add Data</a>
                </div>
                <div class="card-body">
                    <table class="table" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                {{-- <th>Description</th> --}}
                                <th>Image</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($destination as $data)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->name }}</td>
                                    {{-- <td>{{ $data->description }}</td> --}}
                                    <td>
                                        @if (!empty($data->image))
                                            @php
                                                $images = json_decode($data->image);
                                            @endphp
                                            @if (count($images) > 0)
                                                <img src="{{ asset('storage/destination/' . $images[0]) }}" class="rounded"
                                                    style="width: 100px">
                                            @endif
                                        @else
                                            <img src="{{ asset('/assets/noimage.png') }}" class="rounded"
                                                style="width: 100px">
                                        @endif
                                    </td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-primary dropdown-toggle hide-caret" type="button"
                                                id="actionDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="bi bi-three-dots-vertical"></i>
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButtonEmoji">
                                                <a class="dropdown-item text-white"
                                                    href="{{ route('destination.show', $data->id) }}"><span
                                                        class="dropdown-item-emoji bi bi-archive-fill text-success me-2"></span>
                                                    Detail</a>
                                                <a class="dropdown-item text-white"
                                                    href="{{ route('destination.edit', $data->id) }}"><span
                                                        class="dropdown-item-emoji bi bi-pencil-fill text-primary me-2"></span>
                                                    Edit</a>
                                                <a class="dropdown-item text-white" href="#"><span
                                                        class="dropdown-item-emoji bi bi-trash-fill text-danger me-2"></span>
                                                    Hapus</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
            <style>
                .hide-caret::after {
                    display: none !important;
                }
            </style>

        </section>
        <!-- Basic Tables end -->
    @endsection
