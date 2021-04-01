<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <title>Login</title>
    <style>
        div {
            padding: 10px;
            font-size: 16px;
        }
    </style>
</head>
<header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header"><span class="navbar-brand">みんなの本棚</a></div>
            </div>
        </nav>
    </header>
<body>
<form method="POST" action="login_act.php">
        <div class="jumbotron">
            <fieldset>
                <legend>ログイン</legend>
                <label>ID：<input type="text" name="login_id"></label><br>
                <label>PW：<input type="text" name="login_pw"></label><br>
                <!-- こっそりidを渡す -->
                <input type="hidden" name="id" value="<?=$row["id"]?>"><br>
                <input type="submit" value="login">
            </fieldset>
        </div>
    </form>
</body>
</html>




