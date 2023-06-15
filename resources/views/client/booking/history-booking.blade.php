@extends('client.layouts.mainlayouts')
@section('title', 'Home')

@section('content')
    <link rel="stylesheet" href="{{ asset('assets/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pages/datatables.css') }}">
    <style>
        #table1 th {
            text-align: center;
        }
    </style>
    <section class="relative about-banner">
        <div class="overlay overlay-bg"></div>
        <div class="container">
            <div class="row d-flex align-items-center justify-content-center">
                <div class="about-content col-lg-12">
                    <h1 class="text-white">
                        Booking History
                    </h1>
                    <p class="text-white link-nav"><a href="index.html">Home </a> <span
                            class="lnr lnr-arrow-right"></span><a href="blog-home.html">Booking History </a></p>
                </div>
            </div>
        </div>
    </section>

    <div class="container mb-5">
        <div class="comment-form" style="border-radius: 10px">
            <h4>Transaction</h4>
            <table class="table" id="table1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Booking Date</th>
                        <th>Participants</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($booking as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->booking_date }}</td>
                            <td>{{ $item->participants }}</td>
                            <td>
                                @if ($item->status == 'pending')
                                    <button class="btn btn-warning text-white">pending</button>
                                @elseif($item->status == 'failed')
                                    <button class="btn btn-danger text-white">failed</button>
                                @elseif($item->status == 'success')
                                    <button class="btn btn-success text-white">success</button>
                                @endif
                            </td>
                            <td><a href="#" class="btn btn-primary" data-toggle="modal"
                                    data-target="#detailModal">Detail</a></td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

    <!-- Start home-about Area -->
    <section class="home-about-area">
        <div class="container-fluid">
            <div class="row align-items-center justify-content-end">
                <div class="col-lg-6 col-md-12 home-about-left">
                    <h1>
                        Did not find your Package? <br>
                        Feel free to ask us. <br>
                        We‘ll make it for you
                    </h1>
                    <p>
                        inappropriate behavior is often laughed off as “boys will be boys,” women face higher conduct
                        standards especially in the workplace. That’s why it’s crucial that, as women, our behavior on the
                        job is beyond reproach. inappropriate behavior is often laughed.
                    </p>
                    <a href="#" class="primary-btn text-uppercase">request custom price</a>
                </div>
                <div class="col-lg-6 col-md-12 home-about-right no-padding">
                    <img class="img-fluid" src="{{ asset('assets/client/img/hotels/about-img.jpg') }}" alt="">
                </div>
            </div>
        </div>
    </section>
    <!-- End home-about Area -->

    <!-- Modal -->
    <div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="detailModalTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Detail</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    ...
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/extensions/jquery/jquery.min.js') }}"></script>
    <script src="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.js"></script>
    <script src="{{ asset('assets/js/pages/datatables.js') }}"></script>
@endsection
