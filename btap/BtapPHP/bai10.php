<?php
class Person
{
    public $hoTen;
    public $ngaySinh;
    public $queQuan;

    public function __construct($hoTen, $ngaySinh, $queQuan)
    {
        $this->hoTen = $hoTen;
        $this->ngaySinh = $ngaySinh;
        $this->queQuan = $queQuan;
    }
}

class SinhVien extends Person
{
    public $lop;

    public function __construct($hoTen, $ngaySinh, $queQuan, $lop)
    {
        parent::__construct($hoTen, $ngaySinh, $queQuan);
        $this->lop = $lop;
    }

    public function getInfo()
    {
        return [
            "Họ và tên" => $this->hoTen,
            "Ngày sinh" => $this->ngaySinh,
            "Quê quán" => $this->queQuan,
            "Lớp" => $this->lop
        ];
    }
}

$result = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $hoTen = $_POST["hoTen"];
    $ngaySinh = $_POST["ngaySinh"];
    $queQuan = $_POST["queQuan"];
    $lop = $_POST["lop"];

    $sv = new SinhVien($hoTen, $ngaySinh, $queQuan, $lop);
    $info = $sv->getInfo();

    $result = "<ul>";
    foreach ($info as $key => $value) {
        $result .= "<li><strong>$key:</strong> $value</li>";
    }
    $result .= "</ul>";
}
?>

<!DOCTYPE html>
<html lang="vi">

<head>
    <meta charset="UTF-8">
    <title>Bài 10 - Thông tin Sinh viên</title>
    <style>
        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, Helvetica, Arial, sans-serif;
            background: #f0fff5; /* xanh lá nhạt */
            color: #333;
            margin: 0;
            padding: 20px;
        }

        .container {
            max-width: 600px;
            margin: auto;
            background: #ffffff;
            padding: 20px;
            border-radius: 12px;
            border: 1px solid #a4e7c3;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        }

        h2 {
            color: #198754; /* xanh lá */
            border-bottom: 2px solid #a4e7c3;
            padding-bottom: 10px;
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-weight: 600;
            color: #14532d;
        }

        input[type="text"],
        input[type="date"] {
            width: 100%;
            padding: 10px;
            border-radius: 6px;
            border: 1px solid #a4e7c3;
            background: #f6fff9;
            color: #333;
            margin-bottom: 15px;
            transition: 0.3s;
        }

        input[type="text"]:focus,
        input[type="date"]:focus {
            border-color: #198754;
            outline: none;
            background: #ffffff;
        }

        button {
            background-color: #198754; /* xanh lá */
            color: white;
            border: none;
            padding: 10px 15px;
            border-radius: 6px;
            cursor: pointer;
            font-weight: 600;
            transition: 0.3s;
        }

        button:hover {
            background-color: #157347;
        }

        .result {
            margin-top: 15px;
            padding: 15px;
            background: #d2f4e8;
            border: 1px solid #a4e7c3;
            border-radius: 8px;
        }

        ul {
            list-style: none;
            padding-left: 0;
        }

        li {
            margin: 6px 0;
            color: #14532d;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Bài 10: Thông tin Sinh viên</h2>
        <form method="post">
            <label for="hoTen">Họ và tên:</label>
            <input type="text" id="hoTen" name="hoTen" required>

            <label for="ngaySinh">Ngày sinh:</label>
            <input type="date" id="ngaySinh" name="ngaySinh" required>

            <label for="queQuan">Quê quán:</label>
            <input type="text" id="queQuan" name="queQuan" required>

            <label for="lop">Lớp:</label>
            <input type="text" id="lop" name="lop" required>

            <button type="submit">Hiển thị thông tin</button>
        </form>

        <?php if ($result): ?>
            <div class="result">
                <h3>Thông tin cá nhân</h3>
                <?= $result ?>
            </div>
        <?php endif; ?>
    </div>
</body>

</html>