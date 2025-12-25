
@extends('layout')
@section('content')
    <div class="d-flex justify-content-between mb-3">
        <h4>Post List</h4>
        <a href="{{ route('posts.create') }}" class="btn btn-primary">Create New Post</a>
    </div>

    <table class="table table-bordered table-hover">
        <thead class="table-dark">
            <tr>
                <th>STT</th> <th>Title</th>
                <th>Author</th>
                <th>Category</th>
                <th>Views</th>
                <th>Created Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($posts as $post)
            <tr>
                <td>
                    {{ $posts->total() - ($posts->currentPage() - 1) * $posts->perPage() - $loop->index }}
                </td>

                <td>{{ $post->title }}</td>
                <td>{{ $post->user->fullname }}</td> 
                <td>{{ $post->category }}</td>
                <td>{{ $post->views }}</td>
                <td>{{ $post->created_at->format('Y-m-d') }}</td>
                <td>
                    <a href="{{ route('posts.edit', $post->id) }}" class="btn btn-warning btn-sm">Edit</a>
                    
                    <form action="{{ route('posts.destroy', $post->id) }}" 
                          method="POST" 
                          class="d-inline" 
                          onsubmit="return confirm('Are you sure you want to delete this post?');"> 
                        
                        @csrf 
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-center">
        {{ $posts->links('pagination::bootstrap-5') }}
    </div>
@endsection

