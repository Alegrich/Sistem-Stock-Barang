@extends('layouts.parent')

@section('title', 'Admin')

@section('main', 'Dashboard')

@section('location')
    <div class="breadcrumb-item"><a href="/admin">Dashboard Admin</a></div>
    <div class="breadcrumb-item">Tambah Data Barang</div>
@endsection

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="container py-5">
                    <div class="d-flex align-items-center justify-content-center flex-column">
                        <h1>Tambah Data</h1>
                        <div class="row w-100 mt-5">
                            <div class="col-12 col-md-8 col-lg-6 mx-auto d-flex flex-column align-items-center">
                                <form action="{{ route('admin.crud-tambah') }}" method="POST" enctype="multipart/form-data" class="w-75">
                                    @csrf
                                    <label for="name">Nama Barang</label>
                                    <input type="text" class="form-control" placeholder="Masukkan Nama Barang" name="nama" required>
                                    <label for="deskripsi">Deskripsi</label> <!-- Tambahkan label untuk deskripsi -->
                                    <textarea class="form-control" placeholder="Masukkan Deskripsi Barang" name="description" required></textarea> <!-- Tambahkan input untuk deskripsi -->
                                    <div class="form-outline" data-mdb-input-init>
                                        <label class="form-label" for="id_kategori">Kategori</label>
                                        <select class="form-control" name="id_kategori" required>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id_kategori }}">{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-outline" data-mdb-input-init>
                                        <label class="form-label" for="sku">SKU</label>
                                        <input type="text" id="sku" class="form-control" placeholder="Masukkan kode SKU" name="sku" required>
                                    </div>
                                    <br>
                                    <label class="form-label" for="customFile">Pilih Gambar</label>
                                    <input type="file" class="form-control" accept="image/*" name="gambar" id="gambar" required>
                                    <br>
                                    <button class="btn btn-success" type="submit">Submit</button>
                                    <a href="{{ route('tampil_item') }}" class="btn btn-primary">Kembali</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
