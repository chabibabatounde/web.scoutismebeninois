<center>
	<form method="POST" action="<?php echo lien('Web','login')?>">
		<input placeholder="identifiant" type="text" name="login">
		<input placeholder='mot de passe' type="password" name="password">
		<input type="submit" name="" value="Se connecter">
	</form>
</center>

<style type="text/css">
	input{
		width: 90%;
		display: block;
		margin-top: 20px;
		padding: 10px;
	}
</style>