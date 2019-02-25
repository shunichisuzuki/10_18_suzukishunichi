<?php

include('functions.php');
$pdo = db_conn();

//SQL文におけるバッファを有効にする。
//gs_bm_table_xxx(ユーザテーブル)の数を数えるための処理のために必要。
$pdo->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);

// ■ 登場人物 ■
// gs_bm_table：全ユーザのお気に入り書籍情報を格納するテーブル
// gs_bm_table_xxx：1ユーザのお気に入り書籍情報を格納するテーブル
//   (xxxはユーザ名)

// ■ 全体の流れ ■
//(1)gs_bm_table の全行を削除して初期化する。
//(2)show tables コマンドの実行結果から、gs_bm_tableに情報を
//   突っ込む対象テーブル名を抽出。
//(3)(2)で取得したテーブル名を使用してselect文を実行し、
//   その結果をgs_bm_tableに挿入する。
//(4)gs_bm_tableの内容を取得する。

// ■ (1) ■
//全ユーザのお気に入り書籍情報を格納するテーブル(gs_bm_table)を
//初期化(カラム全削除)する。
$sql = "DELETE FROM gs_bm_table";
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

// ■ (2) ■
//gs_bm_tableに情報を格納する対象ユーザテーブルを取得する。
//MySQLが内部で管理している情報を使用する。

//show tables：MySQLが保持しているテーブル情報一覧を取得する。
//from gs_f02_db18：対象DBを絞り込む。
//like 'gs_bm_table_%'：テーブル名を曖昧検索で絞り込む。
$sql = "show tables from gs_f02_db18 like 'gs_bm_table_%';";

//SQL文の実行結果を配列に格納するために必要な処理。
$stmt = $pdo->prepare($sql,array(PDO::ATTR_CURSOR => PDO::CURSOR_SCROLL));
$status = $stmt->execute();

//$row[0]にテーブル名が保持されているので、配列$dataに格納する。
$data=array();
$i=0;
while ($row = $stmt->fetch(PDO::FETCH_NUM, PDO::FETCH_ORI_NEXT)) {
    $data[$i] = $row[0];
    ++$i;
}

// ■ (3) ■
//配列$dataに格納したテーブルのselect結果をgs_bm_tableに挿入。
for($j=0;$j<$i;$j++){
    $tname = $data[$j];
    $sql = "INSERT INTO gs_bm_table (name,url,comment,indate) SELECT s.name,s.url,s.comment,s.indate FROM ".$tname." AS s;";
    $stmt2 = $pdo->prepare($sql);
    $status = $stmt2->execute();
    $stmt2 = null;
}

// ■ (4) ■
//gs_bm_tableに格納された全ユーザのお気に入り書籍情報をselect。
$stmt3 = $pdo->prepare("SELECT * FROM gs_bm_table");
$status = $stmt3->execute();

//3. データ表示
$view='';
if ($status==false) {
    //execute（SQL実行時にエラーがある場合）
    $error = $stmt3->errorInfo();
    exit('sqlError:'.$error[2]);
} else {
    while ($result = $stmt3->fetch(PDO::FETCH_ASSOC)) {
        $view .= '<li class="list-group-item">';
        $view .= '<p>'.$result['name'].'___'.'<a href="'.$result['url'].'" target="_blank">'.$result['name'].'</a>'.'___'.$result['comment'].'</p>';
        $view .= '<a href="detail_nologin.php?id='.$result['id'].'" class="badge badge-primary">Edit</a>';
        $view .= '</li>';
    }
}
?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>書籍ブックマークと一覧表示</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <style>
        div {
            padding: 10px;
            font-size: 16px;
        }
    </style>
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">お気に入り書籍一覧</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">ログイン</a>
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <div>
        <ul class="list-group">
            <!-- ここにDBから取得したデータを表示しよう -->
            <?=$view?>
        </ul>
    </div>

</body>

</html>