@extends('layouts.parent')

@section('title', 'Admin')

@section('main', 'Edit Items')

@section('location')
    <div class="breadcrumb-item">
    </div>
@endsection

@section('content')
<div class="container-xxl flex-grow-1 container-p-y">
    <div class="row g-4 mb-4">
    </div>
    <!-- Form -->
    <form action="{{ route('items.update', $item->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="form-group mb-3">
            <label for="name">Nama</label>
            <input type="text" name="name" class="form-control" id="name" value="{{ $item->name }}" placeholder="Masukkan Nama" required>
        </div>
        <div class="form-group mb-3">
            <label for="description">Deskripsi</label>
            <input type="text" name="description" class="form-control" id="description" value="{{ $item->description }}" placeholder="Masukkan Deskripsi">
        </div>
        <div class="form-group mb-3">
            <label for="image">Gambar Items</label>
            <input type="file" name="image" class="form-control" id="image">
            @if ($item->image)
                <img src="{{ asset('storage/' . $item->image) }}" alt="Gambar Item" width="100">
            @endif
        </div>
        <div class="form-group mb-3">
            <label for="id_categories">Kategori</label>
            <select name="id_categories" class="form-control" id="id_categories" required>
                <option value="">Pilih Kategori</option>
                <!-- Tambahkan opsi kategori dari database -->
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>
@endsection
