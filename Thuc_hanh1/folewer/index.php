<?php
// Bao gồm file chứa mảng dữ liệu
include 'flowers.php';
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>14 Loài Hoa Xuân Hè Tuyệt Đẹp</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 0; line-height: 1.6; }
        .container { max-width: 800px; margin: 0 auto; padding: 20px; }

        /* Bài viết khách */
        .flower-item { margin-bottom: 30px; border-bottom: 1px dashed #ddd; padding-bottom: 20px; }
        .flower-item img { width: 100%; max-width: 350px; height: auto; display: block; margin: 15px 0; border-radius: 6px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); }
        .flower-item h3 { color: #8B4513; margin-top: 0; }

        /* Admin table */
        table { width: 100%; border-collapse: collapse; margin-top: 40px; }
        th, td { border: 1px solid #ccc; padding: 8px; text-align: center; }
        th { background-color: #f5f5f5; }
        img.table-img { width: 100px; height: 70px; object-fit: cover; border-radius: 6px; }

        .btn { padding: 5px 10px; border-radius: 4px; text-decoration: none; color: #fff; margin: 2px; }
        .btn-add { background-color: #28a745; }
        .btn-edit { background-color: #007bff; }
        .btn-delete { background-color: #dc3545; }

        h2 { margin-top: 40px; }
    </style>
</head>
<body>

<div class="container">

    <h1>14 Loài Hoa Xuân Hè Tuyệt Đẹp</h1>

    <!-- =====================
         Phần khách – bài viết
    ====================== -->
    <?php
    if (!empty($flowers_data)) {
        $count = 1;
        foreach ($flowers_data as $flower) {
            $display_count = ($count > 2) ? $count . ". " : '';
    ?>
        <div class="flower-item">
            <h3><?php echo $display_count . htmlspecialchars($flower['name']); ?></h3>
            <img src="<?php echo htmlspecialchars($flower['image']); ?>" alt="<?php echo htmlspecialchars($flower['name']); ?>">
            <p><?php echo htmlspecialchars($flower['description']); ?></p>
        </div>
    <?php
            $count++;
        }
    } else {
        echo "<p>Chưa có dữ liệu hoa nào.</p>";
    }
    ?>

    <!-- =====================
         Phần quản trị – Admin CRUD
    ====================== -->
    <h2>Quản trị danh sách hoa</h2>

    <a href="add.php" class="btn btn-add">+ Thêm hoa</a>

    <?php if (!empty($flowers_data)): ?>
        <table>
            <tr>
                <th>STT</th>
                <th>Ảnh</th>
                <th>Tên Hoa</th>
                <th>Mô tả</th>
                <th>Hành động</th>
            </tr>
            <?php foreach ($flowers_data as $i => $flower): ?>
                <tr>
                    <td><?= $i + 1 ?></td>
                    <td><img src="<?= htmlspecialchars($flower['image']) ?>" class="table-img"></td>
                    <td><?= htmlspecialchars($flower['name']) ?></td>
                    <td><?= htmlspecialchars($flower['description']) ?></td>
                    <td>
                        <a href="edit.php?id=<?= $i ?>" class="btn btn-edit">Sửa</a>
                        <a href="delete.php?id=<?= $i ?>" class="btn btn-delete"
                           onclick="return confirm('Bạn có chắc chắn muốn xóa hoa này?')">Xóa</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </table>
    <?php else: ?>
        <p>Chưa có dữ liệu hoa nào để quản trị.</p>
    <?php endif; ?>

</div>

</body>
</html>
