@extends('layouts.parent')

@section('title', 'Tambah Kategori')

@section('main', 'Dashboard')

@section('location')
    <div class="breadcrumb-item">Dashboard Admin > Tambah Kategori</div>
@endsection

@section('content')
    <div class="card-body">
        <form action="{{ route('admin.crud-tambah-kategori') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Nama Kategori</label>
                <input type="text" class="form-control" id="name" name="name" required>
            </div>
            <button type="submit" class="btn btn-success">Tambah Kategori</button>
        </form>
    </div>
@endsection
