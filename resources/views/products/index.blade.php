@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Products</h2>
    <a href="{{ route('products.create') }}" class="btn btn-success">Add Product</a>
</div>

<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Description</th>
            <th>Price</th>
            <th>Quantity</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse($products as $product)
        <tr>
            <td>{{ $product->id }}</td>
            <td>{{ $product->name }}</td>
            <td>{{ $product->description }}</td>
            <td>{{ number_format($product->price, 2) }}</td>
            <td>{{ $product->quantity }}</td>
            <td>
                <a href="{{ route('products.edit', $product) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('products.destroy', $product) }}" method="POST" class="d-inline"
                      onsubmit="return confirm('Delete this product?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="6" class="text-center">No products found.</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection