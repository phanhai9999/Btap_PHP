<?php
$result = "";

function formatTime($seconds) {
    $hours = floor($seconds / 3600);
    $minutes = floor(($seconds % 3600) / 60);
    $secs = $seconds % 60;

    // Định dạng 2 chữ số: 01:02:09
    return sprintf("%02d:%02d:%02d", $hours, $minutes, $secs);
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $input = max(0, intval($_POST["seconds"]));
    $formatted = formatTime($input);
    $result = "<strong>$input</strong> giây = <strong style='color:#00796b'>$formatted</strong> (hh:mm:ss)";
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Chuyển đổi giây → giờ:phút:giây</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background: #e0f7f5;
            color: #212121;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            background: white;
            padding: 30px 32px;
            border-radius: 12px;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
            border: 1px solid #b2dfdb;
            width: 100%;
            max-width: 450px;
        }

        h2 {
            font-size: 22px;
            color: #00897b;
            margin-bottom: 16px;
        }

        label {
            font-weight: bold;
            margin-bottom: 6px;
            display: block;
        }

        input[type="number"] {
            width: 100%;
            padding: 10px;
            font-size: 14px;
            border-radius: 8px;
            border: 1px solid #4db6ac;
            margin-bottom: 16px;
            outline: none;
        }

        button {
            background: #00897b;
            color: white;
            border: none;
            padding: 10px 18px;
            font-weight: bold;
            border-radius: 8px;
            cursor: pointer;
        }

        button:hover {
            background: #00695c;
        }

        .result {
            margin-top: 18px;
            padding: 14px 16px;
            background: #f9f9f9;
            border: 1px solid #b2dfdb;
            border-radius: 8px;
            font-size: 16px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Chuyển đổi giây sang giờ:phút:giây</h2>
        <form method="post">
            <label for="seconds">Nhập số giây:</label>
            <input type="number" id="seconds" name="seconds" min="0" required placeholder="Ví dụ: 3769">
            <button type="submit">Chuyển đổi</button>
        </form>

        <?php if ($result): ?>
            <div class="result"><?= $result ?></div>
        <?php endif; ?>
    </div>
</body>
</html>
