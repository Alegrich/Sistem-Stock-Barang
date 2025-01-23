@extends('layouts.parent')
@section('title', 'Users')
@section('content')
    <div class="container-xxl flex-grow-1 container-p-y">
        <div class="row g-4 mb-4">
        </div>
        <!-- Users List Table -->
        <div class="container mt-5">
                <!-- Form -->
                <form action="{{ route('admin.items.update', $item->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT') <!-- Method spoofing PUT untuk update -->
                    <div class="form-group mb-3">
                        <label for="name">Nama</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan Nama" value="{{ old('name', $item->name) }}" required>
                    </div>
                
                    <div class="form-group mb-3">
                        <label for="description">Deskripsi</label>
                        <input type="text" class="form-control" id="description" name="description" placeholder="Masukkan Deskripsi" value="{{ old('description', $item->description) }}">
                    </div>
                
                    <div class="form-group mb-3">
                        <label for="qty">Jumlah Items</label>
                        <input type="number" class="form-control" id="qty" name="qty" placeholder="Masukkan jumlah Items" value="{{ old('qty', $item->qty) }}">
                    </div>
                    
                
                    <div class="form-group mb-3">
                        <label for="image">Gambar Items</label>
                        <input type="file" class="form-control" id="image" name="image">
                        @if($item->image)
                            <p class="mt-5">Current Image: <img src="{{ asset('storage/' . $item->image) }}" alt="Current Image" width="100" height="100"></p>
                        @endif
                    </div>
                
                    <div class="form-group mb-3">
                        <label for="category">Kategori</label>
                        <select class="form-control" id="category" name="id_categories" required>
                            <option value="">Pilih Kategori</option>
                            @foreach($category as $categories)
                                <option value="{{ $categories->id }}" {{ old('id_categories', $item->id_categories) == $categories->id ? 'selected' : '' }}>
                                    {{ $categories->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
                
            </div>
        <!-- Modal Backdrop -->
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
