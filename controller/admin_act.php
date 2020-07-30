<?php
  include('../dbConection.php');
  
  //var_dump($_POST);
  $language=$_POST['language'];
  $title=$_POST['title'];
  $sentence=$_POST['sentence'];

  $pdo=dbconnect();
  $sql="INSERT INTO examSentences(id, language,title,sentence) VALUES(NULL,:language,:title,:sentence)";
  $stmt=$pdo->prepare($sql);
  $stmt->bindvalue(':language',$language,PDO::PARAM_STR);
  $stmt->bindvalue(':title',$title,PDO::PARAM_STR);
  $stmt->bindvalue(':sentence',$sentence,PDO::PARAM_STR);
  $status=$stmt->execute();

  if($status==false){
    $error=$stmt->errorInfo();
    exit('sqlError'.$error[2]);
  }else{
    //成功時処理
    header("Location:../view/admin.php");
  }
