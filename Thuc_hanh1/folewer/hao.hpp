<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>14 Loài Hoa Xuân Hè Tuyệt Đẹp</title>
    <style>
        .container { max-width: 800px; margin: 0 auto; padding: 20px; font-family: Arial, sans-serif; line-height: 1.6; }
        .article-meta { margin-bottom: 20px; font-size: 0.9em; color: #666; }
        .article-meta span { margin-right: 15px; }
        .intro-text { margin-bottom: 30px; border-bottom: 1px solid #eee; padding-bottom: 15px; }
        .flower-item { margin-bottom: 30px; border-bottom: 1px dashed #ddd; padding-bottom: 20px; }
        .flower-item img { width: 100%; max-width: 350px; height: auto; display: block; margin: 15px 0 15px 0; border-radius: 6px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); }
        .flower-item h3 { color: #8B4513; margin-top: 0; }
        .note { background-color: #f9f9f9; padding: 10px; border-left: 4px solid #4CAF50; margin-top: 20px; }
    </style>
</head>
<body>

    <?php
        // Bao gồm file chứa mảng dữ liệu
        include 'flowers.php';

       ?>

    <div class="container">
        
    
        
      
        
        <?php
            if (!empty($flowers_data)) {
                $count = 1;
                foreach ($flowers_data as $flower) {
                    // Ẩn số thứ tự cho hoa đầu tiên (theo format bài gốc)
                    $display_count = ($count > 2) ? $count . ". " : '';
        ?>
            
            <div class="flower-item">
                
                <h3><?php echo $display_count . htmlspecialchars($flower['name']); ?></h3>
                
                <img src="<?php echo htmlspecialchars($flower['image']); ?>" 
                     alt="<?php echo htmlspecialchars($flower['name']); ?>">

                <p><?php echo htmlspecialchars($flower['description']); ?></p>

            </div>
        
        <?php
                    $count++;
                }
            }
        ?>
    </div>

</body>
</html>