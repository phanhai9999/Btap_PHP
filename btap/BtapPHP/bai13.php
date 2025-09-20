<?php
// --- Kết nối DB ---
$conn = new mysqli("localhost", "root", "", "qlthuvien");
if ($conn->connect_error) {
    die("Kết nối thất bại: " . $conn->connect_error);
}

// --- Xử lý thêm tác giả ---
if (isset($_POST['add_tg'])) {
    $tentg = $_POST['tentacgia'];
    $namsinh = $_POST['namsinh'];
    $conn->query("INSERT INTO tacgia (tentacgia, namsinh) VALUES ('$tentg', '$namsinh')");
}

// --- Xử lý thêm sách ---
if (isset($_POST['add_sach'])) {
    $tensach = $_POST['tensach'];
    $namxb = $_POST['namxb'];
    $tacgia_id = $_POST['tacgia_id'];
    $conn->query("INSERT INTO sach (tensach, namxb, tacgia_id) VALUES ('$tensach','$namxb','$tacgia_id')");
}

// --- Xử lý xóa sách ---
if (isset($_GET['delete'])) {
    $id = $_GET['delete'];
    $conn->query("DELETE FROM sach WHERE id=$id");
}

// --- Xử lý tìm kiếm ---
$keyword = "";
if (isset($_POST['search'])) {
    $keyword = $_POST['keyword'];
    $sql = "SELECT sach.id, tensach, namxb, tentacgia 
            FROM sach 
            JOIN tacgia ON sach.tacgia_id = tacgia.id
            WHERE tensach LIKE '%$keyword%' OR tentacgia LIKE '%$keyword%'";
} else {
    $sql = "SELECT sach.id, tensach, namxb, tentacgia 
            FROM sach 
            JOIN tacgia ON sach.tacgia_id = tacgia.id";
}
$result = $conn->query($sql);

// Lấy danh sách tác giả cho dropdown
$tacgia_list = $conn->query("SELECT * FROM tacgia");
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Quản lý Thư viện</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #f0fff4; /* nền xanh lá nhạt */
            margin: 0;
            padding: 20px;
        }
        .container {
            max-width: 900px;
            margin: auto;
            background: #ffffff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 2px 8px rgba(0,0,0,0.15);
        }
        h2 {
            color: #2e7d32;
            border-bottom: 2px solid #a5d6a7;
            padding-bottom: 8px;
        }
        form {
            margin-bottom: 20px;
            background: #e8f5e9;
            padding: 15px;
            border-radius: 8px;
        }
        input[type="text"], input[type="number"], select {
            padding: 8px;
            border: 1px solid #a5d6a7;
            border-radius: 5px;
            width: 250px;
            margin: 5px 0;
        }
        input[type="submit"] {
            background: #4caf50;
            color: white;
            border: none;
            padding: 8px 15px;
            border-radius: 5px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background: #388e3c;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background: #ffffff;
        }
        th, td {
            border: 1px solid #c8e6c9;
            padding: 10px;
            text-align: center;
        }
        th {
            background: #a5d6a7;
            color: #1b5e20;
        }
        tr:nth-child(even) {
            background: #f1f8f6;
        }
        a {
            color: #d32f2f;
            text-decoration: none;
            font-weight: bold;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<div class="container">
    <h2>Thêm Tác giả</h2>
    <form method="POST">
        Tên tác giả: <input type="text" name="tentacgia" required>
        Năm sinh: <input type="number" name="namsinh">
        <input type="submit" name="add_tg" value="Thêm">
    </form>

    <h2>Thêm Sách</h2>
    <form method="POST">
        Tên sách: <input type="text" name="tensach" required><br><br>
        Năm XB: <input type="number" name="namxb" required><br><br>
        Tác giả: 
        <select name="tacgia_id" required>
            <option value="">--Chọn tác giả--</option>
            <?php while($tg = $tacgia_list->fetch_assoc()) {
                echo "<option value='{$tg['id']}'>{$tg['tentacgia']}</option>";
            } ?>
        </select><br><br>
        <input type="submit" name="add_sach" value="Thêm">
    </form>

    <h2>Tìm kiếm Sách</h2>
    <form method="POST">
        <input type="text" name="keyword" placeholder="Nhập tên sách hoặc tác giả" value="<?php echo $keyword; ?>">
        <input type="submit" name="search" value="Tìm">
    </form>

    <h2>Danh sách Sách</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Tên sách</th>
            <th>Năm XB</th>
            <th>Tác giả</th>
            <th>Hành động</th>
        </tr>
        <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['tensach']; ?></td>
                <td><?php echo $row['namxb']; ?></td>
                <td><?php echo $row['tentacgia']; ?></td>
                <td>
                    <a href="index.php?delete=<?php echo $row['id']; ?>" onclick="return confirm('Bạn có chắc muốn xóa không?');">Xóa</a>
                </td>
            </tr>
        <?php } ?>
    </table>
</div>
</body>
</html>
