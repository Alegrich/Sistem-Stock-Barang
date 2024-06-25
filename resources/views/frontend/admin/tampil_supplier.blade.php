@extends('layouts.parent')

@section('title', 'Tampil Supplier')

@section('main', 'Dashboard')

@section('location')
    <div class="breadcrumb-item">Dashboard Admin > Tampil Supplier</div>
@endsection

@section('content')
    <div class="card-body">
        @if(session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif
        {{-- table --}}
        <div class="table-responsive">
            <div
                class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h4>Tabel Supplier</h4>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <a href="{{ route('admin.tambah_supplier') }}" class="btn btn-success bi bi-file-earmark-plus-fill"> Tambah Supplier</a>
                </div>
            </div>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Supplier</th>
                        <th>Kontak</th>
                        <th>Alamat</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($suppliers as $index => $supplier)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $supplier->nama_supplier }}</td>
                        <td>{{ $supplier->kontak }}</td>
                        <td>{{ $supplier->alamat }}</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                <a href="{{ route('admin.edit_supplier', $supplier->id) }}" class="btn btn-primary fa fa-edit"></a>
                                <form action="{{ route('admin.hapus_supplier', $supplier->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger fa fa-trash"></button>
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
