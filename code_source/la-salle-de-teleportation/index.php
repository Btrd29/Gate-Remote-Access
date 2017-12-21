<?php

if ($_POST['repos']=="Salle de Repos") {

	$url="http://gate-remote-access.esy.es/la-salle-de-repos";
	header("Location: $url");

} else if ($_POST['machine']=="Salle des Machines") {

	$url="http://gate-remote-access.esy.es/la-salle-des-machines";
	header("Location: $url");

} else {
?>

<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>G.R.A.</title>
	<link rel="stylesheet" href="../base.css">
	<style type="text/css">
	input {
		width: 150px;
	}
	</style>
</head>
<body>
	<div class="default03">
		<h1>Salle du Téléporteur</h1>
		<p>
			Un long fourmillement parcourt votre échine, vos yeux brûlent et pendant quelques secondes vous ne voyez plus rien. Une fois votre calme repris et votre cerveau à nouveau oxygéné, vous prenez conscience de ce qu’il vient de vous arriver.
		</p>
		<p>
			Vous venez de vous téléporter, vous n’y croyez pas vous même tellement ce moyen de transport ne semblait être pour vous qu’une simple fantaisie. Mais vous l’avez fait et vous êtes encore bien en vie pour en attester !
		</p>
		<p>
			Cependant, après avoir repris vos esprits, vous parcourez rapidement des yeux la pièce dans laquelle vous vous trouvez. Dans un coin de la pièce, vous repérez une caméra posée près du mur.
		</p>
		<p>
			Scotché au beau milieu du mur situé face au téléporteur vous repérez un plan. Votre intuition vous dit de l'étudier.
		</p>
		<p>
			Enfin, vous remarquez deux portes qui correspondent à la salle de repos ainsi qu’à la salle des machines.
		</p>
		<h4>
			Où souhaitez-vous aller ?
		</h4>
		<form method="post">
			<input name="repos" type="submit" value="Salle de Repos">
			<input name="machine" type="submit" value="Salle des Machines">
		</form>
	</div>
</body>
</html>

<?php
}
?>