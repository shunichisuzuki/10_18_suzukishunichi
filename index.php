<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ログイン</title>
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
            <a class="navbar-brand" href="#">書籍ブックマークと一覧表示</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a id="ajax_get" class="nav-link" href="#">書籍一覧ページ</a>
                        <!-- <a id="ajax_get" class="nav-link" href="select_nologin.php">書籍一覧ページ</a> -->
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="index.php">ログイン</a>
                        <!-- <a id="ajax_get" class="nav-link" href="select_nologin.php">書籍一覧ページ</a> -->
                    </li>
                </ul>
            </div>
        </nav>
    </header>

    <form id="echo" method="post" action="login_act.php">
        <div class="form-group">
            <label for="lid">LoginID</label>
            <input type="text" class="form-control" id="lid" name="lid">
        </div>
        <div class=" form-group">
            <label for="lpw">Pass</label>
            <input type="password" class="form-control" id="lpw" name="lpw">
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </form>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
        // DBから取得したデータを表示する関数
        function listData(data) {
            // 書ける人は書いてみよう
            // console.log("件数:" + data.length);
            var str = '';
            // str += '<a id="ajax_get_id" class="nav-link" href="ajax_get.php?id">idでソート</a>';
            // console.log(data.length);
            for (var i = 0; i < data.length; i++) {
                // console.log(data[i].name);
                str += '<p>' + data[i].name + '__' + '<a href="' + data[i].url + '" target="_blank">' + data[i].name + '</a>' + '___' + data[i].comment + '</p>';
            }
            // console.log("listData was done.");
            // console.log(str);
            return str;
        }

        // DBからデータを取得する関数
        function selectData() {
            const url = 'ajax_get.php';
            $.getJSON(url)
                .done(function (data, textStatus, jqXHR) {
                    // console.log(data);
                    result = listData(data);
                    // console.log("result:" + result);
                    $('#echo').html(result);
                    // console.log("Done.");
                })
                .fail(function (jqXHR, textStatus, errorThrown) {
                    result = "failed.";
                    // console.log("Failed.");
                })
        }

        $('#ajax_get').on('click', function (data) {
            selectData();
        });

    </script>

</body>

</html>