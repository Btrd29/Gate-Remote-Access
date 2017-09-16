<?php

if ($_POST['portail']=="Salle du Portail") {

	$url="http://gate-remote-access.esy.es/la-salle-du-portail";
	header("Location: $url");

} else if ($_POST['repos']=="Salle de Repos") {

	$url="http://gate-remote-access.esy.es/la-salle-de-repos";
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
		<h1>Le Laboratoire</h1>
		<p>
			Vous voici désormais dans la plus grande salle du complexe souterrain. Le laboratoire est une très grande pièce dans laquelle se trouve un grand nombre de plans de travail avec divers appareils de mesure.
		</p>
		<p>
			Une multitude de papiers, de plans, de notes et de schémas en tout genre sont éparpillés un peu partout. Dans ce fatras, un tiroir ouvert attire votre attention. A l’intérieur se trouve un porte-document qui contient ce qui ressemble à une autobiographie. Il semblerait que ce soit Slein lui-même qui l’ait rédigée.
		</p>
		<p>
			Il y a aussi plusieurs postes de travail, alignés contre un mur et affichant chacuns des logiciels différents. L’ordinateur principal est quant à lui en veille et vous affiche une image assez originale.
		</p>
		<p>
			Dans l’angle de la pièce se trouve un petit fauteuil à côté duquel sont posés plusieurs magazines savants et une revue scientifique.
		</p>
		<p>
			Enfin, détail incongru, une peinture destinée à égayer le lieu, mais qui jure complètement avec l’endroit. Décidément, ces scientifiques ont des goûts bien spéciaux.
		</p>
		<p>
			Une fois cette rapide inspection terminée, vous ne trouvez plus rien d’assez important pour attirer votre attention et restez donc, immobile, dans le silence pesant du laboratoire.
		</p>
		<h4>
			Où souhaitez-vous aller ?
		</h4>
		<img src="labo.JPG">
		<br/>
		<br/>
		<form method="post">
			<input name="portail" type="submit" value="Salle du Portail">
			<input name="repos" type="submit" value="Salle de Repos">
		</form>
	</div>
</body>
</html>

<?php
}
?>