<?php
session_start();

// 入力チェック
if(
    !isset($_POST['username']) || $_POST['username']=='' ||
    !isset($_POST['lid']) || $_POST['lid']=='' ||
    !isset($_POST['lpw']) || $_POST['lpw']==''
){
    exit('ParamError');
}

include('functions.php');
chk_ssid();

//POSTデータ取得
$username = $_POST['username'];
$lid = $_POST['lid'];
$lpw = $_POST['lpw'];
$utype = $_POST['utype'];
$edtype = $_POST['edtype'];

$pdo = db_conn();

//データ登録SQL作成
$sql ='INSERT INTO user_table values (null,:a1,:a2,:a3,:a4,:a5)';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':a1', $username, PDO::PARAM_STR);    //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a2', $lid, PDO::PARAM_STR);   //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a3', $lpw, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a4', $utype, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$stmt->bindValue(':a5', $edtype, PDO::PARAM_STR);  //Integer（数値の場合 PDO::PARAM_INT)
$status = $stmt->execute();

//書籍ブックマーク情報を登録するテーブルをユーザごとに作成
$sql2 ='CREATE TABLE IF NOT EXISTS `gs_bm_table_'.$username.'` (
`id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `name` varchar(64) NOT NULL,
  `url` text NOT NULL,
  `comment` text NOT NULL,
  `indate` datetime NOT NULL,
  INDEX(id)
) ENGINE=InnoDB DEFAULT CHARSET=utf8';
$stmt2 = $pdo->prepare($sql2);
$status2 = $stmt2->execute();

//４．データ登録処理後
if ($status==false || $status2==false) {
    //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
    $error = $stmt->errorInfo();
    $error2 = $stmt2->errorInfo();
    exit('sqlError:'.$error[2].'---'.$error2[2]);
} else {
    //５．index.phpへリダイレクト
    header('Location: user_index.php');
}
