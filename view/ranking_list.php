<?php

include('../dbConection.php');

$pdo=dbconnect();
$sql='SELECT * FROM ranking ORDER BY score DESC LIMIT 10';
$stmt=$pdo->prepare($sql);
$status=$stmt->execute();

if($status==false){
  $error=$stmt->errorInfo();
  exit('sqlError'.$error[2]);
}else{
  //成功時処理
  $results=$stmt->fetchAll();
  $output='';
  $rank=1;
  $output.='<table>';
  $output.='<tr><th>ランク</th><th>ユーザID</th><th>スコア</th><th>タイプ数</th><th>ミスタイプ数</th><th>正答率</th></tr>';
  forEach($results as $result){
    $output.='<tr>';
    $output.='<td>'.$rank.'</td>';
    $output.='<td>'.$result['user_id'].'</td>';
    $output.='<td>'.$result['score'].'</td>';
    $output.='<td>'.$result['type'].'</td>';
    $output.='<td>'.$result['misstype'].'</td>';
    $output.='<td>'.$result['collectpercentage'].'%</td>';
    $output.='</tr>';
    $rank+=1;
  }
  $output.='</table>';
}
?>

<style>
  body{
    background-image:url('../img/bg2.png');
    background-size:100vw 100vh;
  }
  table{
    color:#000;
    margin:0 auto;
    margin-top:30vh;
  }
  td{
    text-align:center;
  }
</style>
<?=$output?>