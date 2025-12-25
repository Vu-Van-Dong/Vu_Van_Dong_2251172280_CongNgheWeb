<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function showHomepage()
    {
        // 1. Chuẩn bị dữ liệu (Giả lập lấy từ Database)
        $pageTitle = "Học Laravel Blade Framework";
        $pageDescription = "Blade giúp code ngắn gọn, sạch sẽ và bảo mật hơn PHP thuần.";
        
        $tasks = [
            'Tìm hiểu cấu trúc thư mục Laravel',
            'Cấu hình Route và Controller',
            'Tạo Layout Master với Blade',
            'Sử dụng vòng lặp @foreach',
            'Hiển thị dữ liệu với {{ }}'
        ];

        // 2. Trả về View 'homepage' kèm theo mảng dữ liệu
        // Các key ('page_title', 'tasks'...) sẽ trở thành tên biến bên view ($page_title, $tasks...)
        return view('homepage', [
            'page_title'       => $pageTitle,
            'page_description' => $pageDescription,
            'tasks'            => $tasks
        ]);
    }
}