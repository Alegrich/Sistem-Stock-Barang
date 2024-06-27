@extends('layouts.parent')

@section('title', 'Admin')

@section('main', 'Tambah Items')

@section('location')
    <div class="breadcrumb-item">
    </div>
@endsection

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row g-4 mb-4">

    </div>
    <!-- Form -->
    <form action="{{ route('items.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group mb-3">
            <label for="name">Nama</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan Nama">
        </div>
        <div class="form-group mb-3">
            <label for="description">Deskripsi</label>
            <textarea class="form-control" id="description" name="description" placeholder="Masukkan Deskripsi"></textarea>
        </div>
        <div class="form-group mb-3">
            <label for="image">Gambar Items</label>
            <input type="file" class="form-control" id="image" name="image">
        </div>
        <div class="form-group mb-3">
            <label for="category">Kategori</label>
            <select class="form-control" id="category" name="id_categories">
                <option value="">Pilih Kategori</option>
                @if($categories && $categories->count() > 0)
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endforeach
                @endif
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
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
