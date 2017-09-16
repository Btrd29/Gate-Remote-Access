<?php
$request = $_POST['reponse'];

//Bombardements
if (strtoupper($request)=="SANG NEUF") {
?>

<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>G.R.A.</title>
	<link rel="stylesheet" href="../../../base.css">
	<style type="text/css">
	img {
		width: 75%;
		height: auto;
	}
	</style>
</head>
<body>
	<img src="sang_neuf.png">
</body>
</html>

<?php
} else if (strtoupper($request)=="I'M IN DANGER") {
?>

<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>G.R.A.</title>
	<link rel="stylesheet" href="../../../base.css">
	<style type="text/css">
	img {
		width: 50%;
		height: auto;
	}
	</style>
</head>
<body>
	<h1>Combien d'étoile<!--*s--> y a-t-il dans cette page ?</h1>
	<img src="2étoiles.png">
	<br>
	<br>
	<form  method='post'>
		<input type="text" name="reponse">
		<input type="submit" value="valider">
	</form>
	<audio autoplay loop><source src="tirer_des_étoiles.mp3" type="audio/mp3"></audio>
</body>
</html>

<?php
} else {
?>

<html>
<head>
	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<title>G.R.A.</title>
	<link rel="stylesheet" href="../../../base.css">
	<style type="text/css">
	img {
		width: 50%;
		height: auto;
	}
	</style>
</head>
<body>
	<h1>Combien d'étoile<!--*s--> y a-t-il dans cette page ?</h1>
	<img src="2étoiles.jpg">
	<br>
	<br>
	<form  method='post'>
		<input type="text" name="reponse">
		<input type="submit" value="valider">
	</form>
	<audio autoplay loop><source src="tirer_des_étoiles.mp3" type="audio/mp3"></audio>
</body>
</html>

<?php
}
?>