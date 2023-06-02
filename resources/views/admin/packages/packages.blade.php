@extends('admin.layouts.mainlayouts')
@extends('admin.layouts.navbar')
@section('title', 'Packages')

@php
    use Carbon\Carbon;
@endphp

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Packages</h3>
                    <p class="text-subtitle text-muted">Discover amazing travel destinations with packages.</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">DataTable Jquery</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        @if (Session::has('status'))
            <script>
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: '{{ Session::get('message') }}',
                    showConfirmButton: false,
                    timer: 3000 // Durasi tampilan SweetAlert dalam milidetik (misalnya 3000 untuk 3 detik)
                });
            </script>
        @endif

        <!-- Basic Tables start -->
        <section class="section">
            <div class="card">
                <div class="card-header">
                    <a href="{{ route('packages.create') }}" class="btn btn-primary">Add Data</a>
                </div>
                <div class="card-body">
                    <table class="table" id="table1">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Durasi</th>
                                <th>Price</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($packages as $data)
                                @php
                                    $startDate = Carbon::parse($data->start_date);
                                    $endDate = Carbon::parse($data->end_date);
                                    $diffInDays = $startDate->diffInDays($endDate);
                                @endphp
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $data->name }}</td>
                                    <td>{{ $diffInDays }} Hari</td>
                                    <td>{{ $data->price }}</td>
                                    <td>
                                        <div class="dropdown">
                                            <button class="btn btn-primary dropdown-toggle hide-caret" type="button"
                                                id="actionDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="bi bi-three-dots-vertical"></i>
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButtonEmoji">
                                                <a class="dropdown-item text-white"
                                                    href="{{ route('packages.show', $data->id) }}"><span
                                                        class="dropdown-item-emoji bi bi-archive-fill text-success me-2"></span>
                                                    Detail</a>
                                                <a class="dropdown-item text-white"
                                                    href="{{ route('packages.edit', $data->id) }}"><span
                                                        class="dropdown-item-emoji bi bi-pencil-fill text-primary me-2"></span>
                                                    Edit</a>
                                                <form action="{{ route('packages.destroy', $data->id) }}" method="POST"
                                                    style="display: inline;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="dropdown-item text-white btn-delete-post">
                                                        <span
                                                            class="dropdown-item-emoji bi bi-trash-fill text-danger me-2"></span>
                                                        Hapus
                                                    </button>
                                                </form>
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

            <script>
                $(document).ready(function() {
                    // Event handler untuk tombol delete
                    $('.btn-delete-post').click(function(e) {
                        e.preventDefault(); // Mencegah aksi default (submit form)

                        // Konfirmasi penghapusan menggunakan SweetAlert
                        Swal.fire({
                            title: 'Apakah Anda yakin ingin menghapus data ini?',
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonText: 'Ya, Hapus',
                            cancelButtonText: 'Batal',
                            cancelButtonColor: '#d33',
                        }).then((result) => {
                            if (result.isConfirmed) {
                                var form = $(this).closest('form'); // Temukan form terdekat
                                var dataContainer = $(this).closest(
                                    'tr'); // Temukan baris tabel yang berisi data
                                var dataTable = $('#table1').DataTable(); // Inisialisasi objek DataTable

                                $.ajax({
                                    url: form.attr('action'), // Ambil URL aksi form
                                    type: 'POST',
                                    data: form.serialize(), // Serialize form data
                                    success: function(response) {
                                        // Tindakan setelah penghapusan berhasil
                                        // Misalnya, perbarui tampilan data atau tampilkan pesan sukses
                                        dataTable.row(dataContainer).remove()
                                            .draw(); // Hapus baris tabel dari tampilan dan perbarui tabel DataTable
                                        Swal.fire('Sukses', 'Data berhasil dihapus.',
                                            'success');
                                    },
                                    error: function(xhr) {
                                        // Tindakan jika terjadi kesalahan saat penghapusan
                                        // Misalnya, tampilkan pesan kesalahan
                                        Swal.fire('Error',
                                            'Terjadi kesalahan saat menghapus data.',
                                            'error');
                                    }
                                });
                            }
                        });
                    });
                });
            </script>
        </section>
        <!-- Basic Tables end -->
    @endsection
