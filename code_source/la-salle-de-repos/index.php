<?php

if ($_POST['labo']=="Le Laboratoire") {

	$url="http://gate-remote-access.esy.es/le-laboratoire";
	header("Location: $url");

} else if ($_POST['teleportation']=="Salle de Téléportation") {

	$url="http://gate-remote-access.esy.es/la-salle-de-teleportation-2";
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
		<h1>Salle de Repos</h1>
		<p>
			Vous entrez dans une salle spacieuse et décorée, elle contraste avec l’idée que vous avez d’un laboratoire. La première chose visible en entrant se trouve être un canapé, entouré de quelques poufs devant une télévision éteinte.
		</p>
		<p>
			Entre les deux a été disposée une table basse, et en approchant de quelques pas, vous remarquez que celle-ci est recouverte de miettes. Les deux collègues devaient avoir pour habitude de passer leurs pause de midi à cet endroit.
		</p>
		<p>
			En observant mieux cet espace, vous notez que l'immense télévision est reliée à divers appareils : une chaine hifi, une vieille gamecube, qui a l'air d'avoir beaucoup servie, et un lecteur DVD.
		</p>
		<p>
			Sur votre droite, en hauteur, de grandes étagères recouvrent le mur. Des bibelots, des livres, des journaux et des dossiers sont entassés le long des parois, si bien que les planches qui supportent tout ce poids se sont courbées au fil du temps mais semblent tout de même tenir le choc.
		</p>
		<p>
			Sur votre gauche, le mur a été repeint, celà donne comme un rayon de couleur dans cet espace terne. En son centre repose un tourne disque flamboyant, tout semble montrer qu’il était régulièrement utilisé par les deux scientifiques.
		</p>
		<p>
			Enfin, dans l'un des coins de la salle, se trouve un sac de sport dont le contenu vous surprend. Deux formes sombres dépassent, on dirait des armes d'entraînement en bois.
		</p>
		<h4>
			Où souhaitez-vous aller ?
		</h4>
		<form method="post">
			<input name="labo" type="submit" value="Le Laboratoire">
			<input name="teleportation" type="submit" value="Salle de Téléportation">
		</form>
	</div>
</body>
</html>

<?php
}
?>