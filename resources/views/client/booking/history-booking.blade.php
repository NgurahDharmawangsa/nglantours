@extends('client.layouts.mainlayouts')
@section('title', 'Home')

@section('content')
    <link rel="stylesheet" href="{{ asset('assets/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/pages/datatables.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.7.0/dist/jquery.min.js"></script>
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
                            <td><a href="javascript:void(0)" class="btn btn-primary bookingDetail" id="show-detail"
                                    data-toggle="modal" data-target="#detailModal"
                                    data-url="{{ route('booking.detail', $item->id) }}">Detail</a>
                            </td>
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

    <script src="{{ asset('assets/extensions/jquery/jquery.min.js') }}"></script>
    <script src="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.js"></script>
    <script src="{{ asset('assets/js/pages/datatables.js') }}"></script>
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
                }
            });
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
    

@endsection
