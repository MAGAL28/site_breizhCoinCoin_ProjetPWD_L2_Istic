<?php 
require_once(dirname(__FILE__)."/../Configs/connect_bdd.php");

$req = $conn->prepare("DELETE FROM annonces WHERE id = :advert_id ");
$req->bindParam(":advert_id",$_GET["advert_id"]);
$req->execute();
header("Location:../index.php?message=L'annonce à bien été supprimé");
