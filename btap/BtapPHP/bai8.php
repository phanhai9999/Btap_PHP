<?php
$result = "";
$error = "";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $raw = trim($_POST['numbers'] ?? '');
    // tách theo dấu phẩy hoặc khoảng trắng
    $parts = preg_split('/[,\s]+/', $raw, -1, PREG_SPLIT_NO_EMPTY);
    
    $nums = [];  // chap nhan so nguyen
    foreach ($parts as $p) {
        if (is_numeric($p)) {
            $nums[] = intval($p);
        }
    }

    if (count($nums) < 10) {
        $error = "Vui lòng nhập ít nhất 10 số nguyên (sử dụng dấu phẩy hoặc khoảng trắng để phân tách). Hiện có " . count($nums) . " số hợp lệ.";
    } else {
        // lấy đúng 10 phần tử đầu
        $arr = array_slice($nums, 0, 10);
        $soduong = 0;
        $soam = 0;
        $zero = 0;
        foreach ($arr as $v) {
            if ($v > 0) $soduong++;
            elseif ($v < 0) $soam++;
            else $zero++;
        }

        $result = [
            'array' => $arr,
            'positive' => $soduong,
            'negative' => $soam,
            'zero' => $zero,
            'tbc' => $tbc
        ];      
    }
}
?>
<!doctype html>
<html lang="vi">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <title>Bài 8 - Đếm số âm, dương</title>
    <style>
        :root {
            --primary: #00897b;
            --accent: #4db6ac;
            --bg: #e0f7f5;
            --card: #ffffff;
            --text: #212121;
            --border: #b2dfdb;
            --error: #b71c1c;
            --error-bg: #ffe5e5;
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
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .container {
            max-width: 700px;
            width: 100%;
            background: var(--card);
            padding: 30px 32px;
            border-radius: 12px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
            border: 1px solid var(--border);
        }

        h2 {
            font-size: 22px;
            margin-bottom: 16px;
            color: var(--primary);
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        textarea {
            width: 100%;
            min-height: 100px;
            padding: 10px;
            border-radius: 8px;
            border: 1px solid var(--accent);
            font-size: 14px;
            resize: vertical;
            margin-bottom: 10px;
            outline: none;
        }

        .hint {
            font-size: 13px;
            color: #555;
            margin-top: -4px;
            margin-bottom: 12px;
        }

        .controls {
            margin-top: 10px;
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

        .error {
            margin-top: 14px;
            padding: 14px 16px;
            background: var(--error-bg);
            border: 1px solid var(--error);
            color: var(--error);
            border-radius: 8px;
            font-size: 14px;
        }

        code {
            background: #e0f2f1;
            padding: 2px 6px;
            border-radius: 4px;
            font-family: monospace;
        }
    </style>
</head>

<body>
    <div class="container">
        <h2>Bài 8: Khởi tạo mảng 10 phần tử — Đếm số âm & dương</h2>

        <form method="post" novalidate>
            <label for="numbers">Nhập 10 số nguyên (phân tách bằng dấu phẩy hoặc khoảng trắng):</label>
            <textarea id="numbers" name="numbers"
                placeholder="Ví dụ: 5, -3, 0, 8, -7, 4, -1, 9, -6, 2"><?php echo isset($_POST['numbers']) ? htmlspecialchars($_POST['numbers']) : '5, -3, 0, 8, -7, 4, -1, 9, -6, 2'; ?></textarea>
            <div class="hint">Lưu ý: nếu bạn nhập nhiều hơn 10 số thì chương trình sẽ lấy 10 số đầu; nếu ít hơn 10 số sẽ
                báo lỗi.</div>

            <div class="controls">
                <button type="submit">Xử lý</button>
            </div>
        </form>

        <?php if ($error): ?>
            <div class="error"><?php echo htmlspecialchars($error); ?></div>
        <?php endif; ?>

        <?php if ($result): ?>
            <div class="result">
                <p><strong>Mảng (10 phần tử):</strong> <code><?php echo implode(", ", $result['array']); ?></code></p>
                <p><strong>Số phần tử dương:</strong> <?php echo $result['positive']; ?></p>
                <p><strong>Số phần tử âm:</strong> <?php echo $result['negative']; ?></p>
                <p><strong>Số phần tử bằng 0:</strong> <?php echo $result['zero']; ?></p>
            </div>
        <?php endif; ?>
    </div>
</body>

</html>