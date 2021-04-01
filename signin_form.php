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
                <div class="navbar-header"><a class="navbar-brand" href="select_book.php">みんなの本棚</a></div>
            </div>
        </nav>
    </header>
    <!-- Head[End] -->

    <!-- Main[Start] -->
    <!-- データベースに記録していく -->
    <form method="POST" action="insert_user.php">
        <div class="jumbotron">
            <fieldset>
                <legend>会員登録</legend>
                <label>表示名：<input type="text" name="user_name"></label><br>
                <label>ログインID：<input type="text" name="user_id"></label><br>
                <label>ログインPW：<input type="text" name="user_pw"></label><br>
                <input type="submit" value="登録">
            </fieldset>
        </div>
    </form>
    <!-- Main[End] -->


</body>

</html>
