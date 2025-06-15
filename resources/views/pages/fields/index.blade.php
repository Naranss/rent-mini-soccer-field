@extends('components.dashboard-layout')

@section('title', 'Dashboard')

@section('content')
<h1>Fields</h1>
<button>Add Field</button>
    <div>
        <form action="{{ route('fields.index') }}">
            <input type="text" name="search" placeholder="Search by field name or owner" value="{{ old('search', request('search')) }}">
            <button type="submit">Search</button>
        </form>
    </div>
    <table>
        <tr>
            <th>Name</th>
            <th>Owner</th>
            <th>Type</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        @foreach ($fields as $field)
            <tr>
                <th>{{ $field->name }}</th>
                <th>{{ $field->owner->name }}</th>
                <th>{{ $field->type }}</th>
                <th>{{ $field->status }}</th>
                <th>
                    {{-- Dropdown menu --}}
                    <div class="dropdown">
                        <button onclick="">Dropdown</button>
                        <div id="myDropdown" class="dropdown-content">
                            <a href="{{ route('fields.edit', [$field]) }}">Edit</a>
                            <a href="#">Show</a>
                            <a href="#">Delete</a>
                        </div>
                    </div>
                </th>
            </tr>
        @endforeach
    </table>
@endsection
