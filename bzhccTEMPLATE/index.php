<?php
session_start();
//if(!isset($_SESSION["email"])){
//header("Location : login.php");
//}
include("inc/top.php");
require_once("Configs/connect_bdd.php");
require_once("functions/getUser.php");
?>

<hr>
<?php 
$mail = $_SESSION["email"];
if(isset($mail)) {
echo '<center><p><a href="news-annonces.php" class="btn btn-success" role="button">Nouvelle Annonce</a></p></center>';
}
?>
<div class="main">
<?php if(isset($_GET["message"])) : ?>
		<?php if(isset($_GET["type"]) && $_GET["type"] === "success"){
						$classMessage = "alert alert-success alert-dismissible fade show";
					} else {
						$classMessage = "alert alert-danger alert-dismissible fade show";
					} ?>
				<div class="<?= $classMessage ?>">
					<?= $_GET["message"] ?>
					
				</div>
				<?php endif ?>
<div class="sidebar">
<div class="s-main">
	<div class="s_hdr">
		<?php 
		$req = $conn->query('SELECT COUNT(cat) as nbCat FROM categories');
		$donnees = $req->fetch();
		$req->closeCursor();
		
		?>
		<h2> <?= $donnees["nbCat"] ?> Catégories </h2>
	</div> 
	<div class="text1-nav">
		<?php 
		$req=$conn->query('SELECT * FROM categories');
		?>
        <ul>
		<?php
		while($donnees = $req->fetch())
		{ ?>
		<li><a href=""><?= $donnees['cat'] ?></a></li>
		<?php
		}
		$req->closeCursor();
		?>
	    </ul>
	</div>
	
</div>
<!-- Nombre admin-->
<div class="s-main">
	<div class="s_hdr">
		<?php 
		$req = $conn->query('SELECT COUNT(role) as nbAdmin FROM users WHERE role = "admin"');
		$admin = $req->fetch();
		$req->closeCursor();
		?>
		<h2>  Nombres d'Admin </h2>
	</div> 
	<div class="text1-nav">
		<center><h1><?= $admin["nbAdmin"]?></h1></center>
	</div>
	
</div>
<!-- Nombre membre-->
<div class="s-main">
	<div class="s_hdr">
		<?php 
		$req = $conn->query('SELECT COUNT(id) as nbMembre FROM users');
		$admin = $req->fetch();
		$req->closeCursor();
		?>
		<h2>  Nombres Membres </h2>
	</div> 
	<div class="text1-nav">
		<center><h1><?= $admin["nbMembre"]?></h1></center>
	</div>
	
</div>
<!-- Nombre Annonce-->
<div class="s-main">
	<div class="s_hdr">
		<?php 
		$req = $conn->query('SELECT COUNT(id) as nbAnnonce FROM annonces');
		$admin = $req->fetch();
		$req->closeCursor();
		?>
		<h2>  Nombres Annonces </h2>
	</div> 
	<div class="text1-nav">
		<center><h1><?= $admin["nbAnnonce"]?></h1></center>
	</div>
	
</div>

</div>

<div class="content">
	<div class="clear"></div>
	<div class="cnt-main">
	<?php 
	$a = session_id();
	if(empty($a)) : ?>
		<div class="s_btn">
			<ul>
				<li><h2>Bienvenue !</h2></li>
				<li><h3><a href="login.php">Se connecter</a></h3></li>
				<li><h2>Nouveau visiteur ?</h2></li>
				<li><h4><a href="sinscrire.php">S'enregistrer</a></h4></li>
				<div class="clear"></div>
			</ul>
		</div>
		
		<?php endif ?>

	<div class="grid">
	<div class="grid-img">
	<?php 
		$fin = 1;
		$req = $conn->prepare("SELECT id,title,price,DATE_FORMAT(date_creation,'%d/%m/%Y' )as date_creation_format,image,description,categorie , author_id, location,statut FROM annonces ORDER BY RAND() LIMIT $fin");
		$req->execute();
		while($result= $req->fetch(PDO::FETCH_ASSOC)): ?>
		<a href="annonce.php"><img src="images/<?= $result["image"] ?>" alt=""/></a>
	</div>
	<div class="grid-para">
		<h2><?= $result["title"] ?></h2>
		<h3>A vendre Joli produit</h3>
		<p><?= $result["description"] ?></p>
		<div class="btn top">
		<a href="annonce.php">Details&nbsp;<img src="images/marker2.png"></a>
		</div>
		<?php endwhile ?>	

		

	</div>
	<div class="clear"></div>
	</div>
</div>
<div class="cnt-main btm">
	<div class="section group">
			<?php 
			$end = 6;
			$req = $conn -> prepare("SELECT id,title,price,DATE_FORMAT(date_creation,'%d/%m/%Y' )as date_creation_format,image,description,categorie , author_id, location,statut FROM annonces ORDER BY RAND() LIMIT $end");
			$req->execute();
			while($result= $req->fetch(PDO::FETCH_ASSOC)): ?>
				<div class="grid_1_of_3 images_1_of_3">
					 <a href="annonce.php"><img src="images/<?= $result["image"] ?>" alt=""/></a><br>
					 <sub><small><a href="annonce.php?id=<?= $result["id"] ?>">Détails</a></small></sub>
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
