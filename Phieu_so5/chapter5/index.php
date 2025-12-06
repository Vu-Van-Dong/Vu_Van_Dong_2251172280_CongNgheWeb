<!-- <?php
// ===========================
// CONTROLLER: Điều phối ứng dụng
// ===========================

// TODO 6: Import Model
require_once 'models/SinhVienModel.php';

// ===========================
// KẾT NỐI CSDL (PDO)
// ===========================
$host = '127.0.0.1';
$dbname = 'cse485_web';
$username = 'root';
$password = '';

$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch(PDOException $e) {
    die("Kết nối thất bại: " . $e->getMessage());
}

// ===========================
// LOGIC CONTROLLER
// ===========================

// TODO 8: Xử lý khi bấm nút submit
if (isset($_POST['ten_sinh_vien'])) {

    // TODO 9: Lấy dữ liệu từ form
    $ten   = $_POST['ten_sinh_vien'];
    $email = $_POST['email'];

    // TODO 10: Gọi Model thêm vào DB
    addSinhVien($pdo, $ten, $email);

    // TODO 11: Redirect để tránh lỗi F5
    header("Location: index.php");
    exit;
}

// TODO 12: Lấy danh sách sinh viên
$danh_sach_sv = getAllSinhVien($pdo);

// TODO 13: Gọi View
include 'views/sinhvien_view.php';
?> -->
<!-- ================================================================================================================= -->


<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);

// Import Model
require_once 'models/SinhVienModel.php';

// Kết nối PDO
$host = '127.0.0.1';
$dbname = 'cse485_web';
$username = 'root';
$password = '';
$dsn = "mysql:host=$host;dbname=$dbname;charset=utf8mb4";

try {
    $pdo = new PDO($dsn, $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Kết nối thất bại: " . $e->getMessage());
}

$error_message = "";

// Xử lý thêm sinh viên
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['ten_sinh_vien'])) {

    $ten = trim($_POST['ten_sinh_vien']);
    $email = trim($_POST['email']);

    if ($ten === '' || $email === '') {
        $error_message = "Tên và email không được để trống.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $error_message = "Email không hợp lệ.";
    } else {
        addSinhVien($pdo, $ten, $email);
        header("Location: index.php");
        exit;
    }
}

// Lấy danh sách sinh viên
$danh_sach_sv = getAllSinhVien($pdo);

// Gọi View
include 'views/sinhvien_view.php';
