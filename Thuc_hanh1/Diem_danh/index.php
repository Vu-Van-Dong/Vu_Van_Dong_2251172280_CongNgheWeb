<?php
$filename = '65HTTT_Danh_sach_diem_danh.csv';
$records = [];

if (file_exists($filename)) {
    // Mở file CSV
    if (($handle = fopen($filename, "r")) !== false) {
        // Lấy dòng đầu làm header
        $header = fgetcsv($handle, 1000, ",");
        
        // Đọc từng dòng dữ liệu
        while (($data = fgetcsv($handle, 1000, ",")) !== false) {
            $records[] = array_combine($header, $data);
        }
        fclose($handle);
    }
} else {
    echo "File $filename không tồn tại!";
    exit;
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Danh sách điểm danh lớp 65HTTT</title>
    <style>
        body { font-family: Arial; padding: 20px; background-color: #f5f5f5; }
        h1 { text-align: center; margin-bottom: 20px; }
        table { width: 100%; border-collapse: collapse; background: #fff; }
        th, td { border: 1px solid #ddd; padding: 8px; text-align: center; }
        th { background-color: #007bff; color: #fff; }
        tr:nth-child(even) { background-color: #f2f2f2; }
    </style>
</head>
<body>
    <h1>Danh sách điểm danh lớp 65HTTT</h1>
    <table>
        <thead>
            <tr>
                <?php foreach ($header as $colName): ?>
                    <th><?= htmlspecialchars($colName) ?></th>
                <?php endforeach; ?>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($records as $record): ?>
                <tr>
                    <?php foreach ($record as $value): ?>
                        <td><?= htmlspecialchars($value) ?></td>
                    <?php endforeach; ?>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>
