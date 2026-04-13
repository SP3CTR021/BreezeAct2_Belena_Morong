@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Stock</h2>
    <a href="{{ route('stocks.create') }}" class="btn btn-success">Add Stock</a>
</div>

<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>#</th>
            <th>Product</th>
            <th>Supplier</th>
            <th>Quantity</th>
            <th>Date</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse($stocks as $stock)
        <tr>
            <td>{{ $stock->id }}</td>
            <td>{{ $stock->product->name }}</td>
            <td>{{ $stock->supplier->name }}</td>
            <td>{{ $stock->quantity }}</td>
            <td>{{ $stock->stock_date }}</td>
            <td>
                <a href="{{ route('stocks.edit', $stock) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('stocks.destroy', $stock) }}" method="POST" class="d-inline"
                      onsubmit="return confirm('Delete this stock entry?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="6" class="text-center">No stock entries found.</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection