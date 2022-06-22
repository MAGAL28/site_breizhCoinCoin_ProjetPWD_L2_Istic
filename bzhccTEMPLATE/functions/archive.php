<?php
require_once(dirname(__FILE__) . "/../Configs/connect_bdd.php");
session_start();
if($_GET["action"]==="archived"){
    $req = $conn->prepare("UPDATE annonces SET statut = :statut WHERE id = :archive_id");
    $req->bindParam(":statut",$_GET["action"]);
    $req->bindParam(":archive_id",$_GET["archive_id"]);
    $req->execute();

   
}
if($_GET["action"]==="in_progress"){

    $req = $conn->prepare("UPDATE annonces SET statut = :statut , author_id = :author_id WHERE id = :archive_id");
    $req->bindParam(":statut",$_GET["action"]);
    $req->bindParam(":archive_id",$_GET["archive_id"]);
    $req->bindParam(":author_id",$_SESSION["id"]);
    $req->execute();
}

if($_GET["action"]==="created"){
    $newUser_id = NULL;
    $req = $conn->prepare("UPDATE annonces SET statut = :statut , author_id = :author_id WHERE id = :archive_id");
    $req->bindParam(":statut",$_GET["action"]);
    $req->bindParam(":archive_id",$_GET["archive_id"]);
    $req->bindParam(":author_id",$newUser_id);
    $req->execute();
}

header("Location:../annonce.php?message= Votre article a bien été archivé&id=" . $_GET["archive_id"]);