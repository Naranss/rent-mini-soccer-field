@extends('components.dashboard-layout')

@section('title', 'Dashboard')

@section('content')
    <h1>Edit Field</h1>
    @if (session()->has('success'))
        <div class="mb-4 p-3 rounded bg-green-500 text-white text-sm text-center">
            {{ session('success') }}
        </div>
    @endif
    <form action="{{ route('fields.update', $field) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Field Name</label>
            <input type="text" class="form-control" id="name" name="name" required value="{{ $field->name }}">
        </div>
        <div class="mb-3">
            <label for="type" class="form-label">Type</label>
            <select name="type" id="type" class="form-control" required>
                @if($field->type == 'futsal')
                    <option value="futsal" selected>Futsal</option>
                    <option value="minisoccer">Mini Soccer</option>
                @else
                    <option value="futsal">Futsal</option>
                    <option value="minisoccer" selected>Mini Soccer</option>
                @endif
            </select>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <input type="text" class="form-control" id="description" name="description" required
                value="{{ $field->description }}">
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Price</label>
            <input type="number" class="form-control" id="price" name="price" required value="{{ $field->price }}">
        </div>
        <div class="mb-3">
            <label for="status" class="form-label">Status</label>
            <select name="status" id="status" class="form-control" required>
                @if($field->status == 'available')
                    <option value="available" selected>Available</option>
                    <option value="maintenance">Maintenance</option>
                @else
                    <option value="available">Available</option>
                    <option value="maintenance" selected>Maintenance</option>
                @endif
            </select>
        </div>
        <div class="mb-3">
            <label for="location" class="form-label">Location</label>
            <input type="location" class="form-control" id="location" name="location" required
                value="{{ $field->location }}">
        </div>
        <button type="submit" class="btn btn-primary">Update</button>
    </form>
@endsection
