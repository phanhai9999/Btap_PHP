<?php
function checkSNT($n): bool
{
    if ($n < 2) return false;
    for ($i = 2; $i * $i <= $n; $i++) {
        if ($n % $i == 0) return false;
    }
    return true;
}

$from = isset($_POST['from']) ? (int)$_POST['from'] : 1;
$to   = isset($_POST['to'])   ? (int)$_POST['to']   : 100;

$sum = null;
$listSNT = [];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if ($from > $to) {
        [$from, $to] = [$to, $from];
    }
    for ($i = $from; $i <= $to; $i++) {
        if (checkSNT($i)) {
            $sum += $i;
            $listSNT[] = $i;
        }
    }
}
?>
<!doctype html>
<html lang="vi">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Tổng số nguyên tố</title>
    <style>
        :root {
            --primary: #00897b;
            --accent: #4db6ac;
            --background: #e0f7f5;
            --text: #212121;
            --card: #ffffff;
            --border: #b2dfdb;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, Helvetica, sans-serif;
            background: var(--background);
            color: var(--text);
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        /* Container chính */
        .container {
            width: 100%;
            max-width: 700px;
            background: var(--card);
            border: 1px solid var(--border);
            border-radius: 12px;
            padding: 24px 28px;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        }

        /* Tiêu đề */
        h1 {
            font-size: 24px;
            margin-bottom: 8px;
            color: var(--primary);
            font-weight: bold;
        }

        /* Mô tả phụ */
        .sub {
            font-size: 14px;
            color: #555;
            margin-bottom: 20px;
        }

        /* Form nhập liệu */
        .form {
            display: flex;
            flex-wrap: wrap;
            gap: 12px;
            margin-bottom: 20px;
        }

        /* Ô input */
        .input {
            flex: 1;
            min-width: 120px;
            padding: 10px;
            border-radius: 8px;
            border: 1px solid var(--accent);
            font-size: 14px;
            outline: none;
        }

        /* Nút tính tổng */
        .button {
            background: var(--primary);
            color: #fff;
            border: none;
            padding: 10px 18px;
            border-radius: 8px;
            cursor: pointer;
            font-weight: bold;
            font-size: 14px;
            transition: background 0.3s ease;
        }

        .button:hover {
            background: #00695c;
        }

        /* Thẻ hiển thị kết quả */
        .card {
            background: #f9f9f9;
            border: 1px solid var(--border);
            border-radius: 10px;
            padding: 16px;
            margin-top: 10px;
        }

        /* Nhãn nhỏ "Kết quả" */
        .badge {
            background: var(--accent);
            color: white;
            font-size: 12px;
            padding: 2px 10px;
            border-radius: 100px;
            display: inline-block;
            margin-bottom: 10px;
        }

        /* Danh sách số nguyên tố */
        .primes {
            display: flex;
            flex-wrap: wrap;
            gap: 6px;
            margin-top: 10px;
            max-height: 200px;
            overflow-y: auto;
        }

        /* Mỗi số nguyên tố là 1 tag */
        .tag {
            background: var(--primary);
            color: white;
            padding: 4px 10px;
            font-size: 12px;
            border-radius: 999px;
        }

        /* Ghi chú nhỏ */
        .note {
            font-size: 13px;
            color: #444;
            margin-top: 8px;
        }
    </style>
</head>

<body>
    <div class="container">
        <h1>Tổng các số nguyên tố</h1>
        <p class="sub">Nhập khoảng cần tính (mặc định 1 → 100). Kết quả sẽ hiển thị bên dưới.</p>
        <form method="post" class="form">
            <input class="input" type="number" name="from" value="<?= htmlspecialchars($from) ?>" placeholder="Từ">
            <input class="input" type="number" name="to" value="<?= htmlspecialchars($to)   ?>" placeholder="Đến">
            <button class="button" type="submit">Tính tổng</button>
        </form>

        <?php if ($sum !== null): ?>
            <div class="card">
                <div class="badge">Kết quả</div>
                <h3 style="margin:10px 0 6px">Khoảng: <?= $from ?> → <?= $to ?></h3>
                <p style="margin:6px 0">Có <strong><?= count($listSNT) ?></strong> số nguyên tố. Tổng = <strong><?= $sum ?></strong>.</p>
                <?php if ($listSNT): ?>
                    <div class="note">Danh sách số nguyên tố:</div>
                    <div class="primes">
                        <?php foreach ($listSNT as $p): ?>
                            <span class="tag"><?= $p ?></span>
                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>
</body>

</html>