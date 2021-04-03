<?php
// 共通関数読み込み　
// ※require_onceとincludeは基本同じ
// 違い：require_onceは失敗するとその場でSTOP、includeはそのまま進めてくれる
include('funcs.php');

//1.DB接続
$pdo = dbConnect();

//２．データ取得SQL作成 
// 読み終わった（done_flg:1）の本のみ取得（誰が登録したかは関係なし）
$stmt = $pdo->prepare("SELECT * FROM gs_bm_table WHERE done_flg=1");
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
        $user_name = h($result['user_name']);

        // $view .='<tr>' .'<td>'.$addDate.'</td>'.'<td>'.'<a href ="'.$url.'">'.$title.'</a>'.'</td>'.'<td>'.$comment.'</td>'.'</tr>';
       $view .= '<tr>';
        // 登録日
       $view .= '<td>';
       $view .= $addDate;
       $view .= '</td>';

        // 登録した人
       $view .= '<td>';
       $view .= $user_name;
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
        <div class="navbar-header"><a class="navbar-brand" href="signin_form.php">初めての方はユーザー登録</a></div>
        <div class="navbar-header"><a class="navbar-brand" href="login.php">登録済みの方はログイン</a></div>

        </div>
    </div>
    </nav>
</header>
<!-- Head[End] -->

<span><font size="3">みんなが読んだ本</span>
    <div class="container">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>登録日</th>
                        <th>登録した人</th>
                        <th>タイトル・リンク</th>
                        <th>感想</th>
                    </tr> 
                </thead>
                    <?= $view ?>
            </table>
        </div>
    </div>
<!-- Main[End] -->

</body>
</html>
