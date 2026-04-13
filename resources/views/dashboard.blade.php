@extends('layouts.app')

@section('content')
<h2>Dashboard</h2>
<p>Welcome, {{ Auth::user()->name }}! Use the navigation above to manage your inventory.</p>

<div class="row mt-3">
    <div class="col-md-4">
        <div class="card text-center">
            <div class="card-body">
                <h5 class="card-title">Products</h5>
                <a href="{{ route('products.index') }}" class="btn btn-primary">View Products</a>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card text-center">
            <div class="card-body">
                <h5 class="card-title">Suppliers</h5>
                <a href="{{ route('suppliers.index') }}" class="btn btn-primary">View Suppliers</a>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card text-center">
            <div class="card-body">
                <h5 class="card-title">Stock</h5>
                <a href="{{ route('stocks.index') }}" class="btn btn-primary">View Stock</a>
            </div>
        </div>
    </div>
</div>
@endsection