<?php
// 共通関数読み込み　
include('funcs.php');

// postでデータ取得
$book_id =$_POST["book_id"];
$book_title =$_POST["book_title"];
$book_url =$_POST["book_url"];
$book_comment =$_POST["book_comment"];
// done_flgを1で受け取る（読み終わった）
$done_flg =$_POST["done_flg"];
$user_name =$_POST["user_name"];

// データベース接続
$pdo = dbConnect();

// update文で更新(bindValue) book_idが一致するデータのみ
$sql = 'UPDATE gs_bm_table 
SET book_title=:book_title,book_url=:book_url,book_comment=:book_comment,done_flg=:done_flg,user_name=:user_name
WHERE book_id =:book_id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':book_id', $book_id, PDO::PARAM_INT);  
$stmt->bindValue(':book_title', $book_title, PDO::PARAM_STR); 
$stmt->bindValue(':book_url', $book_url, PDO::PARAM_STR);  
$stmt->bindValue(':book_comment', $book_comment, PDO::PARAM_STR);  
$stmt->bindValue(':done_flg', $done_flg, PDO::PARAM_INT);  
$stmt->bindValue(':user_name', $user_name, PDO::PARAM_STR);  

//実行
$status = $stmt->execute();

//データ登録処理後
if($status==false){
    //SQL実行時にエラーがある場合（エラーオブジェクト取得して表示）
    $error = $stmt->errorInfo();
    exit("ErrorMessage:". print_r($error, true));
  }else{

// 一覧ページへリダイレクト
    header('Location:select_book.php');
  }

?>
