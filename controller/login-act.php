<?php
  include('../dbConection.php');
  session_start();
  

  $pdo=dbconnect();
  $stmt=$pdo->prepare('select * from user where user_id=?');
  $status=$stmt->execute([$_POST['user_id']]);

  
  if($status==false){
    $error=$stmt->errorInfo();
    echo json_encode(["error_msg"=>"{$error[2]}"]);
    exit();
  }else{
    $val=$stmt->fetch(PDO::FETCH_ASSOC);
  }
  
  if(!$val){
    echo "<p>ログイン情報に誤りがあります</p>";
    echo "<a href='../view/login.php'>戻る</a>";
    exit();
  }else{
    $_SESSION['user']=[
      'user_id'=>$val['user_id'],
      'password'=>$val['password']
    ];
    // var_dump($val['user_id']);
    // exit();
    header('Location:../index.php');
  }
  
?>

  