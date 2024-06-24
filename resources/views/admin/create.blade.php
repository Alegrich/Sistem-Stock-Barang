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
                                <form action="#" method="POST" enctype="multipart/form-data" class="w-75">
                                    <label for="name">Nama Barang</label>
                                    <input type="text" class="form-control" placeholder="Masukkan Nama Barang"
                                        name="nama">
                                    <div class="form-outline" data-mdb-input-init>
                                        <label class="form-label" for="form12">Kategori</label>
                                        <input type="text" id="form12" class="form-control"
                                            placeholder="Pilih Kategori" name="kategori">
                                    </div>
                                    <div class="form-outline" data-mdb-input-init>
                                        <label class="form-label" for="form12">Supplier</label>
                                        <input type="text" id="form12" class="form-control"
                                            placeholder="Masukkan Nama Supplier" name="supplier">
                                    </div>
                                    <div class="form-outline" data-mdb-input-init>
                                        <label class="form-label" for="form12">SKU</label>
                                        <input type="text" id="form12" class="form-control"
                                            placeholder="Masukkan kode SKU" name="sku">
                                    </div>
                                    <div class="form-outline" data-mdb-input-init>
                                        <label class="form-label" for="form12">Stock Barang</label>
                                        <input type="text" id="form12" class="form-control"
                                            placeholder="Jumlah Barang" name="stock">
                                    </div>
                                    <br>
                                    <label class="form-label" for="customFile">Pilih Gambar</label>
                                    <input type="file" class="form-control" accept="gambar/*" name="gambar"
                                        id="gambar">
                                    <br>
                                    <button class="btn btn-success" type="submit">Submit</button>
                                    <a href="#" class="btn btn-primary">Kembali</a>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
