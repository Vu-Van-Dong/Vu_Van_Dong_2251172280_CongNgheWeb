<?php
// chapter4.php

// === Cấu hình hiển thị lỗi (dùng khi dev) ===
ini_set('display_errors', 1);
error_reporting(E_ALL);

// === THIẾT LẬP KẾT NỐI PDO ===
$host = '127.0.0.1'; // hoặc 'localhost'
$dbname = 'cse485_web';
$username = 'root';
$password = '';
$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";

try {
    $pdo = new PDO($dsn, $username, $password);
    // Bật exception mode
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Kết nối thất bại: " . $e->getMessage());
}

// === LOGIC THÊM SINH VIÊN (XỬ LÝ FORM POST) ===
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['ten_sinh_vien'])) {
    // Lấy và làm sạch dữ liệu
    $ten = trim($_POST['ten_sinh_vien']);
    $email = trim($_POST['email'] ?? '');

    // Kiểm tra cơ bản
    if ($ten === '' || $email === '') {
        // Bạn có thể xử lý lỗi hiển thị ở đây
        $error_message = "Tên và email không được để trống.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_message = "Email không hợp lệ.";
    } else {
        // INSERT với Prepared Statement (dấu ?)
        $sql = "INSERT INTO sinhvien (ten_sinh_vien, email) VALUES (?, ?)";
        $stmt = $pdo->prepare($sql);
        try {
            $stmt->execute([$ten, $email]);
            // Redirect để tránh gửi lại form khi reload
            header('Location: chapter4.php');
            exit;
        } catch (PDOException $e) {
            $error_message = "Lỗi khi thêm: " . $e->getMessage();
        }
    }
}

// === LẤY DANH SÁCH SINH VIÊN (SELECT) ===
$sql_select = "SELECT * FROM sinhvien ORDER BY ngay_tao DESC";
$stmt_select = $pdo->query($sql_select);
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>PHT Chương 4 - Website hướng dữ liệu</title>
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
    <h2>Thêm Sinh Viên Mới (Chủ đề 4.3)</h2>

    <?php if (!empty($error_message)): ?>
        <div class="error"><?= htmlspecialchars($error_message) ?></div>
    <?php endif; ?>

    <form action="chapter4.php" method="POST">
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
        <?php
        // Duyệt kết quả SELECT
        while ($row = $stmt_select->fetch(PDO::FETCH_ASSOC)) {
            echo "<tr>";
            echo "<td>" . htmlspecialchars($row['id']) . "</td>";
            echo "<td>" . htmlspecialchars($row['ten_sinh_vien']) . "</td>";
            echo "<td>" . htmlspecialchars($row['email']) . "</td>";
            echo "<td>" . htmlspecialchars($row['ngay_tao']) . "</td>";
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>
