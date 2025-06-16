@extends('components.dashboard-layout')

@section('title', 'Dashboard')

@section('content') <div>
        <form method="POST" action="{{ route('field-images.index') }}" enctype="multipart/form-data">
            @csrf
            <select name="field_id">
                <option value="" disabled {{ old('type') ? '' : 'selected' }}>Field</option>
                @foreach ($fields as $field)
                    <option value="{{ $field->id }}" {{ old('field_id') == $field->id ? 'selected' : '' }}>
                        {{ $field->name }}
                    </option>
                @endforeach
            </select>
            <input name="img_alt" type="text" placeholder="Image name" value="{{ old('img_alt') }}">
            @error('role')
                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
            @enderror
            <input name="image" type="file" accept="image/*" required>

            <button type="submit">Upload</button>
        </form>
    </div>
@endsection