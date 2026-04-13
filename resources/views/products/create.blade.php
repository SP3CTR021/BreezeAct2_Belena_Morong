@extends('layouts.app')

@section('content')
<h2>Add Product</h2>

<form action="{{ route('products.store') }}" method="POST">
    @csrf

    <div class="mb-3">
        <label class="form-label">Name</label>
        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
               value="{{ old('name') }}">
        @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Description</label>
        <textarea name="description" class="form-control">{{ old('description') }}</textarea>
    </div>

    <div class="mb-3">
        <label class="form-label">Price</label>
        <input type="number" step="0.01" name="price" class="form-control @error('price') is-invalid @enderror"
               value="{{ old('price') }}">
        @error('price') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Quantity</label>
        <input type="number" name="quantity" class="form-control @error('quantity') is-invalid @enderror"
               value="{{ old('quantity') }}">
        @error('quantity') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <button type="submit" class="btn btn-primary">Save</button>
    <a href="{{ route('products.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection