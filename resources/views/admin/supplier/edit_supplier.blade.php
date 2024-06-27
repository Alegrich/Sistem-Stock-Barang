@extends('layouts.parent')

@section('title', 'Admin')

@section('main', 'Edit Supplier')

@section('location')
    <div class="breadcrumb-item">
    </div>
@endsection

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <!-- Form -->
    <form action="{{ route('supplier.update', $supplier->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="form-group mb-3">
            <label for="name">Nama</label>
            <input type="text" name="name" class="form-control" id="name" value="{{ $supplier->name }}" placeholder="Masukkan Nama" required>
        </div>
        <div class="form-group mb-3">
            <label for="contact">Contact</label>
            <input type="text" name="contact" class="form-control" id="contact" value="{{ $supplier->contact }}" placeholder="Masukkan Nomor Kontak" required>
        </div>
        <div class="form-group mb-3">
            <label for="address">Alamat</label>
            <input type="text" name="address" class="form-control" id="address" value="{{ $supplier->address }}" placeholder="Masukkan Alamat Supplier" required>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
