@extends('client.layouts.mainlayouts')
@section('title', 'Home')

@section('content')
    <link rel="stylesheet" href="{{ asset('assets/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pages/datatables.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/client/css/font-awesome.min.css') }}" />
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.0/dist/jquery.min.js"></script>
    <script src="https://cdn.ckeditor.com/4.21.0/standard/ckeditor.js"></script>

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
        <div class="comment-form table-responsive" style="border-radius: 10px">
            <h4>Transaction</h4>
            <table class="table" id="table1">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Booking Date</th>
                        <th>Participants</th>
                        <th>Nama Paket</th>
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
                            <td>{{ $item->packages->name }}</td>
                            <td>
                                @if ($item->status == 'pending')
                                    <button class="btn btn-warning text-white">pending</button>
                                @elseif($item->status == 'failed')
                                    <button class="btn btn-danger text-white">failed</button>
                                @elseif($item->status == 'success')
                                    <button class="btn btn-success text-white">success</button>
                                @endif
                            </td>
                            <td>
                                {{-- <a href="javascript:void(0)" class="btn btn-primary bookingDetail" id="show-detail"
                                    data-toggle="modal" data-target="#detailModal"
                                    data-url="{{ route('booking.detail', $item->id) }}">Detail</a> --}}
                                <div class="dropdown">
                                    <button class="btn btn-primary dropdown-toggle hide-caret" type="button"
                                        id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                        aria-expanded="false">
                                        <i class="bi bi-three-dots-vertical"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        @if ($item->status == 'success')
                                            <a href="javascript:void(0)" class="dropdown-item bookingDetail"
                                                id="show-detail" data-toggle="modal" data-target="#detailModal"
                                                data-url="{{ route('booking.detail', $item->id) }}">Detail</a>
                                            <a href="javascript:void(0)" class="dropdown-item bookingReview"
                                                id="show-review" data-toggle="modal" data-target="#detailModalReview"
                                                data-url="{{ route('booking.detail', $item->id) }}"
                                                data-id="{{ $item->packages_id }}">Review</a>
                                        @else
                                            <a href="javascript:void(0)" class="dropdown-item bookingDetail"
                                                id="show-detail" data-toggle="modal" data-target="#detailModal"
                                                data-url="{{ route('booking.detail', $item->id) }}">Detail</a>
                                        @endif
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

        .swal2-container {
            z-index: 9999999999 !important;
        }
    </style>

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

    <!-- Modal Detail-->
    <div class="modal fade" id="detailModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true" style="z-index: 10000">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <p><strong>Name: </strong><span id="name"></span></p>
                            <p><strong>Telp Number: </strong><span id="number"></span></p>
                            <p><strong>Booking Date: </strong><span id="booking_date"></span></p>
                            <p><strong>Participants: </strong><span id="participants"></span></p>
                            <p><strong>Total Price: </strong><span id="total_price"></span></p>
                            <p><strong>Payment Proof: </strong><img id="payment_proof" src="" alt=""
                                    class="img-fluid d-block mx-auto" style="width: 50%"></p>
                            <p><strong>Payment Method: </strong><span id="payment_method"></span></p>
                            <p><strong>Status: </strong><span id="status"></span></p>
                            <p><strong>Packages id: </strong><span id="packages_id"></span></p>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Send message</button>
                </div>
            </div>
        </div>
    </div>

    {{-- Modal Review --}}
    <div class="modal fade" id="detailModalReview" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true" style="z-index: 10000">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Review</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form method="POST">
                        @csrf
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Rating</label>
                            {{-- <input type="text" class="form-control" id="recipient-name"> --}}
                            <input type="hidden" id="rating" name="rating" value="-1">
                        </div>
                        <div class="single-testimonial"
                            style="background: rgba(0, 0, 0, 0); padding: 0; margin-top: -18px; margin-bottom: 15px">
                            <div class="rating">
                                <i class="ratings_stars fa fa-star" data-rating="1"></i>
                                <i class="ratings_stars fa fa-star" data-rating="2"></i>
                                <i class="ratings_stars fa fa-star" data-rating="3"></i>
                                <i class="ratings_stars fa fa-star" data-rating="4"></i>
                                <i class="ratings_stars fa fa-star" data-rating="5"></i>
                            </div>
                        </div>
                        <style>
                            .fa-star.selected {
                                color: #FDCC0D;
                            }

                            div.cke_inner.cke_reset.cke_maximized {
                                z-index: 999999;
                            }
                        </style>
                        <div class="form-group" style="z-index: 999999999;">
                            <label for="review" class="col-form-label">Comment</label>
                            <textarea class="form-control" id="review" name="review" required></textarea>
                            {{-- <textarea name="review"></textarea> --}}
                            {{-- <script>
                                CKEDITOR.replace('review');
                            </script> --}}
                        </div>
                        <input type="hidden" name="packages_id" id="packages_review_id">
                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary mr-2" id="submitReview">Send message</button>
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                            <div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="{{ asset('assets/extensions/jquery/jquery.min.js') }}"></script>
    <script src="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.js"></script>
    <script src="{{ asset('assets/js/pages/datatables.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $('body').on('click', '#show-detail', function() {
            var userURL = $(this).data('url');
            $.ajax({
                url: userURL,
                method: 'GET',
                success: function(data) {
                    $('#detailModal').modal('show');
                    $('#id').text(data.id);
                    $('#name').text(data.name);
                    $('#booking_date').text(data.booking_date);
                    $('#number').text(data.number);
                    $('#participants').text(data.participants);
                    $('#total_price').text(data.total_price);
                    $('#payment_proof').attr('src', "{{ asset('storage/booking/') }}" + "/" + data
                        .payment_proof);
                    $('#payment_method').text(data.payment_method);
                    $('#status').text(data.status);
                    $('#packages_id').text(data.packages_id);
                }
            });
        });
    </script>
    <script>
        $('body').on('click', '#show-review', function() {
            var userURL = $(this).data('url');
            var id = $(this).attr('data-id');
            $.ajax({
                url: userURL,
                method: 'GET',
                success: function(data) {
                    $('#detailModalReview').modal('show');
                    $('#id').text(data.id);
                    $('#packages_review_id').val(id);
                    // console.log(id);
                }
            });

            $('#submitReview').click(function(e) {
                e.preventDefault();

                //define variable
                let reviewURL = "{{ route('review.store') }}";
                let packagesId = $('#packages_review_id').val();
                let rating = $('#rating').val();
                let review = $('#review').val();
                let userId = {{ auth()->user()->id }};

                $.ajax({
                    url: reviewURL,
                    type: "POST",
                    cache: false,
                    data: {
                        "packages_id": packagesId,
                        "rating": rating,
                        "review": review,
                        "user_id": userId
                    },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(response) {
                        if (response.success) {
                            Swal.fire({
                                type: 'success',
                                icon: 'success',
                                title: response.message,
                                showConfirmButton: false,
                                timer: 3000
                            });
                        } else {
                            Swal.fire({
                                type: 'error',
                                icon: 'error',
                                title: 'Gagal menambahkan review',
                                text: response.message
                            });
                        }
                    },
                    error: function(error) {
                        $er = alert('Gagal Menambah Data')
                        console.log($er)
                    }
                })
            })
        });
    </script>
    <script>
        $(document).ready(function() {
            $('#table1').DataTable({
                responsive: {
                    details: {
                        display: $.fn.dataTable.Responsive.display.modal({
                            header: function(row) {
                                var data = row.data();
                                return 'Details';
                            }
                        }),
                        renderer: $.fn.dataTable.Responsive.renderer.tableAll({
                            tableClass: 'table'
                        })
                    }
                }
            });
        });
    </script>
    <script>
        $('.rating').on('click', '.ratings_stars', function() {
            var star = $(this)
            star.addClass('selected')
            star.prevAll().addClass('selected')
            star.nextAll().removeClass('selected')
            $('#rating').val(star.data('rating'))
        });
    </script>

@endsection
