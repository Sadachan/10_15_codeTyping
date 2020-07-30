<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="ie=edge"> 
  <link rel="stylesheet"type="text/css" href="../css/register.css">
</head>

<html>
  <body>
    <div class="pg-title">ログイン</div>
    <form action="../controller/login-act.php" method="POST">
      <table>
        <tr><th>ID：</th><td><input type="text" name="user_id"></td></tr>
        <tr><th>パス：</th><td><input type="text" name="password"></td></tr><br>
        <tr><td colspan="2"><input class="submit-btn" type="submit" value="ログイン"></td></tr>
      </table>
    </form>
  </body>
</html>