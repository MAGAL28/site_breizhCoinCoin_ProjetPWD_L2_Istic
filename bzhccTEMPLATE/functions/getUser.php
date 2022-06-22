<?php 
require_once(dirname(__FILE__) . "/../Configs/connect_bdd.php");
 function  getUser($user_id){
     global $conn;
     $req = $conn->prepare("SELECT * from users WHERE id = : user_id");
     $req->bindParam(":user_id",$user_id);
     $req->execute();
     return $result = $req->fetch(PDO::FETCH_ASSOC);
 }