@extends('layout')
@section('content')
<div class="card">
    <div class="card-header">Create New Student</div>
    <div class="card-body">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>@foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach</ul>
        </div>
        @endif

        <form action="{{ route('students.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Student ID:</label>
                    <input type="text" name="student_id" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label>Full Name:</label>
                    <input type="text" name="full_name" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label>Email:</label>
                    <input type="email" name="email" class="form-control" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label>Phone Number:</label>
                    <input type="text" name="phone" class="form-control">
                </div>
                <div class="col-12 mb-3">
                    <label>School:</label>
                    <select name="school_id" class="form-select" required>
                        <option value="">-- Select School --</option>
                        @foreach($schools as $school)
                        <option value="{{ $school->id }}">{{ $school->name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-success">Save</button>
            <a href="{{ route('students.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection