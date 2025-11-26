<?php
include 'save.php';

$flowers = loadFlowers();
$id = $_GET['id'] ?? null;

if ($id === null || !isset($flowers[$id])) {
    die("Không tìm thấy hoa.");
}

$flower = $flowers[$id];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $flowers[$id]['name'] = $_POST['name'];
    $flowers[$id]['description'] = $_POST['description'];
    $flowers[$id]['image'] = $_POST['image'];

    saveFlowers($flowers);
    header("Location: index.php?mode=admin");
    exit;
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Sửa Hoa</title>
</head>
<body>

<h2>Sửa hoa: <?= htmlspecialchars($flower['name']); ?></h2>

<form method="POST">
    <label>Tên hoa:</label><br>
    <input type="text" name="name" value="<?= htmlspecialchars($flower['name']); ?>" required><br><br>

    <label>Ảnh (path):</label><br>
    <input type="text" name="image" value="<?= htmlspecialchars($flower['image']); ?>" required><br><br>

    <label>Mô tả:</label><br>
    <textarea name="description" rows="4" required><?= htmlspecialchars($flower['description']); ?></textarea><br><br>

    <button type="submit">Cập nhật</button>
</form>

</body>
</html>
