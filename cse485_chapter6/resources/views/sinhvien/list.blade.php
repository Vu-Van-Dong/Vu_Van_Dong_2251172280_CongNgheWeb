@extends('layouts.app')

@section('content')
<div style="max-width: 600px; margin: auto;">
    <h2>Quản lý Sinh Viên (Eloquent ORM)</h2>

    <div style="background: #e9ecef; padding: 15px; border-radius: 5px; margin-bottom: 20px;">
        <h4>Thêm sinh viên mới</h4>
        <form action="{{ route('sinhvien.store') }}" method="POST">
            {{-- Bắt buộc phải có @csrf để bảo mật form trong Laravel --}}
            @csrf
            
            <div style="margin-bottom: 10px;">
                <label>Tên sinh viên:</label><br>
                <input type="text" name="ten_sinh_vien" required style="width: 100%">
            </div>
            
            <div style="margin-bottom: 10px;">
                <label>Email:</label><br>
                <input type="email" name="email" required style="width: 100%">
            </div>

            <button type="submit">Lưu sinh viên</button>
        </form>
    </div>

    <hr>

    <h4>Danh sách sinh viên</h4>
    <table border="1" cellpadding="10" cellspacing="0" width="100%">
        <thead>
            <tr>
                <th>ID</th>
                <th>Tên Sinh Viên</th>
                <th>Email</th>
                <th>Ngày tạo</th>
            </tr>
        </thead>
        <tbody>
            @foreach($danhSachSV as $sv)
            <tr>
                <td>{{ $sv->id }}</td>
                <td>{{ $sv->ten_sinh_vien }}</td>
                <td>{{ $sv->email }}</td>
                <td>{{ $sv->created_at }}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection