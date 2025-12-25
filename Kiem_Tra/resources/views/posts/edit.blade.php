@extends('layout')
@section('content')
    <h4>Edit Post</h4>
    <form action="{{ route('posts.update', $post->id) }}" method="POST">
        @csrf @method('PUT')
        
        <div class="mb-3">
            <label>Title:</label>
            <input type="text" name="title" class="form-control" value="{{ $post->title }}" required>
        </div>
        <div class="mb-3">
            <label>Content:</label>
            <textarea name="content" class="form-control" rows="4" required>{{ $post->content }}</textarea>
        </div>
        <div class="row">
            <div class="col-md-4 mb-3">
                <label>Author:</label>
                <select name="user_id" class="form-select" required>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}" {{ $post->user_id == $user->id ? 'selected' : '' }}>
                            {{ $user->fullname }}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4 mb-3">
                <label>Category:</label>
                <select name="category" class="form-select" required>
                    <option value="Technology" {{ $post->category == 'Technology' ? 'selected' : '' }}>Technology</option>
                    <option value="Lifestyle" {{ $post->category == 'Lifestyle' ? 'selected' : '' }}>Lifestyle</option>
                    <option value="Travel" {{ $post->category == 'Travel' ? 'selected' : '' }}>Travel</option>
                </select>
            </div>
            <div class="col-md-4 mb-3">
                <label>Views:</label>
                <input type="number" name="views" class="form-control" value="{{ $post->views }}" required>
            </div>
        </div>
        <button type="submit" class="btn btn-warning">Update</button>
        <a href="{{ route('posts.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection