<?php 
  include('../dbConection.php');
  session_start();
  var_dump($_POST);

  $user_id=$_POST['user_id'];
  $inputCount=$_POST['inputCount'];
  $wrongCount=$_POST['wrongCount'];
  $percentageForCollect=$_POST['percentageForCollect'];
  $score=$_POST['score'];

  $pdo=dbconnect();

  $sql='INSERT INTO ranking(id,user_id,type,misstype,collectpercentage,score)VALUES(NULL,:user_id,:inputCount,:wrongCount,:percentageForCollect,:score)';
  $stmt=$pdo->prepare($sql);
  $stmt->bindValue(':user_id',$user_id,PDO::PARAM_STR);
  $stmt->bindValue(':inputCount',$inputCount,PDO::PARAM_INT);
  $stmt->bindValue(':wrongCount',$wrongCount,PDO::PARAM_INT);
  $stmt->bindValue(':percentageForCollect',$percentageForCollect,PDO::PARAM_INT);
  $stmt->bindValue(':score',$score,PDO::PARAM_INT);
  $status=$stmt->execute();

  if($status==false){
    $error=$stmt->errorInfo();
    echo json_encode(["error_msg"=>"{$error[2]}"]);
    //exit();
  }else{
    $stmt->fetch(PDO::FETCH_ASSOC);
    header("Location:../view/ranking_list.php");
  }
  