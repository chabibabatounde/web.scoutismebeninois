<?php 
	require 'admin_header.php';
?>

<center>
	<form action="<?php echo lien('Web','newsletter')?>" method="POST">
		<!--span>NB: Pour insérer un lien écrire ceci :  < a href='[LE LIEN]'> < /a > </span><br-->
		<input required="" placeholder="Titre du mail" class="selection" type="text" name="titre">
		<textarea required="" name="contenu" class="selection" placeholder="Saisissez le contenu" rows="5"></textarea>
		<input class="selection" type="submit" value ="publier">
	</form>
</center>

<style type="text/css">
	.selection{
		width: 90%;
		margin-top: 20px;
		padding: 10px;
	}
</style>