<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Web CSE485 - Chương 7</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 20px; }
        header, footer { background: #f0f0f0; padding: 10px; text-align: center; }
        nav a { margin: 0 10px; text-decoration: none; color: blue; }
        main { padding: 20px 0; }
    </style>
</head>
<body>

    <header>
        <h1>Trang Web CSE485 - Laravel</h1>
        <nav>
            <a href="/">Trang Chủ (Chương 7)</a> | 
            <a href="/about">Giới Thiệu</a> |
            <a href="{{ route('sinhvien.index') }}">Quản lý Sinh Viên (Chương 8)</a>
        </nav>
    </header>

    <main>
        @yield('content')
    </main>

    <footer>
        <p>© 2025 - Khoa CNTT - Trường Đại học Thủy Lợi</p>
    </footer>

</body>
</html>