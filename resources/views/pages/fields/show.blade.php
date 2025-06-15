@extends('components.dashboard-layout')

@section('title', 'Dashboard')

@section('content')
    <h1>View {{ $field->name }}</h1>
    <div>
        <h2>Field Details</h3>
            <a href="{{ route('fields.edit', $field) }}">Edit</a>
            <a href="{{ route('fields.index') }}">Back</a>
            <div>
                Owner: {{ $field->owner->name }}
                Added at: {{ $field->created_at }}
                Status: {{ $field->status }}
            </div>
            <h3>Description</h3>
            <p>{{ $field->description }}</p>
            <h3>Price/hour</h3>
            Rp {{ number_format($field->price, 2, ',', '.') }}
            <h3>Type</h3>
            {{ $field->type }}
            <h3>Location</h3>
            {{ $field->location }}
            <h3>Images</h3>
            @if ($fieldImages->isNotEmpty())
            {{-- Use carousel --}}
                @foreach ($fieldImages as $fieldImage)
                   <img src="{{ asset('storage/' . $fieldImage->path) }}" alt="{{ $fieldImage->img_alt }}"> 
                @endforeach
            @else
                <p>This field doesn't have any images yet.</p>
            @endif
    </div>
@endsection
