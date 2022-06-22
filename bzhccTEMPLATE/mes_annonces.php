<?php
session_start();
if(!isset($_SESSION["email"])){
header("Location : login.php");
}
include("inc/top.php");
require_once("Configs/connect_bdd.php");
require_once("Configs/config.php");
?>

<!-- debut de la partie contenu -->
<div class="main">
<div class="sidebar">
<div class="s-main">
	<div class="s_hdr">
		<h2>Catégories</h2>
	</div>
	<div class="text1-nav">
		<ul>
			<li><a href="">Jouets</a></li>
			<li><a href="">Jeux</a></li>
			<li><a href="">Livres</a></li>
			<li><a href="">Bijoux</a></li>
			<li><a href="">Voitures</a></li>
			<li><a href="">Locations</a></li>

	    </ul>
	</div>
</div>


</div>
<div class="content">


	<div class="clear"></div>
	
<div class="cnt-main btm">
	<div class="section group">
			<?php 
			$req = $conn -> prepare("SELECT id,title,price,DATE_FORMAT(date_creation,'%d/%m/%Y' )as date_creation_format,image,description,categorie , author_id, location,statut FROM annonces WHERE statut = :statut ORDER BY DESC");
            $req-> bindParam(':statut', $config["STATUTS"][0]);
			$req->execute();
			while($result= $req->fetch(PDO::FETCH_ASSOC)): ?>
				<div class="grid_1_of_3 images_1_of_3">
					 <a href="annonce.php"><img src="<?= $result["image"] ?>" alt=""/></a>
					 <a href="annonce.php"><h3><?= $result["title"] ?></h3></a>
					 <div class="cart-b">
					<span class="price left"><sup><?= $result["price"] . " " . "€" ?></sup><br>
					<sub><small><?= $result["date_creation_format"]?></small></sub></span>
				    <div class="btn top-right right"><a href="annonce.php">Ajouter à mes favoris</a></div>
				    <div class="clear"></div>
				 </div>
				</div>
				<?php endwhile ?>
			</div>
</div>
</div>

<div class="clear"></div>
</div>

<!-- fin de la partie contenu -->
<?php
include("inc/bottom.php");
?>
