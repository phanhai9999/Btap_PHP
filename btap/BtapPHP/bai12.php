<?php
// --- Kết nối Database ---
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "qlsinhvien";

$conn = new mysqli($servername, $username, $password, $dbname);

// Kiểm tra kết nối
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// --- Xử lý thêm sinh viên ---
if (isset($_POST['submit'])) {
    $hoten = $_POST['hoten'];
    $namsinh = $_POST['namsinh'];
    $lop = $_POST['lop'];

    $sql = "INSERT INTO sinhvien (hoten, namsinh, lop) 
            VALUES ('$hoten', '$namsinh', '$lop')";
    $conn->query($sql);
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Quản lý Sinh viên</title>
    <style>
        body {
            font-family: "Segoe UI", Tahoma, sans-serif;
            background: #f4fff8; /* nền xanh lá nhạt */
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 500px;
            margin: 30px auto;
            padding: 20px;
            background: #ffffff;
            border-radius: 10px;
            border: 1px solid #cce5cc;
            box-shadow: 0 2px 10px rgba(0,0,0,0.08);
        }

        h2 {
            text-align: center;
            font-size: 20px;
            color: #28a745; /* xanh lá đậm */
            margin-bottom: 15px;
        }

        form {
            margin-bottom: 20px;
        }

        label {
            display: block;
            margin: 6px 0 4px;
            font-size: 14px;
            color: #145a32; /* xanh lá đậm */
        }

        input[type="text"],
        input[type="number"] {
            width: 100%;
            padding: 8px;
            border-radius: 6px;
            border: 1px solid #b2dfb2;
            margin-bottom: 10px;
            background: #f9fff9;
            font-size: 14px;
            transition: 0.3s;
        }

        input[type="text"]:focus,
        input[type="number"]:focus {
            border-color: #28a745;
            background: #fff;
            outline: none;
        }

        input[type="submit"] {
            background: #28a745; /* nút xanh lá */
            color: white;
            padding: 8px 14px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
            font-size: 14px;
            transition: 0.3s;
        }

        input[type="submit"]:hover {
            background: #218838;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            font-size: 14px;
        }

        th, td {
            padding: 8px;
            border-bottom: 1px solid #d4edda;
            text-align: center;
        }

        th {
            background: #e9f7ef;
            color: #28a745;
            font-weight: 600;
        }

        tr:hover {
            background: #f6fff9;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Thêm Sinh viên</h2>
        <form method="POST">
            <label>Họ tên:</label>
            <input type="text" name="hoten" required>

            <label>Năm sinh:</label>
            <input type="number" name="namsinh" required>

            <label>Lớp:</label>
            <input type="text" name="lop" required>

            <input type="submit" name="submit" value="Thêm">
        </form>

        <h2>Danh sách</h2>
        <table>
            <tr>
                <th>ID</th>
                <th>Họ tên</th>
                <th>Năm sinh</th>
                <th>Lớp</th>
            </tr>

            <?php
            $result = $conn->query("SELECT * FROM sinhvien");
            while ($row = $result->fetch_assoc()) {
                echo "<tr>
                        <td>{$row['id']}</td>
                        <td>{$row['hoten']}</td>
                        <td>{$row['namsinh']}</td>
                        <td>{$row['lop']}</td>
                      </tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>
