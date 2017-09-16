<?php

if ($_POST['teleportation']=="Salle de Téléportation") {

	$url="http://gate-remote-access.esy.es/la-salle-de-teleportation-2";
	header("Location: $url");

} else if ($_POST['portail']=="Salle du Portail") {

	$url="http://gate-remote-access.esy.es/la-salle-du-portail";
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
		<h1>Salle des Machines</h1>
		<p>
			Dès votre arrivée dans cette salle, vous notez qu’une sorte de grésillement empli l’espace. Pas spécialement dérangeant mais suffisamment fort pour être remarqué.
		</p>
		<p>
			Il vous faut un peu de temps pour comprendre l’entremêlement de câbles qui se trouve devant vous. Il y a une grande quantité d’appareils variés dont l’utilité vous reste inconnue.
		</p>
		<p>
			Au vue du nombre d’outils de réparation et de circuits électroniques qui sont éparpillés dans la pièce, les deux scientifiques devaient souvent intervenir sur les machines.
		</p>
		<p>
			Parmi l’amas de câbles et derrière ce qui ressemble à un serveur, vous distinguez le fond de la pièce, aucune porte dérobée ni mécanisme caché, le désordre présent dans cette salle semble suffisant.
		</p>
		<p>
			La salle est faiblement éclairée et la plupart des machines qui s’y trouvent semblent éteintes et poussiéreuses. Cependant, sous une espèce de contrôleur auquel est relié une vingtaine de fils, vous apercevez quelque chose dépasser. En vous rapprochant un peu, vous voyez qu’il s’agit d’une vieille affiche. Sans doute un poster qui s’est décroché au fil du temps et a fini ici, perdu parmi les câbles.
		</p>
		<p>
			Vous jetez un dernier coup d’oeil à la salle et notez quelque chose de suspendu au mur, à gauche de la porte de la salle de téléportation. Il s’agit d’une photo étrange que vous avez du mal à distinguer d’ici.
		</p>
		<h4>
			Où souhaitez-vous aller ?
		</h4>
		<form method="post">
			<input name="teleportation" type="submit" value="Salle de Téléportation">
			<input name="portail" type="submit" value="Salle du Portail">
		</form>
	</body>
	</div>
</body>
</html>

<?php
}
?>