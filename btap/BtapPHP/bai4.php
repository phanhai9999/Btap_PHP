<?php
session_start(); 

$msg = "";
$final = "";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $v = floatval($_POST["so"]);
    if ($v == 0) {
        $final = "Số đã nhập: <strong>" . 
        (isset($_SESSION["seq"]) && count($_SESSION["seq"]) 
        ? implode(", ", $_SESSION["seq"]) 
        : "—") . "</strong>";

        session_unset();
        session_destroy(); // reset cho lần sau
    } else {
        $_SESSION["seq"][] = $v;
        $msg = "Đã ghi nhận: <strong>$v</strong> (nhập 0 để kết thúc)";
    }
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8" />
    <title>Bài 4 - Nhập số đến khi 0</title>
    <style>
        :root {
            --primary: #00897b;
            --accent: #4db6ac;
            --bg: #e0f7f5;
            --card: #ffffff;
            --text: #212121;
            --border: #b2dfdb;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            background: var(--bg);
            color: var(--text);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            background: var(--card);
            padding: 30px 32px;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            max-width: 500px;
            width: 90%;
            border: 1px solid var(--border);
        }

        h2 {
            font-size: 22px;
            margin-bottom: 16px;
            color: var(--primary);
        }

        label {
            display: block;
            margin-bottom: 6px;
            font-weight: bold;
        }

        input[type="number"] {
            width: 100%;
            padding: 10px;
            border: 1px solid var(--accent);
            border-radius: 8px;
            font-size: 14px;
            margin-bottom: 16px;
            outline: none;
        }

        button {
            background: var(--primary);
            color: white;
            border: none;
            padding: 10px 18px;
            border-radius: 8px;
            font-weight: bold;
            cursor: pointer;
            transition: background 0.3s ease;
        }

        button:hover {
            background: #00695c;
        }

        .result {
            margin-top: 18px;
            padding: 14px 16px;
            background: #f9f9f9;
            border: 1px solid var(--border);
            border-radius: 8px;
            font-size: 15px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Bài 4: Nhập số cho đến khi gặp số 0 thì dừng</h2>
        <form method="post">
            <label for="so">Nhập một số (0 để dừng):</label>
            <input type="number" id="so" name="so" step="any" required>
            <button type="submit">Nhập</button>
        </form>

        <?php if ($msg): ?>
            <div class="result"><?= $msg ?></div>
        <?php endif; ?>

        <?php if ($final): ?>
            <div class="result"><?= $final ?></div>
        <?php endif; ?>
    </div>
</body>
</html>
