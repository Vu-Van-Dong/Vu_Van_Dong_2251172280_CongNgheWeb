<?php
include 'save.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $flowers = loadFlowers();

    $new = [
        "name" => $_POST["name"],
        "description" => $_POST["description"],
        "image" => $_POST["image"]
    ];

    $flowers[] = $new;
    saveFlowers($flowers);

    header("Location: index.php?mode=admin");
    exit;
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thêm Hoa Mới</title>
</head>
<body>

<h2>Thêm loại hoa mới</h2>

<form method="POST">
    <label>Tên hoa:</label><br>
    <input type="text" name="name" required><br><br>

    <label>Ảnh (path):</label><br>
    <input type="text" name="image" placeholder="images/ten-anh.jpg" required><br><br>

    <label>Mô tả:</label><br>
    <textarea name="description" rows="4" required></textarea><br><br>

    <button type="submit">Lưu</button>
</form>

</body>
</html>
