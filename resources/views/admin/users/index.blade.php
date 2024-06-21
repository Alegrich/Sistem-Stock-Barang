@extends('layouts.app')
@section('title', 'Users')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row g-4 mb-4">
                <h1>Staff List</h1>
        </div>
        <a href="#" class="btn btn-success btn-sm mb-4">Tambah Staff</a>
        <!-- Users List Table -->
        <div class="table">
                <div class="table-responsive">
                        <table class="table table-bordered">
                            <thead class="thead-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>1</td>
                                    <td>Asep Kusnadi</td>
                                    <td>asep@example.com</td>
                                    <td>
                                        <button class="btn btn-primary btn-sm">Edit</button>
                                        <button class="btn btn-danger btn-sm" id="delete-button">Delete</button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>2</td>
                                    <td>Adi Kurniansyah</td>
                                    <td>adi@example.com</td>
                                    <td>
                                        <button class="btn btn-primary btn-sm">Edit</button>
                                        <button class="btn btn-danger btn-sm" id="delete-button">Delete</button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
        </div>
        <!-- Modal Backdrop -->
    </div>
@endsection

@push('script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
        document.getElementById('delete-button').addEventListener('click', function() {
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
                    // Tambahkan logika penghapusan di sini
                }
            })
        });
    </script>
       
@endpush
