<?php

if ($_POST['machine']=="Salle des Machines") {

	$url="http://gate-remote-access.esy.es/la-salle-des-machines";
	header("Location: $url");

} else if ($_POST['labo']=="Le Laboratoire") {

	$url="http://gate-remote-access.esy.es/le-laboratoire";
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
		<h1>Salle du Portail</h1>
		<p>
			Une atmosphère pesante règne dans la pièce dans laquelle vous venez d’entrer. Il s’agit du lieu dans lequel Slein et William ont travaillés durant tant d’années. Vous mesurez l’importance de votre présence, de votre responsabilité.
		</p>
		<p>
			Sans surprise, au milieu de la salle trône une arche en métal imposante. Le GRA est devant vous, impressionnant et silencieux.
		</p>
		<p>
			Sur les murs de nombreux écrans éteints vous renvoient votre reflet. Encore une fois une multitude de câbles serpentent au sol, ils sortent tous du portail et doivent probablement servir à en mesurer l’activité.
		</p>
		<p>
			Sur le pilier gauche du G.R.A se trouve une plaque métallique brillante qui semble être le seul moyen d'interagir avec le dispositif, à côté de cette plaque, ce qui ressemble à une carte postale a été scotchée à l’arche.
		</p>
		<p>
			A son pied un petit monticule d’une poussière noire et épaisse attire votre attention. Rien ne semble vous expliquer sa présence. Cependant, vous remarquez qu’à son sommet un bout de métal dépasse.
		</p>
		<p>
			Enfin, dans le fond de la pièce, vous notez la présence d’une armoire. Elle est assez imposante et en bois massif. A vue de nez, elle devrait pouvoir contenir une importante quantité de matériel.
		</p>
		<h4>
			Où souhaitez-vous aller ?
		</h4>
		<form method="post">
			<input name="machine" type="submit" value="Salle des Machines">
			<input name="labo" type="submit" value="Le Laboratoire">
		</form>
	</div>
</body>
</html>

<?php
}
?>