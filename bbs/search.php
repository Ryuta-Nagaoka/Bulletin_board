<?php
session_start();
require('library.php');


// セッションで値を受け取る
$search = "%".$_SESSION['search']."%";
$cnt = $_SESSION['cnt'];

?>
<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ひとこと掲示板</title>

    <link rel="stylesheet" href="style.css"/>
</head>

<body>
<div id="wrap">
    <div id="head">
        <h1>ひとこと掲示板</h1>
    </div>
    <div id="content">
        <p>&laquo;<a href="index.php">一覧にもどる</a></p>
        <?php

        $db = dbconnect();
          
        ?>

        
        <?php // 検索結果を表示
        $stmt = $db->prepare('select p.id, p.member_id, p.message, p.created, m.name, m.picture from posts p left join members m on p.member_id=m.id where message like ? order by id desc');
        if (!$stmt) {
            die($db->error);
        }

        $stmt->bind_param('s', $search);
        $success = $stmt->execute();
        if (!$success) {
            die($db->error);
        } 

        $stmt->bind_result($id, $member_id, $message, $created, $name, $picture);

        $search = $_SESSION['search'];
        ?>

        <?php if (!$cnt == 0): ?>
          <p><?php echo '”' . $search . '” ' . 'に関する内容が' . $cnt . '件ヒットしました'; ?></p>
        <?php else: ?>
          <p><?php echo '”' . $search . '” ' . 'に一致する検索結果はありませんでした'; ?></p>
        <?php endif; ?>
        <?php while ($stmt->fetch()):?>
        <div class="msg">
            <img src="member_picture/<?php echo h($picture); ?>" width="48" height="48" alt=""/>
            <p><?php echo htmlspecialchars(mb_substr($message, 0, 20)); ?><span class="name"> (<?php echo h($name); ?>)</span></p>
            <p class="day"><a href="view.php?id=<?php echo h($id); ?>"><?php echo h($created); ?></a>
            <?php if ($_SESSION['id'] === $member_id): ?>
                [<a href="delete.php?id=<?php echo h($id); ?>" style="color: #F33;">削除</a>]
            <?php endif; ?>
            </p>
        </div>
        <?php endwhile; ?>
    </div>
</div>
</body>

</html>