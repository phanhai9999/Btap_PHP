<?php
// a. Tính tổng T = 1/2 + 2/3 + 3/4 + … + n/(n+1)
function sum_a($n) {
    $i = 1;
    $sum = 0;
    while ($i <= $n) {
        $sum += $i / ($i + 1);
        $i++;
    }
    return $sum;
}

// b. Tính tổng T = 1/2 + 1/4 + 1/6 + … 1/(n+2)
// với điều kiện e = 1/(n+2) > 0.0001
function sum_b() {
    $n = 0;
    $sum = 0;
    $e = 1 / ($n + 2);
    while ($e > 0.0001) {
        $sum += 1 / ($n + 2);
        $n += 2;
        $e = 1 / ($n + 2);
    }
    return $sum;
}

$resultA = $resultB = "";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $n = intval($_POST["number"]);
    $resultA = "<strong>Tổng chuỗi a</strong> (T = 1/2 + 2/3 + ... + n/(n+1)) với n = <strong>$n</strong> là: <span style='color:#00796b'>" . round(sum_a($n), 6) . "</span>";
    $resultB = "<strong>Tổng chuỗi b</strong> (T = 1/2 + 1/4 + 1/6 + ... 1/(n+2) với e > 0.0001) là: <span style='color:#00796b'>" . round(sum_b(), 6) . "</span>";
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Bài 2 - Tính tổng chuỗi</title>
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
        }

        body {
            font-family: Arial, sans-serif;
            background: var(--bg);
            color: var(--text);
            height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .container {
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 12px;
            padding: 30px 32px;
            max-width: 600px;
            width: 90%;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.1);
        }

        h2 {
            font-size: 22px;
            margin-bottom: 16px;
            color: var(--primary);
        }

        label {
            font-weight: bold;
            margin-bottom: 8px;
            display: block;
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
            background: #f9f9f9;
            border: 1px solid var(--border);
            padding: 14px 16px;
            border-radius: 8px;
            margin-top: 16px;
            font-size: 15px;
            line-height: 1.5;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Bài 2: Tính tổng chuỗi</h2>
        <form method="post">
            <label for="number">Nhập số n:</label>
            <input type="number" id="number" name="number" min="1" required placeholder="Ví dụ: 10">
            <button type="submit">Tính tổng</button>
        </form>

        <?php if ($resultA): ?>
            <div class="result"><?= $resultA ?></div>
            <div class="result"><?= $resultB ?></div>
        <?php endif; ?>
    </div>
</body>
</html>
