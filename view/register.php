<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="ie=edge"> 
  <link rel="stylesheet"type="text/css" href="../css/register.css">
</head>

<html>
  <body>
    <div class="pg-title">登録</div>
    <form action="../controller/register_create.php" method="POST">
      <table>
        <tr><th>ID：</th><td><input type="text" name="user_id"></td></tr>
        <!-- <tr><th>メールアドレス：</th><td><input type="text" name="mail"></td></tr> -->
        <tr><th>パス：</th><td><input type="text" name="password"></td></tr>
        <tr><th colspan=2><input class="submit-btn" type="submit" value="登録"></th></tr>
      </table>
    </form>
  </body>
</html>