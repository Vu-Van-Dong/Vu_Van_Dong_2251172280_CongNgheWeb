<?php

namespace App\Http\Controllers;

use App\Models\Employee;
use App\Models\Department;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Hiển thị danh sách nhân viên (Dashboard)
     */
    public function index(Request $request)
    {
        $search = $request->input('search');

        // Query dữ liệu, join với bảng departments
        $employees = Employee::with('department')
            ->when($search, function ($query, $search) {
                return $query->where('name', 'like', "%{$search}%")
                             ->orWhere('email', 'like', "%{$search}%");
            })
            ->orderBy('id', 'desc')     // xăp theo ID giảm dần
            ->paginate(10);             // Phân trang 10 record/trang

        return view('employees.index', compact('employees', 'search'));
    }

    /**
     * Hiển thị form thêm mới
     */
    public function create()
    {
        // Lấy danh sách phòng ban để hiển thị dropdown
        $departments = Department::all(); 
        return view('employees.create', compact('departments'));
    }

    /**
     * Xử lý lưu dữ liệu nhân viên mới
     */
    public function store(Request $request)
    {
        // Validation dữ liệu đầu vào
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:employees,email', // Email phải duy nhất
            'department_id' => 'required',
            'position' => 'required', // Bắt buộc chọn chức vị
            'salary' => 'required|numeric'
        ], [
            'email.unique' => 'Email này đã tồn tại trong hệ thống.',
            'required' => 'Trường này không được để trống.'
        ]);

        Employee::create($request->all());

        return redirect()->route('employees.index')
            ->with('success', 'Thêm nhân viên thành công!');
    }

    /**
     * Hiển thị form sửa nhân viên
     */
    public function edit(Employee $employee)
    {
        $departments = Department::all();
        return view('employees.edit', compact('employee', 'departments'));
    }

    /**
     * Xử lý cập nhật dữ liệu
     */
    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'name' => 'required',
            // Email duy nhất, nhưng bỏ qua check cho chính ID hiện tại
            'email' => 'required|email|unique:employees,email,' . $employee->id,
            'department_id' => 'required',
            'position' => 'required',
            'salary' => 'required|numeric'
        ]);

        $employee->update($request->all());

        return redirect()->route('employees.index')
            ->with('success', 'Cập nhật thông tin nhân viên thành công!');
    }

    /**
     * Xử lý xóa nhân viên
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        return redirect()->route('employees.index')
            ->with('success', 'Xóa nhân viên thành công!');
    }
}