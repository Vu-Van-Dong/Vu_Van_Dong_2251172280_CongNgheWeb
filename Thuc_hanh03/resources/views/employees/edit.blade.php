@extends('layout')

@section('content')
    <div class="card">
        <div class="card-header">Cập nhật thông tin nhân viên</div>
        <div class="card-body">
            
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                         @foreach ($errors->all() as $error)
                             <li>{{ $error }}</li>
                         @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('employees.update', $employee->id) }}" method="POST">
                @csrf
                @method('PUT') <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Tên nhân viên:</label>
                        <input type="text" name="name" class="form-control" value="{{ $employee->name }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Email:</label>
                        <input type="email" name="email" class="form-control" value="{{ $employee->email }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Số điện thoại:</label>
                        <input type="text" name="phone" class="form-control" value="{{ $employee->phone }}">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Lương:</label>
                        <input type="number" name="salary" class="form-control" value="{{ $employee->salary }}" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Phòng ban:</label>
                        <select name="department_id" class="form-select" required>
                            @foreach($departments as $dept)
                                <option value="{{ $dept->id }}" {{ $employee->department_id == $dept->id ? 'selected' : '' }}>
                                    {{ $dept->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Chức vị:</label>
                        <select name="position" class="form-select" required>
                            <option value="Staff" {{ $employee->position == 'Staff' ? 'selected' : '' }}>Staff</option>
                            <option value="Manager" {{ $employee->position == 'Manager' ? 'selected' : '' }}>Manager</option>
                            <option value="VP" {{ $employee->position == 'VP' ? 'selected' : '' }}>VP</option>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-warning">Cập nhật</button>
                <a href="{{ route('employees.index') }}" class="btn btn-secondary">Hủy bỏ</a>
            </form>
        </div>
    </div>
@endsection