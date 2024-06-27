@extends('layouts.parent')

@section('title', 'Admin')

@section('main', 'List Supplier')

@section('location')
    <div class="breadcrumb-item">
    </div>
@endsection

@section('content')
<div class="card-body">
    <a href="{{ route('supplier.create') }}" class="btn btn-success btn-sm mb-4">Tambah Supplier</a>
    <div class="table">
        <div class="table-responsive">
            <table class="table table-bordered">
                <thead class="thead-dark">
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>Contact</th>
                        <th>Address</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($suppliers as $supplier)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $supplier->name }}</td>
                        <td>{{ $supplier->contact }}</td>
                        <td>{{ $supplier->address }}</td>
                        <td>
                            <a href="{{ route('supplier.edit', $supplier->id) }}" class="btn btn-primary btn-sm">Edit</a>
                            <form action="{{ route('supplier.destroy', $supplier->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
