<?php

require_once(dirname(__FILE__)."/../Configs/connect_bdd.php");
if($_POST["password"] != $_POST["confirmPassword"]){
    header("Location: ../sinscrite.php?message=Les deux mots de passe ne correspondent pas !");
}
$passswordToHash = $_POST["password"] . $config["SECRET_KEY"];
$hash = md5($passswordToHash);

$req = $conn -> prepare("INSERT INTO users(prenom,nom,email,password,newsletter) VALUE(:prenom,:nom,:email,:password,:newsletter)");

$req->bindParam(":prenom",$_POST["prenom"]);
$req->bindParam(":nom",$_POST["nom"]);
$req->bindParam(":email",$_POST["email"]);
$req->bindParam(":password",$hash);
$req->bindParam(":newsletter",$_POST["checkbox"]);
$req -> execute();
$message = "Votre comptre est bien enregistré";

header("Location:../login.php?message=$message&type=success");
/*$req = $conn->prepare('INSERT INTO users (nom,prenom,email,password,newsletter) VALUES (? , ? , ? , ? , ?)');
$req->execute(array($_POST["nom"], $_POST["prenom"],$_POST["email"],$_POST["password"],$_POST["checkbox"]));

/*$req = $conn -> prepare("INSERT INTO test(nom,prenom) VALUE(:nom,:prenom)");
$req->bindParam(":nom",$_POST["nom"]);
$req->bindParam(":prenom",$_POST["prenom"]);
$req -> execute();*/
