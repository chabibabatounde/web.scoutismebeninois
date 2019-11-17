<?php 
	require 'admin_header.php';
?>

<center>
	<form action="<?php echo lien('Web','articles/index')?>" method="POST">
		<select required="" name="categorie" class="selection" >
			<option value=""> -- Catégorie -- </option>
			<?php
				foreach ($categories as $categorie) {
					echo "<option value='".$categorie['idCategorie']."'>".$categorie['nomCategorie']."</option>";
				}
			?>
		</select>
		<input required="" placeholder="Titre de l'article" class="selection" type="text" name="titre">
		<textarea required="" name="contenu" class="selection" placeholder="Saisissez le contenu" rows="5"></textarea>
		<input required="" class="selection" type="text" name="couverture">
		<input class="selection" type="submit" value ="publier">
	</form>
</center>
<br>
<center>
	
<table border="1" cellpadding="5" cellspacing="0">
	<tr>
		<td><strong>Titre</strong></td>
		<td><strong>Catégorie</strong></td>
		<td><strong>Action</strong></td>
	</tr>
<?php
	foreach($articles as $article){
		echo "
		<tr id='article".$article['idArticle']."'>
			<td>".$article['titre']."</td>
			<td>".$article['nomCategorie']."</td>
			<td><a href='".lien('Web','articles/update/').$article['idArticle']."'>Modifier</a> <a onclick='deleteFn(".$article['idArticle']."); return false;' href='#' style='margin-left:10px;'>Supprimer</a></td>
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
		if(confirm("Voulez vous vraiment supprimer l'article?")){
		  	var xhr = new XMLHttpRequest();
			var url="<?php echo lien('Web','articles/delete/')?>"+argument;
			xhr.open('GET', url);
			xhr.send(null);
			xhr.onreadystatechange = function() {
				if (xhr.readyState == 4 && xhr.status == 200) {
					alert("Article supprimé !");
					document.getElementById('article'+argument).setAttribute("style","display:none");
				}
			}
		}
	}
</script>