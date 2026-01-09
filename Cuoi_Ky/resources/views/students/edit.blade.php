@extends('layout')
@section('content')
<div class="card">
    <div class="card-header">Edit Student Information</div>
    <div class="card-body">
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>@foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach</ul>
        </div>
        @endif

        <form action="{{ route('students.update', $student->id) }}" method="POST">
            @csrf @method('PUT')
            <div class="row">
                <div class="col-md-6 mb-3">
                    <label>Student ID:</label>
                    <input type="text" name="student_id" class="form-control" value="{{ $student->student_id }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label>Full Name:</label>
                    <input type="text" name="full_name" class="form-control" value="{{ $student->full_name }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label>Email:</label>
                    <input type="email" name="email" class="form-control" value="{{ $student->email }}" required>
                </div>
                <div class="col-md-6 mb-3">
                    <label>Phone Number:</label>
                    <input type="text" name="phone" class="form-control" value="{{ $student->phone }}">
                </div>
                <div class="col-12 mb-3">
                    <label>School:</label>
                    <select name="school_id" class="form-select" required>
                        @foreach($schools as $school)
                        <option value="{{ $school->id }}" {{ $student->school_id == $school->id ? 'selected' : '' }}>
                            {{ $school->name }}
                        </option>
                        @endforeach
                    </select>
                </div>
            </div>
            <button type="submit" class="btn btn-warning">Update</button>
            <a href="{{ route('students.index') }}" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</div>
@endsection