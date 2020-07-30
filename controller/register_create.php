<?php 
  include('../dbConection.php');
  session_start();
  var_dump($_POST);

  $user_id=$_POST['user_id'];
  $password=$_POST['password'];

  $pdo=dbconnect();

  $sql=$pdo->prepare('select * from user where mail=?');
  $sql->execute([$user_id]);


  if(empty($sql->fetchAll())){
    //データ登録SQL作成
    $sql="INSERT INTO user(id,user_id,password)VALUES(Null,:user_id,:password)";

    //SQL準備&実行
    $stmt=$pdo->prepare($sql);
    $stmt->bindValue(':user_id',$user_id,PDO::PARAM_STR);
    $stmt->bindValue(':password',$password,PDO::PARAM_STR);
    $status=$stmt->execute();
    
    //セッションのためにセレクト文投げる
    $sql=$pdo->prepare('select * from user where user_id=?');
    $sql->execute([$user_id]);
    foreach($sql->fetchAll() as $row){
      $user_id=$row['user_id'];
    }

    //データ登録処理後
    if($status==false){
      //SQL実行に失敗した場合はここでエラーを出力し、以降の処理を中止する
      $error=$stmt->errorInfo();
      exit('sqlError'.$error[2]);
    }else{
      $_SESSION['user']=[
        'id'=>$user_id,
        'password'=>$password
      ];
      header('Location:../');
    }
  }else{
    echo 'メールアドレスがすでに使用されています。';
  }

 