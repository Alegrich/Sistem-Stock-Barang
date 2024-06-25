@extends('layouts.parent')

@section('title', 'Admin')

@section('main', 'Edit stock out')

@section('location')
    <div class="breadcrumb-item"><a href="{{ route('stockout') }}">stock out</a></div>
    <div class="breadcrumb-item">Edit stock out</div>
@endsection

@section('content')
<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="card border-0 shadow rounded">
                <div class="card-body">
                    <form action="{{ route('edit_stockout', $Stockout->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label for="id_items">Item:</label>
                            <select name="id_items" id="id_items" class="form-control">
                                @foreach($items as $item)
                                    <option value="{{ $item->id }}" @if($item->id == $Stockout->id_items) selected @endif>{{ $item->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="id_supplier">Supplier:</label>
                            <select name="id_supplier" id="id_supplier" class="form-control">
                                @foreach($suppliers as $supplier)
                                    <option value="{{ $supplier->id }}" @if($supplier->id == $Stockout->id_supplier) selected @endif>{{ $supplier->nama_supplier }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="quantity">Quantity:</label>
                            <input type="number" name="quantity" id="quantity" class="form-control" value="{{ $Stockout->quantity }}" required>
                        </div>
                        <div class="form-group">
                            <label for="received_at">Received At:</label>
                            <input type="datetime-local" name="received_at" id="received_at" class="form-control" value="{{ date('Y-m-d\TH:i', strtotime($Stockout->received_at)) }}" required>
                        </div>
                        <button type="submit" class="btn btn-md btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
