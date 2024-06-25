@extends('layouts.parent')

@section('title', 'Admin')

@section('main', 'Dashboard')

@section('location')
    <div class="breadcrumb-item">Dashboard Admin</div>
@endsection

@section('content')
    <div class="card-body">
        {{-- Hanya Tabel Data Item --}}
        <div class="table-responsive">
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..."
                        aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i
                            class="fas fa-search"></i></button>
                </div>
            </form>
        {{-- table --}}
        <div class="table-responsive">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h4>Tabel Data Barang</h4>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <a href="{{ route('admin.crud-tambah') }}" class="btn btn-success bi bi-file-earmark-plus-fill"> Tambah Data</a>
                    <a href="{{ route('admin.generate_pdf') }}" class="btn btn-primary bi bi-file-earmark-arrow-down position-relative">Unduh data</a>
                    </button>
                </div>
            </div>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Deskripsi</th>
                        <th>Kategori</th>
                        <th>SKU</th>
                        <th>Gambar</th>
                        <th>Tanggal ditambahkan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($items as $key => $item)
                        <tr>
                            <td>{{ $key + 1 }}</td>
                            <td>{{ $item->name }}</td>
                            <td>{{ $item->description }}</td>
                            <td>{{ $item->kategori->name }}</td>
                            <td>{{ $item->sku }}</td>
                            <td><img src="{{ asset('storage/' . $item->gambar) }}" alt="Gambar {{ $item->name }}" width="50"></td>
                            <td>{{ $item->created_at }}</td>
                            <td>
                                <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                    <a href="{{ route('admin.crud-edit-item', $item->id) }}" class="btn btn-success fa fa-edit"></a>
                                    <form action="{{ route('admin.hapus-item', $item->id) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-danger fa fa-trash" onclick="return confirm('Apakah Anda yakin ingin menghapus item ini?')"></button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{-- table end --}}
    </div>
@endsection
