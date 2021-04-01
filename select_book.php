<?php
// 共通関数読み込み　
// ※require_onceとincludeは基本同じ
// 違い：require_onceは失敗するとその場でSTOP、includeはそのまま進めてくれる
include('funcs.php');

// --------------------------------
// ①ログイン認証
loginCheck();
// $namePreview = 
// --------------------------------
// ②登録した本の表示

//1.DB接続
$pdo = dbConnect();

//２．データ取得SQL作成 
// 自分が登録した　かつ　読み終わっていない（done_flg:0）の本のみ取得
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table WHERE id = {$_SESSION["id"]} AND done_flg=0");
$status = $stmt->execute();

//３．データ表示
$view = "";
if ($status == false) {
    //execute（SQL実行時にエラーがある場合）
    $error = $stmt->errorInfo();
    exit('ErrorQuery:' . print_r($error, true));
}else{
    //Selectデータの数だけ自動でループしてくれる
    // おまじない　1つずつ情報を取得し、$resultに入れる
    while( $result = $stmt->fetch(PDO::FETCH_ASSOC)){
        $addDate= h($result['added']);
        $title= h($result['book_title']);
        $url=h($result['book_url']);
        $comment= h($result['book_comment']);
        $done_flg = h($result['done_flg']);

        // $view .='<tr>' .'<td>'.$addDate.'</td>'.'<td>'.'<a href ="'.$url.'">'.$title.'</a>'.'</td>'.'<td>'.$comment.'</td>'.'</tr>';
       $view .= '<tr>';
        // 登録日
       $view .= '<td>';
       $view .= $addDate;
       $view .= '</td>';

        // タイトル
       $view .= '<td>';
       $view .= "<a href ='$url'>".$title."</a>";
       $view .= '</td>';

        // コメント
       $view .= '<td>';
       $view .= $comment;
       $view .= '</td>';

        // done_flg確認用
        // $view .= '<td>';
        // $view .= $done_flg;
        // $view .= '</td>';

       //  更新ボタン
       //  $book_id ごとに更新ページへリンク
       $view .= '<td>';
       $view .= '<a href="edit_view.php?book_id='.$result['book_id'].'">'."更新".'</a>';
       $view .= '</td>';

       //  削除ボタン
       //  $book_id ごとに削除
       $view .= '<td>';
       $view .= '<a href="delete.php?book_id='.$result['book_id'].'">'."削除".'</a>';
       $view .= '</td>';

       //   読み終わったボタン（done_flgを0→1に）
       $view .= '<td>';
       $view .= '<a href="done_view.php?book_id='.$result['book_id'].'">'."読んだ".'</a>';
       $view .= '</td>';
       $view .= '</tr>';
    }
}
?>

<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>みんなの本棚</title>
<link rel="stylesheet" href="css/range.css">
<link href="css/bootstrap.min.css" rel="stylesheet">
<style>div{padding: 10px;font-size:16px;}</style>
</head>
<body id="main">
<!-- Head[Start] -->
<header>
    <nav class="navbar navbar-default">
    <div class="container-fluid">
        <div class="navbar-header">
        <span class="navbar-brand"><?= $_SESSION["user_name"] ?>さんの本棚/</span>
        <a class="navbar-brand" href="index_form.php">▶︎読みたい本を登録する/</a>
        <a class="navbar-brand" href="index.php">みんなの本棚を見る/</a>
        <a class="navbar-brand" href="logout.php">Logout</a>
        </div>
    </div>
    </nav>
</header>
<!-- Head[End] -->

<!-- Main[Start] -->

    <span><font size="3">読んだボタンを押すと、みんなに感想が公開されるよ！</span>
        <div class="container">
            <div class="table-responsive">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>登録日</th>
                            <th>タイトル・リンク</th>
                            <th>感想</th>
                        </tr> 
                    </thead>
                <tbody>
                    <?= $view ?>
                </tbody>
                </table>
            </div>
        </div>
<!-- Main[End] -->

</body>
</html>
