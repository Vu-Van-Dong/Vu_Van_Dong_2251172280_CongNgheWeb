<?php

use Illuminate\Support\Facades\Route;
// Import các Controller đã tạo
use App\Http\Controllers\PageController;
use App\Http\Controllers\SinhVienController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// --- CHƯƠNG 6 & 7: Route Trang chủ & Giới thiệu ---
Route::get('/', [PageController::class, 'showHomepage']);
Route::get('/about', [PageController::class, 'showHomepage']);


// --- CHƯƠNG 8 & 9: Quản lý Sinh Viên ---

// Lưu ý: Tôi để route ở ngoài để bạn chạy được ngay mà không cần Đăng nhập.
// Khi nào bạn cài đặt xong hệ thống Login (Breeze/Jetstream) thì mới dùng Middleware.

Route::get('/sinhvien', [SinhVienController::class, 'index'])->name('sinhvien.index');
Route::post('/sinhvien', [SinhVienController::class, 'store'])->name('sinhvien.store');


// --- TODO 9: CODE MẪU BẢO MẬT (Tham khảo cho bài tập) ---
// Đây là cách viết khi dự án đã có chức năng Đăng nhập.
// Hiện tại tôi comment lại để tránh lỗi "Route [login] not defined".

/*
Route::middleware(['auth'])->group(function () {
    
    // Những route nằm trong này YÊU CẦU PHẢI ĐĂNG NHẬP mới xem được
    Route::get('/sinhvien', [SinhVienController::class, 'index'])->name('sinhvien.index');
    Route::post('/sinhvien', [SinhVienController::class, 'store'])->name('sinhvien.store');

});
*/