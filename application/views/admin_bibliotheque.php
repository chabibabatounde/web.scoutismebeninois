<?php 
	require 'admin_header.php';
?>

<center>
	<form action="<?php echo lien('Web','bibliotheque/index')?>" method="POST" enctype="multipart/form-data">
		<input required="" placeholder="Titre du document" class="selection" type="text" name="nomDocument">
		<br>
		<br>
		<input required="" class="selection" type="file" name="fichier"> <br><br>
		<input class="selection" type="submit" value ="Enregistrer" style="cursor: pointer;">
	</form>
</center>
<br>
<center>
	
<table border="1" cellpadding="5" cellspacing="0">
	<tr>
		<td><strong>Titre</strong></td>
		<td><strong>Date</strong></td>
		<td><strong>Action</strong></td>
	</tr>
<?php
	foreach($bibliotheques as $bibliotheque){
		echo "
		<tr id='bibliotheque".$bibliotheque['idBibliotheque']."'>
			<td>".$bibliotheque['nomDocument']."</td>
			<td>".$bibliotheque['dateAjout']."</td>
			<td>
				<a onclick='deleteFn(".$bibliotheque['idBibliotheque']."); return false;' href='#' style='margin-left:10px;'>
					Supprimer
				</a>
			</td>
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
		if(confirm("Voulez vous vraiment supprimer le document?")){
		  	var xhr = new XMLHttpRequest();
			var url="<?php echo lien('Web','bibliotheque/delete/')?>"+argument;
			xhr.open('GET', url);
			xhr.send(null);
			xhr.onreadystatechange = function() {
				if (xhr.readyState == 4 && xhr.status == 200) {
					swal("Document supprimé !");
					document.getElementById('bibliotheque'+argument).setAttribute("style","display:none");
				}
			}
		}
	}
</script>