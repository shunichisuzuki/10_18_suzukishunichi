<?php
// 共通で使うものを別ファイルにしておきましょう。

// DB接続関数（PDO）
function db_conn()
{
    $dbname = 'gs_f02_db18';
    $db = 'mysql:dbname='.$dbname.';charset=utf8;port=3306;host=localhost';
    $user = 'root';
    $pwd = '';
    try {
        return new PDO($db, $user, $pwd);
    } catch (PDOException $e) {
        exit('dbError:'.$e->getMessage());
    }
}

// SQL処理エラー
function errorMsg($stmt)
{
    $error = $stmt->errorInfo();
    exit('ErrorQuery:'.$error[2]);
}

// SESSIONチェック＆リジェネレイト
function chk_ssid()
{
    // 失敗時はログイン画面に戻る（セッションidがないor一致しない）
    if (!isset($_SESSION['chk_ssid']) || $_SESSION['chk_ssid']!=session_id()) {
        header('Location: login.php');
    } else {
        session_regenerate_id(true); // セッションidの再生成
        $_SESSION['chk_ssid'] = session_id(); // セッション変数に格納
    }
}

// menuを決める
function menu_all()
{
    $menu = '<li class="nav-item"><a class="nav-link" href="index_login.php">書籍ブックマーク</a></li><li class="nav-item"><a class="nav-link" href="select.php">お気に入り書籍一覧</a></li>';
    $menu .= '<li class="nav-item"><a class="nav-link" href="user_index.php">ユーザ登録</a></li><li class="nav-item"><a class="nav-link" href="user_select.php">ユーザ管理・一覧</a></li>';
    $menu .= '<li class="nav-item"><a class="nav-link" href="logout.php">ログアウト</a></li>';
    $menu .= '<li class="nav-item">'.$_SESSION['name'].'でログイン中</li>';
    return $menu;
}

function menu()
{
    $menu = '<li class="nav-item"><a class="nav-link" href="index_login.php">書籍ブックマーク</a></li>';
    $menu .= '<li class="nav-item"><a class="nav-link" href="logout.php">ログアウト</a></li>';
    $menu .= '<li class="nav-item">'.$_SESSION['name'].'でログイン中</li>';
    return $menu;
}

function menu_mark()
{
    $menu = '<li class="nav-item"><a class="nav-link" href="select.php">お気に入り書籍一覧</a></li>';
    $menu .= '<li class="nav-item"><a class="nav-link" href="logout.php">ログアウト</a></li>';
    $menu .= '<li class="nav-item">'.$_SESSION['name'].'でログイン中</li>';
    return $menu;
}

function menu_blist_kanri()
{
    $menu = '<li class="nav-item"><a class="nav-link" href="index_login.php">書籍ブックマーク</a></li>';
    $menu .= '<li class="nav-item"><a class="nav-link" href="user_index.php">ユーザ登録</a></li><li class="nav-item"><a class="nav-link" href="user_select.php">ユーザ管理・一覧</a></li>';
    $menu .= '<li class="nav-item"><a class="nav-link" href="logout.php">ログアウト</a></li>';
    $menu .= '<li class="nav-item">'.$_SESSION['name'].'でログイン中</li>';
    return $menu;
}

function menu_bmark_kanri()
{
    $menu = '<li class="nav-item"><a class="nav-link" href="select.php">お気に入り書籍一覧</a></li>';
    $menu .= '<li class="nav-item"><a class="nav-link" href="user_index.php">ユーザ登録</a></li><li class="nav-item"><a class="nav-link" href="user_select.php">ユーザ管理・一覧</a></li>';
    $menu .= '<li class="nav-item"><a class="nav-link" href="logout.php">ログアウト</a></li>';
    $menu .= '<li class="nav-item">'.$_SESSION['name'].'でログイン中</li>';
    return $menu;
}

function menu_ureg_kanri()
{
    $menu = '<li class="nav-item"><a class="nav-link" href="index_login.php">書籍ブックマーク</a></li><li class="nav-item"><a class="nav-link" href="select.php">お気に入り書籍一覧</a></li>';
    $menu .= '<li class="nav-item"><a class="nav-link" href="user_select.php">ユーザ管理・一覧</a></li>';
    $menu .= '<li class="nav-item"><a class="nav-link" href="logout.php">ログアウト</a></li>';
    $menu .= '<li class="nav-item">'.$_SESSION['name'].'でログイン中</li>';
    return $menu;
}

function menu_ulist_kanri()
{
    $menu = '<li class="nav-item"><a class="nav-link" href="index_login.php">書籍ブックマーク</a></li><li class="nav-item"><a class="nav-link" href="select.php">お気に入り書籍一覧</a></li>';
    $menu .= '<li class="nav-item"><a class="nav-link" href="user_index.php">ユーザ登録</a></li>';
    $menu .= '<li class="nav-item"><a class="nav-link" href="logout.php">ログアウト</a></li>';
    $menu .= '<li class="nav-item">'.$_SESSION['name'].'でログイン中</li>';
    return $menu;
}

?>
