@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-4">
    <h1 class="h3">Image Gallery</h1>
    <a href="{{ route('gallery.create') }}" class="btn btn-primary">Upload New Image</a>
</div>

<div class="row">



    @foreach($images as $image)
        <div class="col-md-4 mb-4">
            <div class="card">
                <a href="{{ route('gallery.view', $image->id) }}">
                <img src="{{ $image->image_url }}" class="card-img-top" alt="{{ $image->title }}">
                </a>
                <div class="card-body">
                    <h5 class="card-title">{{ $image->title }}</h5>
                    <p class="card-text" >{{ $image->tags }}</p>
                    <div class="d-flex justify-content-between">
                        <a href="{{ route('gallery.edit', $image->id) }}" class="btn btn-secondary btn-sm">Edit</a>
                        <form action="{{ route('gallery.destroy', $image->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endforeach
</div>
@endsection

<style>

.card-body {
    padding: 20px;
    display: flex;
    flex-direction: column;
    justify-content: space-between;
    height: 100%;
}

.card-body h5 {
    font-size: 1.25rem;
    margin-bottom: 10px;
    font-weight: bold;
    color: #333;
}

.card-body p {
    flex-grow: 1;
    margin-bottom: 15px;
    font-size: 0.95rem;
    color: #555;
}

.card-body .btn {
    margin-right: 10px;
}

.card-body .btn:last-child {
    margin-right: 0;
}

.d-flex.justify-content-between {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-top: 15px;
}

    </style>