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
			Vous rentrez à nouveau dans cette pièce impressionnante et vous tenez debout face à l’étrange appareil qui vous a servi à voyager : le téléporteur. Sa base semble scellée dans le sol tandis que la partie supérieure est fixée au plafond par une structure en acier.
		</p>
		<p>
			Sur celle-ci, vous distinguez une étiquette sur laquelle est noté “SSG-1”, sûrement une autre référence de scientifique geek.
		</p>
		<p>
			Sur la partie basse, vous trouvez à nouveau ces symboles que vous aviez vu plus tôt dans votre aventure. Encore un message à déchiffrer, chouette !
		</p>
		<p>
			Vous vous approchez d’un moniteur situé à son côté et vous y voyez marqué en rouge “Auto-destruction programmée une fois les charges d’urgence utilisées. Utilisation(s) d’urgence restante(s) : 1”.
		</p>
		<p>
			Ce gros message d’alerte rouge a le don de vous inquiéter. Cependant, rien d’autre n’est à noter dans cette salle, mis à part la caméra posée près du mur..
		</p>
		<p>
			Toujours scotché au beau milieu du mur situé face au téléporteur vous voyez encore ce même plan. Votre intuition vous dit de l'étudier.
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