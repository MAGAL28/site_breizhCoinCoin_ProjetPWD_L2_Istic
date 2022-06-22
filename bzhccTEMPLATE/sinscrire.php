<?php
include("inc/top.php");
?>

<!-- debut de la partie contenu -->
<div class="main">
     <div class="register">
		  	  <form action="functions/createUser.php" method="POST"> 
					 <?php 
					 if(isset($_GET["message"])){
					 echo $_GET["message"];
					 }
					 ?>
				 <div class="register-top-grid">
					<h3>Vos informations</h3>
					 <div>
						<span>Prénom<label>*</label></span>
						<input type="text" name="prenom"> 
					 </div>
					 <div>
						<span>Nom<label>*</label></span>
						<input type="text" name="nom"> 
					 </div>
					 <div>
						 <span>Email<label>*</label></span>
						 <input type="text" name="email"> 
					 </div>
					 <div class="clear"> </div>
					     <a class="news-letter" href="functions/createUser.php">
						 <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i> </i>S'inscrire à  la neswletter</label>
					   </a>
					 </div>
				     <div class="register-bottom-grid">
						    <h3>Pour vous authentifier</h3>
							 <div>
								<span>Password<label>*</label></span>
								<input type="password" name="password">
							 </div>
							 <div>
								<span>Retapez votre Password<label>*</label></span>
								<input type="password" name="confirmPassword">
							 </div>
							 <div class="clear"> </div>
					 </div>
					 <div class="clear"> </div>
				<div class="register-but">
				   
					   <input type="submit" value="M'inscrire">
					   <div class="clear"> </div>
				 
				</div>
				</form>
				
		   </div>
  <div class="clear"></div>
</div>
<!-- fin de la partie contenu -->

<?php
include("inc/bottom.php");
?>