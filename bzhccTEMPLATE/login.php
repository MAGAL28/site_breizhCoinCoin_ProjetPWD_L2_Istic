<?php
include("inc/top.php");
?>

<!-- debut de la partie contenu -->
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
		<div class="register">
			   <div class="col_1_of_list span_1_of_list login-left">
			  	 <h3>Nouveau membre</h3>
				 <p>En créant un compte, vous pourrez créer des annonces</p>
				 <a class="acount-btn" href="sinscrire.php">Créer un compte</a>
			   </div>
			   <div class="col_1_of_list span_1_of_list login-right">
			  	<h3>Déja membre ?</h3>
				<p>Si vous avez déja un compte, merci de vous connecter</p>
				
				<form action="functions/loginUser.php" method="POST">
				  <div>
					<span>Adresse email<label>*</label></span>
					<input type="text" name="email" placeholder="Votre e-mail"> 
				  </div>
				  <div>
					<span>Mot de passe<label>*</label></span>
					<input type="text" name="password" placeholder="Votre password"> 
				  </div>
				  <a class="forgot" href="#">Mot de passe oublié</a>
				  <input type="submit" value="Login">
			    </form>
			   </div>	
			   <div class="clearfix"> </div>
		
	</div>
  <div class="clear"></div>
</div><!-- fin de la partie contenu -->

<?php
include("inc/bottom.php");
?>