<?php
session_start();
if(!isset($_SESSION["email"])){
header("Location : login.php");
}
include("inc/top.php");
require_once("Configs/connect_bdd.php");
require_once("Configs/config.php");
$end = 6;
			$req = $conn -> prepare("SELECT id,title,price,DATE_FORMAT(date_creation,'%d/%m/%Y' )as date_creation_format,image,description,categorie , author_id, location,statut,user_id FROM annonces WHERE id = :id");
			$req->bindParam(':id',$_GET["id"]);
			$req->execute();

			$result= $req->fetch(PDO::FETCH_ASSOC);
			 ?>

<!-- debut de la partie contenu -->
<style>
	.pagination{
		width: 80px;
		height: 80px;
	}
</style>
<div class="main">
<?php if(isset($_GET["message"])) : ?>
<div class="alert alert-primary" role="alert">
<?= $_GET["message"] ?>
</div>
<?php endif ?>
<div class="details">
				  <div class="product-details">				
					<div class="images_3_of_2">
						<div id="container">
						   <div id="products_example">
							<div id="products">
								<div class="slides_container">
									<a href="#" target="_blank"><img src="images/<?= $result["image"] ?>" alt=""/></a>
								
								</div>
								<ul class="pagination" >
									<li><a href="#"><img src="images/<?= $result["image"] ?>" alt=""/></a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
				<div class="desc span_3_of_2">
					

						<h2><?= $result['title'] ?></h2>
						<p><?= $result['description'] ?></p>					
						<div class="price">
							<p>Prix: <span><?= $result['price'] . " " . "€"?></span></p>
						</div>
					
				
				
					<div class="wish-list">
						<ul>
							<li class="wish"><a href="#">Ajouter à mes favoris</a></li>
					
						</ul>
					</div>
					<!-- S'il sagit du propiétaire de l'annonce et que cette annonce n'est pas archivée -->
					<!-- Afficher bouton archiver et supprimer --> 
					<?php if($_SESSION['id']===$result["author_id"] && $result["statut"] !== $config["STATUTS"][2] ) : ?>
						<a href="functions/delate.php?advert_id=<?= $result["id"] ?>" class="btn btn-danger">Supprimer</a>
						<a href="functions/archive.php?archive_id=<?= $result["id"] ?>&action=archived" class="btn btn-primary">Archiver</a>
					<?php  endif ?>

					<?php if($_SESSION['id']===$result["author_id"] && $result["statut"] === $config["STATUTS"][2]) : ?>
						<a href="functions/delate.php?advert_id=<?= $result["id"] ?>"  class="btn btn-danger">Supprimer</a>
					<?php  endif ?>
				
					
					<!-- s'il sagit d'un helper, si persone ne s'occupe de l'annonce --> 
					<!-- Afficher le bouton participer -->
					<?php if($_SESSION["role"] === $config["ROLES"][0] && $result["statut"] === $config["STATUTS"][0] && $_SESSION['id'] !== $result["author_id"]) : ?>
						<a href="functions/archive.php?archive_id=<?= $result["id"] ?>&action=in_progress"  class="btn btn-success">Participer</a>
					<?php endif ?>

					<?php if($_SESSION["role"] === $config["ROLES"][0] && $result["statut"] === $config["STATUTS"][1]) : ?>
						
						<a href="functions/archive.php?archive_id=<?= $result["id"] ?>&action=created" class="btn btn-danger">annuler</a>
						
					<?php endif ?>
					

				</div>
			<div class="clear"></div>
		  </div>

	   
       		
   <div class="content_bottom">
   	<div class="text-h1 top1 btm">
			<h2>Annonces qui pourraient vous intéresser</h2>
	  	</div>
 <div class="div2">
        <div id="mcts1">
			<div class="w3l-img">
				<?php 
				$req = $conn->query("SELECT * FROM annonces ");
				while($donnees = $req->fetch()){
				if((strcmp($result["categorie"],$donnees["categorie"])==0) && $donnees["id"]!=$_GET["id"]){
					?>
					
					<img src="images/<?= $donnees["image"] ?>" alt=""/>
					
					<?php
				};
			}
			$req->closeCursor();
				 ?>
        		
			
			
		</div>
			<div class="clear"></div>	
        </div>
   		</div>

    	</div>

        </div>
<div class="sidebar">
<div class="s-main">
	<div class="s_hdr">
		<h2>Categories</h2>
	</div>
	<div class="text1-nav">
		<ul>
			<li><a href="">The standard chunk of Lorem gfd</a></li>
			<li><a href="">Duis a augue ac libero euismodf</a></li>
			<li><a href="">The standard chunk of Lorem Ips</a></li>
			<li><a href="">Duis a augue ac libero euismodd</a></li>
			<li><a href="">The standard chunk of Lorem gfd</a></li>
			<li><a href="">Duis a augue ac libero euismodf</a></li>
			<li><a href="">The standard chunk of Lorem Ips</a></li>
			<li><a href="">Duis a augue ac libero euismodd</a></li>
			<li><a href="">The standard chunk of Lorem gfd</a></li>
			<li><a href="">Duis a augue ac libero euismodf</a></li>
			<li><a href="">The standard chunk of Lorem Ips</a></li>
			<li><a href="">Duis a augue ac libero euismodd</a></li>
			<li><a href="">The standard chunk of Lorem Ips</a></li>
			<li><a href="">Duis a augue ac libero euismodd</a></li>
	    </ul>
	</div>
</div>
</div>
<div class="clear"></div>
</div>
<!-- fin de la partie contenu -->
<?php

include("inc/bottom.php");
?>