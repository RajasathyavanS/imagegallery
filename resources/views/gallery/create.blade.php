@extends('layouts.app')

@section('content')
<h1 class="h3 mb-4">Upload New Image</h1>

<form action="{{ route('gallery.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" name="title" required>
    </div>

    <div class="form-group">
        <label for="tag">Tag</label>
        <input type="text" class="form-control" name="tag">
    </div>

    <div class="form-group">
        <label for="description">Description</label>
        <textarea class="form-control" name="description" rows="3"></textarea>
    </div>

    <div class="form-group">
        <label for="images">Upload Images</label>
        <input type="file" class="form-control-file" name="images[]" multiple>
    </div>

    <button type="submit" class="btn btn-success">Submit</button>
    <a href="{{ route('gallery.index') }}" class="btn btn-secondary">Cancel</a>

    
</form>
@endsection

