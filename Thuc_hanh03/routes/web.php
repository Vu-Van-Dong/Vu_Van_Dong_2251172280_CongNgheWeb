<?php

use App\Http\Controllers\EmployeeController;
use Illuminate\Support\Facades\Route;

// Chuyển hướng trang chủ về danh sách nhân viên
Route::get('/', function () {
    return redirect()->route('employees.index');
});

// Tạo toàn bộ route CRUD cho employees
Route::resource('employees', EmployeeController::class);