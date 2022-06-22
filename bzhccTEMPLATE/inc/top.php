<!--A Design by W3layouts
Author: W3layout
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<?php require_once("Configs/connect_bdd.php"); ?>
<!DOCTYPE HTML>
<html>
<head>
<title>BreizhCoinCoin</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link href='//fonts.googleapis.com/css?family=Cabin+Condensed' rel='stylesheet' type='text/css'>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</head>
<body>
<div class="wrap">
<div class="header">
	<div class="logo">
		<a href="index.php"><img src="images/logo.png" alt=""> </a>
	</div>
	<div class="header-right">
	<div class="contact-info">
		<ul>
			<li><a href="favoris.php">Favoris : 2 enregistrés</a></li>
	
		</ul>
	</div>
	<div class="menu">
	 	 <ul class="nav">
        <li class="active"><a href="index.php" title="Home">Accueil</a></li>
  		<li><a href="apropos.php">Notre concept</a></li>
  	     <li><a href="categories.php">Annonces</a></li>
  		<li><a href="contact.php">Contact</a></li>
  		<li><a href="sinscrire.php">S'enregistrer</a></li>
	    <li><a href="index.php">Mon compte</a></li>

		<?php 
		$mail = $_SESSION["email"];
		if(isset($mail)) {
		echo '<li><a href="../Configs/deconnexion.php">Déconnexion</a></li>';
		} else {
			echo '<li><a href="../login.php">Connexion</a></li>';
		}
		?>
		
  		<div class="clear"></div>
      </ul>
	 </div>
	 </div>
	<div class="clear"></div>
</div>
<div class="hdr-btm pad-w3l">
<div class="hdr-btm-bg"></div>
<div class="hdr-btm-left">
	
	<div class="drp-dwn">
	<form action="categories.php" method="GET">
			<select class="custom-select" id="select-1" name="select-1">
			<?php 
		$req=$conn->query('SELECT * FROM categories');
		?>
		<option selected="selected">Catégorie</option>
		<?php
		while($donnees = $req->fetch()):
			?>
			<option><a href="categories/message=<?= $_GET["select-1"] ?>"><?= $donnees['cat'] ?></a></option>
			<?php 
			endwhile;
			$req-> closeCursor();?>
		</select>
	</div>
	<div class="search">
	 
		<input type="text" value="tapez votre recherche" >
		<input type="submit" value="Chercher" class="pad-w3l-search">
	  </form>
	</div>
	<div class="txt-right">
		<h3><a href="">Recherche avancée</a></h3>
	</div>
	<div class="clear"></div>
</div>
</div>

