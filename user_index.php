<?php
session_start();

include('functions.php');
chk_ssid();
$pdo = db_conn();

//上部メニュー部分を kanri_flg により決定する。
$menu = menu_ureg_kanri();

$utype = '<br>　<input type="radio" id="utype"  name="utype" value="0" checked="checked">一般ユーザ';
$utype .= '<br>　<input type="radio" id="utype"  name="utype" value="1">管理ユーザ';

$edtype = '<br>　<input type="radio" id="edtype"  name="edtype" value="0" checked="checked">有効';
$edtype .= '<br>　<input type="radio" id="edtype"  name="edtype" value="1">無効';

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ユーザ登録とユーザ一覧表示</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <style>
        div{
            padding: 10px;
            font-size:16px;
            }
    </style>
</head>

<body>

    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">ユーザ登録</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <?=$menu?>
                </ul>
            </div>
        </nav>
    </header>

    <form action="user_insert.php" method="post">
        <div class="form-group">
            <label for="username">ユーザ名</label>
            <input type="text" class="form-control" id="username" name="username" required>
        </div>
        <div class="form-group">
            <label for="lid">ログインID１</label>
            <input type="text" class="form-control" id="lid" name="lid" required>
        </div>
        <div class="form-group">
            <label for="lpw">パスワード</label>
            <input type="text" class="form-control" id="lpw" name="lpw" required>
        </div>
        <div class="form-group">
            <label for="utype">ユーザの種類</label>
            <?=$utype?>
        </div>
        <div class="form-group">
            <label for="edtype">ユーザの有効/無効</label>
            <?=$edtype?>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>

</body>

</html>