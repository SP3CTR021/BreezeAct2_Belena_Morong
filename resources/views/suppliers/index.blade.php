@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h2>Suppliers</h2>
    <a href="{{ route('suppliers.create') }}" class="btn btn-success">Add Supplier</a>
</div>

<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>#</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Address</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @forelse($suppliers as $supplier)
        <tr>
            <td>{{ $supplier->id }}</td>
            <td>{{ $supplier->name }}</td>
            <td>{{ $supplier->email }}</td>
            <td>{{ $supplier->phone }}</td>
            <td>{{ $supplier->address }}</td>
            <td>
                <a href="{{ route('suppliers.edit', $supplier) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('suppliers.destroy', $supplier) }}" method="POST" class="d-inline"
                      onsubmit="return confirm('Delete this supplier?')">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-sm btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="6" class="text-center">No suppliers found.</td>
        </tr>
        @endforelse
    </tbody>
</table>
@endsection