<?php
$result = "";

function factorial($n, &$steps) {
    $res = 1;
    $steps = [];
    for ($i = $n; $i >= 1; $i--) {
        $res *= $i;
        $steps[] = $i;
    }
    return $res;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $n = max(0, intval($_POST["n"]));
    $steps = [];
    $value = factorial($n, $steps);
    $stepsStr = $n > 0 ? implode(" × ", $steps) . " = " : "";
    $result = "<strong>$n!</strong> = $stepsStr<strong style='color:#00796b'>$value</strong>";
}
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8" />
    <title>Bài 6 - Giai thừa</title>
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
            line-height: 1.6;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Bài 6: Tính giai thừa</h2>
        <form method="post">
            <label for="n">Nhập số nguyên không âm (n):</label>
            <input type="number" id="n" name="n" min="0" required>
            <button type="submit">Tính</button>
        </form>

        <?php if ($result): ?>
            <div class="result"><?= $result ?></div>
        <?php endif; ?>
    </div>
</body>
</html>
