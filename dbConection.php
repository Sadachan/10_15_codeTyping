<?php

function dbconnect(){
  $dbn="mysql:dbname=codeTyping;charset=utf8;port=3306;host=localhost";
  $user="root";
  $pwd="";

  try{
    $pdo=new PDO($dbn,$user,$pwd);
  }catch(PDOException $e){
    echo json_encode(["db error"=>"{$e->getMessage()}"]);
  }
  return $pdo;
}
