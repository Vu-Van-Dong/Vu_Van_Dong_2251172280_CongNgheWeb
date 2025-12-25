@extends('layout')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h4>Danh sách nhân viên</h4>
        <a href="{{ route('employees.create') }}" class="btn btn-primary">+ Thêm nhân viên mới</a>
    </div>

    <form action="{{ route('employees.index') }}" method="GET" class="mb-4">
        <div class="input-group">
            <input type="text" name="search" class="form-control" placeholder="Tìm kiếm theo tên hoặc email..." value="{{ $search }}">
            <button class="btn btn-secondary" type="submit">Tìm kiếm</button>
        </div>
    </form>

    <table class="table table-bordered table-hover">
        <thead class="table-light">
            <tr>
                <th>Mã NV</th>
                <th>Họ tên</th>
                <th>Email</th>
                <th>SĐT</th>
                <th>Phòng ban</th>
                <th>Chức vị</th>
                <th>Lương ($)</th>
                <th width="150px">Hành động</th>
            </tr>
        </thead>
        <tbody>
            @foreach($employees as $emp)
            <tr>
                <td>{{ $emp->id }}</td>
                <td>{{ $emp->name }}</td>
                <td>{{ $emp->email }}</td>
                <td>{{ $emp->phone }}</td>
                <td>{{ $emp->department->name }}</td> <td>
                    <span class="badge bg-info text-dark">{{ $emp->position }}</span>
                </td>
                <td>{{ number_format($emp->salary, 2) }}</td>
                <td>
                    <a href="{{ route('employees.edit', $emp->id) }}" class="btn btn-sm btn-warning">Sửa</a>
                    
                    <form action="{{ route('employees.destroy', $emp->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Bạn có chắc chắn muốn xóa nhân viên này?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Xóa</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>

    <div class="d-flex justify-content-center">
        {{ $employees->links('pagination::bootstrap-5') }}
    </div>
@endsection