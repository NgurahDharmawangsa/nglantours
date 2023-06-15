@extends('admin.layouts.mainlayouts')
@extends('admin.layouts.navbar')
@section('title', 'Destination')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last mb-3">
                    <h3 class="d-inline">
                        <a href="/booking-admin" class="bi bi-arrow-left align-middle me-2"></a>
                        <span class="align-middle">Edit Booking</span>
                    </h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Booking</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Form Booking</li>
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
                            <h4 class="card-title">Form Edit Booking</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form form-horizontal" action="{{ route('booking.update', $booking->id) }}"
                                    method="post" enctype="multipart/form-data">
                                    @method('PUT')
                                    @csrf
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-md-2">
                                                <label>Username</label>
                                            </div>
                                            <div class="col-md-10 form-group">
                                                <input type="text" id="name" class="form-control" name="name"
                                                    value="{{ $booking->name }}" readonly>
                                            </div>
                                            <div class="col-md-2">
                                                <label>Telp Number</label>
                                            </div>
                                            <div class="col-md-10 form-group">
                                                <input type="text" id="number" class="form-control" name="number"
                                                    value="{{ $booking->number }}" readonly>
                                            </div>
                                            <div class="col-md-2">
                                                <label>Booking Date</label>
                                            </div>
                                            <div class="col-md-10 form-group">
                                                <input type="date" id="form-control flatpickr-range mb-3"
                                                    class="form-control" name="booking_date"
                                                    value="{{ $booking->booking_date }}" placeholder="Select date.."
                                                    readonly>
                                            </div>
                                            <div class="col-md-2">
                                                <label>Participants</label>
                                            </div>
                                            <div class="col-md-10 form-group">
                                                <input type="number" id="participants" class="form-control"
                                                    name="participants" value="{{ $booking->participants }}" readonly>
                                            </div>
                                            <div class="col-md-2">
                                                <label>Total Price</label>
                                            </div>
                                            <div class="col-md-10 form-group">
                                                <input type="text" id="total_price" class="form-control"
                                                    name="total_price" value="{{ $booking->total_price }}" readonly>
                                            </div>
                                            <div class="col-md-2">
                                                <label>Payment Proof</label>
                                            </div>
                                            <div class="col-md-10 form-group">
                                                <img src="{{ asset('storage/booking/' . $booking->payment_proof) }}"
                                                    alt="Gambar" class="img-thumbnail"
                                                    style="height: 100px; width: auto;">
                                            </div>
                                            <div class="col-md-2">
                                                <label>Payment Method</label>
                                            </div>
                                            <div class="col-md-10 form-group">
                                                <input type="text" id="payment_method" class="form-control"
                                                    name="payment_method" value="{{ $booking->payment_method }}" readonly>
                                            </div>
                                            <div class="col-md-2">
                                                <label>Status</label>
                                            </div>
                                            <div class="col-md-10 form-group">
                                                <select name="status" id="" class="form-control">
                                                    @if ($booking->status == 'pending')
                                                        <option value="{{ $booking->status }}">{{ $booking->status }}
                                                        </option>
                                                        <option value="failed">failed</option>
                                                        <option value="success">success</option>
                                                    @elseif($booking->status == 'failed')
                                                        <option value="{{ $booking->status }}">{{ $booking->status }}
                                                        </option>
                                                        <option value="pending">pending</option>
                                                        <option value="success">success</option>
                                                    @else
                                                        <option value="{{ $booking->status }}">{{ $booking->status }}
                                                        </option>
                                                        <option value="pending">pending</option>
                                                        <option value="failed">failed</option>
                                                    @endif
                                                </select>
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
