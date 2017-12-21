<?php
session_start();
$_SESSION['reponse1'] = $_POST['reponse1'];
$_SESSION['reponse2'] = $_POST['reponse2'];
$_SESSION['reponse3'] = $_POST['reponse3'];
$_SESSION['reponse4'] = $_POST['reponse4'];

$request1 = $_SESSION['reponse1'];
$request2 = $_SESSION['reponse2'];
$request3 = $_SESSION['reponse3'];
$request4 = $_SESSION['reponse4'];

//Bombardements
if (strtolower($request1)=="sang neuf"&&strtolower($request2)=="l'autre côté"&&(strtolower($request3)=="la combinaison"||strtoupper($request3)=="COMBINAISON")) {
?>

<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>G.R.A.</title>
	<link rel="stylesheet" href="../../../base.css">
</head>
<body>
	<h1>A garder sur soi en cas de grande soif</h1>
	<audio autoplay loop><source src="mp3.mp3" type="audio/mp3"></audio>
	<form method='post'>
		<input type="text" name="reponse4">
		<input type="submit" value="valider">
	</form>
</body>
</html>

<?php
} else if (strtolower($request4)=="pierre de foyer") {
?>

<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>G.R.A.</title>
	<link rel="stylesheet" href="../../../base.css">
</head>
<body>
	<h1>Souhaitez-vous vous téléporter ?</h1>
	<form method='post'>
		<input name="rep" type="submit" value="Oui">
		<input name="rep" type="submit" value="Non">
	</form>
</body>
</html>

<?php
} else if ($_POST['rep']=='Oui') {
	header('Location: http://gate-remote-access.esy.es/la-salle-de-teleportation');
} else if ($_POST['rep']=='Non') {
	header('Location: http://gate-remote-access.esy.es');
} else {
?>

<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>G.R.A.</title>
	<link rel="stylesheet" href="../../../base.css">
</head>
<body>
	<h1>Validez vos acquis et vous passerez</h1>
	<form method='post'>
		<input type="text" name="reponse1" placeholder="Combien d'étoiles ?">
		<input type="text" name="reponse2" placeholder="42122">
		<input type="text" name="reponse3" placeholder="Tu l'as trouvée ?">
		<br>
		<br>
		<input type="submit" value="valider">
	</form>
</body>
</html>

<?php
}
?>