@extends('layouts.parent')

@section('title', 'Admin')

@section('main', 'Manajemen Staff')

@section('location')
    <div class="breadcrumb-item">Manajemen Staff</div>
@endsection

@section('content')
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-12">
                <div class="card border-0 shadow rounded">
                    <div class="card-body">
                        {{-- <a href="{{ route('blog.create') }}" class="btn btn-md btn-success mb-3">TAMBAH BLOG</a> --}}
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th scope="col">GAMBAR</th>
                                    <th scope="col">NAMA</th>
                                    <th scope="col">JABATAN</th>
                                    <th scope="col">AKSI</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td>Mark</td>
                                    <td>Otto</td>
                                    <td>@mdo</td>
                                </tr>
                                <tr>
                                    <th scope="row">2</th>
                                    <td>Jacob</td>
                                    <td>Thornton</td>
                                    <td>@fat</td>
                                </tr>
                                <tr>
                                    <th scope="row">3</th>
                                    <td>Larry</td>
                                    <td>the Bird</td>
                                    <td>@twitter</td>
                                </tr>
                            </tbody>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
