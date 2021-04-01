<?php

// 共通関数読み込み　
include('funcs.php');

// GETでID取得
$book_id =$_GET["book_id"];

// データベース接続
$pdo = dbConnect();

// update文で更新(bindValue) book_idが一致するデータのみ
$sql = 'DELETE FROM gs_bm_table WHERE book_id =:book_id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':book_id', $book_id, PDO::PARAM_INT);  
 
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