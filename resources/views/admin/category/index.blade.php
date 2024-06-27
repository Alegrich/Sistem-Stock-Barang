@extends('layouts.parent')

@section('title', 'Admin')

@section('main', 'List Kategori')

@section('location')
    <div class="breadcrumb-item">
    </div>
@endsection

@section('content')
    <div class="card-body">
        <a href="{{route('category.create')}}" class="btn btn-success btn-sm mb-4">Tambah Kategori</a>
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
                        @foreach ($categories as $category)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $category->name }}</td>
                            <td>
                                <a href="{{ route('category.edit', ['category' => $category->id]) }}" class="btn btn-primary btn-sm">Edit</a>
                                <form action="{{ route('category.destroy', ['category' => $category->id]) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
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
