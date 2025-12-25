@extends('layout')

@section('content')
    <div class="card">
        <div class="card-header">Thêm nhân viên mới</div>
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

            <form action="{{ route('employees.store') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label>Tên nhân viên:</label>
                        <input type="text" name="name" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Email:</label>
                        <input type="email" name="email" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Số điện thoại:</label>
                        <input type="text" name="phone" class="form-control">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Lương:</label>
                        <input type="number" name="salary" class="form-control" required>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Phòng ban:</label>
                        <select name="department_id" class="form-select" required>
                            <option value="">-- Chọn phòng ban --</option>
                            @foreach($departments as $dept)
                                <option value="{{ $dept->id }}">{{ $dept->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label>Chức vị:</label>
                        <select name="position" class="form-select" required>
                            <option value="Staff">Staff</option>
                            <option value="Manager">Manager</option>
                            <option value="VP">VP</option>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-success">Lưu thông tin</button>
                <a href="{{ route('employees.index') }}" class="btn btn-secondary">Hủy bỏ</a>
            </form>
        </div>
    </div>
@endsection