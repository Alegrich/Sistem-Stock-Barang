@extends('layouts.parent')

@section('title', 'Tampil Kategori')

@section('main', 'Dashboard')

@section('location')
    <div class="breadcrumb-item">Dashboard Admin > Kategori</div>
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
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h4>Tabel Kategori</h4>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                    <a href="{{ route('admin.crud-tambah-kategori') }}" class="btn btn-success bi bi-file-earmark-plus-fill"> Tambah Kategori</a>
                </div>
            </div>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Kategori</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($categories as $index => $category)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $category->name }}</td>
                        <td>
                            <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                                <a href="{{ route('admin.crud-edit-kategori', ['id_kategori' => $category->id_kategori]) }}" class="btn btn-success fa fa-edit"></a>

                                <form action="{{ route('admin.crud-delete-kategori', ['id_kategori' => $category->id_kategori]) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger fa fa-trash" onclick="return confirm('Apakah Anda yakin ingin menghapus kategori ini?')"></button>
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
