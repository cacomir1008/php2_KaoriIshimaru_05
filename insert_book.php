<?php

// 共通関数読み込み　
include('funcs.php');

// --------------------------------
// ①ログイン認証
loginCheck();

session_start();

//1. POSTデータ取得
$book_title = $_POST['book_title'];
$book_url = $_POST['book_url'];
$book_comment = $_POST['book_comment'];
// こっそり渡されたdone_flgを受け取る（value：0）
$done_flg = $_POST['done_flg'];

//2. DB接続

$pdo = dbConnect();

//３．データ登録SQL作成

// ①.SQL文を用意（sysdateは関数なので()必要）
// $stmt = statementの略（そのSQLを指す）他の変数名でも良いが、慣習としてstmtが使われている
// :〜　仮の変数（SQL無効化　フォームから送られて来る内容をそのまま書くのではなく、一旦バインド変数に入れる）
// prepare()関数を使用するためには、Pdoオブジェクトを生成する必要がある
// $pdo->prepare() 接続したDBに対して、実行するプリペアドステートメントのSQLをセット
$stmt = $pdo->prepare(
  "INSERT INTO
  gs_bm_table(book_id,id,user_name,book_title,book_url,book_comment,added,done_flg)
 VALUES(
   NULL,:id,:user_name,:book_title,:book_url,:book_comment,sysdate(),:done_flg)"
 );

//  ②.バインド変数（SQL文に埋め込む変数）を用意　仮の変数（:~）をここに入れる
$stmt->bindValue(':book_title', $book_title, PDO::PARAM_STR);  
$stmt->bindValue(':book_url', $book_url, PDO::PARAM_STR);  
$stmt->bindValue(':book_comment', $book_comment, PDO::PARAM_STR);  
$stmt->bindValue(':id', $_SESSION["id"], PDO::PARAM_INT);  //こっそり受け取ったuserのidをデータベースに格納
$stmt->bindValue(':user_name', $_SESSION["user_name"], PDO::PARAM_STR);  //こっそり受け取ったuserのidをデータベースに格納
$stmt->bindValue(':done_flg', $done_flg, PDO::PARAM_INT);  //こっそり受け取ったdone_flgの値（0）をデータベースに格納

//  ③.実行
$status = $stmt->execute();

//  ④データ登録処理後
if($status==false){
  //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
  $error = $stmt->errorInfo();
  exit("ErrorMessage:". print_r($error, true));
}else{
  // ⑤select_book.phpへリダイレクト
  header('Location:select_book.php');
}
?>
