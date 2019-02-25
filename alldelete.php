<?php
session_start();
// 関数ファイルの読み込み
include('functions.php');
chk_ssid();

//1. GETデータ取得
// $id   = $_GET['id'];

//2. DB接続します(エラー処理追加)
$pdo = db_conn();

//3．データ登録SQL作成
$sql = 'DELETE FROM gs_bm_table'; //★すべて削除する。
$stmt = $pdo->prepare($sql);
// $stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

//4．データ登録処理後
if ($status==false) {
    errorMsg($stmt);
} else {
    //select.phpへリダイレクト
    header('Location: select.php');
    exit;
}