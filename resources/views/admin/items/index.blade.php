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
            <a href="{{ route('admin.items.create') }}" class="btn btn-success btn-sm mb-4">Tambah Items</a>
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
                            @foreach ($items as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $item->name }}</td>
                                    <td>{{ $item->category->name ?? 'Tidak ada kategori' }}</td>
                                    <td><strong>{{ $item->SKU }}</strong></td>
                                    <td><strong>
                                            @if ($item->image)
                                                <img class="mt-4" src="{{ asset('storage/' . $item->image) }}" alt="{{ $item->name }}"
                                                    width="90" height="90">
                                            @else
                                                <strong>KOSONG</strong>
                                            @endif
                                        </strong></td>
                                    <td><strong>{{ $item->qty ?? 'Tidak Ada Stok' }}</strong></td>
                                    <td>
                                        <a href="{{route('admin.items.edit', $item->id)}}"  class="btn btn-primary btn-sm">Edit</a>
                                        <form action="{{ route('admin.items.destroy', $item->id) }}" method="POST" style="display:inline;" id="delete-form-{{ $item->id }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-danger btn-sm" onclick="confirmDelete({{ $item->id }})">Delete</button>
                                        </form>
                                    </td>
                                    
                                    
                                </tr>
                            @endforeach
                            <!-- Tambahkan baris lainnya sesuai kebutuhan -->
                        </tbody>
                    </table>
                </div>
            </div>
            {{-- card end --}}
        </div>
    @else
    @endif
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
