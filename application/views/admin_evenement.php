<?php 
	require 'admin_header.php';
?>

<center>
	<form action="<?php echo lien('Web','evenements/index')?>" method="POST" enctype="multipart/form-data">
		<select required="" name="categorie" class="selection" >
			<option value=""> -- Catégorie -- </option>
			<?php
				foreach ($categories as $categorie) {
					echo "<option value='".$categorie['idCategorie']."'>".$categorie['nomCategorie']."</option>";
				}
			?>
		</select>
		<input required="" placeholder="Titre de l'evenement" class="selection" type="date" name="dateEvenement">
		<input required="" placeholder="Titre de l'evenement" class="selection" type="text" name="titre">
		<br>
		<br>
		<input required="" class="selection" type="file" name="couverture"> <br><br>

		<textarea required="" name="contenu" class="selection" placeholder="Saisissez le contenu" rows="5"></textarea>
		<input class="selection" type="submit" value ="publier">
	</form>
</center>
<br>
<center>
	
<table border="1" cellpadding="5" cellspacing="0">
	<tr>
		<td><strong>Titre</strong></td>
		<td><strong>Catégorie</strong></td>
		<td><strong>Date</strong></td>
		<td><strong>Action</strong></td>
	</tr>
<?php
	foreach($evenements as $evenement){
		echo "
		<tr id='evenement".$evenement['idEvenement']."'>
			<td>".$evenement['titre']."</td>
			<td>".$evenement['nomCategorie']."</td>
			<td>".$showDate($evenement['dateEvenement'])."</td>
			<td><a href='".lien('Web','evenements/update/').$evenement['idEvenement']."'>Modifier</a> <a onclick='deleteFn(".$evenement['idEvenement']."); return false;' href='#' style='margin-left:10px;'>Supprimer</a></td>
		</tr>
		";
	}
?>
</table>
</center>
<style type="text/css">
	.selection{
		width: 90%;
		margin-top: 20px;
		padding: 10px;
	}
</style>
<script type="text/javascript">
	function deleteFn(argument) {
		if(confirm("Voulez vous vraiment supprimer l'evenement?")){
		  	var xhr = new XMLHttpRequest();
			var url="<?php echo lien('Web','evenements/delete/')?>"+argument;
			xhr.open('GET', url);
			xhr.send(null);
			xhr.onreadystatechange = function() {
				if (xhr.readyState == 4 && xhr.status == 200) {
					alert("Evenement supprimé !");
					document.getElementById('evenement'+argument).setAttribute("style","display:none");
				}
			}
		}
	}
</script>