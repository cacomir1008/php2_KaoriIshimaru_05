<?php

// 共通関数読み込み　
include('funcs.php');

// --------------------------------
// ①ログイン認証
loginCheck();
// --------------------------------
// ②更新画面

// select_book.phpから渡されたidを、GETメソッドで取得 
$book_id = $_GET["book_id"];

// 1.  DB接続 
$pdo = dbConnect();

//２．データ取得SQL作成 ※WHEREで、idが一致するデータを取得する
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table WHERE book_id=:book_id");
// ↓$book_id　→ :book_id　↑ WHERE book_id = :book_idに入る
$stmt->bindValue(':book_id',$book_id, PDO::PARAM_INT);
$status = $stmt->execute();

//３．データ表示（idは1つなので、1レコードしか返ってこない）
$view = "";
if ($status == false) {
    //execute（SQL実行時にエラーがある場合）
    $error = $stmt->errorInfo();
    exit('ErrorQuery:' . print_r($error, true));
}else{
    // 1レコードのみ抽出するため、whileでなくてOK
    $row = $stmt->fetch();
}
// ?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>未来の本棚</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        div {
            padding: 10px;
            font-size: 16px;
        }
    </style>
</head>

<body>

    <!-- Head[Start] -->
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header"><a class="navbar-brand" href="select_book.php">未来の本棚へ</a></div>
            </div>
        </nav>
    </header>
<!-- 更新データを表示し、書き換えられるようにする -->
<!-- $rowをvalueに追加 -->
<form method="POST" action="done.php">
        <div class="jumbotron">
            <fieldset>
                <legend>読んだ本の感想を登録して、みんなに公開しよう</legend>
                <label>タイトル：<input type="text" name="book_title" value="<?=$row["book_title"]?>"></label><br>
                <label>URL：<input type="text" name="book_url" value="<?=$row["book_url"]?>"></label><br>
                <label><textArea name="book_comment" rows="4" cols="40"><?=$row["book_comment"]?></textArea></label><br>
                <!-- idをこっそり渡す（hidden） -->
                <input type="hidden" name="book_id" value="<?=$row["book_id"]?>">
                <!-- done_flgを1にしてこっそり渡す（読み終わった） -->
                <input type="hidden" name="done_flg" value="1">
                <input type="hidden" name="user_name" value="<?=$row["user_name"]?>">
                <input type="submit" value="公開">
            </fieldset>
        </div>
    </form>
    <!-- Main[End] -->


</body>

</html>

