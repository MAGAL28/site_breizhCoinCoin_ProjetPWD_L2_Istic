<?php
session_start();
if(!isset($_SESSION["email"])){
header("Location : login.php");
}
include("inc/top.php");
require_once("Configs/connect_bdd.php");
require_once("functions/getUser.php");
?>
<?php 

if(isset($_POST['file']))
    {
        $title=$_POST["title"];
        $price=$_POST["price"];
        $desc=$_POST["description"];
        $images = $_FILES['file']['name'];
        $tmp_dir=$_FILES['file']['tmp_name'];
        
        $imageSize=$_FILES['file']['size'];
        $uploads_dir = 'images/';
        $imgExt = strtolower(pathinfo($images,PATHINFO_EXTENSION));
        $valid_extensions = array('jpeg','jpg','png','gif','pdf'); 
        $picProfile = $_POST['file'];
        move_uploaded_file($tmp_dir,$uploads_dir .$images);
      
        
        $stmt= $conn->prepare('INSERT INTO annonces(title,price,date_creation,image,description,categorie,author_id) VALUES (:title,:price,:date_creation,:image,:description,:categorie,:author_id)');
        $stmt->bindParam(':title',$title);
        $stmt->bindParam(':price',$price);
        $stmt->bindParam(':date_creation', date("Y-m-d"));
        $stmt->bindParam(':image',$picProfile);
        $stmt->bindParam(':description',$desc);
        $stmt->bindParam(':categorie',$_POST['select-1']);
        $stmt->bindParam(':author_id',$_SESSION['id']);
        if($stmt->execute())
        {
            ?>
            <script>
                alert("Votre annonce à bien été publié");
                window.location.href=("index.php");
            </script>
            <?php
        }else {
            ?>
            <script>
                alert("Erreur de plublication");
                window.location.href=("news-annonces.php");
            </script>
            <?php
        }
    }
?>
<!-- debut de la partie contenu -->
<div class="main">
		<div class="register">
			   <div >
			  	 <h3>Nouvelle annonce</h3>
				 <p>Vos annonces seront public, tout le monde pourra vous contacter aprés sa publication...</p>
				 <a class="acount-btn" href="news-annonces.php">Créer une annonce</a>
			   </div>
			   <div class="col_1_of_list span_1_of_list login-right">
				<form  method="POST" enctype="multipart/form-data ">
				  <div>
					<span>titre<label>*</label></span>
					<input type="text" name="title" placeholder="Titre de l'annonce" require> 
				  </div>
				  <div>
					<span>Prix<label>*</label></span>
					<input type="text" name="price" placeholder="Prix en euro" require> 
				  </div>
                  <div>
					<span>Description<label>*</label></span>
					<input type="text" name="description" require> 
				  </div>
                  
                  <div>
					<span>Image<label>*</label></span>
					<input type="file" name="file"  require accept="image/*"> 
				  </div>
                  <div>
                  <form action="categories.php" method="GET">
			<select class="custom-select" id="select-1" name="select-1">
			<?php 
		$req=$conn->query('SELECT * FROM categories');
		?>
		<option selected="selected"> Sélectionner une catégorie </option>
		<?php
		while($donnees = $req->fetch()):
			?>
			<option><?= $donnees['cat'] ?></a></option>
			<?php 
			endwhile;
			$req-> closeCursor();?>
		</select>
                  </div>
				 
				  <button type="submit" name="btn-add" class="btn btn-success">Publié</button>
			    </form>
			   </div>	
			   <div class="clearfix"> </div>
		
	</div>
  <div class="clear"></div>
</div><!-- fin de la partie contenu -->


<?php
include("inc/bottom.php");
?>