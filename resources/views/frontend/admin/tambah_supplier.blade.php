@extends('layouts.parent')

@section('title', 'Tambah Supplier')

@section('main', 'Dashboard')

@section('location')
    <div class="breadcrumb-item">Dashboard Admin > Tambah Supplier</div>
@endsection

@section('content')
    <div class="card-body">
        <form action="{{ route('admin.tambah_supplier') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="nama_supplier" class="form-label">Nama Supplier</label>
                <input type="text" class="form-control" id="nama_supplier" name="nama_supplier" required>
            </div>
            <div class="mb-3">
                <label for="kontak" class="form-label">Kontak</label>
                <input type="text" class="form-control" id="kontak" name="kontak" required>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea class="form-control" id="alamat" name="alamat" rows="3" required></textarea>
            </div>
            <button type="submit" class="btn btn-success">Tambah Supplier</button>
        </form>
    </div>
@endsection
