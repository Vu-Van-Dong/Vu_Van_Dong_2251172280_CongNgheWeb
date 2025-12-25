<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SinhVien; // Nhớ import Model SinhVien

class SinhVienController extends Controller
{
    // Hiển thị danh sách và form
    public function index()
    {
        // Lấy tất cả sinh viên từ CSDL bằng Eloquent
        $danhSachSV = SinhVien::all(); // Tương đương SELECT * FROM sinh_viens
        
        // Trả về view kèm dữ liệu
        return view('sinhvien.list', ['danhSachSV' => $danhSachSV]);
    }

    // Xử lý lưu dữ liệu từ Form
    public function store(Request $request)
    {
        // Lấy toàn bộ dữ liệu từ form (ten_sinh_vien, email)
        $data = $request->all();

        // TODO 14: Dùng Eloquent ::create() để lưu vào CSDL
        SinhVien::create($data);

        // TODO 15: Chuyển hướng về trang danh sách
        return redirect()->route('sinhvien.index');
    }
}