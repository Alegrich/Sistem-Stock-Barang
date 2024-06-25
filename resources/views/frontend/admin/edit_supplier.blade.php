@extends('layouts.parent')

@section('title', 'Edit Supplier')

@section('main', 'Dashboard')

@section('location')
    <div class="breadcrumb-item">Dashboard Admin > Edit Supplier</div>
@endsection

@section('content')
    <div class="card-body">
        <form action="{{ route('admin.edit_supplier', $supplier->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="nama_supplier" class="form-label">Nama Supplier</label>
                <input type="text" class="form-control" id="nama_supplier" name="nama_supplier" value="{{ $supplier->nama_supplier }}" required>
            </div>
            <div class="mb-3">
                <label for="kontak" class="form-label">Kontak</label>
                <input type="text" class="form-control" id="kontak" name="kontak" value="{{ $supplier->kontak }}" required>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat</label>
                <textarea class="form-control" id="alamat" name="alamat" rows="3" required>{{ $supplier->alamat }}</textarea>
            </div>
            <button type="submit" class="btn btn-primary">Update Supplier</button>
        </form>
    </div>
@endsection
