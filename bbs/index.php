<?php
session_start();
require('library.php');

if (isset($_SESSION['id']) && isset($_SESSION['name'])) {
    $id = $_SESSION['id'];
    $name = $_SESSION['name'];
} else {
    header('Location: login.php');
    exit();
}

$db = dbconnect();

//検索
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $search = filter_input(INPUT_POST, 'search', FILTER_SANITIZE_STRING);
    if ($search === '') {
        header('Location: index.php');
    } else {
        $_SESSION['search'] = $search;

        // 件数をカウント
        $search = "%".$_SESSION['search']."%";
        $record = $db->query("select count(*) as cnt from posts where message like '$search'");
        if (!$record) {
            die($db->error);
        }

        if ($record) {
        while ($cnt = $record->fetch_assoc()) {
                $_SESSION['cnt'] = $cnt['cnt'];
            }
        }
                header('Location: search.php');
    }
}

// メッセージの投稿
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $message = filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING);

    if ($message === '') {
        header('Location: index.php');
    } else {
        $stmt = $db->prepare('insert into posts (message, member_id) values(?, ?)');
        if (!$stmt) {
            die($db->error);
        }

        $stmt->bind_param('si', $message, $id);
        $success = $stmt->execute();
        if (!$success) {
            die($db->error);
        }

        header('Location: index.php');
        exit();
    }
}
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
        <div style="text-align: right"><a href="logout.php">ログアウト</a></div>


        <!-- 検索機能 -->
        <form action="" method="post" style="display: flex;">
            <label>
                <img src="images/search.png" width="30" heigth="30" style="vertical-align: bottom;">
                <input type="search" class="search-field" placeholder="検索 &hellip;" name="search" style="margin-top: 3px;"/>
            </label>
            <div><input type="submit" value="検索" style="width: 58px; height: 30px; margin-left: 20px; padding-bottom: 29px;"/></div>
        </form>
        


        <!-- 投稿 -->
        <form action="" method="post">
            <dl>
                <dt><?php echo h($name); ?>さん、メッセージをどうぞ</dt>
                <dd>
                    <textarea name="message" cols="50" rows="5"></textarea>
                </dd>
            </dl>
            <div>
                <p>
                    <input type="submit" value="投稿する"/>
                </p>
            </div>
        </form>

        <?php 
        $stmt = $db->prepare('select p.id, p.member_id, p.message, p.created, m.name, m.picture from posts p, members m where m.id = p.member_id order by id desc ');
        if (!$stmt) {
            die($db->error);
        }
        $success = $stmt->execute();
        if (!$success) {
            die($db->error);
        }

        $stmt->bind_result($id, $member_id, $message, $created, $name, $picture);
        while ($stmt->fetch()):?>
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