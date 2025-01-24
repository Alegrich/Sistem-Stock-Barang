@extends('layouts.parent')

@section('title', 'Admin')

@section('main', 'Stock')

@section('location')
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
                            <th scope="col">ID</th>
                            <th scope="col">ITEM</th>
                            <th scope="col">TYPE</th>
                            <th scope="col">QUANTITY</th>
                            <th scope="col">RECEIVED AT</th>
                          </tr>
                        </thead>
                        <tbody>
                            @foreach ($logs as $index => $log)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $log->item->name }}</td>
                                <td>{{ ucfirst($log->type) }}</td>
                                <td>{{ $log->quantity }}</td>
                                <td>{{ $log->created_at }}</td>
                            </tr>
                        @endforeach
                        </tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
