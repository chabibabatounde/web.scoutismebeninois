<?php 
	require 'admin_header.php';
?>

<center>
	<form action="<?php echo lien('Web','articles/update/'.$article[0]['idArticle'])?>" method="POST">
		<select required="" name="categorie" class="selection" >
			<option value=""> -- Catégorie -- </option>
			<?php
				foreach ($categories as $categorie) {
					$selection =  "";
					if($categorie['idCategorie']==$article[0]['idCategorie']){
						$selection = "selected";
					}
					echo "<option ".$selection." value='".$categorie['idCategorie']."'>".$categorie['nomCategorie']."</option>";
				}
			?>
		</select>
		<input value="<?php echo $article[0]['titre'] ?>" required="" placeholder="Titre de l'article" class="selection" type="text" name="titre">
		<textarea required="" name="contenu" class="selection" placeholder="Saisissez le contenu" rows="5"><?php echo $article[0]['titre'] ?></textarea>
		<input class="selection" type="submit" value ="Modifier">
	</form>
</center>
<br>
<center>
<style type="text/css">
	.selection{
		width: 90%;
		margin-top: 20px;
		padding: 10px;
	}
</style>