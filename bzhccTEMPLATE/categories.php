<?php
include("inc/top.php");
?>

<!-- debut de la partie contenu -->
<?php if(empty($_GET)) : ?>

<div class="main">
<div class="ser-main">
	<h4>Nos annonces</h4>
	<div class="ser-para">
	<p>Qsi turpis, pellentesque at ultrices in, dapibus in magna. Nunc easi diam risus, placerat ut scelerisque et,sus cipit eu ante. Nullam vitae dolor ullcper felises cursus gravida. Cras felis elit, pellentesqi amet. sus cipit eu ante. </p>
	</div>

	<?php 
			
			$req = $conn -> prepare("SELECT id,title,price,DATE_FORMAT(date_creation,'%d/%m/%Y' )as date_creation_format,image,description,categorie , author_id, location,statut FROM annonces ORDER BY date_creation");
			$req->execute();
			while($result= $req->fetch(PDO::FETCH_ASSOC)): ?>
<div class="ser-grid-list">
	<h5><?= $result["title"] ?></h5>
	<img src="images/<?= $result["image"] ?>" alt="">
	<p><?= $result["description"] ?></p>
	<div class="btn top"><a href="annonce.php">En savoir plus</a></div>
	</div>
	<?php endwhile ?>
	<div class="clear"></div>
	</div>
	
<div class="sidebar">
<div class="s-main">
	<div class="s_hdr">
		<h2>Categories</h2>
	</div>
	<div class="text1-nav">
		<ul>
		<?php 
		$req=$conn->query('SELECT * FROM categories');
		while($donnees = $req->fetch())
		: ?>
			<li><a href=""><?=  $donnees["cat"]?></a></li>
		<?php endwhile ?>
	    </ul>
	</div>
</div>
</div>
<div class="clear"></div>
</div>

<?php endif ?>

<?php if(strcmp($_GET['select-1'],$donnees["cat"])) : ?>


	<div class="main">
<div class="ser-main">
	<h4>Nos <?= $_GET['select-1'] ?></h4>
	<div class="ser-para">
	<p>Qsi turpis, pellentesque at ultrices in, dapibus in magna. Nunc easi diam risus, placerat ut scelerisque et,sus cipit eu ante. Nullam vitae dolor ullcper felises cursus gravida. Cras felis elit, pellentesqi amet. sus cipit eu ante. </p>
	</div>

	<?php 
			
			$req = $conn -> prepare("SELECT id,title,price,DATE_FORMAT(date_creation,'%d/%m/%Y' )as date_creation_format,image,description,categorie , author_id, location,statut FROM annonces WHERE categorie = :categorie");
			$req->bindParam(':categorie',$_GET['select-1']);
			$req->execute();
			while($result= $req->fetch(PDO::FETCH_ASSOC)): 
			?>
<div class="ser-grid-list">
	<h5><?= $result["title"] ?></h5>
	<img src="images/<?= $result["image"] ?>" alt="">
	<p><?= $result["description"] ?></p>
	<div class="btn top"><a href="annonce.php">En savoir plus</a></div>
	</div>
	<?php endwhile ?>
	<div class="clear"></div>
	</div>
	
<div class="sidebar">
<div class="s-main">
	<div class="s_hdr">
		<h2>Categories</h2>
	</div>
	<div class="text1-nav">
		<ul>
		<?php 
		$req=$conn->query('SELECT * FROM categories');
		while($donnees = $req->fetch())
		: ?>
			<li><a href=""><?=  $donnees["cat"]?></a></li>
		<?php endwhile ?>
	    </ul>
	</div>
</div>
</div>
<div class="clear"></div>
</div>

<?php endif ?>

<?php
include("inc/bottom.php");
?>
