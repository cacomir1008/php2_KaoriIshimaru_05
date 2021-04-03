<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <title>みんなの本棚</title>
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
                <div class="navbar-header"><a class="navbar-brand" href="select_book.php">自分の本棚へ</a></div>
            </div>
        </nav>
    </header>
    <!-- Head[End] -->

    <!-- Main[Start] -->
    <!-- データベースに記録していく -->
    <form method="POST" action="insert_book.php">
        <div class="jumbotron">
            <fieldset>
                <legend>これから読みたい本</legend>
                <label>タイトル：<input type="text" name="book_title"></label><br>
                <label>URL：<input type="text" name="book_url"></label><br>
                <label><textArea name="book_comment" rows="4" cols="40"></textArea></label><br>
                <!-- こっそりuserのidとnameを渡す -->
                <input type="hidden" name="id" value="<?=$_SESSION["id"]?>"><br>
                <input type="hidden" name="id" value="<?=$_SESSION["user_name"]?>"><br>
                <!-- こっそりbookTable>done_flgを0で渡す（登録時点では読み終わっていないため）-->
                <input type="hidden" name="done_flg" value="0"><br>
                <input type="submit" value="送信">
            </fieldset>
        </div>
    </form>
    <!-- Main[End] -->


</body>

</html>
