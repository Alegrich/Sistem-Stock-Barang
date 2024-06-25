@extends('layouts.parent')

@section('title', 'Staff')

@section('main', 'Dashboard')

@section('location')
    <div class="breadcrumb-item">Dashboard</div>
@endsection

@section('content')
    <div class="row">
        <div class="col-lg-4 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-primary">
                    <i class="far fa-user"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Supplier</h4>
                    </div>
                    <div class="card-body">
                        {{ $totalSuppliers }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-success">
                    <i class="fas fa-cube"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Item</h4>
                    </div>
                    <div class="card-body">
                        {{ $totalItems }}
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-4 col-12">
            <div class="card card-statistic-1">
                <div class="card-icon bg-warning">
                    <i class="fas fa-thumbtack"></i>
                </div>
                <div class="card-wrap">
                    <div class="card-header">
                        <h4>Total Category</h4>
                    </div>
                    <div class="card-body">
                        {{ $totalCategories }}
                    </div>
                </div>
            </div>
        </div>

    </div>

@endsection
