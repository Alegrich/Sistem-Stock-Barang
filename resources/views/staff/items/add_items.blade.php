@extends('layouts.app')

@section('title', 'Users')

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row g-4 mb-4"></div>
    <!-- Users List Table -->
    <div class="container mt-5">
        <!-- Form -->
        <form action="{{ route('staff.items.add') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="form-group mb-3">
                <label for="name">Nama</label>
                <input type="text" class="form-control" id="name" name="name" placeholder="Masukkan Nama">
            </div>
            <div class="form-group mb-3">
                <label for="description">Deskripsi</label>
                <input type="text" class="form-control" id="description" name="description" placeholder="Masukkan Deskripsi">
            </div>
            <div class="form-group mb-3">
                <label for="image">Gambar Items</label>
                <input type="file" class="form-control" id="image" name="image">
            </div>
            <div class="form-group mb-3">
                <label for="category">Kategori</label>
                <select class="form-control" id="category" name="id_categories">
                    <option value="">Pilih Kategori</option>
                    <option value="kategori1">Kategori 1</option>
                    <option value="kategori2">Kategori 2</option>
                    <option value="kategori3">Kategori 3</option>
                    <!-- Tambahkan opsi lainnya sesuai kebutuhan -->
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <!-- Modal Backdrop -->
</div>
@endsection

@push('script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script>
    $(document).ready(function() {
        $('.delete-record').on('click', function() {
            let itemId = $(this).data('id');
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
