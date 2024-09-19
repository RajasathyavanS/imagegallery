@extends('layouts.app')

@section('content')
<h1 class="h3 mb-4">Edit Image</h1>

<form action="{{ route('gallery.update', $image->id) }}" method="POST">
    @csrf
    @method('PUT')

    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" name="title" value="{{ $image->title }}" required>
    </div>

    <div class="form-group">
        <label for="tag">Tag</label>
        <input type="text" class="form-control" name="tag" value="{{ $image->tag }}">
    </div>

    <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" name="description" rows="3">{{ $image->description }}</textarea>
    </div>

    <button type="submit" class="btn btn-success">Update</button>
    <a href="{{ route('gallery.index') }}" class="btn btn-secondary">Cancel</a>
    
</form>
@endsection
