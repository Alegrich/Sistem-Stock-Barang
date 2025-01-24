@extends('layouts.parent')

@section('title', 'Admin')

@section('main', 'List Kategori')

@section('location')
    <div class="breadcrumb-item">
    </div>
@endsection

@section('content')
    <div class="card-body">
        {{-- card --}}
        <a href="{{route('admin.category.create')}}" class="btn btn-success btn-sm mb-4">Tambah Kategori</a>
        <!-- Users List Table -->
        <div class="table">
            <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="thead-dark">
                            <tr>
                                <th>No</th>
                                <th>Nama</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($category as $index => $categories)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{$categories->name}}</td>
                                    <td>
                                        <a href="{{route('admin.category.edit', $categories->id)}}"  class="btn btn-primary btn-sm">Edit</a>
                                        <form action="{{ route('admin.category.destroy', $categories->id) }}" method="POST" style="display:inline;" id="delete-form-{{ $categories->id }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete({{ $categories->id }})">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
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
    function confirmDelete(itemId) {
        Swal.fire({
            title: 'Kamu Yakin?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Iya, Hapus saja!'
        }).then((result) => {
            if (result.isConfirmed) {
                // Jika pengguna mengonfirmasi, kirimkan form untuk menghapus item
                document.getElementById('delete-form-' + itemId).submit();
                Swal.fire(
                    'Terhapus!',
                    'Item telah sukses terhapus.',
                    'sukses'
                );
            }
        });
    }
</script>

@endpush


