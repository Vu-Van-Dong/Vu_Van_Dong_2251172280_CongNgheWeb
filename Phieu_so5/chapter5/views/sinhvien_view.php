<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>PHT Chương 5 - MVC</title>
    <style>
        body { font-family: Arial, sans-serif; padding: 20px; }
        form { margin-bottom: 20px; }
        input[type="text"], input[type="email"] { padding: 6px; margin-right: 8px; }
        button { padding: 6px 10px; }
        table { width: 100%; border-collapse: collapse; margin-top: 8px; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: left; }
        th { background-color: #f2f2f2; }
        .error { color: red; margin-bottom: 10px; }
    </style>
</head>
<body>

    <h2>Thêm Sinh Viên Mới</h2>

    <?php if (!empty($error_message)): ?>
        <div class="error"><?= htmlspecialchars($error_message) ?></div>
    <?php endif; ?>

    <form action="index.php" method="POST">
        Tên sinh viên:
        <input type="text" name="ten_sinh_vien" required>
        Email:
        <input type="email" name="email" required>
        <button type="submit">Thêm</button>
    </form>

    <h2>Danh Sách Sinh Viên (Chủ đề 4.2)</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Tên Sinh Viên</th>
            <th>Email</th>
            <th>Ngày Tạo</th>
        </tr>

        <?php foreach ($danh_sach_sv as $sv): ?>
            <tr>
                <td><?= htmlspecialchars($sv['id']) ?></td>
                <td><?= htmlspecialchars($sv['ten_sinh_vien']) ?></td>
                <td><?= htmlspecialchars($sv['email']) ?></td>
                <td><?= htmlspecialchars($sv['ngay_tao']) ?></td>
            </tr>
        <?php endforeach; ?>

    </table>

</body>
</html>
