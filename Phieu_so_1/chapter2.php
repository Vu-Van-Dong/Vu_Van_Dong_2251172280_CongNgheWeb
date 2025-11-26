<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>PHT Chuong 2 - PHP Can Ban</title>
</head>
<body>
    <h1>Ket qua PHP Can Ban</h1>

    <?php
    // ============================
    // TODO 1: Khai bao bien
    // ============================
    $ho_ten = "Vu Van Dong";       // ten cua ban
    $diem_tb = 7.5;                // diem trung binh
    $co_di_hoc_chuyen_can = true;  // true hoac false

    // ============================
    // TODO 2: In ra thong tin
    // ============================
    echo "Ho ten: $ho_ten <br>";
    echo "Diem trung binh: $diem_tb <br>";
    echo "Chuyen can: " . ($co_di_hoc_chuyen_can ? "Co" : "Khong") . "<br><br>";

    // ============================
    // TODO 3: Cau truc IF / ELSE
    // ============================
    if ($diem_tb >= 8.5 && $co_di_hoc_chuyen_can) {
        echo "Xep loai: Gioi <br><br>";
    } elseif ($diem_tb >= 6.5 && $co_di_hoc_chuyen_can) {
        echo "Xep loai: Kha <br><br>";
    } elseif ($diem_tb >= 5.0 && $co_di_hoc_chuyen_can) {
        echo "Xep loai: Trung binh <br><br>";
    } else {
        echo "Xep loai: Yeu (Can co gang them!) <br><br>";
    }

    // ============================
    // TODO 4: Tao ham chao mung
    // ============================
    function chaoMung() {
        echo "Chuc mung ban da hoan thanh PHT Chuong 2!<br>";
    }

    // ============================
    // TODO 5: Goi ham
    // ============================
    chaoMung();

    // BONUS: vong lap for
    for ($i = 1; $i <= 5; $i++) {
        echo "Thong diep lap thu $i: Co gang hoc PHP nhe! <br>";
    }
    ?>

</body>
</html>
