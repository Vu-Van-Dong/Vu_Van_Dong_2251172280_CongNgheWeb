@extends('layout')
@section('content')
    <h4>Create New Post</h4>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>@foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach</ul>
        </div>
    @endif

    <form action="{{ route('posts.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label>Title:</label>
            <input type="text" name="title" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Content:</label>
            <textarea name="content" class="form-control" rows="4" required></textarea>
        </div>
        <div class="row">
            <div class="col-md-4 mb-3">
                <label>Author:</label>
                <select name="user_id" class="form-select" required>
                    <option value="">-- Select Author --</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->fullname }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-md-4 mb-3">
                <label>Category:</label>
                <select name="category" class="form-select" required>
                    <option value="Technology">Technology</option>
                    <option value="Lifestyle">Lifestyle</option>
                    <option value="Travel">Travel</option>
                </select>
            </div>
            <div class="col-md-4 mb-3">
                <label>Views:</label>
                <input type="number" name="views" class="form-control" value="0" required>
            </div>
        </div>
        <button type="submit" class="btn btn-success">Save</button>
        <a href="{{ route('posts.index') }}" class="btn btn-secondary">Cancel</a>
    </form>
@endsection