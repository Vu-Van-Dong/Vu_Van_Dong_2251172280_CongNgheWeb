<?php
// Đọc dữ liệu từ file Quiz.txt
$filename = 'Quiz.txt';
$content = '';

if (file_exists($filename)) {
    $content = file_get_contents($filename);
} else {
    $content = "File Quiz.txt không tồn tại!";
}

// Đổi các ký tự xuống dòng thành <br> để hiển thị trên trình duyệt
$content_html = nl2br(htmlspecialchars($content));
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Bài thi trắc nghiệm Android</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
            background-color: #f5f5f5;
        }
        .quiz-content {
            background-color: #fff;
            padding: 15px 20px;
            border-radius: 8px;
            box-shadow: 0 2px 5px rgba(0,0,0,0.1);
            white-space: pre-wrap;
        }
    </style>
</head>
<body>
    <h1>Bài thi trắc nghiệm Android</h1>
    <div class="quiz-content">
        <?= $content_html ?>
    </div>
</body>
</html>
