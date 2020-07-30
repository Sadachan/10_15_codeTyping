<!DOCTYPE html>
<html lang="ja">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="ie=edge"> 
   <link rel="stylesheet" type="text/css" href="css/style.css">
  <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
  <title></title>
</head>

<html>
  <body>
    <h2>問題文登録画面</h2>
    <table>
      <form action="../controller/admin_act.php" method="POST">
        <tr><th>タイトル</th><td><input type="text" name="title" style='height:40px; width:500px;'></td></tr>
        <tr><th>言語</th><td><select name="language" style='height:50px; width:500px;'><option>HTML・CSS</option><option>JS</option><option>PHP</option></select></td></tr>
        <tr><th>問題文</th><td><textarea name="sentence" style='height:300px; width:500px;'></textarea></td></tr>
        <tr><th></th><td><input type="submit" value="登録" style='height:50px; width:500px;'></td></tr>
      </form>
    </table>
  </body>
</html>