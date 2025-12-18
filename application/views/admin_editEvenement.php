<?php 
	require 'admin_header.php';
?>

<center>
	<form action="<?php echo lien('Web','evenements/update/'.$evenement[0]['idEvenement'])?>" method="POST">
		<select required="" name="categorie" class="selection" >
			<option value=""> -- Catégorie -- </option>
			<?php
				foreach ($categories as $categorie) {
					$selection =  "";
					if($categorie['idCategorie']==$evenement[0]['idCategorie']){
						$selection = "selected";
					}
					echo "<option ".$selection." value='".$categorie['idCategorie']."'>".$categorie['nomCategorie']."</option>";
				}
			?>
		</select>
		<input value="<?php echo $evenement[0]['titre'] ?>" required="" placeholder="Titre de l'evenement" class="selection" type="text" name="titre">
		<input value="<?php echo $evenement[0]['dateEvenement'] ?>" required="" placeholder="Titre de l'evenement" class="selection" type="date" name="dateEvenement">
		<textarea required="" name="contenu" class="selection" placeholder="Saisissez le contenu" rows="5"><?php echo $evenement[0]['titre'] ?></textarea>
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