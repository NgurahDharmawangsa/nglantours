@extends('client.layouts.mainlayouts')
@section('title', 'Home')

@section('content')
    {{-- @foreach ($booking as $item)
        <li>{{ $item->packages->name }}</li>
    @endforeach --}}
    {{-- {{$packages}} --}}
    <!-- start banner Area -->
    <section class="relative about-banner">
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="about-content col-lg-12">
                    <h1 class="text-white">
                        Booking Page
                    </h1>
                    <p class="text-white link-nav"><a href="index.html">Home </a> <span class="lnr lnr-arrow-right"></span><a
                            href="blog-home.html">Packages </a> <span class="lnr lnr-arrow-right"></span> <a
                            href="blog-single.html"> Packages Detail</a><span class="lnr lnr-arrow-right"></span> <a
                            href="blog-single.html"> Booking</a></p>
                </div>
            </div>
        </div>
    </section>
    <!-- End banner Area -->

    <div class="container mb-5">
        <div class="comment-form" style="border-radius: 10px">
            <h4>Booking Now!</h4>
            <form method="post" action="{{ route('booking.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="form-group form-inline">
                    <div class="form-group col-lg-6 col-md-12 name">
                        <input name="name" type="text" class="form-control" id="name" placeholder="Enter Name"
                            onfocus="this.placeholder = ''" onblur="this.placeholder = 'Enter Name'">
                    </div>
                    <div class="form-group col-lg-6 col-md-12 name">
                        <input name="number" type="number" class="form-control" id="number"
                            placeholder="Enter phone number" onfocus="this.placeholder = ''"
                            onblur="this.placeholder = 'Enter phone number'">
                    </div>
                </div>
                <div class="form-group form-inline">
                    <div class="form-group col-lg-6 col-md-12 name">
                        <input name="booking_date" type="date" class="form-control" id="date"
                            placeholder="Enter Booking Date" onfocus="this.placeholder = ''"
                            onblur="this.placeholder = 'Enter Booking Date'">
                    </div>
                    <div class="form-group col-lg-6 col-md-12 name">
                        <input name="participants" type="number" class="form-control" id="participants"
                            placeholder="Enter Participants" onfocus="this.placeholder = ''"
                            onblur="this.placeholder = 'Enter Participants'">
                    </div>
                </div>
                <div class="form-group form-inline">
                    <div class="form-group col-lg-6 col-md-12 name">
                        <div class="form-select" id="default-select">
                            <select name="payment_method">
                                <option selected disabled>Payment Method</option>
                                <option value="bank transfer">Bank Transfer</option>
                                <option value="credit card">Credit Card</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group col-lg-6 col-md-12 name">
                        <input name="total_price" type="number" class="form-control" id="total_price"
                            placeholder="Total Price" onfocus="this.placeholder = ''"
                            onblur="this.placeholder = 'Total Price'" readonly>
                    </div>
                </div>
                <div class="form-group">
                    <input class="form-control" type="file" id="formFile" name="payment_proof">
                </div>
                <input type="hidden" name="packages_id" value="{{ $packages->id }}">
                <button type="submit" class="primary-btn text-uppercase"x`>Submit</button>
            </form>
        </div>
    </div>
    <script>
        // Mendapatkan elemen input participants dan total_price
        const participantsInput = document.getElementById('participants');
        const totalPriceInput = document.getElementById('total_price');

        // Menambahkan event listener untuk menghitung total harga saat nilai participants berubah
        participantsInput.addEventListener('input', function() {
            // Mendapatkan nilai participants
            const participants = participantsInput.value;

            // Mendapatkan harga paket dari PHP menggunakan variabel $packages->price
            const packagePrice = {!! json_encode($packages->price) !!};

            // Menghitung total harga
            const totalPrice = participants * packagePrice;

            // Memasukkan nilai total harga ke input total_price
            totalPriceInput.value = totalPrice;
        });
    </script>
@endsection
