@extends('layouts.parent')

@section('title', 'Admin')

@section('main', 'Dashboard')

@section('location')
    <div class="breadcrumb-item">Dashboard Admin
    </div>
@endsection

@section('content')
    <div class="card-body">
        {{-- card --}}
        <div class="row">
            <div class="col-xl-3 col-md-6">
                <div class="card bg-primary text-white mb-4">
                    <div class="card-body">Supplier</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">View Detail</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-warning text-white mb-4">
                    <div class="card-body">Item</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-success text-white mb-4">
                    <div class="card-body">Category</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
            <div class="col-xl-3 col-md-6">
                <div class="card bg-danger text-white mb-4">
                    <div class="card-body">Staff</div>
                    <div class="card-footer d-flex align-items-center justify-content-between">
                        <a class="small text-white stretched-link" href="#">View Details</a>
                        <div class="small text-white"><i class="fas fa-angle-right"></i></div>
                    </div>
                </div>
            </div>
        </div>
        {{-- card end --}}

        {{-- table --}}
        <div class="table-responsive">
            <form class="d-none d-md-inline-block form-inline ms-auto me-0 me-md-3 my-2 my-md-0">
                <div class="input-group">
                    <input class="form-control" type="text" placeholder="Search for..." aria-label="Search for..."
                        aria-describedby="btnNavbarSearch" />
                    <button class="btn btn-primary" id="btnNavbarSearch" type="button"><i
                            class="fas fa-search"></i></button>
                </div>
            </form>

            <div
                class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h4>Tabel Data Barang</h4>
                <div class="d-grid gap-2 d-md-flex justify-content-md-end">

                    <form form action="#" method="POST">
                        <input type="hidden" value="#" name="id">
                        <a href="/admin/crud-tambah" class="btn btn-success bi bi-file-earmark-plus-fill"> Tambah Data</a>
                        <button type="button" class="btn btn-primary  bi bi-file-earmark-arrow-down position-relative">
                            Unduh
                            data</button>
                    </form>
                </div>
            </div>
            <table class="table table-hover">
                <tr>
                    <th>#</th>
                    <th>Nama</th>
                    <th>Kategori</th>
                    <th>Supplier</th>
                    <th>Stock Barang</th>
                    <th>Tanggal ditambahkan</th>
                    <th>Aksi</th>
                </tr>

                <tr>
                    <td>1</td>
                    <td>Jeruk</td>
                    <td>Buah</td>
                    <td>PT. Indofresh</td>
                    <td>500 Kg</td>
                    <td>00-00-0000</td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                            <a href="/admin/crud-edit" class="btn btn-success fa fa-edit"></a>
                            <form action="" method="POST">
                                <input type="hidden" value="#" name="id">
                                <button class="btn btn-danger fa fa-trash"></button>
                            </form>
                        </div>
                    </td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Kangkung</td>
                    <td>Sayur</td>
                    <td>PT. Sayurmayur</td>
                    <td>500 Kg</td>
                    <td>00-00-0000</td>
                    <td>
                        <div class="btn-group" role="group" aria-label="Basic mixed styles example">
                            <a href="#" class="btn btn-success fa fa-edit"></a>
                            <form action="" method="GET">
                                <input type="hidden" value="#" name="id">
                                <button class="btn btn-danger fa fa-trash"></button>
                            </form>
                        </div>
                    </td>
                </tr>
            </table>
        </div>
        {{-- table end --}}
    </div>

@endsection
