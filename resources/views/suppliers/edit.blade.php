@extends('layouts.app')

@section('content')
<h2>Edit Supplier</h2>

<form action="{{ route('suppliers.update', $supplier) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="mb-3">
        <label class="form-label">Name</label>
        <input type="text" name="name" class="form-control @error('name') is-invalid @enderror"
               value="{{ old('name', $supplier->name) }}">
        @error('name') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Email</label>
        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
               value="{{ old('email', $supplier->email) }}">
        @error('email') <div class="invalid-feedback">{{ $message }}</div> @enderror
    </div>

    <div class="mb-3">
        <label class="form-label">Phone</label>
        <input type="text" name="phone" class="form-control" value="{{ old('phone', $supplier->phone) }}">
    </div>

    <div class="mb-3">
        <label class="form-label">Address</label>
        <textarea name="address" class="form-control">{{ old('address', $supplier->address) }}</textarea>
    </div>

    <button type="submit" class="btn btn-primary">Update</button>
    <a href="{{ route('suppliers.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection