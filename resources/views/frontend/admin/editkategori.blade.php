@extends('layouts.parent')

@section('title', 'Edit Kategori')

@section('main', 'Dashboard')

@section('location')
    <div class="breadcrumb-item">Dashboard Admin > Edit Kategori</div>
@endsection

@section('content')
    <div class="card-body">
        <form action="{{ route('admin.crud-edit-kategori', ['id_kategori' =>  $category->id_kategori]) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="mb-3">
                <label for="name" class="form-label">Nama Kategori</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $category->name }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Kategori</button>
        </form>
    </div>
@endsection
