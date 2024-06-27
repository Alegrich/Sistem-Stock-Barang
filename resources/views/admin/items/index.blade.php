@extends('layouts.parent')

@section('title', 'Admin')

@section('main', 'List Items')

@section('location')
    <div class="breadcrumb-item">
    </div>
@endsection

@section('content')
@if (Auth::check() && Auth::user()->role =='admin')
<div class="card-body ">
    {{-- card --}}
    <a href="{{ route('items.create') }}" class="btn btn-success btn-sm mb-4">Tambah Items</a>
    <a href="#" class="btn btn-danger btn-sm mb-4">Cetak Laporan</a>
    <!-- Items List Table -->
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
                    @foreach($items as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->category->name }}</td>
                        <td><strong>{{ $item->sku }}</strong></td>
                        <td>
                            @if($item->image)
                            <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}" width="50">
                            @else
                            <strong>KOSONG</strong>
                            @endif
                        </td>
                        <td><strong>{{ $item->quantity }}</strong></td>
                        <td>
                            <a href="{{ route('items.edit', $item->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{ route('items.destroy', $item->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
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
@else
<div class="card-body ">
    {{-- card --}}
    <a href="#" class="btn btn-danger btn-sm mb-4">Cetak Laporan</a>
    <!-- Items List Table -->
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
                    @foreach($items as $index => $item)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->category->name }}</td>
                        <td><strong>{{ $item->sku }}</strong></td>
                        <td>
                            @if($item->image)
                            <img src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}" width="50">
                            @else
                            <strong>KOSONG</strong>
                            @endif
                        </td>
                        <td><strong>{{ $item->quantity }}</strong></td>
                    </tr>
                    @endforeach
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
                    $('#delete-form-' + itemId).submit();
                }
            });
        });
    });
</script>
@endpush
