@extends('layouts.app')

@section('content')
<h2>Edit Stock</h2>

<form action="{{ route('stocks.update', $stock) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label">Product</label>
        <select name="product_id" class="form-select @error('product_id') is-invalid @enderror">
            <option value="">-- Select Product --</option>
            @foreach($products as $product)
                <option value="{{ $product->id }}" {{ old('product_id', $stock->product_id) == $product->id ? 'selected' : '' }}>
                    {{ $product->name }}
                </option>
            @endforeach
        </select>
        @error('product_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Supplier</label>
        <select name="supplier_id" class="form-select @error('supplier_id') is-invalid @enderror">
            <option value="">-- Select Supplier --</option>
            @foreach($suppliers as $supplier)
                <option value="{{ $supplier->id }}" {{ old('supplier_id', $stock->supplier_id) == $supplier->id ? 'selected' : '' }}>
                    {{ $supplier->name }}
                </option>
            @endforeach
        </select>
        @error('supplier_id') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Quantity</label>
        <input type="number" name="quantity" class="form-control @error('quantity') is-invalid @enderror"
               value="{{ old('quantity', $stock->quantity) }}">
        @error('quantity') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Stock Date</label>
        <input type="date" name="stock_date" class="form-control @error('stock_date') is-invalid @enderror"
               value="{{ old('stock_date', $stock->stock_date) }}">
        @error('stock_date') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
    <a href="{{ route('stocks.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection