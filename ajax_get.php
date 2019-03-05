<?php
include('functions.php');

//DB接続
$pdo = db_conn();

//データ表示SQL作成
$sql = 'SELECT * FROM gs_bm_table';
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

//データ表示
if ($status==false) {
    errorMsg($stmt);
} else {
    $res = [];
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $res[] = $result;
    }
    echo json_encode($res);
}
?>