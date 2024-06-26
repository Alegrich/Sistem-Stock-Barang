@extends('layouts.parent')

@section('title', 'Admin')

@section('main', 'List Items')

@section('location')
    <div class="breadcrumb-item">
    </div>
@endsection

@section('content')
@if (Auth::check() && Auth::user()->role == 'admin')
<div class="card-body ">
    {{-- card --}}
    <a href="{{route('items.create')}}" class="btn btn-success btn-sm mb-4">Tambah Items</a>
    <a href="#" class="btn btn-danger btn-sm mb-4">Cetak Laporan</a>
    <!-- Users List Table -->
    <div class="table">
            <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Kategori</th>
                                <th>SKU</th>
                                <th>Foto Items</th>
                                <th>Jumlah</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Item 1</td>
                                <td>Kategori 1</td>
                                <td><strong>FD-100-SQ</strong></td>
                                <td><strong>KOSONG</strong></td>
                                <td><strong>25</strong></td>
                                <td>
                                    <button class="btn btn-primary btn-sm">Edit</button>
                                    <button class="btn btn-danger btn-sm" id="delete-button">Delete</button>
                                </td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Item 2</td>
                                <td>Kategori 2</td>
                                <td><strong>FD-100-SQ</strong></td>
                                <td><strong>KOSONG</strong></td>
                                <td><strong>25</strong></td>
                                <td>
                                    <button class="btn btn-primary btn-sm">Edit</button>
                                    <button class="btn btn-danger btn-sm" id="delete-button">Delete</button>
                                </td>
                            </tr>
                            <!-- Tambahkan baris lainnya sesuai kebutuhan -->
                        </tbody>
                    </table>
                </div>
    </div>
    {{-- card end --}}
</div>
@else
<div class="card-body ">
    {{-- card --}}
    <a href="#" class="btn btn-danger btn-sm mb-4">Cetak Laporan</a>
    <!-- Users List Table -->
    <div class="table">
            <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Kategori</th>
                                <th>SKU</th>
                                <th>Foto Items</th>
                                <th>Jumlah</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Item 1</td>
                                <td>Kategori 1</td>
                                <td><strong>FD-100-SQ</strong></td>
                                <td><strong>KOSONG</strong></td>
                                <td><strong>25</strong></td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>Item 2</td>
                                <td>Kategori 2</td>
                                <td><strong>FD-100-SQ</strong></td>
                                <td><strong>KOSONG</strong></td>
                                <td><strong>25</strong></td>
                            </tr>
                            <!-- Tambahkan baris lainnya sesuai kebutuhan -->
                        </tbody>
                    </table>
                </div>
    </div>
    {{-- card end --}}
</div>
@endif
@endsection
@push('script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script>
        $(document).ready(function() {
            $('.datatables-users').DataTable({
                responsive: {
                    details: {
                        type: 'column',
                        target: 'td.control'
                    }
                },
                columnDefs: [{
                    className: 'control',
                    orderable: false,
                    targets: 0
                }],
                pagingType: "full_numbers",
                language: {
                    search: "",
                    searchPlaceholder: "Search..."
                }
            });

            $('.edit-record').on('click', function() {
                let userId = $(this).data('id');
                let userName = $(this).data('name');
                let userEmail = $(this).data('email');
                let userRole = $(this).data('role');
                let userBilling = $(this).data('billing');
                let userStatus = $(this).data('status');

                $('#editName').val(userName);
                $('#editEmail').val(userEmail);
                $('#editRole').val(userRole);
                $('#editBilling').val(userBilling);
                $('#editStatus').val(userStatus);
            });

            $('.delete-record').on('click', function() {
                let userId = $(this).data('id');
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        Swal.fire(
                            'Deleted!',
                            'Your file has been deleted.',
                            'success'
                        )
                        // Call delete API or function here
                    }
                })
            });
        });
    </script>

@endpush


