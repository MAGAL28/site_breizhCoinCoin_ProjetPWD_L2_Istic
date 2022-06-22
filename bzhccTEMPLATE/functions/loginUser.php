<?php
use LDAP\Result;

require_once(dirname(__FILE__)."/../Configs/connect_bdd.php");

$passswordToHash = $_POST["password"] . $config["SECRET_KEY"];
$hash = md5($passswordToHash);

$req = $conn -> prepare('SELECT * FROM users WHERE email = :email AND password = :password');
$req->bindParam(':email',$_POST['email']);
$req->bindParam(':password',$hash);
$req->execute();
$result = $req->fetch();
if(!$result){
    header("Location:../login.php?message=Identifiant ou Mot de passe incorrect");
}else {
    session_start();
    $_SESSION["email"] = $result["email"];
    $_SESSION["id"] = $result["id"];
    $_SESSION["role"] = $result["role"];

   header("Location:../index.php");
}
?>
