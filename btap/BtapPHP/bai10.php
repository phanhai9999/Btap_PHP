<?php
// ===== Class Person =====
class Person {
    protected $hoTen;
    protected $ngaySinh;
    protected $queQuan;

    public function __construct($hoTen, $ngaySinh, $queQuan) {
        $this->hoTen = $hoTen;
        $this->ngaySinh = $ngaySinh;
        $this->queQuan = $queQuan;
    }

    public function getThongTin() {
        return [
            'Họ tên' => $this->hoTen,
            'Ngày sinh' => $this->ngaySinh,
            'Quê quán' => $this->queQuan
        ];
    }
}

// ===== Class SinhVien kế thừa Person =====
class SinhVien extends Person {
    private $lop;

    public function __construct($hoTen, $ngaySinh, $queQuan, $lop) {
        parent::__construct($hoTen, $ngaySinh, $queQuan);
        $this->lop = $lop;
    }

    public function getThongTinSinhVien() {
        $thongTin = parent::getThongTin();
        $thongTin['Lớp'] = $this->lop;
        return $thongTin;
    }
}

// ===== Khởi tạo và lấy thông tin =====
$sv = new SinhVien("Nguyễn Phan Hải", "19-02-2004", "Hà Nội", "CNTT3 - K63");
$thongTin = $sv->getThongTinSinhVien();
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thông tin sinh viên</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #e0f7f5;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        .card {
            background: white;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0,0,0,0.1);
            width: 360px;
            border: 1px solid #b2dfdb;
        }

        h2 {
            text-align: center;
            color: #00897b;
            margin-bottom: 20px;
        }

        .info p {
            margin: 8px 0;
            font-size: 16px;
        }

        .label {
            font-weight: bold;
            color: #00796b;
        }
    </style>
</head>
<body>
    <div class="card">
        <h2>Thông tin sinh viên</h2>
        <div class="info">
            <?php foreach ($thongTin as $label => $value): ?>
                <p><span class="label"><?= $label ?>:</span> <?= htmlspecialchars($value) ?></p>
            <?php endforeach; ?>
        </div>
    </div>
</body>
</html>
