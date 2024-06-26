@extends('layouts.parent')

@section('title', 'Admin')

@section('main', 'List Supplier')

@section('location')
    <div class="breadcrumb-item">
    </div>
@endsection

@section('content')
    <div class="card-body">
        {{-- card --}}
        <a href="{{route('supplier.create')}}" class="btn btn-success btn-sm mb-4">Tambah Supplier</a>
        <!-- Users List Table -->
        <div class="table">
            <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Contact</th>
                                <th>Address</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>1</td>
                                <td>Asep Kusnadi</td>
                                <td>(021) 8853333</td>
                                <td>Jalan Jendral A. Yani</td>
                                <td>
                                    <button class="btn btn-primary btn-sm" onclick="window.location.href='{{ route('supplier.edit', ['supplier' => 1]) }}'">Edit</button>
                                    <button class="btn btn-danger btn-sm" id="delete-button">Delete</button>
                                </td>
                            </tr>
                            <tr>
                                    <td>2</td>
                                    <td>Asep Kusnadi</td>
                                    <td>(021) 8853333</td>
                                    <td>Jalan Jendral A. Yani</td>
                                    <td>
                                        <button class="btn btn-primary btn-sm">Edit</button>
                                        <button class="btn btn-danger btn-sm" id="delete-button">Delete</button>
                                    </td>
                                </tr>
                        </tbody>
                    </table>
                </div>
    </div>
        {{-- card end --}}
    </div>

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


